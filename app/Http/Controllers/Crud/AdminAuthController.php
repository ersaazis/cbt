<?php namespace App\Http\Controllers\Crud;

use App\LembagaPkbm;
use ersaazis\cb\exceptions\CBValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends \ersaazis\cb\controllers\AdminAuthController
{
    public function getLogout()
    {
        $role=cb()->session()->roleId();
        auth()->logout();
        if($role == 2)
            return cb()->redirect(url("wb/login"), cbLang('you_have_been_logged_out'), 'success');
        else if($role == 3)
            return cb()->redirect(url("pemeriksa/login"), cbLang('you_have_been_logged_out'), 'success');
        else
            return cb()->redirect(cb()->getAdminUrl("login"), cbLang('you_have_been_logged_out'), 'success');
    }

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
        try{
            if($this->isSuspendedLogin()) throw new CBValidationException(cbLang("you_have_been_suspended"));

            cb()->validation([
                'nisn'=>'required',
            ]);

            $credential = request()->only(['nisn']);
            $credential['cb_roles_id']=2;
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
                return redirect(url("wb/login"))->with(['message'=>"NISN Salah, Pastikan Email anda telah diverifikasi.",'message_type'=>'warning']);
            }
        }catch (CBValidationException $e) {
            return cb()->redirect(url("wb/login"),$e->getMessage(),'warning');
        }
    }

    public function getLoginPKBM()
    {
        if(!auth()->guest()) return redirect(cb()->getAdminUrl());

        cbHook()->hookGetLogin();

        $data = [];
        $data['no1'] = rand(1,10);
        $data['no2'] = rand(1,10);
        Session::put("captcha_result", $data['no1']+$data['no2']);

        return view('loginPEMERIKSA', $data );
    }
    public function postLoginPKBM()
    {
        try{
            if($this->isSuspendedLogin()) throw new CBValidationException(cbLang("you_have_been_suspended"));

            cb()->validation([
                'npsn'=>'required',
                'password'=>'required',
            ]);

            $credential = request()->only(['password']);
            $npsn=LembagaPkbm::where('npsn',request('npsn'))->first();
            if($npsn)
                $credential['lembaga_pkbm_id']=$npsn->id;
            else
                $credential['lembaga_pkbm_id']=0;
            $credential['cb_roles_id']=3;
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
                return redirect(url("pemeriksa/login"))->with(['message'=>"NPSN atau Password Salah, Pastikan Email anda telah diverifikasi.",'message_type'=>'warning']);
            }
        }catch (CBValidationException $e) {
            return cb()->redirect(url("pemeriksa/login"),$e->getMessage(),'warning');
        }
    }

}
