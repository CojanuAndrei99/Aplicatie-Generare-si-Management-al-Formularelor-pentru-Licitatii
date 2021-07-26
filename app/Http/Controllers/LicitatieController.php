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

class LicitatieController extends Controller
{
    public static function em(string $word) {

        $word = str_replace("@","%40",$word);
        $word = str_replace("`","%60",$word);
        $word = str_replace("¢","%A2",$word);
        $word = str_replace("£","%A3",$word);
        $word = str_replace("¥","%A5",$word);
        $word = str_replace("|","%A6",$word);
        $word = str_replace("«","%AB",$word);
        $word = str_replace("¬","%AC",$word);
        $word = str_replace("¯","%AD",$word);
        $word = str_replace("º","%B0",$word);
        $word = str_replace("±","%B1",$word);
        $word = str_replace("ª","%B2",$word);
        $word = str_replace("µ","%B5",$word);
        $word = str_replace("»","%BB",$word);
        $word = str_replace("¼","%BC",$word);
        $word = str_replace("½","%BD",$word);
        $word = str_replace("¿","%BF",$word);
        $word = str_replace("À","%C0",$word);
        $word = str_replace("Á","%C1",$word);
        $word = str_replace("Â","%C2",$word);
        $word = str_replace("Ã","%C3",$word);
        $word = str_replace("Ä","%C4",$word);
        $word = str_replace("Å","%C5",$word);
        $word = str_replace("Æ","%C6",$word);
        $word = str_replace("Ç","%C7",$word);
        $word = str_replace("È","%C8",$word);
        $word = str_replace("É","%C9",$word);
        $word = str_replace("Ê","%CA",$word);
        $word = str_replace("Ë","%CB",$word);
        $word = str_replace("Ì","%CC",$word);
        $word = str_replace("Í","%CD",$word);
        $word = str_replace("Î","%CE",$word);
        $word = str_replace("Ï","%CF",$word);
        $word = str_replace("Ð","%D0",$word);
        $word = str_replace("Ñ","%D1",$word);
        $word = str_replace("Ò","%D2",$word);
        $word = str_replace("Ó","%D3",$word);
        $word = str_replace("Ô","%D4",$word);
        $word = str_replace("Õ","%D5",$word);
        $word = str_replace("Ö","%D6",$word);
        $word = str_replace("Ø","%D8",$word);
        $word = str_replace("Ù","%D9",$word);
        $word = str_replace("Ú","%DA",$word);
        $word = str_replace("Û","%DB",$word);
        $word = str_replace("Ü","%DC",$word);
        $word = str_replace("Ý","%DD",$word);
        $word = str_replace("Þ","%DE",$word);
        $word = str_replace("ß","%DF",$word);
        $word = str_replace("à","%E0",$word);
        $word = str_replace("á","%E1",$word);
        $word = str_replace("â","%E2",$word);
        $word = str_replace("ã","%E3",$word);
        $word = str_replace("ä","%E4",$word);
        $word = str_replace("å","%E5",$word);
        $word = str_replace("æ","%E6",$word);
        $word = str_replace("ç","%E7",$word);
        $word = str_replace("è","%E8",$word);
        $word = str_replace("é","%E9",$word);
        $word = str_replace("ê","%EA",$word);
        $word = str_replace("ë","%EB",$word);
        $word = str_replace("ì","%EC",$word);
        $word = str_replace("í","%ED",$word);
        $word = str_replace("î","%EE",$word);
        $word = str_replace("ï","%EF",$word);
        $word = str_replace("ð","%F0",$word);
        $word = str_replace("ñ","%F1",$word);
        $word = str_replace("ò","%F2",$word);
        $word = str_replace("ó","%F3",$word);
        $word = str_replace("ô","%F4",$word);
        $word = str_replace("õ","%F5",$word);
        $word = str_replace("ö","%F6",$word);
        $word = str_replace("÷","%F7",$word);
        $word = str_replace("ø","%F8",$word);
        $word = str_replace("ù","%F9",$word);
        $word = str_replace("ú","%FA",$word);
        $word = str_replace("û","%FB",$word);
        $word = str_replace("ü","%FC",$word);
        $word = str_replace("ý","%FD",$word);
        $word = str_replace("þ","%FE",$word);
        $word = str_replace("ÿ","%FF",$word);
        $word = str_replace("^i","i",$word);
        $word = str_replace("^I","I",$word);
        $word = str_replace("^a","a",$word);
        $word = str_replace("^A","A",$word);
        return urldecode($word);
    
    }
    public static function extractText(string $start,string $end,string $str)
    {
        $result=null;

        $p1=strpos($str,$start);
        if($p1>=0)
        {
            $p1=$p1+strlen($start);
        }
        $p2=strpos($str,$end,$p1);

        if($p1==false || $start=='')
            return null;
        
        if($p2==false || $end=='')
            $result=substr($str,$p1);
        else
            $result=substr($str,$p1,$p2-$p1);
        
        return $result;

    }

