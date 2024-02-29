<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    protected $fillable = [ 'emri', 'sasia', 'komenti', 'file', 'info', 'products_id'];
    use HasFactory;
}
