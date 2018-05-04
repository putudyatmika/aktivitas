<?php
			if ($act=='add') {
				include 'views/users/users_form.php';
			}
			elseif ($act=='save') {
				include 'views/users/users_save.php';
			}
			elseif ($act=='edit') {
				include 'views/users/users_form_edit.php';
			}
			elseif ($act=='update') {
				include 'views/users/users_update.php';
			}
			elseif ($act=='view') {
				include 'views/users/users_view.php';
			}
			elseif ($act=='delete') {
				include 'views/users/users_delete.php';
			}
			elseif ($act=='honor') {
				include 'views/users/users_honor.php';
			}
			elseif ($act=='pns') {
				include 'views/users/users_pns.php';
			}
			else {
				include 'views/users/users_list.php';
			}
		?>