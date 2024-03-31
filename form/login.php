<?php
// Connect to MySQL
$conn = new mysqli("localhost", "root", "", "my_database");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs to prevent SQL injection
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to check if user exists
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, login successful
        echo "Login successful!";
    } else {
        // User does not exist, show warning
        echo "Invalid email or password. Please try again.";
    }
}

// Close MySQL connection
$conn->close();
?>
