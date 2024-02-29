@extends('layout.master')

@section('title', 'Welcome')

@section('content')
    <div class="justify-content-center bg-white rounded">
        <div class="container p-4">
            <table class="table table-striped" id="data-table">
                <thead>
                <tr>
                    <td>S No.</td>
                    <td>Name</td>
                    <td>Phone Number</td>
                    <td>Email Address</td>
                    <td>Added At</td>
                    <td>Actions</td>
                    {{--                <th>Picture</th>--}}
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" rel="stylesheet">
    <style>
        li.paginate_button.page-item.active a, .btn-custom-blue {
            background: #64feda !important;
            border: #00bdfe;
        }

        .btn-custom-blue{
            margin: 0px 2px;
        }

        .linkedin-logo{
            float: right;
            margin-right: 5%;
        }

        .dt-length{
            display: none;
        }

        table.dataTable th.dt-type-numeric, table.dataTable th.dt-type-date, table.dataTable td.dt-type-numeric, table.dataTable td.dt-type-date {
            text-align: left;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #26a69a;
            background-color: #64feda;
            border-color: #64feda;
        }

        .page-item .page-link {
            color: #26a69a;
        }

        .table>:not(:first-child){
            border-top: none !important;
        }

        div.dt-processing > div:last-child > div {
            background-color: #64feda;
        }
    </style>
@endsection

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>




    <script type="text/javascript">
        $(function () {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('profile_list') }}",
                autoWidth: false,
                lengthMenu: [[5], ['5']],
                columns: [
                    {data: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'phone_number', name: 'phone_number'},
                    {data: 'email_address', name: 'email_address'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', searchable: false, orderable: false},
                    // {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>
@endsection
