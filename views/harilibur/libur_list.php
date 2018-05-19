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
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Data Master Hari Libur</h5>
                        <div class="ibox-tools">
                            <!--<a href="<?php echo $url.'/'.$page; ?>/add/" class="add-form btn btn-primary btn-xs">
                                 <i class="fa fa-plus"></i>
                            </a>-->
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
                        <th class="text-center">Tgl Add</th>
                        <th class="text-center">Add Oleh</th>
                        <th class="text-center">Tgl Update</th>
                        <th class="text-center">Update Oleh</th>
                       <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                           <?php
                            $r_hari=list_hari_libur(0,$TahunDefault,false);
                            if ($r_hari["error"]==false) {
                                for ($i=1;$i<=$r_hari["total_hari"];$i++) {
                                    if ($r_hari["item"][$i]["tgl_add"]=='0000-00-00 00:00:00' or $r_hari["item"][$i]["tgl_add"]=='') {
                                        $tgl_add='<span class="label label-danger">data tidak tersedia</span>';
                                    }
                                    else {
                                        $tgl_add=tgl_convert_waktu_pendek(1,$r_hari["item"][$i]["tgl_add"]);
                                    } 

                                    if ($r_hari["item"][$i]["tgl_update"]=='0000-00-00 00:00:00' or $r_hari["item"][$i]["tgl_update"]=='') {
                                        $tgl_update='<span class="label label-danger">Belum pernah diupdate</span>';
                                    }
                                    else {
                                        $tgl_update=tgl_convert_waktu_pendek(1,$r_hari["item"][$i]["tgl_update"]);
                                    } 

                                    echo '
                                        <tr>
                                            <td>'.$i.'</td>
                                            <td>'.tgl_convert_pendek(1,$r_hari["item"][$i]["tgl_hari"]).'</td>
                                            <td>'.$r_hari["item"][$i]["tgl_ket"].'</td>
                                            <td>'.$status_umum[$r_hari["item"][$i]["tgl_status"]].'</td>
                                            <td>'.$tgl_add.'</td>
                                            <td>'.get_nama_user($r_hari["item"][$i]["tgl_add_oleh"]).'</td>
                                            <td>'.$tgl_update.'</td>
                                            <td>'.get_nama_user($r_hari["item"][$i]["tgl_update_oleh"]).'</td>
                                            <td><div class="tooltip-bps"><a href="'.$url.'/'.$page.'/edit/'.$r_hari["item"][$i]["tgl_id"].'" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Tanggal '.$r_hari["item"][$i]["tgl_hari"].'"><i class="fa fa-pencil-square" aria-hidden="true"></i></a> <a href="'.$url.'/'.$page.'/delete/'.$r_hari["item"][$i]["tgl_id"].'" data-confirm="Apakah data ('.$r_hari["item"][$i]["tgl_hari"].') '.$r_hari["item"][$i]["tgl_ket"].' ini akan di hapus?" class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Hapus Tanggal '.$r_hari["item"][$i]["tgl_hari"].'"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>
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
                        <th class="text-center">Tgl Add</th>
                        <th class="text-center">Add Oleh</th>
                        <th class="text-center">Tgl Update</th>
                        <th class="text-center">Update Oleh</th>
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
