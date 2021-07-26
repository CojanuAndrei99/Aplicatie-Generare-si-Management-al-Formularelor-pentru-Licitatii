<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\Firma;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'procesarea_datelor' => 'accepted',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->verification_code=sha1(time());
        $user->save();

        if($user!=null)
        {
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return redirect()->route('login')->with(session()->flash('alert-success', 'Contul a fost creat. Verificati-va e-mail-ul pentru a va activa contul!'));
        }
        
        return redirect()->route('login')->with(session()->flash('alert-danger', 'Ceva nu a mers bine!'));
    }
    public function verifyUser(Request $request){
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        
        if($user != null){
            $user->is_verified = 1;
            $user->email_verified_at=time();
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Contul tau este verificat.'));
        }
        return redirect()->route('login')->with(session()->flash('alert-danger', 'Cod de verificare invalid!'));
    }
}
