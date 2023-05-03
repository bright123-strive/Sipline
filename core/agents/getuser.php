<?php
session_start();

include("../../modules/dbco.php");
//because campaigns are dynamically assigned by supervisor


$q = $_GET['q'];
$q2 ="xleads_".$q;

$userCampaigns="";
$sqa ="SELECT campaign_groups.CampaignName FROM campaign_groups INNER JOIN group_users ON campaign_groups.GroupName = group_users.GroupName WHERE group_users.username ='".$_SESSION['username']."'";
$result2 = mysqli_query($conn,$sqa);
while($rowg = mysqli_fetch_array($result2)) {
  $sqkd ="SELECT * FROM `campaigns` WHERE `status`='Active' AND CampignName='".$rowg['CampaignName']."'";
  $resulty = $conn->query($sqkd);
	if ($resulty->num_rows > 0) {
    $userCampaigns .= "<option value='".$rowg['CampaignName']."'>".$rowg['CampaignName']."</option>";
  }

}

/*
//selecting campaign
$sqLk ="SELECT tableName FROM leads WHERE CampaignName='Mother Financial' AND state='Active'  ORDER BY priority DESC";
$result = $conn->query($sqLk);
while($row = $result->fetch_assoc()) {
//deactivate leads with zero uncalled users
	$tableNames =$row["tableName"];
	$SQQWL ="SELECT c0 FROM ".$tableNames." WHERE c20='0' AND c0<>''";
 	$resultSQL = $conn->query($SQQWL);
	if($resultSQL->num_rows > 0){
		$rowcount1 = mysqli_num_rows($resultSQL);
		$notUsed = "UPDATE leads SET unused='".$rowcount1."' WHERE tableName='".$tableNames."'";
		$conn->query($notUsed);
	}elseif($resultSQL->num_rows < 1){
		$rowcount12 = mysqli_num_rows($resultSQL);
                $deactiteleadds = "UPDATE leads SET unused='".$rowcount12."',state='Fineshed' WHERE tableName='".$tableNames."'";
                $conn->query($deactiteleadds);
	}
        $SQQWL2 ="SELECT c0 FROM ".$tableNames." WHERE c20='1' AND c0<>''";
        $resultSQL2 = $conn->query($SQQWL2);
        if($resultSQL2->num_rows > 0){
                $rowcount12 = mysqli_num_rows($resultSQL2);
                $Used2 = "UPDATE leads SET used='".$rowcount12."' WHERE tableName='".$tableNames."'";
                $conn->query($Used2);
        }
}
*/
$tableNames ="xleads_motherfinancial";
echo "<table class='table table-hover table-striped tableA' id='tableA' style='width: 100%;border-collapse: collapse;'>";
//$sql="SELECT * FROM ".$q2." WHERE c20='0' LIMIT 7";
$sql="select c0,c3,c4,c5,c6,c7  from ".$tableNames." WHERE c20='0' ORDER BY RAND() LIMIT 6";
$result = mysqli_query($conn,$sql);

echo "<table class='table table-hover table-striped tableA' id='tableA' style='width: 100%;border-collapse: collapse;'>
<tr>";
$sql3="SELECT c0,c3,c4,c5,c6,c7 FROM tcamplabel WHERE tablenames='xleads_motherfinancial' LIMIT 1";
$result3 = mysqli_query($conn,$sql3);
while($row3 = mysqli_fetch_array($result3)) {
  echo"<th>".strtoupper($row3['c0'])."</th>";
  for($i=3;$i<8;$i++){
    $keys = 'c'.$i;
    if($row3[$keys]!="NO"){
      echo"<th>".strtoupper($row3[$keys])."</th>";
    }
  }
}

echo"</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr id='".$row['c0']."'onclick='callUser(".substr(preg_replace('/\s+/', '',$row['c0']),-11).");highlight(this.id); popupCenter(\"called_users.php?tbl=".$q2."&person_id=".$row['c0']."\");'>";
  echo "<td>" .$row['c0']. "</td>";
  if(isset($row['c3'])){echo "<td>" . $row['c3'] . "</td>";}
  if(isset($row['c4'])){echo "<td>" . $row['c4'] . "</td>";}
  if(isset($row['c5'])){echo "<td>" . $row['c5'] . "</td>";}
  if(isset($row['c6'])){echo "<td>" . $row['c6'] . "</td>";}
  if(isset($row['c7'])){echo "<td>" . $row['c7'] . "</td>";}
  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>

