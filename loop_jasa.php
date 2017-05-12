<?php
    $jasa = selectAllFromTable("TOKOKEREN.JASA_KIRIM");
    while($row = pg_fetch_row($jasa)){
        echo '<option value="'.$row[0].'">'.$row[0].'</option>';
    }?>