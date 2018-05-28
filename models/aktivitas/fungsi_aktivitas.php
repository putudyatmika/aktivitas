<?php
function list_redaksi($id,$detil=false) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		//list semua redaksi
		$sql_list_redaksi = $conn_aktif -> query("select * from redaksi order by id asc") or die(mysqli_error($conn_aktif));
	}
	else {
		//pilih 1 redaksi sesuai id nya
		$sql_list_redaksi = $conn_aktif -> query("select * from redaksi where id='$id'") or die(mysqli_error($conn_aktif));
	}
	$r_data=array("error"=>false);
	$cek = $sql_list_redaksi->num_rows;
	if ($cek > 0) {
		//ada isinya
		$r_data["error"]=false;
		$r_data["red_total"]=$cek;
		$i=1;
		while ($r=$sql_list_redaksi->fetch_object()) {
			$r_data["item"][$i]=array(
				"red_id"=>$r->id,
				"red_nama"=>$r->redaksi
			);
			$i++;
		}

	}
	else {
		$r_data["error"]=true;
		$r_data["pesan_error"]="Data tidak tersedia";

	}
	return $r_data;
	$conn_aktif -> close();
}
function save_m_kamus($aktif_judul,$aktif_unitkerja,$user_id,$aktif_status) {
	$waktu_lokal=date("Y-m-d H:i:s");
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_simpan_red=$conn_aktif->query("insert into m_kamus(redaksi,unit_kode,user_id,tgl_add,flag) values('$aktif_judul','$aktif_unitkerja','$user_id','$waktu_lokal','$aktif_status')") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_simpan_red) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil disimpan';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak disimpan';
	}
	return $status_input;
	$conn_aktif->close();
}
function update_m_aktivitas($aktif_id,$aktif_judul,$aktif_unitkerja,$peg_id,$aktif_status) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_update_aktivitas=$conn_aktif->query("update m_aktivitas set judul='$aktif_judul',unitkerja='$aktif_unitkerja',peg_id='$peg_id',status='$aktif_status' where id='$aktif_id'") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_update_aktivitas) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil diupdate';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak diupdate';
	}
	return $status_input;
	$conn_aktif->close();
}
function search_id_m_kamus($redaksi,$unit_kode,$user_id) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_search=$conn_aktif->query("select id from m_kamus where redaksi='$redaksi' and unit_kode='$unit_kode' and user_id='$user_id'") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	$cek=$sql_search->num_rows;
	if ($cek>0) {
		$r=$sql_search->fetch_object();
		$status_input["error"]=false;
		$status_input["id"]=$r->id;
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='Data tidak tersedia';
	}
	return $status_input;
	$conn_aktif->close();
}
function delete_aktivitas_harian($aktif_id) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_delete_aktivitas=$conn_aktif->query("select aktivitas.*, m_kamus.redaksi, unitkerja.nama as unitnama from aktivitas inner join unitkerja on aktivitas.unit_kode=unitkerja.kode inner join m_kamus on aktivitas.m_id=m_kamus.id where aktivitas.id='$aktif_id'") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	$cek=$sql_delete_aktivitas->num_rows;
	if ($cek>0) {
		$status_input["error"]=false;
		$r=$sql_delete_aktivitas->fetch_object();
		$sql_hapus=$conn_aktif->query("delete from aktivitas where id='$aktif_id'") or die(mysqli_error($conn_aktif));
		$status_input["pesan_error"]='(SUKSES) Data kegiatan <strong>'.$r->redaksi.'</strong> dari Jam '.date("H:i",strtotime($r->jam_start)).' s/d '.date("H:i",strtotime($r->jam_end)).' sudah dihapus';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak ditemukan';
	}
	return $status_input;
	$conn_aktif->close();
}
function update_aktivitas_harian($aktif_id,$aktif_nama_kegiatan,$user_id,$aktif_tanggal,$aktif_mulai,$aktif_selesai,$aktif_target,$aktif_satuan,$aktif_unitkerja) {
	$waktu_lokal=date("Y-m-d H:i:s");
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	//cek dulu redaksi sebelum dan setelah edit
	$r_cari=search_id_m_kamus($aktif_nama_kegiatan,$aktif_unitkerja,$user_id);
	if ($r_cari["error"]==false) {
		//master aktivitas sudah ada
		$m_id=$r_cari["id"];
	}
	else {
		$r_save_m_aktivitas=save_m_kamus($aktif_nama_kegiatan,$aktif_unitkerja,$user_id,1);
		$r_cari_baru=search_id_m_kamus($aktif_nama_kegiatan,$aktif_unitkerja,$user_id);
		$m_id=$r_cari_baru["id"];
	}
	//eksekusi update data aktivitas
	//aktivitas(m_id,user_id,unit_kode,tanggal,target,satuan,tgl_add,jam_start,jam_end,update_oleh,flag)
	$sql_update_aktivitas=$conn_aktif->query("update aktivitas set m_id='$m_id', user_id='$user_id', unit_kode='$aktif_unitkerja', target='$aktif_target', satuan='$aktif_satuan', jam_start='$aktif_mulai', jam_end='$aktif_selesai', tgl_update='$waktu_lokal', update_oleh='$user_id' where id='$aktif_id' ") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_update_aktivitas) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil diupdate';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak bisa diupdate';
	}
	return $status_input;
	$conn_aktif->close();

}
function save_aktivitas_harian($redaksi,$user_id,$tgl_aktif,$jam_awal,$jam_akhir,$target,$satuan,$aktif_unitkerja) {
	$waktu_lokal=date("Y-m-d H:i:s");
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	//simpan di master redaksi dulu
	//$sql_simpan_red=$conn_aktif->query("insert into m_aktivitas(judul,unitkerja,peg_id,status) values('$redaksi','$aktif_unitkerja','$peg_id','1')") or die(mysqli_error($conn_aktif));
	//$sql_cari_id=$conn_aktif->query("select id from m_aktivitas where judul='$redaksi' and unitkerja='$aktif_unitkerja' and peg_id='$peg_id' limit 1") or die(mysqli_error($conn_aktif));
	//$r=$sql_cari_id->fetch_object();
	//$m_id=$r->id;
	$r_cari=search_id_m_kamus($redaksi,$aktif_unitkerja,$user_id);
	if ($r_cari["error"]==false) {
		//master aktivitas sudah ada
		$m_id=$r_cari["id"];
	}
	else {
		$r_save_m_aktivitas=save_m_kamus($redaksi,$aktif_unitkerja,$user_id,1);
		$r_cari_baru=search_id_m_kamus($redaksi,$aktif_unitkerja,$user_id);
		$m_id=$r_cari_baru["id"];
	}
	
	
	$sql_input_aktivitas=$conn_aktif->query("insert into aktivitas(m_id,user_id,unit_kode,tanggal,target,satuan,tgl_add,jam_start,jam_end,flag) values('$m_id','$user_id','$aktif_unitkerja','$tgl_aktif','$target','$satuan','$waktu_lokal','$jam_awal','$jam_akhir','1')") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_input_aktivitas) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Data berhasil disimpan';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) Data tidak disimpan';
	}
	return $status_input;
	$conn_aktif->close();

}
function list_aktivitas_unitkerja($unit_kode,$tgl_aktif,$detil=false) {
	//staf unit hanya bisa liat semua kegiatan diseksinya termasuk kepala seksinya
	//kepala seksi bisa lihat semua staf di bidangnya termasuk kepala bidangnya
	//kepala bidang bisa lihat semua bidang / bagian 
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		//semua list aktivitas di 1 bidang termasuk kepala bidang
		$sql_list_aktivitas = $conn_aktif -> query("select aktivitas.*, unitkerja.unit_nama, unitkerja.unit_parent,m_pegawai.peg_nama, m_pegawai.peg_jabatan, m_pegawai.peg_nip from aktivitas inner join unitkerja on aktivitas.aktif_unitkerja=unitkerja.unit_kode inner join m_pegawai on m_pegawai.peg_id=aktivitas.peg_id where SUBSTRING(unitkerja.unit_kode,1,4)=SUBSTRING('$unit_kode',1,4) order by aktif_tgl desc, aktif_awal asc") or die(mysqli_error($conn_aktif));
	}
	else {
		//hanya 1 seksi saja di 1 tanggal
		$sql_list_aktivitas = $conn_aktif -> query("select aktivitas.*, unitkerja.unit_nama, unitkerja.unit_parent,m_pegawai.peg_nama, m_pegawai.peg_jabatan, m_pegawai.peg_nip from aktivitas inner join unitkerja on aktivitas.aktif_unitkerja=unitkerja.unit_kode inner join m_pegawai on m_pegawai.peg_id=aktivitas.peg_id where SUBSTRING(unitkerja.unit_kode,1,4)=SUBSTRING('$unit_kode',1,4) and aktif_tgl='$tgl_aktif' order by aktif_tgl desc, aktif_awal asc") or die(mysqli_error($conn_aktif));
	}

	$r_data=array("error"=>false);
	$cek = $sql_list_aktivitas->num_rows;
	if ($cek > 0) {
		//ada isinya
		$r_data["error"]=false;
		$r_data["aktif_total"]=$cek;
		$i=1;
		while ($r=$sql_list_aktivitas->fetch_object()) {
			$r_data["item"][$i]=array(
				"aktif_id"=>$r->aktif_id,
				"m_id"=>$r->m_id,
				"m_redaksi"=>$r->m_redaksi,
				"peg_id"=>$r->peg_id,
				"aktif_unitkerja"=>$r->aktif_unitkerja,
				"aktif_target"=>$r->aktif_target,
				"aktif_satuan"=>$r->aktif_satuan,
				"aktif_tgl"=>$r->aktif_tgl,
				"aktif_awal"=>$r->aktif_awal,
				"aktif_akhir"=>$r->aktif_akhir,
				"aktif_status"=>$r->aktif_status,
				"unit_nama"=>$r->unit_nama,
				"unit_parent"=>$r->unit_parent,
				"peg_nama"=>$r->peg_nama,
				"peg_jabatan"=>$r->peg_jabatan,
				"peg_nip"=>$r->peg_nip
			);
			$i++;
		}

	}
	else {
		$r_data["error"]=true;
		$r_data["pesan_error"]="Data tidak tersedia";

	}
	return $r_data;
	$conn_aktif -> close();
} 
function list_aktivitas_harian($id,$tgl_aktif,$detil=false,$user_id) {
	//$id bisa id aktifitas, user_id, maupun unit_id
	//list_aktivitas_harian(0,$tgl_dipilih,false,$peg_id)
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($detil==false) {
		//semua list aktifitas
		$sql_list_aktifitas = $conn_aktif -> query("select aktivitas.*, m_kamus.redaksi, unitkerja.nama as unitnama from aktivitas inner join unitkerja on aktivitas.unit_kode=unitkerja.kode inner join m_kamus on aktivitas.m_id=m_kamus.id where aktivitas.tanggal='$tgl_aktif' and aktivitas.user_id='$user_id' order by jam_start asc") or die(mysqli_error($conn_aktif));
	}
	else {
		//hanya 1 kegiatan saja
		$sql_list_aktifitas = $conn_aktif -> query("select aktivitas.*, m_kamus.redaksi, unitkerja.nama as unitnama from aktivitas inner join unitkerja on aktivitas.unit_kode=unitkerja.kode inner join m_kamus on aktivitas.m_id=m_kamus.id where aktivitas.id='$id'") or die(mysqli_error($conn_aktif));
	}

	$r_data=array("error"=>false);
	$cek = $sql_list_aktifitas->num_rows;
	if ($cek > 0) {
		//ada isinya
		$r_data["error"]=false;
		$r_data["aktif_total"]=$cek;
		$i=1;
		while ($r=$sql_list_aktifitas->fetch_object()) {
			$r_data["item"][$i]=array(
				"id"=>$r->id,
				"m_id"=>$r->m_id,
				"redaksi"=>$r->redaksi,
				"user_id"=>$r->user_id,
				"unit_kode"=>$r->unit_kode,
				"target"=>$r->target,
				"satuan"=>$r->satuan,
				"tanggal"=>$r->tanggal,
				"jam_start"=>$r->jam_start,
				"jam_end"=>$r->jam_end,
				"tgl_add"=>$r->tgl_add,
				"tgl_update"=>$r->tgl_update,
				"update_oleh"=>$r->update_oleh,
				"flag"=>$r->flag
			);
			$i++;
		}

	}
	else {
		$r_data["error"]=true;
		$r_data["pesan_error"]="Belum ada aktivitas harian";

	}
	return $r_data;
	$conn_aktif -> close();
}
function flag_m_kamus($flag_kode,$m_id) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	if ($flag_kode==0) {
		$flag_kode_new=1;
	}
	else {
		$flag_kode_new=0;
	}
	$sql_update_flag_kamus=$conn_aktif->query("update m_kamus set flag='$flag_kode_new' where id='$m_id'") or die(mysqli_error($conn_aktif));
	$status_input=array("error"=>false);
	if ($sql_update_flag_kamus) {
		$status_input["error"]=false;
		$status_input["pesan_error"]='(SUKSES) Flag kamus berhasil di ubah';
	}
	else {
		$status_input["error"]=true;
		$status_input["pesan_error"]='(ERROR) flag kamus tidak dapat di ubah';
	}
	return $status_input;
	$conn_aktif->close();
}
function list_m_kamus($id,$detil=false,$unit=false,$flag=false) {
	$unit_kode=$_SESSION['papo_unitkerja'];
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	
	if ($detil==false) {
		if ($unit==false) {
			//list semua master kegiatan
			//list semua redaksi
			if ($flag==false) { $m_flag=''; }
			else { $m_flag='where m_kamus.flag=1';	}
			$sql_list_redaksi = $conn_aktif -> query("select m_kamus.*, unitkerja.nama as unitnama, unitkerja.jenis, users.nama as user_nama from m_kamus inner join unitkerja on m_kamus.unit_kode=unitkerja.kode inner join users on users.id=m_kamus.user_id $m_flag order by m_kamus.id asc") or die(mysqli_error($conn_aktif));
		}
		else {
			//list master kegiatan di unitkerjanya
			if ($flag==false) { $m_flag=''; }
			else { $m_flag='and m_kamus.flag=1';	}
			$sql_list_redaksi = $conn_aktif -> query("select m_kamus.*, unitkerja.nama as unitnama, unitkerja.jenis, users.nama as user_nama from m_kamus inner join unitkerja on m_kamus.unit_kode=unitkerja.kode inner join users on users.id=m_kamus.user_id where m_kamus.unit_kode='$unit_kode' $m_flag order by id asc") or die(mysqli_error($conn_aktif));
		}
	}
	else {
		//pilih 1 redaksi sesuai id nya
		if ($flag==false) { $m_flag=''; }
		else { $m_flag='and m_kamus.flag=1';	}
		$sql_list_redaksi = $conn_aktif -> query("select m_kamus.*, unitkerja.nama as unitnama, unitkerja.jenis, users.nama as user_nama from m_kamus inner join unitkerja on m_kamus.unit_kode=unitkerja.kode inner join users on users.id=m_kamus.user_id where m_kamus.id='$id' $m_flag") or die(mysqli_error($conn_aktif));
	}
	$r_data=array("error"=>false);
	$cek = $sql_list_redaksi->num_rows;
	if ($cek > 0) {
		//ada isinya
		$r_data["error"]=false;
		$r_data["m_total"]=$cek;
		$i=1;
		while ($r=$sql_list_redaksi->fetch_object()) {
			$r_data["item"][$i]=array(
				"m_id"=>$r->id,
				"m_redaksi"=>$r->redaksi,
				"m_unitkode"=>$r->unit_kode,
				"m_unitnama"=>$r->unitnama,
				"m_userid"=>$r->user_id,
				"m_namauser"=>$r->user_nama,
				"m_tgl_add"=>$r->tgl_add,
				"m_tgl_update"=>$r->tgl_update,
				"m_update_oleh"=>$r->update_oleh,
				"m_flag"=>$r->flag
			);
			$i++;
		}

	}
	else {
		$r_data["error"]=true;
		$r_data["pesan_error"]="Data tidak tersedia";

	}
	return $r_data;
	$conn_aktif -> close();
}

