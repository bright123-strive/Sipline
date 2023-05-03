<?php 

$con = new mysqli ("localhost","sipline","sipline12","asterisk");
if ($con){
	echo "connected";
}
else{
	echo "error";
}
?>
