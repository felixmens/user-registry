<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome/font-awesome.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">   
    <title>{{config('app.name', 'User Listings')}}</title>
</head>
<body>
    <!-- header section -->
        <div class="header">
            <h1 class="text-center text-white">User Listing</h1>
        </div>
    <!--end header-->

    <!-- content section -->
        <div class="container">
            @yield('content')       
        </div>
    <!--end content -->

    <!--footer section -->
        <div class="footer">
            <p class="text-center">Copyright User Listing App</p>
        </div>
    <!-- end footer-->

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>