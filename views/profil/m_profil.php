<?php
if ($act=="edit") {
    include 'views/profil/profil_form.php';
}
elseif ($act=="update") {
    include 'views/profil/profil_update.php';
}
elseif ($act=="gantipass") {
    include 'views/profil/profil_gantipass_form.php';
}
else {
    include 'views/profil/profil_view.php';
}
?>