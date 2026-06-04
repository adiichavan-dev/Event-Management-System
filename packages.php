<?php
session_start();
include 'includes/db.php';

// Handle Booking Submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $event_name = $_POST['event_name'];
    $package_name = $_POST['package_name'];
    $user_name = htmlspecialchars($_POST['user_name']);
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_phone = htmlspecialchars($_POST['user_phone']);
    $event_date = $_POST['event_date'];

    // Generate unique booking ID
    $booking_id = strtoupper(substr(md5(time() . $user_email), 0, 10));

    // Insert booking into database
    $stmt = $conn->prepare("INSERT INTO bookings (booking_id, event_name, package_name, user_name, user_email, user_phone, event_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $booking_id, $event_name, $package_name, $user_name, $user_email, $user_phone, $event_date);

    if ($stmt->execute()) {
        $success_message = "Thank you for your booking! Your Booking ID is: " . $booking_id;
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
    <title>Event Packages - AS Event Management</title>
    <style>
        /* CSS Styles */

        /* General Styles */
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { width: 90%; margin: auto; max-width: 1200px; }
        header { background-color: #333; color: #fff; padding: 10px 0; }
        header .container { display: flex; align-items: center; justify-content: space-between; }
        .logo img { height: 60px; }
        nav ul { list-style: none; display: flex; }
        nav ul li { margin-left: 20px; }
        nav ul li a { color: #fff; text-decoration: none; font-weight: bold; }
        nav ul li a:hover, nav ul li a.active { text-decoration: underline; }
        /* Packages Section */
        .packages { padding: 60px 0; text-align: center; }
        .packages h2 { font-size: 2.5em; margin-bottom: 40px; }
        .event { margin-bottom: 50px; }
        .event h3 { font-size: 2em; margin-bottom: 20px; color: #f4b042; }
        .event .package-list { display: flex; flex-wrap: wrap; justify-content: center; }
        .package-item { background-color: #f9f9f9; padding: 20px; margin: 15px; width: 300px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 5px; text-align: left; }
        .package-item img { width: 100%; height: 200px; object-fit: cover; border-radius: 5px; }
        .package-item h4 { margin-top: 15px; }
        .package-item ul { list-style: none; padding: 0; }
        .package-item ul li { padding: 5px 0; border-bottom: 1px solid #eee; }
        .package-item .price { font-size: 1.2em; font-weight: bold; margin-top: 10px; }
        .book-button { display: inline-block; margin-top: 15px; padding: 10px 15px; background-color: #f4b042; color: #333; text-decoration: none; border-radius: 5px; font-weight: bold; cursor: pointer; border: none; }
        .book-button:hover { background-color: #e19b21; }
        /* Booking Form Modal */
        .modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center; }
        .modal-content { background-color: #fff; padding: 20px; border-radius: 5px; max-width: 500px; width: 90%; position: relative; }
        .close-button { position: absolute; right: 15px; top: 15px; font-size: 1.5em; cursor: pointer; }
        .success { color: green; font-weight: bold; text-align: center; margin-bottom: 20px; }
        .error { color: red; font-weight: bold; text-align: center; margin-bottom: 20px; }
        /* Footer */
        footer { background-color: #333; color: #fff; padding: 15px 0; text-align: center; }
    </style>
    <script>
        // JavaScript for modal functionality
        function openModal(eventName, packageName) {
            document.getElementById('modal').style.display = 'flex';
            document.getElementById('event_name').value = eventName;
            document.getElementById('package_name').value = packageName;
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="logo">
                <img src="assets/images/logo.png" alt="AS Event Management">
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="packages.php" class="active">Packages</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <section class="packages">
            <div class="container">
                <h2>Our Event Packages</h2>

                <?php
                // Display success or error message
                if (isset($success_message)) {
                    echo '<p class="success">' . $success_message . '</p>';
                } elseif (isset($error_message)) {
                    echo '<p class="error">' . $error_message . '</p>';
                }
                ?>

                <!-- Event: Weddings -->
                <div class="event">
                    <h3>Weddings</h3>
                    <div class="package-list">
                        <!-- Package 1 -->
                        <div class="package-item">
                            <img src="assets/images/wedding1.jpg" alt="Wedding Silver Package">
                            <h4>Silver Package</h4>
                            <ul>
                                <li>Venue Decoration</li>
                                <li>Catering for 100 guests</li>
                                <li>Basic Photography</li>
                            </ul>
                            <p class="price">₹50,000</p>
                            <button class="book-button" onclick="openModal('Wedding', 'Silver Package')">Book Now</button>
                        </div>
                        <!-- Package 2 -->
                        <div class="package-item">
                            <img src="assets/images/wedding2.jpg" alt="Wedding Gold Package">
                            <h4>Gold Package</h4>
                            <ul>
                                <li>Premium Venue Decoration</li>
                                <li>Catering for 200 guests</li>
                                <li>Professional Photography & Videography</li>
                                <li>Entertainment Services</li>
                            </ul>
                            <p class="price">₹1,00,000</p>
                            <button class="book-button" onclick="openModal('Wedding', 'Gold Package')">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Event: Birthdays -->
                <div class="event">
                    <h3>Birthdays</h3>
                    <div class="package-list">
                        <!-- Package 1 -->
                        <div class="package-item">
                            <img src="assets/images/birthday1.jpg" alt="Birthday Basic Package">
                            <h4>Basic Package</h4>
                            <ul>
                                <li>Venue Decoration</li>
                                <li>Cake and Snacks</li>
                                <li>Music System</li>
                            </ul>
                            <p class="price">₹10,000</p>
                            <button class="book-button" onclick="openModal('Birthday', 'Basic Package')">Book Now</button>
                        </div>
                        <!-- Package 2 -->
                        <div class="package-item">
                            <img src="assets/images/birthday2.jpg" alt="Birthday Premium Package">
                            <h4>Premium Package</h4>
                            <ul>
                                <li>Themed Decoration</li>
                                <li>Catering for 50 guests</li>
                                <li>Professional Photographer</li>
                                <li>Games and Activities</li>
                            </ul>
                            <p class="price">₹25,000</p>
                            <button class="book-button" onclick="openModal('Birthday', 'Premium Package')">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Event: Baby Showers -->
                <div class="event">
                    <h3>Baby Showers</h3>
                    <div class="package-list">
                        <!-- Package -->
                        <div class="package-item">
                            <img src="assets/images/babyshower1.jpg" alt="Baby Shower Delight Package">
                            <h4>Delight Package</h4>
                            <ul>
                                <li>Beautiful Venue Decoration</li>
                                <li>Cake and Refreshments</li>
                                <li>Baby Shower Games</li>
                            </ul>
                            <p class="price">₹15,000</p>
                            <button class="book-button" onclick="openModal('Baby Shower', 'Delight Package')">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Event: Ring Ceremonies -->
                <div class="event">
                    <h3>Ring Ceremonies</h3>
                    <div class="package-list">
                        <!-- Package -->
                        <div class="package-item">
                            <img src="assets/images/ringceremony1.jpg" alt="Ring Ceremony Elegant Package">
                            <h4>Elegant Package</h4>
                            <ul>
                                <li>Elegant Venue Decoration</li>
                                <li>Catering for 150 guests</li>
                                <li>Live Music</li>
                            </ul>
                            <p class="price">₹65,000</p>
                            <button class="book-button" onclick="openModal('Ring Ceremony', 'Elegant Package')">Book Now</button>
                        </div>
                    </div>
                </div>

                <!-- Add more events and packages as needed -->

            </div>
        </section>
    </main>

    <!-- Booking Form Modal -->
    <div id="modal" class="modal" style="display: none; align-items: center;">
        <div class="modal-content">
            <span class="close-button" onclick="closeModal()">&times;</span>
            <h2>Book Your Event</h2>
            <form action="packages.php" method="post">
                <input type="hidden" name="event_name" id="event_name">
                <input type="hidden" name="package_name" id="package_name">
                <input type="text" name="user_name" placeholder="Your Name" required>
                <input type="email" name="user_email" placeholder="Your Email" required>
                <input type="text" name="user_phone" placeholder="Your Phone Number" required>
                <label for="event_date">Event Date:</label>
                <input type="date" name="event_date" required>
                <button type="submit" style="margin-top: 15px; padding: 10px 15px; background-color: #f4b042; color: #333; border: none; font-size: 1em; font-weight: bold; cursor: pointer; border-radius: 5px;">Confirm Booking</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> AS Event Management. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
