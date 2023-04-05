<?php

require_once('connection.php');

$msg = "";
$errors = array();

if (isset($_POST['register'])) {

    $name = $_POST['fname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $dob = $_POST['dob'];
    $role = $_POST['role'];
    $ex = $_POST['ext'];
    $gender = $_POST['gender'];

    if(empty($name) || empty($email) || empty($number) || empty($dob) || empty($role) || empty($ex) || empty($gender)){
        $msg = 'Fill in the Blank Field';
        array_push($errors, $msg);
    }

    

    echo $name;
}
else{
    echo 'bad';
}

?>