<?php
    session_start();
    require "../../database.php";
    
    $email = $_SESSION['email'];
    $sqlUser = "SELECT id FROM user WHERE email = '$email';";
    $resultUser = $mysqli->query($sqlUser);
    $user_id = $resultUser->fetch_assoc()["id"];


//get all input values
$bahasap = $_POST["bahasap"];
$profesi = $_POST["profesi"];
$bidang = $_POST["bidang"];
$deskripsi = $_POST["deskripsi"];
$universitas = $_POST["universitas"];
$jurusan = $_POST["jurusan"];
$prodi = $_POST["prodi"];
$ipk = $_POST["ipk"];
$sertifikat = $_POST["sertifikat"];



//save to database

$sql = "INSERT INTO pengalaman (user_id, profesi, bidang, deskripsi) VALUES ('$user_id', '$profesi', '$bidang', '$deskripsi')";
$sql = "INSERT INTO pendidikan (user_id, universitas, jurusan, prodi, ipk) VALUES ('$user_id', '$universitas', '$jurusan', '$prodi', '$ipk')";
$sql = "INSERT INTO award (user_id, sertifikat) VALUES ('$user_id', '$sertifikat')";
$sql = "INSERT INTO skill (user_id, bahasa_pemrograman) VALUES ('$user_id', '$bahasap')";

if ($mysqli->query($sql) === TRUE) {
    $msg = "mengisi data berhasil";
  } else {
    $msg = "Ada yang tidak beres ";
  }

  header("Location: ../../index.php?msg=" . $msg);