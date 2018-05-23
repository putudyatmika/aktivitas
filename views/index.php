<?php
if ($page=="add") {
    include 'views/crud/data_form.php';
}
elseif ($page=="save") {
    include 'views/crud/data_save.php';
}
elseif ($page=="edit") {
    include 'views/crud/data_form_edit.php';
}
elseif ($page=="update") {
    include 'views/crud/data_update.php';
}
elseif ($page=="hapus") {
    include 'views/crud/data_delete.php';
}
elseif ($page=="dataunitkerja") {
        include 'views/unitkerja/m_unitkerja.php';
    }
elseif ($page=="dataharilibur") {
        include 'views/harilibur/m_harilibur.php';
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
elseif ($page=="profile") {
    include 'views/profil/m_profil.php';
}
elseif ($page=="harian") {
    include 'views/harian/aktif_harian.php';
}
elseif ($page=="rekappegawai") {
    include 'views/rekappegawai/m_rekap_peg.php';
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