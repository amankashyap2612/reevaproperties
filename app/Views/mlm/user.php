<!DOCTYPE html>
<html lang="en">
<head> 
	 <?php include('common/header_script.php'); ?>
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
                                <div>Manage Member</div>
                            </div> 
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('members/user');?>" method="GET">
							<div class="row">
								<div class="col-md-4 mb-2">
									<select class="form-control" name="status">
										<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
										<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
									</select>
								</div>
								<div class="col-md-4 mb-2">
									<input type="submit" class="form-control btn btn-success" value="Fetch">
								</div>
								<div class="col-md-4  mb-2">
								<?php if(in_array('1',$other_action)){ ?>
									<input type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addUser" value="Add New">
								<?php } ?>
								</div>
							</div>
						</form>
						<div class="card-body">
							 <div class="table-responsive">
							<table class="table table-hover table-striped  ">
								<thead>
									<tr>
										<th>S.no</th>
										<th>Member Name</th>
										<th>Member ID</th>
										<th>Email</th>
										<th>Type</th>
										<th>Sub members</th>
										<?php if(in_array('1',$other_action)){ ?>
										<th>Edit</th> 
										<?php } ?>
									</tr>
								</thead>
								<tbody>
								<?php if (isset($get_detail)){ $i=1; foreach($get_detail as $obj){ ?>
									<tr>
										<td><?=$i++;?></td>
										<td><?= $obj->f_name;?></td> 
										<td><?= $obj->member_user_id;?></td>
										<td><?= $obj->email_id;?></td>
										<td><?= $type[$obj->user_type]->name; ?></td>
										<td><?= $obj->member_count?></td>
										<?php if(in_array('2',$other_action)){ ?>
										<td><a href="<?= site_url('members/member_profile/'.$obj->id);?>"   ><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
										<?php } ?>
									</tr>
								<?php }} ?>
								</tbody>
							</table>
							</div>
						</div>
                    </div>
				</div>
			</div>
		</div>
	</div>
<?php if(in_array('1',$other_action)){ ?>
<div class="modal fade" id="addUser" role="dialog">
	<div class="modal-dialog modal-lg modal-full">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add User </h4>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-submit" method="post" action="<?= site_url('members/user/add_user_info')?>"> 
					<div class="row">
						<div class="col-md-12 mb-3">
							<label>Profile Image *</label>
							<input type="file" name="property_images" id="upphoto" class="form-control">
						</div>
						<div class="col-md-12">
							<input type="hidden" name="croppedImg" value=""> 
						</div>
					</div> 
					<div class="row">
						<div class="col-md-3 col-sm-12 form-group" >
							<label>First Name *</label>
							<input type="text" name="fname" class="form-control" placeholder="First Name"  oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');"   >
						</div>
						<div class="col-md-3 col-sm-12 form-group" >
							<label>Last Name *</label>
							<input type="text" name="lname" class="form-control" placeholder="Last Name" oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');"    >
						</div>
						<div class="col-md-3 col-sm-12 form-group ">
							<label> Contact *</label>
							<input type="text" name="contact" class=" contact form-control"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"    placeholder="Enter Contact Number">
						</div>
						<div class="col-md-3 col-sm-12 form-group ">
							<label> D-O-B * </label>
							<input type="date" name="dob" class="form-control" placeholder="Enter Contact Number">
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-sm-12 form-group ">
							<label>Email ID *</label>
							<input type="email" name="email" class="form-control" placeholder="Email-ID">
						</div>
						<div class="col-md-6 col-sm-12 form-group ">
							<label>Office Location *</label>
							<select class="form-control" name="office">
								<option value="">select Office</option>
								<option value="Narela">Narela</option>
								<option value="Nangloi">Nangloi</option>
								<option value="Azadpur">Azadpur</option> 
							</select>
						</div> 
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-12 form-group ">
							<label>Aadhar Card *</label>
							<input type="file" name="aadhar" accept="application/pdf "   class="form-control" />
						</div>
						<div class="col-md-4 col-sm-12 form-group ">
							<label>Pan Card *</label>
							<input type="file" name="pan" accept="application/pdf" class="form-control"   />
						</div> 
						<div class="col-md-4 col-sm-12 form-group ">
							<label>Nominee Name *</label>
							<input type="text" name="nominee" class="form-control"  oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 col-sm-12 form-group ">
							<label>Nominee Mobile *</label>
							<input type="text" name="nominee_mobile" class="form-control  contact "  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  placeholder="Nominee Mobile"  />
						</div>
						<div class="col-md-4 col-sm-12 form-group ">
							<label>Relation *</label>
							<select name="relation" class="form-control">
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
						<div class="col-md-4 col-sm-12 form-group ">
							<label>Nominee DOB *</label>
							<input type="date" name="nominee_dob" class="form-control" placeholder="Nominee DOB" />
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12 form-group">
							<input type="hidden" name="member_id">
							<input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
							<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait..!"  >Add User</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>
	<div class="app-drawer-overlay d-none animated fadeIn"></div>
	<?php include('common/footer_script.php'); ?>
<script>
$(function(){
	$("#upphoto").finecrop({
	  viewHeight: 500,
	  cropWidth: 370,
	  cropHeight: 240,
	  cropInput: 'inputImage',
	  cropOutput: 'croppedImg',
	  zoomValue: 50
	 });
	
	
	$('.view_member').on('click', function () {
		var id = $(this).data('id');
		$.ajax({
			url: '<?= base_url('catches/catch_sub_member')?>',
			data: {id: id, [csrf_token]: csrf_hash},
			type: 'POST',
			dataType: 'json',
			cache: false,
			success: function (result) {
				update_token(result); 
				$('#addObject .modal-body .table_data').empty();
	 
				if (result.get_sub_member && result.get_sub_member.length > 0) { 
					$.each(result.get_sub_member, function (index, row) { 
						var tr = $('<tr></tr>');
						tr.append('<td>' + (index + 1) + '</td>');
						tr.append('<td>' + row.f_name + ' ' + row.l_name + '</td>');
						tr.append('<td>' + row.email_id + '</td>');
						$('#addObject .modal-body .table_data').append(tr);
					});
				} else { 
					$('#addObject .modal-body .table_data').html('<tr><td colspan="3">No data available</td></tr>');
				}
			}
		});
	});

});
</script>
</body>
</html>