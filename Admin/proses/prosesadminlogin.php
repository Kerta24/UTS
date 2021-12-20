<?php
session_start();
require "../../database.php";

// get all input
$email = $_POST['email'];
$password = $_POST['password'];
$decryptedpw = sha1($password);
// validasi
if (empty($email) || empty($password)){
    $msg = "Email atau katasandi tidak boleh kosong!";
    header("Location: ../loginadmin.php?msg=".$msg);
    return;
}

$sql = "SELECT email, password FROM user WHERE email = '$email' AND password = '$decryptedpw'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0){
    // Session
    $msg = "Login admin";
    $_SESSION["email"] = $email;
    header("Location: ../admin.php?msg=". $msg);
}else {
    $msg = "Login gagal";
    header("Location: ../loginadmin.php?msg=". $msg);

}