<?php
session_start();

include "config.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = "SELECT * FROM pengguna WHERE username = '" . $username . "' AND password = '" . $password . "'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['username'] = $row['username'];
    $_SESSION['level'] = $row['level'];
    header("location:buku.php");
} else {
    $pesan = "Username atau Password Anda Salah";
    header("location:login.php?pesan=" . $pesan);
}

$conn->close();
?>