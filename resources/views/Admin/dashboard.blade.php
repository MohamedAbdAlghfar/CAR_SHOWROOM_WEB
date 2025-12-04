<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: #000; /* Black background */
            color: #FFA500; /* Orange text */
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            width: 100%;
            max-width: 1200px;
        }
        .counter {
            background-color: #FFA500; /* Orange background */
            color: #000; /* Black text */
            border-radius: 10px;
            padding: 20px;
            margin: 10px;
            min-width: 200px; /* Minimum width */
            text-align: center;
            font-size: 1.5em;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
            flex: 1 1 auto; /* Allow flex items to grow and shrink */
        }
        .counter:hover {
            transform: translateY(-10px);
        }
        .counter-title {
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        .counter-value {
            font-size: 2em;
            font-weight: bold;
            white-space: nowrap; /* Prevent line break */
        }
        .buttons-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .circle-button {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60px;
            height: 60px;
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            border-radius: 50%; /* Circular shape */
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .circle-button:hover {
            background-color: #45a049; /* Darker green */
            transform: translateY(-2px); /* Slight lift on hover */
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50; /* Green background */
            color: white; /* White text */
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .back-button:hover {
            background-color: #45a049; /* Darker green */
            transform: translateY(-2px); /* Slight lift on hover */
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="counter">
            <div class="counter-title">User Count</div>
            <div class="counter-value">{{ $data['user_count'] }}</div>
        </div>
        <div class="counter">
            <div class="counter-title">Admin Count</div>
            <div class="counter-value">{{ $data['admin_count'] }}</div> 
        </div>
        <div class="counter">
            <div class="counter-title">Total Price Today</div>
            <div class="counter-value">{{ $data['totalPrice_in_day'] }} LE</div>
        </div>
        <div class="counter">
            <div class="counter-title">Total Price This Month</div>
            <div class="counter-value">{{ $data['totalPrice_in_month'] }} LE</div>
        </div>
        <div class="counter">
            <div class="counter-title">Total Order Price</div>
            <div class="counter-value">{{ $data['total_order_price'] }} LE</div>
        </div>
    </div>
    <div class="buttons-container">
        <a href="{{ route('createUser.create') }}" class="circle-button">Add User</a>        
        <a href="{{ route('deleteUser.delete') }}" class="circle-button">Delete User</a>
        <a href="{{ route('editUsers.index') }}" class="circle-button">Edit User</a>  
        <a href="{{ route('createAdmin.create') }}" class="circle-button">Add Admin</a> 
        <a href="{{ route('deleteAdmin.delete') }}" class="circle-button">Delete Admin</a>
        <a href="{{ route('editAdmins.index') }}" class="circle-button">Edit Admin</a>
        <a href="{{ route('showOrders.show') }}" class="circle-button">Show Orders</a>
        <a href="{{ route('createCar.create') }}" class="circle-button">Add Car</a>
        <a href="{{ route('editCars.index') }}" class="circle-button">Edit Car</a>
        <a href="{{ route('deleteCar.delete') }}" class="circle-button">Delete Car</a>
        <a href="{{ route('CarLogs') }}" class="circle-button">Car Logs</a> 
    </div>
    <a href="/dashboard" class="back-button">Back to User Side</a>
</body>
</html>
