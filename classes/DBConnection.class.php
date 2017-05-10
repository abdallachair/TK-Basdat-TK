<?php
class DBConnection
    {
        var $conn;
        
    function DBConnection(){
        
        $this->conn = pg_connect("host='localhost' dbname='abdalla.chair' user='postgres' password=''") or die("unable to connect database");
    }
    
    }
