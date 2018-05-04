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
        <strong>Tambah data</strong>
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
                        <h5>Tambah data user</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <form id="formAddUser" name="formAddUser" action="<?php echo $url.'/'.$page;?>/save/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">Username</label>
                                <div class="col-lg-4 col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off" />
                                 </div>
                                </div>
                        </div>
                    <div class="form-group">
                      <label for="user_nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_nama" class="form-control" placeholder="Nama lengkap" autocomplete="off" />
                         </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="user_email" class="col-sm-2 control-label">Email</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_email" class="form-control" placeholder="E-mail" autocomplete="off" />
                         </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="user_nohp" class="col-sm-2 control-label">No HP</label>
                        <div class="col-lg-4 col-sm-4">
                          <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                          <input type="text" name="user_nohp" class="form-control" placeholder="No Handphone" autocomplete="off" />
                         </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="user_passwd" class="col-sm-2 control-label">Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="user_passwd" id="user_passwd" class="form-control" placeholder="user password" />
                                 </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="user_passwd2" class="col-sm-2 control-label">Konfirmasi Password</label>
                            <div class="col-lg-5 col-sm-5">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="password" name="user_passwd2" id="user_passwd2" class="form-control" placeholder="konfirmasi password" />
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
                            echo '<option value="'.$r->kode.'">['.$r->kode.'] '.$r->nama.'</option>'."\n";
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
                                            echo '<option value="'.$i.'">'.$JenisJabatan[$i].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    <div class="form-group">
                            <label for="user_level" class="col-sm-2 control-label">Level Akses</label>
                                <div class="col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="user_level" id="user_level">
                                        <option value="">Pilih Level</option>
                                        <?php
                            for ($i=1;$i<=$_SESSION['papo_level'];$i++) {
                                            echo '<option value="'.$i.'">'.$lvl_user[$i].'</option>';
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
                                            echo '<option value="'.$i.'">'.$status_umum[$i].'</option>';
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                              <button type="submit" id="submit_save" name="submit_save" value="save" class="btn btn-primary">SAVE</button>
                            </div>
                        </div>
                </fieldset>
                </form>
                    </div>
                </div>
        </div>
        
    </div>
</div>
