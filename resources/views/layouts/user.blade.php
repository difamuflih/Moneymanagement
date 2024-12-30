<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js'])

</head>
<body>
    @include('components.header')

    <main class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        @yield('content')
      </main>
    
    @include('components.footer')
</body>
</html>