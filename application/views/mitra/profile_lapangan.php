<?php 
	foreach ($data_lapangan as $key => $value) {
		$id_lapangan = $value['id'];
		$nama_lapangan = $value['nama'];
		$deskripsi = $value['deskripsi'];
	}
 ?>

<html>
    <div class="x_content">

        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-4">
          <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#informasi" data-toggle="tab">Informasi</a>
            </li>
            <li><a href="#foto" data-toggle="tab">Foto</a>
            </li>
          </ul>
        </div>

        <div class="col-sm-8 col-md-9 col-lg-9 col-xs-8">
          <!-- Tab panes -->
          <div class="tab-content">
            <div class="tab-pane active" id="informasi">
              <p class="lead">Informasi Umum Lapangan</p>
              <div>
              	<form>
              		<label for="fullname">Nama Lapangan :</label>
                  	<input type="text" id="nama_lapangan" class="form-control" name="nama_lapangan" required 
                  	value="<?php echo $nama_lapangan; ?>" />
					<br>
                  	<label for="message">Deskripsi Lapangan :</label>
                  	<textarea id="message" rows="15" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."><?php echo $deskripsi; ?></textarea>
              	</form>
              </div>
            </div>
            <div class="tab-pane" id="foto">Foto Tab</div>
          </div>
        </div>

        <div class="clearfix"></div>

  	</div>
</html>