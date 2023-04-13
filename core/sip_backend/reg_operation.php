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

    $targetDir = "images/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);


    if (empty($name) || empty($number) || empty($dob)) {
        $msg = 'Fill in the Blank Field'.mysqli_error($conn);
        array_push($errors, $msg);

        echo "invalid whatever".mysqli_error($conn);
    }

    if(empty($role)){
        $msg = 'Please Select Role'.mysqli_error($conn);
        array_push($errors, $msg);

    }
    else{

        if ($role == 'agent') {
            if (empty($ex)) {

                $msg = 'Insert the Extension'.mysqli_error($conn);
                array_push($errors, $msg);

            }

        }

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = 'Invalid Email'.mysqli_error($conn);
        array_push($errors, $msg);

    }

    if(count($errors) == 0){

        $sel = "SELECT * FROM peers WHERE fullname = '$name' AND email = '$email' AND phone = '$number'";
        $run = $conn->query($sel);

        if (mysqli_num_rows($run) > 0) {
            $msg = "user already exist";
        }
        else{
<<<<<<< HEAD

            $pass = md5('password');

            $insert = "INSERT INTO peers(email, fullname, phone, creator, role, extension, password, status, date, image) 
                VALUES('".$email."', '$name', '".$number."', '".$_SESSION['fetchid']."', '".$role."', '0', '".$pass."', 'active', '".$dob."', '".$fileName."' )";
=======
            
            $insert = "INSERT INTO peers(email, fullname, phone, creator, role, extension, password, status, date) 
                    VALUES('".$email."', '$name', '".$number."', '".$_SESSION['fetchid']."', '".$role."', '0', 'password', 'active', '".$dob."' )";
>>>>>>> 673a2e92d41f16a421944e820ce5b29ce5224ef8
            $get = $conn->query($insert);

            if ($get) {

                if ($role == 'agent') {
    
                    $sel = "SELECT MAX(id) AS extension FROM peers";
                    $selR = $conn->query($sel);
    
                    $row = mysqli_fetch_array($selR);
                    $last_id = $row['extension'];
    
                    $agent = "UPDATE peers SET extension = '$ex' WHERE id = '$last_id'";
                    $ex = $conn->query($agent);
        
                    if (!$ex) {
                        $msg = "Not inserted".mysqli_error($conn);
                    }
                    else{
    
                        $msg = "User Successfully Registared";
                            
                        header('location: form.php');
                    }
                }
                    
            }
            else{
                $msg = "didnt work".mysqli_error($conn);
            }

        }

    }


}
<<<<<<< HEAD

=======
>>>>>>> 673a2e92d41f16a421944e820ce5b29ce5224ef8

?>