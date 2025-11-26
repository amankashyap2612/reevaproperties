<!DOCTYPE html>
<html lang="en">
<head>
<?php include('common/header_script.php'); ?>
<style>
.card-body{padding:30px;}
</style>
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <?php include('common/header.php'); ?>		
        <div class="app-main">
            <?php include('common/sidebar.php');?>

            <div class="app-main__outer">
                <div class="app-main__inner">
					<div class="mb-3 card">
					   <div class="card-header-tab card-header">
						  <div class="card-header-title">
							 Reeva User Profile
						  </div> 
					   </div>
					   <div class="card-body"> 
							<div class="main-card mb-3 card">
							   <div class="card-body"> 
								  <form id="signupForm" class="form-submit" method="post" action="<?= site_url('members/user/update_user_info'); ?>" class="col-md-10 mx-auto" method="post"    >
									<div class="row">
										<div class="col-md-4 col-12">
											<div class="form-group">
												<label for="firstname">MemberID</label>
												<div> 
												   <input type="text" name="memberid" value="<?= $emp_info->member_user_id;?>" class="form-control" disabled>
												</div>
											 </div>
										</div>
										<div class="col-md-4 col-12">
											<div class="form-group">
												<label for="firstname">First name</label>
												<div> 
												   <input type="text" name="f_name" value="<?= $emp_info->f_name;?>" class="form-control">
												</div>
											 </div>
										</div>
										<div class="col-md-4 col-12">
											<div class="form-group">
												<label for="firstname">Last name</label>
												<div> 
												   <input type="text" name="l_name" value="<?= $emp_info->l_name;?>" class="form-control">
												</div>
											 </div>
										</div>
										<div class="col-md-4 col-12">
											<div class="form-group">
												<label for="username">Contact</label>
												<div>
												  <input type="text" name="contact" value="<?=$emp_info->contact;?>" class="form-control" placeholder="Enter Contact Number">
												</div>
											 </div>
										</div>
										<div class="col-md-4 col-sm-12 form-group ">
											<label>Office Location *</label>
											<select class="form-control" name="office">
												<option   value="" >select Office</option>
												<option value="Narela" <?= (($emp_info->office == "Narela")?'selected':''); ?>      >Narela</option>
												<option value="Nangloi" <?= (($emp_info->office == "Nangloi")?'selected':''); ?>    >Nangloi</option>
												<option value="Azadpur"  <?= (($emp_info->office == "Azadpur")?'selected':''); ?>  >Azadpur</option> 
											</select>
										</div>
										<div class="col-md-4 col-12">
											<div class="form-group"> 
												<label for="username">Status</label>
												<div>
												   <select name="status" class="form-control">
														<option value="A" <?= (($emp_info->status == "A")?'selected':''); ?> >Activate</option>
														<option value="D" <?= (($emp_info->status == "D")?'selected':''); ?> >Deactivate</option>
													</select>
												</div>
											 </div>
										</div>
									</div> 
									<div class="form-group">
										<?php if(in_array('2',$other_action)){ ?>
											<!--<input type="hidden" name="user_id" value="<?= isset($user_id)?$user_id:''; ?>">-->
											<input type="hidden" name="user_id" value="<?= $emp_info->id;?>">
											<input id="csrf-token" type="hidden" name="<?= csrf_token();?>" value="<?= csrf_hash(); ?>"> 
											<button type="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block" name="signup" value="Sign up"   data-loading-text="Please Wait..!">Update</button>
										<?php } ?>
									</div>
								  </form>
							   </div>
							</div>
						</div> 
					  </div>
				</div>
				<?php if(in_array('3',$other_action)){ ?>
				<div class="app-main__inner">
					<div class="mb-3 card">
					   <div class="card-header-tab card-header">
						  <div class="card-header-title">
							Change Password
						  </div> 
					   </div>
					   <div class="card-body"> 
							<div class="main-card mb-3 card">
							   <div class="card-body"> 
								  <form class="form-submit" method="post" action="<?= site_url('members/user/update_user_password'); ?>">
									<div class="row form-group">
										<div class="col-md-6 col-12">
											<label>New Password</label>
											<input type="text" name="new_password" class="form-control">
										</div>
										<div class="col-md-6 col-12">
											<label>Confirm Password</label>
											<input type="text" name="con_password" class="form-control">
										</div>
									</div> 
									<div class="row form-group">
										<div class="col-md-12">
										<?php if(in_array('2',$other_action)){ ?>
											<input type="hidden" name="user_id" value="<?= $emp_info->id;?>">
											<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
											<button type="submit" class="mb-2 mr-2 btn-pill btn-hover-shine btn btn-warning btn-block" data-loading-text="Please Wait..!" >Change Password</button>
										<?php } ?>
										</div>
									</div>
								 </form>
							   </div>
							</div>
						</div> 
					 </div>
				</div>
				<?php } ?>
				<?php if(in_array('4',$other_action)){ ?>
				<div class="app-main__inner">
					<div class="mb-3 card">
					   <div class="card-header-tab card-header">
						  <div class="card-header-title">
							Nominee Details
						  </div> 
					   </div>
					   <div class="card-body"> 
							<div class="main-card mb-3 card">
								<div class="table-responsive">
								  <table class="align-middle mb-0 table table-borderless table-striped table-hover">
									 <thead>
										<tr>
										   <th class="text-center">#</th>
										   <th>Name</th>
										   <th class="text-center">DOB</th>
										   <th class="text-center">Contact</th> 
										   <th class="text-center">Relation</th> 
										   <th class="text-center">Actions</th>
										</tr>
									 </thead>
									 <tbody>
										<?php  $count = 1;if(isset($nominee_info)){ foreach($nominee_info as $nom){ ?>
											<tr>
											   <td class="text-center text-muted"><?= $count++;?></td>
											   <td>
												  <div class="widget-content p-0">
													 <div class="widget-content-wrapper">
														 <div class="widget-content-left flex2">
														   <div class="widget-heading"><?= ucfirst($nom->name); ?></div> 
														</div>
													 </div>
												  </div>
											   </td>
											   <td class="text-center"><?= $nom->dob;?></td>
											   <td class="text-center"> 
												  <div class="widget-heading"><?= $nom->contact;?></div>
											   </td>
											   <td class="text-center"> 
												  <div class="widget-heading"><?=  ucfirst($nom->relation);?></div>
											   </td> 
											   <td class="text-center">
												  <button type="button" class="btn mr-2 mb-2 btn-primary edit_nominee" data-toggle="modal" data-target=".bd-example-modal-lg"   
												  data-nominee_id="<?= $nom->id;?>"
												  data-nominee_name="<?= $nom->name;?>"  data-nominee_contact="<?= $nom->contact;?>" data-nominee_relation="<?= $nom->relation;?>"    data-nominee_dob="<?= $nom->dob;?>"    >Update Nominee</button>
											   </td>
											</tr>
										<?php }  } ?> 
									 </tbody>
								  </table>
							   </div> 
							</div>
						</div> 
					  </div>
				</div>
				<?php } ?>
				<?php if(in_array('5',$other_action)){ ?>
				<div class="app-main__inner">
					<div class="mb-3 card">
					   <div class="card-header-tab card-header">
						  <div class="card-header-title">
							Change Member User Id
						  </div> 
					   </div>
					   <div class="card-body"> 
							<div class="main-card mb-3 card">
								<form class="form-submit m-3" action="<?= site_url('members/user/update_member_user_id'); ?>" method="post">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<label class="mb-2">  Member Id</label>
											<input name="member_user_id" class="form-control"/>
										</div>
										<div class="col-md-12 col-sm-12 mt-3  ">
											<input type="hidden" name="user_id" value="<?= $emp_info->id;?>">
											<input id="csrf-token" type="hidden" name="<?= csrf_token();?>" value="<?= csrf_hash(); ?>">
											<button type="submit" class="btn btn-primary  "   data-loading-text="Please Wait..!" >Change Member Id</button>
										</div>
									</div>
								</form>
							</div>
						</div> 
					  </div>
				</div>
				<?php } ?>
            </div>
		</div>
    </div>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	   <div class="modal-dialog modal-lg">
		  <div class="modal-content">
			 <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			 </div>
			 <div class="modal-body">
				 <form id="signupForm" class="form-submit" method="post" action="<?= site_url('members/user/update_nominee_info'); ?>" class="col-md-10 mx-auto" method="post"    >
					<div class="row">
						<div class="col-md-6 col-sm-12 form-group ">
							<label>Nominee Name</label>
							<input type="text" name="edt_nominee" class="form-control" />
						</div>
						<div class="col-md-6 col-sm-12 form-group ">
							<label>Nominee Mobile</label>
							<input type="text" name="edt_nominee_mobile" class="form-control" placeholder="Nominee Mobile"  />
						</div>
						<div class="col-md-6 col-sm-12 form-group ">
							<label>Relation</label>
							<select name="edt_relation" class="form-control">
								<option value="">Choose Relation</option>
								<option value="parents">Parents</option>
								<option value="grand_parents">Grand Parents</option>
								<option value="son">Son</option>
								<option value="daughter">Daughter</option>
								<option value="sister">Sister</option>
								<option value="husband">Husband</option>
								<option value="wife">Wife</option>
								<option value="brother">Brother</option>
								<option value="cousin">Cousin</option>
								<option value="friend">Friend</option>
								<option value="nephew">Nephew</option>
								<option value="uncle">Uncle</option>
								<option value="aunty">Aunty</option>
							</select>
						</div> 
						<div class="col-md-6 col-sm-12 form-group ">
							<label>Nominee DOB</label>
							<input type="date" name="edt_nominee_dob" class="form-control" placeholder="Nominee DOB" />
						</div>
					</div>
					<div class="form-group">
						<?php if(in_array('2',$other_action)){ ?> 
							<input type="hidden" name="edt_nominee_id" value="">
							<input id="csrf-token" type="hidden" name="<?= csrf_token();?>" value="<?= csrf_hash(); ?>"> 
							<button type="submit" class="mb-2 mr-2 btn btn-primary btn-lg btn-block" name="signup" value="Sign up"   data-loading-text="Please Wait..!">Update Nominee</button>
						<?php } ?>
					</div>
				  </form>
			 </div> 
		  </div>
	   </div>
	</div>
	
	
<!--End Add Home Slide-->
	<div class="app-drawer-overlay d-none animated fadeIn"></div> 
	<?php include('common/footer_script.php'); ?>
	<script>
	$(function(){
		$('.edit_nominee').on('click',function(){
			var id = $(this).data('nominee_id');
			var nominee_name = $(this).data('nominee_name');
			var nominee_relation = $(this).data('nominee_relation');
			var nominee_dob = $(this).data('nominee_dob');
			var nominee_contact = $(this).data('nominee_contact'); 
			console.log(nominee_relation);
			$('input[name=edt_nominee_id]').attr('value',id);
			$('input[name=edt_nominee]').attr('value',nominee_name);
			$('input[name=edt_nominee_mobile]').attr('value',nominee_contact);
			$('input[name=edt_nominee_dob]').attr('value',nominee_dob);
			$('select[name="edt_relation"]').find('option[value="'+nominee_relation+'"]').attr("selected",true);
			
			
		});
		
	})
	
	
	
	
	
	
	$( "#accordion" ).accordion({
		  collapsible: true,
		  heightStyle: "content"
		});
	</script>
</body>
</html>