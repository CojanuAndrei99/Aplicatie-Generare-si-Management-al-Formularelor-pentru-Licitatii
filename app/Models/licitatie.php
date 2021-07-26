<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class licitatie extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'autoritate_contractanta',
        'id_user',
        'id_firma',
        'nume_personalizat',
        'fisa_date',
        'file_path',
        'beneficiar',
        'numar_referinta',
        'cod_fiscal',
        'adresa',
        'localitate',
        'cod_postal',
        'tara',
        'cod_nuts',
        'email',
        'telefon',
        'fax',
        'persoana_contact',
        'titlu',
        'tip_contract',
        'descriere_succinta',
        'valoare_totala_ftva',
        'moneda',
        'informatii_suplimentare',
        'nr_loturi'
        
    ];


}
