<?php
    session_start();
    require "../../database.php";
    
    $email = $_SESSION['email'];
    $sqlUser = "SELECT id FROM user WHERE email = '$email';";
    $resultUser = $mysqli->query($sqlUser);
    $user_id = $resultUser->fetch_assoc()["id"];


//get all input values
$sertifikat = $_POST["sertifikat"];



//save to database


$sql = "INSERT INTO award (user_id, sertifikat) VALUES ('$user_id', '$sertifikat')";


if ($mysqli->query($sql) === TRUE) {
    $msg = "mengisi data berhasil";
  } else {
    $msg = "Ada yang tidak beres ";
  }

  header("Location: ../../index.php?msg=" . $msg);