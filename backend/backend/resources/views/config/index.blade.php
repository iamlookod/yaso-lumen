@extends('layouts.layout')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="app">

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
		<div class="row">
			<div class="col-md-6">

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-cogs"></i> สถานะสมาชิก</h3>

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
							<button class="btn btn-success" v-on:click="statusModal('insert','{{ route('config.store') }}')"><i class="fa fa-plus"></i> เพิ่มสถานะสมาชิก </a>
						</div>
					</div>
					<div class="box-body table-responsive">

						<table class="table table-bordered table-hover datatable">

							<thead>
								<tr>

									<th class="text-center">สถานะ</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['status'] as $key=>$val )
									<tr>

										<td class="text-center">{{ $val['status_member_name'] }}</td>
										
										<td class="text-center">
											{!! Form::open(['method' => 'DELETE','route' => ['config.destroy',$val['status_member_id']]]) !!}

											<a v-on:click="statusModal('edit','{{ route('config.update',$val['status_member_id']) }}','{{ $val['status_member_name'] }}')"  class="btn btn-xs btn-primary" style="marign-left:2px;margin-right:2px;"><i class="fa fa-pencil-square-o"></i> แก้ไข</a>
											

											<button type="submit" class="btn btn-xs btn-danger" value="Delete" style="marign-left:2px;margin-right:2px;"><i class="fa fa-trash"></i> ลบ</button>
											<input type="hidden" name="action" value="status">
											{!! Form::close() !!}
										</td>
									</tr>
								@endforeach
							
							</tbody>

						</table>

					</div>

				</div>

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-cogs"></i> เงื่อนไข</h3>

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
							<a href="{{ route('member.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มเงื่อนไข </a>
						</div>
					</div>
					<div class="box-body table-responsive">

						<table class="table table-bordered table-hover datatable">

							<thead>
								<tr>

									<th class="text-center">เงื่อนไข</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['condition'] as $key=>$val )
									<tr>

										<td class="text-center">{{ $val['condition_member_name'] }}</td>
										<td class="text-center">{{ $val['condition_member_id'] }}</td>
									</tr>
								@endforeach
							
							</tbody>

						</table>

					</div>
					
				</div>
			</div>

			<div class="col-md-6">

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-cogs"></i> หน่วยงาน</h3>

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
							<a href="{{ route('member.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มหน่วยงาน </a>
						</div>
					</div>
					<div class="box-body table-responsive">

						<table class="table table-bordered table-hover datatable">

							<thead>
								<tr>

									<th class="text-center">หน่วยงาน</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['unit'] as $key=>$val )
									<tr>

										<td class="text-center">{{ $val['unit_member_name'] }}</td>
										<td class="text-center">{{ $val['unit_member_id'] }}</td>
									</tr>
								@endforeach
							
							</tbody>

						</table>

					</div>
					
				</div>

				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"><i class="fa fa-cogs"></i> ประเภทสมาชิก</h3>

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
							<a href="{{ route('member.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> เพิ่มประเภทสมาชิก </a>
						</div>
					</div>
					<div class="box-body table-responsive">

						<table class="table table-bordered table-hover datatable">

							<thead>
								<tr>

									<th class="text-center">สถานะ</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($data['type'] as $key=>$val )
									<tr>

										<td class="text-center">{{ $val['type_member_name'] }}</td>
										<td class="text-center">{{ $val['type_member_id'] }}</td>
									</tr>
								@endforeach
							
							</tbody>

						</table>

					</div>
					
				</div>

			</div>
		</div>

    </section>
    <!-- /.content -->
	<!-- modal status -->
		<div class="modal fade" id="statusModal" style="display: none;">
			<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span><span style="display:none">@{{ nameStatus }}</span></button>
					<h4 class="modal-title">เพิ่มสถานะสมาชิก </h4>
				</div>
				{!! Form::open(['method' => 'POST','route' => 'config.store','id'=>'statusForm']) !!}
				<input name="_method" id="_method" type="hidden" value="POST">
				<div class="modal-body form-horizontal">
					<div class="form-group">
						<label for="status" class="col-sm-2 control-label">สถานะ</label>

						<div class="col-sm-10">
							<input type="text" class="form-control" id="status" name="status" placeholder="สถานะสมาชิก" v-model="status">
						</div>
					</div>
					<input type="hidden" name="action" value="status">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">ยกเลิก</button>
					<button type="submit" class="btn btn-primary">บันทึก</button>
				</div>
				{!! Form::close() !!}
			</div>
			<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>	
		<!-- end modal -->
</div>
<!-- /.content-wrapper -->
@include('config.form')

@endsection

@push('scripts')
<script>

    $(document).ready(function () {

        $('.datatable').dataTable({
            "searching": false,
            "info": false,
            "ordering": false,
            "lengthChange" : false
        });
    });

</script>

<script>

	var app = new Vue({
			el: '#app',
			data : {
				nameStatus : ''
			},
			methods: {
				statusModal: function (event,url,name) {

					if(event == 'insert')
					{
						$("#statusModal").modal();
						app.nameStatus = ''
						app.status = app.nameStatus;
						$("#statusForm").attr('action', url);
						$("#statusForm #_method").val('POST');

					}

					if(event == 'edit')
					{
						$("#statusModal").modal();
						app.nameStatus = name;
						app.status = app.nameStatus;
						$("#statusForm").attr('action', url);
						$("#statusForm #_method").val('PUT');
						
					}
					
				}
			}
		})

</script>

@endpush