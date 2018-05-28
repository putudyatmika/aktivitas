<?php
/*
Sistem Informasi Pencatatan Aktivitas Pegawai Online (SIPAPO)
Created by I Putu Dyatmika
Versi Beta
*/
session_start();
require('setting-db.php');
require('models/models.php');

$tanggal_hari_ini=date("Y-m-d");
//require('page/settings/settings.php'); //setting web
//untuk mengetahui ip address pengakses
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
else $ip=$_SERVER['REMOTE_ADDR'];
/*
// /uploadbasen/input/
// /page/act/lvl3/lvl4/lvl5
// /guest/add/
// /guest/list/1
// /fo/resv/new/
if (!isset($_GET['act'])) $act="";
else $act=$_GET['act'];
if (!isset($_GET['page'])) $page="";
else $page=$_GET['page'];
*/
//$url=$bps_url->getSetting();
$url_asli = explode("/",$_SERVER["REQUEST_URI"]);
$url_db=explode("/",$url);
if ($url_db[2] != $_SERVER['HTTP_HOST']) {
  print "<meta http-equiv=\"refresh\" content=\"0; URL=".$url."\">";
}
require('models/url/fungsi_url_lokal.php');
//require('models/url/fungsi_url_net.php');

if ($page=="json") {
	require_once 'page/json/m_json.php';
	exit();
}

if ($page=="uploadabsen") {
	require_once 'page/uploadabsen/m_index.php';
	exit();
}

if (!isset($_SESSION['papo_username']) or empty($_SESSION['papo_username']))
     {
		require ('views/login/login.php');
		exit();
	 }

//require('page/pengunjung/pengunjung-code.php');
//require ('header.php');
require ('main.php');
//require ('footer.php');
//untuk melihat url nya

if (isset($_SESSION['papo_username']) and $_SESSION['papo_username']=='mika') {
echo '
	Segmen1 : '. $segmen1.' <br />
	Segmen2 : '. $segmen2.' <br />
	page : '.$page.' <br />
	act : '.$act.' <br />
	lvl3 : '.$lvl3.' <br />
	lvl4 : '.$lvl4.' <br />
	lvl5 : '.$lvl5.' <br />
	<br />
	';

echo 'papo_username : '. $_SESSION['papo_username'] .'<br />'.
'papo_userid : '.$_SESSION['papo_userid'] .'<br />'.
'papo_passwd_md5 : '.$_SESSION['papo_passwd_md5'] .'<br />'.
'papo_passwd_ori : '.$_SESSION['papo_passwd_ori'] .'<br />'.
'papo_nama : '.$_SESSION['papo_nama'].'<br />',
'papo_level : '.$_SESSION['papo_level'].'<br />',
'papo_unitkerja : '.$_SESSION['papo_unitkerja'].'<br />',
'papo_unitnama : '.$_SESSION['papo_unitnama'].'<br />',
'papo_eselon : '.$_SESSION['papo_eselon'].'<br />',
'papo_email : '.$_SESSION['papo_email'].'<br />',
'papo_status : '.$_SESSION['papo_status'].'<br />',
'papo_jabatan : '.$_SESSION['papo_jabatan'].'<br />';
echo '<br />';
echo 'URL asli : '.$_SERVER["REQUEST_URI"];
echo '<br />Url DB : '.$url_db[2].'<br />URL server : '.$_SERVER['HTTP_HOST'];
}

//$passwd_mika=gen_passwd('mika');
//echo 'mika jadi md5 (mika) : ' . $passwd_mika;

?>
