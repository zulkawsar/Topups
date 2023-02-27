<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title> @yield('title','Topup Users')</title>
        @include('partials.header')

    </head>
    <body class="antialiased">

        <div class="container mt-5 p-5 ">
            <div class="row">
                @yield('content')
            </div>
        </div>
        @include('partials.footer')
        
        @yield('page-js')
    </body>
</html>
