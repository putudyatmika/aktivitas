<?php
$user_id=$lvl3;
$r_user=list_users($user_id,true);
?>
<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Users</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
		<a href="<?php echo $url; ?>/datausers/">Master Users</a>
	</li>
    <li class="active">
        <strong>Edit data</strong>
    </li>
	</ol>
	</div>
	<div class="col-lg-2">

	</div>
</div>
<div class="row wrapper wrapper-content animated fadeInRight">
	 <div class="row">
                <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Edit data user</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                    <?php
                    if ($r_user["error"]==false) {
                    ?>
                        <form id="formEditUser" name="formEditUser" action="<?php echo $url.'/'.$page;?>/update/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $r_user["item"][1]["username"]; ?>" />
                                 </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="absen_id" class="col-sm-2 control-label">Absen ID</label>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="absen_id" class="form-control" placeholder="Masukkan Absen ID" value="<?php echo $r_user["item"][1]["absen_id"]; ?>" />
                                 </div>
                                </div>
                        </div>
                    <div class="form-group">
                      <label for="user_nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_nama" class="form-control" placeholder="Nama" value="<?php echo $r_user["item"][1]["nama"]; ?>" />
                         </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="user_email" class="col-sm-2 control-label">Email</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_email" class="form-control" placeholder="E-mail" value="<?php echo $r_user["item"][1]["email"]; ?>" />
                         </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="user_nohp" class="col-sm-2 control-label">No HP</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_nohp" class="form-control" placeholder="No Handphone" value="<?php echo $r_user["item"][1]["nohp"]; ?>" autocomplete="off" />
                         </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="user_passwd" class="col-sm-2 control-label">Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="user_passwd" class="form-control" placeholder="user password" />
                                 </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="user_passwd2" class="col-sm-2 control-label">Konfirmasi Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="user_passwd2" class="form-control" placeholder="konfirmasi password" />
                                 </div>
                                </div>

                        </div>
                        <div class="form-group">
                            <label for="user_unitkerja" class="col-sm-2 control-label">Unit Kerja</label>
                                <div class="col-sm-9">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                        <select class="form-control" name="user_unitkerja" id="user_unitkerja">
                          <option value="">Pilih</option>
                          <?php
                          $db = new db();
                          $conn = $db -> connect();
                          $sql_unit = $conn->query("select * from unitkerja order by jenis,kode asc");
                          while ($r = $sql_unit ->fetch_object()) {
                            if ($r->kode==$r_user["item"][1]["unit_kode"]) {
                                $pilih_unit='selected="selected"';
                            }
                            else {
                                $pilih_unit='';
                            }
                            echo '<option value="'.$r->kode.'" '.$pilih_unit.'>['.$r->kode.'] '.$r->nama.'</option>'."\n";
                          } 
                          $conn->close();
                          ?>
                          </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="peg_jabatan" class="col-sm-2 control-label">Jabatan</label>
                                <div class="col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="peg_jabatan" id="peg_jabatan">
                                        <option value="">Pilih Jabatan</option>
                                        <?php
                                        for ($i=1;$i<=4;$i++) {
                                            if ($i==$r_user["item"][1]["peg_jabatan"]) {
                                                $pilih_jabatan='selected="selected"';
                                            }
                                            else {
                                                   $pilih_jabatan=''; 
                                            }
                                            echo '<option value="'.$i.'" '.$pilih_jabatan.'>'.$JenisJabatan[$i].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    <div class="form-group">
                            <label for="user_level" class="col-sm-2 control-label">Level akses</label>
                                <div class="col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="user_level" id="user_level">
                                        <option value="">Pilih Level</option>
                                        <?php

                                        for ($i=1;$i<=$_SESSION['papo_level'];$i++) {
                                            if ($i==$r_user["item"][1]["level"]) {
                                                $pilih_level='selected="selected"';
                                            }
                                            else {
                                                   $pilih_level=''; 
                                            }
                                            echo '<option value="'.$i.'" '.$pilih_level.'>'.$lvl_user[$i].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="user_status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="user_status" id="user_status">
                                        <option value="">Pilih Status</option>
                                        <?php
                                        for ($i=0;$i<=1;$i++) {
                                            if ($i==$r_user["item"][1]["aktif"]) {
                                                $pilih_status='selected="selected"';
                                            }
                                            else {
                                                   $pilih_status=''; 
                                            }
                                            echo '<option value="'.$i.'" '.$pilih_status.'>'.$status_umum[$i].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                              <button type="submit" id="submit_update" name="submit_update" value="update" class="btn btn-primary">UPDATE</button>
                            </div>
                        </div>
                </fieldset>
                <input type="hidden" name="user_id" value="<?php echo $user_id;?>" />
                </form>
                <?php } 
                    else {
                        echo $r_user["pesan_error"];
                    } ?>
                    </div>
                </div>
        </div>
        
    </div>
</div>
