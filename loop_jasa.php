<?php
    
        $ses = $_SESSION['no_jasa_kirim'];
        $ses = $ses + 1;
        $_SESSION['no_jasa_kirim'] = $ses;
    
    ?>