<?php
			if ($act=='add') {
				include 'views/unitkerja/m_unitkerja_form.php';
			}
			elseif ($act=='save') {
				include 'views/unitkerja/m_unitkerja_save.php';
			}
			elseif ($act=='edit') {
				include 'views/unitkerja/m_unitkerja_form_edit.php';
			}
			elseif ($act=='update') {
				include 'views/unitkerja/m_unitkerja_update.php';
			}
			elseif ($act=='view') {
				include 'views/unitkerja/m_unitkerja_view.php';
			}
			elseif ($act=='delete') {
				include 'views/unitkerja/m_unitkerja_delete.php';
			}
			elseif ($act=='provinsi') {
				include 'views/unitkerja/m_unitkerja_provinsi.php';
			}
			elseif ($act=='kabupaten') {
				include 'views/unitkerja/m_unitkerja_kabupaten.php';
			}
			else {
				include 'views/unitkerja/m_unitkerja_list.php';
			}
?>