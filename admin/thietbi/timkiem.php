<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý thiết bị";
require_once ('../../csdl/helper.php');
require_once('../header.php');
$queryinsert = 0;
if (isset($_POST['submit']) && $_POST['submit'] == 'Thêm thiết bị') {
    $queryinsert = mysqli_query($conn, "INSERT INTO `equipment` (`idEquipment`, `EquipmentName`, `Status`, `idCategory`) VALUES (NULL, '" . $_POST['EquipmentName'] . "', '" . $_POST['Status'] . "', '" . $_POST['idCategory'] . "')");
}

$querydel = 0;
if (isset($_POST['xoaid'])) {
    $querydel = mysqli_query($conn, "DELETE FROM `equipment` WHERE `equipment`.`idEquipment` = " . $_POST['xoaid']);
}

$queryupdate = 0;
if (isset($_POST['update'])) {
    $queryupdate = mysqli_query($conn, "UPDATE `equipment` SET `EquipmentName` = '" . $_POST['suatenmay1'] . "', `Status` = '" . $_POST['suatinhtrang'] . "' WHERE `equipment`.`idEquipment` = " . $_POST['suaid']);
}    
if (isset($_REQUEST['ok'])) 
    {
        $search = addslashes($_POST['search']);
    if (empty($search)) {
        echo "Yeu cau nhap du lieu vao o trong";
    } 
    else
    {
$querymay = mysqli_query($conn, "SELECT * FROM `equipment` e WHERE e.EquipmentName like '%$search%' ORDER BY `EquipmentName` ASC ");
    }
}
?>

<?php
if ($queryinsert) :
    echo "<script>Swal.fire('Thành công!', 'Thêm thiết bị thành công!', 'success')</script>";
elseif ($queryinsert !== 0) :
    echo "<script>Swal.fire('Thất bại!', 'Thêm thiết bị thất bại!', 'error')</script>";
endif;

if ($queryupdate) :
    echo "<script>Swal.fire('Thành công!', 'Sửa thiết bị thành công!', 'success')</script>";
elseif ($queryupdate !== 0) :
    echo "<script>Swal.fire('Thất bại!', 'Sửa thiết bị thất bại!', 'error')</script>";
endif;

if ($querydel) :
    echo "<script>Swal.fire('Thành công!', 'Xóa thiết bị thành công!', 'success')</script>";
elseif ($querydel !== 0) :
    echo "<script>Swal.fire('Thất bại!', 'Xóa thiết bị thất bại!', 'error')</script>";
endif;
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
            .nice-select{
            height: auto;
            line-height: 25px;}

		</style>
   </head>
   <!-- body -->
   <body class="main-layout">
	<!-- header section start -->
	<!-- new collection section start -->
  	<div class="collection_text" style =";font-size: 30px;font-family: 'Times New Roman', Times, serif; padding : 15px 0px; margin-top: 106px">Quản Lý Thiết Bị</div>
<form action="" method="post" class="row mb-3" style="width: 90%;
                margin: auto;">
    <div class="col-5">
        <label for="EquipmentName" class="form-label">Tên máy: </label>
        <input required type="text" name="EquipmentName" id="EquipmentName" class="form-control">
    </div>
    <div class="col-5" style="
    display: grid">
        <label for="Status" class="form-label">Tình trạng máy: </label>
        <select required class="form-control" name="Status" id="Status">
            <option value="still active">Bình thường</option>
            <option value="no active">Hỏng</option>
        </select>
    </div>
    <div class="col-5" style="
    display: grid">
		<label for="idCategory">Tên danh mục:</label>
			<select class="form-control" name="idCategory" id="idCategory">
                <option value="">chọn</option>
                    <?php
                        $sql = 'select * from category';
                        $list = executeResult($sql);
                        foreach($list as $item){
                        echo '<option value="'.$item['idCategory'].'">'.$item['CategoryName'].'</option>';
                        }
                    ?>
             </select>
	</div>
    <div class="col-2">
        <input type="submit" value="Thêm thiết bị" id="submit" name="submit" class="btn btn-primary mt-4">
    </div>
</form>

