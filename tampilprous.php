<?php
//memasukkan file config.php
include('config.php');
?>


<div class="" style="margin-top:20px">
	<center>
		<font size="6">Data Produk</font>

		<hr>
		<div class="">
			<table class="tab">
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
								<a href="#=' . $data['nama_produk'] . '" class="btn btn-secondary btn-sm">Tambahkan keranjang</a>								
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
	</center>
</div>
</div>