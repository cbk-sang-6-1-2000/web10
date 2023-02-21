<?php
require_once ('../../csdl/helper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['idCard'])) {
					$idCard = $_POST['idCard'];

					$sql = 'delete from gymcard where idCard = '.$idCard;
					execute($sql);
				}
				break;
		}
	}
}
?>
