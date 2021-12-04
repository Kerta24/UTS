<?php
session_start();
require('../../database.php');

//get all input values
$content = $_POST["content"];


// get user id
$email = $_SESSION['email'];
$sqlUser = "SELECT id FROM user WHERE email = '$email';";
$resultUser = $mysqli->query($sqlUser);
$user_id = $resultUser->fetch_assoc()["id"];


//check input tidak null
if(empty($content)) {
    $msg = "Komentar tidak boleh kosong!";
    header("Location: ../chat.php?msg=" . $msg);
    return;

}

//save to database
$sql = "INSERT INTO status (user_id, content) VALUES ('$user_id', '$content' )";

if ($mysqli->query($sql) === TRUE) {
    $msg = "Update status berhasil!";
  } else {
    $msg = "Update status gagal";
  }

  header("Location: ../chat.php?msg=" . $msg);