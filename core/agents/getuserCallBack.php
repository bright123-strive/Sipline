<?php
session_start();

include("../../modules/dbco.php");
//because campaigns are dynamically assigned by supervisor


$q = $_GET['q'];
$q2 ="xLeads_".$q;

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


echo "<table class='table table-hover table-striped tableA' id='tableA' style='width: 100%;border-collapse: collapse;'>
";
$sql="SELECT * FROM ".$q2." WHERE c20='callBack' LIMIT 8";
$result = mysqli_query($conn,$sql);

echo "<table class='table table-hover table-striped tableA' id='tableA' style='width: 100%;border-collapse: collapse;'>
<tr>";
$sql3="SELECT * FROM tcamplabel WHERE tablenames='".$q2."' LIMIT 1";
$result3 = mysqli_query($conn,$sql3);
while($row3 = mysqli_fetch_array($result3)) {
  echo"<th>".strtoupper($row3['c0'])."</th>";
  for($i=3;$i<13;$i++){
    $keys = 'c'.$i;
    if($row3[$keys]!="NO"){
      echo"<th>".strtoupper($row3[$keys])."</th>";
    }
  }
}

echo"</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr id='".$row['c0']."'onclick='highlight(this.id); popupCenter(\"called_users.php?tbl=".$q2."&person_id=".$row['c0']."\");'>";
  echo "<td>" . $row['c0'] . "</td>";
  if(isset($row['c3'])){echo "<td>" . $row['c3'] . "</td>";}
  if(isset($row['c4'])){echo "<td>" . $row['c4'] . "</td>";}
  if(isset($row['c5'])){echo "<td>" . $row['c5'] . "</td>";}
  if(isset($row['c6'])){echo "<td>" . $row['c6'] . "</td>";}
  if(isset($row['c7'])){echo "<td>" . $row['c7'] . "</td>";}
  if(isset($row['c8'])){echo "<td>" . $row['c8'] . "</td>";}
  echo "</tr>";
}
echo "</table>";
mysqli_close($conn);
?>
