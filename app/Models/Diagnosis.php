<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;
    protected $table = 'diagnosis';

    protected $fillable = ['name', 'description'];

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}
