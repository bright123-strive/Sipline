<?php
session_start();
$strChannel = $_REQUEST['exten'];
$strContext = "yathu";
$strWaitTime = "10";
$strPriority = "1";
$strMaxRetry = "1";

$number=strtolower($_REQUEST['number']);
$strCallerId = "Web Call ".$number;
    $socket = fsockopen("127.0.0.1","5038", $errno, $errstr, 10);
        if (!$socket){
            echo "$errstr ($errno)\n";
        }else{
          fputs($socket, "Action: Login\r\n");
          fputs($socket, "UserName: userAstraX\r\n");
          fputs($socket, "Secret: XAste19855ri1HH\r\n\r\n");
          //fputs($socket, "Action: Command\r\n");
          //fputs($socket, "Command: sip reload all\r\n\r\n");
            fputs($socket, "Action: originate\r\n");
            fputs($socket, "Channel: $strChannel\r\n");
            fputs($socket, "WaitTime: $strWaitTime\r\n");
            fputs($socket, "CallerId: $strCallerId\r\n");
            fputs($socket, "Exten: $number\r\n");
            fputs($socket, "Context: $strContext\r\n");
            fputs($socket, "Priority: $strPriority\r\n\r\n");
          fputs($socket, "Action: Logoff\r\n\r\n");
          while (!feof($socket)){
             echo fgets($socket).'<br>';
          }
          fclose($socket);
          }
?>
