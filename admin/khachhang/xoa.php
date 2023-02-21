<?php
require_once ('../../csdl/helper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['idMembers'])) {
					$idMembers = $_POST['idMembers'];

					$sql = 'delete from members where idMembers = '.$idMembers;
					execute($sql);
				}
				break;
		}
	}
}
?>
