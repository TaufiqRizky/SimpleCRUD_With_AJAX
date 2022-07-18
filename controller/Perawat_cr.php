<?php
include '../Auth/koneksi.php';

$type = $_POST['tipe'];
$id = $_POST['id'];
if ($type == 'delete') {
	// delete
	mysqli_query($koneksi,"delete from table_perawat where id_perawat='$id'");
} else if($type == 'edit'){
	// edit
	$query = mysqli_query($koneksi,"select * from table_perawat where id_perawat='$id'");
	while($row = $query->fetch_assoc()) {
		$output[] = array (
			"poli" => $row['id_poliklinik'],
			"nama" => $row['nama'],
			"alamat" => $row['alamat'],
			"tgl" => $row['tgl_lahir']
		); 
	}
	echo json_encode($output);
} else if($type == 'update'){
	// update data
	$poli = $_POST['poli'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tgl = $_POST['tgl'];
	mysqli_query($koneksi,"update table_perawat set nama='$nama', alamat='$alamat', id_poliklinik='$poli',tgl_lahir='$tgl' where id_perawat='$id'");
} else if ($type == 'create') {
	// tambah data
	$nm = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tgl= $_POST['tgl'];
	$poli= $_POST['poli'];
	mysqli_query($koneksi,"insert into table_perawat value('$id','$poli','$nm','$alamat','$tgl')");
}
