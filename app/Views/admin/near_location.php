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
                                <div>Near Location</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Location</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('web-admin/near_location');?>" method="get">
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
									<th>Detail</th>
									<th>Resource</th>
									<th>Distance</th>
									<th>LastUpdate</th>
									<th>UpdateBy</th>
									<th>Status</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
							<?php $i=1; foreach($location as $obj){ ?>
								<tr>
									<td><?=$i++;?></td>
									<td><?=$obj->detail;?></td>
									<td><?=$obj->resource;?></td>
									<td><?=$obj->distance;?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($obj->last_update)); ?></td>
									<td><?=$user_info[$obj->update_by]->f_name;?></td>
									<td id="Object-<?=$obj->id;?>">
									<?php if(in_array('3',$other_action)){ ?>
										<a href="#" data-url="<?=site_url('/web-admin/near_location/change_location_status');?>" data-id="<?=$obj->id;?>" data-status="<?=$obj->status;?>" class="change-status btn btn-primary"><?=($obj->status=="A")?'Deactive':'Active'?></a>
									<?php } ?>
									</td>
									<td>
									<?php if(in_array('2',$other_action)){ ?>
										<button class="btn btn-success edit-object" 
										data-id="<?=$obj->id;?>" 
										data-detail="<?=$obj->detail;?>" 
										data-sort="<?=$obj->sort;?>" 
										data-distance="<?=$obj->distance;?>" 
										data-resource="<?=$obj->resource;?>" 
										data-proj_id="<?= $obj->project_id;?>"
										data-bs-toggle="modal" 
										data-bs-target="#editObject"><i class="fa-sharp fa-solid fa-eye"></i></button>
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
					<h4 class="modal-title">Add Near Location </h4>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="form-submit" action="<?= site_url('web-admin/near_location/add_info'); ?>" method="post">
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group" >
								<label>Detail</label>
								<input type="text" name="detail" class="form-control" placeholder="Detail">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Distance</label>
								<input type="text" name="distance" class="form-control" placeholder="Distance">
							</div>
							<div class="col-md-6 col-sm-12 form-group">
								<label>Project name</label>
								<select name="proj_id" class="form-control" >
									<option>Project</option>
									<?php foreach($project_detail as $obj){ ?>
										<option value="<?=$obj->id;?>"><?=$obj->name;?></option>
									<?php } ?>
								</select>
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Resource</label>
								<input type="text" name="resource" class="form-control" placeholder="ex:bank,school">
							</div>
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Sort</label>
								<input type="number" name="sort" class="form-control" placeholder="Sort">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group">
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control">Add Near Location</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editObject" role="dialog">
		<div class="modal-dialog modal-lg modal-full">
			<div class="modal-content">
				<div class="modal-header">
					<p class="modal-title">Update Near Location</p>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12 attach-details">
							<form class="form-submit" action="<?=site_url('web-admin/near_location/update_info')?>">
								<div class="row">
									<div class="col-md-6 col-sm-12 form-group" >
										<label>Detail</label>
										<input type="text" name="edt_detail" class="form-control" placeholder="Detail">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12 form-group" >
										<label>Distance</label>
										<input type="text" name="edt_distance" class="form-control" placeholder="Distance">
									</div>
									<div class="col-md-6 col-sm-12 form-group">
										<label>Project name</label>
										<select class="form-control" name="edt_proj_id">
											<option value="">Choose Project</option>
											<?php if(isset($project_detail)){ foreach($project_detail as $obj){ ?>
											<option value="<?=$obj->id;?>"> <?=$obj->name;?></option>
											<?php } } ?>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 col-sm-12 form-group" >
										<label>Resource</label>
										<input type="text" name="edt_resource" class="form-control" placeholder="ex:Bank,School">
									</div>
									<div class="col-md-6 col-sm-12 form-group" >
										<label>Sort</label>
										<input type="number" name="edt_sort" class="form-control" placeholder="Sort">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
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
			var  id = $(this).data('id'); 
			var  detail = $(this).data('detail');
			var  resource = $(this).data('resource');
			var  distance = $(this).data('distance');
			var  sort = $(this).data('sort');
			var  proj_id = $(this).data('proj_id');
			//console.log(proj_name);
			$('input[name=edt_id]').attr('value',id);
			$('input[name=edt_detail]').attr('value',detail);
			$('input[name=edt_resource]').attr('value',resource);
			$('input[name=edt_distance]').attr('value',distance);
			$('input[name=edt_sort]').attr('value',sort);
			//$('select[name=edt_proj_name]').attr('value',proj_name);
			$('select[name=edt_proj_id]').val(proj_id);
		})
	});
</script>
</body>
</html>