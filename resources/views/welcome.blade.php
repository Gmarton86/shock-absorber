<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
      test

      <?php

        if(isset($data)) {
            var_dump($data);
        }
      ?>

        WHEEL
      <form method="POST" action="{{route('wheel')}}">
        @csrf <!-- {{ csrf_field() }} -->
        r
        <input type="text" name="r" id="r">
        i
        <input type="text" name="i" id="i">

        <input type="submit" value="Vypočítať">
      </form>

        <form method="POST" action="{{route('cmd')}}">
        @csrf <!-- {{ csrf_field() }} -->
        cmd
        <input type="text" name="cmd" id="cmd">

        <input type="submit" value="Vypočítať">
      </form>
    </body>
</html>
