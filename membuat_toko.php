<?php
    //session_start();
    $_SESSION['email']="john793@gmail.com";
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
        $email = $_SESSION['email'];
        $loop = $_POST['jml_loop'];
        
        $query = "SELECT * FROM TOKOKEREN.TOKO WHERE nama = '$nama_toko'";
        $result = pg_query($DBConnection, $query);
        
        if(pg_fetch_row($result) >= 1){
            $_SESSION['errorMSG'] = "Nama toko sudah ada!";
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
                    $y = 1;
                    $x = $x + 1;
                }
                
                if($flag2 == FALSE){
                    $_SESSION['errorMSG'] = "Jasa Kirim ".$x." tidak boleh kosong!";
                    
                }
                else if($flag == FALSE){
                   // echo 'track-2';
                    $_SESSION['errorMSG'] = "Jasa Kirim ".$sama1." dan ".$sama2." Tidak Boleh Sama!";
                    
                } else{
                  //  echo 'track-3';
                    $sql = "INSERT into TOKOKEREN.TOKO (nama, deskripsi, slogan, lokasi, email_penjual) values ('$nama_toko','$deskripsi', '$slogan', '$lokasi', '$email')";
                    $sql3 = "UPDATE TOKOKEREN.PELANGGAN SET is_penjual = TRUE WHERE email = '$email'";
                    

                    $result = pg_query($DBConnection, $sql3);
                    $resultz = pg_query($DBConnection, $sql);
                    while($loop > 0){
                        $kirim = $_POST['jasa_kirim_'.$loop];
                        $sql2 = "INSERT into TOKOKEREN.TOKO_JASA_KIRIM (nama_toko, jasa_kirim) values ('$nama_toko','$kirim')";
                        $result = pg_query($DBConnection, $sql2);
                        $loop = $loop - 1;
                    }
                    unset($_SESSION['errorMSG']);
                    $_SESSION['successMSG'] = 'Pembuatan toko SUKSES!';
                }
                
            } else{
                
                //echo 'track-4';
                $num = $loop;
               // echo $num;
                $x = 1;
                $y = 1;
                
               $flag = TRUE;
                $flag2 = TRUE;
                
                $sama1 = 0;
                $sama2 = 0;
                
                while($x <= $num){
                    //echo ($x);
                   // echo ($y);
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
                          //  echo ($x);
                          //  echo ($y);
                            if($jasa_saat_ini == $jasa_saat_ini2){
                               echo "tracktotrsadas";
                                $flag = FALSE;
                                $sama1 = $x;
                                $sama2 = $y;
                                break;
                            }
                        }
                        $y = $y + 1;
                        
                    }
                    $y = 1;
                    $x = $x + 1;
                }
                //die($jasa_saat_ini . " " . $jasa_saat_ini2 . " ". $flag . " ".$x." ".$y);
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
                    
                    $result = pg_query($DBConnection, $sql3);
                    $resultz = pg_query($DBConnection, $sql);
                    while($loop > 0){
                        $kirim = $_POST['jasa_kirim_'.$loop];
                        $sql2 = "INSERT into TOKOKEREN.TOKO_JASA_KIRIM (nama_toko, jasa_kirim) values ('$nama_toko','$kirim')";
                        $result = pg_query($DBConnection, $sql2);
                        $loop = $loop - 1;
                    }
                    unset($_SESSION['errorMSG']);
                    $_SESSION['successMSG'] = 'Pembuatan toko SUKSES!';
                }
        }  
    }
}

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['command'] === 'membuat_toko'){
            if($_POST['nama_toko'] == ""){
                $_SESSION['errorMSG'] = 'nama toko tidak boleh kosong!';
            } else if($_POST['lokasi'] == ""){
                $_SESSION['errorMSG'] = 'lokasi toko tidak boleh kosong!';
            } else {
                insertToko();
            }
        } 
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
	<body>
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
            });
            
        </script>
	</body>
</html>