<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" rel="stylesheet">
    <title>Barbershop Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .sidebar {
            width: 200px;
            height: 100%;
            background-color: #222;
            color: #fff;
            padding: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 1rem;
        }

        .sidebar a {
            display: block;
            padding: 0.5rem;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #333;
        }

        .sidebar ul ul {
            display: none;
        }

        .sidebar li:hover > ul {
            display: block;
        }

        .content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>ASGAR - STUDIO</h2>
        <ul>
            <li><a href="#dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li>
                <a href="#appointments"><i class="fas fa-calendar-check"></i> Appointments</a>
                <ul>
                    <li><a href="#add-appointment">Add Appointment</a></li>
                    <li><a href="#view-appointments">View Appointments</a></li>
                </ul>
            </li>
            <li><a href="#barbers"><i class="fas fa-users"></i> Barbers</a></li>
            <li><a href="#customers"><i class="fas fa-users"></i> Customers</a></li>
            <li><a href="#services"><i class="fas fa-scissors"></i> Services</a></li>
            <li><a href="#reports"><i class="fas fa-chart-bar"></i> Reports</a></li>
        </ul>
    </div>
    <div class="content">
        <!-- Your main content will be placed here -->
    </div>
</body>
</html>