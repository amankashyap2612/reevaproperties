<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MLM MLM-admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no"> 
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
                                <div>MLM User Access</span>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">MLM User Access</a></li>
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
						<div class="col-md-12">
							<form class="form-submit" method="post" action="<?= site_url('mlm-admin/user/update_access'); ?>">
								<div id="accordion">
									<?php print_r($menu);foreach($menu as $tbgroup => $submenu){ ?>
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
										<input type="hidden" name="type_id" value="<?= isset($type_id)?$type_id:''; ?>">
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
										<option value="<?= $ut->id; ?>" <?= (($emp_info->user_type == $ut->id)?'selected':''); ?> ><?= $ut->name; ?></option>
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