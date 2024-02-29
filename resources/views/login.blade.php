@extends('layout.master')

@section('title', 'Login')

@section('content')
    <div class="container w-25 p-5">
        <div class="justify-content-center bg-white rounded">
            <div class="container-content">
                <form class="margin-t" action="" method="post">
                    <div class="form-group">
                        <a href="{{route('dashboard')}}" class="logo">
                            <img src="assets/images/inc-logo.jpg" alt="InC Logo">
                        </a>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter email*" id="email" name="email" value="{{old('email') }}" autofocus tabindex="1"/>

                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Enter password*" class="form-control form-control-merge" id="password" name="password" tabindex="2" />

                    </div>
                    <button type="submit" class="form-button button-l margin-b" tabindex="3">Sign In</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css" rel="stylesheet"> --}}
    <style>
        /* li.paginate_button.page-item.active a, .btn-custom-blue {
            background: #64feda !important;
            border: #00bdfe;
        }

        .btn-custom-blue{
            margin: 0px 2px;
        }

        #DataTables_Table_0_length{
            display: none;
        } */
    </style>
@endsection

@section('js')
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js"></script> --}}

@endsection
