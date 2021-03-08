<?php include('config.php'); ?>

<center>
	<font size="6">Tambah Produk</font>
</center>
<hr>
<?php
if (isset($_POST['submit'])) {

	$namaproduk			= $_POST['nama_produk'];
	$deskripsi	= $_POST['desc_produk'];
	$harga		= $_POST['hrg_produk'];

	$cek = mysqli_query($koneksi, "SELECT * FROM t_produk WHERE nama_produk='$namaproduk'") or die(mysqli_error($koneksi));

	if (mysqli_num_rows($cek) == 0) {
		$sql = mysqli_query($koneksi, "INSERT INTO t_produk(nama_produk, desc_produk, hrg_produk) VALUES('$namaproduk', '$deskripsi', '$harga')") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menambahkan data."); document.location="admin.php?page=tampil_pro";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
		}
	} else {
		echo '<div class="alert alert-warning">Gagal, ID sudah terdaftar.</div>';
	}
}
?>

<form action="admin.php?page=tambah_pro" method="post">


	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Nama produk</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="nama_produk" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Descripsi</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="desc_produk" class="form-control" required>
		</div>
	</div>
	<div class="item form-group">
		<label class="col-form-label col-md-3 col-sm-3 label-align">Harga</label>
		<div class="col-md-6 col-sm-6">
			<input type="text" name="hrg_produk" class="form-control" required>
		</div>
	</div>

	<div class="item form-group">
		<div class="col-md-6 col-sm-6 offset-md-3">
			<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
		</div>
</form>
</div>