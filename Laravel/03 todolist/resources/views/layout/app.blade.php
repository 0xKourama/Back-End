<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('inc.navbar')
    @include('inc.messages')
    <div class="container">
        @yield('content')
    </div>
<footer class="text-center">CopyRight &copy; 2020</footer>
</body>
</html>
