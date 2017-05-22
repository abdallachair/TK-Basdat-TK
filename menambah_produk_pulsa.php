<?php
    //session_start();
    //echo "oi"
    $DBConnection = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016");
    function insertProdukPulsa(){
        //echo('WOY COKS');
        $DBConnection = pg_connect("host=dbpg.cs.ui.ac.id dbname=b217 user=b217 password=bdb1722016");
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $nominal = $_POST['nominal'];
        
        $result1=is_numeric($harga);
        $result2=is_numeric($nominal);
        //echo "samimawon";
        if ($result2 === FALSE && $nominal <= 0) {
            //echo '1';
            $_SESSION['errorMSG'] = "Nominal harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else if($result1 === FALSE  && $harga <= 0) {
            //echo '2';
            $_SESSION['errorMSG'] = "Harga harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else {
            // echo '3';
            $sql = "SELECT * FROM TOKOKEREN.PRODUK_PULSA PP, TOKOKEREN.PRODUK P WHERE PP.kode_produk = '$kode_produk' AND P.kode_produk = PP.kode_produk";
            $result = pg_query($DBConnection, $sql);
            
            if(pg_fetch_row($result) >= 1){
                $_SESSION['errorMSG'] = "Kode Produk sudah ada.";
            } else{
                $sql2 = "INSERT INTO TOKOKEREN.PRODUK (kode_produk, nama, harga, deskripsi) VALUES ('$kode_produk', '$nama_produk', '$harga', '$deskripsi')";
                $result2 = pg_query($DBConnection, $sql2);
            
                $sql2 = "INSERT INTO TOKOKEREN.PRODUK_PULSA (kode_produk, nominal) VALUES ('$kode_produk', '$nominal')";
                $result2 = pg_query($DBConnection, $sql2);
            
                $_SESSION['successMSG'] = "Berhasil membuat Produk Pulsa!";
            }
           // header("Location: menambah_produk_pulsa.php");
            
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //var_dump($_POST);
        if($_POST['command'] === 'membuat_produk_pulsa'){
           // echo 'HIHIH';
            insertProdukPulsa();
        } 
    }
?>
