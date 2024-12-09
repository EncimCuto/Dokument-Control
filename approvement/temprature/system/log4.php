<?php
session_start();

require_once '../../../src/config/config4.php';

$id = $_GET['id'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id, username, bagian FROM log_users WHERE username = :username AND password = :password";
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

    setcookie('token', $token, time() + 86400, "/");

    header("Location: http://10.11.11.176/dokumentcontrol/approvement/temprature/approved4.php?id=$id&username=$username&bagian=$bagian&$token");
    exit;
} else {
    header('Location: ../../index.php?error=login_failed');
    exit;
}
?>
