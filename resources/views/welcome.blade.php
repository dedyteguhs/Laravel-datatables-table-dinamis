<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tutorial Datatables </title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
       <table class="table responsive table-striping" id="users-table">
        {{-- class="display responsive nowrap" width="100%" --}}
        <thead>
            <tr><th></th>
                <th></th>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
            </tr>
        </thead>
    </table>
    </body>
</html>
{{-- dari Inet  --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>


<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
{{--  --}}
<script>
$(document).ready(function()
{
    $('#users-table').DataTable({

        dom: 'lBfrtip',
         select: true,
        processing: true,
        serverSide: true,
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        ajax: '{!! route('employee.show') !!}',
        columns: 
        [
      {
     defaultContent:'',
     className: 'select-checkbox',
     orderable: false
     
   },

            { "data": null,
              "sortable": false, 
              "searchable": false,
                render: function (data, type, row, meta) {
                 return meta.row + meta.settings._iDisplayStart + 1;
                }  
            },
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>