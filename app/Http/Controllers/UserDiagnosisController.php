<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Rule;
use App\Models\HistoryDiagnosis;
use App\Models\Diagnosis;

class UserDiagnosisController extends Controller
{
    public function index()
    {
        $gejala = Gejala::all();
        return view('user.gejala', compact('gejala'));
    }

    public function diagnosis(Request $request)
    {
        // Validasi input gejala
        $request->validate([
            'gejala_id' => 'required|array',
            'gejala_id.*' => 'exists:gejala,id',
        ], [
            'gejala_id.required' => 'Pilih setidaknya satu gejala.',
            'gejala_id.array' => 'Format gejala tidak valid.',
            'gejala_id.*.exists' => 'Gejala yang dipilih tidak valid.',
        ]);

        
        $selectedGejala = $request->input('gejala_id');

        
        $user = session()->get('user');
        if (!$user) {
            return redirect('login')->with('error', 'Anda harus login terlebih dahulu.');
        }
        $userId = $user['id'];

        
        $rules = Rule::with(['gejala', 'diagnosis.solusi'])
            ->whereHas('gejala', function ($query) use ($selectedGejala) {
                $query->whereIn('gejala.id', $selectedGejala);
            })->get();

        $results = []; 

        
        foreach ($rules as $rule) {
            $totalGejala = $rule->gejala->count();
            $matchedGejala = $rule->gejala->whereIn('id', $selectedGejala)->count(); 

            
            $confidence = ($matchedGejala / $totalGejala) * 100;

            HistoryDiagnosis::create([
                'user_id'    => $userId,
                'diagnosis'  => $rule->diagnosis->name ?? 'Diagnosis tidak ditemukan',
                'solusi'     => $rule->diagnosis->solusi->first()->solusi ?? 'Tidak ada solusi tersedia',
                'confidence' => round($confidence, 2),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $results[] = [
                'diagnosis'  => $rule->diagnosis ?? 'Diagnosis tidak ditemukan',
                'confidence' => round($confidence, 2),
            ];
        }

        usort($results, fn($a, $b) => $b['confidence'] <=> $a['confidence']);

        return view('user.hasil_diagnosis', compact('results', 'selectedGejala'));
    }

    public function history()
    {
        $user = session()->get('user');
        if (!$user) {
            return redirect('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $userId = $user['id'];
        $history = HistoryDiagnosis::where('user_id', $userId)->get();

        return view('user.history_diagnosis', compact('history'));
    }

    public function deleteHistory($id)
    {
        $history = HistoryDiagnosis::findOrFail($id);
        $history->delete();

        return redirect()->route('user.history')->with('success', 'History berhasil dihapus');
    }
}
