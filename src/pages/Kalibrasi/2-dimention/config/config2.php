<?php
$SERVER = 'localhost:4306';
$USERNAME = 'root';
$PASSWORD = '';
$NAME_DB = 'data_digitalisasi';

$conn = new mysqli($SERVER, $USERNAME, $PASSWORD, $NAME_DB);

if ($conn->connect_error) {
    die("gagal: " . $mysqli1->connect_error);
}
?>
