<?php

namespace App\Http\Controllers;

use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
        ];
        Mail::to($email)->send(new MyTestMail($data));
        // Mail::send('emails.myTestMail',new MyTestMail($data),function($message)use ($email){
        //     $message->to($email);
        //     $message->subject('Verification');
        // });
    }
}
