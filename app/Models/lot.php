<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lot extends Model
{
    use HasFactory;
    protected $fillable = [
    'id_licitatie',
    'denumire_lot',
    'descriere_achizitie',
    'criteriu_atribuire',
    'info_variante',
    'durata_contract',
    'valoare_totala_ftva',
    'valoare_garantie_ftva'
    ];
}
