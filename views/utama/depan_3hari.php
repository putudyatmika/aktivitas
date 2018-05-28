<h2><?php echo tgl_convert(1,$tanggal_hari_ini); ?></h2>
                    <?php
                    //$tgl_aktif=$r_keg["item"][1]["tanggal"];
                    $user_id=$_SESSION["papo_userid"];
                    $r_list=list_aktivitas_harian(0,$tanggal_hari_ini,false,$user_id);
                    ?>
                   
                    <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th class="text-center" width="15%">Waktu</th>
                        <th>Kegiatan</th>
                        <th width="15%">Target</th>
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
                       <!--batas tabel responsive-->
                        <?php 
                    //hari sebelumnya (1 hari)
                    $tgl_kmrn=date("Y-m-d",strtotime('-1 day',strtotime($tanggal_hari_ini)));
                    echo '<h3 class="text-success">'.tgl_convert(1,$tgl_kmrn).'</h3>';
                    
                   // $peg_id=$_SESSION["sesi_peg_id"];
                    $r_list=list_aktivitas_harian(0,$tgl_kmrn,false,$user_id);
                    ?>
                    
                    <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th class="text-center" width="15%">Waktu</th>
                        <th class="text-center">Kegiatan</th>
                        <th class="text-center">Target</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (cek_hari_kerja($tgl_kmrn)==true) {
                         echo '<tr>
                                <td colspan="4"><span class="label label-primary">Hari Libur</span></td>
                                </tr>';
                    }
                    else {
                        //cek lagi apakah hari besar apa tidak
                        $r_libur=cek_hari_libur($tgl_kmrn);
                        if ($r_libur["error"]==false) {
                            echo '<tr>
                                <td colspan="4"><span class="label label-success">'.$r_libur["libur_ket"].'</span></td>
                                </tr>';
                        }
                        else {
                            if ($r_list["error"]==false) {
                                $max_data=$r_list["aktif_total"];
                                for ($i=1;$i<=$max_data;$i++) {
                                    echo '
                                        <tr>
                                            <td>'.date("H:i",strtotime($r_list["item"][$i]["jam_start"])).' - '.date("H:i",strtotime($r_list["item"][$i]["jam_end"])).'</td>
                                            <td>'.$r_list["item"][$i]["redaksi"].'</td>
                                            <td>'.$r_list["item"][$i]["target"].' '.$r_list["item"][$i]["satuan"].'</td>
                                        </tr>
                                    ';
                                }
                            }
                            else {
                                echo '<tr>
                                <td colspan="4">Data tidak tersedia</td>
                                </tr>';
                            }
                        }
                    }
                    ?>     
                    </tbody>
                    </table>
                    
                    <!--2 hari yang lalu-->
                        <h3 class="text-danger"><?php 
                    $tgl_lusa=date("Y-m-d",strtotime('-1 day',strtotime($tgl_kmrn)));
                    echo tgl_convert(1,$tgl_lusa); ?></h3>
                    <?php
                    //$tgl_aktif=date("Y-m-d");
                    //$peg_id=$_SESSION["sesi_peg_id"];
                    $r_list=list_aktivitas_harian(0,$tgl_lusa,false,$user_id);
                    ?>
                    
                    <table class="table table-striped table-hover" >
                    <thead>
                    <tr>
                        <th class="text-center" width="15%">Waktu</th>
                        <th class="text-center">Kegiatan</th>
                        <th class="text-center">Target</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (cek_hari_kerja($tgl_lusa)==true) {
                         echo '<tr>
                                <td colspan="4"><span class="label label-primary">Hari Libur</span></td>
                                </tr>';
                    }
                    else {
                        //cek lagi apakah hari besar apa tidak
                        $r_libur=cek_hari_libur($tgl_lusa);
                        if ($r_libur["error"]==false) {
                            echo '<tr>
                                <td colspan="4"><span class="label label-success">'.$r_libur["liburk_ket"].'</span></td>
                                </tr>';
                        }
                        else {
                        if ($r_list["error"]==false) {
                            $max_data=$r_list["aktif_total"];
                            for ($i=1;$i<=$max_data;$i++) {
                                echo '
                                    <tr>
                                        <td>'.date("H:i",strtotime($r_list["item"][$i]["jam_start"])).' - '.date("H:i",strtotime($r_list["item"][$i]["jam_end"])).'</td>
                                        <td>'.$r_list["item"][$i]["redaksi"].'</td>
                                        <td>'.$r_list["item"][$i]["target"].' '.$r_list["item"][$i]["satuan"].'</td>
                                    </tr>
                                ';
                            }
                        }
                        else {
                            echo '<tr>
                            <td colspan="4">Data tidak tersedia</td>
                            </tr>';
                        }
                        }
                    }
                    ?>     
                    </tbody>
                    </table>
                      