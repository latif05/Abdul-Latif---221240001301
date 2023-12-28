<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = intval($_POST['telepon']);

// Check if the connection is established
$query = "UPDATE anggota SET nama='$nama', alamat='$alamat', email='$email', telepon='$telepon' WHERE anggota_id='$id'";

if (mysqli_query($mysqli, $query)) {
    echo "Data berhasil diubah.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
}

$id = $_GET['id'];

$query = "SELECT * FROM anggota WHERE anggota_id='$id'";
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
   <h1>Edit Anggota</h1>
   <a href="anggota.php" class="btn btn-primary">Back</a>

   <form method="POST">
      <div class="form-group">
         <strong>Nama:</strong>
         <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required="nama" class="form-control" placeholder="Nama Anggota">
      </div>
      <div class="form-group">
         <strong>Alamat:</strong>
         <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required="alamat" class="form-control" placeholder="Alamat Anggota">
      </div>
      <div class="form-group">
         <strong>Email:</strong>
         <input type="text" name="email" value="<?php echo $row['email']; ?>" required="email" class="form-control" placeholder="Email">
      </div>
      <div class="form-group">
         <strong>Telepon:</strong>
         <input type="text" name="telepon" value="<?php echo $row['telepon']; ?>" required="telepon" class="form-control" placeholder="telepon">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>

</body>

</html>