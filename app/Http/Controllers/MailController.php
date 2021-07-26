<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SignupEmail;

class MailController extends Controller
{
    //
    public static function sendSignupEmail($name,$email,$verification_code)
    {
        $data=[
            'name'=>$name,
            'verification_code'=>$verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }
}
