<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;

    // mengizinkan field dari database
    protected $fillable = [
        'nama_kota',
        'cover',
        'status_publish',
    ];
}
