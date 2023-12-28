<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nama = $_POST['nama'];
   $alamat = $_POST['alamat'];
   $email = $_POST['email'];
   $telepon =intval($_POST['telepon']);

   $sql = "INSERT INTO anggota (nama, alamat, email, telepon) VALUES ('$nama', '$alamat', '$email', '$telepon')";

if ($mysqli->query($sql) === TRUE) {
       header('location: anggota.php');
       exit;
} else {
       echo "Error: ". $sql . $mysqli->error;
}
$mysqli->close();
}
?>

<!DOCTYPE html>

<html>

<head>

   <title></title>

   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>

<div class="container">

   <h1>Tambah Anggota</h1>

   <a href="anggota.php" class="btn btn-primary">Back</a>


   <form method="POST">

      <div class="form-group">
         <strong>Nama:</strong>
         <input type="text" name="nama" required="" class="form-control" placeholder="Nama Anggota">
      </div>

      <div class="form-group">
         <strong>Alamat:</strong>
         <input type="text" name="alamat" required="" class="form-control" placeholder="Alamat Anggota">
      </div>

      <div class="form-group">
         <strong>Email:</strong>
         <input type="email" class="form-control" name="email" placeholder="Email"></input>
      </div>

      <div class="form-group">
         <strong>Telepon:</strong>
         <input type="text" class="form-control" name="telepon" placeholder="Telepon"></input>
      </div>

      <div class="form-group">

         <button type="submit" name="submit" class="btn btn-success">Submit</button>

      </div>

   </form>

</div>

</body>

</html>