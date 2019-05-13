<!DOCTYPE html>
<html>
<head>
	<title>Data Tamu</title>
</head>
<body>
	<h2>DATA TAMU</h2>
	<p><a href="./index.php">BERANDA</a> | <a href="../proses_php/tambah_data.php">TAMBAH DATA</a></p>

	<table cellpadding="5" cellspacing="0" border="1">
		<tr bgcolor="#ccccc">
			<th>NO</th>
			<th>ID</th>
			<th>Nama Tamu</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Jumlah Orang Dewasa</th>
			<th>Jumlah Anak-anak</th>
			<th>OPSI</th>
		</tr>

		<?php
		require_once '../proses_php/koneksi.php';

		$query = "SELECT * FROM tamu";
		if($hasil = mysqli_query($koneksi, $query)){
			if (mysqli_num_rows($hasil) == 0) {
				echo '<tr align="center"><td colspan="9">Tidak ada data!</td></tr>';
			} else {
				$no = 1;
				while ($data = mysqli_fetch_assoc($hasil)) {
					echo '<tr>';
						echo '<td>' . $no . '</td>';
						echo '<td>' . $data['id_tamu'] . '</td>';
						echo '<td>' . $data['nama_tamu'] . '</td>';
						echo '<td>' . $data['email_tamu'] . '</td>';
						echo '<td>' . $data['alamat_tamu'] . '</td>';
						echo '<td>' . $data['notelp_tamu'] . '</td>';
						echo '<td>' . $data['jml_orgdewasa'] . '</td>';
						echo '<td>' . $data['jml_anak'] . '</td>';

						echo '<td><a href="../proses_php/edit_data.php?id=' . $data['id_tamu'] . '">UBAH</a> | <a href="../proses_php/hapus.php?id=' . $data['id_tamu'] . '"onclick="return confirm(\'Yakin Ingin Menghapus Data Tersebut ? \')">HAPUS</a> | <a href="../proses_php/lihat_data.php?id=' . $data['id_tamu'] . '">LIHAT</a></td>';
					echo '</tr>';
				$no++;
				}

			}
		}
		
		?>
		
	</table>
</body>
</html>