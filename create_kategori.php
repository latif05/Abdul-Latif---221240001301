<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $nama_kategori = $_POST['nama_kategori'];

   $sql = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";

if ($mysqli->query($sql) === TRUE) {
       header('location: kategori.php');
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

   <h1>Tambah Kategori</h1>

   <a href="buku.php" class="btn btn-primary">Back</a>

   <form method="POST">

      <div class="form-group">
         <strong>Nama Kategori:</strong>
         <input type="text" name="nama_kategori" required="" class="form-control" placeholder="Nama Kategori">
      </div>

      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>

   </form>

</div>

</body>

</html>