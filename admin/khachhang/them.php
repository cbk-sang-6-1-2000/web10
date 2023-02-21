<?php
require_once ('../../csdl/helper.php');

$idMembers = $Name = $Birthday = $NumberPhone = $Gender = $Picture = $idCard = $Status = $timeStart = $timeEnd = '';
if (!empty($_POST)) {
	if (isset($_POST['idMembers'])) {
		$idMembers = $_POST['idMembers'];
	}
	if (isset($_POST['Name'])) {
		$Name = $_POST['Name'];
	}
	if (isset($_POST['birthday'])) {
		$Birthday = $_POST['birthday'];
	}
    if (isset($_POST['NumberPhone'])) {
		$NumberPhone = $_POST['NumberPhone'];
	}
    if (isset($_POST['gender'])) {
		$Gender = $_POST['gender'];
	}
    if (isset($_POST['picture'])) {
		$Picture = $_POST['picture'];
	}
    if (isset($_POST['idCard'])) {
		$idCard = $_POST['idCard'];
	}
    if (isset($_POST['timeStart'])) {
		$timeStart = $_POST['timeStart'];
	}
	if (isset($_POST['timeEnd'])) {
		$timeEnd = $_POST['timeEnd'];
	}


	if (!empty($idCard)) {
		$timeStart = date('d/m/y');
		if($idCard == 1){
			$timeStart = date('Y-m-j');
			$timeEnd = strtotime ( '+1 day' , strtotime ( $timeStart ) ) ;
			$timeEnd = date ( 'Y-m-j' , $timeEnd );
		}
		if($idCard == 2){
			$timeStart = date('Y-m-j');
			$timeEnd = strtotime ( '+1 months' , strtotime ( $timeStart ) ) ;
			$timeEnd = date ( 'Y-m-j' , $timeEnd );
		}
		if($idCard == 3){
			$timeStart = date('Y-m-j');
			$timeEnd = strtotime ( '+1 years' , strtotime ( $timeStart ) ) ;
			$timeEnd = date ( 'Y-m-j' , $timeEnd );
		}
		if ($idMembers == '') {
			$sql = 'insert into members(Name, birthday, NumberPhone, gender, picture, idCard, timeStart, timeEnd, Status) values("'.$Name.'","'.$Birthday.'","'.$NumberPhone.'","'.$Gender.'","'.$Picture.'","'.$idCard.'","'.$timeStart.'","'.$timeEnd.'","1")';
		}
		else {
			$sql = 'update members set Name = "'.$Name.'",birthday = "'.$Birthday.'",NumberPhone = "'.$NumberPhone.'",gender = "'.$Gender.'",picture = "'.$Picture.'",idCard = "'.$idCard.'",timeStart = "'.$timeStart.'",timeEnd = "'.$timeEnd.'" where idMembers = '.$idMembers;
		}
		execute($sql);
		header('Location:index.php');
		die();
	}
}
if (isset($_GET['idMembers'])) {
	$idMembers = $_GET['idMembers'];
	$sql      = 'select * from members where idMembers = '.$idMembers;
	$KH = executeSingleResult($sql);
	if ($KH != null) {
		$idMembers = $KH['idMembers'];
        $Name = $KH['Name'];
        $Birthday = $KH['birthday'];
        $NumberPhone = $KH['NumberPhone'];
        $Gender = $KH['gender'];
        $Picture = $KH['picture'];
        $idCard = $KH['idCard'];
		$timeStart = $KH['timeStart'];
		$timeEnd = $KH['timeEnd'];
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ql Gym</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<h2 class="text-center">Thêm/Sửa Danh Sách Dịch Vụ Đăng Ký</h2>
			</div>
			<div class="panel-body">
            <form method="post">
					  <label for="Name">Tên khách hàng:</label>
					  <input type="text" name="idMembers" value="<?=$idMembers?>" hidden="true">
					  <input required="true" type="text" class="form-control" id="Name" name="Name" value="<?=$Name?>">
					</div>
                    <div class="form-group">
					  <label for="birthday">Sinh nhật:</label>
					  <input required="true" type="date" class="form-control" id="birthday" name="birthday" value="<?=$Birthday?>">
					</div>
                    <div class="form-group">
					  <label for="NumberPhone">Số điện thoại:</label>
					  <input required="true" type="text" class="form-control" id="NumberPhone" name="NumberPhone" value="<?=$NumberPhone?>">
					</div>
					<div class="form-group">
                        <label for="gender" class="form-label">Giới tính: </label>
                        <select class="form-control" name="gender" id="gender" value="<?=$Gender?>">
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
							<option value="Khác">Khác</option>
                        </select>
                    </div>
                    <div class="form-group">
					  <label for="picture">Hình ảnh:</label>
					  <input required="true" type="text" class="form-control" id="picture" name="picture" value="<?=$Picture?>">
					</div>
                    <div class="form-group">
					  <label for="idCard">Tên thẻ tập:</label>
					  <select class="form-control" name="idCard" id="idCard" value="<?=$idCard?>">
                          <option value="">Chọn</option>
                          <?php
                                $sql = 'select * from gymcard';
                                $list = executeResult($sql);
                                foreach($list as $item){
                                    echo '<option value="'.$item['idCard'].'">'.$item['CardName'].'</option>';
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