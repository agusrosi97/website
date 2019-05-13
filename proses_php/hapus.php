<?php
	if (isset($_GET['id'])) {
		require_once '../proses_php/koneksi.php';

		$id	= $_GET['id'];
		

		$cek = mysqli_query($koneksi, "SELECT id_tamu FROM tamu WHERE id_tamu='$id'");

		if (mysqli_num_rows($cek) == 0) {
			echo '<script>window.history.back()</script>';
		} else {
			$hapus = mysqli_query($koneksi, "DELETE FROM tamu WHERE id_tamu='$id'");
		}


		if($hapus){
			header("location:../proses_php/index.php");
		} else {
			echo 'Data Gagal Dihapus';
			echo ' | <a href="../proses_php/index.php">KEMBALI</a>';
		}
	}
?>