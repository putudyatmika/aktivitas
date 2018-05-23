<?php
$bulan_skrg=date('n');
$tahun_skrg=date('Y');
$bnyk_hari=14;
?>
<div class="wrapper wrapper-content">
	<div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Aktivitas 3 hari sebelumnya</h5>
                    <div class="ibox-tools">
                    <a href="<?php echo $url; ?>/add/" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <?php include 'views/utama/depan_3hari.php'; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right"><?php echo $nama_bulan_panjang[$bulan_skrg] .' '.$tahun_skrg; ?></span>
                    <h5>Jumlah Aktivitas Menurut Bidang</h5>
                </div>
                <div class="ibox-content">
                    <?php include 'views/utama/depan_grafik_aktivitas_bidang.php'; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right"><?php echo $bnyk_hari;?> Hari</span>
                    <h5>Jumlah Aktivitas <?php echo $bnyk_hari;?> hari sebelumnya</h5>
                </div>
                <div class="ibox-content">
                <?php include 'views/utama/depan_grafik_30hari.php'; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right"><?php echo $tahun_skrg; ?></span>
                    <h5>Jumlah Aktivitas Perbulan</h5>
                </div>
                <div class="ibox-content">
                <?php include 'views/utama/depan_grafik_aktivitas_tahun.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>