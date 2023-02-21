<?php
require_once ('../../csdl/helper.php');
require_once('../header.php');

$time = date('d/m/y');
$queryKH = mysqli_query($conn, "SELECT sum(rent.pricedv) as tong,userent.id,sum(rent.pricedv) + SUM(gymcard.price) - (gymcard.price * (COUNT(members.idMembers) - 1)) as tong1,h.total,h.idRevenue,userent.id,sum(rent.pricedv) + SUM(gymcard.price) - gymcard.price,members.Name, members.idMembers, gymcard.CardName, gymcard.price, rent.pricedv, rent.RentName
FROM
    members LEFT JOIN gymcard on members.idCard = gymcard.idCard LEFT JOIN userent on userent.idMembers = members.idMembers LEFT JOIN rent on rent.idRent = userent.idRent left join revenue h on members.idMembers = h.idMembers

WHERE h.idRevenue =" . $_GET['KH']);

$khachhanglist = mysqli_fetch_assoc($queryKH);
if (isset($_POST['submit'])) {
    $idRevenue = $_POST['idRevenue'];
    $idkh = $_POST['idkh'];
    $id = $_POST['id'];
    $gia = $_POST['gia2'];
    $sql = 'update revenue set idMembers = "'.$idkh.'",id = "'.$id.'",total = "'.$gia.'" where 	idRevenue = '.$idRevenue;
    // $query = mysqli_query($conn, "INSERT INTO `revenue` (`idMembers`, `id`, `Time`, `total`) VALUES ('".$_POST['idkh']."', '" .$_POST['id']. "','".$time."', '" .$_POST['gia2']."'");
    // // echo $query;
    if ($sql) {
        echo "<script>Swal.fire('Thành công!','Đã lưu thông tin hóa đơn!','success').then(function(){window.location = './index.php';});</script>";
    } else {
        echo "<script>Swal.fire('Thất bại!','Không thể lưu thông tin hóa đơn!','error');</script>";
    }
    // echo $sql;
    execute($sql);
    // echo $sql;
    // header('Location:index.php');
    die();
    // }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
		<!-- basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- mobile metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<!-- site metas -->
		<title>Ql Gym</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<meta name="author" content="">
		<!-- bootstrap css -->
		<link rel="stylesheet" href="../../style/css/bootstrap.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="../../style/css/style.css">
		<!-- Responsive-->
		<link rel="stylesheet" href="../../style/css/responsive.css">
		<!-- fevicon -->
		<link rel="icon" href="../../style/images/fevicon.png" type="image/gif" />
		<link rel="icon" href="../../style/images/search_icon.png"/>
		<link rel="icon" href="../../style/images/logo.png"/>
		<!-- Scrollbar Custom CSS -->
		<link rel="stylesheet" href="../../style/css/jquery.mCustomScrollbar.min.css">
		<!-- Tweaks for older IEs-->
		<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
		<!-- owl stylesheets --> 
		<link rel="stylesheet" href="../../style/css/owl.carousel.min.css">
		<link rel="stylesheet" href="../../style/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

		<style>
			tbody{
				font-family: 'Times New Roman', Times, serif;
				font-size: 16px;
				margin-bottom: 15px;
			}

			table{
				
			}

			.header_main {
				width: 100%;
				height: auto;
				position: fixed;
				background: #0c0116;
				z-index: 1;
			}


			thead{
				font-size: 20px;font-family: 'Times New Roman', Times, serif;
			}
		</style>
   </head>
   <!-- body -->
   <body class="main-layout">
	<!-- header section start -->
	<!-- new collection section start -->
  	<div class="collection_text" style =";font-size: 30px;font-family: 'Times New Roman', Times, serif; padding : 15px 0px; margin-top: 106px">Quản Lý Hóa Đơn</div>
	  <div class="panel-body">
				<!-- <a href="them.php">
					<button class="btn btn-success" style="margin: 15px 0px; width: 200px">Thêm Khách hàng</button>
				</a> -->
                <div class="row">
    <div class="col-xl-8 mx-auto">
        <form method="post" action="">

                <div class="row" style = "padding-top: 20px">
                <div class="col-xl-6 col-md-6">
                        <div class="form-group">
                            <label for="idkh">ID hóa đơn:</label>
                            <input type="text" readonly class="form-control" id="idRevenue" name="idRevenue" value="<?= $_GET['KH'] ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="form-group">
                            <label for="idkh">ID khách hàng:</label>
                            <input type="number" readonly class="form-control" id="idkh" name="idkh" value="<?= $khachhanglist['idMembers'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tenkh">Tên Khách hàng:</label>
                            <input type="text" readonly class="form-control" id="tenkh" name="tenkh" value="<?= $khachhanglist['Name'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="idCard" value="<?=$idCard?>" hidden="true">
                            <label for="goitap">Tên gói tập:</label>
                            <input type="text" readonly class="form-control" id="goitap" name="goitap" value="<?= $khachhanglist['CardName'] ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="form-group">
                            <label for="gia">Giá:</label>
                            <input type="text" readonly class="form-control" id="gia" name="gia" value="<?= $khachhanglist['price'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="form-group">
                            <label for="id">id dịch vụ đăng ký:</label>
                            <input type="text" readonly class="form-control" id="id" name="id" value="<?= $khachhanglist['id'] ?>">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="form-group">
                            <label for="dv">Tên dịch vụ:</label>
                            <input type="text" readonly class="form-control" id="dv" name="dv" value="<?= $khachhanglist['RentName'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="gia1">Tổng giá dịch vụ:</label>
                            <input type="text" readonly class="form-control" id="gia1" name="gia1" value="<?= $khachhanglist['tong'] ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="gia2">Tổng Tiền:</label>
                            <input type="text" class="form-control" id="gia2" name="gia2" value="<?= $khachhanglist['tong1'] ?>">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="ghichu">Ghi chú:</label>
                            <textarea class="form-control" name="ghichu" id="ghichu" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                </div>
                <!-- bắt đầu tính giờ -->
                <button name="submit" type="submit" class="btn btn-primary px-5"></i>tính tiền</button>
                <a href="./index.php" class="btn btn-danger px-5"><i class="fa fa-reply"></i>Trở về</a>
            </form>
        </div>
    </div>

    	</div>
	<!-- new collection section end -->
	<!-- section footer start -->
   </body>

   <?php
		require_once('../footer.php')
   ?>
</html>
