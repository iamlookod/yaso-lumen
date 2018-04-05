<div class="modal fade" id="statusModal" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-primary">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
            <h4 class="modal-title">เพิ่มสถานะสมาชิก</h4>
        </div>
        {!! Form::open(['method' => 'POST','route' => 'config.store','id'=>'statusForm']) !!}
        <input name="_method" id="_method" type="hidden" value="POST">
        <div class="modal-body form-horizontal">
            <div class="form-group">
                  <label for="status" class="col-sm-2 control-label">สถานะ @{{ name }}</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="status" name="status" placeholder="สถานะสมาชิก" value='name'>
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