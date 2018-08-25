<!DOCTYPE html>
{{--<html lang="en">--}}
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <link rel="shortcut icon" href="{{ asset('images/KE{PHA-code.png') }}">

    <title>CRUD | Vue JS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

<div class="body_content" id="app">
    @yield('content')
</div>

<!-- script -->
{{--<script type="application/javascript" src="{{ asset('js/jquery.min.js') }}"></script>--}}
<script type="application/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>

