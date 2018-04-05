<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Http\Requests\memberRequest;
use App\Member;
use App\Status;
use App\Type;
use App\Conditions;
use App\Unit;

use App\Helpers\General;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->data['menu'] = 'member';
        $this->data['title'] = 'ระบบสมาชิก';
        $this->data['subtitle'] = '';
    }

    public function index()
    {
        $this->data['subtitle'] = 'ข้อมูลสมาชิก';

        return view('member.index',['data'=>$this->data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->data['subtitle'] = 'เพิ่มสมาชิก';

        $this->data['status'] = Status::all();

        $this->data['type'] = Type::all();

        $this->data['unit'] = Unit::all();

        $this->data['condition'] = Conditions::all();

        $items = null;
        
        return view('member.form',['data'=>$this->data,'items'=>$items]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(memberRequest $request)
    {
        try
        {
            $model = new Member;

            $model->member_idcard = $request->idcard;
            $model->member_idca = $request->idmember;
            $model->member_date_rq = General::dateToBase($request->date_rq);
            $model->member_date_rg = General::dateToBase($request->date_rg);
            $model->member_status = $request->status;
            $model->member_type = $request->member_type;
            $model->member_unit = $request->unit;
            $model->member_surname = $request->surename;
            $model->member_name = $request->firstname;
            $model->member_lastname = $request->lastname;
            $model->member_phone = $request->phone;
            $model->member_birth = General::dateToBase($request->birthdate);
            $model->member_address = $request->address;
            $model->member_tumbon = $request->tumbon;
            $model->member_ampur = $request->amphur;
            $model->member_province = $request->province;
            $model->member_idpost = $request->idpost;
            $model->member_address_receive = $request->address_recieve;
            $model->member_mate = $request->mate;
            $model->member_manate_name = $request->manate_name;
            $model->member_manate_relation = $request->manate_relation;
            $model->member_manate_address = $request->manate_address;
            $model->member_benefit_name1 = $request->benefit_name1;
            $model->member_benefit_address1 = $request->benefit_address1;
            $model->member_benefit_relation1 = $request->benefit_relation1;
            $model->member_benefit_name2 = $request->benefit_name2;
            $model->member_benefit_address2 = $request->benefit_address2;
            $model->member_benefit_relation2 = $request->benefit_relation2;
            $model->member_benefit_name3 = $request->benefit_name3;
            $model->member_benefit_address3 = $request->benefit_address3;
            $model->member_benefit_relation3 = $request->benefit_relation3;
            $model->member_choice = $request->choice;
            $model->member_choice2 = $request->choice2;
            $model->password = '';
            $model->token = '';

            $result = $model->save();
            session()->flash('success', 'success');

            return redirect('member');

        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            session()->flash('error', 'error');

            return back();  
        }

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Member::select('member_id','member_idcard','member_name','member_lastname','member_surname');

        return Datatables::of($data)->make(true);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['subtitle'] = 'แก้ไขข้อมูลสมาชิก';

        $this->data['status'] = Status::all();

        $this->data['type'] = Type::all();

        $this->data['unit'] = Unit::all();

        $this->data['condition'] = Conditions::all();

        $items = Member::findOrfail($id);
        
        return view('member.form',['data'=>$this->data,'items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(memberRequest $request, $id)
    {
        try
        {
            $model = Member::find($id);

            $model->member_idcard = $request->idcard;
            $model->member_idca = $request->idmember;
            $model->member_date_rq = General::dateToBase($request->date_rq);
            $model->member_date_rg = General::dateToBase($request->date_rg);
            $model->member_status = $request->status;
            $model->member_type = $request->member_type;
            $model->member_unit = $request->unit;
            $model->member_surname = $request->surename;
            $model->member_name = $request->firstname;
            $model->member_lastname = $request->lastname;
            $model->member_phone = $request->phone;
            $model->member_birth = General::dateToBase($request->birthdate);
            $model->member_address = $request->address;
            $model->member_tumbon = $request->tumbon;
            $model->member_ampur = $request->amphur;
            $model->member_province = $request->province;
            $model->member_idpost = $request->idpost;
            $model->member_address_receive = $request->address_recieve;
            $model->member_mate = $request->mate;
            $model->member_manate_name = $request->manate_name;
            $model->member_manate_relation = $request->manate_relation;
            $model->member_manate_address = $request->manate_address;
            $model->member_benefit_name1 = $request->benefit_name1;
            $model->member_benefit_address1 = $request->benefit_address1;
            $model->member_benefit_relation1 = $request->benefit_relation1;
            $model->member_benefit_name2 = $request->benefit_name2;
            $model->member_benefit_address2 = $request->benefit_address2;
            $model->member_benefit_relation2 = $request->benefit_relation2;
            $model->member_benefit_name3 = $request->benefit_name3;
            $model->member_benefit_address3 = $request->benefit_address3;
            $model->member_benefit_relation3 = $request->benefit_relation3;
            $model->member_choice = $request->choice;
            $model->member_choice2 = $request->choice2;

            $result = $model->save();
            session()->flash('success', 'success');

            return back();

        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            session()->flash('error', 'error');

            return back();  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $model = Member::find($id);
            $model->delete();

            session()->flash('success', 'success');

            return back();
        }
        catch(\Illuminate\Database\QueryException $ex)
        {
            session()->flash('error', 'error');

            return back();  
        }
    }
}
