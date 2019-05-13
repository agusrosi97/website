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

	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<input type="hidden" name="id" value="<?php echo $id_tamu ?>">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>Nama Tamu</td>
				<td>:</td>
				<td><input type="text" name="nama" value="<?php echo $data['nama_tamu']; ?>"></td>
			</tr>
			<tr>
				<td>Email Tamu</td>
				<td>:</td>
				<td><input type="text" name="email" value="<?php echo $data['email_tamu']; ?>"></td>
			</tr>
			<tr>
				<td>Alamat Tamu</td>
				<td>:</td>
				<td><textarea name="almt"><?php echo $data['alamat_tamu']; ?></textarea></td>
			</tr>
			<tr>
				<td>Nomor Telepon</td>
				<td>:</td>
				<td><input type="number" name="telp" value="<?php echo $data['notelp_tamu']; ?>"></td>
			</tr>
			<tr>
				<td>Jumlah Orang Dewasa</td>
				<td>:</td>
				<td><input type="number" name="jmlDwsa" value="<?php echo $data['jml_orgdewasa']; ?>"></td>
			</tr>
			<tr>
				<td>Jumlah Anak-anak</td>
				<td>:</td>
				<td><input type="number" name="jmlAnk" value="<?php echo $data['jml_anak']; ?>"></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td align="center"><input type="submit" name="simpan" value="SIMPAN">  |  <button type="button" onclick="window.location.href='../proses_php/index.php'">BATAL</button></td>
			</tr>
		</table>
	</form>

</body>
</html>

<?php
	if (isset($_POST['simpan'])) {
		require_once '../proses_php/koneksi.php';

		$id				= $_POST['id'];
		$nama_tamu		= $_POST['nama'];
		$email_tamu		= $_POST['email'];
		$alamat_tamu	= $_POST['almt'];
		$notelp_tamu	= $_POST['telp'];
		$jml_orgdewasa	= $_POST['jmlDwsa'];
		$jml_anak		= $_POST['jmlAnk'];

		$ubah = mysqli_query($koneksi, "UPDATE tamu SET nama_tamu='$nama_tamu', email_tamu='$email_tamu', alamat_tamu='$alamat_tamu', notelp_tamu='$notelp_tamu', jml_orgdewasa='$jml_orgdewasa', jml_anak='$jml_anak' WHERE id_tamu='$id'");

		if($ubah){
			header("location:../proses_php/index.php");
		} else {
			echo 'Data Gagal Diubah';
			echo ' | <a href="../proses_php/index.php">KEMBALI</a>';
		}
	}
?>