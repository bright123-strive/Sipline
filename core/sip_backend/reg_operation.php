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

    // $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	// $image_name = addslashes($_FILES['image']['name']);
	// $image_size = getimagesize($_FILES['image']['tmp_name']);

	// move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"]["name"]);
	// $img = "images/" . $_FILES["image"]["name"];

    if (empty($name) || empty($number) || empty($dob) || empty($gender)) {
        $msg = 'Fill in the Blank Field'.mysqli_error($conn);
        array_push($errors, $msg);

        echo "invalid whatever".mysqli_error($conn);
    }
    // else{
    //     echo "good to go".'<br>';
    // }

    if(empty($role)){
        $msg = 'Please Select Role'.mysqli_error($conn);
        array_push($errors, $msg);

        // echo "select the role" .'<br>';
    }
    else{
        // echo "role has been selected".'<br>';

        if ($role == 'agent') {
            if (empty($ex)) {

                $msg = 'Insert the Extension'.mysqli_error($conn);
                array_push($errors, $msg);

                // echo "ext is not filled".'<br>';
            }
            // else{
            //     echo "good to go ".'<br>';
            // }
        }

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = 'Invalid Email'.mysqli_error($conn);
        array_push($errors, $msg);

        // echo "invalid email".mysqli_error($conn);
    }
    // else{
    //     echo "valid email".'<br>';
    // }


    if(count($errors) == 0){

        $sel = "SELECT * FROM peers WHERE fullname = '$name' AND email = '$email' AND phone = '$number'";
        $run = $conn->query($sel);

        if (mysqli_num_rows($run) > 0) {
            $msg = "user already exist";
        }
        else{
            
            $insert = "INSERT INTO peers(email, fullname, phone, creator, role, extension, password, status, date, image) 
                    VALUES('".$email."', '$name', '".$number."', '".$_SESSION['fetchid']."', '".$role."', '0', 'password', 'active', '".$dob."', 'image' )";
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
                        header('location: ../form.php');
                    }
                }
                else{
                    // echo "GOODY";
                }
            }
            else{
                $msg = "didnt work".mysqli_error($conn);
            }

        }

    }


}
else{
    $msg = 'bad';
}

?>