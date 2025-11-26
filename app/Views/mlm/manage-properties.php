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
                                <div>Manage Property  <?php if(isset($search)){ count($search);}?></span></div>
                            </div> 
                        </div>
                    </div>
					<form action="<?=site_url('members/manage-properties');?>" method="get" class="mrg">
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
							<div class="col-md-3 col-sm-6 mb-4 form-gro">
								<label>Property Status</label>
								<select class="form-control" name="prop_status">
									<option value="A" <?php echo (('A'==$prop_status)?'selected':''); ?>>Available</option>
									<option value="B" <?php echo (('B'==$prop_status)?'selected':''); ?>>Booked</option>
									<option value="P" <?php echo (('P'==$prop_status)?'selected':''); ?>>Partially Booked</option>
									<option value="S" <?php echo (('S'==$prop_status)?'selected':''); ?>>Sold</option>
								</select>
							</div>
							<div class="col-md-4  col-sm-6 mb-2">
								<select class="form-control" name="status">
									<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
									<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
								</select>
							</div>
							<div class="col-md-4  col-sm-6 mb-2 "> 
								<input type="submit" class="form-control btn btn-success" value="Fetch">
							</div>
							<div class="col-md-4  col-sm-6 mb-2">
							<?php if(in_array('1',$other_action)){ ?> 
								<input type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addObject" value="Add New">
							<?php } ?>
							</div>
						</div>
					</form>
					<div class="card-body table-responsive">
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>S.no</th> 
									<th>Block</th>
									<th>Plot No</th>
									<th>Area(sq ft)</th>
									<th>Size(Gaj)</th>
									<th>Type</th>
									<th>Property status</th>   
									<th>Action</th>
									<th>Edit</th>
									<?php if(isset($prop_status) && $prop_status == 'S'){ ?>
										<th>View Client</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; if(isset($search)){ foreach($search as $pr){ ?>
								<tr>
									<td><?= $count++;?></td>
									<td><?=$pr->block;?></td>
									<td><?=$pr->plot_no;?></td>
									<td><?=$pr->area_sq; ?></td>
									<td><?=$pr->size_gaj;?></td>
									<td><?=$pr->type;?></td>
									<td><?php if($pr->prop_status == 'A'){ ?>
										<button class="btn btn-primary">Available</button>
									<?php }elseif($pr->prop_status == 'T'){ ?>
										<button class="btn btn-warning">Token</button>
									<?php }elseif($pr->prop_status == 'P'){ ?>
										<button class="btn btn-warning">Partially Booked</button>
									<?php }elseif($pr->prop_status == 'B'){ ?>
										<button class="btn btn-success">Booked</button>
									<?php }elseif($pr->prop_status == 'S'){ ?>
										<button class="btn btn-danger">Sold</button>
									<?php } ?>
									</td> 
									<td id="object-<?=$pr->id;?>">
									<?php if(in_array('3',$other_action)){ ?>
										<a href="#" data-url="<?=site_url('members/mlm-property/prop_change_status');?>" data-id="<?=$pr->id;?>" data-status="<?=$pr->status;?>" class="change-status btn <?=($pr->status=="A")?"btn-danger":"btn-primary"?>"><?=($pr->status=="A")?"DEACTIVE":"ACTIVE"?></a>
									<?php } ?>
									</td>
									<td>
									<?php if(in_array('2',$other_action)){ ?>
										<button class="btn btn-success edit-object" data-id="<?=$pr->id;?>" data-img_id="<?=$pr->img_id;?>" data-image_src="<?=base_url('images/'.(isset($images[$pr->img_id])?$images[$pr->img_id]:''));?>" data-plot_no="<?=$pr->plot_no;?>"data-area_sq="<?=$pr->area_sq;?>" data-size_gaj="<?=$pr->size_gaj;?>" data-type="<?=$pr->type;?>" data-prop_status="<?=$pr->prop_status;?>" data-block="<?=$pr->block;?>" data-project="<?=$pr->project_id;?>" data-bs-toggle="modal" data-bs-target="#editObject"><i class="fa-sharp fa-solid fa-eye"></i></button>
									<?php } ?>
									</td>
									<?php if(isset($prop_status) && $prop_status == 'S'){ ?>
										<td><button type="button" class="form-control btn btn-primary manage-property" data-bs-toggle="modal" data-bs-target="#ManageProperty" data-clientid="<?= $property_booking[$pr->id]->client_id;?>" data-bookingid="<?= $property_booking[$pr->id]->id;?>"><i class="fa fa-eye" aria-hidden="true"></i> </button></td>
									<?php } ?>
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
	
<div class="modal fade" id="addObject" role="dialog">
	<div class="modal-dialog modal-lg modal-full">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<p class="modal-title">Add property</p>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#main">Add Property</a></li>
					<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#media">Media</a></li>
					<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#upload">Upload</a></li>
				</ul>
				<div class="tab-content">
					<div id="media" class="tab-pane p-10">
						<div class="row media-container">
							<?php if(isset($images)){ foreach($images as $id => $loc){ ?>
							<div class="col-md-3 text-center">
								<img src="<?=base_url("images/".$loc);?>" class="img-thumbnail banner-img" data-img_id="<?=$id;?>" data-display="add-image-frame" data-copy="image_id">
								<!-- delete icon bottom of image -->
								<i class="ti-trash" data-property_img_id="<?=$id;?>"></i>
							</div>
							<?php  } } ?>
						</div>
					</div>
					
					<!-- image upload -->
					<div id="upload" class="tab-pane p-10">
						<form class="form-submit" action="<?= site_url('members/mlm-property/property_images_upload')?>">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-12">
											<label>Property Image</label>
											<input type="file" name="property_images" id="upphoto" class="form-control">
										</div>
										<div class="col-md-12">
											<input type="hidden" name="croppedImg" value="">
											<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
											<input type="hidden" name="filter_status" value="<?=$status;?>">
											<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Upload</button>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<img id="croppedImg">
								</div>
							</div>
						</form>
					</div>
					
					<div id="main" class="tab-pane in active">
						<form class="form-submit" action="<?=site_url('members/mlm-property/add_property');?>">
							<div class="row">
								<div class="col-md-4 col-sm-12" >
									<img src="<?=base_url("images/property/2024050810141072.png");?>" class="img-thumbnail" id="add-image-frame">
								</div>
								<div class="col-md-8 col-sm-12" >
									<div class="row">
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Plot Number</label>
											<input type="number" name="plot" class="form-control" placeholder="plot no">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Area</label>
											<input type="number" name="area" class="form-control" placeholder="area">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Size(gaj)</label>
											<input type="number" name="size" class="form-control" placeholder="size">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Property Status</label>
											<select class="form-control" name="p_status">
												<option value="">Choose Property Status</option>
												<option value="A">Available</option>
												<option value="T">Token</option>
												<option value="P">Partially Booked</option>
												<option value="B">Booked</option>
												<option value="S">Sold</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-12 form-group">
											<label>Block</label>
											<input name="block" class="form-control" type="text" placeholder="A">
										</div>
										<div class="col-md-4 col-sm-12 form-group">
											<label>Type</label>
											<select class="form-control" name="type">
												<option value="">Choose Property Type</option>
												<option value="Plot">Plot</option>
												<option value="Apartment">Apartment</option>
												<option value="House">House</option>
												<option value="Flat">Flat</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-12 form-group">
											<label>Project name</label>
											<select name="project" class="form-control" >
												<?php foreach($proj as $id => $obj){ ?>
													<option value="<?=$obj->id;?>"><?=$obj->name;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<input type="hidden" name="image_id" id="img_id" value="73">
										<input type="hidden" name="filter_project" value="<?=$project;?>">
										<input type="hidden" name="filter_block" value="<?=$block;?>">
										<input type="hidden" name="filter_size" value="<?=$size;?>">
										<input type="hidden" name="filter_status" value="<?=$status;?>">
										<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Add</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editObject" role="dialog">
	<div class="modal-dialog modal-lg modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<p class="modal-title">Edit Property</p>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#edt_main">Update property</a></li>
					<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#edt_media">Media</a></li>
				</ul>
				<div class="tab-content">
					<div id="edt_media" class="tab-pane p-10">
						<div class="row media-container">
							<?php if(isset($images)){ foreach($images as $id => $loc){ ?>
							<div class="col-md-3">
								<img src="<?=base_url("images/".$loc);?>" class="img-thumbnail banner-img" data-img_id="<?=$id;?>" data-display="edit-image-frame" data-copy="edt_image_id">
							</div>
							<?php } } ?>
						</div>
					</div>
					
					<div id="edt_main" class="tab-pane in active">
						<form class="form-submit" action="<?=site_url('members/mlm-property/update_property');?>">
							<div class="row">
								<div class="col-md-4 col-sm-12" >
									<img src="" class="img-thumbnail" id="edit-image-frame">
								</div>
								<div class="col-md-8 col-sm-12" >
									<div class="row">
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Plot Number</label>
											<input type="number" name="edt_plot_no" class="form-control" placeholder="Plot No">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Area</label>
											<input type="number" name="edt_area_sq" class="form-control" placeholder="area">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Size(gaj)</label>
											<input type="number" name="edt_size_gaj" class="form-control" placeholder="size">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Property Status</label>
											<select class="form-control" name="edt_prop_status">
												<option value="">Choose Property Status</option>
												<option value="A">Available</option>
												<option value="T">Token</option>
												<option value="P">Partially Booked</option>
												<option value="B">Booked</option>
												<option value="S">Sold</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Block</label>
											<input name="edt_block" class="form-control" type="text" placeholder="A">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Type</label>
											<select class="form-control" name="edt_type">
												<option value="">Choose Property Type</option>
												<option value="Plot">Plot</option>
												<option value="Apartment">Apartment</option>
												<option value="House">House</option>
												<option value="Flat">Flat</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-12 form-group">
											<label>Project name</label>
											<select name="edt_project" class="form-control" >
												<?php foreach($proj as $id => $obj){ ?>
													<option value="<?=$obj->id;?>"><?=$obj->name;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 form-group">
									<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
									<input type="hidden" name="edt_id" value="">
									<input type="hidden" name="edt_image_id" value="">
									<input type="hidden" name="filter_project" value="<?=$project;?>">
									<input type="hidden" name="filter_block" value="<?=$block;?>">
									<input type="hidden" name="filter_size" value="<?=$size;?>">
									<input type="hidden" name="filter_status" value="<?=$status;?>">
									<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Update</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
    </div>
</div>


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
						<?php if(in_array('4',$other_action)){ ?>
							<button class="nav-link border active" id="v-pills-detail-tab" data-bs-toggle="pill" data-bs-target="#v-pills-detail" type="button" role="tab" aria-controls="v-pills-detail" aria-selected="true">Details</button>
						<?php } ?> 
						</div>
					</div>
					<div class="col-md-9">
						<div class="tab-content" id="v-pills-tabContent">
							<?php if(in_array('4',$other_action)){ ?>
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
		$('.edit-object').on('click',function(){
			var id = $(this).data('id');
			var img_id = $(this).data("img_id");
			var image_src = $(this).data("image_src");
			var plot_no = $(this).data('plot_no');
			var area = $(this).data('area_sq'); 
			var size = $(this).data("size_gaj");
			var type = $(this).data("type");
			var prop_status = $(this).data("prop_status");
			var block = $(this).data("block");
			var proj_id = $(this).data("project");
			
			$('input[name=edt_id]').attr('value',id);
			$('input[name=edt_image_id]').attr('value',img_id);
			$('input[name=edt_plot_no]').attr('value',plot_no);
			$('input[name=edt_area_sq]').attr('value',area);
			$('input[name=edt_size_gaj]').attr('value',size);
			$('input[name=edt_block]').attr('value',block);
			$('select[name="edt_type"]').find('option[value="'+type+'"]').attr("selected",true);
			$('select[name="edt_prop_status"]').find('option[value="'+prop_status+'"]').attr("selected",true);
			$('select[name="edt_project"]').find('option[value="'+proj_id+'"]').attr("selected",true);
			$("#edit-image-frame").attr("src",image_src);
		});
	});
	$('.banner-img').on('click',function(){
		var src = $(this).attr("src");
		var img_id = $(this).data("img_id");
		var copy = $(this).data("copy");
		var display = $(this).data("display");
		$("input[name='"+copy+"']").attr("value",img_id);
		$("#"+display).attr("src",src);
		$('.banner-img').css("background-color","#fff");
		$(this).css("background-color","darkcyan");
	});

	$(".ti-trash").click(function(){
		if(confirm('Are You Sure To Delete This')==true)
		{
			var prop_img_id = $(this).data("property_img_id");
			$.ajax({
				url:'<?= site_url('mlm-admin/mlm-property/property_images_delete');?>',
				type:'post',
				data: {prop_img_id:prop_img_id,[csrf_token]:csrf_hash},
				dataType: 'json',
				cache: false,
				success: function(result){
					if(result.success == true)
					{
						if(result.rlink)
						{   
							window.location.href = result.rlink;
						}
						else if(result.alert)
						{   
							frm.before(result.alert);
						}
						else if(result.alert1)
						{  
							frm.before(result.alert1);
							frm.remove();   
						}
						else
						{
							window.location = window.location.href;
						}
					}
					else
					{   
						$.each(result.message, function(key,value){
							var inpt = frm.find('input[name='+key+'], textarea[name='+key+'], select[name='+key+']');   
							if(value.length > 2)
							{
								if(result.border == true)
								{  
									inpt.addClass('border-danger');
									$('#toast-erromsg').show().append(value);   
								}else{
									inpt.addClass('border-danger').before(value);  
								}
							}        
						});
						setTimeout(function(){   
							$('#toast-erromsg').fadeOut(600)
						}, 3500);                  
					}
					$('.preloader').hide();
				}
			});
		}
	});
	
	$("#upphoto").finecrop({
		viewHeight: 500,
		cropWidth: 370,
		cropHeight: 240,
		cropInput: 'inputImage',
		cropOutput: 'croppedImg',
		zoomValue: 50
	});
</script>
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