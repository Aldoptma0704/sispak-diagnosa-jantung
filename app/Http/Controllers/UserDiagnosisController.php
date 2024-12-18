<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;
use App\Models\Rule;
use App\Models\HistoryDiagnosis;

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

        $rules = Rule::with(['gejala', 'diagnosis.solusi'])
            ->whereHas('gejala', function ($query) use ($selectedGejala) {
                $query->whereIn('gejala.id', $selectedGejala);
            })->get();

        $diagnosisResult = [];
        foreach ($rules as $rule) {
            $diagnosis = $rule->diagnosis;
            $solusi = $diagnosis->solusi->first();

            $diagnosisData = [
                'diagnosis' => $diagnosis->name ?? 'Diagnosis tidak ditemukan',
                'solusi' => $solusi->solusi ?? 'Tidak ada solusi tersedia',
            ];

            // Simpan ke history diagnosis
            HistoryDiagnosis::create($diagnosisData);

            $diagnosisResult[] = $diagnosisData;
        }

        return view('user.hasil_diagnosis', compact('diagnosisResult'));
    }

    public function history()
    {
        $history = HistoryDiagnosis::all();
        return view('user.history_diagnosis', compact('history'));
    }

    public function deleteHistory($id)
    {
        $history = HistoryDiagnosis::findOrFail($id);
        $history->delete();

        return redirect()->route('user.history')->with('success', 'History berhasil dihapus');
    }
}
