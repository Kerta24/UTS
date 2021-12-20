<?php
session_start();
require "../database.php";


$sql = "SELECT email, password FROM user WHERE email = '$email' AND password = '$decryptedpw'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0){
    // Session
    $msg = "Login";
    $_SESSION["email"] = $email;
    header("Location: ../../Admin/admin.php");
}else {
    $msg = 'Login';
    $_SESSION['email'] = $email;
    header('Location: ../login.php'.$msg);
}