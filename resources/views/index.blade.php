<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'BPS Kabupaten Kaimana')</title>
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <link rel="icon" type="image/png" href="{{ asset('logo-bps.png') }}">
</head>
<body class="bg-gray-50">
  <div class="flex flex-col min-h-screen">

    {{-- Navbar --}}
    @include('partials.navbar-stacked-layout')

    {{-- Konten utama --}}
    <main class="flex-grow pt-20"> 
      @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer-stacked-layout')

  </div>
</body>
</html>
