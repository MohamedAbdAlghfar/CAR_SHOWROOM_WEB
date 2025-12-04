<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders List</title>

    <style>
        body {
            background: #0d0d0d;
            color: #f5a623;
            font-family: "Segoe UI", sans-serif;
            margin: 0;
            padding: 30px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.8em;
            font-weight: 700;
            color: #ffa500;
            text-shadow: 0 0 15px rgba(255,165,0,0.8);
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
            padding: 20px;
            background: #111;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(255,165,0,0.25);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #1a1a1a;
            border-radius: 15px;
            overflow: hidden;
        }

        th {
            background-color: #222;
            padding: 16px;
            text-align: left;
            font-weight: bold;
            color: #ffa500;
            border-bottom: 2px solid #333;
            font-size: 15px;
        }

        td {
            padding: 14px;
            color: #e2e2e2;
            border-bottom: 1px solid #333;
            font-size: 14px;
        }

        tr:hover td {
            background-color: #2d2d2d;
            transition: 0.3s;
        }

        img {
            width: 110px;
            height: 75px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #ffa500;
        }

        /* Beautiful floating back button */
        .back-button {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background: linear-gradient(45deg, #ff0000, #b30000);
            color: white;
            padding: 12px 22px;
            border-radius: 50px;
            font-size: 17px;
            font-weight: bold;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: 0 0 15px rgba(255,0,0,0.6);
            transition: 0.3s;
        }

        .back-button:hover {
            background: linear-gradient(45deg, #cc0000, #800000);
            transform: scale(1.05);
            box-shadow: 0 0 25px rgba(255,0,0,0.9);
        }
    </style>
</head>

<body>

    <h1>Orders List</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Order Price</th>
                    <th>Location</th>
                    <th>Payment Method</th>
                    <th>Car Name</th>
                    <th>Car Brand</th>
                    <th>Car Year</th>
                    <th>Car Country</th>
                    <th>Car Color</th>
                    <th>Car Image</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Address</th>
                    <th>User Phone</th>
                    <th>Created At</th>
                </tr>
            </thead>

            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->location }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->car->name }}</td>
                        <td>{{ $order->car->brand }}</td>
                        <td>{{ $order->car->year }}</td>
                        <td>{{ $order->car->country }}</td>
                        <td>{{ $order->car->color }}</td>
                        <td><img src="/images/{{ $order->car->filename }}"></td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->user->address }}</td>
                        <td>{{ $order->user->phone }}</td>
                        <td>{{ $order->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('dashboard.index') }}" class="back-button">Back</a>

</body>
</html>
