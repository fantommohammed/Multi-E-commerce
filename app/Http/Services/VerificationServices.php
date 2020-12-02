<?php


namespace App\Http\Services;

use App\Models\User;
use App\Models\User_verification;
use Illuminate\Support\Facades\Auth;


class VerificationServices
{
    /** set OTP code for mobile
     * @param $data
     *
     * @return User_verification
     */
    public function setVerificationCode($data)
    {
        $otp = mt_rand(100000, 999999);
        $data['otp'] = $otp;
        User_verification::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
        return User_verification::create($data);
    }

    public function getSMSVerifyMessageByAppName( $otp)
    {
        $message = " is your verification code for your account";
        return $otp.$message;
    }

    public function checkOTPCode ($otp)
    {

        if (Auth::guard()->check()) {
            $verificationData = User_verification::where('user_id',Auth::id()) -> first();

            if($verificationData -> otp == $otp){
                User::whereId(Auth::id()) -> update(['email_verified_at' => now()]);
                return true;
            }else{
                return false;
            }
        }
        return false ;
    }

    public function removeOTPCode($otp)
    {
        User_verification::where('otp',$otp) -> delete();
    }

}
