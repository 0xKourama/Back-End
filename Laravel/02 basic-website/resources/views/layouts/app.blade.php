<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basic Web-Site</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @if(Request::is('/'))
                @include('inc.showcase')
            @endif

            @include('inc.messages')
            <div class="row">
                <div class="col-md-8 col-lg-8">
                    @yield('content')
                </div>
                <div class="col-md-4 col-lg-4">
                    @include('inc.sidebar')
                </div>
            </div>

        </div>

        <footer>
            <p id="footer" class="text-center">Copyright 2020 &copy; Yasser_Elsnbary</p>
        </footer>
    </body>
</html>
