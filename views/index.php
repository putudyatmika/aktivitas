<?php
if ($page=="add") {
    include 'views/add/aktif_form.php';
}
elseif ($page=="save") {
    include 'views/save/aktif_save.php';
}
elseif ($page=="edit") {
    include 'views/edit/aktif_form_edit.php';
}
elseif ($page=="dataunitkerja") {
        include 'views/unitkerja/m_unitkerja.php';
    }
elseif ($page=="datakamus") {
    include 'views/kamus/m_kamus.php';
}
elseif ($page=="dataredaksi") {
    include 'views/redaksi/m_redaksi.php';
}
elseif ($page=="datapegawai") {
    include 'views/pegawai/m_pegawai.php';
}
elseif ($page=="datausers") {
    include 'views/users/m_users.php';
}
elseif ($page=="harian") {
    include 'views/harian/aktif_harian.php';
}
elseif ($page=="logout") {
    include 'views/login/logout.php';
}
elseif ($page=="users") {
    include 'views/users/m_users.php';
}
elseif ($page=="json") {
    include 'views/json/m_json.php';
}
else {
    include 'views/utama/m_views.php';
}
?>