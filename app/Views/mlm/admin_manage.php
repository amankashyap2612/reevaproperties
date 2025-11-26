<!DOCTYPE html>
<html lang="en">
<head> 
	 <?php include('common/header_script.php'); ?>
	<link href="<?= base_url('assets/include/'); ?>/css/datepicker.css" rel="stylesheet">
    <link href="<?= base_url('assets/include/'); ?>/css/timepicker.css" rel="stylesheet">
    <link href="<?= base_url('assets/include/'); ?>/css/daterangepicker.css" rel="stylesheet">
<style>
@media (max-width: 767px) { 
  .rspv {
    overflow-x: auto;
    display: block;
  } 
}
</style>
</head>
<body>
	<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        <?php include('common/header.php'); ?>		
        <div class="app-main">
            <?php include('common/sidebar.php');?>

            <div class="app-main__outer">
                <div class="app-main__inner">
					
						<div class="card mb-3"> 
							<div class="row">
								<div class="col-md-12">
									<input class="form-control" id="search_member" name="search" placeholder="Member Id Like RD00">
								</div>
							</div> 
						</div>
						<div class="card-body">
							<div class="row  p-5">
								<div class="col-md-12 border-end border-info">
									<h3 class="fs-6 mb-3">Member Details</h3>
									<div class="tab-content bg-white " style="height:400px;" id="myTabContent" >
										<div class="tab-pane fade show active p-2 d-none " id="profile" role="tabpanel" aria-labelledby="profile-tab" style="height:370px;">
											<div class="row border-bottom mt-3">
												<div class="col-md-3">
													<div class="form-group">
														<label  class="mr-2" for="client_name"><b>Name:-</b> </label>
														<span   id="client_name"></span>
													</div> 
												</div>
												<div class="col-md-3">
													<div class="form-group">
														<label for="client_email"><b>Email:-</b> </label>
														<span  id="client_email"></span>
													</div> 
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="client_contact"><b>Contact:-</b> </label>
														<span   id="client_contact"></span>,
														<label for="client_member_count"><b>Total Members:- </b></label>
														<span   id="client_member_count"></span>
													</div>
												</div> 
												<div class="col-md-2">
													<div class="form-group">
													<?php if(in_array("1",$other_action)){ ?>
														<button type="button" class="btn btn-success form-control add_data mr-2" data-user_id='' data-bs-toggle="modal" data-bs-target="#addUser">Add</button>
													<?php } ?>
													</div>
												</div> 
												<div>
													<table id="table_data" class="table table-bordered rspv">
														<thead>
															<tr>
															  <th>#</th>
															  <th>Name</th> 
															  <th>Email</th>
															  <th>Contact</th>
															  <th>Office</th>
															  <th>Total Member</th>
															  <th>Member Id</th>
															  <?php if(in_array("2",$other_action)){ ?>
															  <th>Action</th> 
															  <?php } ?>
															</tr>
														</thead>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
										</div> 
									</div>
								</div>
							</div>
							<div class="m-t-10 text-center"></div> 
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!---add Client--->
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
						  <div class="col-md-12  mb-3">
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
								<input type="text" name="fname" class="form-control" placeholder="First Name" oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');" >
							</div>
							<div class="col-md-3 col-sm-12 form-group" >
								<label>Last Name *</label>
								<input type="text" name="lname" class="form-control" placeholder="Last Name"  oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');"  >
							</div>
							<div class="col-md-3 col-sm-12 form-group ">
								<label> Contact *</label>
								<input type="text" name="contact" class="form-control" placeholder="Enter Contact Number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
							</div>
							<div class="col-md-3 col-sm-12 form-group ">
								<label> D-O-B </label>
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
								<input type="text" name="nominee"  oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 col-sm-12 form-group ">
								<label>Nominee Mobile *</label>
								<input type="text" name="nominee_mobile" class="form-control" placeholder="Nominee Mobile"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
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
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait..!"  >Add User</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	 
	 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
 
<?php include('common/footer_script.php'); ?>

