<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>

<html>

<head>

   <title>Menu</title>

   <style>
      
   .navbar {
    padding: 0;
   }

   .navbar ul {
    margin: 0;
    padding: 0;
    display: flex;
    list-style: none;
    align-items: center;
   }

   .navbar li {
    position: relative;
   }

   .navbar a,
   .navbar a:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 0 10px 30px;
    font-family: var(--font-primary);
    letter-spacing: 1px;
    font-size: 13px;
    font-weight: 400;
    color: rgba(255, 255, 255, 0.5);
    white-space: nowrap;
    transition: 0.3s;
   }

   .navbar a i,
   .navbar a:focus i {
    font-size: 12px;
    line-height: 0;
    margin-left: 5px;
   }

   .navbar .active,
   .navbar .active:focus,
   .navbar li >a {
    color: #000000;
   }

   .navbar p,
   .navbar p:focus {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 0 10px 30px;
    font-family: var(--font-primary);
    letter-spacing: 1px;
    font-size: 13px;
    font-weight: 400;
    white-space: nowrap;
    transition: 0.3s;
   }

   .navbar .active,
   .navbar .active:focus,
   .navbar li >p {
    color: #000000;
   }

   </style>

   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>

<div class="container">

<h1 style="text-align: center;">PERPUSTAKAAN</h1>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="buku.php" class="active">BUKU</a></li>
          <li><a href="anggota.php" class="active">ANGGOTA</a></li>
          <li><a href="kategori.php">KATEGORI</a></li>
          <p><?php echo $_SESSION['username']; ?></p>
        </ul>
      </nav>


<table class="table table-borderd">

   <tr>

      <th>ID</th>
      <th>Nama Anggota</th>
      <th>Alamat</th>
      <th>Email</th>
      <th>Telepon</th>
      <th>Status</th>

   </tr>

   <?php

      include 'config.php';
$sql = "SELECT * FROM anggota";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
 while ($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo "<td>".$row["anggota_id"]."</td>";
 echo "<td>".$row["nama"]."</td>";
 echo "<td>".$row["alamat"]."</td>";
 echo "<td>".$row["email"]."</td>";
 echo "<td>".$row["telepon"]."</td>";
 echo "<td>" ;
 echo "<a href='edit_anggota.php?id=".$row["anggota_id"]."' class='btn btn-primary'>Edit</a>"; 
 echo "<a
href='delete_anggota.php?id=".$row["anggota_id"]."' class='btn btn-danger'>Hapus</a>"; 
 echo "</td>";
 echo "</tr>";
 }
 echo "</table>";
} else {
 echo "Tidak Ada Data Anggota.";
}
$mysqli->close();

?>

</table>

<a href="create_anggota.php" class="btn btn-success">Tambah Anggota</a>

</div>

</body>

</html>
