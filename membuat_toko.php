<?php
    
    $DBConnection = pg_connect('host=localhost dbname=farhanramadhan username=postgres password=gold28197');
    function selectAllFromTable($table) {
        $DBConnection = pg_connect('host=localhost dbname=farhanramadhan username=postgres password=gold28197');
        $query = "SELECT * FROM $table";
        $result = pg_query($DBConnection, $query);

        return $result;   
    }
    
    function insertToko(){

        $nama_toko = $_POST['nama_toko'];
        $deskripsi = $_POST['deskripsi'];
        $slogan = $_POST['slogan'];
        $lokasi = $_POST['lokasi'];
        $email = $_SESSION['email_pengguna'];
        
        $sql = "INSERT into TOKOKEREN.TOKO (nama, deskripsi, slogan, lokasi, email_penjual) values ('$nama_toko','$deskripsi', '$slogan', '$lokasi', '$email')";
        
        
        $result = pg_query($db_connection, $sql);
        
        
        
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['command'] === 'membuat_toko'){
            insertToko();
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MEMBUAT TOKO</title>
	   <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" href = "bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="rating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="rating/js/star-rating.js" type="text/javascript"></script>
	   </head>
	<body>
        <div class="navbar-default text-center">
			<span class="lead big-text">Toko<b>Keren</b>
		</div>
        <div class="membuat_toko">
            <div class="container">
                <h2>Buat Toko</h2>
                <form action="membuat_toko.php" method="post">
                        <div class="form-group">
                            <label for="nama_paket">Nama Toko</label>
                            <input type="text" class="form-control" id="insert-nama_toko" name="nama_toko" placeholder="masukkan nama toko yang kamu inginkan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_paket">Deskripsi Toko</label>
                            <input type="text" class="form-control" id="insert-deskripsi" name="deskripsi" placeholder="tuliskan deskripsi toko mu" required>
                        </div>
                        <div class="form-group">
                            <label for="fitur">Slogan</label>
                            <input type="text" class="form-control" id="insert-slogan" name="slogan" placeholder="masukkan slogan toko mu" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Lokasi</label>
                            <input type="text" class="form-control" id="insert-lokasi" name="lokasi" placeholder="masukkan lokasi dari toko mu" required>
                        </div>
                        <div class="form-group">
                            <?php
                            $nomor = 1
                            
                                echo '<label name="jasa_'.$nomor.'">Jasa Kirim '.$nomor.'</label><br>';
                            $nomor = $nomor + 1;
                            
                           //     $noJasaKirim = 1;
                           //     echo'<label for="harga">Jasa Kirim '.$noJasaKirim.'</label>
                           // <select>
                           //     <option>-------</option>';

                            //    $jasa = selectAllFromTable("JASA_KIRIM");
                             //   $value = 1;
                             //   while ($row = mysqli_fetch_row($jasa)){
                             //       echo'<option value="'.$value.'"></option>';
                             //       $value = value + 1;
                             //   }
                          
                           // echo'</select>
                          //  <input type="submit" value="Tambah Jasa">';
                          //  ?> 
                            <select>
                                <?php
                                    $jasa = selectAllFromTable("JASA_KIRIM");
                                    while($row = mysqli_fetch_row($jasa)){
                                        echo '<option name="jasa_kirim_id" value="'.$row['nama'].'">'.$row['nama'].'</option>';
                                    }
                                ?>
                            </select><br>
                            <input type="submit" value="Tambah Jasa">
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_toko">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                    </form>
                </div>
            </div>
	</body>
</html>
