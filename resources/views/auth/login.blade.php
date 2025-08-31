<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body class="min-h-screen flex items-center justify-center bg-emerald-900">
    @if ($errors->any())
        <div class="alert alert-danger absolute top-0 bg-white text-red-500 text-center">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white w-96 p-8 rounded-xl shadow-lg">
        <!-- Logo -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/T7hz-r.png') }}" alt="Logo" class="w-32 h-32 mb-2">
            <h1 class="text-3xl font-bold">Login</h1>
        </div>

        <!-- Form -->
        <form method="POST" action="{{  route("login.process")}}">
            @csrf

            <!-- NIK -->
            <div class="mb-4">
                <label for="nik" class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                <input type="text" id="nik" name="no_induk" required
                    class="w-full px-3 py-2 border border-emerald-500 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600">
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border border-emerald-500 rounded-md focus:outline-none focus:ring-2 focus:ring-emerald-600 pr-10">
                    <!-- Icon toggle password -->
                    <span class="absolute inset-y-0 right-3 flex items-center cursor-pointer"
                        onclick="togglePassword()">
                        <i id="toggleIcon" class="fa-solid fa-eye text-gray-600"></i>
                    </span>
                </div>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-emerald-900 text-white py-2 rounded-md hover:bg-emerald-800 transition">
                login
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const pass = document.getElementById("password");
            pass.type = pass.type === "password" ? "text" : "password";
        }

        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
