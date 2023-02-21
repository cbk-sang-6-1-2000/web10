<?php
require_once ('../../csdl/helper.php');
require_once('../header.php')
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
  	<div class="collection_text" style =";font-size: 30px;font-family: 'Times New Roman', Times, serif; padding : 15px 0px; margin-top: 106px">  Quản Lý Khách Hàng</div>
	  <div class="panel-body">
	  <a href="them.php">
					<button class="btn btn-success" style="margin: 15px 0px; width: 200px ; float: right;
    margin-right: 77px;">Thêm Danh Mục</button>
				</a>
				<div>
            		<form action="timkiem.php" method="post" style="width: 500px;display: inline-block;padding: 20px;">
                		Search: <input type="text" name="search" />
                		<input type="submit" name="ok" value="search" />
            		</form>
				</div>
					<table class="table table-bordered table-hover" style ="text-align: center; width: 90%; margin: auto; font-weight: 900; margin-bottom: 25px; border: 5px solid">
						<thead>
							<tr>
								<th width="50px">STT</th>
								<th>Hình ảnh</th>
								<th>Tên khách hàng</th>
								<th>Ngày sinh</th>
								<th>Giới tính</th>
								<th>SĐT</th>
								<th>Sử dụng loại thẻ gym</th>
								<th>Thời hạn còn</th>
								<th>Trạng thái</th>
								<th width="50px"></th>
								<th width="50px"></th>
							</tr>
						</thead>
						<tbody>
                        <?php
if (isset($_REQUEST['ok'])) 
{
    $search = addslashes($_POST['search']);
    if (empty($search)) {
        echo "Yeu cau nhap du lieu vao o trong";
    } 
    else
    {
							$sql = "select members.idMembers, members.Name ,members.birthday,DATEDIFF(timeEnd, CURDATE()), members.NumberPhone, members.gender, members.picture,IF(DATEDIFF(timeEnd, CURDATE()) <= 0,'hết hạn','hoạt động') AS ngày, gymcard.CardName from members INNER join gymcard on members.idCard = gymcard.idCard where members.Name LIKE '%$search%'";
							$khach_hang_list = executeResult($sql);
                            if ($khach_hang_list > 0 && $search != "") 
                            {
                                echo "kết quả trả về với từ khóa tìm kiếm <b>$search</b> là: ";
                                $index = 1;
							foreach ($khach_hang_list as $item) {
								echo '<tr>
											<td>'.($index++).'</td>
											<td><img src="'.$item['picture'].'" style = "max-width : 70px"/></td>
											<td>'.$item['Name'].'</td>
											<td>'.$item['birthday'].'</td>
											<td>'.$item['gender'].'</td>
											<td>'.$item['NumberPhone'].'</td>
											<td>'.$item['CardName'].'</td>
											<td>'.$item['DATEDIFF(timeEnd, CURDATE())'].' Ngày</td>
											<td>'.$item['ngày'].'</td>
											<td>
												<a href="them.php?idMembers='.$item['idMembers'].'"><button class="btn btn-warning">Sửa</button></a>
											</td>
											<td>
												<button class="btn btn-danger" onclick="khach_hang_list('.$item['idMembers'].')">Xoá</button>
											</td>
                                            </tr>';
                                        }
                                    }
                                    else {
                                    echo "Khong tim thay ket qua!";
                                    }   
                                }
                            }
                            ?>
						</tbody>
					</table>
					<?php


?>
			<script type="text/javascript">
				function khach_hang_list(idMembers) {
					var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
					if(!option) {
						return;
					}

					console.log(idMembers)
					$.post('xoa.php', {
						'idMembers': idMembers,
						'action': 'delete'
					}, function(data) {
						location.reload()
					})
				}
			</script>
    	</div>
	<!-- new collection section end -->
	<!-- section footer start -->
   </body>

   <?php
		require_once('../footer.php')
   ?>
</html>