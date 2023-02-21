<?php
require_once ('../../csdl/helper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['idPT'])) {
					$idPT = $_POST['idPT'];

					$sql = 'delete from personaltrainer where idPT = '.$idPT;
					execute($sql);
				}
				break;
		}
	}
}
?>
