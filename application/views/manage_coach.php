<!DOCTYPE html>
<html>
<head>
    <title>Quản lý xe</title>
    <link rel="stylesheet" href="../application/assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../application/assets/datatables.css" rel="stylesheet" type="text/css">
</head>
<body>
<section class="header">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-8 col-md-2 align-self-center" style="display: flex;">
					<img src="../application/images/bus-ticket-icon.png" class="header__logo display-inline-block">
                    <p class="display-inline-block align-self-center appname">VINATRAVEL</p>
				</div>
				<div class="col-1 col-md-8 align-self-center">
                    <nav>
                        <ul class="nav justify-content-center header__menu">
                            <li class="nav-item">
                                <a class="nav-link active" href="../home">Quản lý chuyến đi</a>
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
                    <a href="../home/logout">Đăng xuất</a>
				</div>
			</div>
		</div>
	</section>
    <section class="content">
        <div class="container my-md-5">
            <div class="row justify-content-md-center">
                <div class="col col-lg-12">
                    <h3>Danh sách xe</h3>
                    <?php echo $this->session->flashdata('msg');?>
                    <a href="<?php echo site_url('home/add_coach');?>" class="btn btn-success btn-sm">Thêm xe</a><hr/>
                    <table class="table table-striped" id="mytable" style="font-size: 14px;">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Biển số xe</th>
                                <th>Số chỗ ngồi</th>
                                <th>Loại xe</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 0;
                                foreach ($coaches as $row):
                                    $no++;
                            ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $row->license_plate;?></td>
                                <td><?php echo $row->num_of_seats;?></td>
                                <td><?php echo $row->type;?></td>
                                <td><?php 
                                    if($row->description != NULL){
                                        echo $row->description;
                                    }else{
                                        echo "";
                                    }
                                ?></td>
                                <td>
                                    <!-- <a href="" class="btn btn-sm btn-info">Edit</a> -->
                                    <?php
                                    echo "<a class='btn btn-sm btn-danger' onclick=\"return confirm('Khi xóa xe, mọi dữ liệu về vé, các chuyến đi cũng bị xóa. Bạn có chắc chắn xóa xe này?')\" href=\"../home/delete_coach/".$row->id_coach."\">Xóa</a>";?>
                                    <!-- <a href="<?php echo '../home/delete_coach'.$row->id_coach?>" class="btn btn-sm btn-danger">Delete</a> -->
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
    <script type="text/javascript" src="../application/assets/datatables.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#mytable').DataTable();
        });
    </script>
</body>
</html>