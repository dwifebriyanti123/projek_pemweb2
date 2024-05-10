<?php
require 'dbkoneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];

$query_sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $dbh->query($sql);

if ($result->rowCount() > 0) {
  header("Location: index.php");
    echo "Login berhasil!";
} else {
    echo "<center><h1>Username atau Password Anda Salah. Silahkan Coba Login Kembali.</h1>
    <button><strong><a href='login.php'>Login</a></strong></button></center>";
}
?>  