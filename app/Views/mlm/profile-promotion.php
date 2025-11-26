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
                                <div>Profile & Promotion</div>
                            </div> 
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('members/profile-promotion');?>" method="GET">
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
										<th>Position</th>
										<th>Key</th>
										<th>Next Promotion</th>
										<th>Direct Sale</th>
										<th>Group Sale</th>
										<th>Required Prof</th> 
										<th>Required Count</th> 
										<?php if(in_array('2',$other_action)){ ?>
										<th>Update</th> 
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php if(isset($load_data)){ $i=1; foreach($load_data as $obj){ ?>
									<tr>
										<td><?=$i++;?></td>
										<td><?= $obj->name;?></td> 
										<td><?= $obj->user_key;?></td> 
										<td><?= isset($profiles[$obj->next_profile_id])?$profiles[$obj->next_profile_id]:'None';?></td>
										<td><?= $obj->direct_sale;?></td>
										<td><?= $obj->group_sale;?></td>
										<td><?= isset($profiles[$obj->require_profile])?$profiles[$obj->require_profile]:'None'; ?></td>
										<td><?= $obj->require_profile_count; ?></td>
										<?php if(in_array('1',$other_action)){ ?>
										<td><button type="button" class="btn btn-warning editObject" data-bs-toggle="modal" data-bs-target="#editObject" data-id="<?=$obj->id;?>" data-user_key="<?=$obj->user_key;?>" data-name="<?=$obj->name;?>" data-direct_sale="<?=$obj->direct_sale;?>" data-group_sale="<?=$obj->group_sale;?>" data-next_profile_id="<?=$obj->next_profile_id;?>" data-require_profile="<?=$obj->require_profile;?>" data-require_profile_count="<?=$obj->require_profile_count;?>"><i class="fa fa-pencil"></i></button></td>
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
		</div>
	</div>
	<div class="modal fade" id="editObject" role="dialog">
		<div class="modal-dialog modal-lg modal-full">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Update Promotion</h4>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="form-submit" action="<?=site_url('members/user/update_promotion')?>">
						<div class="row">
							<div class="col-md-4 col-sm-12 form-group" >
								<label>Position *</label>
								<input type="text" name="edt_position" class="form-control" placeholder="Position"  oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');"   >
							</div>
							<div class="col-md-4 col-sm-12 form-group" >
								<label>User Key *</label>
								<input type="text" name="edt_user_key" class="form-control" placeholder="User Key"  oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');"   >
							</div>
							<div class="col-md-4 col-sm-12 form-group" >
								<label>Next Position *</label>
								<select name="edt_next_position" class="form-control">
									<option value="0">None</option>
									<?php foreach($profiles as $id => $name){ ?>
									<option value="<?=$id;?>"><?=$name;?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6 col-sm-12 form-group ">
								<label> Require Direct Sale *</label>
								<input type="number" name="edt_direct_sale" class="form-control" placeholder="0">
							</div>
							<div class="col-md-6 col-sm-12 form-group ">
								<label> Require Group Sale *</label>
								<input type="number" name="edt_group_sale" class="form-control" placeholder="0">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Require Profiles *</label>
								<select name="edt_require_profile" class="form-control">
									<option value="0">None</option>
									<?php foreach($profiles as $id => $name){ ?>
									<option value="<?=$id;?>"><?=$name;?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-6 col-sm-12 form-group ">
								<label> Profile Count *</label>
								<input type="number" name="edt_profile_count" class="form-control" placeholder="0">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group">
								<input type="hidden" name="edt_id"  >
								<input type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait..!"  >Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="app-drawer-overlay d-none animated fadeIn"></div>
	<?php include('common/footer_script.php'); ?>
<script>
	$(function(){
		$(".editObject").on('click',function(){
			var id = $(this).data("id");
			var user_key = $(this).data("user_key");
			var name = $(this).data("name");
			var direct_sale = $(this).data("direct_sale");
			var group_sale = $(this).data("group_sale");
			var next_profile_id = $(this).data("next_profile_id");
			var require_profile = $(this).data("require_profile");
			var require_profile_count = $(this).data("require_profile_count");
			
			$("input[name=edt_id]").attr("value",id);
			$("input[name=edt_position]").attr("value",name);
			$("input[name=edt_user_key]").attr("value",user_key);
			$("input[name=edt_direct_sale]").attr("value",direct_sale);
			$("input[name=edt_group_sale]").attr("value",group_sale);
			$("input[name=edt_profile_count]").attr("value",require_profile_count);
			$("select[name=edt_next_position]").find("option[value='"+next_profile_id+"']").attr("selected","selected");
			$("select[name=edt_require_profile]").find("option[value='"+require_profile+"']").attr("selected","selected");
		});
	});
</script>
</body>
</html>