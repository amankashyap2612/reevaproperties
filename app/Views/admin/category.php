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
                                <div>Category</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Category</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('web-admin/category');?>" method="get">
							<div class="row">
								<div class="col-md-6">
									<select class="form-control" name="status">
										<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
										<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
									</select>
								</div>
								<div class="col-md-3">
									<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
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
									<th>Catgeory Name</th>
									<th>LastUpdate</th>
									<th>UpdateBy</th>
									<th>Status</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($category as $obj){ ?>
								<tr>
									<td><?=$i++;?></td>
									<td><?=$obj->name;?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($obj->last_update)); ?></td>
									<td><?=$user_info[$obj->update_by]->f_name;?></td>
									<td id="Object-<?=$obj->id;?>">
									<?php if(in_array('3',$other_action)){ ?>
										<a href="#" data-url="<?=site_url('/web-admin/category/change_category_status');?>" data-id="<?=$obj->id;?>" data-status="<?=$obj->status;?>" class="change-status btn btn-primary"><?=($obj->status=="A")?'Deactive':'Active'?></a>
									<?php } ?>
									</td>
									<td>
									<?php if(in_array('2',$other_action)){ ?>
										<button class="btn btn-success edit-object" data-id="<?=$obj->id;?>"  data-name="<?=$obj->name;?>" data-bs-toggle="modal" data-bs-target="#editObject"><i class="fa-sharp fa-solid fa-eye"></i></button>
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
					<h4 class="modal-title">Add Category </h4>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="form-submit" action="<?=site_url('web-admin/category/add_category');?>">
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Category Name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group">
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control">Add Category</button>
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
					<p class="modal-title">Update category</p>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12 attach-details">
							<form class="form-submit" action="<?=site_url('web-admin/category/update_category')?>">
								<div class="row">
									<div class="col-md-6 col-sm-12 form-group" >
										<label>Name</label>
										<input type="text" name="edt_name" class="form-control" placeholder="Category Name">
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
			
			var  name = $(this).data('name');
			var  id = $(this).data('id'); 
			
			$('input[name=edt_name]').attr('value',name);
			$('input[name=edt_id]').attr('value',id);
		})
	});
</script>
</body>
</html>