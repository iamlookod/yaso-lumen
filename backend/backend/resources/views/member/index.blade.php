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
            <h3 class="box-title"><i class="fa fa-briefcase"></i> ตารางสมาชิก</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-12 text-right">
                <a href="{{ route('member.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มสมาชิก </a>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-12 table-responsive">
                <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">เลขที่บัตรประชาชน</th>
                            <th class="text-center">คำนำหน้า</th>
                            <th class="text-center">ชื่อ</th>
                            <th class="text-center">นามสกุล</th>
                            <th class="text-center">Action</th>

                        </tr>
                    </thead>
                </table>
            </div>
            

        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
        Footer
        </div> -->
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


@endsection

@push('scripts')
<script>

    $(document).ready(function () {

        $('#datatable').dataTable({
            processing: true,
            serverSide: true,
            pageLength: 50,
            autoWidth :true,
            ajax: '{{ url("member/show") }}',
            columns: [

                { data: 'member_id', name: 'member_id' },
                { data: 'member_idcard', name: 'member_idcard' },
                { data: 'member_surname', name: 'member_surname' },
                { data: 'member_name', name: 'member_name' },
                { data: 'member_lastname', name: 'member_lastname' },
                { data: 'member_id', name: 'member_id' },
            ],
            order: [[0, 'asc']],

            rowCallback: function (nRow, aData, dataIndex) {
                $('td:eq(0)', nRow).css({ 'text-align': 'center', 'vertical-align': 'middle' });
                $('td:eq(1)', nRow).css({ 'text-align': 'center', 'vertical-align': 'middle' });
                $('td:eq(2)', nRow).css({ 'text-align': 'center', 'vertical-align': 'middle' });
                $('td:eq(3)', nRow).css({ 'text-align': 'center', 'vertical-align': 'middle' });
                $('td:eq(4)', nRow).css({ 'text-align': 'center', 'vertical-align': 'middle' });

                $('td:last-child', nRow).css({ 'text-align': 'center', 'vertical-align': 'middle' });

                // $('td:eq(0)', nRow).html('<input type="checkbox"  name="row[]" class="id_check" value="' + aData['id'] + '">');

                $('td:last-child', nRow).html('' +


                    '<form method="POST" action="member/' + aData['member_id'] + '" accept-charset="UTF-8">' +
                    '<input name="_method" type="hidden" value="DELETE">' +
                    '<input name="_token" type="hidden" value="{{ csrf_token() }}">' +
                    '<a href="member/' + aData['member_id'] + '/edit" class="btn btn-xs btn-primary" style="marign-left:2px;margin-right:2px;"><i class="fa fa-pencil-square-o"></i> แก้ไข</a>' +
                    '<button type="submit" class="btn btn-xs btn-danger" value="Delete" style="marign-left:2px;margin-right:2px;"><i class="fa fa-trash"></i> ลบ</button>' +
                    '</form>' 
                    

                );
            },
            oLanguage :{
                    "sProcessing":   "กำลังดำเนินการ...",
                    "sLengthMenu":   "แสดง _MENU_ แถว",
                    "sZeroRecords":  "ไม่พบข้อมูล",
                    "sInfo":         "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
                    "sInfoEmpty":    "แสดง 0 ถึง 0 จาก 0 แถว",
                    "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
                    "sInfoPostFix":  "",
                    "sSearch":       "ค้นหา: ",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "หน้าแรก",
                        "sPrevious": "ก่อนหน้า",
                        "sNext":     "ถัดไป",
                        "sLast":     "หน้าสุดท้าย"
                    }
            }
        });
    });

</script>

@endpush