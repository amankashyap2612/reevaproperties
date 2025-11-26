<!DOCTYPE html>
<html lang="en">
<head>
	<?php include('common/header_script.php'); ?>
	<style>
		#croppedImg{ 
			height:160px;
		}
		.media-container{
			height: 300px;
			overflow-x: hidden;
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
					<div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div>Property <span><?= isset($property) ? count($property) : 0 ?></span></div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Property</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<form action="<?=site_url('web-admin/property');?>" method="get">
						<div class="row">
							<div class="col-md-2">
								<select class="form-control project" name="project" data-change="block" >
									<option value="">Choose Project</option>
									<?php foreach($project_detail as $obj){ ?>
										<option value="<?=$obj->id?>"  <?= (($project == $obj->id)?'selected':'')?>  >  <?= $obj->name;?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-2">
								<select class="form-control block" name="block" data-change="area" >
									<option value="">Choose Block</option>
									<?php if(isset($blocks)){  foreach($blocks as $obj){?>
										 <option value="<?= $obj->blocks;?>" <?=($obj->blocks == $block)?'selected':'';?> ><?= $obj->blocks;?> Block</option>
									<?php } }?>
								</select>
							</div>
							<div class="col-md-2">
								<select class="form-control" name="area" >
									<option value="">Choose Area</option>
									<?php if(isset($areas)){  foreach($areas as $obj){?>
										 <option value="<?= $obj->areas;?>" <?=($obj->areas == $area)?'selected':'';?> ><?= $obj->areas;?> Gaj </option>
									<?php } }?>
								</select>
							</div>
							<div class="col-md-2">
								<select class="form-control" name="status">
									<option value="A" <?php echo (('A'== $status)?'selected':''); ?>>Activated</option>
									<option value="D" <?php echo (('D'== $status)?'selected':''); ?>>Deactivated</option>
								</select>
							</div>
							<div class="col-md-2">
								<input type="submit" class="form-control btn btn-success" value="Fetch">
							</div>
							<div class="col-md-2">
							<?php if(in_array('1',$other_action)){ ?>
								<input type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addObject" value="Add New">
							<?php } ?>
							</div>
						</div>
					</form>
					<table class="table table-hover table-striped table-bordered mt-4">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Images</th>
								<th>Plot No</th>
								<th>Area(sq)</th>
								<th>Size(Gaj)</th>
								<th>Type</th>
								<th>Property status</th>      
								<th>Status</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php  $count = 1; if(isset($property)) { foreach($property as $pr){ ?> 
							<tr>
								<td><?= $count++;?></td>
								<td><img src="<?=base_url('images/'.(isset($image_detail[$pr->img_id])?$image_detail[$pr->img_id]:''));?>" style="width:100px;"></td>
								<td><?=$pr->plot_no;?></td>
								<td><?=$pr->area_sq; ?></td>
								<td><?=$pr->size_gaj;?></td>
								<td><?=$pr->type;?></td>
								<td><?php if($pr->prop_status == 'A'){?>
									<button class="btn btn-primary">Available</button>
								<?php }elseif($pr->prop_status == 'T'){?>
									<button class="btn btn-warning">Token</button>
								<?php }elseif($pr->prop_status == 'P'){?>
									<button class="btn btn-primary">Partially Booked</button>
								<?php }elseif($pr->prop_status == 'B'){?>
									<button class="btn btn-success">Booked</button>
								<?php }elseif($pr->prop_status == 'S'){?>
									<button class="btn btn-danger">Sold</button>
								<?php }?>
								</td>
								<td id="Object-<?=$pr->id;?>"> 
									<a href="#" data-url="<?=site_url('/web-admin/property/prop_change_status');?>" data-id="<?=$pr->id;?>" data-status="<?=$pr->status;?>" class="change-status btn btn-primary"><?=($pr->status=="A")?'Deactive':'Active'?></a> 
								</td>
								<td> 
									<button class="btn btn-success edit-object" 
									data-id="<?=$pr->id;?>" 
									data-plot_no="<?=$pr->plot_no;?>"
									data-area_sq="<?=$pr->area_sq;?>" 
									data-size_gaj="<?=$pr->size_gaj;?>" 
									data-type="<?=$pr->type;?>" 
									data-prop_status="<?=$pr->prop_status;?>" 
									data-block="<?=$pr->block;?>" 
									data-img_id="<?=$pr->img_id;?>"  
									data-image_src="<?=base_url('images/'.(isset($image_detail[$pr->img_id])?$image_detail[$pr->img_id]:''));?>" 
									data-bs-toggle="modal" data-bs-target="#editObject"><i class="fa-sharp fa-solid fa-eye"></i></button> 
								</td>
							</tr>
							<?php } } ?>
						</tbody>
					</table>
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
							<?php if(isset($property_img)){ foreach($property_img as $loc){ ?>
							<div class="col-md-3 text-center">
								<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?= $loc->id;?>" data-display="add-image-frame" data-copy="image_id">
								<!-- delete icon bottom of image -->
								<i class="ti-trash" data-property_img_id="<?= $loc->id;?>"></i>
							</div>
							<?php  } } ?>
						</div>
					</div>
					
					<!-- image upload -->
					<div id="upload" class="tab-pane p-10">
						<form class="form-submit" action="<?= site_url('web-admin/property/property_images_upload')?>">
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
						<form method="post" action="<?= site_url('web-admin/property/add_property');?>" class="form-submit">
							<div class="row">
								<div class="col-md-4 col-sm-12" >
									<img src="<?=base_url("images/property/2024050810141072.png");?>" class="img-thumbnail" id="add-image-frame">
								</div>
								<div class="col-md-8 col-sm-12" >
									<div class="row">
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Plot Number</label>
											<input type="number" name="plot_no" class="form-control" placeholder="plot no">
										</div>
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Area</label>
											<input type="number" name="area_sq" class="form-control" placeholder="area">
										</div>
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Size(gaj)</label>
											<input type="number" name="size_gaj" class="form-control" placeholder="size">
										</div>
										<div class="col-md-4 col-sm-12 form-group" >
											<label>Property Status</label>
											<select class="form-control" name="prop_status">
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
											<select class="form-control" name="block">
												<option value="">Block</option>
												<option value="A">A Block</option>
												<option value="B">B Block</option>
												<option value="C">C Block</option>
												<option value="D">D Block</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-12 form-group">
											<label>Type</label>
											<select class="form-control" name="type">
												<option value="">Choose Property Type</option>
												<option value="Apartment">Apartment</option>
												<option value="Plot">Plot</option>
												<option value="House">House</option>
												<option value="Flat">Flat</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-12 form-group">
											<label>Project name</label>
											<select name="name" class="form-control" >
												<option value ="">Choose Project</option>
												<?php foreach($project_detail as $obj){ ?>
													<option value="<?= $obj->id;?>"><?= $obj->name;?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
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
		<!-- Modal content-->
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
							<?php if(isset($property_img)){ foreach($property_img as $loc){ ?>
							<div class="col-md-3">
								<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?= $loc->id;?>" data-display="edit-image-frame" data-copy="edt_image_id">
							</div>
							<?php } } ?>
						</div>
					</div>
					
					<div id="edt_main" class="tab-pane in active">
						<form class="form-submit" action="<?=site_url('web-admin/property/update_property');?>">
							<div class="row">
								<div class="col-md-4 col-sm-12" >
									<img src="<?=base_url("images/property/2024050810141072.png");?>" class="img-thumbnail" id="add-image-frame">
								</div>
								<div class="col-md-8 col-sm-12" >
									<div class="row">
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Plot Number</label>
											<input type="number" name="edt_plot_no" class="form-control" placeholder="Plot No">
										</div>
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Area</label>
											<input type="number" name="edt_area_sq" class="form-control" placeholder="area">
										</div>
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Size(gaj)</label>
											<input type="number" name="edt_size_gaj" class="form-control" placeholder="size">
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Property Status</label>
											<select class="form-control" name="edt_prop_status">
												<option value="prop_status">status</option>
												<option value="Available">Available</option>
												<option value="Booked">Booked</option>
												<option value="Partially Booked">Partially Booked</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Block</label>
											<select class="form-control" name="edt_block">
												<option value="Block">Block</option>
												<option value="A">A Block</option>
												<option value="B">B Block</option>
												<option value="C">C Block</option>
												<option value="D">D Block</option>
											</select>
										</div>
										<div class="col-md-4 col-sm-6 form-group" >
											<label>Type</label>
											<select class="form-control" name="edt_type">
												<option value="Type">Type</option>
												<option value="Apartment">Apartment</option>
												<option value="Plot">Plot</option>
												<option value="House">House</option>
												<option value="Flat">Flat</option>
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
<div class="app-drawer-overlay d-none animated fadeIn"></div> 
	<?php include('common/footer_script.php'); ?>
	<script>
	$(document).ready(function(){
		
		$('.edit-object').on('click',function(){
			var  id = $(this).data('id');
			var  plot_no = $(this).data('plot_no');
			var  area = $(this).data('area_sq'); 
			var size = $(this).data("size_gaj");
			var prop_status = $(this).data("prop_status");
			var proj_id = $(this).data("proj_id");
			var block = $(this).data("block");
			var type = $(this).data("type");
			console.log(prop_status);
			$('input[name=edt_id]').attr('value',id);
			$('input[name=edt_plot_no]').attr('value',plot_no);
			$('input[name=edt_area_sq]').attr('value',area);
			$('input[name=edt_size_gaj]').attr('value',size);
			$('select[name="edt_block"]').find('option[value="'+block+'"]').attr("selected",true);
			$('select[name="edt_type"]').find('option[value="'+type+'"]').attr("selected",true);
			$('select[name="edt_prop_status"]').find('option[value="'+prop_status+'"]').attr("selected",true);
			$('select[name="edt_proj_id"]').find('option[value="'+proj_id+'"]').attr("selected",true);
			
		});
		
		$("#upphoto").finecrop({
			viewHeight: 500,
			cropWidth: 370,
			cropHeight: 240,
			cropInput: 'inputImage',
			cropOutput: 'croppedImg',
			zoomValue: 50
		});
		
		
		
	});

	
</script>
</body>
</html>