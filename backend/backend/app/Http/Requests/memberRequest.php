<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class memberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "date_rq" => 'required',
            "date_rg" => 'required',
            "status" => 'required',
            "idmember" => 'required',
            "member_type" => 'required',
            "unit" => 'required',
            "surename" => 'required',
            "firstname" => 'required',
            "lastname" => 'required',
            "idcard" => 'required',
            "birthdate" => 'required',
            "phone" => 'required',
            "address" => 'required',
            "tumbon" => 'required',
            "amphur" => 'required',
            "province" => 'required',
            "idpost" => 'required',
            "address_recieve" => 'required',
            "mate" => 'required',
            "manate_name" => 'required',
            "manate_relation" => 'required',
            "manate_address" => 'required',
            "benefit_name1" => 'required',
            "benefit_relation1" => 'required',
            "benefit_name2" => 'required',
            "benefit_relation2" => 'required',
            "benefit_address2" => 'required',
            "choice" => 'required',
        ];
    }

    public function messages(){
        return [
            "date_rq.required" => 'ระบุข้อมูล',
            "date_rg.required" => 'ระบุข้อมูล',
            "status.required" => 'ระบุข้อมูล',
            "idmember.required" => 'ระบุข้อมูล',
            "member_type.required" => 'ระบุข้อมูล',
            "unit.required" => 'ระบุข้อมูล',
            "surename.required" => 'ระบุข้อมูล',
            "firstname.required" => 'ระบุข้อมูล',
            "lastname.required" => 'ระบุข้อมูล',
            "idcard.required" => 'ระบุข้อมูล',
            "birthdate.required" => 'ระบุข้อมูล',
            "phone.required" => 'ระบุข้อมูล',
            "address.required" => 'ระบุข้อมูล',
            "tumbon.required" => 'ระบุข้อมูล',
            "amphur.required" => 'ระบุข้อมูล',
            "province.required" => 'ระบุข้อมูล',
            "idpost.required" => 'ระบุข้อมูล',
            "address_recieve.required" => 'ระบุข้อมูล',
            "mate.required" => 'ระบุข้อมูล',
            "manate_name.required" => 'ระบุข้อมูล',
            "manate_relation.required" => 'ระบุข้อมูล',
            "manate_address.required" => 'ระบุข้อมูล',
            "benefit_name1.required" => 'ระบุข้อมูล',
            "benefit_relation1.required" => 'ระบุข้อมูล',
            "benefit_name2.required" => 'ระบุข้อมูล',
            "benefit_relation2.required" => 'ระบุข้อมูล',
            "benefit_address2.required" => 'ระบุข้อมูล',
            "choice.required" => 'ระบุข้อมูล',
        ];
    }
}
