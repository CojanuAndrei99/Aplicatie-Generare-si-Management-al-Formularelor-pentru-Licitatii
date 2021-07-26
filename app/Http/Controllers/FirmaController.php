<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Firma;
use Illuminate\Support\Facades\Auth;

class FirmaController extends Controller
{
    //
    

    public function register(Request $request)
    {
        
        
        $this->validate($request, [
            'dublaVerificare' => 'accepted',
            'termeniConditii' => 'accepted',
        ]);
    
        //dd($request);
        $firma=new Firma();
        $firma->id_user=Auth::user()->id; 
        $firma->nume_firma=$request->nume_firma;
        $firma->nume_admin=$request->nume_administrator;
        $firma->adresa_firma=$request->adresa_firma;
        $firma->email_firma=$request->email_firma;
        $firma->telefon=$request->telefon;
        $firma->cod_fiscal=$request->cod_fiscal;
        $firma->numar_inregistrare=$request->numar_inregistrare;
        $firma->data_inregistrare=$request->data_inregistrare;
        $firma->incadrare_legala=$request->incadrare_legala;
        $firma->cf_1=$request->cf_1;
        $firma->cf_2=$request->cf_2;
        $firma->cf_3=$request->cf_3;
        $firma->save();
        if($firma !=null)
        {
            return redirect("home")->with(session()->flash('alert-success', 'Datele firmei au fost salvate.'));
        }
        return redirect("home")->with(session()->flash('alert-danger', 'A intervenit o problema!Datele firmei nu au fost salvate!'));
    
    }

}
