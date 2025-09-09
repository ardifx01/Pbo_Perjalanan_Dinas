<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Laravel')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles') {{-- Tambahan style dari child view --}}
</head>
<body class="flex">
    {{-- Navbar --}}
    @if(Auth::guard('pegawai')->check() && Auth::guard('pegawai')->user()->role === 'admin')
        @include('components.sidebar')
    @else
        @include('components.sidebarpegawai')
    @endif

    {{-- Content --}}
    <main class="container m-9">
        @yield('content')
    </main>

    {{-- Footer --}}
    <!-- <footer class="bg-dark text-light text-center py-3 mt-5"> -->
        <!-- <p class="mb-0">&copy; {{ date('') }} My App. All Rights Reserved.</p> -->
    <!-- </footer> -->

    @stack('scripts')
</body>
</html>
