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
                                <div>Gallery</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Gallery</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('web-admin/gallery');?>" method="get">
							<div class="row">
								<div class="col-md-6">
									<select class="form-control" name="status">
										<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
										<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
									</select>
								</div>
								<div class="col-md-3">
									<input type="submit" class="form-control btn btn-success" value="Fetch">
								</div>
								<div class="col-md-3">
								<?php if(in_array('1',$other_action)){ ?>
									<input type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addObject" value="Add New">
								<?php } ?>
								</div>
							</div>
						</form>
						<table class="table table-hover table-striped table-bordered mt-4">
							<thead>
								<tr>
									<th>Image</th>
									<th>Plot No</th>
									<th>Area</th>
									<th>Updated On</th>
									<th>Updated By</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($gallery as $obj){?>
								<tr>
									<td><a href="<?=base_url('images/'.$image_detail[$obj->img_id]);?>" target="_blank"><img src="<?=base_url('images/'.$image_detail[$obj->img_id]);?>" style="width:100px;"></a></td>
									<td><?= $obj->plot_no; ?></td>
									<td><?= $obj->area; ?></td>
									<td><?= $obj->last_update; ?></td>
									<td><?= $user_info[$obj->update_by]->f_name; ?></td>
									<td id="Object-<?=$obj->id;?>">
									<?php if(in_array('3',$other_action)){ ?>
										<a href="#" data-url="<?=site_url('/web-admin/gallery/change-status-gallery');?>" data-id="<?=$obj->id;?>" data-status="<?=$obj->status;?>" class="change-status btn btn-primary"><?=($obj->status=="A")?'Deactive':'Active'?></a>
									<?php } ?>
									</td>
									<td><a class="edit-object btn btn-primary" href="#" 
									data-bs-toggle="modal" 
									data-bs-target="#editObject" 
									data-imgid="<?=$obj->img_id?>" 
									data-plot_no="<?= $obj->plot_no; ?>" 
									data-area="<?= $obj->area; ?>"
									data-proj_id="<?= $obj->project_id; ?>"
									data-img_src="<?= site_url();?>images/<?= $image_detail[$obj->img_id]; ?>" data-id="<?= $obj->id; ?>" >Edit</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addObject" role="dialog">
		<div class="modal-dialog modal-lg modal-full">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<p class="modal-title">Add Gallery</p>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#main">Add Gallery</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#mediaadd">Media</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#uploadadd">Upload</a></li>
					</ul>
					<div class="tab-content">
						<div id="uploadadd" class="tab-pane">
							<form class="form-submit" style="margin:40px 0;" action="<?= site_url('/web-admin/gallery/upload_gallery_img')?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												<label>Gallery Image: (1200x900)</label>
												<input type="file" name="gallery_images" id="upphoto" class="form-control">
											</div>
											<div class="col-md-12">
												<input type="hidden" name="croppedImg" value="">
												<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
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
						
						<div id="mediaadd" class="tab-pane">
							<div class="row media-container">
								<?php if(isset($gallery_img)){ foreach($gallery_img as $loc){?>
								<div class="col-md-3 text-center">
									<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?=$loc->id;?>" data-display="add-image-frame" data-copy="image_id">
									<!-- delete icon bottom of image -->
									<i class="ti-trash" data-gallery_img_id="<?=$loc->id;?>"></i>
								</div>
								<?php  } } ?>
							</div>
						</div>
						
						<div id="main" class="tab-pane in active">
							<form class="form-submit" action="<?= site_url('/web-admin/gallery/add_gallery')?>">
								<div class="row">
									<div class="col-md-4 col-sm-12" >
										<img src="<?=base_url("images/".$image_detail[9]);?>" class="img-thumbnail" id="add-image-frame">
									</div>
									<div class="col-md-8 col-sm-12">
										<div class="row">
											<div class="col-md-12 col-sm-12 form-group" >
												<input type="text" name="plot_no" class="form-control" placeholder="Plot No">
											</div>
											<div class="col-md-12 col-sm-12 form-group" >
												<input type="number" name="area" class="form-control" placeholder="Area">
											</div>
											<div class="col-md-12 col-sm-12 form-group">
												<select name="proj_id" class="form-control" >
													<option>Project Name</option>
													<?php foreach($project_detail as $obj){ ?>
														<option value="<?=$obj->id;?>"><?=$obj->name;?></option>
													<?php } ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input type="hidden" name="image_id" value="9">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<button type="submit" class="btn btn-success" style="width: 100%;"> <span class="btn-val">Add Gallery</span></button>
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
					<p class="modal-title">Edit Gallery</p>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#edt_main">Update Gallery</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#edt_media">Media</a></li>
					</ul>
					<div class="tab-content">
						<div id="edt_media" class="tab-pane">
							<div class="row media-container">
								<?php if(isset($gallery_img)){ foreach($gallery_img as $loc){ ?>
								<div class="col-md-3 text-center">
									<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?=$loc->id;?>" data-display="edit-image-frame" data-copy="edt_image_id">
									<i class="ti-trash"  data-gallery_img_id="<?=$loc->id;?>"></i>
								</div>
								<?php } } ?>
							</div>
						</div>
						<div id="edt_main" class="tab-pane in active">
							<form class="form-submit" method="post" action="<?= site_url('/web-admin/gallery/update_gallery')?>">
								<div class="row">
									<div class="col-md-4 col-sm-12" >
										<img src="<?=base_url("images/".$image_detail[9]);?>" class="img-thumbnail" id="edit-image-frame">
									</div>
									<div class="col-md-8 col-sm-12" >
										<div class="row">
											<div class="col-md-12 col-sm-12 form-group">
												<input type="text" name="edt_plot_no" class="form-control" placeholder="Plot No">
											</div>
											<div class="col-md-12 col-sm-12 form-group" >
												<input type="number" name="edt_area" class="form-control" placeholder="Area">
											</div>
											<div class="col-md-12 col-sm-12 form-group">
												<select class="form-control" name="edt_proj_id">
													<option value="">Choose Project</option>
													<?php if(isset($project_detail)){ foreach($project_detail as $obj){ ?>
													<option value="<?=$obj->id;?>"> <?=$obj->name;?></option>
													<?php } } ?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input type="hidden" class="form-control" name="edt_image_id">
										<input type="hidden" class="form-control" name="edt_id">
										<input id="csrf-token" type="hidden" name="<?= csrf_token();?>" value="<?= csrf_hash();?>">
										<button type="submit" class="btn btn-success" style="width: 100%;"> <span class="btn-val">Update Gallery</span></button>
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
        $( function() {
			
			$('.edit-object').on('click',function(){
				var id = $(this).data('id');
				var imgid = $(this).data('imgid');
				var plot_no = $(this).data('plot_no');
				var area = $(this).data('area');
				var img_src = $(this).data('img_src');
				var proj_id = $(this).data('proj_id');
				
				$('input[name=edt_id]').attr('value',id);
				$('input[name=edt_image_id]').attr('value',imgid);
				$('input[name=edt_plot_no]').attr('value',plot_no);
				$('input[name=edt_area]').attr('value',area);
				$('#edit-image-frame').attr('src',img_src);
				$('select[name=edt_proj_id]').val(proj_id);
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
			
			$("#upphoto").finecrop({
				viewHeight: 1400,
				cropWidth: 1200,
				cropHeight: 900,
				cropInput: 'inputImage',
				cropOutput: 'croppedImg',
				zoomValue: 50
			});
		});
    </script>
</body>
</html>