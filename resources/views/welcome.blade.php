<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Showroom</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .hero-bg {
            background-color: #000; /* Full black background */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="relative hero-bg">

    <!-- Buttons (Top Right) -->
    <div class="absolute top-8 right-10 flex gap-4 z-20">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}"
                   class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg transition transform hover:scale-105">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                   class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow-lg transition transform hover:scale-105">
                    Log in
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                       class="px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-xl shadow-lg transition transform hover:scale-105">
                        Register
                    </a>
                @endif
            @endauth
        @endif
    </div>

    <!-- Center Content -->
    <div class="absolute top-1/3 left-1/2 transform -translate-x-1/2 z-10 text-center px-6">
        <h1 class="text-6xl font-extrabold text-white drop-shadow-xl mb-6">
            Welcome to Elite Car Showroom
        </h1>

        <p class="text-lg text-gray-300 max-w-2xl mx-auto mb-8">
            Discover luxury cars, explore the latest models, and experience unmatched automotive excellence.
        </p>

    </div> 

</body>
</html>
