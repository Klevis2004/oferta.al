<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [ 'emri','komenti','data_dorezimit', 'status', 'user_id'];
    use HasFactory;
}
