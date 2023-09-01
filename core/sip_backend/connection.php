<?php

session_start();

$localhost = "localhost";
$root = "root";
$password = "";
$db = "asterisk";

$conn = new mysqli($localhost, $root, $password, $db);

function logged_in(){
                        
	return isset($_SESSION['fetchid']);

}

function confirm_logged_in(){

	if (!logged_in()) {

		?>

		<script type="text/javascript">
			window.location = "index.php";
		</script>
<?php

	}
}

?>
