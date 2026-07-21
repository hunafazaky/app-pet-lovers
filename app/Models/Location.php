<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\LocationFactory;

class Location extends Model
{
    /** @use HasFactory<LocationFactory> */
    use HasFactory;

    // TAMBAHKAN BARIS INI:
    protected $fillable = ['name'];
}
