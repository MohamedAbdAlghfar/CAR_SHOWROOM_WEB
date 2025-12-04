<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Cars</title>
    <style>
        body {
            background-color: black;
            color: orange;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid orange;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
        }

        td {
            background-color: #222;
        }

        img {
            width: 100px;
            height: 70px;
            object-fit: cover;
            border-radius: 5px;
        }

        .edit-btn {
            background-color: orange;
            color: black;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .edit-btn:hover {
            background-color: darkorange;
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
        <h1>Edit Cars</h1>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Year</th>
                    <th>Country</th>
                    <th>Color</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td> 
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->country }}</td>
                    <td>{{ $car->color }}</td>
                    <td><img src="/images/{{ $car->filename }}" alt="{{ $car->name }}"></td>
                    <td>
                        <form action="{{ route('editCar.edit',$car->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="edit-btn">Edit</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('dashboard.index') }}" class="back-button">Back</a>
</body>
</html>
