<?php
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select all data from the users table
$sql = "SELECT id, name, email, created_at FROM users";
$result = $conn->query($sql);

echo "<h2>Registered Users</h2>";
if ($result->num_rows > 0) {
    // Output data in an HTML table
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Email</th><th>Registered On</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["created_at"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

$conn->close();
?>
