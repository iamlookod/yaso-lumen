<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use DB;
use App\Model\Member;

class MemberController extends BaseController
{
    
    public function postData(Request $request){
        $token = $request->input('token');

        $items = Member::join('type_member' ,'member_type', '=', 'type_member_id')
                    ->join('status_member', 'member_status', '=', 'status_member_id')
                    ->join('condition_member', 'member_choice', '=', 'condition_member_id')
                    ->join('unit_member', 'member_unit', '=', 'unit_member_id')
                    ->where('token','=',$token)->first();

        return $items;
    }

    public function postPassword(Request $request){
        $token = $request->input('token');

        $password = $request->input('new_password');

        $items = Member::where('token','=',$token)->update(['password'=>$password]);

        return $items;

    }
}
