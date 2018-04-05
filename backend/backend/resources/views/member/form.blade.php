@extends('layouts.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $data['title'] }}
            <small>{{ $data['subtitle'] }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-cogs"></i>แบบฟอร์มข้อมูลสมาชิก</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        @if($items == null)
            {!! Form::open(['method' => 'POST','route' => 'member.store']) !!}
        @else
            {!! Form::open(['method' => 'PUT','route' => ['member.update',$items->member_id]]) !!}
        @endif
        <div class="box-body">
            <div class="form-group {!!$errors->first('date_rq', 'has-error')!!} col-md-4">
                <label>วันที่สมัคร</label>

                <input type="text" class="form-control date-picker" readonly="" id="date_rq" name="date_rq" data-date-format="dd-mm-yyyy" value="@if($items != null) {{ date('d-m-Y',strtotime($items['member_date_rq'])) }} @endif">
                {!!$errors->first('date_rq', '<span class="control-label text-danger" for="date_rq">*:message</span>')!!}
                
            </div>
            <div class="form-group {!!$errors->first('date_rg', 'has-error')!!} col-md-4">
                <label>วันที่อนุมัติ</label>
                <input type="text" class="form-control date-picker" readonly="" id="date_rg" name="date_rg" data-date-format="dd-mm-yyyy" value="@if($items != null) {{ date('d-m-Y',strtotime($items['member_date_rg'])) }} @endif">
                {!!$errors->first('date_rg', '<span class="control-label text-danger" for="date_rg">*:message</span>')!!}
                
            </div>
            <div class="form-group {!!$errors->first('status', 'has-error')!!} col-md-4">
                <label>สถานะสมาชิก</label>
                <select class="form-control" id="status" name="status">
                    @foreach($data['status'] as $val)
                        <option value="{{ $val['status_member_id'] }}" @if($items['member_status'] == $val['status_member_id']) selected @endif>{{ $val['status_member_name'] }}</option>
                    @endforeach
                    
                </select>
                {!!$errors->first('status', '<span class="control-label text-danger" for="status">*:message</span>')!!}
            </div>

            <div class="form-group col-md-12"><hr></div>
            
            <div class="form-group {!!$errors->first('idmember', 'has-error')!!} col-md-4">
                <label>เลขที่สมาชิก</label>
                <input type="text" class="form-control" id="idmember" name="idmember" value="{{ $items['member_idca'] }}">
                {!!$errors->first('idmember', '<span class="control-label text-danger" for="idmember">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('member_type', 'has-error')!!} col-md-4">
                <label>ประเภทสมาชิก</label>
                <select class="form-control" id="member_type" name="member_type">
                    @foreach($data['type'] as $val)
                        <option value="{{ $val['type_member_id'] }}" @if($items['member_type'] == $val['type_member_id']) selected @endif>{{ $val['type_member_name'] }}</option>
                    @endforeach
                </select>
                {!!$errors->first('member_type', '<span class="control-label text-danger" for="member_type">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('unit', 'has-error')!!} col-md-4">
                <label>หน่วยสมาชิก</label>
                <select class="form-control" id="unit" name="unit">
                    @foreach($data['unit'] as $val)
                        <option value="{{ $val['unit_member_id'] }}" @if($items['member_unit'] == $val['unit_member_id']) selected @endif>{{ $val['unit_member_name'] }}</option>
                    @endforeach
                </select>
                {!!$errors->first('unit', '<span class="control-label text-danger" for="unit">*:message</span>')!!}
            </div>

            <div class="form-group {!!$errors->first('surename', 'has-error')!!} col-md-4">
                <label>คำนำหน้า</label>
                <input type="text" class="form-control" id="surename" value="{{ $items['member_surname'] }}" name="surename">
                {!!$errors->first('surename', '<span class="control-label text-danger" for="surename">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('firstname', 'has-error')!!} col-md-4">
                <label>ชื่อ</label>
                <input type="text" class="form-control" id="firstname" value="{{ $items['member_name'] }}" name="firstname">
                {!!$errors->first('firstname', '<span class="control-label text-danger" for="firstname">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('lastname', 'has-error')!!} col-md-4">
                <label>นามสกุล</label>
                <input type="text" class="form-control" id="lastname" value="{{ $items['member_lastname'] }}" name="lastname">
                {!!$errors->first('lastname', '<span class="control-label text-danger" for="lastname">*:message</span>')!!}
            </div>

            <div class="form-group {!!$errors->first('idcard', 'has-error')!!} col-md-4">
                <label>เลขที่บัตรประชาชน</label>
                <input type="text" class="form-control" id="idcard" value="{{ $items['member_idcard'] }}" name="idcard">
                {!!$errors->first('idcard', '<span class="control-label text-danger" for="idcard">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('birthdate', 'has-error')!!} col-md-4">
                <label>วันเดือนปีเกิด</label>
                <input type="text" class="form-control date-picker" readonly="" id="birthdate" name="birthdate" data-date-format="dd-mm-yyyy" value="@if($items != null) {{ date('d-m-Y',strtotime($items['member_birth'])) }} @endif">
                {!!$errors->first('birthdate', '<span class="control-label text-danger" for="birthdate">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('phone', 'has-error')!!} col-md-4">
                <label>โทรศัพท์</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $items['member_phone'] }}">
                {!!$errors->first('phone', '<span class="control-label text-danger" for="phone">*:message</span>')!!}
            </div>

            <div class="form-group col-md-12"><hr></div>

            <div class="form-group {!!$errors->first('address', 'has-error')!!} col-md-12">
                <label>ที่อยู่</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $items['member_address'] }}">
                {!!$errors->first('address', '<span class="control-label text-danger" for="address">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('tumbon', 'has-error')!!} col-md-3">
                <label>ตำบล</label>
                <input type="text" class="form-control" id="tumbon" name="tumbon" value="{{ $items['member_tumbon'] }}">
                {!!$errors->first('tumbon', '<span class="control-label text-danger" for="tumbon">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('amphur', 'has-error')!!} col-md-3">
                <label>อำเภอ</label>
                <input type="text" class="form-control" id="amphur" name="amphur" value="{{ $items['member_ampur'] }}">
                {!!$errors->first('amphur', '<span class="control-label text-danger" for="amphur">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('province', 'has-error')!!} col-md-3">
                <label>จังหวัด</label>
                <input type="text" class="form-control" id="province" name="province" value="{{ $items['member_province'] }}">
                {!!$errors->first('province', '<span class="control-label text-danger" for="province">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('idpost', 'has-error')!!} col-md-3">
                <label>รหัสไปรษณีย์</label>
                <input type="text" class="form-control" id="idpost" name="idpost" value="{{ $items['member_idpost'] }}">
                {!!$errors->first('idpost', '<span class="control-label text-danger" for="idpost">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('address_receive', 'has-error')!!} col-md-12">
                <label>ที่อยู่จัดส่งเอกสาร</label>
                <input type="text" class="form-control" id="address_receive" name="address_recieve" value="{{ $items['member_address_receive'] }}">
                {!!$errors->first('address_receive', '<span class="control-label text-danger" for="address_receive">*:message</span>')!!}
            </div>									

            <div class="form-group col-md-12"><hr></div>

            <div class="form-group {!!$errors->first('mate', 'has-error')!!} col-md-12">
                <label>คู่สมรส</label>
                <input type="text" class="form-control" id="mate" name="mate" value="{{ $items['member_mate'] }}">
                {!!$errors->first('mate', '<span class="control-label text-danger" for="mate">*:message</span>')!!}
            </div>

            <div class="form-group col-md-12"><hr></div>

            <div class="form-group {!!$errors->first('manate_name', 'has-error')!!} col-md-7">
                <label>ชื่อผู้จัดการศพ</label>
                <input type="text" class="form-control" id="manate_name" name="manate_name" value="{{ $items['member_manate_name'] }}" >
                {!!$errors->first('manate_name', '<span class="control-label text-danger" for="manate_name">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('manate_relation', 'has-error')!!} col-md-5">
                <label>ความสัมพันธ์ผู้จัดการศพ</label>
                <input type="text" class="form-control" id="manate_relation" name="manate_relation" value="{{ $items['member_manate_relation'] }}">
                {!!$errors->first('manate_relation', '<span class="control-label text-danger" for="manate_relation">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('manate_address', 'has-error')!!} col-md-12">
                <label>ที่อยู่ผู้จัดการศพ</label>
                <input type="text" class="form-control" id="manate_address" name="manate_address" value="{{ $items['member_manate_address'] }}">
                {!!$errors->first('manate_address', '<span class="control-label text-danger" for="manate_address">*:message</span>')!!}
            </div>

            <div class="form-group col-md-12"><hr></div>

            <div class="form-group {!!$errors->first('benefit_name1', 'has-error')!!} col-md-7">
                <label>ชื่อผู้รับผลประโยชน์ที่ 1</label>
                <input type="text" class="form-control" id="benefit_name1" name="benefit_name1" value="{{ $items['member_benefit_name1'] }}">
                {!!$errors->first('benefit_name1', '<span class="control-label text-danger" for="benefit_name1">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('benefit_relation1', 'has-error')!!} col-md-5">
                <label>ความสัมพันธ์ผู้รับผลประโยชน์ที่ 1</label>
                <input type="text" class="form-control" id="benefit_relation1" name="benefit_relation1" value="{{ $items['member_benefit_relation1'] }}">
                {!!$errors->first('benefit_relation1', '<span class="control-label text-danger" for="benefit_relation1">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('benefit_address1', 'has-error')!!} col-md-12">
                <label>ที่อยู่ผู้รับผลประโยชน์ที่ 1</label>
                <input type="text" class="form-control" id="benefit_address1" name="benefit_address1" value="{{ $items['member_benefit_address1'] }}">
                {!!$errors->first('benefit_address1', '<span class="control-label text-danger" for="benefit_address1">*:message</span>')!!}
            </div>

            <div class="form-group col-md-12"><hr></div>

            <div class="form-group {!!$errors->first('benefit_name2', 'has-error')!!} col-md-7">
                <label>ชื่อผู้รับผลประโยชน์ที่ 2</label>
                <input type="text" class="form-control" id="benefit_name2" name="benefit_name2" value="{{ $items['member_benefit_name2'] }}">
                {!!$errors->first('benefit_name2', '<span class="control-label text-danger" for="benefit_name2">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('benefit_relation2', 'has-error')!!} col-md-5">
                <label>ความสัมพันธ์ผู้รับผลประโยชน์ที่ 2</label>
                <input type="text" class="form-control" id="benefit_relation2" name="benefit_relation2" value="{{ $items['member_benefit_relation2'] }}">
                {!!$errors->first('benefit_relation2', '<span class="control-label text-danger" for="benefit_relation2">*:message</span>')!!}
            </div>
            <div class="form-group {!!$errors->first('benefit_address2', 'has-error')!!} col-md-12">
                <label>ที่อยู่ผู้รับผลประโยชน์ที่ 2</label>
                <input type="text" class="form-control" id="benefit_address2" name="benefit_address2" value="{{ $items['member_benefit_address2'] }}">
                {!!$errors->first('benefit_address2', '<span class="control-label text-danger" for="benefit_address2">*:message</span>')!!}
            </div>

            <div class="form-group col-md-12"><hr></div>

            <div class="form-group col-md-7">
                <label>ชื่อผู้รับผลประโยชน์ที่ 3</label>
                <input type="text" class="form-control" id="benefit_name3" name="benefit_name3" value="{{ $items['member_benefit_name3'] }}">

            </div>
            <div class="form-group col-md-5">
                <label>ความสัมพันธ์ผู้รับผลประโยชน์ที่ 3</label>
                <input type="text" class="form-control" id="benefit_relation3" name="benefit_relation3" value="{{ $items['member_benefit_relation3'] }}">

            </div>
            <div class="form-group col-md-12">
                <label>ที่อยู่ผู้รับผลประโยชน์ที่ 3</label>
                <input type="text" class="form-control" id="benefit_address3" name="benefit_address3" value="{{ $items['member_benefit_address3'] }}">

            </div>
            
            <div class="form-group col-md-12"><hr></div>

            <div class="form-group {!!$errors->first('choice', 'has-error')!!} col-md-12">
                <label>รูปแบบเงื่อนไขที่ 1</label>
                <select class="form-control" id="choice" name="choice">
                    @foreach($data['condition'] as $val)
                        <option value="{!! $val['condition_member_id'] !!}" @if($items['member_choice'] == $val['condition_member_id']) selected @endif>{{ $val['condition_member_name'] }}</option>
                    @endforeach
                </select>
                {!!$errors->first('choice', '<span class="control-label text-danger" for="choice">*:message</span>')!!}
            </div>
            <div class="form-group col-md-12">
                <label>รูปแบบเงื่อนไขที่ 2</label>
                <input type="text" class="form-control" id="choice2" name="choice2" value="{{ $items['member_choice2'] }}">
            </div>



        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">บันทึก</button>
            <button type="button" class="btn btn-default pull-left">ยกเลิก</button>
        </div>
        <!-- /.box-footer-->
        {!! Form::close() !!}
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@push('scripts')
<script>
    $(function(){
        $('.date-picker').datepicker({
            language: 'th',
            autoclose: true
        });
    });
    
</script>
@endpush