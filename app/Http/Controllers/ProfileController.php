<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\Firma;
use App\Models\tip_formular;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }
    public function edit_firma()
    {
        if(auth()->user()->id_firma!=null)
        {
            return redirect("home")->with(session()->flash('alert-danger', 'Nu aveti voie sa modificati datele firmei dintr-un cont de imputernicit!'));
        }
        return view("profile/edit_firma");
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        $user_name=$request->name;
        $user_mail=$request->email;
        
        DB::table('users')->where('id',auth()->user()->id)->update(['name'=>$user_name,'email'=>$user_mail]);
        
        return back()->withStatus(__('Profil actualizat!'));
    }
    public function update_firma(Request $request)
    {
        $firma_nume_firma=$request->nume_firma;
        $firma_nume_admin=$request->nume_admin;
        $firma_adresa_firma=$request->adresa_firma;
        $firma_email_firma=$request->email_firma;
        $firma_telefon=$request->telefon;
        $firma_cod_fiscal=$request->cod_fiscal;
        $firma_numar_inregistrare=$request->numar_inregistrare;
        $firma_data_inregistrare=$request->data_inregistrare;
        $firma_incadrare_legala=$request->incadrare_legala;
        $firma_cf_1=$request->cf_1;
        $firma_cf_2=$request->cf_2;
        $firma_cf_3=$request->cf_3;
        DB::table('Firmas')->where('id_user',auth()->user()->id)->update(['nume_firma'=>$firma_nume_firma,'nume_admin'=>$firma_nume_admin,'adresa_firma'=>$firma_adresa_firma,'email_firma'=>$firma_email_firma,'telefon'=>$firma_telefon,'cod_fiscal'=>$firma_cod_fiscal,'numar_inregistrare'=>$firma_numar_inregistrare,'data_inregistrare'=>$firma_data_inregistrare,'incadrare_legala'=>$firma_incadrare_legala,'cf_1'=>$firma_cf_1,'cf_2'=>$firma_cf_2,'cf_3'=>$firma_cf_3]);
        
        return back()->withStatus(__('Datele firmei au fost actualizate!'));

    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        DB::table('users')->where('id',auth()->user()->id)->update(['password'=> Hash::make($request->get('password'))]);
        
        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
