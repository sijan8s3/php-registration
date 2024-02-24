<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";


// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to validate email format
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate phone number
function validate_phone($phone) {
    // Strip all characters except digits
    $phone = preg_replace("/[^0-9]/", "", $phone);
    // Check if phone number is exactly 10 digits
    return (strlen($phone) === 10);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email, phone, address, dob, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $address, $dob, $password);

// Sanitize and validate input data
$name = sanitize_input($_POST['name']);
$email = sanitize_input($_POST['email']);
$phone = sanitize_input($_POST['phone']);
$address = sanitize_input($_POST['address']);
$dob = $_POST['dob']; // No need to sanitize, as date format is expected
$password = sanitize_input($_POST['password']);

// Validate email and phone number
if (!validate_email($email)) {
    echo "Invalid email format";
    exit();
}

if (!validate_phone($phone)) {
    echo "Invalid phone number";
    exit();
}

// Execute prepared statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
