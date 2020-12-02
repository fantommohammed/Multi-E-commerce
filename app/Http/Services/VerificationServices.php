<?php

namespace App\Http\Services;

use App\Models\User_verification;
use Request;
class VerificationServices
{
    /** set OTP code for mobile
     * @param $data
     *
     * @return User_verification
     */
     public function setVerificationCode($data)
     {
         $code = mt_rand(100000, 999999);
         $data['otp'] = $code;
         User_verification::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
         return User_verification::create($data);
     }

    public function getSMSVerifyMessageByAppName( $code)
    {
        $message = " is your verification code for your account";
        return $code.$message;
    }
}
