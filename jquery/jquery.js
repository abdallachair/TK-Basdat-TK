$(document).ready(function(){
    var nomor = 1;
    $("#addJasaKirim").click(function () {
        nomor = nomor + 1;
    $("#jasaKirim").append(
        '<br><label for="harga">Jasa Kirim '+nomor+'</label>' +
        '<?php' +
            '$jasa = selectAllFromTable(' + '"JASA_KIRIM");' +
            'while($row = mysqli_fetch_row($jasa)){'+
                "echo '" +'<option name="jasa_kirim_id" value="' +".$row['nama']."+'">'+".$row['nama']."+'</option>;}'+ "$_SESSION['no_jasa_kirim'] ="+ nomor +";?>"
    );
 });
})
/*'<div class="form-group"><label class="col-sm-3 control-label" for="jasakirim" >JasaKirim ' + nomor + ':</label><div class="col-sm-9"><select name="gender" class="form-control"><option value="Male"> JNE REGULER </option><option value="Female"> JNE YES </option><option value="Male"> JNE OK </option></select></div></div>'*/