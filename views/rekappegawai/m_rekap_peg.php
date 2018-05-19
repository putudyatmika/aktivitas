<?php
if ($act=="add") {
    include 'views/rekappegawai/rekap_peg_form_add.php';
}
elseif ($act=="edit") {
    include 'views/rekappegawai/rekap_peg_form_edit.php';
}
elseif ($act=="save") {
    include 'views/rekappegawai/rekap_peg_save.php';
}
elseif ($act=="update") {
    include 'views/rekappegawai/rekap_peg_update.php';
}
elseif ($act=="delete") {
    include 'views/rekappegawai/rekap_peg_delete.php';
}
else {
    include 'views/rekappegawai/rekap_peg_list.php';
}
?>