<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Car Listings</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<style>
    body, html {
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', sans-serif;
        background-color: #000;
        color: #FFA500;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .title {
        text-align: center;
        font-size: 2.5rem;
        margin-bottom: 30px;
        color: #FFA500;
        text-shadow: 0 0 10px rgba(255,165,0,0.7);
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    /* ---------- UPDATED CARD DESIGN ---------- */
    .card {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(10px);
        border-radius: 18px;
        overflow: hidden;
        width: 100%;
        max-width: 350px;
        margin: auto;
        box-shadow: 0 8px 25px rgba(255,165,0,0.25);
        transition: 0.3s ease;
        color: #FFA500;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(255,165,0,0.4);
    }

    /* High resolution + fixed size image */
    .card img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        object-position: center;
        background-color: #111;
        image-rendering: auto;
        transition: transform .3s ease;
    }

    .card img:hover {
        transform: scale(1.05);
    }

    .content {
        padding: 20px;
    }

    .content h2 {
        font-size: 1.5rem;
        margin-bottom: 10px;
        color: #FFD700;
        text-shadow: 0 0 5px rgba(255,215,0,0.5);
    }

    .content p {
        margin: 5px 0;
        font-size: 0.95rem;
    }

    .buy-button {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 25px;
        background: linear-gradient(90deg, #FFA500, #FFD700);
        color: #000;
        font-weight: bold;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255,165,0,0.3);
    }

    .buy-button:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 25px rgba(255,165,0,0.5);
    }

    .back-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        font-size: 16px;
        background-color: #e53935;
        color: white;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(255,0,0,0.3);
    }

    .back-button:hover {
        transform: scale(1.05);
        background-color: #b71c1c;
        box-shadow: 0 8px 20px rgba(255,0,0,0.5);
    }

    @media (max-width: 768px) {
        .title { font-size: 2rem; }
        .card img { height: 200px; }
    }
</style>
</head>

<body>

<div class="container">
    <h1 class="title">Car Listings</h1>

    <div class="grid">
        @foreach($cars as $car)
        <div class="card">
            <img src="/images/{{ $car->filename }}" alt="{{ $car->brand }}">
            <div class="content">
                <h2>{{ $car->name }}</h2>
                <p><strong>Brand:</strong> {{ $car->brand }}</p>
                <p><strong>Pieces:</strong> {{ $car->n_of_pieces }}</p>
                <p><strong>Fuel Type:</strong> {{ $car->fuel_type }}</p>
                <p><strong>Price:</strong> {{ $car->price }} LE</p>
                <p><strong>Year:</strong> {{ $car->year }}</p>
                <p><strong>Country:</strong> {{ $car->country }}</p>
                <p><strong>Color:</strong> {{ $car->color }}</p>

                <a href="{{ route('Payment.pay', $car->id) }}" class="buy-button">Buy</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

<a href="/dashboard" class="back-button">Back</a>

</body>
</html>
