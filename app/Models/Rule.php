<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;
    protected $table = 'rule';

    protected $fillable = ['diagnosis_id'];

    public function gejala()
    {
        return $this->belongsToMany(Gejala::class, 'rule_gejala', 'rule_id', 'gejala_id');
    }

    public function diagnosis() 
    {
        return $this->belongsTo(Diagnosis::class);
    }
}
