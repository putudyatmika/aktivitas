<?php
function list_log_absen($tanggal,$absen_id,$semua=false,$detil=false) {
	$db_absen = new db();
	$conn_absen = $db_absen -> connect();
	if ($semua==false) {
        //var $tanggal digunakan select hari tertentu
        if ($detil==false) {
            //semua absen_id ditampilan di 1 tanggal
            $sql_absen = $conn_absen -> query("select * from log_absen order by tanggal desc, jam desc") or die(mysqli_error($conn_absen));
        }
        else {
            //hanya 1 absen_id di 1 tanggal
            $sql_absen = $conn_absen -> query() or die(mysqli_error($conn_absen));
        }
    }
    else {
        //semua tanggal di tampilkan
        if ($detil==false) {
            //semua absen_id ditampilkan disemua tanggal
            $sql_absen = $conn_absen -> query() or die(mysqli_error($conn_absen));
        }
        else {
            //hanya 1 absen_id di semua tanggal
            $sql_absen = $conn_absen -> query() or die(mysqli_error($conn_absen));
        }
    }
    $cek=$sql_absen -> num_rows;
    $data_absen=array("error"=>false);
    if ($cek>0) {
        $data_absen["error"]=false;
        $data_absen["total_absen"]=$cek;
        $i=1;
        while ($r=$sql_absen->fetch_object()) {
            $data_absen["item"][$i]=array(
                "id"=>$r->id,
                "absen_id"=>$r->absen_id,
                "nama"=>$r->nama,
                "tanggal"=>$r->tanggal,
                "jam"=>$r->jam,
                "kode"=>$r->kode,
                "waktu_sync"=>$r->waktu_sync,
                "flag"=>$r->flag,
                "ket"=>$r->ket
            );
            $i++;
        }

    }
    else {
        $data_absen["error"]=true;
        $data_absen["pesan_error"]='Data tidak tersedia';
    }
	return $data_absen;
	$conn_absen -> close();
}
function input_log($absen_id,$nama,$tgl_absen,$jam_absen,$kode) {
	$waktu_lokal=date("Y-m-d H:i:s");
	$db_sync = new db();
	$conn_sync = $db_sync -> connect();
	$sql_sync = $conn_sync-> query("insert into log_absen(absen_id,nama,tanggal,jam,kode,waktu_sync) values('$absen_id','$nama','$tgl_absen','$jam_absen','$kode','$waktu_lokal')") or die(mysqli_error($conn_sync));
	if ($sql_sync) {
		$status_sync=TRUE;
	}
	else {
		$status_sync=FALSE;
	}
	return $status_sync;
	$db_sync->close();
}
function cek_log_absen($absen_id,$tgl_absen,$jam_absen,$kode) {
	$db_cek = new db();
	$conn_cek = $db_cek -> connect();
	$sql_cek = $conn_cek -> query("select * from log_absen where absen_id='$absen_id' and tanggal='$tgl_absen' and jam='$jam_absen' and kode='$kode'");
	$cek_hsl = $sql_cek->num_rows;
	if ($cek_hsl>0) {
		$cekValue=TRUE;
	}
	else {
		$cekValue=FALSE;
	}
	return $cekValue;
	$conn_cek->close();
}
?>