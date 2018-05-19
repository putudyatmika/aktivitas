<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Aktivitas</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
		<strong>Master Aktivitas</strong>
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
                        <h5>Ubah flag data Master Aktivitas</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                     <?php
                       $flag_kode=$lvl3;
                       $m_id=$lvl4;
                       //echo 'kode_flag : '. $lvl3.' <br /> aktif_id : '.$m_id;
                       $r_flag=flag_m_kamus($flag_kode,$m_id);
                       if ($r_flag["error"]==false) {
                        echo '<div class="alert alert-success">
                                '.$r_flag["pesan_error"].'
                            </div>';
                    }
                    else {
                         echo '<div class="alert alert-danger">
                                '.$r_flag["pesan_error"].'
                            </div>';
                    }
                     ?>
                        
                    <div class="tombol-back">
                    <a href="<?php echo $url.'/'.$page; ?>/" class="btn btn-primary"><i class="fa fa-chevron-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                    </div>
                </div>
        </div>
        
    </div>
</div>
