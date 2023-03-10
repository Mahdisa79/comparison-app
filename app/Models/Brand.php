<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;


    protected $casts = ['logo' => 'array'];


    protected $fillable = ['persian_name', 'original_name', 'logo', 'status'];

}
