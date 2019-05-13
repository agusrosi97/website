<!DOCTYPE html>
<html>
<head>
	<title>EDIT DATA</title>
</head>
<body>
	<h2>EDIT DATA TAMU</h2>

	<p><a href="../proses_php/index.php">BERANDA</a>  |  <a href="../proses_php/tambah_data.php">TAMBAH DATA</a></p>

	<?php

	require_once '../proses_php/koneksi.php';

	$id_tamu = $_GET['id'];

	$show = mysqli_query($koneksi, "SELECT * FROM tamu WHERE id_tamu='$id_tamu'");

	if (mysqli_num_rows($show) == 0) {
		echo '<a href="../proses_php/index.php">KEMBALI</a>';
	} else {
		$data = mysqli_fetch_assoc($show);
	}

	?>
	
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Nama Tamu</td>
				<td>:</td>
				<td><?php echo $data['nama_tamu']; ?></td>
			</tr>
			<tr>
				<td>Email Tamu</td>
				<td>:</td>
				<td><?php echo $data['email_tamu']; ?></td>
			</tr>
			<tr>
				<td>Alamat Tamu</td>
				<td>:</td>
				<td><?php echo $data['alamat_tamu']; ?></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td>:</td>
				<td><?php echo $data['notelp_tamu']; ?></td>
			</tr>
			<tr>
				<td>Jumlah Orang Dewasa</td>
				<td>:</td>
				<td><?php echo $data['jml_orgdewasa']; ?></td>
			</tr>
			<tr>
				<td>Jumlah Anak-anak</td>
				<td>:</td>
				<td><?php echo $data['jml_anak']; ?></td>
			</tr>
			<tr>
				<td colspan="3" align="center"><button type="button" onclick="window.location.href='../proses_php/index.php'">KEMBALI</button></td>
			</tr>
		</table>

</body>
</html>