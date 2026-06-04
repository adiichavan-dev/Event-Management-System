<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Packages</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <h1>Manage Packages</h1>
        <nav>
            <a href="index.php">Dashboard</a>
            <a href="../logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Add Package</h2>
            <form action="manage_packages.php" method="post">
                <input type="hidden" name="add_package" value="1">
                <input type="text" name="name" placeholder="Package Name" required>
                <input type="number" step="0.01" name="price" placeholder="Price" required>
                <textarea name="services" placeholder="Services (comma-separated)" required></textarea>
                <button type="submit">Add Package</button>
            </form>
        </section>
        <section>
            <h2>All Packages</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Services</th>
                    <th>Actions</th>
                </tr>
                <?php
                $result = $conn->query("SELECT * FROM packages ORDER BY id DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['price']}</td>
                            <td>{$row['services']}</td>
                            <td>
                                <form action='manage_packages.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='delete_package' value='1'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <button type='submit'>Delete</button>
                                </form>
                                <form action='manage_packages.php' method='post' style='display:inline-block;'>
                                    <input type='hidden' name='edit_package' value='1'>
                                    <input type='hidden' name='id' value='{$row['id']}'>
                                    <input type='text' name='name' value='{$row['name']}' required>
                                    <input type='number' step='0.01' name='price' value='{$row['price']}' required>
                                    <input type='text' name='services' value='{$row['services']}' required>
                                    <button type='submit'>Edit</button>
                                </form>
                            </td>
                          </tr>";
                }
                ?>
            </table>
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
