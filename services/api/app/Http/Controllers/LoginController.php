<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use DB;
use App\Model\Member;

class LoginController extends BaseController
{
    public function postLogin(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $items = DB::table('member')->selectRaw("*,SUBSTRING(member_idcard, 10, 4) as genpass")->where('member_idcard','=',$username)->first();

        if($items && $items->password != null)
        {
            if($items->password == $password)
            {
                $token = md5('token'.$items->member_idcard.date('Ymdhis'));
                $updateToken = DB::table('member')->where('member_idcard','=',$username)
                                ->update(['token'=>$token]);
                if($updateToken){
                    return $token;
                }
            }
            
            
        }
        else if($items && $items->genpass == base64_decode($password))
        {
            $token = md5('token'.$items->member_idcard.date('Ymdhis'));
            $updateToken = DB::table('member')->where('member_idcard','=',$username)
                            ->update(['token'=>$token]);
            if($updateToken){
                return $token;
            }
        }
    }

}
