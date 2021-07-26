<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Firma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ImputernicitController extends Controller
{
    public function verifImpAddImp(Request $request)
    {
        if(auth()->user()->id_firma!=null)
        {
            return redirect("home")->with(session()->flash('alert-danger', 'Nu aveti voie sa adaugati imputerniciti dintr-un cont de imputernicit!'));
        }
        if(DB::table('firmas')->select('id')->where('id_user','=',auth()->user()->id)->value('id')==null)
        {
            return redirect('insert-business');
        }
        return view("add/add_imputernicit");
    }
    public function verifImpEditFirma(Request $request)
    {
        if(auth()->user()->id_firma!=null)
        {
            return redirect("home")->with(session()->flash('alert-danger', 'Nu aveti voie sa modificati datele firmei dintr-un cont de imputernicit!'));
        }
        return view("profile/edit_firma");
    }
    //
    public function register(Request $request)
    {
        $user= new User();
        $user->name=$request->nume;
        $user->id_firma=DB::table('Firmas')->where('id_user','=',auth()->user()->id)->value('id');
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->verification_code=sha1(time());
        $user->save();

        if($user!=null)
        {
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return back()->withStatus(__('Noul utilizator a fost adaugat ca imputernicit al firmei! Pentru a-si accesa contul, acesta trebuie sa acceseze link-ul de verificare primit pe adresa acestuia .'));
        }
        
        return back()->withStatus(__( 'Ceva nu a mers bine!'));
    }
    public function afisImpTable(Request $request)
    {
        $user_id_firma=auth()->user()->id_firma;
        if(auth()->user()->id_firma!=null)
        {
            $imps=DB::table('users')->where('id_firma',auth()->user()->id_firma)->get();
            
            return view("tables/tabel_imputerniciti",['imps'=>$imps,'user_id_firma'=>$user_id_firma]);
        }
        $subq=DB::table('firmas')->select('id')->where('id_user',auth()->user()->id)->value('id');
        if($subq==null)
        {
            return redirect('insert-business');
        }
        $imps=DB::table('users')->where('id_firma',$subq)->get();
        return view("tables/tabel_imputerniciti",['imps'=>$imps,'user_id_firma'=>$user_id_firma]);
    }
    public function stergeImputernicit(Request $request)
    {
        $id_imp=$request->id_imp;
        DB::table('users')->where("id","=",$id_imp)->delete();
        return redirect("tabel_imputerniciti");
    }
    public function cautaImputernicit(Request $request)
    {
        $user_id_firma=auth()->user()->id_firma;
        $cautare_text=trim($request->cautare_text);
        $cautare_atribut=$request->cautare_atribut;
        $id_imp=$request->id_imp;
        if(auth()->user()->id_firma!=null)
        {
            if($cautare_text==null)
            {
                $imps=DB::table('users')->where('id_firma',auth()->user()->id_firma)->get();
                
                return view("tables/tabel_imputerniciti",['imps'=>$imps,'user_id_firma'=>$user_id_firma]);
            }

            $imps=DB::table('users')->where('id_firma',auth()->user()->id_firma )->where($cautare_atribut,'LIKE','%'.$cautare_text.'%')->get();
            
            return view("tables/tabel_imputerniciti",['imps'=>$imps,'user_id_firma'=>$user_id_firma]);
        }
        
        $subq=DB::table('firmas')->select('id')->where('id_user',auth()->user()->id)->value('id');
        if($cautare_text==null)
        {
            $imps=DB::table('users')->where('id_firma',$subq)->get();
            return view("tables/tabel_imputerniciti",['imps'=>$imps,'user_id_firma'=>$user_id_firma]);
        }
        $imps=DB::table('users')->where('id_firma',$subq)->where($cautare_atribut,'LIKE','%'.$cautare_text.'%')->get();
        #dd($imps);
        return view("tables/tabel_imputerniciti",['imps'=>$imps,'user_id_firma'=>$user_id_firma]);
    }
}
