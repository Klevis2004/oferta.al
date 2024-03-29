<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikuj extends Model
{
    protected $fillable = ['emri', 'foto', 'cmimi', 'cmimiFillestar', 'pershkrimi'];
    use HasFactory;
}