function simpan_redaksi($kata_redaksi) {
	$db_aktif = new db();
	$conn_aktif = $db_aktif -> connect();
	$sql_simpan_data= $conn_aktif->query("insert into redaksi(redaksi) values('$kata_redaksi')") or die(mysqli_connect($conn_aktif));
	if ($sql_simpan_data) {
		$r_data=true;
	}
	else {
		$r_data=false;
	}
	return $r_data;
	$conn_aktif -> close();
}
function jumlah_aktivitas($bulan_skrg,$tahun_skrg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_ranking_keg = $conn_keg -> query("select unitkerja.kode, unitkerja.nama, a.jumlah from unitkerja left join (select SUBSTRING(aktivitas.unit_kode,1,4) as unit_kode, COUNT(*) as jumlah from aktivitas where month(aktivitas.tanggal)='$bulan_skrg' and year(aktivitas.tanggal)='$tahun_skrg' group by unit_kode) as a on SUBSTRING(unitkerja.kode,1,4)=a.unit_kode where unitkerja.jenis='1' and unitkerja.eselon=3 group by unitkerja.kode") or die(mysqli_error($conn_keg));
	$cek=$sql_ranking_keg->num_rows;
	$data_aktivitas=array("error"=>false);
	if ($cek>0) {
		$data_aktivitas["error"]=false;
		$data_aktivitas["aktif_total"]=$cek;
		$i=1;
		while ($r=$sql_ranking_keg->fetch_object()) {
			$data_aktivitas["item"][$i]=array(
				"unit_kode"=>$r->kode,
				"unit_nama"=>$r->nama,
				"unit_jumlah"=>$r->jumlah
			);
			$i++;
		}
	}
	else {
		$data_aktivitas["error"]=true;
		$data_aktivitas["pesan_error"]='Data tidak tersedia';
	}
	return $data_aktivitas;
	$conn_keg->close();	
}
function jumlah_aktivitas_bulanan($tahun_keg) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	$sql_tahunan = $conn_keg -> query("select m_bulan.id, m_bulan.bln_ind, m_bulan.bln_eng, b.tahun, b.jumlah from m_bulan left join (select month(tanggal) as bulan, year(tanggal) as tahun, count(*) as jumlah from aktivitas where year(tanggal)='$tahun_keg' group by bulan asc) as b on m_bulan.id=b.bulan") or die(mysqli_error($conn_keg));
	
	$cek=$sql_tahunan->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$data_keg["aktif_total"]=$cek;
		$i=1;
		while ($r=$sql_tahunan->fetch_object()) {
			$data_keg["item"][$i]=array(
				"aktif_bulan"=>$r->id,
				"aktif_bulan_nama"=>$r->bln_ind,
				"aktif_tahun"=>$r->tahun,
				"aktif_jumlah"=>$r->jumlah
			);
			$i++;
		}
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
	}
	return $data_keg;
	$conn_keg->close();	
}
function aktivitas_perhari($tgl_aktivitas,$user_id,$uid=false) {
	$db_keg = new db();
	$conn_keg = $db_keg -> connect();
	if ($uid==false) {
		//jumlah aktivitas hari itu
		$sql_perhari = $conn_keg -> query("select tanggal,count(*) as jumlah from aktivitas where tanggal='$tgl_aktivitas'") or die(mysqli_error($conn_keg));
	}
	else {
		//jumlah aktivitas hari itu menurut user_id siapa
		$sql_perhari = $conn_keg -> query("select tanggal,count(*) as jumlah from aktivitas where tanggal='$tgl_aktivitas' and user_id='$user_id'") or die(mysqli_error($conn_keg));
	
	}
	$cek=$sql_perhari->num_rows;
	$data_keg=array("error"=>false);
	if ($cek>0) {
		$data_keg["error"]=false;
		$r=$sql_perhari->fetch_object();
		$data_keg["tanggal"]=$tgl_aktivitas;
		$data_keg["jumlah"]=$r->jumlah;
	}
	else {
		$data_keg["error"]=true;
		$data_keg["pesan_error"]='Data tidak tersedia';
		$data_keg["jumlah"]=0;
		$data_keg["tanggal"]=$tgl_aktivitas;
	}
	return $data_keg;
	$conn_keg->close();	
}
?>