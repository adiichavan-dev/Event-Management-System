<?php
include '../includes/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - AS Event Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        header, footer {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 15px;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        nav ul li {
            display: inline;
            margin: 0 15px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .dashboard-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }
        .dashboard-card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
            margin: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #343a40;
            color: white;
        }
        button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="admin_dashboard.php" class="active">Dashboard</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </nav>

    <main>
        <div class="dashboard-container">
            <div class="dashboard-card">
                <h3>Total Bookings</h3>
                <p>50</p>
            </div>
            <div class="dashboard-card">
                <h3>Total Events</h3>
                <p>20</p>
            </div>
            <div class="dashboard-card">
                <h3>Customers</h3>
                <p>100</p>
            </div>
        </div>

        <section>
            <h2>Recent Bookings</h2>
            <table>
                <tr>
                    <th>Booking ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Package</th><th>Action</th>
                </tr>
                <tr>
                    <td>101</td><td>John Doe</td><td>john@example.com</td><td>1234567890</td><td>Wedding</td>
                    <td><button>Delete</button></td>
                </tr>
            </table>
        </section>

        <section>
            <h2>Registered Customers</h2>
            <table>
                <tr>
                    <th>Name</th><th>Email</th><th>Phone</th>
                </tr>
                <tr>
                    <td>Jane Smith</td><td>jane@example.com</td><td>9876543210</td>
                </tr>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> AS Event Management. All Rights Reserved.</p>
    </footer>
</body>
</html>
