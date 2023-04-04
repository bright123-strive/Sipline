<?php

require_once("connection.php");

$msg = "";
$errors = array();

if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $pword = $_POST['password'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $msg = "INVALID EMAIL FORMAT";
    }

    if(empty($email)){

        $msg = "Email is Required";
        array_push($errors, $msg);

    }
    elseif(empty($pword)) {

        $msg = "Password is Required";
        array_push($errors, $msg);

    }
    else{ 
        if (count($errors) == 0) {

            $qr = "SELECT * FROM peers WHERE email = '$email' AND password = '$pword'";
            $run = $conn->query($qr) or die(mysqli_error($conn));

            if (mysqli_num_rows($run) > 0){

                while($row = mysqli_fetch_assoc($run)){

                    $fetch_id = $row['id'];
                    $fetch_email = $row['email'];
                    $fetch_fullname = $row['fullname'];
                    $fetch_creator = $row['creator'];
                    $fetch_role = $row['role'];
                    $fetch_pwd = $row['password'];

                    if($row['role'] == 'manager'){

                        if ($row['status'] == 'active') {
                            $_SESSION['fetchid'] = $fetch_id;
                            $_SESSION['fetchemail'] = $fetch_email;
                            $_SESSION['fetchname'] = $fetch_fullname;
                            $_SESSION['fetchpwd'] = $fetch_pwd;

                            header("location: dashboard.php");
                        }
                        else{
                            $msg = "User not Active! Contact your Administrator";
                        }

                    }
                    elseif ($row['role'] == 'agent') {
                        
                        if ($row['status'] == 'active') {
                            $_SESSION['fetchid'] = $fetch_id;
                            $_SESSION['fetchemail'] = $fetch_email;
                            $_SESSION['fetchname'] = $fetch_fullname;
                            $_SESSION['fetchpwd'] = $fetch_pwd;

                            header('location:#');
                        }
                        else{
                            $msg = "User not Active! Contact your Administrator";
                        }
                    }

                }
            }
            else{
                $msg = 'Invalid Email or Password';
            }
        }
        // else{
        //     echo "invalid";
        // }
        
    }
}

?>