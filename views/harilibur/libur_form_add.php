<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Master Hari Libur</h2>
	<ol class="breadcrumb">
	<li>
		<a href="<?php echo $url; ?>">Depan</a>
	</li>
	<li>
         <a href="<?php echo $url.'/'.$page; ?>">Hari Libur</a>
	</li>
    <li class="active">
		<strong>Add Data</strong>
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
                        <h5>Tambah Data Hari Libur</h5>
                        <div class="ibox-tools">
                           
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                           
                        </div>
                    </div>
                    <div class="ibox-content">
                    <form id="formAddHariLibur" name="formAddHariLibur" action="<?php echo $url.'/'.$page;?>/save/"  method="post" class="form-horizontal" role="form">
                        <fieldset>
                        <div class="form-group">
                            <label for="tgl_libur" class="col-sm-2 control-label">Tanggal</label>

                                <div class="col-lg-4 col-sm-4" id="tanggal_data">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                    <input type="text" name="tgl_libur" class="form-control" placeholder="Tanggal hari libur" required="" autocomplete="off" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_ket" class="col-sm-2 control-label">Keterangan</label>

                                <div class="col-lg-10 col-sm-10">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <input type="text" name="tgl_ket" class="form-control" placeholder="Keterangan hari libur" required="" />
                                </div>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="tgl_status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-tag fa-fw"></i></span>
                                    <select class="form-control" name="tgl_status" id="tgl_status">
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
                              <button type="submit" id="submit_hari" name="submit_hari" value="save" class="btn btn-primary">SAVE</button>
                            </div>
                        </div>
                </fieldset>
                </form>
                </div>
                </div>
        </div>
        
    </div>
</div>
