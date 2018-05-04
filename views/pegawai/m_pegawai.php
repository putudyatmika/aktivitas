<?php
			if ($act=='add') {
				include 'views/master/pegawai/m_pegawai_form.php';
			}
			elseif ($act=='save') {
				include 'views/master/pegawai/m_pegawai_save.php';
			}
			elseif ($act=='edit') {
				include 'views/master/pegawai/m_pegawai_form_edit.php';
			}
			elseif ($act=='update') {
				include 'views/master/pegawai/m_pegawai_update.php';
			}
			elseif ($act=='view') {
				include 'views/master/pegawai/m_pegawai_view.php';
			}
			elseif ($act=='delete') {
				include 'views/master/pegawai/m_pegawai_delete.php';
			}
			elseif ($act=='honor') {
				include 'views/master/pegawai/m_pegawai_honor.php';
			}
			elseif ($act=='pns') {
				include 'views/master/pegawai/m_pegawai_pns.php';
			}
			else {
				include 'views/pegawai/m_pegawai_list.php';
			}
?>