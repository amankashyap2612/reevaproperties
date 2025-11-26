<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reeva Developers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<link href="<?= base_url('assets/include/')?>css/style.css" rel="stylesheet">
	<link rel="icon"   href="<?= base_url('assets/')?>images/Reeva_Developers.png">
	<style {csp-style-nonce}>
		#captcha_code{
			height: 35px;
			width:100%;
		}
		.app-login-box{
			background-color:#ffffff;
		}
    </style>
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-6 p-5">
						<div class="h5 text-center">
							<h4 class="mt-2"> REEVA MEMBERS </h4>
						</div>
						<form class="form-submit" action="<?= site_url('mlmlogin');?>" method="post">
							<div class="form-row">
								<div class="col-md-12">
									<div class="position-relative form-group">
										<label for="login-form-username">Username:</label>
										<input type="text" name="user_email" value="" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="position-relative form-group">
										<label for="login-form-password">Password:</label>
										<input type="password" name="user_pass" value="" class="form-control">
									</div>
								</div>
								<div class="col-md-12">
									<div class="position-relative form-group">
										<div class="row">
											<div class="col-md-6">
												<img src="" id="captcha_code">
											</div>
											<div class="col-md-6">
												<input type="text" name="captcha_code" class="form-control" placeholder="Enter Captcha">
											</div>
										</div>
									</div>
								</div>
 								<div class="col-md-12">
									<div class="position-relative form-group">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<button class="btn btn-primary form-control" type="submit" data-loading-text="Please Wait..!">Login</button>
									</div>
								</div>
							</div>
						</form>
                    </div>
                </div>
            </div>
        </div>
    </div> 
	<?php include('common/footer_script.php'); ?>
	<script {csp-script-nonce}>
		$(document).ready(function(){
			$("#captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
			
			$(".refresh_captcha").on("click",function(){
				$("#captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
			});
			
			
		});
	</script>
</body>
</html>
