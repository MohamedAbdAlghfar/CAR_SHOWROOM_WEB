{{-- resources/views/payment/failed.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-2xl p-10 max-w-md text-center">
        <!-- Failed Icon -->
        <div class="mb-6">
            <svg class="w-20 h-20 mx-auto text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>

        <!-- Failed Message -->
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Payment Failed!</h1>
        <p class="text-gray-600 mb-6">
            Unfortunately, your payment could not be processed. Please check your card details and try again.
        </p>

        <!-- Try Again Button -->
        <a href="{{ route('viewCars.show', $car_brand) }}"
           class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-all duration-200">
            Try Again
        </a>
    </div> 

</body>
</html>
 