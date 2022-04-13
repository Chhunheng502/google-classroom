<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dodoco</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div id="app">
            <app-component></app-component>
        </div>

        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
