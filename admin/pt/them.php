<?php
require_once ('../../csdl/helper.php');

$idPT = $picture = $NamePT = $birthday = $NumberPhone = $Email = $Gender ='';
if (!empty($_POST)) {
	if (isset($_POST['idPT'])) {
		$idPT = $_POST['idPT'];
	}
	if (isset($_POST['picture'])) {
		$picture = $_POST['picture'];
	}
	if (isset($_POST['NamePT'])) {
		$NamePT = $_POST['NamePT'];
	}
	if (isset($_POST['birthday'])) {
		$birthday = $_POST['birthday'];
	}
	if (isset($_POST['NumberPhone'])) {
		$NumberPhone = $_POST['NumberPhone'];
	}
	if (isset($_POST['Email'])) {
		$Email = $_POST['Email'];
	}
    if (isset($_POST['Gender'])) {
		$Gender = $_POST['Gender'];
	}


	if (!empty($picture)) {
		if ($idPT == '') {
			$sql = 'insert into personaltrainer(picture,NamePT,birthday,NumberPhone,Email,Gender) values("'.$picture.'","'.$NamePT.'","'.$birthday.'","'.$NumberPhone.'","'.$Email.'","'.$Gender.'")';
		}
		else {
			$sql = 'update personaltrainer set picture = "'.$picture.'",NamePT = "'.$NamePT.'",birthday = "'.$birthday.'",NumberPhone = "'.$NumberPhone.'",Email = "'.$Email.'",Gender = "'.$Gender.'" where idPT = '.$idPT;
		}
		execute($sql);
		header('Location:index.php');
		die();
	}
}
if (isset($_GET['idPT'])) {
	$idPT = $_GET['idPT'];
	$sql      = 'select * from personaltrainer where idPT = '.$idPT;
	$PT = executeSingleResult($sql);
	if ($PT != null) {
		$picture = $PT['picture'];
		$NamePT = $PT['NamePT'];
		$birthday = $PT['birthday'];
		$NumberPhone = $PT['NumberPhone'];
		$Email = $PT['Email'];
        $Gender = $PT['Gender'];
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
				<h2 class="text-center">Th??m/S???a Danh S??ch Hu???n Luy???n Vi??n</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="picture">H??nh ???nh:</label>
					  <input type="text" name="idPT" value="<?=$idPT?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="picture" name="picture" value="<?=$picture?>">
					</div>
                    <div class="form-group">
					  <label for="NamePT">H??? v?? t??n:</label>
					  <input required="true" type="text" class="form-control" id="NamePT" name="NamePT" value="<?=$NamePT?>">
					</div>
                    <div class="form-group">
					  <label for="birthday">Ng??y sinh:</label>
					  <input required="true" type="date" class="form-control" id="birthday" name="birthday" value="<?=$birthday?>">
					</div>
                    <div class="form-group">
					  <label for="NumberPhone">S??? ??i???n tho???i:</label>
					  <input required="true" type="text" class="form-control" id="NumberPhone" name="NumberPhone" value="<?=$NumberPhone?>">
					</div>
                    <div class="form-group">
					  <label for="Email">Email:</label>
					  <input required="true" type="email" class="form-control" id="Email" name="Email" value="<?=$Email?>">
					</div>
                    <div class="form-group">
					  <label for="Gender">Gi???i t??nh:</label>
					  <input required="true" type="text" class="form-control" id="Gender" name="Gender" value="<?=$Gender?>">
					</div>
					<button class="btn btn-success">L??u</button>
				</form>
			</div>
		</div>
		</div>
	</div>
</body>
</html>	