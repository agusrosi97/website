<!DOCTYPE html>
<html>
<head>
	<title>TAMBAH DATA</title>
</head>
<body>
	<h2>TAMBAH DATA TAMU</h2>

	<p><a href="../proses_php/index.php">BERANDA</a> | <a href="tambah_data.php">TAMBAH DATA</a></p>

	<form action="" method="post">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Nama Tamu</td>
				<td>:</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr>
				<td>Email Tamu</td>
				<td>:</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td>:</td>
				<td><input type="number" name="telp"></td>
			</tr>
			<tr>
				<td>Alamat Tamu</td>
				<td>:</td>
				<td><textarea name="almt"></textarea></td>
			</tr>
			<tr>
				<td>Jumlah Orang Dewasa</td>
				<td>:</td>
				<td><input type="number" name="jmlDwsa"></td>
			</tr>
			<tr>
				<td>Jumlah Anak-anak</td>
				<td>:</td>
				<td><input type="number" name="jmlAnk"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td align="center"><input type="submit" name="tambah" value="TAMBAH">  |  <input type="reset" name="reset" value="ULANG"></td>
			</tr>
		</table>
	</form>

</body>
</html>

<?php
	if (isset($_POST['tambah'])) {

		require_once '../proses_php/koneksi.php';

		$nama_tamu		= $_POST['nama'];
		$email_tamu		= $_POST['email'];
		$alamat_tamu	= $_POST['almt'];
		$notelp_tamu	= $_POST['telp'];
		$jml_orgdewasa	= $_POST['jmlDwsa'];
		$jml_anak		= $_POST['jmlAnk'];

		$input = mysqli_query($koneksi, "INSERT INTO tamu VALUES(NULL, '$nama_tamu', '$email_tamu', '$alamat_tamu', '$notelp_tamu', '$jml_orgdewasa', '$jml_anak')");

		if($input){
			header("location:../proses_php/index.php");
		} else {
			echo 'Data Gagal Ditambahkan';
			echo ' | <a href="../proses_php/index.php">KEMBALI</a>';
		}
	}
?>