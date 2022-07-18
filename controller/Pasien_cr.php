<?php
include '../Auth/koneksi.php';

$type = $_POST['tipe'];
$id = $_POST['id'];
if ($type == 'delete') {
	mysqli_query($koneksi,"delete from table_pasien where No_RM='$id'");
} else if($type == 'edit'){
	$query = mysqli_query($koneksi,"select * from table_pasien where No_RM='$id'");
	while($row = $query->fetch_assoc()) {
		$output[] = array (
			"nama" => $row['nama'],
			"alamat" => $row['alamat'],
			"tl" => $row['tempat_lahir'],
			"tgl" => $row['tgl_lahir'],
			"jk" => $row['jenis_kelamin'],
			"pekerjaan" => $row['pekerjaan']
		); 
	}
	echo json_encode($output);
} else if($type == 'update'){
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tl = $_POST['tl'];
	$tgl = $_POST['tgl'];
	$jk = $_POST['jk'];
	$pekerjaan = $_POST['pekerjaan'];
	mysqli_query($koneksi,"update table_pasien set nama='$nama', alamat='$alamat',tempat_lahir='$tl',tgl_lahir='$tgl',jenis_kelamin='$jk', pekerjaan='$pekerjaan' where No_RM='$id'");
} else if ($type == 'create') {
	$nm = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$tl= $_POST['tl'];
	$tgl= $_POST['tgl'];
	$jk= $_POST['jk'];
	$pk= $_POST['pk'];
	mysqli_query($koneksi,"insert into table_pasien value('$id','$nm','$alamat','$tl','$tgl','$jk','$pk')");
}
