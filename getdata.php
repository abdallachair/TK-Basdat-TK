<?php
	function connectDB() {
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tokokeren";
		
		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " + mysqli_connect_error());
		}
		return $conn;
	}

	$conn = connectDB();
	if(!empty($_POST["cid"])){
		$cid = $_POST["cid"];
		$sql = "SELECT * FROM SUB_KATEGORI WHERE kode_kategori='$cid'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}

		while ($row = mysqli_fetch_row($result)) {
		?>
		<option value="<?php echo $row[0]; ?>"><?php echo $row[2];?></option>
		<?php
		}

	}
?>