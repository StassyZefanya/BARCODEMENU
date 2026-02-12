<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "db.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
  margin:0;
  background:#f5f6fa;
  font-family:sans-serif;
}

/* SIDEBAR */
.sidebar{
  width:250px;
  height:100vh;
  background:#080e83;
  position:fixed;
  padding:20px;
  color:white;
}

.sidebar h4{
  margin-bottom:30px;
}

.sidebar a{
  display:block;
  color:white;
  text-decoration:none;
  padding:10px;
  border-radius:8px;
  margin-bottom:10px;
}

.sidebar a:hover{
  background:rgba(255,255,255,0.2);
}

/* MAIN */
.main{
  margin-left:250px;
  padding:30px;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
  <h4>ADMIN PANEL</h4>
  <a href="admin.php">📋 Daftar Pesanan</a>
  <a href="menu.php">🍹 CRUD Menu</a>
  <a href="#">📦 Database Pesanan</a>
  <a href="#">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<h2 class="mb-4">Daftar Pesanan</h2>

<table class="table table-bordered bg-white">
<thead>
<tr>
  <th>Meja</th>
  <th>Customer</th>
  <th>WhatsApp</th>
  <th>Menu</th>
  <th>Qty</th>
  <th>Harga</th>
  <th>Status</th>
  <th>Waktu</th>
</tr>
</thead>

<tbody>

<?php
$result = $conn->query("SELECT * FROM orders ORDER BY created_at DESC");

if(!$result){
  echo "<tr><td colspan='8'>Tabel orders belum ada</td></tr>";
}else if($result->num_rows==0){
  echo "<tr><td colspan='8'>Belum ada pesanan</td></tr>";
}else{
  while($row = $result->fetch_assoc()){
?>

<tr>
<td><?= $row['table_no'] ?></td>
<td><?= $row['customer_name'] ?></td>
<td><?= $row['whatsapp'] ?></td>
<td><?= $row['menu'] ?></td>
<td><?= $row['qty'] ?></td>
<td>Rp <?= number_format($row['price'],0,',','.') ?></td>
<td><?= $row['status'] ?></td>
<td><?= $row['created_at'] ?></td>
</tr>

<?php
  }
}
?>

</tbody>
</table>

</div>

</body>
</html>
