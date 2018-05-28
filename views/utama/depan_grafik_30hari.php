<?php
//echo date('Y-m-d').'<br />';
//echo date('Y-m-d', strtotime("-30 days"));

$hari_ini=date('Y-m-d');
$hari_30lalu=date('Y-m-d', strtotime("-$bnyk_hari days"));
$user_id=$_SESSION['papo_userid'];
for ($i=($bnyk_hari-1);$i>=0;$i--) {
    //echo date('Y-m-d', strtotime("-$i days")).'<br />';
    $data_hari[]=bln_thn_pendek(date('Y-m-d', strtotime("-$i days")));
    $r_semua=aktivitas_perhari(date('Y-m-d', strtotime("-$i days")),0,false);
    $data_isi_hari[]=$r_semua["jumlah"];
    $r_userid=aktivitas_perhari(date('Y-m-d', strtotime("-$i days")),$user_id,true);
    $data_isi_hari_userid[]=$r_userid["jumlah"];
}
?>
<script type="text/javascript">
$(function () {
    Highcharts.chart('grafik30hari', {
    	chart: {
        type: 'column'
    },
        title: {
            text: 'Grafik Jumlah Aktivitas <?php echo $bnyk_hari;?> hari terakhir',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: [<?php echo '\''.ltrim(implode("','",$data_hari),"',").'\'';?>]
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
            reversed: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah Total Aktivitas',
            data: [<?php echo join($data_isi_hari, ',')?>]
        }, {
            name: 'Jumlah Aktivitas <?php echo $_SESSION['papo_nama'];?>',
            data: [<?php echo join($data_isi_hari_userid, ',')?>]
        }
        ]
    });
});
</script>

<div id="grafik30hari" style="min-width: 250px; min-height: 300px; margin: 0 auto"></div>
<a href="<?php echo $url; ?>/harian/" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Aktivitas Harian"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> Selengkapnya</a>