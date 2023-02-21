<?php
require_once ('../../csdl/helper.php');

if (!empty($_POST)) {
	if (isset($_POST['action'])) {
		$action = $_POST['action'];

		switch ($action) {
			case 'delete':
				if (isset($_POST['idRevenue'])) {
					$idRevenue = $_POST['idRevenue'];
					$idkh = $_POST['idMembers'];
					$sql1 = 'UPDATE members m JOIN revenue r on m.idMembers = r.idMembers SET Status = 2 WHERE r.idRevenue = '.$idRevenue;
					execute($sql1);
					$sql = 'delete from revenue where idRevenue = '.$idRevenue;
					execute($sql);
				}
				break;
		}
	}
}
?>
