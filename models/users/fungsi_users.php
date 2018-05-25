<?php
function get_nama_user($user_id) {
	//(user_id) user_nama
	$db_users = new db();
	$conn_users = $db_users->connect();
	$sql_users = $conn_users -> query("select nama from users where id='".$user_id."'");
	$cek=$sql_users->num_rows;
	if ($cek>0) {
	   $r=$sql_users->fetch_object();
	   $nama_user=$r->nama;
	}
	else {
	 $nama_user='';
	}
	return $nama_user;
	$conn_users->close();
	}

function get_email_users($user_id) {
	//(user_id) user_nama
	$db_users = new db();
	$conn_users = $db_users->connect();
	$sql_users = $conn_users -> query("select * from users where user_id='".$user_id."'");
	$cek=$sql_users->num_rows;
	if ($cek>0) {
	   $email_user='';
	   $r=$sql_users->fetch_object();
	   $email_user=$r->user_email;
	}
	else {
	 $email_user='';
	}
	return $email_user;
	$conn_users->close();
	}

function gen_passwd($passwd_ori) {
	global $pengacak;
	$passwd_md5=md5($pengacak.'('.$passwd_ori.')'.$pengacak);
  return $passwd_md5;
}
function ganti_password($passwd_lama,$passwd_baru) {
	global $ip;
	$db = new db();
	$conn = $db->connect();
	$user_id=$_SESSION['papo_userid'];
	$passwd_lama_md5=gen_passwd($passwd_lama);
	$passwd_baru_md5=gen_passwd($passwd_baru);

	$sql_cek = $conn -> query("select * from users where id='$user_id' and passwd='$passwd_lama_md5'");
	$cek=$sql_cek->num_rows;
	$r_ganti=array("error"=>false);
	if ($cek>0) {
		$waktu_lokal=date("Y-m-d H:i:s");
		$sql_update_passwd=$conn -> query("update users set ip_lastlogin='$ip', tgl_lastlogin='$waktu_lokal', passwd='$passwd_baru_md5' where id='$user_id'") or die(mysqli_error($conn));
		if ($sql_update_passwd) {
			$r_ganti["error"]=false;
			$r_ganti["pesan_error"]="Password berhasil diubah";
			$_SESSION['papo_passwd_md5']=$passwd_baru_md5;
			$_SESSION['papo_passwd_ori']=$passwd_baru;
		}
		else {
			$r_ganti["error"]=true;
			$r_ganti["pesan_error"]="Password tidak berhasil diubah";
		}
		
	}
	else {
		$r_ganti["error"]=true;
		$r_ganti["pesan_error"]="Password lama salah!";
	}
	return $r_ganti;
	$db->close();
}

function cek_users_login($user_id,$user_passwd) {
	global $ip;
	$db = new db();
	$conn = $db->connect();
	$pass_md5=gen_passwd($user_passwd);
	$sql_cek = $conn -> query("select * from users where username='$user_id' and passwd='$pass_md5'");
	$cek=$sql_cek->num_rows;
	$r_login=array("error"=>false);
	if ($cek>0) {
		//berhasil login
		$waktu_lokal=date("Y-m-d H:i:s");
		$r=$sql_cek->fetch_object();
		if ($r->aktif==1) {
			//berhasil login dan aktif
			$sql_update_login=$conn -> query("update users set ip_lastlogin='$ip', tgl_lastlogin='$waktu_lokal' where username='$user_id'");
			$sql_user_detil=$conn-> query("select users.id, username, users.nama, users.passwd, users.email, users.unitkerja, peg_status, peg_jabatan, level, aktif, unitkerja.nama as unitnama, unitkerja.eselon from users inner join unitkerja on users.unitkerja=unitkerja.kode where username='$user_id' and passwd='$pass_md5'") or die(mysqli_error($conn));
			$r=$sql_user_detil->fetch_object();
			$r_login["error"]=false;
			
			$r_login["user_name"]=$user_id;
			$r_login["user_passwd"]=$user_passwd;
			$r_login["user_passwd_md5"]=$pass_md5;
			$r_login["user_id"]=$r->id;
			$r_login["user_nama"]=$r->nama;
			$r_login["user_level"]=$r->level;
			$r_login["user_unitkerja"]=$r->unitkerja;
			$r_login["user_email"]=$r->email;
			$r_login["user_jabatan"]=$r->peg_jabatan;
			$r_login["user_status"]=$r->peg_status;
			$r_login["user_aktif"]=$r->aktif;
			$r_login["user_unitnama"]=$r->unitnama;
			$r_login["user_eselon"]=$r->eselon;
			$r_login["pesan_error"]="Selamat Datang <b>".$r->nama."</b>";
		}
		else {
			//id user belum aktif
			$r_login["error"]=true;
			$r_login["pesan_error"]='User ID <strong>'.$user_id.'</strong> belum aktif.<br /> Hubungi Admin Provinsi';
		}
	}
	else {
		//tidak berhasil login
		$r_login["error"]=true;
		$r_login["pesan_error"]="Username/Password salah!";
	}
	return $r_login;
	$db->close();
}
/*
 $username = $_POST['username'];
                            $user_nama = $_POST['user_nama'];
                            $user_email = $_POST['user_email'];
                            $user_nohp = $_POST['user_nohp'];
                            $user_passwd = $_POST['user_passwd'];
                            $user_passwd2 = $_POST['user_passwd2'];
                            $user_unitkerja = $_POST['user_unitkerja'];
                            $peg_jabatan = $_POST['peg_jabatan'];
                            $user_status = $_POST['user_status'];
                            $user_level = $_POST['user_level'];
                            //$waktu_lokal=date("Y-m-d H:i:s");
							$pass_md5=gen_passwd($user_passwd);
							*/
