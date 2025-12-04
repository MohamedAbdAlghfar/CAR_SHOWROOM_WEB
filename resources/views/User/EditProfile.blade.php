<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
        input[type="email"],
        input[type="password"],
        input[type="number"] {
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

        .gender-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .gender-container label {
            display: flex;
            align-items: center;
            margin-right: 20px; /* Spacing between radio buttons */
        }

        .gender-container input {
            margin-right: 5px; /* Spacing between radio button and label text */
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
        <h1>Edit Profile</h1>
        <form method="POST" action="{{ route('EditProfile.update') }}"> 
            @csrf
            @method('PUT')

            <!-- Name --> 
            <div class="mb-4">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $user->name }}" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $user->email }}" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <small>Leave blank if you don't want to change the password</small>
            </div>

            <!-- Address -->
            <div class="mb-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{ $user->address }}" required autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{ $user->phone }}" required autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Age -->
            <div class="mb-4">
                <x-input-label for="age" :value="__('Age')" />
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" value="{{ $user->age }}" required autofocus autocomplete="age" />
                <x-input-error :messages="$errors->get('age')" class="mt-2" />
            </div>

            <!-- Job -->
            <div class="mb-4">
                <x-input-label for="job" :value="__('Job')" />
                <x-text-input id="job" class="block mt-1 w-full" type="text" name="job" value="{{ $user->job }}" required autofocus autocomplete="job" />
                <x-input-error :messages="$errors->get('job')" class="mt-2" />
            </div>

            <!-- Update Button -->
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Update') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <a href="{{ route('dashboard') }}" class="back-button">Back</a> 
</body>
</html>
 