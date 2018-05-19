<?php
function tgl_hari_ini() { //Hari, 12 Maret 2016
	global $hari_ini,$nama_hari_eng_indo,$nama_bulan_panjang;
	$hari=date('l');
	$bln=date('n');
	$tgl=date('j');
	$tahun=date('Y');
	$hari_ini="$nama_hari_eng_indo[$hari], $tgl $nama_bulan_panjang[$bln] $tahun";
	return $hari_ini;
}
function tgljam_hari_ini() { //Hari, 12 Maret 2016
	global $hari_ini,$nama_hari_eng_indo,$nama_bulan_panjang;
	$hari=date('l');
	$bln=date('n');
	$tgl=date('j');
	$tahun=date('Y');
	$jam=date('H:i');
	$hari_ini="$nama_hari_eng_indo[$hari], $tgl $nama_bulan_panjang[$bln] $tahun Pukul $jam";
	return $hari_ini;
}
function tgl_convert($bahasa,$tgl) { //Selasa, 12 Januari 2016
	//format tahun-bulan-tgl
	global $tanggalan,$nama_hari_eng_indo,$nama_bulan_panjang;
	if ($bahasa==1) {
	$tahun=date("Y",strtotime($tgl));
	$hari=date("l",strtotime($tgl));
	$tgl_=date("j",strtotime($tgl));
	$bulan=date("n",strtotime($tgl));
	$tanggalan="$nama_hari_eng_indo[$hari], $tgl_ $nama_bulan_panjang[$bulan] $tahun";
	}
	else {
		$tanggalan=date("l, j F Y",strtotime($tgl));
	}
	return $tanggalan;
}
function hari_tanggal($tgl) { //Selasa
	//format tahun-bulan-tgl
	global $tanggalan,$nama_hari_eng_indo,$nama_bulan_panjang;
	
	$hari=date("l",strtotime($tgl));
	
	$tanggalan=$nama_hari_eng_indo[$hari];
	
	return $tanggalan;
}
function tgl_convert_bln($bahasa,$tgl) { //Sel, 12 Jan 2016
	//format tahun-bulan-tgl
	global $tanggalan,$nama_hari_eng_indo_pendek,$nama_bulan_pendek;
	if ($bahasa==1) {
	$tahun=date("Y",strtotime($tgl));
	$hari=date("l",strtotime($tgl));
	$tgl_=date("j",strtotime($tgl));
	$bulan=date("n",strtotime($tgl));
	$tanggalan="$nama_hari_eng_indo_pendek[$hari], $tgl_ $nama_bulan_pendek[$bulan] $tahun";
	}
	else {
		$tanggalan=date("l, j F Y",strtotime($tgl));
	}
	return $tanggalan;
}
function tgl_convert_waktu($bahasa,$tgl) {
	//format tahun-bulan-tgl hh:mm:ss
	global $tanggalan,$nama_hari_eng_indo,$nama_bulan_panjang;
	if ($bahasa==1) {
	$tahun=date("Y",strtotime($tgl));
	$hari=date("l",strtotime($tgl));
	$tgl_=date("j",strtotime($tgl));
	$bulan=date("n",strtotime($tgl));
	$jam=date("H:i:s",strtotime($tgl));
	$tanggalan="$nama_hari_eng_indo[$hari], $tgl_ $nama_bulan_panjang[$bulan] $tahun $jam";
	}
	else {
		$tanggalan=date("l, j F Y H:i:s",strtotime($tgl));
	}
	return $tanggalan;
}
function tgl_convert_waktu_pendek($bahasa,$tgl) {
	//format tahun-bulan-tgl hh:mm:ss
	global $tanggalan,$nama_hari_eng_indo_pendek,$nama_bulan_pendek;
	if ($bahasa==1) {
	$tahun=date("Y",strtotime($tgl));
	$hari=date("l",strtotime($tgl));
	$tgl_=date("j",strtotime($tgl));
	$bulan=date("n",strtotime($tgl));
	$jam=date("H:i:s",strtotime($tgl));
	$tanggalan="$nama_hari_eng_indo_pendek[$hari], $tgl_ $nama_bulan_pendek[$bulan] $tahun $jam";
	}
	else {
		$tanggalan=date("l, j F Y H:i:s",strtotime($tgl));
	}
	return $tanggalan;
}
function tgl_convert_pendek($bahasa,$tgl) {
	//format tahun-bulan-tgl
	global $tanggalan,$nama_bulan_panjang;
	if ($bahasa==1) {
	$tahun=date("Y",strtotime($tgl));
	$hari=date("l",strtotime($tgl));
	$tgl_=date("j",strtotime($tgl));
	$bulan=date("n",strtotime($tgl));
	$tanggalan="$tgl_ $nama_bulan_panjang[$bulan] $tahun";
	}
	else {
		$tanggalan=date("F jS, Y",strtotime($tgl));
	}
	return $tanggalan;
}
function tanggal_pendek($bahasa,$tgl) {
	//format tahun-bulan-tgl
	global $tanggalan,$nama_bulan_panjang;
	if ($bahasa==1) {
	$tahun=date("Y",strtotime($tgl));
	$hari=date("l",strtotime($tgl));
	$tgl_=date("d",strtotime($tgl));
	$bulan=date("n",strtotime($tgl));
	$tanggalan="$tgl_ $nama_bulan_panjang[$bulan] $tahun";
	}
	else {
		$tanggalan=date("F jS, Y",strtotime($tgl));
	}
	return $tanggalan;
}
function tgl_convert_pendek_bulan($bahasa,$tgl) {
	//format tahun-bulan-tgl
	global $tanggalan,$nama_bulan_pendek;
	if ($bahasa==1) {
	$tahun=date("Y",strtotime($tgl));
	$hari=date("l",strtotime($tgl));
	$tgl_=date("j",strtotime($tgl));
	$bulan=date("n",strtotime($tgl));
	$tanggalan="$tgl_ $nama_bulan_pendek[$bulan] $tahun";
	}
	else {
		$tanggalan=date("F jS, Y",strtotime($tgl));
	}
	return $tanggalan;
}
function tgl_periode_ckp($month = '', $year = '') {
	 global $nama_bulan_pendek;
   if (empty($month)) {
      $month = date('m');
   }
   if (empty($year)) {
      $year = date('Y');
   }
   $result = strtotime("{$year}-{$month}-01");
   $result = strtotime('-1 second', strtotime('+1 month', $result));
	 $tgl=date('Y-m-d',$result);
	 $tahun=date("Y",strtotime($tgl));
 	 $tgl_=date("j",strtotime($tgl));
 	 $bulan=date("n",strtotime($tgl));
	 $tgl_periode_nya='1 '.$nama_bulan_pendek[$bulan].' - '. $tgl_ .' '. $nama_bulan_pendek[$bulan] .' '. $tahun;
	 return $tgl_periode_nya;
}
function cek_hari_kerja($tgl_hari) {
	$hari_kerja=date("w",strtotime($tgl_hari));
	if ($hari_kerja==0 || $hari_kerja==6) {
		$libur=true;
	}
	else {
		$libur=false;
	}
	return $libur;
}
function cek_hari_libur($tgl_hari) {
	$db_hari = new db();
	$conn_hari = $db_hari -> connect();
	$sql_hari = $conn_hari -> query("select * from hari_libur where tanggal='$tgl_hari'");
	$cek_hari = $sql_hari -> num_rows;
	$data_libur=array("error"=>false);
	if ($cek_hari>0) {
		$r=$sql_hari->fetch_object();
		$data_libur["error"]=false;
		$data_libur["libur_tgl"]=$r->tanggal;
		$data_libur["libur_ket"]=$r->ket;
	}
	else {
		$data_libur["error"]=true;
		$data_libur["pesan_error"]='Data tidak ada';
	}
	return $data_libur;
	$conn_hari -> close();
}
function cek_id_hari_libur($tgl_id) {
	$db_hari = new db();
	$conn_hari = $db_hari -> connect();
	$sql_hari = $conn_hari -> query("select * from hari_libur where id='$tgl_id'");
	$cek_hari = $sql_hari -> num_rows;
	$data_libur=array("error"=>false);
	if ($cek_hari>0) {
		$data_libur["error"]=false;
		$data_libur["pesan_error"]='Data hari libur tersedia';
	}
	else {
		$data_libur["error"]=true;
		$data_libur["pesan_error"]='<div class="alert alert-danger">Data hari libur <strong>tidak tersedia</strong></div>';
	}
	return $data_libur;
	$conn_hari -> close();
}
function hapus_hari_libur($tgl_id) {
	$db_hari = new db();
	$conn_hari = $db_hari -> connect();
	$sql_hari = $conn_hari -> query("delete from hari_libur where id='$tgl_id'");
	//$cek_hari = $sql_hari -> num_rows;
	$data_libur=array("error"=>false);
	if ($sql_hari) {
		$data_libur["error"]=false;
		$data_libur["pesan_error"]='<div class="alert alert-success">Data hari libur berhasil dihapus</div>';
	}
	else {
		$data_libur["error"]=true;
		$data_libur["pesan_error"]='<div class="alert alert-danger">Data hari libur <strong>tidak bisa dihapus</strong></div>';
	}
	return $data_libur;
	$conn_hari -> close();
}
function list_hari_libur($tgl_hari,$tgl_tahun,$detil=false){
	$db_hari = new db();
	$conn_hari = $db_hari -> connect();
	if ($detil==false) {
		//semua hari libur dalam tahun yg terisi
		$sql_hari = $conn_hari -> query("select * from hari_libur where year(tanggal)='$tgl_tahun' order by tanggal asc") or die(mysqli_error($conn_hari));
	}
	else {
		//hari libur menurut tgl_hari
		$sql_hari = $conn_hari -> query("select * from hari_libur where tanggal='$tgl_hari'");
	}
	
	$cek_hari = $sql_hari -> num_rows;
	$data_libur=array("error"=>false);
	if ($cek_hari>0) {
		$data_libur["error"]=false;
		$data_libur["total_hari"]=$cek_hari;
		$i=1;
		while ($r=$sql_hari->fetch_object()) {
			$data_libur["item"][$i]=array(
				"tgl_id"=>$r->id,
				"tgl_hari"=>$r->tanggal,
				"tgl_ket"=>$r->ket,
				"tgl_status"=>$r->status,
				"tgl_add"=>$r->tgl_add,
				"tgl_add_oleh"=>$r->add_oleh,
				"tgl_update"=>$r->tgl_update,
				"tgl_update_oleh"=>$r->update_oleh
			);
			$i++;
		}
	}
	else {
		$data_libur["error"]=true;
		$data_libur["pesan_error"]='Data hari libur tidak ada';
	}
	return $data_libur;
	$conn_hari -> close();
}
function save_hari_libur($tgl_hari,$tgl_ket,$tgl_status){
	$waktu_lokal=date("Y-m-d H:i:s");
	$created=$_SESSION['papo_userid'];
	
	$db_hari = new db();
	$conn_hari = $db_hari -> connect();
	$sql_save_hari = $conn_hari -> query("insert into hari_libur(tanggal,ket,status,tgl_add,add_oleh) value('$tgl_hari','$tgl_ket','$tgl_status','$waktu_lokal','$created')") or die(mysqli_error($conn_hari));
	$data_libur=array("error"=>false);
	if ($sql_save_hari) {
		//berhasil di simpan
		$data_libur["error"]=false;
		$data_libur["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : Data tanggal <strong>'.$tgl_hari.'</strong> berhasil di simpan</div>';
	}
	else {
		//gagal disimpan
		$data_libur["error"]=true;
		$data_libur["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong> : gagal menyimpan data</div>';
	}
	return $data_libur;
	$conn_hari -> close();
}
function edit_hari_libur($tgl_id){
	$db_hari = new db();
	$conn_hari = $db_hari -> connect();
	$sql_edit_hari_libur=$conn_hari->query("select * from hari_libur where id='$tgl_id'") or die(mysqli_error($conn_hari));	
	$cek_hari = $sql_edit_hari_libur -> num_rows;
	$data_libur=array("error"=>false);
	if ($cek_hari>0) {
		$data_libur["error"]=false;
		$r=$sql_edit_hari_libur->fetch_object();
		$data_libur["item"]=array(
				"tgl_id"=>$r->id,
				"tgl_hari"=>$r->tanggal,
				"tgl_ket"=>$r->ket,
				"tgl_status"=>$r->status,
				"tgl_add"=>$r->tgl_add,
				"tgl_add_oleh"=>$r->add_oleh,
				"tgl_update"=>$r->tgl_update,
				"tgl_update_oleh"=>$r->update_oleh
			);		
	}
	else {
		$data_libur["error"]=true;
		$data_libur["pesan_error"]='<div class="alert alert-danger">Data hari libur tidak ada</div>';
	}
	return $data_libur;
	$conn_hari -> close();
}
function update_hari_libur($tgl_id,$tgl_libur,$tgl_ket,$tgl_status) {
	$waktu_lokal=date("Y-m-d H:i:s");
	$created=$_SESSION['papo_userid'];
	
	$db_hari = new db();
	$conn_hari = $db_hari -> connect();
	$sql_save_hari = $conn_hari -> query("update hari_libur set tanggal='$tgl_libur', ket='$tgl_ket', status='$tgl_status', tgl_update='$waktu_lokal', update_oleh='$created' where id='$tgl_id' ") or die(mysqli_error($conn_hari));
	$data_libur=array("error"=>false);
	if ($sql_save_hari) {
		//berhasil di simpan
		$data_libur["error"]=false;
		$data_libur["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : Data tanggal <strong>'.$tgl_libur.'</strong> berhasil di update</div>';
	}
	else {
		//gagal disimpan
		$data_libur["error"]=true;
		$data_libur["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong> : gagal diupdate datanya</div>';
	}
	return $data_libur;
	$conn_hari -> close();
}
?>
