<!DOCTYPE html>
<html lang="en">
<head>
	<title>Absen Masuk - Magang SEA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/sea.png') ?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/util.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/main.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/bootstrap-clockpicker.min.css')?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ('assets/css/github.min.css')?>">
<!--===============================================================================================-->		

</head>
<body>
	<?php date_default_timezone_set("Asia/Jakarta");?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="row">
				<div class="column" style="margin-top: -30px;">
				<ul style="margin-bottom: 50px;" class="nav nav-tabs nav-justified login100-form" id="myTab" role="tablist">
	                <li class="nav-item">
	                    <a class="nav-link active" id="masuk-tab" href="<?php echo site_url('')?>">Absen Masuk</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" id="keluar-tab" href="<?php echo site_url('absen_keluar')?>">Absen Keluar</a>
	                </li>
	            </ul>
				<div style="margin-right: 120px;" class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url ('assets/images/sea.png')?>" alt="IMG">
				</div>
				</div>

				<div class="col-sm" style="margin-top: -30px;">

					<span style="margin-bottom: -30px;" class="login100-form-title">
						Absen Masuk
					</span>

					<ul class="nav nav-tabs nav-justified login100-form" id="myTab" role="tablist">
		                <li class="nav-item">
		                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#individu" role="tab" aria-controls="individu" aria-selected="true">Individu</a>
		                </li>
		                <li class="nav-item">
		                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#kelompok" role="tab" aria-controls="kelompok" aria-selected="false">Kelompok</a>
		                </li>
		            </ul>


		            		<div class="tab-content" id="myTabContent1">
                            <div class="tab-pane fade show active" id="individu" role="tabpanel" aria-labelledby="individu-tab">
                            <form class="login100-form validate-form" action="<?php echo base_url(). 'absen/insert'; ?>" method="post">
                            <div style="margin-top: 10px;" class="wrap-input100" data-validate = "Name is required">
								<input class="input100" type="text" name="nama" placeholder="Nama">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-user" aria-hidden="true"></i>
								</span>
							</div>

							<div class="wrap-input100" data-validate = "NIM is required">
									<input class="input100" type="text" name="nim" placeholder="NIM">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-address-card" aria-hidden="true"></i>
									</span>
								</div>

							<div class="wrap-input100 clockpicker">
								<input class="input100 form-control" name="jam1" value="<?php echo date("H:i");?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-clock-o fa-lg" aria-hidden="true"></i> 
								</span>
							</div>

							
							<div class="container-login100-form-btn">
								<button type="submit" class="btn login100-form-btn" value="individu">
									Submit
								</button>
							</div>
							</form>
                            </div>
                            <div class="tab-pane fade show" id="kelompok" role="tabpanel" aria-labelledby="kelompok-tab">
                            	<form class="login100-form validate-form" action="<?php echo base_url(). 'absen/insert'; ?>" method="post">
                                <div style="margin-top: 10px;" class="wrap-input100 " data-validate = "Name is required">
									<input class="input100" type="text" name="namaketua" placeholder="Nama Ketua">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<div style="margin-top: 5px;" class="wrap-input100 " data-validate = "Name is required">
									<input class="input100" type="text" name="nama1" placeholder="Nama Anggota 1">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<div style="margin-top: 5px;" class="wrap-input100 " data-validate = "Name is required">
									<input class="input100" type="text" name="nama2" placeholder="Nama Anggota 2">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="fa fa-user" aria-hidden="true"></i>
									</span>
								</div>

								<div class="wrap-input100 clockpicker">
								<input class="input100 form-control" name="jam2" value="<?php echo date("H:i");?>">
								<span class="focus-input100"></span>
								<span class="symbol-input100">
									<i class="fa fa-clock-o fa-lg" aria-hidden="true"></i> 
								</span>
								</div>								
								<div class="container-login100-form-btn">
									<button type="submit" class="btn login100-form-btn" value="kelompok">
										Submit
									</button>
								</div>
								</form>
                            </div>
                        </div>
					<div class="text-center p-t-12">
						<span class="txt1">
							An Admin?
						</span>
						<a class="txt2" href="<?php echo site_url('login')?>">
							Login Here
						</a>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>

	<script src="<?php echo base_url ('assets/js/jquery-3.3.1.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?php echo base_url ('assets/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/vendor/tilt/tilt.jquery.min.js')?>"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url ('assets/js/main.js')?>"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="<?php echo base_url ('assets/js//bootstrap-clockpicker.min.js')?>"></script> 
<script type="text/javascript">
$('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'Done'
});
</script>
<script type="text/javascript" src="<?php echo base_url ('assets/js/highlight.min.js')?>"></script> 
<script type="text/javascript">
hljs.configure({tabReplace: '    '});
hljs.initHighlightingOnLoad();
</script>
</body>
</html>