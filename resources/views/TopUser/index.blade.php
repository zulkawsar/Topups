@extends('layouts.default')
@section('page-css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .swal2-styled {
            padding: 0px !important;
            margin: 0px  !important;
        }
    </style>
@endsection
@section('content')
    <form method="post" action="{{route('topup.users')}}">
        @csrf
        <div class="row">
            <div class="col-3">
                <input id="datepicker" name="date" />
            </div>
            <div class="col-5">
                <button type="submit" class="btn btn-primary">Generate Topup</button>
            </div> 
        </div>
    </form>   
<div class="card p-0">

    <div class="card-header"> Top topup users </div>
    <div class="card-body">
        {!! $PredataTable->table() !!}
    </div>
</div>
@endsection

@section('page-js')
    {!! $PredataTable->scripts() !!}
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });
    </script>
@endsection