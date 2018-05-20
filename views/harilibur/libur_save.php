<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Hari Libur</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
		<strong>Hari Libur</strong>
	</li>
	</ol>
	</div>
	<div class="col-lg-2">
         <div class="title-action">
              <a href="<?php echo $url.'/'.$page; ?>/add/" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        </div>
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Save Data Hari Libur</h5>
                        <div class="ibox-tools">
                           
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                        if ($_POST['submit_hari']) {
                            $tgl_libur = $_POST['tgl_libur'];
                            $tgl_ket = $_POST['tgl_ket'];
                            $tgl_status = $_POST['tgl_status'];
                           
                            
                            $r_cek=list_hari_libur($tgl_libur,0,true);
                            if ($r_cek["error"]==true) {
                                //hari libur blom ada
                                $r_save=save_hari_libur($tgl_libur,$tgl_ket,$tgl_status);
                                echo $r_save["pesan_error"];
                            }
                            else {
                                //hari libur sudah ada
                                echo 'Data hari libur tanggal <strong>'.$tgl_libur.' ('.$r_cek["item"][1]["tgl_ket"].')</strong> sudah tersedia';
                            }
                           
                        }
                        else {
                            echo 'ERORR';
                        }

                        ?>
                         <p><a href="<?php echo $url.'/'.$page; ?>/add/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>
