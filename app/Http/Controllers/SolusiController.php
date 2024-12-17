<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Solusi;
use App\Models\Diagnosis;

class SolusiController extends Controller
{
    public function index()
    {
        $solusi = Solusi::with('diagnosis')->get();
        return view('admin.solusi.index', compact('solusi'));
    }

    
    public function create($diagnosis_id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $diagnosis = Diagnosis::all(); 
            return view('admin.solusi.create', compact('diagnosis', 'diagnosis_id'));
        } else {
            return redirect('Home');
        }
    }
   
    public function store(Request $request)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $request->validate([
                'diagnosis_id' => 'required|exists:diagnosis,id',
                'solusi' => 'required|string',
            ]);
            // dd($request->all());
            Solusi::create([
                'diagnosis_id' => $request->diagnosis_id,
                'solusi' => $request->solusi, 
            ]);
            
            // dd('Data berhasil disimpan!');

            return redirect()->route('admin.solusi.index')->with('success', 'Solusi berhasil disimpan.');
        } else {
            return redirect('login');
        }
    }

    
    public function edit($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $solusi = Solusi::findOrFail($id);
            return view('admin.editSolusi', compact('solusi'));
        } else {
            return redirect('Home');
        }
    }

    public function update(Request $request, $id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $request->validate([
                'solusi' => 'required',
            ]);

            $solusi = Solusi::findOrFail($id);
            $solusi->update($request->all());

            return redirect('admin/solusi');
        } else {
            return redirect('Home');
        }
    }

    public function destroy($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $solusi = Solusi::findOrFail($id);
            $solusi->delete();

            return redirect('admin/solusi');
        } else {
            return redirect('Home');
        }
    }
}
