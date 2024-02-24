<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all registration data
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Date of Birth</th></tr>";
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["dob"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
