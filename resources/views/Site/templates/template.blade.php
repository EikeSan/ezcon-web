<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EzCon{{ $title or ''}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/Site/css/login.css')}}">
  </head>
  <body>
      @yield('content')

      @stack('scripts')
  </body>
</html>
