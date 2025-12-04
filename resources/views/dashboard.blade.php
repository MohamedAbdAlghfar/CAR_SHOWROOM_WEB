<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Car Showroom</title>

<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    body, html {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #000;
        min-height: 100vh;
    }

    .hero-bg {
        background: linear-gradient(rgba(0,0,0,0.85), rgba(0,0,0,0.95)), url('images/car-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 60px;
    }

    .glass {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(15px);
        padding: 30px 40px;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.6);
        color: white;
        text-align: center;
        max-width: 700px;
        margin: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .glass:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 50px rgba(0,0,0,0.7);
    }

    .oval-link {
        background: rgba(255, 165, 0, 0.1);
        backdrop-filter: blur(5px);
        padding: 12px 25px;
        border-radius: 9999px;
        margin: 8px;
        text-align: center;
        font-weight: 600;
        font-size: 18px;
        color: orange;
        transition: all 0.3s ease;
        display: inline-block;
    }
    .oval-link:hover {
        background: rgba(255, 165, 0, 0.3);
        transform: scale(1.1);
        color: #fff;
    }

    .admin-btn {
        display: inline-block;
        padding: 12px 25px;
        background: #4CAF50;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    .admin-btn:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 8px 20px rgba(0,0,0,0.5);
    }

    .logout-btn {
        background: #e53935;
        color: white;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .logout-btn:hover {
        background: #b71c1c;
        transform: scale(1.05);
    }

    h1 {
        font-size: 3rem;
        font-weight: 800;
        margin-bottom: 15px;
        color: #fff;
    }
</style>
</head>
<body>

<div class="hero-bg">

    <!-- Car Brands Navigation -->
    <div class="flex flex-wrap justify-center mb-10">
        <a href="{{ route('viewCars.show', 'honda') }}" class="oval-link">Honda</a>
        <a href="{{ route('viewCars.show', 'bmw') }}" class="oval-link">BMW</a>
        <a href="{{ route('viewCars.show', 'mercedes') }}" class="oval-link">Mercedes</a>
        <a href="{{ route('viewCars.show', 'chevrolet') }}" class="oval-link">Chevrolet</a>
        <a href="{{ route('viewCars.show', 'toyota') }}" class="oval-link">Toyota</a>
    </div>

    <!-- Welcome Section -->
    <div class="glass">
        <h1>Welcome to the Car Showroom</h1>
        <p>Discover luxury cars, explore the latest models, and experience unmatched automotive excellence.</p>
    </div>

    <!-- ⭐ Edit Profile Button -->
    <div class="glass mt-6">
        <a href="{{ route('EditProfile.edit') }}" 
           class="admin-btn"
           style="background:#FFA500;">
           Edit Profile
        </a>
    </div>

    <!-- Admin Dashboard -->
    @if(Auth::user()->role == 1)
        <div class="glass mt-8">
            <a href="{{ route('dashboard.index') }}" class="admin-btn">Go to Admin Dashboard</a>
        </div>
    @endif

    <!-- Logout -->
    <div class="fixed bottom-6 right-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                Log Out
            </button>
        </form>
    </div>

</div>

</body>
</html>
