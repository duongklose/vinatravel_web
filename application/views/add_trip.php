<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VinaTravel - Trang chủ</title>
    <link rel="stylesheet" href="../application/assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Quản lý chuyến đi</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" style="color:#000; font-weight:normal;" href="add_trip">Thêm chuyến đi</a>
                                    <a class="dropdown-item" style="color:#000; font-weight:normal;" href="update_trip">Cập nhật chuyến đi</a>
                                </div>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link active" href="../home">Quản lý chuyến đi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../home/manage_coach">Quản lý xe</a>
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
                    <a href="logout">Đăng xuất</a>
				</div>
			</div>
		</div>
	</section>
    <section class="content">
		<div class="container my-md-5">
        <div class=row>
            <h2>Thêm chuyến đi</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->session->flashdata('msg');?>
            </div>
            <div class="col-md-6">
                <form action="addTrip" method="post">
                    <table>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Chọn xe:</span></td>
                            <td>
                                <div class="input-group">
                                    <select class="custom-select input-field" id="inputGroupSelect02" name="coach">
                                        <option selected>Chọn xe...</option>
                                        <?php foreach($coaches as $row):?>
                                        <option value="<?php echo $row->id_coach;?>"><?php echo $row->license_plate;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Địa điểm xuất phát:</span></td>
                            <td>
                                <div class="input-group">
                                    <select class="form-control custom-select input-field" name="startLocation" id="startLocation" required>
                                        <option value="">Chọn địa điểm xuất phát...</option>
                                        <?php foreach($provinces as $row):?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                        <?php endforeach;?>
                                    </select>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Địa điểm kết thúc:</span></td>
                            <td>
                                <div class="input-group">
                                    <select class="custom-select input-field" id="inputGroupSelect02" name="endLocation">
                                        <option selected>Chọn địa điểm kết thúc...</option>
                                        <?php foreach($provinces as $row):?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Ngày giờ xuất phát:</span></td>
                            <td>
                                <input type="datetime-local" id="departuretime" name="starttime" class="input-field">
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Thời gian di chuyển(h):</span></td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="timeToGo" placeholder="VD: 4.5, 3,...">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Giá vé(VNĐ):</span></td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="price" placeholder="VD: 780000, 210000,...">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="Thêm" class="btn btn-info">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-md-3"></div>
	</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>