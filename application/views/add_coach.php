<?php

?>
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
                    <a href="../home/logout">Đăng xuất</a>
				</div>
			</div>
		</div>
	</section>
    <section class="content">
		<div class="container my-md-5">
        <div class=row>
            <h2>Thêm xe</h2>
        </div>
        <div class="row">
            <div class="col-md-3">
                <?php echo $this->session->flashdata('msg');?>
            </div>
            <div class="col-md-6">
                <form action="addCoach" method="post">
                    <table>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Chọn loại xe:</span></td>
                            <td>
                                <div class="input-group">
                                    <select class="custom-select input-field" id="inputGroupSelect02" name="type" require>
                                        <option selected>Chọn loại xe...</option>
                                        <?php foreach($type as $row):?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Số chỗ ngồi:</span></td>
                            <td>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="numOfSeats" placeholder="VD: 40, 42,..." require>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Biển số xe:</span></td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="licensePlate" placeholder="VD: 30B 079.99,..." require>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="paddingR-10"><span style="font-weight: bold;">Mô tả thêm:</span></td>
                            <td>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="description" placeholder="Ghi chú">
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