<?php
//memasukkan file config.php
include('config.php');
?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Data Produk</font>
	</center>
	<hr>
	<a href="admin.php?page=tambah_pro"><button class="btn btn-dark right">Tambah Produk</button></a>
	<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>ID.</th>
					<th>Nama Produk</th>
					<th>Deskipsi Produk</th>
					<th>Harga Produk</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM t_produk ORDER BY ID_produk ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if (mysqli_num_rows($sql) > 0) {
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while ($data = mysqli_fetch_assoc($sql)) {
						//menampilkan data perulangan
						echo '
						<tr>
							<td>' . $data['ID_produk'] . '</td>
							<td>' . $data['nama_produk'] . '</td>
							<td>' . $data['desc_produk'] . '</td>
							<td>' . $data['hrg_produk'] . '</td>
							<td>
								<a href="admin.php?page=edit_mhs&Nim=' . $data['nama_produk'] . '" class="btn btn-secondary btn-sm">Edit</a>
								<a href="delete.php?ID=' . $data['ID_produk'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
					//jika query menghasilkan nilai 0
				} else {
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
</div>