<div>
            		<form action="" method="post" style="width: 500px;display: inline-block;padding: 20px;">
                		Search: <input type="text" name="search" />
                		<input type="submit" name="ok" value="search" />
            		</form>
				</div>
<div class="row" style="width: 90%;
                margin: auto;">
    <?php while ($equipment = mysqli_fetch_assoc($querymay)) {
        if ($equipment['Status'] == "no active") {
    ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/bt2.jpg" style="width=100px;height: 200px" class="card-img-top" alt="máy hỏng">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $equipment['EquipmentName'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenmay1="<?= $equipment['EquipmentName'] ?>"  data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenmay1="<?= $equipment['EquipmentName'] ?>" data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        } else {
            if($equipment['idCategory'] == 1){
        ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/mcb.jpg" style="width=100px;height: 200px" class="card-img-top" alt="bình thường">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $equipment['EquipmentName'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenmay1="<?= $equipment['EquipmentName'] ?>"  data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenmay1="<?= $equipment['EquipmentName'] ?>" data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
                <?php
                if($equipment['idCategory'] == 2){
                ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/xe.jpg" style="width=100px;height: 200px" class="card-img-top" alt="bình thường">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $equipment['EquipmentName'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenmay1="<?= $equipment['EquipmentName'] ?>"  data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenmay1="<?= $equipment['EquipmentName'] ?>" data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

                <?php
                if($equipment['idCategory'] == 3){
                ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/vn.jpg" style="width=100px;height: 177px" class="card-img-top" alt="bình thường">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $equipment['EquipmentName'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenmay1="<?= $equipment['EquipmentName'] ?>"  data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenmay1="<?= $equipment['EquipmentName'] ?>" data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

                <?php
                if($equipment['idCategory'] == 4){
                ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/mtb.jpg" style="width=100px;height: 200px" class="card-img-top" alt="bình thường">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $equipment['EquipmentName'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenmay1="<?= $equipment['EquipmentName'] ?>"  data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenmay1="<?= $equipment['EquipmentName'] ?>" data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>

                <?php
                if($equipment['idCategory'] == 5){
                ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/ta.jpg" style="width=100px;height: 200px" class="card-img-top" alt="bình thường">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $equipment['EquipmentName'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenmay1="<?= $equipment['EquipmentName'] ?>" data-tinhtrang="<?= $equipment['Status'] ?>" data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenmay1="<?= $equipment['EquipmentName'] ?>" data-tinhtrang="<?= $equipment['Status'] ?>" data-id="<?= $equipment['idEquipment'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                } 
            ?>
    <?php
        }
    ?>
    <?php
        }
    ?>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="suatenmay1" class="form-label">Tên máy: </label>
                        <input type="hidden" name="suaid" id="suaid">
                        <input type="text" name="suatenmay1" id="suatenmay1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="suatinhtrang" class="form-label" style="display: block">Tình trạng máy: </label>
                        <select class="form-control" name="suatinhtrang" id="suatinhtrang">
                            <option value="still active">Bình thường</option>
                            <option value="no active">Hỏng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Lưu và đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="msgxoa"></p>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <input type="hidden" name="xoaid" value="" id="xoaid">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                    <button class="btn btn-primary"><i class="fa fa-trash"></i> Chấp nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var tenmay1 = button.data('tenmay1')
        var tinhtrang = button.data('tinhtrang')
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-title').text('Sửa ' + tenmay1)
        modal.find('#suatenmay1').val(tenmay1)
        modal.find('#suaid').val(id)
    })

    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var tenmay = button.data('tenmay1')
        var modal = $(this)
        var id = button.data('id')
        modal.find('#xoaid').val(id)
        modal.find('.modal-title').text('Xóa ' + tenmay)
        modal.find('#msgxoa').html("Bạn chắc muốn xóa <b>" + tenmay +"</b>? Sau khi xóa bạn sẽ không thể khôi phục lại được.<br/> - Nếu <b>đồng ý</b> xóa, hãy nhấn <b>chấp nhận</b>.<br/> - Nếu <b>không đồng ý</b> xóa, hãy nhấn <b>đóng</b>.")
    })
</script>
</body>

<?php
     require_once('../footer.php')
?>
</html>