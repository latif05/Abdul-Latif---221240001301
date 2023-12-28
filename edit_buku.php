<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_GET['id'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = intval($_POST['tahun_terbit']);
    $sinopsis = $_POST['sinopsis'];
    $nama_kategori = $_POST['nama_kategori'];

// Check if the connection is established
$query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', sinopsis='$sinopsis', nama_kategori='$nama_kategori' WHERE buku_id='$id'";

if (mysqli_query($mysqli, $query)) {
    header('locattion: buku.php');
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
}

$id = $_GET['id'];

$query = "SELECT * FROM buku WHERE buku_id='$id'";
$result = mysqli_query($mysqli, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} 

mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
   <title></title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container">
   <h1>Edit Buku</h1>
   <a href="buku.php" class="btn btn-primary">Back</a>

   <form method="POST">
      <div class="form-group">
         <strong>Judul:</strong>
         <input type="text" name="judul" value="<?php echo $row['judul']; ?>" required="judul" class="form-control" placeholder="Judul Buku">
      </div>
      <div class="form-group">
         <strong>Pengarang:</strong>
         <input type="text" name="pengarang" value="<?php echo $row['pengarang']; ?>" required="pengarang" class="form-control" placeholder="Pengarang">
      </div>
      <div class="form-group">
         <strong>Penerbit:</strong>
         <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" required="penerbit" class="form-control" placeholder="penerbit">
      </div>
      <div class="form-group">
         <strong>Tahun Terbit:</strong>
         <input type="text" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required="telepon" class="form-control" placeholder="Tahun Terbit">
      </div>
      <div class="form-group">
         <strong>Sinopsis:</strong>
         <input type="text" name="sinopsis" value="<?php echo $row['sinopsis']; ?>" required="sinopsis" class="form-control" placeholder="sinopsis buku">
      </div>
      <div class="form-group">
         <strong>Nama Kategori:</strong>
         <input type="text" name="nama_kategori" value="<?php echo $row['nama_kategori']; ?>" required="nama_kategori" class="form-control" placeholder="Nama Kategori">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>

</body>

</html>