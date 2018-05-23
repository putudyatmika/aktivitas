<?php
$r_bln_aktivitas=jumlah_aktivitas($bulan_skrg,$tahun_skrg);
if ($r_bln_aktivitas["error"]==false) {
	$total_aktivitas=$r_bln_aktivitas["aktif_total"];
	for ($i=1;$i<=$total_aktivitas;$i++) {
		$data_bidang[]=$r_bln_aktivitas["item"][$i]["unit_nama"];
		if ($r_bln_aktivitas["item"][$i]["unit_jumlah"]=='') {
			$data_bulanan[]=0;
		}
		else {
		$data_bulanan[]=$r_bln_aktivitas["item"][$i]["unit_jumlah"];
	}
	}
?>
<script type="text/javascript">
$(function () {
    Highcharts.chart('grafikbulanan', {
    	chart: {
        type: 'column'
    },
        title: {
            text: 'Grafik Jumlah Aktivitas Menurut Bidang',
            x: -20 //center
        },
        subtitle: {
            text: 'Bulan : <?php echo $nama_bulan_panjang[$bulan_skrg] .' '.$tahun_skrg; ?>',
            x: -20
        },
        xAxis: {
            categories: [<?php echo '\''.ltrim(implode("','",$data_bidang),"',").'\'';?>]
        },
        yAxis: {
            title: {
                text: ''
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        legend: {
             enabled: false
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah Aktivitas',
            data: [<?php echo join($data_bulanan, ',')?>]
        }]
    });
});
</script>
<?php }
else {
	echo $r_bln_aktivitas["pesan_error"];
}

?>
<div id="grafikbulanan" style="min-width: 250px; min-height: 300px; margin: 0 auto"></div>
<a href="<?php echo $url; ?>/harian/" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Aktivitas Harian"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Selengkapnya</a>