<script src="<?= base_url('assets/include/js'); ?>/moment.js"></script>
<script src="<?= base_url('assets/include/js'); ?>/datepicker.js"></script>
<script src="<?= base_url('assets/include/js'); ?>/timepicker.js"></script>
<script src="<?= base_url('assets/include/js'); ?>/daterangepicker.js"></script>
	
<script>
	var csrf_token = '<?=csrf_token();?>';
	var csrf_hash = '<?=csrf_hash();?>';
	$('.datetimepicker3,.datetimepicker4').datetimepicker({
		format: 'DD-MM-YYYY HH:mm:ss',
		minDate: '<?=date('d-M-Y H:i:s',strtotime("+2 Hour"));?>',
	});
</script>
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
	
	
	$('#search_member').autocomplete({
		source: function( request, response ) {
			$.ajax({
				type: "POST",
				url: "<?=site_url('members/ajax/catch_mlm_data');?>",
				dataType: "json",
				data: {id:request.term,[csrf_token]:csrf_hash},
				cache: false,
				success: function( data ) {
					update_token(data);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
					//console.log('new ' + data);	d-none	
					$('.tab-pane').removeClass('d-none');					
					response( $.map( data.mlm_id, function( item,index) {
						return {
							label: item.name+' | '+item.f_name+' | '+item.l_name+' | '+item.email_id+' | '+item.contact,
							value: item.name+' | '+item.f_name+' | '+item.l_name+' | '+item.email_id+' | '+item.contact,
							item_id: item.id,
							item_member_user_id: item.member_user_id,
							item_fname: item.f_name,
							item_lname: item.l_name,
							item_email: item.email_id,
							item_contact: item.contact,
							item_member_count: item.member_count,
						};
					}));
				}
			});
		},
		minLength: 4,
		select: function( event, ui ) 
		{ 
			$(document).on('click','.add_data',function(){
				var userId = ui.item.item_id; 
				$('input[name=member_id]').val(userId);
				console.log(userId);
			});
			
			var label = ui.item.label;
			var value = ui.item.value;
			var itemid = ui.item.item_id;
			var member_user_id = ui.item.item_member_user_id;
			var name = ui.item.item_fname + ' ' + ui.item.item_lname + ' (' + member_user_id + ')';

			//var lname = ui.item.item_lname;
			var member_count = ui.item.item_member_count;
			var email = ui.item.item_email;
			var contact = ui.item.item_contact;
			$(".c_id").attr('value',itemid);
			$("#client_id").html(itemid);
			$("#client_name").html(name); 
			$("#client_email").html(email);
			$("#client_contact").html(contact);
			$("#client_member_count").html(member_count);  
			$.ajax({
				type: "POST",
				url: "<?=site_url('members/ajax/catch_sub_member');?>",
				dataType: "json",			
				data: {id: itemid,[csrf_token]:csrf_hash},
				cache: false,
				success: function(result) {
					update_token(result);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
					$.each(result.get_sub_member, function(index, row) {
						var tr = $('<tr></tr>');
						tr.append('<td>' + (index + 1) + '</td>');
						tr.append('<td>' + row.f_name + ' ' + row.l_name + '</td>');
						tr.append('<td>' + row.email_id + '</td>');
						tr.append('<td>' + row.contact + '</td>');
						tr.append('<td>' + row.office + '</td>');
						tr.append('<td>' + row.member_count + '</td>');
						tr.append('<td>' + row.member_user_id + '</td>'); 
						<?php if(in_array("2",$other_action)){ ?>
						tr.append('<td> <a class="btn " href="<?= site_url("members/ad_member_profile/") ?>' + row.id + '"    ><i class="metismenu-icon pe-7s-pen"     ></i></a></td>');
						<?php } ?>
						$('#table_data').append(tr);
					});

					
				},
			});
		}
	}); 
	$(document).on('click','.add_data',function(){
		var id = $(this).data('user_id');
		$('input[name=member_id]').val(id);
	});

});
</script>

</body>
</html>