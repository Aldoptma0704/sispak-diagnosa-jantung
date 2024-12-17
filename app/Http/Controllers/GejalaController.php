<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('admin.gejala.index', compact('gejala'));
    }

    public function create()
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            return view('admin.gejala.create');
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

            Gejala::create($request->all());

            return redirect('admin/gejala');
        } else {
            return redirect('Home');
        }
    }

    public function edit($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $gejala = Gejala::findOrFail($id);
            return view('admin.gejala.edit', compact('gejala'));
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

            $gejala = Gejala::findOrFail($id);
            $gejala->update($request->all());

            return redirect('admin/gejala');
        } else {
            return redirect('Home');
        }
    }

    public function destroy($id)
    {
        $user = Session::get('user');
        if ($user && $user['role'] === 'admin') {
            $gejala = Gejala::findOrFail($id);
            $gejala->delete();

            return redirect('admin/gejala');
        } else {
            return redirect('Home');
        }
    }
}
