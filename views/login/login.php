<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIPAPO | Login</title>

    <link href="<?php echo $url; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo $url; ?>/css/animate.css" rel="stylesheet">
    <link href="<?php echo $url; ?>/css/style.css" rel="stylesheet">
	<link rel="shortcut icon" href="<?php echo $url; ?>/img/bps.ico">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <?php
            $loginku=false;
            $text_alert='';
            if (isset($_POST['submit'])) {
                $user_id=$_POST['user_id'];
                $user_passwd=$_POST['user_passwd'];
                $r_log=cek_users_login($user_id,$user_passwd);
                if ($r_log["error"]==false) {
                    $loginku=true;
                    $text_alert='<div class="alert alert-success text-center" role="alert">'.$r_log ["pesan_error"].'</div>';
                    $_SESSION['papo_userid']=$r_log["user_id"];
                    $_SESSION['papo_username']=$r_log["user_name"];
                    $_SESSION['papo_passwd_md5']=$r_log["user_passwd_md5"];
                    $_SESSION['papo_passwd_ori']=$user_passwd;
                    $_SESSION['papo_nama']=$r_log["user_nama"];
                    $_SESSION['papo_level']=$r_log["user_level"];
                    $_SESSION['papo_unitkerja']=$r_log["user_unitkerja"]; //unit_kode
                    $_SESSION['papo_unitnama']=$r_log["user_unitnama"]; //nama unit kerja
                    $_SESSION['papo_email']=$r_log["user_email"];
                    $_SESSION['papo_status']=$r_log["user_status"];
                    $_SESSION['papo_jabatan']=$r_log["user_jabatan"];
                    print "<meta http-equiv=\"refresh\" content=\"2; URL=".$url."\">";
                }
                else {
                    $loginku=false;
                    $text_alert='<div class="alert alert-danger text-center" role="alert">'.$r_log["pesan_error"].'</div>';
                }
            }

            if ($loginku==false) {
            ?>

            <h3>Sistem Informasi Pencatatan Aktivitas Pegawai Online (SIPAPO)</h3>
            <p>BPS Provinsi Nusa Tenggara Barat</p>
			<p>Silakan login untuk menggunakan sistem ini</p>
            <form class="m-t" role="form" method="post" action="<?php echo $url; ?>/login/ceklogin">
                <div class="form-group">
                    <input type="text" name="user_id" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="user_passwd" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
            </form>
            <p class="m-t"> <small>Copyright &copy; <?php echo date('Y');?> Bidang IPDS BPS Provinsi NTB</small> </p>
            <?php } ?>
            <div class="row">
                <?php if ($text_alert!="") { echo $text_alert; } ?>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo $url; ?>/js/jquery-2.1.1.js"></script>
    <script src="<?php echo $url; ?>/js/bootstrap.min.js"></script>

</body>

</html>
