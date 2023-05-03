<?php
include("../../modules/dbco.php");
$usname = $_GET['make']."@%";
$sql2y="SELECT * FROM peers WHERE username LIKE '$usname'";
$result1yy = mysqli_query($conn,$sql2y);
while($row4hgyy = mysqli_fetch_array($result1yy )) {
    $_SESSION['username']=$row4hgyy['username'];
}

$sql2="SELECT * FROM pausestatusummary WHERE username='".$_SESSION['username']."'";
$result1 = mysqli_query($conn,$sql2);
$apiJsonData []= ['Status', 'AVG', 'Today'];
while($row4 = mysqli_fetch_array($result1)) {
    $apiJsonData []= [
                    $row4['status'],(int)$row4['avg'],(int)$row4['today']
                ];
}

$sql1="SELECT * FROM desposummary WHERE username='".$_SESSION['username']."' ORDER BY despo ASC";
$result3 = mysqli_query($conn,$sql1);
$apiJsonData2 []= ['Desp', 'Number'];
while($row3 = mysqli_fetch_array($result3)) {
    $apiJsonData2 []= [
                    $row3['despo'],(int)$row3['despvalues']
                ];
}


$sql="SELECT * FROM agentsummary WHERE username='".$_SESSION['username']."' LIMIT 1";
$result = mysqli_query($conn,$sql);
while($rowr = mysqli_fetch_array($result)) {
    $tablev[0]=$rowr['dialaggression'];
    $tablev[1]=$rowr['averagewaittime'];
    $tablev[2]=$rowr['succefucalls'];
    $tablev[3]=$rowr['failedcalls'];
}


mysqli_close($conn);
$graph1 = json_encode($apiJsonData);
$graph2 = json_encode($apiJsonData2);
?>