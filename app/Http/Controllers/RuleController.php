<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Diagnosis;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with('gejala', 'diagnosis')->get();
        return view('admin.rules.index', compact('rules'));
    }

    public function create()
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            
            $gejala = Gejala::all();
            $diagnosis = Diagnosis::all();
            
            return view('admin.rules.create', compact('gejala', 'diagnosis'));
        } else {
            return redirect('Home');
        }
    }

    public function store(Request $request)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $request->validate([
                'gejala_id' => 'required|array', 
                'gejala_id.*' => 'exists:gejala,id', 
                'diagnosis_id' => 'required|exists:diagnosis,id',
            ]);

            $rule = Rule::create([
                'diagnosis_id' => $request->diagnosis_id,
            ]);

            $rule->gejala()->sync($request->gejala_id); 

            return redirect('admin/rules')->with('success', 'Rules created successfully!');
        } else {
            return redirect('Home');
        }
    }

    
    public function edit($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $rule = Rule::findOrFail($id);
            $gejala = Gejala::all();
            $diagnosis = Diagnosis::all();
            return view('admin\rules\edit', compact('rule', 'gejala', 'diagnosis'));
        } else {
            return redirect('Home');
        }
    }

    
    public function update(Request $request, $id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $request->validate([
                'gejala_id' => 'required|array', 
                'gejala_id.*' => 'exists:gejala,id', 
                'diagnosis_id' => 'required|exists:diagnosis,id', 
            ]);

            $rule = Rule::findOrFail($id);

            $rule->update([
                'diagnosis_id' => $request->diagnosis_id,
            ]);

            $rule->gejala()->sync($request->gejala_id);

            return redirect('admin/rules')->with('success', 'Rule updated successfully!');
        } else {
            return redirect('Home');
        }
    }


    
    public function destroy($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $rule = Rule::findOrFail($id);
            $rule->delete();

            return redirect('admin/rules');
        } else {
            return redirect('Home');
        }
    }
}
