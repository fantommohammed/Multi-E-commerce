<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Http\Services\VerificationServices;

class VerificationCodeController extends Controller
{
    public $verificationService;
    public function __construct(VerificationServices $verificationService)
    {
        $this  -> verificationService = $verificationService;
    }
    public function verify(VerificationRequest $request)
    {
        $check = $this ->  verificationService -> checkOTPCode($request -> otp);
        if(!$check){  // code not correct
            //  return 'you enter wrong code ';
            return redirect() -> route('get.verification.form')-> withErrors(['otp' => 'ألكود الذي ادخلته غير صحيح ']);
        }else {  // verifiction code correct
            $this ->  verificationService -> removeOTPCode($request -> otp);
            return redirect()->route('home');
        }
    }
    public function getVerifyPage()
    {
        return view('auth.verification') ;
    }
}

