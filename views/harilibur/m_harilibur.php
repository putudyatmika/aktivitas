<?php
if ($act=="add") {
    include 'views/harilibur/libur_form_add.php';
}
elseif ($act=="edit") {
    include 'views/harilibur/libur_form_edit.php';
}
elseif ($act=="save") {
    include 'views/harilibur/libur_save.php';
}
elseif ($act=="update") {
    include 'views/harilibur/libur_update.php';
}
elseif ($act=="delete") {
    include 'views/harilibur/libur_hapus.php';
}
else {
    include 'views/harilibur/libur_list.php';
}
?>