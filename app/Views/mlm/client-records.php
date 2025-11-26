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
                                <div>Client Records</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Records</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="card mb-3"> 
						<div class="row">
							<div class="col-md-8">
								<input class="form-control" id="search_client" name="search" placeholder="Mobile Number / Name / Email Address">
							</div>
							<div class="col-md-4">
							<?php if(in_array('1',$other_action)){ ?>
								<button type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addObject">Add New</button>
							<?php } ?>
							</div>
						</div> 
					</div>
					<div class="card-body">
						<div class="row  p-5">
							<div class="col-md-12 border-end border-info">
								<ul class="nav nav-tabs" id="tools" role="tablist">
									<li class="nav-item" role="presentation">
										<button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
									</li>
									
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="deallist-tab" data-bs-toggle="tab" data-bs-target="#deallist" type="button" role="tab" aria-controls="deallist" aria-selected="true">Deals</button>
									</li>
								
									<li class="nav-item" role="presentation">
										<button class="nav-link" id="property-tab" data-bs-toggle="tab" data-bs-target="#property" type="button" role="tab" aria-controls="property" aria-selected="true">Property</button>
									</li>
								</ul>
								<div class="tab-content bg-white" id="myTabContent" >
									<div class="tab-pane fade show active p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<p>Name <span class="float-end" id="client_name"></span></p>
										<p>Email <span class="float-end" id="client_email"></span></p>
										<p>Contact <span class="float-end" id="client_contact"></span></p>
										<p>Address <span class="float-end" id="client_address"></span></p>
										<div class="row">
											<?php if(in_array('2',$other_action)){ ?>
											<div class="col-md-6">
												<button type="button" class="btn btn-success form-control d-none" id="add_visit_btn" data-bs-toggle="modal" data-bs-target="#addDeal">Create Deal</button>
											</div>
											<?php } ?>
											<?php if(in_array('3',$other_action)){ ?>
											<div class="col-md-6">
												<button type="button" class="btn btn-primary form-control d-none" id="add_prop_btn" data-bs-toggle="modal" data-bs-target="#addProperty">Add Property</button>
											</div>
											<?php } ?>
										</div>
									</div>
									
									<div class="tab-pane fade" id="deallist" role="tabpanel" aria-labelledby="deallist-tab">
										<div class="accordion" id="accordionExample" style="height:350px;overflow:scroll;overflow-x: hidden;"> 
											<table class="table table-hover table-striped table-bordered">
												<thead>
													<tr>
														<th>Project</th>
														<th>Block</th>
														<th>Plot No</th>
														<th>AgentID</th>
														<th>Agent</th>
														<th>Deal Amount</th>
														<th>Convert</th>
													</tr>
												</thead>
												<tbody id="deal-tbody">
												</tbody>
											</table>
										</div>
									</div>
									
									<div class="tab-pane fade" id="property" role="tabpanel" aria-labelledby="property-tab">
										<div class="accordion" id="accordionExample" style="height:350px;overflow:scroll;overflow-x: hidden;">	
											<table class="table table-hover table-striped table-bordered">
												<thead>
													<tr>
														<th>Project</th>
														<th>Block</th>
														<th>Plot No</th>
														<th>Client Property Status</th>
														<th>Paid Amount</th>
														<th>Deal Amount</th>
														<th>Property</th>
													</tr>
												</thead>
												<tbody id="property-tbody">
												</tbody>
											</table>
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
<!---add Client--->
<?php if(in_array('1',$other_action)){ ?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" id="addObject"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Create Client</h5>
				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-submit" action="<?= site_url('members/client/add_client')?>">
					<div class="row">
						<div class="col-md-6 col-sm-12 form-group" >
							<p>Client Name</p>
							<input type="text" name="c_name" class="form-control" placeholder="Client Name">
						</div>
						<div class="col-md-6 col-sm-12 form-group" >
							<p>Email Address</p>
							<input type="text" name="email" class="form-control" placeholder="Email Address">
						</div>
						<div class="col-md-6 col-sm-12 form-group" >
							<p>Contact Number</p>
							<input type="text" name="contact_number" class="form-control contact" placeholder="Mobile Number">
						</div>
						<div class="col-md-6 col-sm-12 form-group" >
							<p>Address</p>
							<textarea   name="address" class="form-control" placeholder="Enter Address"></textarea>
						</div>
						<div class="col-md-12 col-sm-12 form-group">
							<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
							<button type="submit" class="btn btn-primary form-control">Create Client</button>
						</div>
					</div>
				</form>
			</div> 
		</div>
	</div>
</div>
<?php } ?>
<!---add visit----->
<?php if(in_array('2',$other_action)){ ?>
<div class="modal fade" id="addDeal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg modal-full">
		<div class="modal-content" style="border-radius: 10px;">
			<div class="modal-header">
				<span>Create Deal</span>
				<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
			</div>
			<div class="modal-body" >
				<form class="form-submit" action="<?= site_url('members/client/add_deal');?>">
					<div class="row">
						<div class="col-md-4 form-group" >
							<label>Project</label>
							<select class="form-control project" name="vst_project" data-change="vst_block"  >
								<option value="">Choose Project</option>
								<?php foreach($proj as $obj){ ?>
									<option value="<?=$obj->id?>" ><?= $obj->name;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Block</label>
							<select class="form-control block" name="vst_block" data-change="vst_area" >
							<option value="">Choose Block</option>
								<?php if(isset($block)){ ?>
									<option value="<?= $block?>" selected> <?= $block?>  Block</option>
								<?php }?>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Area</label>
							<select class="form-control catch_plot" name="vst_area" data-change="vst_plot_no" >
								<option value="">Choose Area</option>
								<?php if(isset($area)){?>
									<option value="<?= $area?>" selected><?= $area?>  Gaj</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Plot Number</label>
							<select class="form-control" name="vst_plot_no" >
								<option value="">Choose Plot</option>
							</select>
						</div>
						<div class="col-md-4 form-group" >
							<label>Agent</label>
							<select name="vst_agent" class="form-control" >
								<option value="">Select Agent</option>
								<option value="<?=$session['user_id'];?>" ><?=ucfirst($session['f_name']);?> - (<?=$session['member_user_id'];?>)</option>
								<?php foreach($get_member as  $obj){ ?>
								<option value="<?=$obj->id;?>" ><?=ucfirst($obj->f_name);?> - (<?=$obj->member_user_id;?>)</option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-4 form-group" >
							<label>Deal Amount</label>
							<input type="number" name="vst_deal_amount" class="form-control" placeholder="Deal Fixed Amount">
						</div>
					</div>
					<div class="row">
						<div class="col-12 form-group text-end">
							<input class="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
							<input class="c_id" type="hidden" name="c_id" value="">
							<button class="btn btn-success form-control" type="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!----add property------>
<?php if(in_array('3',$other_action)){ ?>
<div class="modal fade" id="addProperty" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg modal-full">
		<!-- Modal content-->
		<div class="modal-content" style="border-radius: 10px;">
			<div class="modal-header">
				<p class="modal-title">Property Booking</p>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-submit" action="<?= site_url('members/client/add_property');?>">
					<div class="row">
						<div class="col-md-4 form-group" >
							<label>Project</label>
							<select class="form-control project" name="project" data-change="block"  >
								<option value="">Choose Project</option>
								<?php foreach($proj as $obj){ ?>
									<option value="<?=$obj->id?>" ><?= $obj->name;?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Block</label>
							<select class="form-control block" name="block" data-change="area" >
							<option value="">Choose Block</option>
								<?php if(isset($block)){ ?>
									<option value="<?= $block?>" selected> <?= $block?>  Block</option>
								<?php }?>
							</select>
						</div>
						<div class="col-md-4 form-group">
							<label>Area</label>
							<select class="form-control catch_plot" name="area" data-change="plot_no" >
								<option value="">Choose Area</option>
								<?php if(isset($area)){?>
									<option value="<?= $area?>" selected><?= $area?>  Gaj</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 form-group">
							<label>Plot Number</label>
							<select class="form-control" name="plot_no" >
								<option value="">Choose Plot</option>
							</select>
						</div>
						<div class="col-md-4 form-group" >
							<label>Agent</label>
							<select name="agent" class="form-control" >
								<option value="">Select Agent</option>
								<option value="<?=$session['user_id'];?>" ><?=ucfirst($session['f_name']);?> - (<?=$session['member_user_id'];?>)</option>
								<?php foreach($get_member as  $obj){ ?>
								<option value="<?=$obj->id;?>" ><?=ucfirst($obj->f_name);?> - (<?=$obj->member_user_id;?>)</option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-4 form-group" >
							<label>Property Status</label>
							<select class="form-control" name="prop_status">
								<option value="T">Token</option>
								<option value="P">Partially Booked</option>
								<option value="B">Booked</option>
								<option value="S">Sold</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4 form-group" >
							<label>Recieved Amount</label>
							<input type="number" name="recieved_amount" class="form-control" placeholder="Recieved Amount">
						</div>
						<div class="col-md-4 form-group" >
							<label>Deal Amount</label>
							<input type="number" name="deal_amount" class="form-control" placeholder="Deal Fixed Amount">
						</div>
					</div>	
					<div class="row">
						<div class="col-12 form-group">
							<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
							<input class="client_id" type="hidden" name="client_id" value="">
							<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Add Property</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<!-------------add amount--------------->


<div class="modal fade" id="ManageProperty" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg modal-full">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header mb-header">
				<p class="modal-title text-white">Manage Property | Status: <span class="text-white" id="mb-status"></span></p>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="nav flex-column nav-pills me-3 border p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<?php if(in_array('5',$other_action)){ ?>
							<button class="nav-link border active" id="v-pills-detail-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail" type="button" role="tab" aria-controls="v-pills-detail" aria-selected="true">Details</button>
						<?php } ?>
						<?php if(in_array('6',$other_action)){ ?>
							<button class="nav-link border" id="v-pills-payment-tab" data-bs-toggle="pill" data-bs-target="#v-pills-payment" type="button" role="tab" aria-controls="v-pills-payment" aria-selected="false">Payment History</button>
						<?php } ?>
						<?php if(in_array('7',$other_action)){ ?>
							<button class="nav-link border" id="v-pills-add-amount-tab" data-bs-toggle="pill" data-bs-target="#v-pills-add-amount" type="button" role="tab" aria-controls="v-pills-add-amount" aria-selected="false">Add Payment</button>
						<?php } ?>
						<?php if(in_array('8',$other_action)){ ?>
							<button class="nav-link border" id="v-pills-change-status-tab" data-bs-toggle="pill" data-bs-target="#v-pills-change-status" type="button" role="tab" aria-controls="v-pills-change-status" aria-selected="false">Change Status</button>
						<?php } ?>
						</div>
					</div>
					<div class="col-md-9">
						<div class="tab-content" id="v-pills-tabContent">
							<?php if(in_array('5',$other_action)){ ?>
							<div class="tab-pane fade show active" id="v-pills-detail" role="tabpanel" aria-labelledby="v-pills-detail-tab" tabindex="0">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<div id="client_details">
												<!--     Details Auto Fetch       -->
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if(in_array('6',$other_action)){ ?>
							<div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab" tabindex="0">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<p class="bg-info text-white p-3">Payment History</p>
											<div class="row">
												<div class="col-md-12 form-group" >
													<table class="table table-striped">
														<thead>
															<tr>
																<th>S.no</th>
																<th>Recieved</th>
																<th>Amount</th>
																<th>Delete</th>
															</tr>
														</thead>
														<tbody id="amount_his_table">
														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if(in_array('7',$other_action)){ ?>
							<div class="tab-pane fade" id="v-pills-add-amount" role="tabpanel" aria-labelledby="v-pills-add-amount-tab" tabindex="0">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<p class="bg-info text-white p-3">Add Amount</p>
											<form class="booking-amount-submit" action="<?= site_url('members/client/add_amount');?>">
												<div class="row">
													<div class="col-md-6 form-group" >
														<input type="number" name="installment" class="form-control" placeholder="Payment">
													</div>
													<div class="col-md-6">
														<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
														<input id="client_id_amt_submit" type="hidden" name="c_id" value="">
														<input id="booking_id_amt_submit" type="hidden" name="b_id" value=""> 
														<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Add Amount</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php if(in_array('8',$other_action)){ ?>
							<div class="tab-pane fade" id="v-pills-change-status" role="tabpanel" aria-labelledby="v-pills-change-status-tab" tabindex="0">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<p class="bg-info text-white p-3">Change Status</p>
											<form class="change-status-submit" action="<?= site_url('members/client/change-booking-status');?>">
												<div class="row">
													<div class="col-md-6 form-group" >
														<select name="status" class="form-control">
															<option value="T">Token</option>
															<option value="P">Partially Booked</option>
															<option value="B">Booked</option>
															<option value="S">Sold</option>
															<option value="C">Closed</option>
														</select>
													</div>
													<div class="col-md-6">
														<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
														<input id="booking_id_status_submit" type="hidden" name="b_id" value=""> 
														<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Submit</button>
													</div>
												</div>
											</form>
											<table class="table table-striped">
												<thead>
													<tr>
														<td>S.No</td>
														<td>Time</td>
														<td>Agent</td>
														<td>Status</td>
													</tr>
												</thead>
												<tbody id="mb-status-logs">
													
												</tbody>
											</table>
										</div>
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


<?php if(in_array('4',$other_action)){ ?>
<div class="modal fade" id="matureBox" tabindex="-1" role="dialog">
	<div class="modal-dialog  modal-full">
		<!-- Modal content-->
		<div class="modal-content" style="border-radius: 10px;">
			<div class="modal-header">
				<p class="modal-title">Mature Deal</p>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-submit" action="<?= site_url('members/client/deal_mature');?>">
					<div class="row">
						<div class="col-md-6 form-group" >
							<label>Property Status</label>
							<select class="form-control" name="prop_status">
								<option value="T">Token</option>
								<option value="P">Partially Booked</option>
								<option value="B">Booked</option>
								<option value="S">Sold</option>
							</select>
						</div>
						<div class="col-md-6 form-group" >
							<label>Recieved Amount</label>
							<input type="number" name="recieved_amount" class="form-control" placeholder="Recieved Amount">
						</div>
						<div class="col-12 form-group">
							<input type="hidden" name="<?=csrf_token();?>" value="<?=csrf_hash();?>">
							<input type="hidden" name="deal_id"/> 
							<button type="submit" class="btn btn-warning form-control" data-loading-text="Please Wait...!">Convert</button>
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
	$('#search_client').autocomplete({
		source: function( request, response ) {
			$.ajax({
				type: "POST",
				url: "<?=site_url('members/ajax/search-client');?>",
				dataType: "json",
				data: {details:request.term,[csrf_token]:csrf_hash},
				cache: false,
				success: function( data ) {
					update_token(data);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
					response( $.map( data.result, function( item,index) {
						//console.log(data.result);
						return {
							label: item.name+' | '+item.email+' | '+item.mobile_number,
							value: item.name+' | '+item.email+' | '+item.mobile_number,
							item_id: item.id,
							item_name: item.name,
							item_email: item.email,
							item_contact: item.mobile_number,
							item_address: item.address,
						};
					}));
				}
			});
		},
		minLength: 3,
		select: function( event, ui ) 
		{
			var label = ui.item.label;
			var value = ui.item.value;
			var itemid = ui.item.item_id;
			var name = ui.item.item_name;
			var email = ui.item.item_email;
			var contact = ui.item.item_contact;
			var address = ui.item.item_address;
			$(".c_id").attr('value',itemid);
			$(".client_id").attr('value',itemid);
			$("#client_id").html(itemid);
			$("#client_name").html(name);
			$("#client_email").html(email);
			$("#client_contact").html(contact);
			$("#client_address").html(address);
			$("#add_prop_btn").removeClass("d-none");
			$("#add_visit_btn").removeClass("d-none");
			$.ajax({
				type: "POST",
				url: "<?=site_url('members/ajax/client-records');?>",
				dataType: "json",			
				data: { item_id: itemid,[csrf_token]:csrf_hash },
				cache: false,
				success: function(data){
					//console.log(data);
					update_token(data);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
					visit_print(data.v_result);
					property_print(data.property_result);
				},
			});
		}
	});
	
	function visit_print(v_print){ // for print all visit 
		var accordionContainer = $("#accordionExample");
		$.each(v_print, function(index, visitItem) {
			
			var alertHTML = '<tr><td>' + visitItem.name+ '</td><td>' + visitItem.block + '</td><td>' + visitItem.plot_no + '</td><td>' + visitItem.member_user_id + '</td><td>' + visitItem.f_name + '</td><td>' + visitItem.deal_amount + '</td>';
			if(visitItem.status == "A")
			{
				<?php if(in_array('4',$other_action)){ ?>
				alertHTML += '<td><button class="btn btn-warning mature-box" type="button" data-bs-toggle="modal" data-bs-target="#matureBox" data-deal_id="'+visitItem.id+'">Mature</button></td>';
				<?php }else{ ?>
				alertHTML += '<td>Pending</td>';
				<?php } ?>
			}
			else
			{
				alertHTML += '<td>Matured</td>';
			}
			alertHTML += '</tr>';
			$("#deal-tbody").append(alertHTML);
		});
		load_deals();
	}
    
	function property_print(property){
		$.each(property, function(index, propertyItem){
			var prop = '';
			if(propertyItem.prop_status == 'A'){ prop = 'Avilable'; }
			else if(propertyItem.prop_status == 'T'){ prop = 'Token'; }
			else if(propertyItem.prop_status == 'P'){ prop = 'Partially Booked'; }
			else if(propertyItem.prop_status == 'B'){ prop = 'Booked'; }
			else if(propertyItem.prop_status == 'S'){ prop = 'Sold'; }
			
			var alertHTML = '<tr><td>' + propertyItem.name+ '</td><td>' + propertyItem.block + '</td><td>' + propertyItem.plot_no + '</td><td>' + prop + '</td><td>' + propertyItem.paid_amount + '</td><td>' + propertyItem.deal_amount + '</td><td><button type="button" class="form-control btn btn-primary manage-property" data-bs-toggle="modal" data-bs-target="#ManageProperty" data-clientid="'+propertyItem.client_id+'" data-bookingid="'+ propertyItem.id+'"><i class="fa fa-eye" aria-hidden="true"></i> </button></td><!--<td><button type="button" class="form-control btn btn-danger cancel-button" data-bs-toggle="modal" data-bs-target="#cancel_booking" data-id="'+propertyItem.id+'"  data-client="'+propertyItem.client_id+'"   data-property_id="'+propertyItem.property_id+'" >Cancel Booking </button></td>--> </tr>';
			$("#property-tbody").append(alertHTML);
		});
		$('.manage-property').on('click',function(){
			var bookingid = $(this).data("bookingid");
			var clientid = $(this).data("clientid");
			$("#client_id_amt_submit").val(clientid);
			$("#booking_id_amt_submit").val(bookingid);
			$("#booking_id_status_submit").val(bookingid);
			
			$.ajax({
				type: "POST",
				url: "<?=site_url('members/ajax/catch-booking-info');?>",
				dataType: "json",			
				data: { client_id: clientid,booking_id:bookingid,[csrf_token]:csrf_hash },
				cache: false,
				success: function(data){
					update_token(data);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
					$(".mb-header").removeClass("bg-success"); $(".mb-header").removeClass("bg-secondary"); $(".mb-header").removeClass("bg-warning"); $(".mb-header").removeClass("bg-info"); $(".mb-header").removeClass("bg-danger");
					if(data.result.property.prop_status == 'A')
					{ $(".mb-header").addClass("bg-success"); $("#mb-status").html("Avilable"); }
					else if(data.result.property.prop_status == 'T')
					{ $(".mb-header").addClass("bg-secondary"); $("#mb-status").html("Token"); }
					else if(data.result.property.prop_status == 'P')
					{ $(".mb-header").addClass("bg-warning"); $("#mb-status").html("Partially Booked"); }
					else if(data.result.property.prop_status == 'B')
					{ $(".mb-header").addClass("bg-info"); $("#mb-status").html("Booked"); }
					else if(data.result.property.prop_status == 'S')
					{ $(".mb-header").addClass("bg-danger"); $("#mb-status").html("Sold"); }
					$('.change-status-submit').find("select[name='status']").find("option[value='"+data.result.property.prop_status+"']").prop("selected",true);
					var details = '<p class="bg-info text-white p-2">Client Information</p>'+
					'<div class="row">'+
					'<div class="col-md-3 border bg-light">Name: </div><div class="col-md-3 border"> '+data.result.client.name+'</div><div class="col-md-3 border bg-light">Phone: </div><div class="col-md-3 border"> '+data.result.client.mobile_number+'</div>'+
					'<div class="col-md-3 border bg-light">Email Address: </div><div class="col-md-3 border"> '+data.result.client.email+'</div><div class="col-md-3 border bg-light">Address: </div><div class="col-md-3 border"> '+data.result.client.address+'</div>'+
					'</div>';
					details += '<p class="bg-info text-white p-2 mt-3">Property Information</p>'+
					'<div class="row">'+
					'<div class="col-md-3 border bg-light">Project: </div><div class="col-md-3 border"> '+data.result.project.name+'</div><div class="col-md-3 border bg-light">Block: </div><div class="col-md-3 border"> '+data.result.property.block+'</div>'+
					'<div class="col-md-3 border bg-light">Plot Number: </div><div class="col-md-3 border"> '+data.result.property.plot_no+'</div><div class="col-md-3 border bg-light">Property Type: </div><div class="col-md-3 border"> '+data.result.property.type+'</div>'+
					'<div class="col-md-3 border bg-light">Property Area: </div><div class="col-md-3 border"> '+data.result.property.area_sq+' SQ</div>'+
					'<div class="col-md-3 border bg-light">Property Size: </div><div class="col-md-3 border"> '+data.result.property.size_gaj+' GAJ</div>'+
					'</div>';
					details += '<p class="bg-info text-white p-2 mt-3">Agent Information</p>'+
					'<div class="row">'+
					'<div class="col-md-3 border bg-light">MemberID: </div><div class="col-md-3 border"> '+data.result.agent.member_user_id+'</div><div class="col-md-3 border bg-light">Name: </div><div class="col-md-3 border"> '+data.result.agent.f_name+' '+data.result.agent.l_name+'</div>'+
					'<div class="col-md-3 border bg-light">Phone: </div><div class="col-md-3 border"> '+data.result.agent.contact+'</div><div class="col-md-3 border bg-light">Email: </div><div class="col-md-3 border"> '+data.result.agent.email_id+'</div>'+
					'<div class="col-md-3 border bg-light">Office: </div><div class="col-md-3 border"> '+data.result.agent.office+'</div><div class="col-md-3 border bg-light">RefferedBy: </div><div class="col-md-3 border"> '+data.result.agent.member_id+'</div>'+
					'</div>';
					details += '<div class="row bg-success text-white m-3 p-2 text-center"><div class="col-md-6">Recieved: <span id="mb-paid-amount">'+data.result.paid_amount+'/-</span></div><div class="col-md-6">Deal: '+data.result.deal_amount+'/-</div></div>';
					
					var history = ''; var i=1;
					<?php if($session['type']==9){ ?>
					$.each(data.result.amount_history, function(key, val){
						history += '<tr><td>'+(i++)+'</td><td>'+val.booking_date+'</td><td>'+val.amount+'</td><td><button class="btn btn-danger delete-payment" data-pay_id="'+val.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
					});
					<?php }else{ ?>
					$.each(data.result.amount_history, function(key, val){
						history += '<tr><td>'+(i++)+'</td><td>'+val.booking_date+'</td><td>'+val.amount+'</td><td>-</td></tr>';
					});
					<?php } ?>
					
					var status_logs = ''; var i=1;
					$.each(data.result.status_logs, function(key, val){
						status_logs += '<tr><td>'+(i++)+'</td><td>'+val.last_update+'</td><td>'+val.update_by+'</td><td>'+val.status+'</td></tr>';
					});
				
					$("#amount_his_table").html(history);
					$("#mb-status-logs").html(status_logs);
					$("#client_details").html(details);
					load_programs();
				},
			});
			
		});
	}
	
	function load_programs()
	{
		$(".delete-payment").on("click",function(){
			var payid = $(this).data("pay_id");
			$.ajax({
				type: "POST",
				url: "<?=site_url('members/client/delete_amount');?>",
				dataType: "json",			
				data: { payid:payid,[csrf_token]:csrf_hash },
				cache: false,
				success: function(data){
					update_token(data);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
					var history = ''; var i=1;
					$.each(data.amount_history, function(key, val){
						history += '<tr><td>'+(i++)+'</td><td>'+val.booking_date+'</td><td>'+val.amount+'</td><td><button class="btn btn-danger delete-payment" data-pay_id="'+val.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
					});
					$("#amount_his_table").html(history); 
					$("#mb-paid-amount").html(data.paid_amt);
					load_programs();
				}
			});
		});
	}
	
	function load_deals()
	{
		$(".mature-box").on("click",function(){
			var dealid = $(this).data("deal_id");
			$("input[name='deal_id']").attr("value",dealid);
		});
	}
	
	$(".change-status-submit").submit(function(e){
		e.preventDefault();
        var frm = $(this);
		var form_btn = $(frm).find('button[type="submit"]');
		var form_result_div = '#form-result';
		$(form_result_div).remove();
		form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
		var form_btn_old_msg = form_btn.html();
		form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
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
				form_btn.prop('disabled', false).html(form_btn_old_msg);
				if(result.success)
				{
					var status_logs = ''; var i=1;
					$.each(result.status_logs, function(key, val){
						status_logs += '<tr><td>'+(i++)+'</td><td>'+val.last_update+'</td><td>'+val.update_by+'</td><td>'+val.status+'</td></tr>';
					});
					$("#mb-status-logs").html(status_logs);
					
					$(".mb-header").removeClass("bg-success"); $(".mb-header").removeClass("bg-secondary"); $(".mb-header").removeClass("bg-warning"); $(".mb-header").removeClass("bg-info"); $(".mb-header").removeClass("bg-danger");
					if(result.property.prop_status == 'A')
					{ $(".mb-header").addClass("bg-success"); $("#mb-status").html("Avilable"); }
					else if(result.property.prop_status == 'T')
					{ $(".mb-header").addClass("bg-secondary"); $("#mb-status").html("Token"); }
					else if(result.property.prop_status == 'P')
					{ $(".mb-header").addClass("bg-warning"); $("#mb-status").html("Partially Booked"); }
					else if(result.property.prop_status == 'B')
					{ $(".mb-header").addClass("bg-info"); $("#mb-status").html("Booked"); }
					else if(result.property.prop_status == 'S')
					{ $(".mb-header").addClass("bg-danger"); $("#mb-status").html("Sold"); }
				
					$(form_result_div).html(result.alert1).fadeIn('slow');
					setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
				}
				else
				{
					$(form_result_div).html(result.message.refrence).fadeIn('slow');
					setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
				}
			}
		});
	});
	
	
	$(document).on('click', '.cancel-button', function () {
		var client_id = $(this).data("client");
		var property_id = $(this).data("property_id");
		var id = $(this).data("id"); 
		$("input[name='booking_table_id']").attr("value",id);
		$("input[name='booking_prop_id']").attr("value",property_id);
		$("input[name='booking_client_id']").attr("value",client_id); 
	});
	
	$('.booking-amount-submit').submit(function(e){
        e.preventDefault();
        var frm = $(this);
		var form_btn = $(frm).find('button[type="submit"]');
		var form_result_div = '#form-result';
		$(form_result_div).remove();
		form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
		var form_btn_old_msg = form_btn.html();
		form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
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
				form_btn.prop('disabled', false).html(form_btn_old_msg);
				if(result.success)
				{
					var history = ''; var i=1;
					$.each(result.amount_history, function(key, val){
						history += '<tr><td>'+(i++)+'</td><td>'+val.booking_date+'</td><td>'+val.amount+'</td><td><button class="btn btn-danger delete-payment" data-pay_id="'+val.id+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
					});
					$(frm).find('.form-control').val('');
					$(form_result_div).html(result.alert1).fadeIn('slow');
					setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
					$("#amount_his_table").html(history);
					$("#mb-paid-amount").html(result.paid_amt);
					load_programs();
				}
				else
				{
					$(form_result_div).html(result.message.refrence).fadeIn('slow');
					setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
				}
			}
		});
	});
});
</script>

</body>
</html>