function save_username($username,$user_nama,$user_nohp,$user_email,$pass_md5,$user_unitkerja,$peg_jabatan,$user_status,$user_level) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['papo_userid'];
	if ($peg_jabatan==3) { $peg_status=2; }
	else { $peg_status=1; }
	$user_nohp = !empty($user_nohp) ? "'$user_nohp'" : "NULL";

	$db_users = new db();
	$conn_users = $db_users -> connect();
	$sql_save_user = $conn_users -> query("insert into users(username,passwd,nama,email,unitkerja,nohp,peg_status,peg_jabatan,tgl_add,add_oleh,level,aktif) values('$username','$pass_md5','$user_nama', '$user_email','$user_unitkerja',$user_nohp,'$peg_status','$peg_jabatan', '$waktu_lokal', '$created','$user_level','$user_status')") or die(mysqli_error($conn_users));
	$r_save=array("error"=>false);
	if ($sql_save_user) {
		//berhasil di simpan
		$r_save["error"]=false;
		$r_save["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : Username <strong>'.$username.'</strong> berhasil di simpan</div>';
	}
	else {
		//gagal disimpan
		$r_save["error"]=true;
		$r_save["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong> : gagal menyimpan data</div>';
	}
	return $r_save;
	$conn_users->close();
}
function cek_user_no($user_no) {
	$db = new db();
	$conn = $db->connect();
	$sql_cek = $conn -> query("select * from users where user_no='$user_no'");
	$cek=$sql_cek->num_rows;
	$r_login=array("error"=>false);
	if ($cek>0) {
		$r_login["error"]=false;
		$r_login["pesan_error"]="User No $user_no ada";
	}
	else {
		//tidak berhasil login
		$r_login["error"]=true;
		$r_login["pesan_error"]="Username tidak tersedia";
	}
	return $r_login;
	$db->close();
}
function update_username($user_id,$absen_id,$username,$user_nama,$user_nohp,$user_email,$pass_md5,$user_unitkerja,$peg_jabatan,$user_status,$user_level) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['papo_userid'];
	if ($peg_jabatan==3) { $peg_status=2; }
	else { $peg_status=1; }
	$user_nohp = !empty($user_nohp) ? "'$user_nohp'" : "NULL";

	$db_users = new db();
	$conn_users = $db_users -> connect();
	$sql_cek_user = $conn_users -> query("select * from users where id='$user_id'") or die(mysqli_error($conn_users));
	$cek = $sql_cek_user -> num_rows;
	$r_update = array("error"=>false);
	if ($cek>0) {
		$r_update["error"]=false;
		//update sql
		if ($pass_md5=='') {
			$sql_save_user = $conn_users -> query("update users set username='$username', absen_id='$absen_id', nama='$user_nama',email='$user_email',unitkerja='$user_unitkerja', nohp=$user_nohp,peg_status='$peg_status',peg_jabatan='$peg_jabatan',update_oleh='$created',tgl_update='$waktu_lokal',level='$user_level',aktif='$user_status' where id='$user_id'") or die(mysqli_error($conn_users));
		}
		else {
			$sql_save_user = $conn_users -> query("update users set username='$username', absen_id='$absen_id', nama='$user_nama',email='$user_email',unitkerja='$user_unitkerja',nohp=$user_nohp,peg_status='$peg_status',peg_jabatan='$peg_jabatan',update_oleh='$created',tgl_update='$waktu_lokal',level='$user_level',aktif='$user_status',passwd='$pass_md5' where id='$user_id'") or die(mysqli_error($conn_users));
		}
		
		if ($sql_save_user) {
			//berhasil di update
			$r_update["error"]=false;
			$r_update["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : berhasil untuk melakukan update</div>';
		}
		else {
			//error di update
			$r_update["error"]=true;
			$r_update["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong : Gagal untuk melakukan update</div>';
		}
	}
	else {
		//error user tidak ada
		$r_update["error"]=true;
		$r_update["pesan_error"]='<div class="alert alert-success"><strong>(ERROR)</strong : User ID:  '.$user_id.' tidak tersedia</div>';
	}
	return $r_update;
	$conn_users->close();
}
function update_profile($user_id,$username,$user_nama,$user_nohp,$user_email) {
	$waktu_lokal=date("Y-m-d H:i:s");
    $created=$_SESSION['papo_userid'];
	
	$user_nohp = !empty($user_nohp) ? "'$user_nohp'" : "NULL";

	$db_users = new db();
	$conn_users = $db_users -> connect();
	$sql_cek_user = $conn_users -> query("select * from users where id='$user_id'") or die(mysqli_error($conn_users));
	$cek = $sql_cek_user -> num_rows;
	$r_update = array("error"=>false);
	if ($cek>0) {
		$r_update["error"]=false;
		//update sql
		$sql_save_user = $conn_users -> query("update users set username='$username', nama='$user_nama', email='$user_email',nohp=$user_nohp,update_oleh='$created',tgl_update='$waktu_lokal' where id='$user_id'") or die(mysqli_error($conn_users));
		
		if ($sql_save_user) {
			//berhasil di update
			$r_update["error"]=false;
			$r_update["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : berhasil untuk melakukan update</div>';
			$_SESSION['papo_username']=$username;
			$_SESSION['papo_nama']=$user_nama;
			$_SESSION['papo_email']=$user_email;
		}
		else {
			//error di update
			$r_update["error"]=true;
			$r_update["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong : Gagal untuk melakukan update</div>';
		}
	}
	else {
		//error user tidak ada
		$r_update["error"]=true;
		$r_update["pesan_error"]='<div class="alert alert-success"><strong>(ERROR)</strong : User ID:  '.$user_id.' tidak tersedia</div>';
	}
	return $r_update;
	$conn_users->close();
}
function hapus_username($user_id) {
	$db_users = new db();
	$conn_users = $db_users -> connect();
	$sql_cek_user = $conn_users -> query("select * from users where id='$user_id'") or die(mysqli_error($conn_users));
	$cek = $sql_cek_user -> num_rows;
	$r_update = array("error"=>false);
	if ($cek>0) {
		$r_update["error"]=false;
		$r=$sql_cek_user->fetch_object();
		//update sql
		$sql_hapus_user = $conn_users -> query("delete from users where id='$user_id'") or die(mysqli_error($conn_users));

		if ($sql_hapus_user) {
			//berhasil di hapus
			$r_update["error"]=false;
			$r_update["pesan_error"]='<div class="alert alert-success"><strong>(SUCCESS)</strong> : Username <strong>('.$r->username.') '.$r->nama.'</strong> berhasil dihapus</div>';
		}
		else {
			//error di hapus
			$r_update["error"]=true;
			$r_update["pesan_error"]='<div class="alert alert-danger"><strong>(ERROR)</strong : Username <strong>('.$r->username.') '.$r->nama.'</strong>  Gagal untuk dihapus</div>';
		}
	}
	else {
		//error user tidak ada
		$r_update["error"]=true;
		$r_update["pesan_error"]='<div class="alert alert-success"><strong>(ERROR)</strong : User No <strong>'.$user_id.'</strong> tidak tersedia</div>';
	}
	return $r_update;
	$conn_users->close();
}
function cek_username($username) {
	$db = new db();
	$conn = $db->connect();
	$sql_cek = $conn -> query("select * from users where username='$username'");
	$cek=$sql_cek->num_rows;
	$r_login=array("error"=>false);
	if ($cek>0) {
		$r_login["error"]=true;
		$r_login["pesan_error"]="Username $username tidak tersedia";
	}
	else {
		//tidak berhasil login
		$r_login["error"]=false;
		$r_login["pesan_error"]="Username tersedia";
	}
	return $r_login;
	$db->close();
}
function list_users($user_id,$detil=false) {
	$db_users = new db();
	$conn_users = $db_users -> connect();
	if ($detil==true) {
		$sql_users = $conn_users -> query("select users.*, unitkerja.nama as unitnama from users inner join unitkerja on users.unitkerja=unitkerja.kode where users.id='$user_id'") or die(mysqli_error($conn_users));
	}
	else {
		$sql_users = $conn_users -> query("select users.*, unitkerja.nama as unitnama from users inner join unitkerja on users.unitkerja=unitkerja.kode order by tgl_lastlogin") or die(mysqli_error($conn_users)) ;
	}
	$cek_users = $sql_users->num_rows;
	$users_list=array("error"=>false);
	if ($cek_users>0) {
		$users_list["error"]=false;
		$users_list["user_total"]=$cek_users;
		$i=1;
		while ($r=$sql_users->fetch_object()) {
			$users_list["item"][$i]=array(
				"id"=>$r->id,
				"absen_id"=>$r->absen_id,
				"username"=>$r->username,
				"passwd"=>$r->passwd,
				"nama"=>$r->nama,
				"email"=>$r->email,
				"unit_kode"=>$r->unitkerja,
				"unit_nama"=>$r->unitnama,
				"nohp"=>$r->nohp,
				"peg_status"=>$r->peg_status,
				"peg_jabatan"=>$r->peg_jabatan,
				"tgl_add"=>$r->tgl_add,
				"add_oleh"=>$r->add_oleh,
				"tgl_update"=>$r->tgl_update,
				"update_oleh"=>$r->update_oleh,
				"ip_lastlogin"=>$r->ip_lastlogin,
				"tgl_lastlogin"=>$r->tgl_lastlogin,
				"level"=>$r->level,
				"aktif"=>$r->aktif
			);
			$i++;
		}
	}
	else {
		$users_list["error"]=true;
		$users_list["pesan_error"]="Data user tidak tersedia";
	}
	return $users_list;
	$conn_users->close();
}
function list_users_bawahan($unit_kode,$eselonIV=false) {
	$db_users = new db();
	$conn_users = $db_users -> connect();
	if ($eselonIV==true) {
		//kepala seksi
		$sql_users = $conn_users -> query("select * from users inner join (select kode as unit_kode, nama as unit_nama, parent as unit_parent, eselon as unit_eselon  from unitkerja where unitkerja.kode='$unit_kode') as u on users.unitkerja=u.unit_kode where users.peg_jabatan=2 and users.peg_status=1 order by users.id asc") or die(mysqli_error($conn_users));
	}
	else {
		//kabid / kepala bps provinsi
		$sql_users = $conn_users -> query("select * from users inner join (select kode as unit_kode, nama as unit_nama, parent as unit_parent, eselon as unit_eselon from unitkerja where unitkerja.parent='$unit_kode') as u on users.unitkerja=u.unit_kode where users.peg_status=1 order by users.unitkerja, users.peg_jabatan asc") or die(mysqli_error($conn_users)) ;
	}
	$cek_users = $sql_users->num_rows;
	$users_list=array("error"=>false);
	if ($cek_users>0) {
		$users_list["error"]=false;
		$users_list["user_total"]=$cek_users;
		$i=1;
		while ($r=$sql_users->fetch_object()) {
			$users_list["item"][$i]=array(
				"id"=>$r->id,
				"username"=>$r->username,
				"passwd"=>$r->passwd,
				"nama"=>$r->nama,
				"email"=>$r->email,
				"unit_kode"=>$r->unit_kode,
				"unit_nama"=>$r->unit_nama,
				"unit_parent"=>$r->unit_parent,
				"unit_eselon"=>$r->unit_eselon,
				"nohp"=>$r->nohp,
				"peg_status"=>$r->peg_status,
				"peg_jabatan"=>$r->peg_jabatan,
				"tgl_add"=>$r->tgl_add,
				"add_oleh"=>$r->add_oleh,
				"tgl_update"=>$r->tgl_update,
				"update_oleh"=>$r->update_oleh,
				"ip_lastlogin"=>$r->ip_lastlogin,
				"tgl_lastlogin"=>$r->tgl_lastlogin,
				"level"=>$r->level,
				"aktif"=>$r->aktif
			);
			$i++;
		}
	}
	else {
		$users_list["error"]=true;
		$users_list["pesan_error"]="Data user tidak tersedia";
	}
	return $users_list;
	$conn_users->close();
}
?>
