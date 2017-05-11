<?php

	function look_shipped(){
	 	$db = pg_connect('host=localhost dbname=contacts user=contacts password=firstphp'); 

        $query = "SELECT ";
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        
        return $result;
	 }

	 function look_pulsa(){
	 	$db = pg_connect('host=localhost dbname=contacts user=contacts password=firstphp'); 
	 	$user_email = $_SESSION['email'];
	 	
        $query = "SELECT TP.NO_INVOICE, TP. from ";
        $result = pg_query($query); 
        if (!$result) { 
            $errormessage = pg_last_error(); 
            echo "Error with query: " . $errormessage; 
            exit(); 
        } 
        
        return $result;
	 }
?>