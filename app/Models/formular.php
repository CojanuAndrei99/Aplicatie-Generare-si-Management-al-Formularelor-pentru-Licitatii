<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formular extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_licitatie',
        'id_firma',
        'id_user',
        'id_tip',
        
        'file',
        'file_path',
        ];
}
