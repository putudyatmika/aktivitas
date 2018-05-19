<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Aktivitas Harian Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
        <strong>Save Data</strong>
    </li>

	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRightBig">
    <div class="row">
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Save data Aktivitas Hari Ini</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                        if ($_POST['submit_redaksi']) {
                            //variabel statis
                            $aktif_tanggal =$_POST['aktif_tanggal'];
                            $aktif_id = $_POST['aktif_id'];
                            $m_id = $_POST['m_id'];
                            //input nama kegiatan baru
                            $aktif_nama_kegiatan = trim($_POST['aktif_nama_kegiatan']); 
                            $aktif_target =$_POST['aktif_target'];
                            $aktif_satuan =$_POST['aktif_satuan'];
                            $aktif_mulai =$_POST['aktif_mulai'];
                            $aktif_selesai =$_POST['aktif_selesai'];
                            $m_redaksi = $_POST['m_redaksi'];
                            $user_id=$_SESSION['papo_userid'];
                            $aktif_unitkerja=$_SESSION['papo_unitkerja'];
                            //tampilan isianya variabel
                            /*
                            echo '
                                Nama Kegiatan : '.$aktif_nama_kegiatan.'<br />
                                Redaksi : '.$redaksi.'<br />
                                Target : '.$aktif_target.'<br />
                                Satuan : '.$aktif_satuan.'<br />
                                Tanggal : '.$aktif_tanggal.'<br />
                                Jam Mulai : '.$aktif_mulai.'<br />
                                Jam Selesai : '.$aktif_selesai.'<br />
                                user_id : '.$user_id.'<br />
                                unit_kode : '.$aktif_unitkerja.'<br />
                                m_id : '.$m_id.'<br />
                                aktif_id : '.$aktif_id.'<br />
                            ';
                            */
                            
                            $r_update=update_aktivitas_harian($aktif_id,$aktif_nama_kegiatan,$user_id,$aktif_tanggal,$aktif_mulai,$aktif_selesai,$aktif_target,$aktif_satuan,$aktif_unitkerja);
                            if ($r_update["error"]==false) {
                                echo '<div class="alert alert-success">
                                        '.$r_update["pesan_error"].'
                                    </div>';
                            }
                            else {
                                 echo '<div class="alert alert-danger">
                                        '.$r_update["pesan_error"].'
                                    </div>';
                            } 
                           
                        }
                        else {
                            echo 'Error';
                        }
                        ?>
                        <a href="<?php echo $url; ?>/add/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
        </div>
       
    </div>
</div>