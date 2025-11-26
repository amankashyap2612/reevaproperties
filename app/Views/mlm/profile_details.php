<!DOCTYPE html>
<html lang="en">
<head> 
	<?php include('common/header_script.php'); ?>	 
<style>
</style>
 
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
                             
                        </div>
                    </div> 
					<div class="card p-3 shadow"  >
						<h2 class="text-center p-3">Profile Details </h2>
						 
						<div class="tab-content p-3 border bg-light" id="nav-tabContent">
							<div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<table class="table table-hover table-striped table-bordered">
								<thead>
									<tr>
										<th>Image</th> 
										<th>Name</th>  
										<th>User Id </th> 
										<th>Email Id</th> 
										<th>Office</th>   
										<th>Pan Card</th>
										<th>Aadhar Card</th>
									</tr>
								</thead>
								<tbody>
									 <?php if(isset($profile_details)){   ?>
										 <tr>
											<td><img src="<?= base_url('images/') . (isset($image_detail[$profile_details->img_id]) ? $image_detail[$profile_details->img_id] : 'mlm_user_profile/avatar.jpg'); ?>" style="width:100px; height:100px;"/></td>
											<td><?= $profile_details->f_name.' '.$profile_details->l_name;?></td>
											<td><?=  $profile_details->member_user_id;?></td>
											<td><?= (isset($profile_details->email_id)?$profile_details->email_id:'');?></td>
											<td><?= $profile_details->office;?></td> 
											<td><?= (isset($resourses[$profile_details->pan_id]) ? "<a href='" . base_url('assets/pdf/') . $resourses[$profile_details->pan_id] . "' class='text-white form-control btn btn-primary'> <i class='fa fa-eye' aria-hidden='true'></i> </a>" : "") ?></td>
											<td><?= (isset($resourses[$profile_details->aadhar_id]) ? "<a href='" . base_url('assets/pdf/') . $resourses[$profile_details->aadhar_id] . "' class='text-white form-control btn btn-primary'> <i class='fa fa-eye' aria-hidden='true'></i> </a>" : "") ?></td>
										 </tr>
									 <?php }?>
								</tbody>
							</table>
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<tr>  
										<th>Position</th>
										<th>Next Promotion</th> 
										<th>Direct Sale</th>   
										<th>Required Direct Sale</th>   
										<th>Group Sale</th> 
										<th>Required Group Sale</th> 
										<th>Required Profile</th> 
										<th>Required Count</th> 
									</tr>
								</thead>
								<tbody>
									 <?php if(isset($profile_details)){   ?>
										 <tr> 
											<td><?= $user_type[$profile_details->user_type]->name;?></td>
											<td><?php
												if (isset($user_type[$profile_details->user_type]) && !empty($user_type[$profile_details->user_type]->next_profile_id)) {
													$next_profile_id = $user_type[$profile_details->user_type]->next_profile_id;
													if (isset($user_type[$next_profile_id])) {
														echo $user_type[$next_profile_id]->name;
													} else {
														echo '';  
													}
												} else {
													echo '';  
												}
												?>
											</td> 
											<td><?=  $profile_details->direct_sale;?></td>
											<td><?= $user_type[$profile_details->user_type]->direct_sale - $profile_details->direct_sale ;?></td>
											<td><?= $profile_details->group_sale;?></td>
											<td><?= $user_type[$profile_details->user_type]->group_sale - $profile_details->group_sale ;?></td>
											<td><?php
												if (isset($profile_details->user_type, $user_type[$profile_details->user_type], $user_type[$profile_details->user_type]->require_profile, $user_type[$user_type[$profile_details->user_type]->require_profile]->name)) {
													echo $user_type[$user_type[$profile_details->user_type]->require_profile]->name;
												} else {
													echo '';
												}
												?>
											</td>
											<td><?= $user_type[$profile_details->user_type]->require_profile_count ?></td>
										 </tr>
									 <?php }?>
								</tbody>
							</table>
							<table class="table table-hover table-striped table-bordered">
								<thead>
									<tr>  
										<th>SponsorId</th>
										<th>Sponsor Name</th> 
										<th>Sponser Branch</th> 
										<th>Sponsor Position</th> 
									</tr>
								</thead>
								<tbody>
									 <?php if(isset($profile_details)){   ?>
										 <tr> 
											<td><?= (isset($member_details[$profile_details->member_id])?$member_details[$profile_details->member_id]->member_user_id:'') ?></td>  
											<td><?= (isset($member_details[$profile_details->member_id])?$member_details[$profile_details->member_id]->f_name.' '.$member_details[$profile_details->member_id]->l_name:'') ?></td>  
											<td><?= (isset($member_details[$profile_details->member_id])?$member_details[$profile_details->member_id]->office:'')?></td>   
											<td>
												<?php
												if (isset($member_details[$profile_details->member_id]) && isset($member_details[$profile_details->member_id]->user_type)) {
													$user_type_id = $member_details[$profile_details->member_id]->user_type;
													if (isset($user_type[$user_type_id])) {
														echo $user_type[$user_type_id]->name;
													} else {
														echo ''; 
													}
												} else {
													echo ''; 
												}
												?>
											</td>      
										 </tr>
									 <?php }?>
								</tbody>
							</table>
							</div>
							
						</div>
					</div> 
				</div>
            </div>
        </div>
    </div>
 <!--add slider--> 
 
 
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
<?php include('common/footer_script.php'); ?>
</body>
</html>

