<?php
    session_start();
    $_SESSION['email_pengguna'] = 'barbaraanne127@gmail.com';
    $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
    $no_jasa_kirim = 1;
    function selectAllFromTable($table) {
        $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
        $query = "SELECT * FROM $table";
        $result = pg_query($DBConnection, $query);

        return $result;   
    }   
    
    function insertToko(){
        $DBConnection = pg_connect("host=localhost port=5432 dbname=abdallachair user=postgres password=abdall4");
        $nama_toko = $_POST['nama_toko'];
        $deskripsi = $_POST['deskripsi'];
        $slogan = $_POST['slogan'];
        $lokasi = $_POST['lokasi'];
        $email = $_SESSION['email_pengguna'];
        $loop = $_POST['jml_loop'];
        
        $query = "SELECT * FROM TOKOKEREN.TOKO WHERE nama = '$nama_toko'";
        $result = pg_query($DBConnection, $query);
        
        if(pg_fetch_row($result) >= 1){
            $errorMSG = "UDAH ADA NAMA TOKOKNYA GBLG";
        } else{
          //  echo'nama toko blm ada!';
            $kirim = $_POST['jasa_kirim_1'];
            $sql1 = "SELECT * FROM TOKOKEREN.TOKO_JASA_KIRIM WHERE nama_toko = '$nama_toko' AND jasa_kirim = '$kirim'";
        
            $result1 = pg_query($DBConnection, $sql1);
            
            
            if($kirim == "PILIH JASA ANDA"){
                $_SESSION['errorMSG'] = "Jasa Kirim 1 tidak boleh kosong!";
            } else if(pg_fetch_row($result1) >= 1){ 
               // echo'track-1';
                
                $num = $loop;
                $x = 1;
                $y = 1;
                
                $sama1 = 0;
                $sama2 = 0;
                
                $flag = TRUE;
                $flag2 = TRUE;
                
                while($x <= $num){
                    $jasa_saat_ini = $_POST['jasa_kirim_'.$x];
                    if($jasa_saat_ini === "PILIH JASA ANDA"){
                        $flag2 = FALSE;
                        break;
                    }
                    while($y <= $num){
                        $jasa_saat_ini2 = $_POST['jasa_kirim_'.$y];
                        if($x == $y){
                            
                        } else{
                            if($jasa_saat_ini == $jasa_saat_ini2){
                                $flag = FALSE;
                                $sama1 = $x;
                                $sama2 = $y;
                                break;
                            }
                        }
                        $y = $y + 1;
                    }
                    $x = $x + 1;
                }
                
                if($flag2 == FALSE){
                    $_SESSION['errorMSG'] = "Jasa Kirim ".$x." tidak boleh kosong!";
                    
                }
                else if($flag == FALSE){
                    echo 'track-2';
                    $_SESSION['errorMSG'] = "Jasa Kirim ".$sama1." dan ".$sama2." Tidak Boleh Sama!";
                    
                } else{
                  //  echo 'track-3';
                    $sql = "INSERT into TOKOKEREN.TOKO (nama, deskripsi, slogan, lokasi, email_penjual) values ('$nama_toko','$deskripsi', '$slogan', '$lokasi', '$email')";
                    $sql3 = "UPDATE TOKOKEREN.PELANGGAN SET is_penjual = TRUE WHERE email = '$email'";
            
                    $resultz = pg_query($DBConnection, $sql);
                    $result = pg_query($DBConnection, $sql3);
                    while($loop > 0){
                        $kirim = $_POST['jasa_kirim_'.$loop];
                        $sql2 = "INSERT into TOKOKEREN.TOKO_JASA_KIRIM (nama_toko, jasa_kirim) values ('$nama_toko','$kirim')";
                        $result = pg_query($DBConnection, $sql2);
                        $loop = $loop - 1;
                    }
                    unset($_SESSION['errorMSG']);
                }
                
            } else{
                
                //echo 'track-4';
                $num = $loop;
                $x = 1;
                $y = 1;
                
               $flag = TRUE;
                $flag2 = TRUE;
                
                $sama1 = 0;
                $sama2 = 0;
                
                while($x <= $num){
                    $jasa_saat_ini = $_POST['jasa_kirim_'.$x];
                    if($jasa_saat_ini === "PILIH JASA ANDA"){
                   //     echo "tracktotr";
                        $flag2 = FALSE;
                        break;
                    }
                    while($y <= $num){
                        $jasa_saat_ini2 = $_POST['jasa_kirim_'.$y];
                        if($x == $y){
                            
                        } else{
                            if($jasa_saat_ini == $jasa_saat_ini2){
                             //   echo "tracktotrsadas";
                                $flag = FALSE;
                                $sama1 = $x;
                                $sama2 = $y;
                                break;
                            }
                        }
                        $y = $y + 1;
                    }
                    $x = $x + 1;
                }
                
                if($flag2 == FALSE){
                    $_SESSION['errorMSG'] = "Jasa Kirim ".$x." tidak boleh kosong!";
                    
                }
                else if($flag == FALSE){
                  //  echo 'track-5';
                    $_SESSION['errorMSG'] = "Jasa Kirim ".$sama1." dan ".$sama2." Tidak Boleh Sama!";
                    
                } else{
                //    echo 'track-6';
                    $sql = "INSERT into TOKOKEREN.TOKO (nama, deskripsi, slogan, lokasi, email_penjual) values ('$nama_toko','$deskripsi', '$slogan', '$lokasi', '$email')";
                    $sql3 = "UPDATE TOKOKEREN.PELANGGAN SET is_penjual = TRUE WHERE email = '$email'";
            
                    $resultz = pg_query($DBConnection, $sql);
                    $result = pg_query($DBConnection, $sql3);
                    while($loop > 0){
                        $kirim = $_POST['jasa_kirim_'.$loop];
                        $sql2 = "INSERT into TOKOKEREN.TOKO_JASA_KIRIM (nama_toko, jasa_kirim) values ('$nama_toko','$kirim')";
                        $result = pg_query($DBConnection, $sql2);
                        $loop = $loop - 1;
                    }
                    unset($_SESSION['errorMSG']);
                }
        }
            /*$sql = "INSERT into TOKOKEREN.TOKO (nama, deskripsi, slogan, lokasi, email_penjual) values ('$nama_toko','$deskripsi', '$slogan', '$lokasi', '$email')";
            $sql3 = "UPDATE TOKOKEREN.PELANGGAN SET is_penjual = TRUE WHERE email = '$email'";
            
            $resultz = pg_query($DBConnection, $sql);
            $result = pg_query($DBConnection, $sql3);
            
            $kirim = $_POST['jasa_kirim_1'];
            $sql1 = "SELECT * FROM TOKOKEREN.TOKO_JASA_KIRIM WHERE nama_toko = '$nama_toko' AND jasa_kirim = '$kirim'";
        
            $result1 = pg_query($DBConnection, $sql1);
            
            if(pg_fetch_row($result1) >= 1){ 
                $loop = $_SESSION['no_jasa_kirim'];
                $num = $loop;
                $x = 1;
                $y = 1;
                
                $flag = TRUE;
                
                while($x < $num){
                    $jasa_saat_ini = $_POST['jasa_kirim_'.$x];
                    while($y < $num){
                        $jasa_saat_ini2 = $_POST['jasa_kirim_'.$y];
                        if($x == $y){
                            
                        } else{
                            if($jasa_saat_ini == $jasa_saat_ini2){
                                $flag = FALSE;
                                return;
                            }
                        }
                        $y = $y + 1;
                    }
                    $x = $x + 1;
                }
                
                if($flag == FALSE){
                    $errorMSG = "Jasa Kirim Tidak Boleh Sama!";
                } else{
                    while($loop > 0){
                        $text = "jasa_kirim_".$loop; 
                        $kirim = $_POST[$text];
                        $sql2 = "INSERT into TOKOKEREN.TOKO_JASA_KIRIM (nama_toko, jasa_kirim) values ('$nama_toko','$kirim')";
                        $result = pg_query($DBConnection, $sql2);
                        $loop = $loop - 1;
                    }
                }*/
            
        }
        
        
        
        
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['nama_toko'] == ""){
            $_SESSION['errorMSG'] = 'nama toko tidak boleh kosong!';
        } else if($_POST['deskripsi'] == ""){
            $_SESSION['errorMSG'] = 'deskripsi tidak boleh kosong!';
        } else if($_POST['slogan'] == ""){
            $_SESSION['errorMSG'] = 'slogan tidak boleh kosong!';
        } else if($_POST['lokasi'] == ""){
            $_SESSION['errorMSG'] = 'lokasi toko tidak boleh kosong!';
        } else if($_POST['command'] === 'membuat_toko'){
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
                            <input type="text" class="form-control" id="insert-nama_toko" name="nama_toko" placeholder="masukkan nama toko yang kamu inginkan">
                        </div>
                        <div class="form-group">
                            <label for="nama_paket">Deskripsi Toko</label>
                            <input type="text" class="form-control" id="insert-deskripsi" name="deskripsi" placeholder="tuliskan deskripsi toko mu">
                        </div>
                        <div class="form-group">
                            <label for="fitur">Slogan</label>
                            <input type="text" class="form-control" id="insert-slogan" name="slogan" placeholder="masukkan slogan toko mu">
                        </div>
                        <div class="form-group">
                            <label for="harga">Lokasi</label>
                            <input type="text" class="form-control" id="insert-lokasi" name="lokasi" placeholder="masukkan lokasi dari toko mu">
                        </div>
                        <div class="form-group">
                            <label for="harga">Jasa Kirim 1</label><br>
                            <?php   
                                    echo '<select name="jasa_kirim_1" required>';
                                    echo '<option>PILIH JASA ANDA</option>';
                                    $jasa = selectAllFromTable("TOKOKEREN.JASA_KIRIM");
                                    while($row = pg_fetch_row($jasa)){
                                        echo '<option>'.$row[0].'</option>';
                                    }
                                    echo '</select>';
                            
                            ?>
                                    
                                    <div id="jasaKirim">
                                        
                                    </div>
                            <br>
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="addJasaKirim">Tambah Jasa Kirim</button>
                        </div>
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_toko">
                        <input id="loop" type="hidden" name="jml_loop" value="1">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                    </form>
                    <span style="color: red"><?php if(isset($_SESSION['errorMSG'])){echo $_SESSION['errorMSG']; unset($_SESSION['errorMSG']);} ?></span>
                </div>
            </div>
        
        
        <script>
            $(document).ready(function(){
                var i = 1;
                $('#addJasaKirim').click(function(){
                    i++;
                    $('#jasaKirim').append('<label for="harga">Jasa Kirim '+i+'</label><br>');
                    $('#jasaKirim').append(<?php
                        
                        echo '"<select id=" + "jasa_kirim_id_" + i + " name=" + "jasa_kirim_" + i + " required>" + ';
                        echo '"<option>PILIH JASA ANDA</option>"+';
                        $jasa = selectAllFromTable("TOKOKEREN.JASA_KIRIM");
                        $count = 1;
                        while($row = pg_fetch_row($jasa)){
                            echo '"<option>" + "'.$row[0].'" + "</option>"';
                            if($count < pg_num_rows($jasa)){echo '+';}
                            $count++;
                        }
                     echo '+"</select>" + "<br>"'; ?>);
                    
                $('#loop').val(parseInt($('#loop').val()) + 1);
                });
                $('#addJasaKirim').click(function() {
                    $.ajax({
                        type: "POST",
                        url: "loop_jasa.php"
                    }).done(function( msg ) {
                    });    
                });
            });
            
        </script>
        <style>
            .error_area{
                background-color: aquamarine;
            }
        </style>
	</body>
</html>