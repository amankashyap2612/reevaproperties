<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('common/header_script.php'); ?>
	<style>
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
                                <div>Project</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Project</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('web-admin/project');?>" method="get">
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
									<th>S.no</th>
									<th>Image</th>
									<th>Name</th>
									<th>Insert Time</th>
									<th>LastUpdate</th>
									<th>UpdateBy</th>
									<th>Status</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($proj as $pj){ ?>
								<tr>
									<td><?=$i++;?></td>
									<td><img src="<?=base_url('images/'.(isset($image_detail[$pj->img_id])?$image_detail[$pj->img_id]:''));?>" style="width:100px;"></td>
									<td><?=$pj->name;?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($pj->insert_time)); ?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($pj->last_update)); ?></td>
									<td><?=$user_info[$pj->updated_by]->f_name;?></td>
									<td id="Object-<?=$pj->id;?>">
									<?php if(in_array('3',$other_action)){ ?>
										<a href="#" data-url="<?=site_url('/web-admin/project/change_project_status');?>" data-id="<?=$pj->id;?>" data-status="<?=$pj->status;?>" class="change-status btn btn-primary"><?=($pj->status=="A")?'Deactive':'Active'?></a>
									<?php } ?>
									</td>
									<td>
									<?php if(in_array('2',$other_action)){ ?>
										<button class="btn btn-success edit-object" 
										data-id="<?=$pj->id;?>"  
										data-name="<?=$pj->name;?>" 
										data-img_id="<?=$pj->img_id;?>"  
										data-image_src="<?=base_url('images/'.(isset($image_detail[$pj->img_id])?$image_detail[$pj->img_id]:''));?>" 
										data-bs-toggle="modal" data-bs-target="#editObject"><i class="fa-sharp fa-solid fa-eye"></i></button>
									<?php } ?>
									</td>
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
					<h4 class="modal-title">Add Project </h4>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#main">Add Project</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#media">Media</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#upload">Upload Image</a></li>
					</ul>
					<div class="tab-content">
						<div id="media" class="tab-pane p-10">
							<div class="row media-container">
								<?php if(isset($project_img)){ foreach($project_img as $loc){ ?>
								<div class="col-md-3 text-center">
									<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?= $loc->id;?>" data-display="add-image-frame" data-copy="image_id">
									<i class="ti-trash" data-project_img_id="<?= $loc->id;?>"></i>
								</div>
								<?php } } ?>
							</div>
						</div>
						<div id="upload" class="tab-pane p-10">
							<form class="form-submit" style="margin:40px 0;" action="<?= site_url('/web-admin/project/upload_project_img')?>" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12 form-group">
												<input type="file" name="project_image" multiple>
												<small>Image Size : (1200x900)</small>
												<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
												<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Upload</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div id="main" class="tab-pane in active">
							<form class="form-submit" action="<?=site_url('web-admin/project/add_project');?>">
								<div class="row">
									<div class="col-md-3" >
										<img src="<?=base_url("images/".$image_detail[26]);?>" class="img-thumbnail" id="add-image-frame">
									</div>
									<div class="col-md-6 col-sm-12 form-group" >
										<label>Name</label>
										<input type="text" name="name" class="form-control" placeholder="Project Name">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<input type="hidden" name="image_id" value="26">
										<button type="submit" class="btn btn-success form-control">Add Project</button>
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
					<p class="modal-title">Update Project</p>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#edt_main">Update Project</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#edt_media">Media</a></li>
					</ul>
					<div class="tab-content">
						<div id="edt_media" class="tab-pane p-10">
							<div class="row media-container">
							
								<?php if(isset($project_img)){ foreach($project_img as $loc){ ?>
								<div class="col-md-3">
									<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?= $loc->id;?>" data-display="edit-image-frame" data-copy="edt_image_id">
								</div>
								<?php } } ?>
							</div>
						</div>
						
						<div id="edt_main" class="tab-pane in active">
							<form class="form-submit" action="<?=site_url('web-admin/project/update_project')?>">
								<div class="row">
									<div class="col-md-3" >
										<img src="<?=base_url("images/".$image_detail[26]);?>" class="img-thumbnail" id="edit-image-frame">
									</div>
									<div class="col-md-6 col-sm-12 form-group" >
										<label>Name</label>
										<input type="text" name="edt_name" class="form-control" placeholder="Project Name">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<input type="hidden" name="edt_image_id" value="26">
										<input type="hidden" name="edt_id" value="">
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
	$(function(){
		$('.edit-object').on('click',function(){
			var  name = $(this).data('name');
			var  id = $(this).data('id'); 
			var img_id = $(this).data("img_id");
			var image_src = $(this).data("image_src");
			
			$('input[name=edt_name]').attr('value',name);
			$('input[name=edt_id]').attr('value',id);
			$("input[name='edt_image_id']").attr("value",img_id);
			$("#edit-image-frame").attr("src",image_src);
		})
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
			var proj_img_id = $(this).data("project_img_id");
			$.ajax({
				url:'<?= site_url('web-admin/project/project_image_delete');?>',
				type:'post',
				data: {proj_img_id:proj_img_id,[csrf_token]:csrf_hash},
				dataType: 'json',
				cache: false,
				success: function(result){
					if(result.success == true)
					{
						window.location = window.location.href;
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
</script>
</body>
</html>