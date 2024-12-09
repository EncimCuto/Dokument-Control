<?php
session_start();

require_once '../config/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id, username, bagian FROM users WHERE username = :username AND password = :password";
$stmt = $koneksi->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    $token = md5(uniqid());

    $_SESSION['token'] = $token;
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['bagian'] = $user['bagian'];

    setcookie('token', $token, time() + 43200, "/");

    header('Location: ../../public/indeks.php?token=' . $token);
    exit;
} else {
    header('Location: ../../index.php?error=login_failed');
    exit;
}
?>
