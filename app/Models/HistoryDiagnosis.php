<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryDiagnosis extends Model
{
    use HasFactory;

    protected $table = 'history_diagnosis';

    protected $fillable = ['user_id', 'diagnosis', 'solusi', 'confidence'];
}
