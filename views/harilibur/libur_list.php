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
                        <h5>Data Master Hari Libur</h5>
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
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Hari Libur</th>
                        <th class="text-center">Status</th>
                       <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                           <?php
                            $r_hari=list_hari_libur(0,$TahunDefault,false);
                            if ($r_hari["error"]==false) {
                                for ($i=1;$i<=$r_hari["total_hari"];$i++) {
                                    echo '
                                        <tr>
                                            <td>'.$i.'</td>
                                            <td>'.tgl_convert_pendek(1,$r_hari["item"][$i]["tgl_hari"]).'</td>
                                            <td>'.$r_hari["item"][$i]["tgl_ket"].'</td>
                                            <td>'.$r_hari["item"][$i]["tgl_status"].'</td>
                                            <td><a href="'.$url.'/'.$page.'/edit/'.$r_hari["item"][$i]["tgl_id"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/delete/'.$r_hari["item"][$i]["tgl_id"].'" data-confirm="Apakah data ('.$r_hari["item"][$i]["tgl_hari"].') '.$r_hari["item"][$i]["tgl_ket"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                                        </tr>
                                    
                                    ';
                                }
                            }
                            else {
                                //hari libur tidak ada
                                echo '<tr><td colspan="5">'.$r_hari["pesan_error"].'</td></tr>';
                            }
                           ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Hari Libur</th>
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
