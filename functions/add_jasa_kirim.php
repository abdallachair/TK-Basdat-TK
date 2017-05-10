<?php
	$echoNamaJasa = "";
	$echoLamaKirim = "";
	$echoTarif = "";
	$validate = true;

	function submit(){
	 	$db = pg_connect('host=localhost dbname=contacts user=contacts password=firstphp'); 

        $nama_jasa_kirim = pg_escape_string($_POST['nama_jasa_kirim']); 
        $lama_kirim = pg_escape_string($_POST['lama_kirim']); 
        $tarif_jasa_kirim = pg_escape_string($_POST['tarif_jasa_kirim']); 

        $query = "INSERT INTO JASA_KIRIM VALUES('" . $nama_jasa_kirim . "', '" . $lama_kirim . "', '" . $tarif_jasa_kirim . "')";
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        printf ("Data-data ini sudah masuk ke dalam database - %s %s %s", $nama_jasa_kirim, $lama_kirim, $tarif_jasa_kirim); 
        pg_close(); 
	  	header("Location: index.php");
	 }

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	  // if (strlen($_POST["nama_jasa_kirim"])) {
		 //   $echoNamaJasa = "Nama jasa kirim harus diisi";
		 //   $validate = false;
	  // }
	  // else {
		 //  	$nameExist = false;
		 //  	$query = "SELECT nama FROM JASA_KIRIM";
		 //  	$result = pg_query($query);
			// if(!$result) {
			//     die("Error: $query");
			// }

			// while ($row = pg_fetch_row($result)) {
			//   	if($_POST["nama"] == $row[0]){
			//      	$nameExist = true;
			//  	}
			// }

			// if($nameExist){
	  //   		$echoNamaJasa = "Jasa kirim sudah ada";
	  //   		$validate = false;
	  //  		}
   // 	  }


	  if ($_POST["lama_kirim"] == "0") {
		  	$echoLamaKirim = "Lama kirim harus lebih besar dari 0";
		   	$validate = false;
	  } elseif(strlen($_POST["lama_kirim"]) == 0){
	  		$echoLamaKirim = "Lama kirim harus diisi";
	  		$validate = false;
	  } elseif ($_POST["lama_kirim"] <= 0) {
	  		$echoLamaKirim = "Lama kirim harus lebih besar dari 0";
	  		$validate = false;
	  }


	  if ($_POST["tarif_jasa_kirim"] == "0") {
		  	$echoTarif = "Tarif harus lebih besar dari 0";
		   	$validate = false;
	  } elseif(strlen($_POST["tarif_jasa_kirim"]) == 0){
	  		$echoTarif = "Tarif harus diisi";
	  		$validate = false;
	  } elseif ($_POST["tarif_jasa_kirim"] <= 0) {
	  		$echoTarif = "Tarif harus lebih besar dari 0";
	  		$validate = false;
	  } elseif (!is_numeric($_POST["tarif_jasa_kirim"])) {
	  		$echoTarif = "Tarif harus berupa angka";
	  		$validate = false;
	  }

	  if (empty($_POST["tarif_jasa_kirim"])) {
		   $echoTarif = "Tarif harus diisi";
		   $validate = false;
	  } else{
		  	if($_POST["tarif_jasa_kirim"] <= 0) {
		  		$echoTarif = "Tarif harus lebih besar dari 0";
		  		$validate = false;
		  	}

		  	if(!is_numeric($_POST["tarif_jasa_kirim"])) {
		  		$echoTarif = "Tarif harus berupa angka";
		  		$validate = false;
		  	}
	  }

	  if($validate == true){
	  	 	submit();
	  }
	}
?>