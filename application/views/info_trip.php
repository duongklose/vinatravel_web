<!DOCTYPE html>
<html>
<head>
    <title>Quản lý chuyến đi</title>
    <link rel="stylesheet" href="/vinatravel/application/assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="/vinatravel/application/assets/datatables.css" rel="stylesheet" type="text/css">
</head>
<body>
<section class="header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-8 col-md-2 align-self-center" style="display: flex;">
					<img src="/vinatravel/application/images/bus-ticket-icon.png" class="header__logo display-inline-block">
                    <p class="display-inline-block align-self-center appname">VINATRAVEL</p>
				</div>
				<div class="col-1 col-md-8 align-self-center">
                    <nav>
                        <ul class="nav justify-content-center header__menu">
                            <li class="nav-item">
                                <a class="nav-link active" href="/vinatravel/home">Quản lý chuyến đi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../manage_coach">Quản lý xe</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Quản lý vé</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Thống kê</a>
                            </li>
                        </ul>
                    </nav>
				</div>
				<div class="col-3 col-md-2 align-self-center">
                    <a href="home/logout">Đăng xuất</a>
				</div>
			</div>
		</div>
	</section>
    <section class="content">
        <div class="container my-md-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg-12">
                    <h3>Thông tin vé đã đặt</h3>
                    <?php echo $this->session->flashdata('msg');?>
                    <a href="<?php echo site_url('home/add_ticket/') .$tripId;?>" class="btn btn-success btn-sm">Thêm vé thủ công</a><hr/>
                    <table class="table table-striped" id="mytable" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ghế ngồi</th>
                                <th>Số điện thoại khách</th>
                                <th>Điểm đón</th>
                                <th>Điểm xuống</th>
                                <th>Hình thức thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                foreach ($tripInfo as $row):
                                    $no++;
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->seat_name;?></td>
                                <td><?php echo $row->phone;?></td>
                                <td><?php echo $row->startLocation;?></td>
                                <td><?php echo $row->endLocation;?></td>
                                <td><?php echo $row->payment_method;?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/vinatravel/application/assets/datatables.js"></script>
    <!-- <script type="text/javascript">
        $(document).ready(function(){
            $('#mytable').DataTable();
        });
    </script> -->
</body>
</html>