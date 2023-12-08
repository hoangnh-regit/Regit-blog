<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet" />
    <link href="https://fonts.cdnfonts.com/css/svn-gilroy" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css') }}">
    @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>

<body>
    @include('components.message')
    @yield('content')
</body>

</html>
