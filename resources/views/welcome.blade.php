<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

    </head>
    <body>
    <div id="yb-site">
        <ytitle :title="'test'"></ytitle>
    </div>
    <script src="{{asset('js/site.js')}}"></script>

    </body>
</html>
