<?php
if (isset($_POST['sdate'])) { $sdate=$_POST['sdate']; }
else { $sdate=date("Y-m-d"); }

if (isset($_POST['edate'])) { $edate=$_POST['edate']; }
else { $edate=''; }
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Absen</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
    <li>
		<a href="<?php echo $url; ?>/absen/">Log Absen</a>
	</li>
	<li class="active">
		<strong>Tarik Absen</strong>
	</li>
	</ol>
	</div>
	<div class="col-lg-2">
         <div class="title-action">
              
        </div>
	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tarik Log Absen</h5>
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
                            <input type="text" name="sdate"  class="form-control" value="<?php echo $sdate;?>" placeholder="Tanggal awal" autocomplete="off" />
                            </div>
                            s / d
                            <div class="form-group" id="tanggal_data">
                            <input type="text" name="edate" class="form-control"value="<?php echo $edate;?>"  placeholder="Tanggal akhir" autocomplete="off" />
                          </div>
                          <div class="form-group">
                          <button type="submit" name="submit_data" class="btn btn-danger btn-sm">Tarik Log Absen</button>
                          </div>
                        </form>
                        <?php 
                        if (isset($_POST['submit_data'])) { 
                        ?>
                        <div class="table-responsive">
                    <table class="table table-striped table-hover dataPegawaiPNS" >
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Panggilan</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                         <?php
                        if ($edate=='') { $edate=$sdate; }
                        $number="";
                        for($i=1;$i<=150;$i++){
                        $number.=($i.",");
                        }
                        $number=substr($number,0,strlen($number)-1);
                        $url_absen = "http://".$ip_server_absen."/form/Download?uid=".$number."&sdate=".$sdate."&edate=".$edate;
                    
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL,$url_absen);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    
                        $server_output = curl_exec ($ch);
                    
                        curl_close ($ch);
                    
                        $data = array();
                        $record = explode("\n",$server_output);
                        $banyak_data=count($record);
                        $j=1;
                        //cek record
                        $absen_id='';
                        $kode='';
                        $tgl='';
                        foreach($record as $r) {
	  
	 
                            $r = str_replace("\t","|",$r);
                            
                            $isi = explode("|",$r);
                            array_push($data, $isi);
                            if ($isi[0]!="")  {
                                 
                            $tgl = explode(" ", $isi[2]);
                            $absen_id=$isi[0];
                            $tgl_absen=$tgl[0];
                            $jam_absen=$tgl[1];
                            $kode=$isi[4];
                            $peg_nama=$isi[1];
                            $kode_absen=intval($kode);
                             
                            if (cek_log_absen($absen_id,$tgl_absen,$jam_absen,$kode_absen)==true) {
                                $status_sync='<span class="label label-danger">Tidak tersimpan</span>';
                            }
                            else {
                                if (input_log($absen_id,$peg_nama,$tgl_absen,$jam_absen,$kode)==true) {
                                    $status_sync='<span class="label label-success">Tersimpan</span>';
                                }
                                else {
                                    $status_sync='<span class="label label-danger">Error</span>';
                                }
                            }
                            
                            if ($kode_absen==0) { $status_kode='<span class="label label-primary">'.$KodeMesinAbsen[$kode_absen].'</span>'; }
                            elseif ($kode_absen==1) { $status_kode='<span class="label label-danger">'.$KodeMesinAbsen[$kode_absen].'</span>'; }
                            elseif ($kode_absen==2) { $status_kode='<span class="label label-warning">'.$KodeMesinAbsen[$kode_absen].'</span>'; }
                            elseif ($kode_absen==3) { $status_kode='<span class="label label-info">'.$KodeMesinAbsen[$kode_absen].'</span>'; }
                            elseif ($kode_absen==4) { $status_kode='<span class="label label-success">'.$KodeMesinAbsen[$kode_absen].'</span>'; }
                            elseif ($kode_absen==5) { $status_kode='<span class="label label-default">'.$KodeMesinAbsen[$kode_absen].'</span>'; }
                            echo '<tr>
                              <td>'.$j.'</td>
                              <td>'.$absen_id.'</td>
                              <td>'.$peg_nama.'</td>
                              <td></td>
                              <td>'.$tgl[0].'</td>
                              <td>'.$tgl[1].'</td>
                              <td>'.$status_kode.'</td>
                              <td>'.$status_sync.'</td>
                            </tr>';
                            $j++;
                            
                            }
                          }
                         ?>
                    </tbody>
                    <tfoot>
                    <tr>
                    <th class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Panggilan</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Kode</th>
                        <th class="text-center">Status</th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>
                        <?php }
                        ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
