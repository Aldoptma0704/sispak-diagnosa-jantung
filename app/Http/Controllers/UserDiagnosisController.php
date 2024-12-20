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

        if ($rules->isEmpty()) {
            $bestDiagnosis = [
                'diagnosis' => 'Tidak ada diagnosis yang cocok',
                'solusi' => 'Tidak ada solusi yang tersedia',
                'confidence' => 0,
            ];

            return view('user.hasil_diagnosis', compact('bestDiagnosis', 'selectedGejala'));
        }

        $highestConfidence = null;
        $bestDiagnosis = null;

        foreach ($rules as $rule) {
            $totalGejala = $rule->gejala->count();
            $matchedGejala = $rule->gejala->whereIn('id', $selectedGejala)->count();

            $confidence = ($matchedGejala / $totalGejala) * 100;

            if ($highestConfidence === null || $confidence > $highestConfidence) {
                $highestConfidence = $confidence;
                $bestDiagnosis = [
                    'diagnosis' => $rule->diagnosis->name ?? 'Diagnosis tidak ditemukan',
                    'solusi' => $rule->diagnosis->solusi->first()->solusi ?? 'Tidak ada solusi tersedia',
                    'confidence' => round($confidence, 2),
                ];
            }
        }

        if ($bestDiagnosis) {
            HistoryDiagnosis::create([
                'user_id' => $userId,
                'diagnosis' => $bestDiagnosis['diagnosis'],
                'solusi' => $bestDiagnosis['solusi'],
                'confidence' => $bestDiagnosis['confidence'],
            ]);
        }

        return view('user.hasil_diagnosis', compact('bestDiagnosis', 'selectedGejala'));
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
