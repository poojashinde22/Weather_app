<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weather_app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$city = isset($_GET['city']) ? $_GET['city'] : '';
$temperature = $data['current']['temp_c'];
$condition = $data['current']['condition']['text'];

$sql = "INSERT INTO weather_data (city, temperature, condition)
        VALUES ('$city', $temperature, '$condition')";

if ($conn->query($sql) === true) {
    echo "Weather data stored successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
