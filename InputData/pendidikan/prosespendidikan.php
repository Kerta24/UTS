<?php
    session_start();
    require "../../database.php";
    
    $email = $_SESSION['email'];
    $sqlUser = "SELECT id FROM user WHERE email = '$email';";
    $resultUser = $mysqli->query($sqlUser);
    $user_id = $resultUser->fetch_assoc()["id"];


//get all input values

$universitas = $_POST["universitas"];
$jurusan = $_POST["jurusan"];
$prodi = $_POST["prodi"];
$ipk = $_POST["ipk"];




//save to database


$sql = "INSERT INTO pendidikan (user_id, universitas, jurusan, prodi, ipk) VALUES ('$user_id', '$universitas', '$jurusan', '$prodi', '$ipk')";


if ($mysqli->query($sql) === TRUE) {
    $msg = "mengisi data berhasil";
  } else {
    $msg = "Ada yang tidak beres ";
  }

  header("Location: ../../index.php?msg=" . $msg);