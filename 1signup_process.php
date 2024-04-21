<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged in</title>
</head>
<body>
<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "calorie_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Store password in plaintext

    // Additional fields
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Hash password (if needed)
    //$password = password_hash($password, PASSWORD_DEFAULT); 

    // Insert user data into users table
    $sql = "INSERT INTO users (username, email, password, weight, height, age, gender) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdiss", $username, $email, $password, $weight, $height, $age, $gender);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
    } else {
        // Registration failed
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

    
</body>
</html>
