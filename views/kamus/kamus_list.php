<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Aktivitas</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
		<strong>Aktivitas</strong>
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
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Master Aktivitas</h5>
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

                        <div class="table-responsive">
                    <table class="table table-striped table-hover dataPegawaiPNS" >
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Unit Kerja</th>
                        <th class="text-center">Nama Pegawai</th>
                        <th class="text-center">Tanggal Add</th>
                        <th class="text-center">Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                       
                        $r_aktif=list_m_kamus(0,false,false);

                        if ($r_aktif["error"]==false) {
                            $i=1;
                            $max_aktif=$r_aktif["m_total"];
                            for ($i=1;$i<=$max_aktif;$i++) {
                                //link user id login monitoring
                                echo '
                                <tr>
                                <td>'.$i.'</td>
                                <td>'.$r_aktif["item"][$i]["m_redaksi"].'</td>
                                <td>'.$r_aktif["item"][$i]["m_unitnama"].'</td>
                                <td>'.$r_aktif["item"][$i]["m_namauser"].'</td>                               
                                <td>'.$r_aktif["item"][$i]["m_tgl_add"].'</td>  
                                <td>'.$status_umum[$r_aktif["item"][$i]["m_flag"]].'</td>
                                <td><a href="'.$url.'/'.$page.'/'.$act.'/delete/'.$r_aktif["item"][$i]["m_id"].'" data-confirm="Apakah data ('.$r_aktif["item"][$i]["m_id"].') '.$r_aktif["item"][$i]["m_redaksi"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>

                                </tr>';

                            }
                        }
                        else {
                            echo '<tr>
                            <td colspan="8">Data masing kosong</td>
                            </tr>';
                        }
                        ?>           
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Judul</th>
                        <th class="text-center">Peg ID</th>
                        <th class="text-center">Unit Kerja</th>
                        <th class="text-center">Status</th>
                        <th>&nbsp;</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
        </div>
        
    </div>
</div>
