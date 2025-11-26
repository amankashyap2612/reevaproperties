<!DOCTYPE html>
<html lang="en">
<head> 
	<?php include('common/header_script.php'); ?>	 
<style>
	
	.mrg{margin-bottom:30px;}
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
                            <div class="page-title-heading">
                                <div>Sales Report <?php if(isset($search)){ count($search);}?></span></div>
                            </div> 
                        </div>
                    </div>
					<form action="<?=site_url('members/sale_reports');?>" method="get" class="mrg">
						<div class="row">
							<div class="col-md-3 col-sm-6 mb-2">
								<label>Project</label>
								<select class="form-control project" name="project" data-change="block" >
									<option value="">Choose Project</option>
									<?php if(isset($proj)){ foreach($proj as $obj){ ?>
										<option value="<?=$obj->id?>" <?= (($obj->id == $project)?'selected':'')?>><?= $obj->name;?></option>
									<?php } } ?>
								</select>
							</div>
							<div class="col-md-3  col-sm-6 mb-2">
								<label>Block</label>
								<select class="form-control block" name="block" data-project="" data-change="size">
									<option value="">Choose Block</option>
									<?php if(isset($blocks)){  foreach($blocks as $obj){ ?>
										<option value="<?=$obj->blocks;?>" <?=($obj->blocks == $block)?'selected':'';?> > <?=$obj->blocks;?>  Block</option>
									<?php } } ?>
								</select>
							</div>
							<div class="col-md-3  col-sm-6 mb-2">
								<label>Size</label>
								<select class="form-control" name="size" >
									<option value="">Choose Size</option>
									<?php if(isset($areas)){ foreach($areas as $obj){ ?>
										<option value="<?=$obj->size;?>" <?=($obj->size==$size)?'selected':'';?>><?=$obj->size;?>  Gaj</option>
									<?php } } ?>
								</select>
							</div>
							<div class="col-md-3  col-sm-6 mb-2">
								<label>From Date</label>
								<input class="form-control datepicker" name="from_date" placeholder="From date"  value="<?=($from_date)?date('m/d/Y',strtotime($from_date)):'';?>"   >
							</div>
							<div class="col-md-3  col-sm-6 mb-2">
								<label>To Date</label>
								<input class="form-control datepicker" name="to_date" placeholder="To date" value="<?=($to_date)?date('m/d/Y',strtotime($to_date)):'';?>"   >
							</div>
							<div class="col-md-3 col-sm-6 mb-2">
								<label>Members</label>
								<select class="form-control" name="member_name">
									<option value="">Choose Member</option>
									<?php if(isset($get_member)){ foreach($get_member as $sub){ ?>
										<option value="<?= $sub->id; ?>"><?= $sub->f_name . ' ' . $sub->l_name ?></option>
									<?php }} ?>
								</select>
							</div>
							<div class="col-md-3  col-sm-6 mb-2">
								<label>Status</label>
								<select class="form-control" name="status">
									<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
									<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
								</select>
							</div>
							<div class="col-md-3  col-sm-6 mb-2 ">
								<label>Fetch Data</label>
								<input type="submit" class="form-control btn btn-success" value="Fetch">
							</div> 
						</div>
					</form>
					<div class="card-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>S.no</th> 
									<th>Project</th>
									<th>Block</th>
									<th>Plot No</th> 
									<th>Size(Gaj)</th>
									<th>Type</th>    
									<th>Client</th>   
									<th>Receipt Date</th>  
									<th>Receipt Amount</th>  
									<th>Member Office</th>   
									<th>View</th>   
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; if(isset($search)){ foreach($search as $pr){ 

									 $bg = '';
									if($pr->prop_status == 'A') {
										$bg = 'success';
									} else if($pr->prop_status == 'P') {
										$bg = 'warning';
									}else if($pr->prop_status == 'B'){
										$bg = 'info';
									}else if($pr->prop_status == 'S'){
										$bg = 'danger';
									} ?> 
								<tr class="bg-<?= $bg?> text-white">
									<td><?= $count++;?></td> 
									<td><?= isset($proj[$pr->project_id])? $proj[$pr->project_id]->name : ''; ?></td>
									<td><?=$pr->block;?></td>
									<td><?=$pr->plot_no;?></td> 
									<td><?=$pr->size_gaj;?></td>
									<td><?=$pr->type;?></td> 
									<td><?= $client[$pr->client_id]->name.' , '.$client[$pr->client_id]->address;?></td>
									<td><?= date('d-F-Y', strtotime($pr->last_update)); ?></td> 
									<td><?= $pr->paid_amount?></td>
									<td><?= $user_info[$pr->member_id]->office?></td>
									<td><button type="button" class="form-control btn btn-primary manage-property" data-bs-toggle="modal" data-bs-target="#ManageProperty" data-clientid="<?= $pr->client_id;?>" data-bookingid="<?= $pr->id;?>"><i class="fa fa-eye" aria-hidden="true"></i> </button></td>
								</tr>
								<?php } } ?>
							</tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
 <!--add slider-->
 
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
 
 
 
<div class="app-drawer-overlay d-none animated fadeIn"></div>
     
	<?php include('common/footer_script.php'); ?>

	<script>
	$(function(){
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
	});
	 
</script>

</body>
</html>
