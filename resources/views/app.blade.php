<!DOCTYPE html>
<html>
  <head>
    <title>Inertia App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="{{ url('/img/logoku.png') }}">
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

    <!-- Javascript Assets -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <style>
      body {
        background-color: lightgray
      }
    </style>
  </head>
  <body>
    @routes

      @inertia
  </body>
</html>