

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AS Event Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="assets/js/script.js" defer></script>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    color: #333;
    background-color: #f5f5f5;
}

h1, h2 {
    text-align: center;
    color: #007BFF;
}

header, footer {
    background-color: #007BFF;
    color: white;
    padding: 10px 20px;
    text-align: center;
}

header nav, footer nav {
    display: flex;
    justify-content: center;
    align-items: center;
}

header nav a, footer nav a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
}

header nav a:hover, footer nav a:hover {
    text-decoration: underline;
}

/* Form Styles */
form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

input[type="text"], input[type="email"], input[type="password"], textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #007BFF;
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #0056b3;
}

/* Hero Section Styles */
.hero {
    background: url('../images/hero-image.jpg') no-repeat center center/cover;
    color: #fff;
    text-align: center;
    padding: 100px 0;
}

.hero-content h1 {
    font-size: 3em;
    margin-bottom: 20px;
}

/* Section Styles */
section {
    padding: 20px 20px;
    margin: 20px 0;
    background: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.service-list, .events-gallery, .photo-gallery, .testimonials {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.service-item, .event-item, .photo-item, .testimonial-item {
    background: white;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    flex-basis: calc(33.333% - 20px);
}

.testimonials, .testimonial-item {
    flex-basis: calc(50% - 20px);
}

/* Footer Styles */
footer {
    background-color: #007BFF;
    color: white;
    padding: 20px;
    text-align: center;
}

.footer-links a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
}

.footer-links a:hover {
    text-decoration: underline;
}







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
}

header .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0;
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

/* Hero Section */
.hero {
    background: url('../images/hero.jpg') no-repeat center center/cover;
    height: 80vh;
    position: relative;
    color: #fff;
}

.hero .overlay {
    background: rgba(0, 0, 0, 0.6);
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
}

.hero .container {
    position: relative;
    z-index: 1;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}

.hero h1 {
    font-size: 3em;
    margin-bottom: 0.5em;
}

.hero p {
    font-size: 1.5em;
    margin-bottom: 1em;
}

.btn {
    display: inline-block;
    background-color: #f4b042;
    color: #333;
    padding: 15px 30px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.btn:hover {
    background-color: #e19b21;
}

/* Packages Section */
#packages {
    padding: 60px 0;
    text-align: center;
}

#packages h2 {
    font-size: 2.5em;
    margin-bottom: 40px;
}

.packages {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.package {
    background-color: #f9f9f9;
    padding: 30px;
    margin: 15px;
    width: 300px;
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.package h3 {
    margin-bottom: 20px;
    color: #f4b042;
}

.package ul {
    list-style: none;
    padding: 0;
    margin-bottom: 20px;
}

.package ul li {
    text-align: left;
    padding: 5px 0;
    border-bottom: 1px solid #eee;
}

.package .price {
    font-size: 1.5em;
    font-weight: bold;
    color: #333;
}

/* Gallery Section */
#gallery {
    padding: 60px 0;
    background-color: #fafafa;
    text-align: center;
}

#gallery h2 {
    font-size: 2.5em;
    margin-bottom: 40px;
}

.gallery-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.gallery-grid img {
    width: 300px;
    height: 200px;
    object-fit: cover;
    margin: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
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

/* Footer */
footer {
    background-color: #333;
    color: #fff;
    padding: 15px 0;
    text-align: center;
    font-size: 0.9em;
}

/* Responsive Design */
@media (max-width: 768px) {
    .packages,
    .gallery-grid {
        flex-direction: column;
        align-items: center;
    }

    nav ul {
        flex-direction: column;
        align-items: center;
    }

    nav ul li {
        margin: 10px 0;
    }
}

    </style>
</head>
<body>

<!-- Header Section -->
<header>
    <div class="container">
        <div class="logo">
            <img src="logo.jpg" alt="AK Organizers">
        </div>
        <nav>
            <ul>
                <li><a href="home.php" class="active">Home</a></li>
                <li><a href="packages.php">Packages</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="hero">
    <div class="overlay">
        <div class="container">
            <h1>Creating Unforgettable Moments</h1>
            <p>Your Trusted Event Partner</p>
            <a href="C:\xampp\htdocs\asproject\contact.php" class="btn">Get in Touch</a>
        </div>
    </div>
</section>

<!-- Packages Section -->
<section id="packages">
    <div class="container">
        <h2>Our Packages</h2>
        <div class="packages">
            <?php
           include '../includes/db.php';
            $result = $conn->query("SELECT * FROM packages ORDER BY price ASC");
            while ($row = $result->fetch_assoc()) {
                echo '<div class="package">';
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>';
                echo '<ul>';
                $services = explode(',', $row['services']);
                foreach ($services as $service) {
                    echo '<li>' . htmlspecialchars(trim($service)) . '</li>';
                }
                echo '</ul>';
                echo '<p class="price">₹' . number_format($row['price'], 2) . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery">
    <div class="container">
        <h2>Event Gallery</h2>
        <div class="gallery-grid">
            <img src="assets/images/event1.jpg" alt="Event Image 1">
            <img src="assets/images/event2.jpg" alt="Event Image 2">
            <img src="assets/images/event3.jpg" alt="Event Image 3">
            <!-- Add more images as needed -->
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact">
    <div class="container">
        <h2>Contact Us</h2>
        <form action="contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit" class="btn">Send Message</button>
        </form>
        <div class="contact-info">
            <p><strong>Address:</strong> 123 Main Street, Sangli, Maharashtra</p>
            <p><strong>Phone:</strong> +91 9876543210</p>
            <p><strong>Email:</strong> info@aseventmanagement.com</p>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer>
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> AS Event Management. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