    public function addLicitatie(Request $request)
    {
        if(auth()->user()->id_firma!=null)
        {
            return view("add.add_licitatie");
        }
        if(DB::table('firmas')->select('id')->where('id_user','=',auth()->user()->id)->value('id')==null)
        {
            return redirect('insert-business');
        }
        return view("add.add_licitatie");
    }
    
    //incarcLicitatie
    public function incarcLicitatie(Request $request)
    {
        
        $request->validate([
            'dropzone' => 'required|file|mimes:pdf',
        ]);
        if($request->file()) {
            $licitatie=new licitatie();
            $fileName = time().'_'.$request->file('dropzone')->getClientOriginalName();
            $filePath = $request->file('dropzone')->storeAs('uploads', $fileName, 'public');
            $licitatie->nume_personalizat=$request->nume_personalizat;
            $licitatie->id_firma=auth()->user()->id_firma;
            if($licitatie->id_firma==null)
            {
                $licitatie->id_firma=DB::table('firmas')->where('id_user',auth()->user()->id)->value('id');
            }

            $licitatie->id_user=auth()->user()->id;
            $licitatie->fisa_date = time().'_'.$request->file('dropzone')->getClientOriginalName();
            $licitatie->file_path = '../storage/app/public/' . $filePath;
            
            $parser = new \Smalot\PdfParser\Parser();
            $pdf    = $parser->parseFile($licitatie->file_path);

            $text=$pdf->getText();
            $text = iconv("UTF-8", "ASCII//TRANSLIT//IGNORE", $text);
            $text=LicitatieController::em($text);
            $licitatie->beneficiar=trim(LicitatieController::extractText("Denumire si adrese","Cod de",$text));
            $licitatie->cod_fiscal=trim(LicitatieController::extractText("Cod de identificare fiscala:",";",$text));
            $licitatie->adresa=trim(LicitatieController::extractText("Adresa:", ";",$text));
            $licitatie->localitate=trim(LicitatieController::extractText("Localitate:",";",$text));
            $licitatie->cod_postal=trim(LicitatieController::extractText("Cod Postal:",";",$text));
            $licitatie->tara=trim(LicitatieController::extractText("Tara:",";",$text));
            $licitatie->cod_nuts=trim(LicitatieController::extractText("Codul NUTS:",";",$text));
            $licitatie->email=trim(LicitatieController::extractText("e-mail:",";",$text));
            $licitatie->telefon=trim(LicitatieController::extractText("telefon:",";",$text));
            $licitatie->fax=trim(LicitatieController::extractText("Fax:",";",$text));
            $licitatie->persoana_contact=trim(LicitatieController::extractText("contact:",";",$text));

            $licitatie->titlu=trim(LicitatieController::extractText("Titlu:\n\n","\n",$text));
            $licitatie->numar_referinta=trim(LicitatieController::extractText("Numar de referinta atribuit dosarului de autoritatea contractanta: ","\n",$text));
            $licitatie->tip_contract=trim(LicitatieController::extractText("Tip de contract:","II.1.4",$text));
            $licitatie->descriere_succinta=trim(LicitatieController::extractText("Descrierea succinta a contractului sau a achizitiei/achizitiilor","II.1.5",$text));
            $licitatie->valoare_totala_ftva=trim(LicitatieController::extractText("Valoarea estimata fara TVA :",";",$text));
            $licitatie->valoare_totala_ftva=str_replace(",",".",$licitatie->valoare_totala_ftva);
            $licitatie->moneda=trim(LicitatieController::extractText("Moneda:","\n",$text));
            $licitatie->informatii_suplimentare=trim(LicitatieController::extractText("VI.3 Informatii suplimentare","VI.4",$text));
            
            
            $licitatie->nr_loturi=trim(LicitatieController::extractText("Numarul maxim de loturi care pot fi atribuite unui singur ofertant","\n",$text));
            
            //dd($licitatie,$text);
            $licitatie->save();
            $id_lic=$licitatie->id;


            return view("add.verificare_licitatie",["licitatie"=>$licitatie,"id_lic"=>$id_lic]);
        }
   
    }
    public function verifLicitatie(Request $request)
    {
        $id_lic=$request->id_lic;
        $nume_personalizat=$request->nume_personalizat;
        $beneficiar=$request->beneficiar;
        $cod_fiscal=$request->cod_fiscal;
        $adresa=$request->adresa;
        $localitate=$request->localitate;
        $cod_postal=$request->cod_postal;
        $tara=$request->tara;
        $cod_nuts=$request->cod_nuts;
        $email=$request->email;
        $telefon=$request->telefon;
        $fax=$request->fax;
        $persoana_contact=$request->persoana_contact;
        $titlu=$request->titlu;
        $numar_referinta=$request->numar_referinta;
        $tip_contract=$request->tip_contract;
        $descriere_succinta=$request->descriere_succinta;
        $valoare_totala_ftva=$request->valoare_totala_ftva;
        $moneda=$request->moneda;
        $informatii_suplimentare=$request->informatii_suplimentare;
        $nr_loturi=$request->nr_loturi;
        DB::table('licitaties')->where('id',$id_lic)
        ->update(['beneficiar'=>$beneficiar,'cod_fiscal'=>$cod_fiscal
        ,'adresa'=>$adresa,'localitate'=>$localitate,'cod_postal'=>$cod_postal
        ,'tara'=>$tara,'cod_nuts'=>$cod_nuts,'email'=>$email
        ,'telefon'=>$telefon,'fax'=>$fax,'persoana_contact'=>$persoana_contact
        ,'titlu'=>$titlu,'numar_referinta'=>$numar_referinta,'tip_contract'=>$tip_contract,'descriere_succinta'=>$descriere_succinta
        ,'valoare_totala_ftva'=>$valoare_totala_ftva,'moneda'=>$moneda,
        'informatii_suplimentare'=>$informatii_suplimentare,'nr_loturi'=>$nr_loturi]);
        
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        #dd($licitatie[0]);
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile($licitatie[0]->file_path);
        
        $text=$pdf->getText();
        $text = iconv("UTF-8", "ASCII//TRANSLIT//IGNORE", $text);
        $text=LicitatieController::em($text);
        #dd($text);
        $loturi=trim(LicitatieController::extractText("II.2 Descriere","II.3 Ajustarea pretului contractului",$text));
        $l=1;
        for($i=0;$i<$licitatie[0]->nr_loturi-1;$i++)
        {
            $lot=new lot();
            $lot_temp=trim(LicitatieController::extractText("II.2.1 - Denumire lot\n\n".$l,"II.2.1 - Denumire lot",$loturi));
            $lot->id_licitatie=$licitatie[0]->id;
            $lot->denumire_lot=trim(LicitatieController::extractText("-","\n",$lot_temp));
            $lot->descriere_achizitie=trim(LicitatieController::extractText("Descrierea achizitiei publice","II",$lot_temp));
            $lot->criteriu_atribuire=trim(LicitatieController::extractText("Criterii de atribuire","II",$lot_temp));
            $lot->info_variante=trim(LicitatieController::extractText("Informatii privind variantele","II",$lot_temp));
            $lot->durata_contract=trim(LicitatieController::extractText("Durata contractului, concesiunii, a acordului-cadru sau a sistemului dinamic de achizitii","II",$lot_temp));
            $lot->valoare_totala_ftva=trim(LicitatieController::extractText("Valoarea estimata fara TVA :",";",$lot_temp));
            $lot->valoare_totala_ftva=str_replace(",",".",$lot->valoare_totala_ftva);
            $lot->valoare_garantie_ftva=trim(LicitatieController::extractText("Valoarea garantiei de participare: "," ",$lot_temp));
            #dd($lot,$l);
            $lot->save();
            $lista_loturi[]=$lot;
            $l++;
        }
        $lot=new lot();
        $lot_temp=trim(LicitatieController::extractText("II.2.1 - Denumire lot\n\n".$l,"II.3",$loturi));
        $lot->id_licitatie=$licitatie[0]->id;
        $lot->denumire_lot=trim(LicitatieController::extractText("-","\n",$lot_temp));
        $lot->descriere_achizitie=trim(LicitatieController::extractText("Descrierea achizitiei publice","II",$lot_temp));
        $lot->criteriu_atribuire=trim(LicitatieController::extractText("Criterii de atribuire","II",$lot_temp));
        $lot->info_variante=trim(LicitatieController::extractText("Informatii privind variantele","II",$lot_temp));
        $lot->durata_contract=trim(LicitatieController::extractText("Durata contractului, concesiunii, a acordului-cadru sau a sistemului dinamic de achizitii","II",$lot_temp));
        $lot->valoare_totala_ftva=trim(LicitatieController::extractText("Valoarea estimata fara TVA :",";",$lot_temp));
        $lot->valoare_totala_ftva=str_replace(",",".",$lot->valoare_totala_ftva);
        $lot->valoare_garantie_ftva=trim(LicitatieController::extractText("Valoarea garantiei de participare: "," ",$lot_temp));
        $lista_loturi[]=$lot;
        #dd($lista_loturi);
        $lot->save();
        return view("add.verificare_loturi",['lista_loturi'=>$lista_loturi,'nume_lic'=>$licitatie[0]->beneficiar,'id_lic'=>$licitatie[0]->id]);
    }
    public function verifLot(Request $request)
    {
        
        $id_lic=$request->id_lic;
        
        $id_lot=$request->id;
        $denumire_lot=$request->denumire_lot;
        $descriere_achizitie=$request->descriere_achizitie;
        $criteriu_atribuire=$request->criteriu_atribuire;
        $info_variante=$request->info_variante;
        $durata_contract=$request->durata_contract;
        $valoare_totala_ftva=$request->valoare_totala_ftva;
        $valoare_garantie_ftva=$request->valoare_garantie_ftva;
        for($i=1;$i<=count($denumire_lot);$i++)
        {
            DB::table('lots')->where('id',$id_lot[$i])
            ->update(['denumire_lot'=>$denumire_lot[$i],'descriere_achizitie'=>$descriere_achizitie[$i]
            ,'criteriu_atribuire'=>$criteriu_atribuire[$i],'info_variante'=>$info_variante[$i]
            ,'durata_contract'=>$durata_contract[$i],'valoare_totala_ftva'=>$valoare_totala_ftva[$i]
            ,'valoare_garantie_ftva'=>$valoare_garantie_ftva[$i]]);
        }
        
        
        return view("add.add_licitatie");
    }
    public function afisTabelLicitatii(Request $request)
    {
        if(auth()->user()->id_firma!=null)//imputernicit
        {
            $licitatii=DB::table('licitaties')->where('id_firma',auth()->user()->id_firma)->get();
            
            return view("tables/tabel_licitatii",['licitatii'=>$licitatii]);
        }
        $subq=DB::table('firmas')->select('id')->where('id_user',auth()->user()->id)->value('id');//proprietar
        if($subq==null)//fara datele firmei complete
        {
            return redirect('insert-business');
        }
        $licitatii=DB::table('licitaties')->where('id_firma',$subq)->get();
        
        return view("tables/tabel_licitatii",['licitatii'=>$licitatii]);
    }
    public function veziDetalii(Request $request)
    {
        $id_lic=$request->id_lic;
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        
        return view("tables.vezi_detalii",['licitatie'=>$licitatie]);
    }
    public function editaLicitatie(Request $request)
    {
        $id_lic=$request->id_lic;
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        return view("profile.edit_licitatie",['licitatie'=>$licitatie]);
    }
    public function editareLicitatie(Request $request)
    {
        $id_lic=$request->id_lic;
        $nume_personalizat=$request->nume_personalizat;
        $beneficiar=$request->beneficiar;
        $cod_fiscal=$request->cod_fiscal;
        $adresa=$request->adresa;
        $localitate=$request->localitate;
        $cod_postal=$request->cod_postal;
        $tara=$request->tara;
        $cod_nuts=$request->cod_nuts;
        $email=$request->email;
        $telefon=$request->telefon;
        $fax=$request->fax;
        $persoana_contact=$request->persoana_contact;
        $titlu=$request->titlu;
        $tip_contract=$request->tip_contract;
        $descriere_succinta=$request->descriere_succinta;
        $valoare_totala_ftva=$request->valoare_totala_ftva;
        $moneda=$request->moneda;
        $informatii_suplimentare=$request->informatii_suplimentare;
        $nr_loturi=$request->nr_loturi;
        DB::table('licitaties')->where('id',$id_lic)
        ->update(['beneficiar'=>$beneficiar,'cod_fiscal'=>$cod_fiscal
        ,'adresa'=>$adresa,'localitate'=>$localitate,'cod_postal'=>$cod_postal
        ,'tara'=>$tara,'cod_nuts'=>$cod_nuts,'email'=>$email
        ,'telefon'=>$telefon,'fax'=>$fax,'persoana_contact'=>$persoana_contact
        ,'titlu'=>$titlu,'tip_contract'=>$tip_contract,'descriere_succinta'=>$descriere_succinta
        ,'valoare_totala_ftva'=>$valoare_totala_ftva,'moneda'=>$moneda,
        'informatii_suplimentare'=>$informatii_suplimentare,'nr_loturi'=>$nr_loturi]);
        
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        return view("tables.vezi_detalii",['licitatie'=>$licitatie]);
    }
    public function stergeLicitatie(Request $request)
    {
        $id_lic=$request->id_lic;
        
        DB::table('lots')->where('id_licitatie','=',$id_lic)->delete();
        DB::table('licitaties')->delete($id_lic);

        return redirect("tabel_licitatii");
    }
    public function veziLoturiLicitatie(Request $request)
    {
        $nr_lot=$request->numar_lot;
        $id_lic=$request->id_lic;
        $id_lot=$request->id_lot;
        if($nr_lot>0)
        {
            
            $loturi=DB::table('lots')->where('id_licitatie',$id_lic)->get();
            $loturi=DB::table('lots')->where('id',$loturi[0]->id+$nr_lot-1)->get();
            $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
            $toate_loturile=0;
            return view("tables.vezi_loturi",['licitatie'=>$licitatie,'loturi'=>$loturi,'toate_loturile'=>$toate_loturile]);
    
        }
        $loturi=DB::table('lots')->where('id_licitatie',$id_lic)->get();
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        $toate_loturile=1;
        return view("tables.vezi_loturi",['licitatie'=>$licitatie,'loturi'=>$loturi,'toate_loturile'=>$toate_loturile]);
    }
    public function editareLoturi(Request $request)
    {
        $id_lic=$request->id_lic;
        $id_lot=$request->id_lot;
        $nr_lot=$request->numar_lot1;
        $loturi=DB::table('lots')->where('id',$id_lot)->get();
        
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        return view("profile.editare_loturi",['licitatie'=>$licitatie,'lot'=>$loturi,'nr_lot'=>$nr_lot]);
    }
    public function editatLoturi(Request $request)
    {
        $id_lic=$request->id_lic;
        $id_lot=$request->id_lot;
        
        $denumire_lot=$request->denumire_lot;
        $descriere_achizitie=$request->descriere_achizitie;
        $criteriu_atribuire=$request->criteriu_atribuire;
        $info_variante=$request->info_variante;
        $durata_contract=$request->durata_contract;
        $valoare_totala_ftva=$request->valoare_totala_ftva;
        $valoare_garantie_ftva=$request->valoare_garantie_ftva;

        DB::table('lots')->where('id',$id_lot)
        ->update(['denumire_lot'=>$denumire_lot,'descriere_achizitie'=>$descriere_achizitie
        ,'criteriu_atribuire'=>$criteriu_atribuire,'info_variante'=>$info_variante
        ,'durata_contract'=>$durata_contract,'valoare_totala_ftva'=>$valoare_totala_ftva
        ,'valoare_garantie_ftva'=>$valoare_garantie_ftva]);

        $loturi=DB::table('lots')->where('id_licitatie',$id_lic)->get();
        $licitatie=DB::table('licitaties')->where('id',$id_lic)->get();
        $toate_loturile=1;
        return view("tables.vezi_loturi",['licitatie'=>$licitatie,'loturi'=>$loturi,'toate_loturile'=>$toate_loturile]);
    }
    public function cautaLicitatie(Request $request)
    {
        $cautare_text=trim($request->cautare_text);
        $cautare_atribut=$request->cautare_atribut;
        if(auth()->user()->id_firma!=null)//imputernicit
        {
            if($cautare_text==null)
            {
                $licitatii=DB::table('licitaties')->where('id_firma',auth()->user()->id_firma)->get();
                return view("tables/tabel_licitatii",['licitatii'=>$licitatii]);
            }
            $licitatii=DB::table('licitaties')->where('id_firma',auth()->user()->id_firma)->where($cautare_atribut,'LIKE','%'.$cautare_text.'%')->get();
            return view("tables/tabel_licitatii",['licitatii'=>$licitatii]);
        }
        $subq=DB::table('firmas')->select('id')->where('id_user',auth()->user()->id)->value('id');//proprietar
        if($cautare_text==null)
            {
                $licitatii=DB::table('licitaties')->where('id_firma',$subq)->get();
                return view("tables/tabel_licitatii",['licitatii'=>$licitatii]);
            }
        $licitatii=DB::table('licitaties')->where('id_firma',$subq)->where($cautare_atribut,'LIKE','%'.$cautare_text.'%')->get();
        
        return view("tables/tabel_licitatii",['licitatii'=>$licitatii]);
    }
}
