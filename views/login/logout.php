<div class="wrapper wrapper-content">
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">Anda sudah logout dari sistem</h3>
       	<?php
	unset($_SESSION['papo_userid']);
	unset($_SESSION['papo_username']);
	unset($_SESSION['papo_passwd_md5']);
	unset($_SESSION['papo_passwd_ori']);
	unset($_SESSION['papo_nama']);
	unset($_SESSION['papo_level']);
	unset($_SESSION['papo_unitkerja']);
	unset($_SESSION['papo_unitnama']);
	unset($_SESSION['papo_eselon']);
	unset($_SESSION['papo_email']);
	unset($_SESSION['papo_status']);
	unset($_SESSION['papo_jabatan']);
	print "<meta http-equiv=\"refresh\" content=\"2; URL=".$url."\">";
?>
    </div>
</div>