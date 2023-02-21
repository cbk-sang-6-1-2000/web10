<?php
require_once ('../../csdl/helper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['idCategory'])) {
					$idCategory = $_POST['idCategory'];

					$sql = 'delete from category where idCategory = '.$idCategory;
					execute($sql);
				}
				break;
		}
	}
}
?>
