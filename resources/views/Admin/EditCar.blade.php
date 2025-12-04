<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Car</title>
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

select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #FFA500;
    border-radius: 5px;
    background-color: #333; /* Dark background */
    color: #FFA500;        /* Orange text */
    cursor: pointer;
}

select option {
    background-color: #333;
    color: #FFA500;
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
        input[type="file"] {
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
            position: fixed; /* Position the button relative to the viewport */
            bottom: 20px; /* Distance from the bottom of the viewport */
            right: 20px; /* Distance from the right of the viewport */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Car</h1>
        <form method="POST" action="{{ route('updateCar.update',$car->id) }}" enctype="multipart/form-data">  
            @csrf
            @method('PUT') 

            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $car->name }}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
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
                <x-input-label for="n_of_pieces" :value="__('Number of Pieces')" />
                <x-text-input id="n_of_pieces" class="block mt-1 w-full" type="number" name="n_of_pieces" value="{{ $car->n_of_pieces }}" required autofocus autocomplete="n_of_pieces" />
                <x-input-error :messages="$errors->get('n_of_pieces')" class="mt-2" />
            </div>

            <!-- Fuel Type -->
            <div class="mb-4">
                <x-input-label for="fuel_type" :value="__('Fuel Type')" />
                <x-text-input id="fuel_type" class="block mt-1 w-full" type="text" name="fuel_type" value="{{ $car->fuel_type }}" required autofocus autocomplete="fuel_type" />
                <x-input-error :messages="$errors->get('fuel_type')" class="mt-2" />
            </div>

            <!-- Buy -->
            <div class="mb-4">
                <x-input-label for="buy" :value="__('Buy')" />
                <x-text-input id="buy" class="block mt-1 w-full" type="number" name="buy" value="{{ $car->buy }}" required autofocus autocomplete="buy" />
                <x-input-error :messages="$errors->get('buy')" class="mt-2" />
            </div>

            <!-- Price -->
            <div class="mb-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ $car->price }}" required autofocus autocomplete="price" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <!-- Year -->
            <div class="mb-4">
                <x-input-label for="year" :value="__('Year')" />
                <x-text-input id="year" class="block mt-1 w-full" type="number" name="year" value="{{ $car->year }}" required autofocus autocomplete="year" />
                <x-input-error :messages="$errors->get('year')" class="mt-2" />
            </div>

            <!-- Country -->
            <div class="mb-4">
                <x-input-label for="country" :value="__('Country')" />
                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" value="{{ $car->country }}" required autofocus autocomplete="country" />
                <x-input-error :messages="$errors->get('country')" class="mt-2" />
            </div>

            <!-- Color -->
            <div class="mb-4">
                <x-input-label for="color" :value="__('Color')" />
                <x-text-input id="color" class="block mt-1 w-full" type="text" name="color" value="{{ $car->color }}" required autofocus autocomplete="color" />
                <x-input-error :messages="$errors->get('color')" class="mt-2" />
            </div>

            <!-- Image -->
            <div class="mb-4">
                <x-input-label for="filename" :value="__('Image')" />
                <x-text-input id="filename" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
                <x-input-error :messages="$errors->get('filename')" class="mt-2" />
                <small>Leave blank if you don't want to change the image</small>
            </div>

            <!-- Update Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <a href="{{ route('editCars.index') }}" class="back-button">Back</a>
</body>
</html>
