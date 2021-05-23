<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VinaTravel - Trang chủ</title>
    <link rel="stylesheet" href="/vinatravel/application/assets/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                                <a class="nav-link" href="/vinatravel/home/manage_coach">Quản lý xe</a>
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
                    <a href="/vinatravel/home/logout">Đăng xuất</a>
				</div>
			</div>
		</div>
	</section>
    <section class="content">
		<div class="container my-md-5">
        <div class=row>
            <h2>Thêm vé</h2>
        </div>
        <div class="row">
            <div class="col-3">
                <?php echo $this->session->flashdata('msg');?>
            </div>
            <div class="col-6">
                <form action="<?php echo '/vinatravel/home/addTicket/' .$tripId;?>" method="post">
                    <table>
                        <tr><span style="font-weight: bold;">Số điện thoại khách hàng:</span><br></tr>
                        <tr>
                            <div class="input-group" style="margin-top:10px; margin-bottom:10px">
                                <input type="text" class="form-control" name="phone" placeholder="VD: 0123457890,...">
                            </div>
                        </tr>
                        <tr><span style="font-weight: bold;">Chọn chỗ:</span></tr>
                        <tr>
                            <div class="input-group mb-3" style="margin-top:10px;">
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width: 535px">
                                        <?php foreach($emptyseatA as $row):?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="chosenSeat[]" value="<?php echo $row->id_seat;?>"><?php echo $row->name;?>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width: 535px">
                                        <?php foreach($emptyseatB as $row):?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="chosenSeat[]" value="<?php echo $row->id_seat;?>"><?php echo $row->name;?>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width: 535px">
                                        <?php foreach($emptyseatC as $row):?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="chosenSeat[]" value="<?php echo $row->id_seat;?>"><?php echo $row->name;?>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="input-group-prepend">
                                    <div class="input-group-text" style="width: 535px">
                                        <?php foreach($emptyseatD as $row):?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="chosenSeat[]" value="<?php echo $row->id_seat;?>"><?php echo $row->name;?>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <tr>
                            <td class="paddingB-10"><span style="font-weight: bold;">Điểm đón:</span></td>
                            <td>
                                <div class="input-group" style="width:390px">
                                    <select class="form-control custom-select input-field" name="startLocation" id="startLocation" required>
                                        <option value="">Chọn địa điểm xuất phát...</option>
                                        <?php foreach($startLocation as $row):?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                        <?php endforeach;?>
                                    </select>

                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingB-10"><span style="font-weight: bold;">Điểm xuống:</span></td>
                            <td>
                                <div class="input-group" style="width:390px">
                                    <select class="custom-select input-field" id="endLocation" name="endLocation">
                                        <option selected>Chọn địa điểm kết thúc...</option>
                                        <?php foreach($endLocation as $row):?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Thành tiền(VNĐ):</span></td>
                            <td>
                                <div class="input-group" style="width:390px">
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
            <div class="col-3"></div>
	</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>