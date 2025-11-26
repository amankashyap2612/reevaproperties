<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('common/header_script.php'); ?>
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
                                <div>User Access</span>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">User Access</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					
					<?php if(in_array('1',$other_action)){ ?>
                            <div class="row">
								<div class="col-md-12">
									<input type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addUser" value="Add New">
								</div>
							</div>
					<?php } ?>
					<div class="row">
						<div class="col-md-5">
							<form class="form-submit" method="post" action="<?= site_url('web-admin/user/update_user_info'); ?>">
							<fieldset>
							<legend>User Information</legend>
								<div class="row form-group">
									<div class="col-md-6">
										<label>First Name</label>
										<input type="text" name="f_name" value="<?=$emp_info->f_name;?>" class="form-control">
									</div>
									<div class="col-md-6">
										<label>Last Name</label>
										<input type="text" name="l_name" value="<?=$emp_info->l_name;?>" class="form-control">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
										<input type="text" name="email" value="<?=$emp_info->email_id;?>" class="form-control" placeholder="Email Address">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-6">
										<select name="type" class="form-control">
										<?php foreach($user_type as $ut){ ?>
											<option value="<?= $ut->user_key; ?>" <?= (($emp_info->type == $ut->user_key)?'selected':''); ?> ><?= $ut->name; ?></option>
										<?php } ?>
										</select>
									</div>
									<div class="col-md-6">
										<select name="status" class="form-control">
											<option value="A" <?= (($emp_info->status == "A")?'selected':''); ?> >Activate</option>
											<option value="D" <?= (($emp_info->status == "D")?'selected':''); ?> >Deactivate</option>
										</select>
									</div>
								</div>
								<div class="row form-group">
									<div class="col-md-12">
									<?php if(in_array('2',$other_action)){ ?>
										<input type="hidden" name="user_id" value="<?= isset($user_id)?$user_id:''; ?>">
										<input id="csrf-token" type="hidden" name="<?= csrf_token();?>" value="<?= csrf_hash(); ?>">
										<button type="submit" class="btn btn-success form-control">Update</button>
									<?php } ?>
									</div>
								</div>
							</fieldset>
							</form>
							
							<div class="col-md-12">
								<h4>Change Password</h4>
								<hr>
								<form class="form-submit" method="post" action="<?= site_url('web-admin/user/update_user_password'); ?>">
									<div class="row form-group">
										<div class="col-md-12">
											<label>New Password</label>
											<input type="text" name="new_password" class="form-control">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-12">
											<label>Confirm Password</label>
											<input type="text" name="con_password" class="form-control">
										</div>
									</div>
									<div class="row form-group">
										<div class="col-md-12">
										<?php if(in_array('2',$other_action)){ ?>
											<input type="hidden" name="user_id" value="<?= isset($user_id)?$user_id:''; ?>">
											<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
											<button type="submit" class="btn btn-success form-control">Update</button>
										<?php } ?>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-md-7">
							<form class="form-submit" method="post" action="<?= site_url('web-admin/user/update_access'); ?>">
								<div id="accordion">
									<?php foreach($menu as $tbgroup => $submenu){ ?>
										<h3><i class="<?=$submenu['icon'];?>"></i> <?=$tbgroup;?></h3>
										<div>
										<?php 
											foreach($submenu['menu'] as $name => $prop){ 
											$oa = explode(',',$prop['other_action']);
										?>
											<div class="row">
												<div class="col-md-6">
													<input type="checkbox" name="tab[]" value="<?=$prop['id'];?>" <?php echo ((isset($user_access[$prop['id']]) && $user_access[$prop['id']]['status']=='A')?'checked':''); ?> > <?=$name;?>
												</div>
												<div class="col-md-6">
												<?php 
												if($oa[0] != null)
												{
													$uaoa = array();
													if(isset($user_access[$prop['id']]['other_action']))
													{
														$uaoa = explode(' ',$user_access[$prop['id']]['other_action']);
													}
													foreach($oa as $a){
														$toa = explode('|',$a);
														echo '<label><input type="checkbox" name="action['.$prop['id'].'][]" value="'.$toa[1].'" '.((in_array($toa[1],$uaoa)?'checked':'')).'> '.ucfirst($toa[0]).'</label> ';
														
													}
												}
												?>
												</div>
											</div>
										<?php } ?>
										</div>
									<?php } ?>
								</div>
								<div class="row">
									<div class="col-md-12">
									<?php if(in_array('2',$other_action)){ ?>
										<input type="hidden" name="user_id" value="<?= isset($user_id)?$user_id:''; ?>">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<button type="submit" class="btn btn-success form-control">Update</button>
									<?php } ?>
									</div>
								</div>
							</form>
						</div>
					</div>
               
				</div>	    
            </div>
        </div>
    </div>
<div class="modal fade" id="addUser" role="dialog">
	<div class="modal-dialog modal-lg modal-full">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add User </h4>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="tab-content">
					<form class="form-submit" method="post" action="<?= site_url('web-admin/user/add_user_info')?>">
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group" >
								<label>First Name</label>
								<input type="text" name="fname" class="form-control" placeholder="First Name">
							</div>
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control" placeholder="Last Name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group ">
								<label>Type</label>
								<select name="type" class="form-control">
									<?php foreach($user_type as $ut){ ?>
										<option value="<?= $ut->user_key; ?>" <?= (($emp_info->type == $ut->user_key)?'selected':''); ?> ><?= $ut->name; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6 col-sm-12 form-group ">
								<label>Email ID</label>
								<input type="email" name="email" class="form-control" placeholder="Email-ID">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group">
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control">Add User</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
<!--End Add Home Slide-->
	<div class="app-drawer-overlay d-none animated fadeIn"></div> 
	<?php include('common/footer_script.php'); ?>
	<script>
	$( "#accordion" ).accordion({
		  collapsible: true,
		  heightStyle: "content"
		});
	</script>
</body>
</html>