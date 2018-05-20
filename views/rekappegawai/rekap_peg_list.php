<div class="row wrapper border-bottom white-bg page-heading">
	<div class="col-lg-10">
	<h2>Data Rekap Aktivitas Pegawai</h2>
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
                        <h5>Data Rekap Aktivitas Pegawai</h5>
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
                      <table class="table table-striped table-hover TabelAktivitasHarian">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th width="15%">Waktu</th>
                            <th>Kegiatan</th>
                            <th>Target</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tobdy>
                        <tfoot>
                            <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Hari</th>
                            <th width="15%">Waktu</th>
                            <th>Kegiatan</th>
                            <th>Target</th>
                            <th>Tanggal Save</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </tr>  
                        </tfoot>

                        </table>
                        
                    </div> <!--batas tabel responsive-->
                    </div>
                </div>
        </div>
        
    </div>
</div>
