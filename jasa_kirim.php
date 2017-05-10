<?php 
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
?> 