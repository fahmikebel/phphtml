<?php include('config.php'); ?>
<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>
	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['ID_produk'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$ID_produk = $_GET['ID_produk'];

		//query ke database SELECT tabel mahasiswa berdasarkan id = $id
		$select = mysqli_query($koneksi, "SELECT * FROM t_produk WHERE ID_produk='$ID_produk'") or die(mysqli_error($koneksi));

		//jika hasil query = 0 maka muncul pesan error
		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
			exit();
			//jika hasil query > 0
		} else {
			//membuat variabel $data dan menyimpan data row dari query
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$ID_produk 			= $_POST['ID_produk'];
		$nama_produk		= $_POST['nama_produk'];
		$desc_produk	= $_POST['desc_produk'];
		$hrg_produk	= $_POST['hrg_produk'];

		$sql = mysqli_query($koneksi, "UPDATE t_produk SET nama_produk='$nama_produk', desc_produk='$desc_produk', hrg_produk='$hrg_produk' WHERE ID_produk='$ID_produk'") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menyimpan data."); document.location="admin.php?page=tampil_pro";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
		}
	}
	?>

	<form action="admin.php?page=edit_mhs&Nim=<?php echo $ID_produk; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">ID</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="ID_produk" class="form-control" size="4" value="<?php echo $data['ID_produk']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Produk</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="nama_produk" class="form-control" value="<?php echo $data['nama_produk']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">deskripsi produk</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="desc_produk" class="form-control" value="<?php echo $data['desc_produk']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">harga produk</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="hrg_produk" class="form-control" value="<?php echo $data['hrg_produk']; ?>" required>
			</div>
		</div>

		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="admin.php?page=tampil_pro" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>