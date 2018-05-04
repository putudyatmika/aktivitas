<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Aktivitas Harian Pegawai</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
        <a href="<?php echo $url; ?>/harian/">Aktivitas</a>
    </li>
    <li class="active">
        <strong>Edit Data</strong>
    </li>

	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInUpBig">
    <div class="row">
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit Aktivitas Hari Ini</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <?php
                        $aktif_id=$act;
                        $r_keg=list_aktivitas_harian($aktif_id,0,true,0);
                        if ($r_keg["error"]==false) {
                        ?>
                        <form id="formAddAktifitas" name="formAddAktifitas" action="<?php echo $url;?>/update/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        <div class="form-group">
                            <label for="aktif_tanggal" class="col-sm-2 control-label">Tanggal</label>

                                <div class="col-lg-4 col-sm-4" id="tanggal_data">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    <input type="text" name="aktif_tanggal" class="form-control" value="<?php echo $r_keg["item"][1]["tanggal"]; ?>" placeholder="Tanggal Aktif" disabled />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_mulai" class="col-sm-2 control-label">Jam Mulai</label>

                                <div class="col-lg-4 col-sm-4" id="jam_mulai" data-placement="top" data-align="bottom" data-autoclose="true">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                    <input type="text" name="aktif_mulai" class="form-control" placeholder="Jam Mulai" value="<?php echo date("H:i",strtotime($r_keg["item"][1]["jam_start"])); ?>" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_selesai" class="col-sm-2 control-label">Jam Selesai</label>

                                <div class="col-lg-4 col-sm-4" id="jam_selesai" data-placement="top" data-align="bottom" data-autoclose="true">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i></span>
                                    <input type="text" name="aktif_selesai" class="form-control" placeholder="Jam Selesai" value="<?php echo date("H:i",strtotime($r_keg["item"][1]["jam_end"])); ?>" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_nama_kegiatan" class="col-sm-2 control-label">Judul Kegiatan</label>
                                <div class="col-lg-10 col-sm-10">                               
                                   <div class="input-group margin-bottom-sm">
                                         <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                        <input type="text" name="aktif_nama_kegiatan" class="form-control" value="<?php echo $r_keg["item"][1]["redaksi"]; ?>" placeholder="Input baru kegiatan / Menambahkan redaksi kegiatan" />
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_target" class="col-sm-2 control-label">Target</label>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="aktif_target" class="form-control" placeholder="Target" value="<?php echo $r_keg["item"][1]["target"]; ?>" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="aktif_satuan" class="col-sm-2 control-label">Satuan</label>

                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="aktif_satuan" class="form-control" placeholder="Satuan" value="<?php echo $r_keg["item"][1]["satuan"]; ?>" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                              <button type="submit" id="submit_redaksi" name="submit_redaksi" value="save" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                        <input type="hidden" name="aktif_id" value="<?php echo $aktif_id;?>" />
                        <input type="hidden" name="m_id" value="<?php echo $r_keg["item"][1]["m_id"];?>" />
                        <input type="hidden" name="aktif_tanggal" value="<?php echo $r_keg["item"][1]["tanggal"]; ?>" />
                </fieldset>
                </form>
                <?php }
                else {
                    echo 'Data aktivitas tidak tersedia';
                }

                ?>
                    </div>
                </div>
        </div>
        <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Daftar Aktivitas Hari</h5>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                        <h2><?php echo tgl_convert(1,$r_keg["item"][1]["tanggal"]); ?></h2>
                    <?php
                    $tgl_aktif=$r_keg["item"][1]["tanggal"];
                    $user_id=$_SESSION["papo_userid"];
                    $r_list=list_aktivitas_harian(0,$tgl_aktif,false,$user_id);
                    ?>
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th class="text-center" width="15%">Waktu</th>
                        <th>Kegiatan</th>
                        <th width="15%">Target</th>
                        <th width="7%">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($r_list["error"]==false) {
                        $max_data=$r_list["aktif_total"];
                        for ($i=1;$i<=$max_data;$i++) {
                            echo '
                                <tr>
                                    <td>'.date("H:i",strtotime($r_list["item"][$i]["jam_start"])).' - '.date("H:i",strtotime($r_list["item"][$i]["jam_end"])).'</td>
                                    <td>'.$r_list["item"][$i]["redaksi"].'</td>
                                    <td>'.$r_list["item"][$i]["target"].' '.$r_list["item"][$i]["satuan"].'</td>
                                    <td><a href="'.$url.'/edit/'.$r_list["item"][$i]["id"].'"><i class="fa fa-pencil-square text-info" aria-hidden="true"></i></a> <a href="'.$url.'/delete/'.$r_list["item"][$i]["id"].'" data-confirm="Apakah data ('.$r_list["item"][$i]["id"].') '.$r_list["item"][$i]["redaksi"].' ini akan di hapus?"><i class="fa fa-trash-o text-danger" aria-hidden="true"></i></a></td>
                                </tr>
                            ';
                        }
                    }
                    else {
                        echo '<tr>
                        <td colspan="4">Data tidak tersedia</td>
                        </tr>';
                    }
                    ?>     
                    </tbody>
                    </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>