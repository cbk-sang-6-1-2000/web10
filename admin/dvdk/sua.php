<?php
require_once ('../../csdl/helper.php');

$id = $idMembers = $idRent = '';
if (!empty($_POST)) {
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	}
	if (isset($_POST['idMembers'])) {
		$idMembers = $_POST['idMembers'];
	}
	if (isset($_POST['idRent'])) {
		$idRent = $_POST['idRent'];
	}


	if (!empty($idMembers)) {
		if ($id == '') {
			$sql = 'insert into userent(idMembers,idRent) values("'.$idMembers.'","'.$idRent.'")';
		}
		else {
			$sql = 'update userent set idMembers = "'.$idMembers.'",idRent = "'.$idRent.'" where id = '.$id;
		}
		execute($sql);
		header('Location:index.php');
		die();
	}
}
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql      = 'select m.idMembers, r.idRent, m.Name from members m join userent ur on m.idMembers = ur.idMembers join rent r on r.idRent = ur.idRent where ur.id = '.$id;
	$KH = executeSingleResult($sql);
	if ($KH != null) {
		$idMembers = $KH['idMembers'];
		$idRent = $KH['idRent'];
        $name = $KH['Name'];
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/main.css">
	<title>Ql Gym</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm/Sửa Danh Sách Dịch Vụ Đăng Ký</h2>
			</div>
			<div class="panel-body">
				<form method="post">
                <div class="form-group">
					  <label for="idMembers">id khách hàng:</label>
					  <input type="text" name="id" value="<?=$id?>" hidden="true">
					  <input readonly required="true" type="text" class="form-control" id="idMembers" name="idMembers" value="<?=$idMembers?>">
					</div>
                    <div class="form-group">
                      <label for="idMembers">Tên Khách Hàng:</label>
                      <input readonly required="true" type="text" class="form-control" id="name" name="name" value="<?=$name?>">
					</div>
                    <div class="form-group">
					  <label for="idRent">id dịch vụ:</label>
					  <select class="form-control" name="idRent" id="idRent" value="<?=$idRent?>">
                          <option value="">Chọn</option>
                          <?php
                                $sql = 'select * from rent';
                                $list = executeResult($sql);
                                foreach($list as $item){
                                    echo '<option value="'.$item['idRent'].'">'.$item['RentName'].'</option>';
                                }
                            ?>
                      </select>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
		</div>
	</div>
</body>
</html>	