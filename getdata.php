<?php
	function connectDB() {
		$db = pg_connect("host=localhost port=5432 dbname=farhanramadhan user=postgres password=gold28197");

		if (!$conn) {
			die("Connection failed: " + pg_last_error());
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