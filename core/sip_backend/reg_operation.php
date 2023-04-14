<?php

require_once('connection.php');

$msg = "";
$errors = array();

if (isset($_POST['register'])) {

    $name = $_POST['fname'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $role = $_POST['role'];
    $ext = $_POST['ext'];

    $targetDir = "images/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


    if (empty($name) || empty($number) || empty($date)) {
        $msg = 'Fill in the Blank Field'.mysqli_error($conn);
        array_push($errors, $msg);

        echo "invalid whatever".mysqli_error($conn);
    }

    if(empty($role)){
        $msg = 'Please Select Role'.mysqli_error($conn);
        array_push($errors, $msg);

    }

    if (empty($ext)) {
        $msg = 'Invalid Extension'.mysqli_error($conn);
        array_push($errors, $msg);

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = 'Invalid Email'.mysqli_error($conn);
        array_push($errors, $msg);

    }

    if(count($errors) == 0){

        $sel = "SELECT * FROM peers WHERE fullname = '$name' OR email = '$email' OR phone = '$number' OR extension = '$ext'";
        $run = $conn->query($sel);

        if (mysqli_num_rows($run) > 0) {
            $msg = "user already exist";
        }
        else{

            $pass = md5('password');
            
            $insert = "INSERT INTO peers(email, fullname, phone, creator, role, extension, password, status, date, image) 
                    VALUES('".$email."', '$name', '".$number."', '".$_SESSION['fetchid']."', '".$role."', '".$ext."', '".$pass."', 'active', '".$date."', '".$fileType."' )";
            $get = $conn->query($insert);

            if ($get) {
                $msg = 'User Successfully Registered';
            }
            else{
                $msg = 'User not Registered'.mysqli_error($conn);
            }

        }

    }


}

?>