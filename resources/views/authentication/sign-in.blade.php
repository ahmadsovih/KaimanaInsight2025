<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BPS Kabupaten Kaimana</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/png" href="{{ asset('storage/images/logo-bps.png') }}">
</head>
<body>
    <!-- Menyertakan partial view untuk Toast -->
    @include('partials.toast')

    <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-">
        <a href="" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10">
            <img src="{{ asset('storage/images/logo-bps.png') }}" alt="Logo BPS" class="w-full h-auto max-w-xs">
</a>
        

        <!-- Card --> 
        <div class="w-full max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow ">
            <h2 class="text-2xl font-bold text-gray-900">
                Sign in
            </h2>
            <!-- Tampilkan Pesan Error di sini -->
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <span class="font-medium">Login Failed!</span>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form class="mt-8 space-y-6" action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="name@company.com" required>
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" required>
                </div>
                <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg me-2 mb-2 focus:outline-none sm:w-auto">
                    Login
                </button>
                <div class="text-sm font-medium text-gray-500">
                    Not registered? <a href="register" class="text-primary-700 hover:underline">Create account</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
