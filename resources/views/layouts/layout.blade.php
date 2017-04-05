<!DOCTYPE html>
<html>
    <head>
        <title>UrlSauce</title>
        <!-- <img src="{{ asset('urlsauceLogo.png') }}" alt="logo"> -->
        <link rel="icon" href="{{ asset('urlsauceLogo.png') }}">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
        <style>
            body {
                background-color: rgb(250,250,250);
            }
        </style>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- required for ajax to work! -->
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
