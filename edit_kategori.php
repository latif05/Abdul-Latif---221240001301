<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_GET['id'];
    $nama_kategori = $_POST['nama_kategori'];

// Check if the connection is established
$query = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE kategori_id='$id'";

if (mysqli_query($mysqli, $query)) {
    echo "Data berhasil diubah.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
}
}

$id = $_GET['id'];

$query = "SELECT * FROM kategori WHERE kategori_id='$id'";
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
   <h1>Edit Kategori</h1>
   <a href="kategori.php" class="btn btn-primary">Back</a>

   <form method="POST">
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