<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Absen</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li class="active">
		<strong>Log Absen</strong>
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
                        <h5>Data Master Log Absen</h5>
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
                    <form class="form-inline" method="post">
                          <div class="form-group" id="tanggal_data">
                            <label for="sdate">Data tanggal </label>
                            <input type="text" name="sdate"  class="form-control" placeholder="Tanggal awal" autocomplete="off" />
                                s / d
                            <input type="text" name="edate" class="form-control" placeholder="Tanggal akhir" autocomplete="off" />
                          </div>
                          <button type="submit" name="submit_data" class="btn btn-primary">View Data</button>
                        </form>
                        <div class="table-responsive">
                    <table class="table table-striped table-hover dataPegawaiPNS" >
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Sync</th>
                        <th class="text-center">Flag</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                         <?php
                         $r_absen=list_log_absen(0,0,false,false);
                         if ($r_absen["error"]==false) {
                            $total_absen=$r_absen["total_absen"];
                            for ($i=1;$i<=$total_absen;$i++) {
                                echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$r_absen["item"][$i]["absen_id"].'</td>
                                    <td>'.$r_absen["item"][$i]["nama"].'</td>
                                    <td>'.$r_absen["item"][$i]["tanggal"].'</td>
                                    <td>'.$r_absen["item"][$i]["jam"].'</td>
                                    <td>'.$r_absen["item"][$i]["kode"].'</td>
                                    <td>'.$r_absen["item"][$i]["waktu_sync"].'</td>
                                    <td>'.$r_absen["item"][$i]["flag"].'</td>
                                    <td></td>
                                </tr>   
                                ';
                            }
                         }
                         else {
                             echo '<tr><td colspan="9">'.$r_absen["pesan_error"].'</td></tr>';
                         }
                         ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Sync</th>
                        <th class="text-center">Flag</th>
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
