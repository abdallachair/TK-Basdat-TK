<?php

    function selectAllFromTable($table) {
        $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
        $query = "SELECT * FROM $table";
        $result = pg_query($DBConnection, $query);
        return $result;   
    }
    
    function insertProdukShipped(){
        $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
        $kode_produk = $_POST['kode_produk'];
        $nama_produk = $_POST['nama_produk'];
        $toko = $_SESSION['toko'];
       // echo $toko;
        $nama_toko =  str_replace("'", "''", $toko);
       // echo $nama_toko;
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $nominal = $_POST['nominal'];
        $foto = basename($_FILES['file']['name']);
        
       // echo $foto;
        
        if($_POST['asuransi'] === 'Ya'){
            $asuransi = TRUE;
        } else{
            $asuransi = FALSE;
        }
                            
        if($_POST['barang_baru'] === 'Ya'){
            $barang_baru = TRUE;
        } else{
            $barang_baru = FALSE;
            }
                            
        $min_order = $_POST['minimal_order'];
        $min_grosir = $_POST['minimal_grosir'];
        $max_grosir = $_POST['maksimal_grosir'];
        $harga_grosir = $_POST['harga_grosir'];
        $kategori = $_POST['kategori'];
        
        $query = "SELECT kode from TOKOKEREN.SUB_KATEGORI WHERE nama = '$kategori'";
        
        $result = pg_query($DBConnection, $query);
        $kategori = pg_fetch_row($result);
        $kategori = $kategori[0];
        
        $result1=is_numeric($harga);
        $result2=is_numeric($nominal);
        //echo "samimawon";
        if ($result2 === FALSE && $nominal <= 0) {
            //echo '1';
            $_SESSION['errorMSG'] = "Nominal stok harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else if($result1 === FALSE  && $harga <= 0) {
            //echo '2';
            $_SESSION['errorMSG'] = "Harga harus angka dan lebih besar dari 0";
            //header("Location: menambah_produk_pulsa.php");
        } else if(!is_numeric($min_order) && !is_numeric($min_grosir) && !is_numeric($max_grosir) && !is_numeric($harga_grosir) && ($harga_grosir||$min_order||$min_grosir||$maks_grosir) <= 0){
            $_SESSION['errorMSG'] = "minimal order, minimal grosir, maksimal grosir, dan harga grosir harus berupa angka dan diatas nilai 0!";
        } else {
            // echo '3';
            $sql = "SELECT * FROM TOKOKEREN.SHIPPED_PRODUK SP, TOKOKEREN.PRODUK P WHERE SP.kode_produk = '$kode_produk' AND P.kode_produk = SP.kode_produk";
            $result = pg_query($DBConnection, $sql);
            
            if(pg_fetch_row($result) >= 1){
                $_SESSION['errorMSG'] = "Kode Produk sudah ada.";
            } else{
                $sql2 = "INSERT INTO TOKOKEREN.PRODUK (kode_produk, nama, harga, deskripsi) VALUES ('$kode_produk', '$nama_produk', '$harga', '$deskripsi')";
                $result2 = pg_query($DBConnection, $sql2);
            
                $sql2 = "INSERT INTO TOKOKEREN.SHIPPED_PRODUK (kode_produk, kategori, nama_toko, is_asuransi, stok, is_baru, min_order, min_grosir, max_grosir, harga_grosir, foto) VALUES ('$kode_produk', '$kategori', '$nama_toko', '$asuransi', '$nominal', '$barang_baru', '$min_order', '$min_grosir', '$max_grosir', '$harga_grosir', '$foto')";
                $result2 = pg_query($DBConnection, $sql2);
                
                $file_tmp = $_FILES['file']['tmp_name'];
                
                move_uploaded_file($file_tmp, ("./src/img/".$foto));
            
                $_SESSION['successMSG'] = "Berhasil membuat Produk!";
            }
           // header("Location: menambah_produk_pulsa.php");
            
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['command'] === 'membuat_produk_shipped'){
            if($_POST['minimal_grosir'] > $_POST['maksimal_grosir']){
                $_SESSION['errorMSG'] = "Minimal Grosir tidak boleh lebih besar dari Maksimal Grosir!";
            } else if($_POST['kategori'] === 'PILIH SUB KATEGORI'){
                $_SESSION['errorMSG'] = "Kategori tidak boleh kosong!";
            } else {
                insertProdukShipped();
            } 
        }
    }
?>
