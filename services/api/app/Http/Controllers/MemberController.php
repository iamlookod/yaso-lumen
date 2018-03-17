<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use DB;
use App\Model\Member;

class MemberController extends BaseController
{
    public function getData(){
        $username = "3350100215311";
        $password = "000001";

        $items = Member::where('member_idcard','=',$username)->where('member_idca','=',$password)->first();

        return $items;
    }

    public function postData(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        $items = Member::where('member_idcard','=',$username)->where('member_idca','=',$password)->first();

        return $items;
    }
}
