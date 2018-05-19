<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Aktivitas Harian Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
        <strong>Delete data aktivitas</strong>
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
                        <h5>Delete data Aktivitas Harian</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                        $aktif_id=$act;
                        $r_del=delete_aktivitas_harian($aktif_id);
                        if ($r_del["error"]==false) {
                                echo '<div class="alert alert-success">
                                        '.$r_del["pesan_error"].'
                                    </div>';
                            }
                            else {
                                 echo '<div class="alert alert-danger">
                                        '.$r_del["pesan_error"].'
                                    </div>';
                            }
                        ?>
                        <a href="<?php echo $url; ?>/harian/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
        </div>
       
    </div>
</div>