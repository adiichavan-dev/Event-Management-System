<?php
include '../includes/db.php';
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $date = htmlspecialchars($_POST['date']);
    $location = htmlspecialchars($_POST['location']);
    $description = htmlspecialchars($_POST['description']);

    $stmt = $conn->prepare("INSERT INTO events (name, date, location, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $date, $location, $description);
    if ($stmt->execute()) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>
