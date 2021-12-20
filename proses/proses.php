
<?php
    session_start();
    require "database.php";
    
    $email = $_SESSION['email'];
    $sqlUser = "SELECT id FROM user WHERE email = '$email';";
    $resultUser = $mysqli->query($sqlUser);
    $user_id = $resultUser->fetch_assoc()["id"];

    // var_dump($sqlresultStatus->fetch_assoc());
?>