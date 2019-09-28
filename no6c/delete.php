<?php
include('config.php');

if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$cek = mysqli_query($connection, "SELECT * FROM table_name WHERE id='$id'") or die(mysqli_error($connection));
	
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($connection, "DELETE FROM table_name WHERE id='$id'") or die(mysqli_error($connection));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="index.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="index.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="index.php";</script>';
}


?>