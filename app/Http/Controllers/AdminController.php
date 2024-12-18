<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Rule;
use App\Models\Solusi;
use Illuminate\Contracts\Cache\Store;

class AdminController extends Controller
{
    public function dashboard()
    {
        $gejalaCount = Gejala::count();
        $diagnosisCount = Diagnosis::count();
        $ruleCount = Rule::count();
        $solusiCount = Solusi::count();

        return view('admin.dashboard', compact('gejalaCount', 'diagnosisCount', 'ruleCount', 'solusiCount'));
    }

}
