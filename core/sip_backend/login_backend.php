<?php

require_once "connection.php";

$msg = "";
$errors = array();

if (isset($_POST['login'])) {

    $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $pword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    if (empty($pword) || empty($email)) {

        $msg = "Fill in the Blank space";
        array_push($errors, $msg);
        // echo "Fill in the empty space";

    }
    else{
        if (count($errors) == 0) {

            $qr = "SELECT * FROM peer WHERE email = $email AND password = $pword";
            $run = $conn->query($qr);

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

                            header('location:../index.html');
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
    }
}

?>