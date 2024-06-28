<?php
session_start();


$correct_username = "ODHSAGOR";
$correct_password = "ODHSAGOR";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['user_id'];
    $password = $_POST['password'];

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;


        header("Location: admin_Dashboard.php");
        exit;
    } else {

        $_SESSION['error'] = "Invalid username or password";
        header("Location: doctorAdminLogin.php"); 
        exit;
    }
}
?>
