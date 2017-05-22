<?php
	function connectDB() {
		$db = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016");

		if (!$conn) {
			die("Connection failed: " + pg_last_error());
		}
		return $conn;
	}

	$conn = connectDB();
	if(!empty($_POST["cid"])){
		$cid = $_POST["cid"];
		$sql = "SELECT * FROM TOKOKEREN.SUB_KATEGORI WHERE kode_kategori='$cid'";

		if(!$result = pg_query($conn, $sql)) {
			die("Error: $sql");
		}

		while ($row = pg_fetch_row($result)) {
		?>
		<option value="<?php echo $row[0]; ?>"><?php echo $row[2];?></option>
		<?php
		}
	}
?>