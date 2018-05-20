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
                        <h5>Hapus Data Hari Libur</h5>
                        <div class="ibox-tools">
                           
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                        $tgl_id=$lvl3;
                        //cek tgl_id ini ada tidak
                        $r_data=edit_hari_libur($tgl_id); 
                        if ($r_data["error"]==false) {
                            //hapus data hari libur
                            $r_hapus=hapus_hari_libur($tgl_id);
                            echo '<div class="alert alert-success">Data hari libur <strong>'.tgl_convert_pendek(1,$r_data["item"]["tgl_hari"]).' ('.$r_data["item"]["tgl_ket"].')</strong> berhasil dihapus</div>';
                            //echo $r_hapus["pesan_error"];
                        }
                        else {
                            echo $r_data["pesan_error"];
                        }
                        ?>
                         <p><a href="<?php echo $url.'/'.$page; ?>" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a></p>
                    </div>
                </div>
        </div>
    </div>
</div>
