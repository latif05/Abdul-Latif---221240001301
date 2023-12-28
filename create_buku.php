<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $judul = $_POST['judul'];
   $pengarang = $_POST['pengarang'];
   $penerbit = $_POST['penerbit'];
   $tahun_terbit =intval($_POST['tahun_terbit']);
   $sinopsis = $_POST['sinopsis'];
   $nama_kategori = $_POST['nama_kategori'];

   $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, sinopsis, nama_kategori) VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$sinopsis', '$nama_kategori')";

if ($mysqli->query($sql) === TRUE) {
       header('location: buku.php');
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

   <h1>Tambah Buku</h1>

   <a href="buku.php" class="btn btn-primary">Back</a>

   <form method="POST">

      <div class="form-group">
         <strong>Judul:</strong>
         <input type="text" name="judul" required="" class="form-control" placeholder="Judul Buku">
      </div>

      <div class="form-group">
         <strong>Pengarang:</strong>
         <input type="text" name="pengarang" required="" class="form-control" placeholder="Pengarang Buku">
      </div>
      <div class="form-group">
         <strong>Penerbit:</strong>
         <input type="text" class="form-control" name="penerbit" placeholder="Penerbit Buku"></input>
      </div>
      <div class="form-group">
         <strong>Tahun Terbit:</strong>
         <input type="text" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit"></input>
      </div>
      <div class="form-group">
         <strong>Sinopsis:</strong>
         <textarea type="text" name="sinopsis"></textarea>
      </div>
      <div class="form-group">
         <strong>Kategori:</strong>
         <input type="text" class="form-control" name="nama_kategori" placeholder="Kategori"></div>
      </div>

      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>

   </form>

</div>

</body>

</html>