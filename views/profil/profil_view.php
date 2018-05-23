<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Users</h2>
	<ol class="breadcrumb">
	<li>
		<a href="index.php">Depan</a>
	</li>
	<li class="active">
        <strong>Profile Saya</strong>
    </li>
	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Profile Saya</h5>
                        
                    </div>
                    <div class="ibox-content">
                    <?php
                        $user_id=$_SESSION["papo_userid"];
                        $r_user=list_users($user_id,true);
                        if ($r_user["error"]==false) { 
                            
                            
                            $nama_user_buat=get_nama_user($r_user["item"][1]["add_oleh"]);
                            $nama_user_update=get_nama_user($r_user["item"][1]["update_oleh"]);
                           /*
                            $dibuat_tgl=tgl_convert_waktu(1,$r_user["item"][1]["user_dibuat_waktu"]);
                            $diupdate_tgl=tgl_convert_waktu(1,$r_user["item"][1]["user_diupdate_waktu"]);
                            */
                            if ($r_user["item"][1]["tgl_lastlogin"]=='0000-00-00 00:00:00' or $r_user["item"][1]["tgl_lastlogin"]=='') {
                                $lastlog_user='<span class="label label-danger">Belum pernah login</span>';
                            }
                            else {
                                $lastlog_user=tgl_convert_waktu_pendek(1,$r_user["item"][1]["tgl_lastlogin"]);
                            } 

                            if ($r_user["item"][1]["tgl_update"]=='0000-00-00 00:00:00' or $r_user["item"][1]["tgl_update"]=='') {
                                $tgl_update='<span class="label label-danger">Belum pernah diupdate</span>';
                            }
                            else {
                                $tgl_update=tgl_convert_waktu_pendek(1,$r_user["item"][1]["tgl_update"]);
                            } 
                            ?>
                            <div class="row">
                            <div class="col-md-6">
                                   <h2 class="no-margins">
                                   <?php echo $r_user["item"][1]["nama"];?>
                                </h2>
                                <h4><?php echo $JenisJabatan[$r_user["item"][1]["peg_jabatan"]].' '.$r_user["item"][1]["unit_nama"]; ?></h4>
                               
                            </div>
                            </div>
                            <div class="alert alert-info" role="alert">
                                    <dl class="dl-horizontal">
                                        <dt>Username</dt>
                                        <dd><?php echo $r_user["item"][1]["username"];?></dd>
                                        <dt>Nama</dt>
                                        <dd><?php echo $r_user["item"][1]["nama"];?></dd>
                                        <dt>Password</dt>
                                        <dd><?php echo $r_user["item"][1]["passwd"];?></dd>
                                        <dt>No HP</dt>
                                        <dd><?php echo $r_user["item"][1]["nohp"];?></dd>
                                        <dt>Email</dt>
                                        <dd><?php echo $r_user["item"][1]["email"];?></dd>
                                        <dt>Jabatan</dt>
                                        <dd><?php echo $JenisJabatan[$r_user["item"][1]["peg_jabatan"]] .' '.$r_user["item"][1]["unit_nama"];?></dd>
                                        <dt>Last Login</dt>
                                        <dd><?php echo $lastlog_user;?></dd>
                                        <dt>Last IP</dt>
                                        <dd><?php echo $r_user["item"][1]["ip_lastlogin"];?></dd>
                                        <dt>Level</dt>
                                        <dd><?php echo $lvl_user[$r_user["item"][1]["level"]];?></dd>
                                        <dt>Status</dt>
                                        <dd><?php echo $status_umum_warna[$r_user["item"][1]["aktif"]];?></dd>
                                        
                                    </dl>
                                    <div class="row">
                                    <div class="container">
                                    <?php
                                    echo '
                                    <a href="'.$url.'/'.$page.'/edit/" class="btn btn-success"><i class="fa fa-pencil fa-lg"></i></a>';
                                    ?>
                                    </div>
                                    </div>
                            </div>

                        <?php
                        }
                        else {
                            echo 'Data pegawai tidak ditemukan';
                        }
                        ?>
                    </div>
                </div>
            </div>
                
    </div>
</div>
