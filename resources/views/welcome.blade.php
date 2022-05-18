<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="antialiased relative flex flex-row justify-center items-center min-h-screen bg-gray-100 dark:bg-gray-900 text-white">
        <div id="example"></div> 
        <div id="root"></div> 
        <script src="{{ mix('js/app.js')}}"> </script>
    </body>
</html>