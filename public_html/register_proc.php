<?php
include 'db_connection.php';
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $first_name = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
    $last_name = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $home_addr = filter_input(INPUT_POST, 'home_addr', FILTER_SANITIZE_SPECIAL_CHARS);
    $home_phone = filter_input(INPUT_POST, 'home_phone', FILTER_SANITIZE_SPECIAL_CHARS);
    $cell_phone = filter_input(INPUT_POST, 'cell_phone', FILTER_SANITIZE_SPECIAL_CHARS);

    // Check if email is valid
    if (!$email) {
        // Email is not valid, redirect back to registration page with error message
        header("Location: register.php?error=invalid_email");
        exit();
    }

    // // Hash the password (you should use a secure hashing algorithm like bcrypt)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $conn = OpenCon();

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert user into the database
    $sql = "INSERT INTO users (first_name, last_name, email, password, home_addr, home_phone, cell_phone) VALUES ('$first_name', '$last_name', '$email', '$hashed_password', '$home_addr', '$home_phone', '$cell_phone')";
    
    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        // Close connection
        CloseCon($conn);
        exit();
    } else {
        // Error occurred, redirect back to registration page with error message
        header("Location: register.php?error=1");
        // Close connection
        CloseCon($conn);
        exit();
    }
}
?>