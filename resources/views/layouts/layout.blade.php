<!DOCTYPE html>
<html>
    <head>
        <title>UrlSauce</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- required for ajax to work! -->
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
