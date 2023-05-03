<?php
session_start();

include("../../modules/dbco.php");
$numberID=$_GET['CallednumberID'];
$agentName =$_SESSION['username'];
$Notes=$_GET['Notes'];
$datepicker=$_GET['datetiming'];
$notification=$_GET['notification2'];
$desposition =$_GET['desposition'];

if(($Notes !="") &&($numberID !="")){
    //$sql="INSERT INTO loanotes VALUES ('$numberID', '$Notes', '$datepicker', '$desposition', '$agentName', current_timestamp(), '$notification');";
    	$sql="insert into loanotes values('$numberID','$Notes','$datepicker','$desposition','$agentName',current_timestamp(),'$notification')";
	$conn->query($sql);
    
    $sql2="SELECT * FROM xleads_t2 WHERE c0='$numberID'";
    $result = mysqli_query($conn,$sql2);
    while($row = mysqli_fetch_array($result)) {
        $count = $row[c20] + 1;
        $sqL2 ="UPDATE xleads_t2 SET c20='$count' WHERE c0='$numberID'";
        $conn->query($sqL2);
    }

}
?>
