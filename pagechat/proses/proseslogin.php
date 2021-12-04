<?php
require('../../database.php');

//get all input values
$email = $_POST["email"];
$username = $_POST["username"];
$angkatan = $_POST["angkatan"];
$password = $_POST["password"];
$confirmpw = $_POST["confirmpassword"];
$encryption = sha1($password);

//check input tidak null
if(empty($email) || (empty($username)) || (empty($angkatan)) || (empty($password)) || (empty($confirmpw))) {
    $msg = "Semua data wajib diisi!";
    header("Location: ../register.php?msg=" . $msg);
    return;

}

//validasi Password
if ($password !== $confirmpw){
    $msg = "Password tidak sama!";
    header("Location: ../register.php?msg=" . $msg);
    return;
}

//save to database
$sql = "INSERT INTO user (username, email, password, angkatan) VALUES ('$username', '$email', '$encryption', '$angkatan' )";

if ($mysqli->query($sql) === TRUE) {
    $msg = "Register sukses silakan login!";
  } else {
    $msg = "Register gagal";
  }

  header("Location: ../login.php?msg=" . $msg);