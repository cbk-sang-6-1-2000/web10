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
  	<div class="collection_text" style =";font-size: 30px;font-family: 'Times New Roman', Times, serif; padding : 15px 0px; margin-top: 106px">Qu???n L?? H??a ????n</div>
	  <div class="panel-body">

				<div>
            		<form action="timkiem.php" method="post" style="width: 500px;display: inline-block;padding: 20px;">
                		Search: <input type="text" name="search" />
                		<input type="submit" name="ok" value="search" />
            		</form>
				</div>
					<table class="table table-bordered table-hover" style ="text-align: center; width: 90%; margin: auto; font-weight: 900; margin-bottom: 25px; border: 5px solid;">
						<thead>
							<tr>
                                <th width="50px">STT</th>
                                <th>H??nh ???nh</th>
                                <th>T??n kh??ch h??ng</th>
                                <th>S??? ??i???n tho???i</th>
                                <th>T??n d???ch v??? ????ng k??</th>
                                <th>T???ng Gi?? d???ch v???</th>
                                <th>T??n G??i t???p</th>
                                <th>Gi?? G??i t???p</th>
                                <th>t???ng ti???n</th>
                                <th>Ng??y</th>
								<th>Tr???ng th??i</th>
                                <th width="50px"></th>
                                <th width="50px"></th>
                                <th width="50px"></th>
							</tr>
						</thead>
						<tbody>
                        <?php
                            $sql = 'select h.idRevenue,m.idMembers,m.picture,userent.id,m.Name,m.NumberPhone,rent.RentName,sum(rent.pricedv) as tong,gymcard.CardName,gymcard.price,h.total,h.Time ,IF(m.Status = 1,"???? thanh to??n","ch??a thanh to??n") as tt
							from members m LEFT JOIN revenue h ON m.idMembers = h.idMembers LEFT JOIN userent ON userent.idMembers = m.idMembers LEFT JOIN rent ON userent.idRent = rent.idRent LEFT JOIN gymcard on m.idCard = gymcard.idCard 
							GROUP BY m.idMembers';
                            $pt_list = executeResult($sql);
                            $index = 1;
                            foreach ($pt_list as $item) {
                                echo '<tr>
                                            <td>'.($index++).'</td>
                                            <td><img src="'.$item['picture'].'" style = "max-width : 100px"/></td>
                                            <td>'.$item['Name'].'</td>
                                            <td>'.$item['NumberPhone'].'</td>
                                            <td>'.$item['RentName'].'</td>
                                            <td>'.$item['tong'].'</td>
                                            <td>'.$item['CardName'].'</td>
                                            <td>'.$item['price'].'</td>
                                            <td>'.$item['total'].'</td>
                                            <td>'.$item['Time'].'</td>
											<td><button style="background-color: green">'.$item['tt'].'</button></td>
                                            <td>
                                                <a href="sua.php?KH='.$item['idRevenue'].'"><button class="btn btn-warning">S???a</button></a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger" onclick="pt_list('.$item['idRevenue'].')">Xo??</button>
                                            </td>
                                            <td>
                                                <a href="them.php?KH='.$item['idMembers'].'"><button class="btn btn-warning">Ti???n</button></a>
                                            </td>
                                        </tr>';
                            }
                            ?>
						</tbody>
					</table>
                    <script type="text/javascript">
                    function pt_list(idRevenue) {
                        var option = confirm('B???n c?? ch???c ch???n mu???n xo?? danh m???c n??y kh??ng?')
                        if(!option) {
                            return;
                        }

                        console.log(idRevenue)
                        $.post('xoa.php', {
                            'idRevenue': idRevenue,
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
