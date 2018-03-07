<?php

namespace App\Http\Controllers\Api;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use DB;
use App\Model\Member;

class LoginController extends BaseController
{
    public function getData(){
        // $item = Member::all();
        // return $item;
        $status = 404;
        $items = "Access denied";

        $username = "3350100215311";
        $password = "000001";

        $item = Member::where('member_idcard','=',$username)->where('member_idca','=',$password)->first();

        if($item != null || $item != '')
        {
            $status = 200;
            $items = $item;
        }

        $data = array(
                'status' => $status,
                'data' => $items
            );

        return $data;
        
    }

    public function postData(Request $request){

        $username = $request->input('username');
        $password = $request->input('password');

        $status = 404;
        $items = "Access denied";

        $item = Member::where('member_idcard','=',$username)->where('member_idca','=',$password)->first();

        if($item != null || $item != '')
        {
            $status = 200;
            $items = $item;
        }

        $data = array(
                'status' => $status,
                'data' => $items
            );

        return $data;

    }
}
