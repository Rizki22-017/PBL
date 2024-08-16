<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nisaa";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Menerima data yang dikirim dari ESP32
$temperature = $_POST['temperature'] ?? NULL;
$distance = $_POST['distance'] ?? NULL;
$soilMoisture = $_POST['soilMoisture'] ?? NULL;


// Logging data yang diterima untuk debug
file_put_contents('log.txt', "Temperature: $temperature, Distance: $distance, SoilMoisture: $soilMoisture\n", FILE_APPEND);

// Memastikan data tidak kosong
if ($temperature !== NULL && $distance !== NULL && $soilMoisture !== NULL) {
  // Menyimpan data ke dalam database dengan prepared statement
  $stmt = $conn->prepare("INSERT INTO sensor_data (temperature, distance, soil_moisture) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $temperature, $distance, $soilMoisture);

  if ($stmt->execute()) {
    echo "Data berhasil disimpan";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
} else {
  echo "Data tidak lengkap.";
}

$conn->close();
?>
