<?php


session_start();

session_destroy();

unset($_SESSION['logged']);
unset($_SESSION['email']);
unset($_SESSION['password']);

header('location: ../index.php');


?>