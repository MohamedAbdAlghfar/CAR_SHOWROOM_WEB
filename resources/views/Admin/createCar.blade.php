<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create Car</title>
<style>
    body {
        background-color: #000; /* Black background */
        color: #FFA500; /* Orange text */
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #1a1a1a; /* Slightly lighter black for the container */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 165, 0, 0.5); /* Orange shadow */
        width: 500px; /* Increased width */
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        color: #FFA500;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    select {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #FFA500;
        border-radius: 5px;
        background-color: #333; /* Dark input background */
        color: #FFA500; /* Orange input text */
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #FFA500; /* Orange button background */
        color: #000; /* Black button text */
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #cc8400; /* Darker orange on hover */
    }

    .back-button {
        background-color: red;
        color: white;
        border: 1px solid black;
        padding: 5px 10px;
        font-size: 16px;
        text-decoration: none;
        cursor: pointer;
        position: fixed;
        bottom: 20px;
        right: 20px;
    }
</style>
</head>
<body>
    <div class="container">
        <h1>Create Car</h1>
        <form method="POST" action="{{ route('createCar.store') }}" enctype="multipart/form-data">   
            @csrf

            <!-- Car Name -->
            <div class="mb-4">
                <label for="name">Car Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <!-- Car Brand (Dropdown) --> 
            <div class="mb-4">
                <label for="brand">Car Brand</label>
                <select id="brand" name="brand" required>
                    <option value="">-- Select Brand --</option>
                    <option value="honda" {{ old('brand') == 'Honda' ? 'selected' : '' }}>Honda</option>
                    <option value="bmw" {{ old('brand') == 'BMW' ? 'selected' : '' }}>BMW</option>
                    <option value="mercedes" {{ old('brand') == 'Mercedes' ? 'selected' : '' }}>Mercedes</option>
                    <option value="toyota" {{ old('brand') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                    <option value="chevrolet" {{ old('brand') == 'Chevrolet' ? 'selected' : '' }}>Chevrolet</option>
                </select>
            </div>

            <!-- Number of Pieces -->
            <div class="mb-4">
                <label for="n_of_pieces">Number of Pieces</label>
                <input id="n_of_pieces" type="number" name="n_of_pieces" value="{{ old('n_of_pieces') }}" required>
            </div>

            <!-- Fuel Type -->
            <div class="mb-4">
                <label for="fuel_type">Fuel Type</label>
                <input id="fuel_type" type="text" name="fuel_type" value="{{ old('fuel_type') }}" required>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price">Price</label>
                <input id="price" type="number" name="price" value="{{ old('price') }}" required>
            </div>

            <!-- Year -->
            <div class="mb-4">
                <label for="year">Year</label>
                <input id="year" type="number" name="year" value="{{ old('year') }}" required>
            </div>

            <!-- Country -->
            <div class="mb-4">
                <label for="country">Country</label>
                <input id="country" type="text" name="country" value="{{ old('country') }}" required>
            </div>

            <!-- Color -->
            <div class="mb-4">
                <label for="color">Color</label> 
                <input id="color" type="text" name="color" value="{{ old('color') }}" required>
            </div>

            <!-- Car Image -->
            <div class="mb-4">
                <label for="image">Car Image</label>
                <input id="image" type="file" name="image" required>
            </div>

            <!-- Submit Button -->
            <div class="flex items-center justify-end mt-4">
                <button type="submit">Create Car</button>
            </div>
        </form>
    </div>
    <a href="{{ route('dashboard.index') }}" class="back-button">Back</a>
</body>
</html>
