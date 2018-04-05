$(document).ready(function () {
    $('#datatable').dataTable({
        processing: true,
        serverSide: true,
        ajax: url_datatable,
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

            // $('td:last-child', nRow).html('' +

            //     '<div class="inline pull-right">' +
            //     '<form method="POST" action="http://localhost/template/backoffice/users/' + aData['id'] + '" accept-charset="UTF-8">' +
            //     '<input name="_method" type="hidden" value="DELETE">' +
            //     '<input name="_token" type="hidden" value="{{ csrf_token() }}">' +
            //     '<button type="submit" class="btn btn-sm btn-danger btn-space" value="Delete"><i class="fa fa-fw fa-minus-square"></i> ลบ</button>' +
            //     '</form>' +
            //     '</div>' +

            //     '<div class="inline pull-right">' +
            //     '<a href="users/' + aData['id'] + '/edit" class="btn btn-sm btn-info btn-space"><i class="fa fa-fw fa-minus-square"></i> แก้ไข</a>' +
            //     '</div>'
            // );
        }
    });
});