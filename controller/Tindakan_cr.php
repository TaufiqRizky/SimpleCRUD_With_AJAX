<?php
include '../Auth/koneksi.php';

$type = $_POST['tipe'];
$id = $_POST['id'];
if ($type == 'delete') {
	// delete
	mysqli_query($koneksi,"delete from tabel_tindakan where no_registrasi='$id'");
} else if($type == 'edit'){
	// edit
	$query = mysqli_query($koneksi,"select * from tabel_tindakan where no_registrasi='$id'");
	while($row = $query->fetch_assoc()) {
		$output[] = array (
			"per" => $row['id_perawat'],
			"nmp" => $row['nama_pasien'],
			"jam" => $row['jam'],
			"diag" => $row['diagnosa']
		); 
	}
	echo json_encode($output);
} else if($type == 'update'){
	// update data
	$per = $_POST['per'];
	$nmp = $_POST['nmp'];
	$jam = $_POST['jam'];
	$diag = $_POST['diag'];
	mysqli_query($koneksi,"update tabel_tindakan set id_perawat='$per', nama_pasien='$nmp', jam='$jam',diagnosa='$diag' where no_registrasi='$id'");
} else if ($type == 'create') {
	// tambah data
	$idp = $_POST['id_perawat'];
	$nm = $_POST['nama_pasien'];
	$jam= $_POST['jam'];
	$diagnosa= $_POST['diagnosa'];
	mysqli_query($koneksi,"insert into tabel_tindakan value('$id','$idp','$nm','$jam','$diagnosa')");
}
