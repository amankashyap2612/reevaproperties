<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="icon"   href="<?= base_url('assets/')?>images/Reeva_Developers.png">
    <title>Reeva Developers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
	<link href="<?= base_url('assets/include/css/style.css');?>" rel="stylesheet">
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
                    <div class="mx-auto app-login-box col-md-5">
						<div class="h5 text-center">
							<h4 class="mt-2"> REEVA WEB-Admin Login </h4>
						</div>
						<form class="login-form-submit" action="<?= site_url('adminlogin');?>" method="post">
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
	<!-- JavaScripts
	============================================= -->
	<!-- JavaScripts
	============================================= -->
	<?php include('common/footer_script.php'); ?>
	<script {csp-script-nonce}>
		$(document).ready(function(){
			$("#captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
			
			$(".refresh_captcha").on("click",function(){
				$("#captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
			});
			
			$('.login-form-submit').submit(function(e){
                e.preventDefault();
                var frm = $(this);
        		var form_btn = $(frm).find('button[type="submit"]');
        		var form_result_div = '#form-result';
        		$(form_result_div).remove();
        		form_btn.before('<div id="form-result" class="alert alert-success d-none" role="alert"></div>');
        		var form_btn_old_msg = form_btn.html();
        		form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                var csrf = frm.find('input[name='+ csrf_token +']').val();
                if(csrf && csrf.length > 5)
                {
                    $.ajax({
                        url: frm.attr('action'),
                        data: new FormData(this),
                        type: 'post',
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(result){
                            update_token(result);
        					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
                            if(result.success == true){
                                $(frm).find('.form-control').val('');
                                form_btn.prop('disabled', false).html(form_btn_old_msg);
                                if(result.rlink){
                                    window.location.href = result.rlink;
                                }else if(result.alert1){
                                    $("#captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
                                    $(form_result_div).html(result.alert1).fadeIn('slow');
                                    setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                                }else{
                                    location.reload();
                                }
                            }else{
                                form_btn.prop('disabled', false).html(form_btn_old_msg);
                                var error = '';
                                $.each(result.message, function(key,value){
                                    var inpt = frm.find('input[name='+key+'], textarea[name='+key+'], select[name='+key+']');
                                    if(value.length > 2){
                                        if(result.border == true){
                                            inpt.addClass('border-danger');
                                            error = error+', '+value;
                                        }else{
                                            inpt.addClass('border-danger').before(value);
                                        }
                                    }
                                });
                                $("#captcha_code").attr("src",'<?=site_url("catch_captcha");?>');
                                $(form_result_div).html(error).fadeIn('slow');
                                setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                            }
                        }
                    });
                }
            });
		});
	</script>
</body>
</html>
