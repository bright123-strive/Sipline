<?php
session_start();
include("../../modules/dbco.php");
$pauseStatus=$_GET['pauseStatus'];
$extenStatus=$_GET['extenu'];

$slllQ ="SELECT * FROM pausestatus WHERE username='".$_SESSION['username']."' AND endTime=''";
$result2 = $conn->query($slllQ);
while($rowzh = $result2 ->fetch_assoc()){
    $startTime = $rowzh['startTime'];
    $sqlty="UPDATE pausestatus SET endTime=current_timestamp() WHERE username='".$_SESSION['username']."' AND endTime='' AND startTIme='$startTime'";
    $conn->query($sqlty);
}

//
$sql="INSERT INTO pausestatus (username,exten,pauseStatus,startTime,endTime)VALUES ('".$_SESSION['username']."','$extenStatus','$pauseStatus',current_timestamp(),'');";
$conn->query($sql);
//QUEUMANIPULATION HERE

//sumtime
$slllQq ="SELECT TIMEDIFF(endTime,startTime) AS DIFFTIME,startTime,username from pausestatus WHERE FLAG='0' AND endTime <>''";
$result2q = $conn->query($slllQq);
while($rowzhq = $result2q ->fetch_assoc()){
    $diffTime = $rowzhq['DIFFTIME'];
    $final = substr($diffTime,0,8);
    $sec = ((int)substr($diffTime,6,2)) + ((int)substr($diffTime,3,2)*60)+((int)substr($diffTime,0,2)*3600);
    if($sec < 1800){
        $sqltyu="UPDATE pausestatus SET sumID='$sec' WHERE username='".$rowzhq['username']."' AND startTIme='".$rowzhq['startTime']."'";
        $conn->query($sqltyu);
        $sqltyu="UPDATE pausestatus SET FLAG='1' WHERE username='".$rowzhq['username']."' AND startTIme='".$rowzhq['startTime']."'";
        $conn->query($sqltyu);
    }
}


    //Sum all sttustus and update
    $slllQ1 ="SELECT DISTINCT pauseStatus FROM pausestatus WHERE username='".$_SESSION['username']."' AND FLAG='1'";
    $result21 = $conn->query($slllQ1);
    while($rowzh1 = $result21 ->fetch_assoc()){
        $todate = date("Y-m-d")."%";
        $sqltt = "SELECT SUM(sumID) AS TOTAL FROM pausestatus WHERE endTime LIKE '$todate' AND pauseStatus='".$rowzh1['pauseStatus']."' AND username='".$_SESSION['username']."' AND endTime <>''";
        $resultyu = $conn->query($sqltt);
        while($rowtt = $resultyu ->fetch_assoc()){ 
            $upd = "UPDATE pausestatusummary SET today='".$rowtt['TOTAL']."' WHERE status='".$rowzh1['pauseStatus']."' AND username='".$_SESSION['username']."'";
            $conn->query($upd);  
        }
    }


$yesterday = date('Y-m-d',strtotime("0 days"))."%";
$past7day = date('Y-m-d',strtotime("-6 days"))."%";
$slllQXX ="SELECT DISTINCT pausestatus FROM pausestatus";
$result2XX = $conn->query($slllQXX);
while($rowzhXX = $result2XX ->fetch_assoc()){
    $slllQ ="SELECT DISTINCT username FROM pausestatus";
    $result2 = $conn->query($slllQ);
    while($rowzh = $result2 ->fetch_assoc()){     
        $slllQhu = "SELECT SUM(sumID) AS 7daysSum FROM pausestatus WHERE pausestatus='".$rowzhXX['pausestatus']."' AND username='".$rowzh['username']."' AND ((startTime LIKE '$past7day') OR (endTime LIKE '$yesterday'))";
        $ret2slllQhu = $conn->query($slllQhu);
        while($rowzhG = $ret2slllQhu ->fetch_assoc()){
            if($rowzhG['7daysSum']!=""){
               $sqLh = "UPDATE pausestatusummary SET avg='".$rowzhG['7daysSum']."' WHERE username='".$rowzh['username']."' AND status='".$rowzhXX['pausestatus']."'";
               $conn->query($sqLh);
            }
        }    
}
}
?>


