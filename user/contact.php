<?php
// contact.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/db.php';

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Thank you for contacting us!";
    } else {
        echo "An error occurred. Please try again.";
    }
    $stmt->close();
}
?>


<?php
session_start();
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $stmt = $conn->prepare("INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        $success_message = "Thank you for contacting us! Your message has been sent successfully.";
    } else {
        $error_message = "An error occurred. Please try again later.";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Event Management</title>
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            max-width: 1200px;
        }

        /* Header */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
        }

        header .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo img {
            height: 60px;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover,
        nav ul li a.active {
            text-decoration: underline;
        }

        /* Contact Section */
        #contact {
            padding: 60px 0;
            text-align: center;
        }

        #contact h2 {
            font-size: 2.5em;
            margin-bottom: 40px;
        }

        #contact form {
            max-width: 600px;
            margin: 0 auto 30px;
        }

        #contact form input,
        #contact form textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #contact form button {
            width: 100%;
            padding: 15px;
            background-color: #f4b042;
            color: #333;
            border: none;
            font-size: 1em;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
        }

        #contact form button:hover {
            background-color: #e19b21;
        }

        .contact-info p {
            margin: 5px 0;
            font-size: 1.2em;
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="Event Management">
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#packages">Packages</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                    <li><a href="contact.php" class="active">Contact</a></li>
                    <li><a href="../login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section id="contact">
            <div class="container">
                <h2>Contact Us</h2>
                <?php
                if (isset($success_message)) {
                    echo '<p class="success">' . $success_message . '</p>';
                } elseif (isset($error_message)) {
                    echo '<p class="error">' . $error_message . '</p>';
                }
                ?>
                <form action="contact.php" method="post">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit" class="btn">Send Message</button>
                </form>
                <div class="contact-info">
                    <p><strong>Address:</strong> 123 Main Street, Karad, Maharashtra</p>
                    <p><strong>Phone:</strong> +91 9876543210</p>
                    <p><strong>Email:</strong> info@karadeventmanagement.com</p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Karad Event Management. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
