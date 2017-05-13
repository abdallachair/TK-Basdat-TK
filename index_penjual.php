                    <button data-toggle="modal" data-target="#produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Produk<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="produk" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Produk</h4>
                      </div>
                      <div class="modal-body">
                        <h2>FORM MEMBUAT PRODUK PULSA</h2>
                                <form action="page.php" method="post">
                                        <div class="form-group">
                                            <label for="nama_paket">Kode_produk</label>
                                            <input type="text" class="form-control" id="insert-kode_produk" name="kode_produk" placeholder="masukkan kode produk" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_paket">Nama produk</label>
                                            <input type="text" class="form-control" id="insert-nama_produk" name="nama_produk" placeholder="tuliskan nama produk mu" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fitur">Harga</label>
                                            <input type="text" class="form-control" id="insert-harga" name="harga" placeholder="masukkan harga dari produk mu" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Deskripsi</label>
                                            <input type="text" class="form-control" id="insert-deskripsi" name="deskripsi" placeholder="tuliskan deskripsi dari produk mu" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Nominal</label>
                                            <input type="text" class="form-control" id="insert-nominal" name="nominal" placeholder="masukkan harga dari toko mu" required>
                                        </div>

                      </div>
                      <div class="modal-footer">
                      <input type="hidden" id="insert-userid" name="userid">
                                        <input type="hidden" id="insert-command" name="command" value="membuat_produk_pulsa">
                                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                                        </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
                    
                    <button data-toggle="modal" data-target="#produk" style="width: 100%; text-align: left;" class="btn btn-info">Tambah Toko<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
    
                    <div id="produk" class="modal fade" role="dialog">
                  <div class="modal-dialog">

                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Toko</h4>
                      </div>
                      <div class="modal-body">
                        <h2>FORM MEMBUAT PRODUK PULSA</h2>
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
                                    echo '<select name="jasa_kirim_1" required>';
                                    echo '<option>PILIH JASA ANDA</option>';
                                    $jasa = selectAllFromTable("TOKOKEREN.JASA_KIRIM");
                                    while($row = pg_fetch_row($jasa)){
                                        echo '<option>'.$row[0].'</option>';
                                    }
                                    echo '</select>';
                            
                               
                            echo '<div id="jasaKirim">
                                        
                                    </div>
                            <br>
                            
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="addJasaKirim">Tambah Jasa Kirim</button>
                        </div>
                        <input type="hidden" id="insert-userid" name="userid">
                        <input type="hidden" id="insert-command" name="command" value="membuat_toko">
                        <input id="loop" type="hidden" name="jml_loop" value="1">
                        <button type="submit" class="btn btn-primary brown lighten-3">Submit</button>
                    </form>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                    </div>

                  </div>
                </div>
                    
                    <button data-toggle="collapse" data-target="#demo10" style="width: 100%; text-align: left;" class="btn btn-info">Buat Ulasan<span class="glyphicon glyphicon-chevron-down" style="text-align: right"></span></button>
        
        <div id="demo10" class="collapse">
        <div class="container">
	  <h2>Buat Ulasan</h2>
	  <form action="add_ulasan.php">
	    <div class="form-group">
	      <label for="namajasakirim">Kode Produk : </label>
	    </div>
	    <div class="form-group">
	      <label for="lamakirim">Rating : </label>
	      <input type="text" data-min=0 data-max=5 data-step=0.2 class="rating" id="rating-input" name="rating" data-size="xs" required>
	    </div>
	    <div class="form-group">
	      <label for="tarif">Komentar : </label>
	      <input type="number" class="form-control" id="komentar" placeholder="Masukkan komentar anda" name="komentar" required>
	    </div>
	    <button type="submit" class="btn btn-default">Submit</button>
	  </form>
	</div>
        </div>
        <br>
           <!--     end extras -->        
    </div>
    <div class="space"></div>
<!-- end container -->