<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Diagnosis;

class DiagnosisController extends Controller
{
    public function index()
    {
        $diagnosis = Diagnosis::all();
        return view('admin.diagnosis.index', compact('diagnosis'));
    }

    public function create()
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            return view('admin.diagnosis.create');
        } else {
            return redirect('Home');
        }
    }

    public function store(Request $request)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $request->validate([
                'name' => 'required',
                'description' => 'nullable',
            ]);

            Diagnosis::create($request->all());

            return redirect('admin/diagnosis');
        } else {
            return redirect('Home');
        }
    }

    public function edit($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $diagnosis = Diagnosis::findOrFail($id);
            return view('admin.diagnosis.edit', compact('diagnosis'));
        } else {
            return redirect('Home');
        }
    }

    public function update(Request $request, $id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $request->validate([
                'name' => 'required',
                'description' => 'nullable',
            ]);

            $diagnosis = Diagnosis::findOrFail($id);
            $diagnosis->update($request->all());

            return redirect('admin/diagnosis');
        } else {
            return redirect('Home');
        }
    }

    public function destroy($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $diagnosis = Diagnosis::findOrFail($id);
            $diagnosis->delete();

            return redirect('admin/diagnosis');
        } else {
            return redirect('Home');
        }
    }
}
