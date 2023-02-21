<?php
require_once ('../../csdl/helper.php');

$idCard = $CardName = $TimeStart = $TimeEnd = $price = $Promotional ='';
if (!empty($_POST)) {
	if (isset($_POST['idCard'])) {
		$idCard = $_POST['idCard'];
	}
	if (isset($_POST['CardName'])) {
		$CardName = $_POST['CardName'];
	}
	if (isset($_POST['price'])) {
		$price = $_POST['price'];
	}
	if (isset($_POST['Promotional'])) {
		$Promotional = $_POST['Promotional'];
	}


	if (!empty($CardName)) {
		if ($idCard == '') {
			$sql = 'insert into gymcard(CardName,price,Promotional) values("'.$CardName.'","'.$price.'","'.$Promotional.'")';
		}
		else {
			$sql = 'update gymcard set CardName = "'.$CardName.'",price = "'.$price.'",Promotional = "'.$Promotional.'" where idCard = '.$idCard;
		}
		execute($sql);
		header('Location:index.php');
		die();
	}
}
if (isset($_GET['idCard'])) {
	$idCard = $_GET['idCard'];
	$sql      = 'select * from gymcard where idCard = '.$idCard;
	$KH = executeSingleResult($sql);
	if ($KH != null) {
		$CardName = $KH['CardName'];
		$price = $KH['price'];
		$Promotional = $KH['Promotional'];
	}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ql Gym</title>
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
				<h2 class="text-center">Thêm/Sửa Danh Sách Thẻ Gym</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="CardName">Tên Thẻ Gym:</label>
					  <input type="text" name="idCard" value="<?=$idCard?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="CardName" name="CardName" value="<?=$CardName?>">
					</div>
                    <div class="form-group">
					  <label for="price">Giá:</label>
					  <input required="true" type="number" class="form-control" id="price" name="price" value="<?=$price?>">
					</div>
                    <div class="form-group">
					  <label for="Promotional">Khuyến mãi:</label>
					  <input required="true" type="text" class="form-control" id="Promotional" name="Promotional" value="<?=$Promotional?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
		</div>
	</div>
</body>
</html>	