<?php
$server = "localhost:4306";
$user = "root";
$password = " ";
$db = "data_schedule";

$conn = new mysqli($server, $user, $password, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>