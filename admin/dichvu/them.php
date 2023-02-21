<?php
require_once ('../../csdl/helper.php');

$idRent = $RentName = $TimeStart = $TimeEnd = $pricedv = $idPT ='';
if (!empty($_POST)) {
	if (isset($_POST['idRent'])) {
		$idRent = $_POST['idRent'];
	}
	if (isset($_POST['RentName'])) {
		$RentName = $_POST['RentName'];
	}
	if (isset($_POST['pricedv'])) {
		$pricedv = $_POST['pricedv'];
	}
	if (isset($_POST['idPT'])) {
		$idPT = $_POST['idPT'];
	}

	if (!empty($RentName)) {
		if ($idRent == '') {
			$sql = 'insert into rent(RentName,pricedv,idPT) values("'.$RentName.'","'.$pricedv.'","'.$idPT.'")';
		}
		else {
			$sql = 'update rent set RentName = "'.$RentName.'",pricedv = "'.$pricedv.'",idPT = "'.$idPT.'" where idRent = '.$idRent;
		}
		execute($sql);
		// echo $sql;
		header('Location:index.php');
		die();
	}
}
if (isset($_GET['idRent'])) {
	$idRent = $_GET['idRent'];
	$sql      = 'select * from rent where idRent = '.$idRent;
	$KH = executeSingleResult($sql);
	if ($KH != null) {
		$RentName = $KH['RentName'];
		$pricedv = $KH['pricedv'];
		$idPT = $KH['idPT'];
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CNPM-QLKS</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../css/main.css">

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
				<h2 class="text-center">Thêm/Sửa Danh Sách Dịch Vụ Cho Thuê</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="RentName">Tên Dịch Vụ Cho Thuê:</label>
					  <input type="text" name="idRent" value="<?=$idRent?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="RentName" name="RentName" value="<?=$RentName?>">
					</div>
                    <div class="form-group">
					  <label for="pricedv">Giá:</label>
					  <input required="true" type="number" class="form-control" id="pricedv" name="pricedv" value="<?=$pricedv?>">
					</div>
					<div class="form-group">
						<label for="idPT">Tên HLV:</label>
							<select class="form-control" name="idPT" id="idPT">
								<option value="">chọn</option>
									<?php
										$sql = 'select * from personaltrainer';
										$list = executeResult($sql);
										foreach($list as $item){
										echo '<option value="'.$item['idPT'].'">'.$item['NamePT'].'</option>';
										}
									?>
							</select>
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
		</div>
	</div>
</body>
</html>	