<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Car Showroom</title>

<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    body, html {
        height: 100%;
        margin: 0;
        font-family: 'Segoe UI', sans-serif;
        background: #000;
    }

    /* Background */
    .hero-bg {
        background-image: url('images/car-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 80vh; /* reduced height */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
    }

    /* Glass card */
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        padding: 40px 30px;
        border-radius: 25px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        width: 100%;
        max-width: 450px;
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
        transform: translateY(30px);
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Floating labels */
    .form-group {
        position: relative;
        margin-bottom: 20px;
    }

    .form-group input {
        width: 100%;
        padding: 14px 15px;
        border-radius: 15px;
        border: none;
        background: rgba(255,255,255,0.15);
        color: white;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .form-group label {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: white;
        font-size: 16px;
        pointer-events: none;
        transition: all 0.3s ease;
        padding: 0 5px;
    }

    .form-group input:focus + label,
    .form-group input:not(:placeholder-shown) + label {
        top: -10px;
        left: 10px;
        font-size: 12px;
        color: #3b82f6; /* Tailwind blue-500 */
    }

    input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(59,130,246,0.4);
    }

    .btn-hover:hover {
        transform: scale(1.05);
    }
</style>
</head>

<body class="hero-bg relative">

<!-- Dark overlay -->
<div class="absolute inset-0 bg-black bg-opacity-60 z-0"></div>

<!-- Top buttons -->
<div class="absolute top-6 right-6 flex gap-3 z-20">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-md transition transform btn-hover">
                Dashboard
            </a>
        @else
            <a href="{{ route('login') }}" class="px-5 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition transform btn-hover">
                Login
            </a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="px-5 py-2 bg-red-600 hover:bg-red-700 text-white font-semibold rounded-lg shadow-md transition transform btn-hover">
                    Register
                </a>
            @endif
        @endauth
    @endif
</div>

<!-- Glass Login Form -->
<div class="glass relative z-10">
    <h1 class="text-4xl font-extrabold text-white text-center mb-8 drop-shadow-lg">Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input type="email" name="email" id="email" placeholder=" " value="{{ old('email') }}" required autofocus>
            <label for="email">Email</label>
            @error('email')
                <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" name="password" id="password" placeholder=" " required>
            <label for="password">Password</label>
            @error('password')
                <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center mb-4">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-700 shadow-sm" name="remember">
            <label for="remember_me" class="ml-2 text-white text-sm">Remember Me</label>
        </div>

        <div class="text-right mb-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-white hover:underline">
                    Forgot your password?
                </a>
            @endif
        </div>

        <div class="text-center">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-800 text-white font-bold py-3 rounded-xl shadow-lg transition transform btn-hover">
                Login
            </button>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('register') }}" class="underline text-sm text-white hover:text-gray-200">
                Don't have an account? Register
            </a>
        </div>
    </form>
</div>

</body>
</html>
