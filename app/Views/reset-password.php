<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
	<?php include("default/header_script.php"); ?>
	<style {csp-style-nonce}>
		.captcha_code{
			height: 35px;
			width:90%;
		}
    </style>
</head>
<body class="stretched">
	<div id="wrapper" class="clearfix">
		
		
		<section>
			<div class="container mt-5">
				<div class="row">
					<div class="<?=($info->form == "Y")?"col-md-9":"col-md-12"?> justify">
					<?php if($valid){ ?>
					
						<div class="accordion accordion-lg mx-auto mb-0 clearfix" style="max-width: 550px;">
							<div class="accordion-header">
								<div class="accordion-icon">
									<i class="accordion-closed icon-lock3"></i>
									<i class="accordion-open icon-unlock"></i>
								</div>
								<div class="accordion-title">
									Reset Password
								</div>
							</div>
							<div class="accordion-content clearfix">
								<form class="row mb-0 form-submit" action="<?=site_url("form/reset-password");?>" method="post">
									<div class="col-12 form-group">
										<label for="login-form-username">New Password:</label>
										<input type="password" id="login-form-username" name="password" value="" class="form-control" />
									</div>

									<div class="col-12 form-group">
										<label for="login-form-password">Confirm Password:</label>
										<input type="password" id="login-form-password" name="cpassword" value="" class="form-control" />
									</div>
									
									<div class="col-12 form-group">
										<div class="row">
											<div class="col-md-6">
												<img src="" class="captcha_code">
												<i class="icon-reload refresh_captcha"></i>
											</div>
											<div class="col-md-6">
												<input type="text" name="captcha_code" class="form-control" placeholder="Enter Captcha">
											</div>
										</div>
									</div>

									<div class="col-12 form-group">
										<input type="hidden" name="response" value="<?=$response;?>">
										<input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<button class="button button-3d button-black m-0" type="submit" data-loading-text="Please wait..!">Apply</button>
									</div>
								</form>
							</div>
						</div>
					<?php }else{ ?>
						<div class="text-center">
							<p class="bg-info text-dark p-2"><b>Note:</b> Password reset link has been expired. Please try it again.</p>
						</div>
					<?php } ?>
					</div>
					<?php if($info->form == "Y"){ ?>
					<div class="col-md-3">
						<?php include("form/contact.php"); ?>
					</div>
					<?php } ?>
				</div>
			</div>
		</section>
		
		
		<?php include("default/footer.php"); ?>
	</div><!-- #wrapper end -->
	<?php include("default/footer_script.php"); ?>
	<script>
	$(document).ready(function(){
		$(".captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
		
		$(".refresh_captcha").on("click",function(){
			$(".captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
		});
	});
	</script>
</body>
</html>