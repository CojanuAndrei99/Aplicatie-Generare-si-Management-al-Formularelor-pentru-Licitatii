<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nume_firma',
        'id_user',
        'nume_admin',
        'adresa_firma',
        'email_firma',
        'telefon',
        'cod_fiscal',
        'numar_inregistrare',
        'data_inregistrare',
        'incadrare_legala',
        'cf_1',
        'cf_2',
        'cf_3'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
