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
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                <form action="/vinatravel/home/filterStatistics" method="post">
                    <table>
                        <tr>
                            <td class="paddingB-10"><div style="font-weight: bold;width:130px">Thống kê theo:</div></td>
                            <td>
                                <div class="input-group" style="width:300px">
                                    <select class="form-control custom-select input-field" name="filter" id="filter" required>
                                        <option value="month">Tháng</option>
                                        <option value="year">Năm</option>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="submit" value="Lọc" class="btn btn-info" style="width:100px">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="col-3">
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-12">
                <table class="table table-striped" id="mytable" style="font-size: 14px; margin-top: 1rem;">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Số chuyến đi</th>
                            <!-- <th>Số vé bán ra</th>
                            <th>Số vé bán được</th> -->
                            <th>Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($d as $row):?>
                        <tr>
                            <td><?php
                                if($type == 'year'){
                                    echo $row->y;
                                }
                                else{
                                    echo $row->m ."/" .$row->y;
                                }
                            ?></td>
                            <td><?php echo $row->num;?></td>
                            <td><?php echo $row->p;?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
	</section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>