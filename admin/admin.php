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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="../logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Manage Events</h2>
            <form action="add_event.php" method="post">
                <input type="text" name="name" placeholder="Event Name" required>
                <input type="date" name="date" required>
                <input type="text" name="location" placeholder="Location" required>
                <textarea name="description" placeholder="Description"></textarea>
                <button type="submit">Add Event</button>
            </form>
            <h2>All Events</h2>
            <div class="events-gallery">
                <?php
                $result = $conn->query("SELECT * FROM events ORDER BY date DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='event-item'><h3>" . $row['name'] . "</h3><p>" . $row['description'] . "</p></div>";
                }
                ?>
            </div>
        </section>
    </main>
    <footer>
        <nav>
            <a href="#">Privacy Policy</a> | <a href="#">Terms and Conditions</a>
        </nav>
        <p>© 2025 Event Management. All Rights Reserved.</p>
    </footer>
</body>
</html>
