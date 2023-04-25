<?php

session_start();

$localhost = "localhost";
$root = "root";
$password = "sipline12"
$db = "asterisk";

$conn = mysqli_connect($localhost, $root, $password, $db);

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
