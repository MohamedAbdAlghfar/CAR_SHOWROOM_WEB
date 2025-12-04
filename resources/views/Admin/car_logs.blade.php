<style>
    body {
        background: #000 !important;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .log-table-container {
        background: #111;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(255, 165, 0, 0.3);
        color: #FFA500;
        margin: 40px auto;
        width: 95%;
    }

    .log-table {
        width: 100%;
        border-collapse: collapse;
        color: #FFA500;
        font-size: 15px;
    }

    .log-table thead {
        background: #1f1f1f;
    }

    .log-table th {
        padding: 14px;
        text-align: left;
        font-size: 16px;
        letter-spacing: 1px;
        text-transform: uppercase;
        border-bottom: 2px solid #FFA500;
    }

    .log-table td {
        padding: 14px;
        border-bottom: 1px solid #333;
    }

    .log-table tr:hover {
        background: rgba(255, 165, 0, 0.1);
        transition: 0.2s;
    }

    /* Action badge */
    .action-badge {
        padding: 5px 10px;
        border-radius: 6px;
        font-weight: bold;
        text-transform: capitalize;
    }
    .created { background: #0f5132; color: #d1ffda; }
    .updated { background: #084298; color: #d8e4ff; }
    .deleted { background: #842029; color: #ffd7d7; }
    .sold    { background: #664d03; color: #ffe9a8; }

    /* Scroll container */
    .log-table-wrapper {
        overflow-x: auto;
    }

    /* Pagination styling */
    .pagination {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .pagination a, .pagination span {
        padding: 8px 12px;
        border-radius: 8px;
        background: #222;
        color: #FFA500;
        border: 1px solid #444;
        text-decoration: none;
    }

    .pagination .active {
        background: #FFA500;
        color: #000 !important;
        border-color: #FFA500;
    }

    .pagination a:hover {
        background: #333;
    }

.back-button {
    position: fixed;
    bottom: 20px;
    right: 20px;

    display: inline-block;
    padding: 10px 20px;

    background-color: red;
    color: white;

    font-size: 16px;
    text-align: center;
    text-decoration: none;

    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;

    z-index: 9999; /* بحيث يظهر فوق أي عنصر */
}

.back-button:hover {
    background-color: darkred;
    transform: translateY(-2px);
}


</style>


<div class="log-table-container">
    <h2 style="text-align:center; margin-bottom:20px;">Car Activity Logs</h2>
    
    <div class="log-table-wrapper">
        <table class="log-table">
            <thead>
                <tr>
                    <th>Car</th>
                    <th>Action</th>
                    <th>User</th>
                    <th>Details</th>
                    <th>Time</th>
                </tr>
            </thead>

            <tbody>
                @foreach($logs as $log)
                <tr>
                    <td>{{ $log->car_name }}</td> 

                    <!-- Dynamic action badge -->
                    <td>
                        <span class="action-badge {{ strtolower($log->action) }}">
                            {{ $log->action }}
                        </span>
                    </td>

                    <td>{{ $log->user_name }}</td> 
                    <td>{{ $log->details }}</td>
                    <td>{{ $log->created_at->format('Y-m-d H:i:s') }}<td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
 <a href="{{ route('dashboard.index') }}" class="back-button">Back</a>