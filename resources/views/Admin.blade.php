<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Админка</title>
    <link rel="stylesheet" href="{{asset('fonts/FiraSans/firasans.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/NotoSans/noto.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/Montserrat/montserrat.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/js/solid.min.js" crossorigin="anonymous"></script>--}}
{{--    <script src="https://kit.fontawesome.com/806649822f.js" crossorigin="anonymous"></script>--}}
</head>
<body>
<div id="admin-panel">
    <admin></admin>
</div>
<script src="{{asset('js/admin.js')}}"></script>
</body>
</html>
