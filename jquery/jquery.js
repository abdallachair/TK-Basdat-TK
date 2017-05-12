$(document).ready(function(){
    var nomor = 1;
    $("#addJasaKirim").click(function () {
        nomor = nomor + 1;
        var app = '<?=' +
    '$jasa = selectAllFromTable("TOKOKEREN.JASA_KIRIM");'
    + 'while($row = pg_fetch_row($jasa)){'
        + 'echo' + '<option value="' + '.$row[0].' +'">' + '.$row[0].' + '</option>' + ';'
     + '}?>';
    $("#jasaKirim").append('<br><label for="' + 'harga' + '">Jasa Kirim ' +nomor+ '</label>' + '<select name="jasa_kirim_' + nomor + '">'
    );
    $("#jasaKirim").append(app);
    $("#jasaKirim").append("</select>");
 });
})
/*'<div class="form-group"><label class="col-sm-3 control-label" for="jasakirim" >JasaKirim ' + nomor + ':</label><div class="col-sm-9"><select name="gender" class="form-control"><option value="Male"> JNE REGULER </option><option value="Female"> JNE YES </option><option value="Male"> JNE OK </option></select></div></div>'*/

/*
'<br><label for="harga">Jasa Kirim '+nomor+'</label>'
+ '<select name="jasa_kirim_' + nomor + '">' + app + '$jasa = selectAllFromTable(' + 
'"TOKOKEREN.JASA_KIRIM");' +'while($row = pg_fetch_row($jasa)){'+ "echo '" +'<option value="' +".$row['0']."+'">'+".$row['0']."+"</option>';}"+ 
"$_SESSION['no_jasa_kirim'] ="+ nomor +";?></select>"*/