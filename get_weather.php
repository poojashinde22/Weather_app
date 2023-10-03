<?php
$apiKey = 'e640870d21b0325e7aec5cf944863b9d';
$city = isset($_GET['city']) ? $_GET['city'] : ' ';

// URL mein space replace karke %20 karein city ke liye
$city = str_replace(' ', '%20', $city);

$apiUrl = "https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=e640870d21b0325e7aec5cf944863b9d";
$response = file_get_contents($apiUrl);

// Error handling for file_get_contents
if ($response === false) {
    echo json_encode(["error" => "Error fetching weather data."]);
    exit;
}

$data = json_decode($response, true);

// Error handling for JSON decoding
if ($data) {
    $temperature = $data['main']['temp'];
    $condition = $data['weather'][0]['description'];

    $weatherData = [
        "temperature" => $temperature,
        "condition" => $condition
    ];
    echo json_encode($weatherData);
} else {
    echo json_encode(["error" => "Error fetching weather data."]);
}
?>
