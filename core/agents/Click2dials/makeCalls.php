<?php
session_start();

include("../../modules/dbco.php");

if($_GET['calledID'] !=""){


    //make ACALL
            #ip address that asterisk is on.
         
            $strHost = "127.0.0.1";
            $strUser = $_SESSION['cliName'];
            $strSecret = $_SESSION['password'];
           
            $strContext = $_SESSION['cliContext'];
            $strExten = $_SESSION['cliExten'];
            $number=strtolower($_SESSION['countryCode'].$_GET['calledID']);
            $strChannel = "SIP/27128816060/".$number;
            $sql="INSERT INTO calllogdialer VALUES ('$strUser', '$number', '$strChannel', '$strExten', current_timestamp());";
            $conn->query($sql);
            
            
            $callName = rand(1,10000).".call";

            $file_name="../SETTINGS/tmp/".$callName;
            $file = fopen($file_name,'w');
            fwrite($file,'Channel: '.$strChannel."\n");
            fwrite($file,'MaxRetries: 0'."\n");
            fwrite($file,'RetryTime: 0'."\n");
            fwrite($file,'WaitTime: 0'."\n");
            fwrite($file,'Context: yathu'."\n");
            fwrite($file,'Extension: '.$strExten."\n");
            fwrite($file,''."\n");
            fclose($file);

            exec('chmod 777 ../SETTINGS/tmp/*');
            shell_exec("../SETTINGS/mv_script.sh");   
} @reboot /var/lib/asterisk/SETTINGS/mv_script.sh
?>