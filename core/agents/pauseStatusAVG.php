#!/usr/bin/php
<?php
include("/var/www/html/modules/dbco.php");
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
