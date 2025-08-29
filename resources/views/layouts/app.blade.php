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

    @include('components.sidebar')

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
