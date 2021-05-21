<!DOCTYPE html>
<html>
<head>
    <title>Quản lý chuyến đi</title>
    <link rel="stylesheet" href="./application/assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="./application/assets/datatables.css" rel="stylesheet" type="text/css">
</head>
<body>
<section class="header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-8 col-md-2 align-self-center" style="display: flex;">
					<img src="./application/images/bus-ticket-icon.png" class="header__logo display-inline-block">
                    <p class="display-inline-block align-self-center appname">VINATRAVEL</p>
				</div>
				<div class="col-1 col-md-8 align-self-center">
                    <nav>
                        <ul class="nav justify-content-center header__menu">
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Quản lý chuyến đi</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" style="color:#000; font-weight:normal;" href="home/add_trip">Thêm chuyến đi</a>
                                    <a class="dropdown-item" style="color:#000; font-weight:normal;" href="home">Cập nhật chuyến đi</a>
                                </div>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Quản lý chuyến đi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Quản lý xe</a>
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
                    <h3>Danh sách chuyến đi</h3>
                    <?php echo $this->session->flashdata('msg');?>
                    <a href="<?php echo site_url('home/add_trip');?>" class="btn btn-success btn-sm">Thêm chuyến đi</a><hr/>
                    <table class="table table-striped" id="mytable" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Xe</th>
                                <th>Điểm đi</th>
                                <th>Điểm đến</th>
                                <th>Thời gian đi</th>
                                <th>Thời gian đến</th>
                                <th>Giá vé</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                foreach ($trips as $row):
                                    $no++;
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->license_plate;?></td>
                                <td><?php echo $row->departure_location;?></td>
                                <td><?php echo $row->arrival_location;?></td>
                                <td><?php echo $row->departure_time;?></td>
                                <td><?php echo $row->arrival_time;?></td>
                                <td><?php echo $row->price;?></td>
                                <td>
                                    <!-- <a href="" class="btn btn-sm btn-info">Edit</a> -->
                                    <a href="<?php echo 'home/delete_trip/'.$row->id_trip?>" class="btn btn-sm btn-danger">Delete</a>
                                </td>
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
    <script type="text/javascript" src="./application/assets/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mytable').DataTable();
        });
    </script>
</body>
</html>