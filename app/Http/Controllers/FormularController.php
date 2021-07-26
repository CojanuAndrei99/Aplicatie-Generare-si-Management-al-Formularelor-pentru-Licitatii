<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Firma;
use App\Models\licitatie;
use App\Models\lot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Cast\Object_;

require '../vendor/autoload.php';

class FormularController extends Controller
{
    //
    public function alegereLicitatie(Request $request)
    {
        if(auth()->user()->id_firma!=null)//imputernicit
        {
            $licitatii=DB::table('licitaties')->where('id_firma',auth()->user()->id_firma)->get();
            
            return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
        }
        $subq=DB::table('firmas')->select('id')->where('id_user',auth()->user()->id)->value('id');//proprietar
        if($subq==null)//fara datele firmei complete
        {
            return redirect('insert-business');
        }
        $licitatii=DB::table('licitaties')->where('id_firma',$subq)->get();
        
        return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
    }
    public function cauta_licitatie_formulare(Request $request)
    {
        $cautare_text=trim($request->cautare_text);
        $cautare_atribut=$request->cautare_atribut;
        if(auth()->user()->id_firma!=null)//imputernicit
        {
            if($cautare_text==null)
            {
                $licitatii=DB::table('licitaties')->where('id_firma',auth()->user()->id_firma)->get();
                return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
            }
            $licitatii=DB::table('licitaties')->where('id_firma',auth()->user()->id_firma)->where($cautare_atribut,'LIKE','%'.$cautare_text.'%')->get();
            return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
        }
        $subq=DB::table('firmas')->select('id')->where('id_user',auth()->user()->id)->value('id');//proprietar
        if($cautare_text==null)
            {
                $licitatii=DB::table('licitaties')->where('id_firma',$subq)->get();
                return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
            }
        $licitatii=DB::table('licitaties')->where('id_firma',$subq)->where($cautare_atribut,'LIKE','%'.$cautare_text.'%')->get();
        
        return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
    }
    public function alesLicitatie(Request $request)
    {
        $id_lic=$request->id_lic;
        $tipuri_formulare=DB::table('tip_formulars')->get();
        return view("generare.tabel_formulare",['id_lic'=>$id_lic],['tipuri_formulare'=>$tipuri_formulare]);
    }
    public function alesFormular(Request $request)
    {
        $id_lic=$request->id_lic;
        $id_form=$request->id_form;
        $tipuri_formulare=DB::table('tip_formulars')->where('id',$id_form)->get();
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        $firma=DB::table('firmas')->where('id',$licitatie[0]->id_firma)->get();
        $loturi=DB::table('lots')->where('id_licitatie',$licitatie[0]->id)->get();
        
        $file=fopen($tipuri_formulare[0]->template_path,"r");
        $text=$file.fread($file,filesize($tipuri_formulare[0]->template_path));
        $text=str_replace("l_beneficiar",$licitatie[0]->beneficiar,$text);
        $text=str_replace("l_adresa",$licitatie[0]->adresa.", ".$licitatie[0]->localitate.", ".$licitatie[0]->tara,$text);
        $text=str_replace("l_telefon",$licitatie[0]->telefon,$text);
        $text=str_replace("l_fiscal",$licitatie[0]->cod_fiscal,$text);
        $text=str_replace("l_titlu",$licitatie[0]->titlu,$text);
        $text=str_replace("l_tip",$licitatie[0]->tip_contract,$text);
        $text=str_replace("l_valoare",$licitatie[0]->valoare_totala_ftva,$text);
        $text=str_replace("l_numar_referinta",$licitatie[0]->numar_referinta,$text);
        $text=str_replace("l_moneda",$licitatie[0]->moneda,$text);
        $text=str_replace("f_denumire",$firma[0]->nume_firma,$text);
        $text=str_replace("f_numeadmin",$firma[0]->nume_admin,$text);
        $text=str_replace("f_fiscal",$firma[0]->cod_fiscal,$text);
        $text=str_replace("f_adresa",$firma[0]->adresa_firma,$text);
        $text=str_replace("f_email",$firma[0]->email_firma,$text);
        $text=str_replace("f_numar_inregistrare",$firma[0]->numar_inregistrare,$text);
        $text=str_replace("f_data_inregistrare",$firma[0]->data_inregistrare,$text);
        $text=str_replace("f_cod_fiscal",$firma[0]->cod_fiscal,$text);
        $text=str_replace("f_telefon",$firma[0]->telefon,$text);
        $text=str_replace("f_cf1",$firma[0]->cf_1,$text);
        $text=str_replace("f_cf2",$firma[0]->cf_2,$text);
        $text=str_replace("f_cf3",$firma[0]->cf_3,$text);
        $text=str_replace("c_data",date("d-m-y"),$text);
        $text=str_replace("lt_durata",$loturi[0]->durata_contract,$text);

        
        return view("generare.generator_formular",['id_lic'=>$id_lic,'pdf'=>$text,'tip_form'=>$tipuri_formulare]);
    }
    public function salvezFormular(Request $request)
    {
        
        if(auth()->user()->id_firma!=null)//imputernicit
        {
            $licitatii=DB::table('licitaties')->where('id_firma',auth()->user()->id_firma)->get();
            
            return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
        }
        $subq=DB::table('firmas')->select('id')->where('id_user',auth()->user()->id)->value('id');//proprietar
        $licitatii=DB::table('licitaties')->where('id_firma',$subq)->get();
        return view("generare\alegere_licitatie",['licitatii'=>$licitatii]);
    }
}
