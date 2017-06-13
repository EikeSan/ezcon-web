<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EzCon{{ $title or ''}}</title>

  </head>
  <body>
      @yield('content')

      @stack('scripts')
  </body>
</html>
