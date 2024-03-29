<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferencat extends Model
{
    protected $fillable = ['wish','user_id','artikujs_id'];
    use HasFactory;
}
