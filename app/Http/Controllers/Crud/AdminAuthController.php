<?php namespace App\Http\Controllers\Crud;

use ersaazis\cb\exceptions\CBValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends \ersaazis\cb\controllers\AdminAuthController
{
    public function getLoginWB()
    {
        if(!auth()->guest()) return redirect(cb()->getAdminUrl());

        cbHook()->hookGetLogin();

        $data = [];
        $data['no1'] = rand(1,10);
        $data['no2'] = rand(1,10);
        Session::put("captcha_result", $data['no1']+$data['no2']);

        return view('loginWB', $data );
    }

    public function postLoginWB()
    {
        // try{
            if($this->isSuspendedLogin()) throw new CBValidationException(cbLang("you_have_been_suspended"));

            cb()->validation([
                'nisn'=>'required',
            ]);

            $credential = request()->only(['nisn']);
            $credential['password']='ersaazis';
            if (auth()->attempt($credential,true)) {

                // Check if login notification is enabled
                if($this->loginNotification()) {
                    return cb()->redirect(route("AdminAuthControllerGetLoginVerification"),"We have sent you a code verification, please enter to this box");
                }

                // Update Login At
                cb()->update("users", auth()->id(), [
                   "login_at"=>now()->format("Y-m-d H:i:s"),
                   "ip_address"=>request()->ip(),
                   "user_agent"=>request()->userAgent()
                ]);

                // When login user success, clear suspend attempt
                $this->clearSuspendAttempt();

                cbHook()->hookPostLogin();

                return redirect(cb()->getAdminUrl());
            } else {
                $this->incrementFailedLogin();
                return redirect(url("login"))->with(['message'=>cbLang('password_and_username_is_wrong').", Pastikan Email anda telah diverifikasi.",'message_type'=>'warning']);
            }
        // }catch (CBValidationException $e) {
        //     return cb()->redirect(url("login"),$e->getMessage(),'warning');
        // }
    }

}
