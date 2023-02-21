<?php
require_once ('../../csdl/helper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['idRent'])) {
					$idRent = $_POST['idRent'];
					$sql = 'delete from rent where idRent = '.$idRent;
					execute($sql);
				}
				break;
		}
	}
}
?>
