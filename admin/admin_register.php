<?php
include '../includes/db.php';

$success_message = '';
$error_message = '';

// Handle Admin Registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO admin_users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);

    if ($stmt->execute()) {
        $success_message = "Admin registered successfully!";
    } else {
        $error_message = "An error occurred. Please try again.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Registration - Karad Event Management</title>
    <style>
        /* General Styles */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f4; }
        .container { width: 100%; max-width: 600px; margin: 50px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 8px; }
        header { text-align: center; margin-bottom: 30px; }
        header h1 { font-size: 2.5em; color: #333; }
        form { display: flex; flex-direction: column; }
        form input { padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 5px; }
        form button { padding: 10px 15px; background-color: #007BFF; color: #fff; border: none; font-size: 1em; font-weight: bold; cursor: pointer; border-radius: 5px; }
        form button:hover { background-color: #0056b3; }
        .message { text-align: center; margin-top: 20px; font-size: 1.2em; }
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Admin Registration</h1>
        </header>
        <?php
        if ($success_message) {
            echo '<p class="message success">' . $success_message . '</p>';
        } elseif ($error_message) {
            echo '<p class="message error">' . $error_message . '</p>';
        }
        ?>
        <form action="admin_register.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
