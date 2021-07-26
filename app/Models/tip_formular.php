<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tip_formular extends Model
{
    use HasFactory;
    protected $fillable = [
        'nume_formular',
        'template',
        'template_path'
    ];
}
