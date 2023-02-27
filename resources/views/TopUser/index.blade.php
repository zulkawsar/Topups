@extends('layouts.default')
@section('page-css')
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <input id="datepicker" width="276" />
    
</div>
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