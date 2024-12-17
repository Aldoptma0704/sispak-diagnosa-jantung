@extends('admin.layouts.admin')

@section('content')
    <div class="row g-4">
        <!-- Total Gejala -->
        <div class="col-md-6 col-lg-3">
            <div class="card p-3 card-stat">
                <h6 class="text-secondary">Total Gejala</h6>
                <h3 class="fw-bold">{{ $gejalaCount }}</h3>
                <span class="badge bg-primary">Data Gejala</span>
            </div>
        </div>

        <!-- Total Diagnosis -->
        <div class="col-md-6 col-lg-3">
            <div class="card p-3 card-stat">
                <h6 class="text-secondary">Total Diagnosis</h6>
                <h3 class="fw-bold">{{ $diagnosisCount }}</h3>
                <span class="badge bg-success">Data Diagnosis</span>
            </div>
        </div>

        <!-- Total Rule -->
        <div class="col-md-6 col-lg-3">
            <div class="card p-3 card-stat">
                <h6 class="text-secondary">Total Rules</h6>
                <h3 class="fw-bold">{{ $ruleCount }}</h3>
                <span class="badge bg-warning text-dark">Data Rule</span>
            </div>
        </div>

        <!-- Total Solusi -->
        <div class="col-md-6 col-lg-3">
            <div class="card p-3 card-stat">
                <h6 class="text-secondary">Total Solusi</h6>
                <h3 class="fw-bold">{{ $solusiCount }}</h3>
                <span class="badge bg-info">Data Solusi</span>
            </div>
        </div>
    </div>
@endsection
