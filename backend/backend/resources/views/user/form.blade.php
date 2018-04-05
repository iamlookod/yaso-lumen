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
            {!! Form::open(['method' => 'POST','route' => 'user.store']) !!}
        @else
            {!! Form::open(['method' => 'PUT','route' => ['user.update',$items->id]]) !!}
        @endif
        <div class="box-body form-horizontal">
            <div class="form-group {!!$errors->first('name', 'has-error')!!}">
                <label for="name" class="col-sm-2 control-label">ชื่อ-สกุล</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="ชื่อ-สกุล" name="name" value="@if(!old('name')){{ $items['name'] }}@else{{ old('name') }}@endif" required autofocus>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                </div>
            </div>
            <div class="form-group {!!$errors->first('username', 'has-error')!!}">
                <label for="username" class="col-sm-2 control-label">ชื่อผู้ใช้งาน</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="username" placeholder="ชื่อผู้ใช้งาน" name="username" value="@if(!old('username')){{ $items['username'] }}@else{{ old('username') }}@endif" required>
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
                </div>
            </div>
            <div class="form-group {!!$errors->first('password', 'has-error')!!}">
                <label for="password" class="col-sm-2 control-label">รหัสผ่าน</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password" name="password" placeholder="รหัสผ่าน" required>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                </div>
            </div>
            <div class="form-group {!!$errors->first('password', 'has-error')!!}">
                <label for="password_confirmation" class="col-sm-2 control-label">รหัสผ่านอีกครั้ง</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="รหัสผ่านอีกครั้ง" required>
                </div>
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