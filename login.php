<?php
session_start();
include 'includes/db.php';

$login_error = '';
$signup_error = '';
$signup_success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        // Handle login
        $username = htmlspecialchars(trim($_POST['login_username']));
        $password = htmlspecialchars($_POST['login_password']);
        $password = hash('sha256', $password); // Hash the password

        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_role'] = $row['role'];

            if ($row['role'] == 'admin') {
                header("Location: admin\admin_dashboard.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            $login_error = "❌ Invalid credentials";
        }
        $stmt->close();
    } elseif (isset($_POST['signup'])) {
        // Handle signup
        $username = htmlspecialchars(trim($_POST['signup_username']));
        $email = htmlspecialchars(trim($_POST['signup_email']));
        $password = htmlspecialchars($_POST['signup_password']);
        $confirm_password = htmlspecialchars($_POST['signup_confirm_password']);

        if ($password !== $confirm_password) {
            $signup_error = "❌ Passwords do not match!";
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $signup_error = "⚠️ Username or Email already exists!";
            } else {
                $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $password);

                if ($stmt->execute()) {
                    $signup_success = "✅ Registration successful! Redirecting to login...";
                    header("refresh:3;url=index.php");
                } else {
                    $signup_error = "⚠️ Something went wrong. Please try again!";
                }
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup - AK Organizer</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* Reset Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        /* Body Styling */
        body {
            background: url('images/event-bg.jpg') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Container */
        .container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Tabs */
        .tab {
            display: none;
        }

        .tab-labels {
            display: flex;
            justify-content: space-around;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .tab-labels div {
            padding: 10px 20px;
            background: #007BFF;
            color: white;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .tab-labels div:hover {
            background: #0056b3;
        }

        .tab:checked + .tab-label {
            background: #0056b3;
        }

        .tab-content {
            display: none;
        }

        .tab:checked + .tab-label + .tab-content {
            display: block;
        }

        /* Form Inputs */
        .container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        /* Button */
        .container button {
            width: 100%;
            padding: 12px;
            background: #007BFF;
            color: white;
            border: none;
            font-size: 1.1em;
            cursor: pointer;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .container button:hover {
            background: #0056b3;
        }

        /* Messages */
        .message {
            margin: 10px 0;
            font-size: 1em;
            padding: 10px;
            border-radius: 5px;
        }

        .error {
            background: #ffcccc;
            color: #cc0000;
        }

        .success {
            background: #ccffcc;
            color: #008000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="tab-labels">
            <div id="login-tab" onclick="showTab('login')">Login</div>
            <div id="signup-tab" onclick="showTab('signup')">Sign Up</div>
        </div>

        <div id="login" class="tab-content">
            <h1>Login</h1>
            <p class="subheading">Access your account</p>

            <?php if ($login_error): ?>
                <p class="message error"><?php echo $login_error; ?></p>
            <?php endif; ?>

            <form action="user/index.php" method="post">
                <input type="text" name="login_username" placeholder="Enter Username" required>
                <input type="password" name="login_password" placeholder="Enter Password" required>
                <button type="submit" name="login">Login</button>
            </form>
        </div>

        <div id="signup" class="tab-content">
            <h1>Create Your Account</h1>
            <p class="subheading">Join us and manage your events seamlessly</p>

            <?php if ($signup_error): ?>
                <p class="message error"><?php echo $signup_error; ?></p>
            <?php elseif ($signup_success): ?>
                <p class="message success"><?php echo $signup_success; ?></p>
            <?php endif; ?>

            <form action="user/index.php" method="post">
                <input type="text" name="signup_username" placeholder="Choose a Username" required>
                <input type="email" name="signup_email" placeholder="Enter Your Email" required>
                <input type="password" name="signup_password" placeholder="Enter Password" required>
                <input type="password" name="signup_confirm_password" placeholder="Confirm Password" required>
                <button type="submit" name="signup">Sign Up</button>
            </form>
        </div>
    </div>

    <script>
        function showTab(tab) {
            document.getElementById('login').style.display = (tab === 'login') ? 'block' : 'none';
            document.getElementById('signup').style.display = (tab === 'signup') ? 'block' : 'none';
        }

        // Show login tab by default
        showTab('login');
    </script>
</body>
</html>
