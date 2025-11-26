<!DOCTYPE html>
<html lang="en">
<head> 
    <meta name="msapplication-tap-highlight" content="no">
	 <?php include('common/header_script.php'); ?>
	 <link rel="stylesheet" href="<?= base_url('assets/')?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/')?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/')?>css/magnific-popup.css" type="text/css" />	<link rel="stylesheet" href="<?= base_url('assets/')?>css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url('assets/')?>css/dark.css" type="text/css" />
	 <style>.card-body{margin-top:20px;}</style>
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <?php include('common/header.php'); ?>		
        <div class="app-main">
            <?php include('common/sidebar.php');?>

            <div class="app-main__outer">
                <div class="app-main__inner">
					<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div> Member Chain</div>
                            </div> 
                        </div>
                    </div>
					
					<div class="tabs-animation">
					<?php if(in_array("1",$other_action)){ ?>
						<form action="<?=site_url('members/team_detail');?>" method="get">
							<div class="row">
								<div class="col-md-4 mb-2">
									<input type="text" class="form-control" name="userid" value="<?=$user_id;?>" placeholder="User ID : RDXXXX">
								</div>
								<div class="col-md-4  mb-2">
									<select class="form-control" name="status">
										<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
										<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
									</select>
								</div>
								<div class="col-md-4 mb-2"> 
									<input type="submit" class="form-control btn btn-success" value="Fetch">
								</div>
								
							</div>
						</form>
					<?php } ?>
						<div class="row">
							<div class="col-md-12">
								<h2 class="bg-warning text-white fs-4 p-2 mb-0">Member Name: <?=isset($member->id)?$member->f_name.' '.$member->l_name:'';?></h2>
							</div>
						</div>
						<div class="card-body"> 
							<div class="row">
							<?php $i=1; foreach($emp as $em){ ?>
								<div class="col-md-4">
									<div class="card-shadow-primary profile-responsive card-border mb-3 card     " >
									   <div class="dropdown-menu-header">
										  <div class="dropdown-menu-header-inner bg-info">
											 <div class="menu-header-image opacity-2" style="background-image: url('<?= base_url('images/' . (isset($image_detail[$em->img_id]) ? $image_detail[$em->img_id] : 'mlm_user_profile/reeva_avatar.jpg')); ?>')"></div>
											 <div class="menu-header-content btn-pane-right">
												<div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
												   <div class="avatar-icon rounded">
													  <img src="<?= base_url('images/' . (isset($image_detail[$em->img_id]) ? $image_detail[$em->img_id] : 'mlm_user_profile/reeva_avatar.jpg')); ?>" alt="Avatar 5">
												   </div>
												</div> 
												<div>
												   <h5 class="menu-header-title text-white h4 text-capitalize"><?= $em->f_name.' '.$em->l_name;?></h5>
												   <h6  class="text-white">Member Id :-  <?= $em->member_user_id;?></h6>
												   <h6  class="text-white">Position:-  <?= $em->member_user_id;?></h6>
												</div>
												 
											 </div>
										  </div>
									   </div>
									   <div class="tab-content">
										  <div class="tab-pane active show" id="tab-example-161">
											 <ul class="list-group list-group-flush">
												<li class="list-group-item p-0">
												   <div class="widget-content">
													  <div class="text-center">
														 <div class="d-flex ">
															<h5 class="widget-heading opacity-4 text-warning opacity-100"> Totals Members : - <?= $em->member_count;?></h5>
															<h5 class="widget-heading opacity-4  text-warning opacity-100"> Direct Sale  : - <?= $em->direct_sale;?></h5>
															<h5 class="widget-heading opacity-4  text-warning opacity-100"> Group Sale  : - <?= $em->group_sale;?></h5>
														 </div>
														 <h5><span class="pr-2"><a href="#"><i class="icon-call"></i> <?= $em->contact;?></a></span>, 
															<span><a href="#"><i class="icon-email"></i> <?= $em->email_id;?></a></span>
														 </h5>
													  </div>
												   </div>
												</li>  
											 </ul>
										  </div> 
										  <a href="<?=site_url('members/team_detail');?>?userid=<?=$em->member_user_id;?>" class=" btn btn-primary btn-block">View Members</a>
									   </div>
									</div>
								 
								</div> 
							<?php } ?>
							</div>   
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="app-drawer-overlay d-none animated fadeIn"></div>
	<?php include('common/footer_script.php'); ?>
 
 
</body>
</html>