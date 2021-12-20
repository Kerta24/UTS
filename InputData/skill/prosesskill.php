<?php
    session_start();
    require "../../database.php";
    
    $email = $_SESSION['email'];
    $sqlUser = "SELECT id FROM user WHERE email = '$email';";
    $resultUser = $mysqli->query($sqlUser);
    $user_id = $resultUser->fetch_assoc()["id"];


//get all input values
$bahasap = $_POST["bahasap"];




//save to database

$sql = "INSERT INTO skill (user_id, bahasa_pemrograman) VALUES ('$user_id', '$bahasap')";

if ($mysqli->query($sql) === TRUE) {
    $msg = "mengisi data berhasil";
  } else {
    $msg = "Ada yang tidak beres ";
  }

  header("Location: ../../index.php?msg=" . $msg);