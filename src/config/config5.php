<?php
$SERVER = 'localhost:3306';
$USERNAME = 'root';
$PASSWORD = '';
$NAME_DB = 'maintenance';

$conn = new mysqli($SERVER, $USERNAME, $PASSWORD, $NAME_DB);

if ($conn->connect_error) {
    die("gagal");
}
?>
