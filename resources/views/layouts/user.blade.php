<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body class="flex flex-col min-h-screen">
    @include('components.header')

    <main class="flex-grow mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        @yield('content')
      </main>
    
    @include('components.footer')
</body>
</html>