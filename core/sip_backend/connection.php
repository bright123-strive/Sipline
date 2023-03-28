<?php

session_start();

$host = "localhost";
$root = "root";
$pass = "";
$db = "sip";

$conn = mysqli_connect($host, $root, $pass, $db);

function log_in(){
    return isset($_SESSION['fetchid']);
}

function confirm_log_in(){
    
    if(!log_in()){
        ?>
        <script src="" type="text/javascript">
            window.location = "../login.php"
        </script>
        <?php
    }
}

// error_reporting(2);

// if($conn){
//     echo "GOOD";
// }
// else{
//     echo "BAD";
// }

?>