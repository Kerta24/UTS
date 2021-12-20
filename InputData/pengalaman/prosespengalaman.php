<?php
    session_start();
    require "../../database.php";
    
    $email = $_SESSION['email'];
    $sqlUser = "SELECT id FROM user WHERE email = '$email';";
    $resultUser = $mysqli->query($sqlUser);
    $user_id = $resultUser->fetch_assoc()["id"];


//get all input values

$profesi = $_POST["profesi"];
$bidang = $_POST["bidang"];
$deskripsi = $_POST["deskripsi"];




//save to database

$sql = "INSERT INTO pengalaman (user_id, profesi, bidang, deskripsi) VALUES ('$user_id', '$profesi', '$bidang', '$deskripsi')";

if ($mysqli->query($sql) === TRUE) {
    $msg = "mengisi data berhasil";
  } else {
    $msg = "Ada yang tidak beres ";
  }

  header("Location: ../../index.php?msg=" . $msg);