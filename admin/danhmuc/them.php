<?php
require_once ('../../csdl/helper.php');

$idCategory = $CategoryName ='';
if (!empty($_POST)) {
	if (isset($_POST['idCategory'])) {
		$idCategory = $_POST['idCategory'];
	}
	if (isset($_POST['CategoryName'])) {
		$CategoryName = $_POST['CategoryName'];
	}
	}

	if (!empty($CategoryName)) {
		if ($idCategory == '') {
			$sql = 'insert into category(CategoryName) values("'.$CategoryName.'")';
		}
		else {
			$sql = 'update category set CategoryName = "'.$CategoryName.'" where idCategory = '.$idCategory;
		}
		execute($sql);
		header('Location:index.php');
		die();
	}

if (isset($_GET['idCategory'])) {
	$idCategory = $_GET['idCategory'];
	$sql      = 'select * from category where idCategory = '.$idCategory;
	$category = executeSingleResult($sql);
	if ($category != null) {
		$CategoryName = $category['CategoryName'];
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
				<h2 class="text-center">Thêm/Sửa Danh Sách Danh Mục</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="CategoryName">Tên Danh mục:</label>
					  <input type="text" name="idCategory" value="<?=$idCategory?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="CategoryName" name="CategoryName" value="<?=$CategoryName?>">
					</div>
					<button class="btn btn-success">Lưu</button>
				</form>
			</div>
		</div>
		</div>
	</div>
</body>
</html>	