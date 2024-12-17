<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    use HasFactory;

    protected $table = 'solusi';

    protected $fillable = [
        'diagnosis_id',
        'solusi',    
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'diagnosis_id');
    }
}
