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
                                <div>Web Settings</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Web Settings</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('web-admin/web_setting');?>" method="get">
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
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Name</th>
									<th>LastUpdate</th>
									<th>UpdateBy</th>
									<th>Value</th>
									<th>Status</th>
									<th>Edit</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($setting as $set){ ?>
								<tr>
									<td><?=$i++;?></td>
									<td><?=$set->name;?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($set->last_update)); ?></td>
									<td><?=$user_info[$set->update_by]->f_name;?></td>
									<td><input type="text" name="value" class="form-control edt_value" value="<?= $set->value; ?>" ></td>
									<td id="Object-<?=$set->id;?>">
									<?php if(in_array('3',$other_action)){ ?>
										<a href="#" data-url="<?=site_url('/web-admin/web_setting/change_setting_status');?>" data-id="<?=$set->id;?>" data-status="<?=$set->status;?>" class="change-status btn btn-primary"><?=($set->status=="A")?'Deactive':'Active'?></a>
									<?php } ?>
									</td>
									<td>
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<input type="hidden" name="id" value="<?=$set->id;?>">
										<button  data-id="<?= $set->id;?>" data-value="<?= $set->value; ?>"  data-src="<?=site_url('web-admin/web_setting/update_setting');?>" class="btn btn-success form-control edit-setting" data-loading-text="Please Wait...!">Update</button>
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
					<h4 class="modal-title">Add Web Setting </h4>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="form-submit" action="<?=site_url('web-admin/web_setting/add_setting');?>">
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Name</label>
								<input type="text" name="name" class="form-control" placeholder="Name">
							</div>
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Value</label>
								<input type="text" name="value" class="form-control" placeholder="value">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group">
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control">Add setting</button>
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
		$('.edit-setting').on('click',function(){
			//var name = $(this).data('name');
			var value = $('.edt_value').val();
			var src = $(this).data('src');
			var id = $(this).data('id'); 
			console.log(value);
			$.ajax({
				url:src,
				type:'POST',
				data:{value:value,id:id,[csrf_token]:csrf_hash},
				dataType: 'json',
				cache: false,
				success: function(result){
				update_token(result);
				$('input[name='+ csrf_token +']').attr('value',csrf_hash);
				if(result.success == true){
					location.reload();
				}else{
					$.each(result.message, function(key,value){
						var inpt = frm.find('input[name='+key+'], textarea[name='+key+'], select[name='+key+']');
						if(value.length > 2){
							if(result.border == true){
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
			})
			

			
		});
		
	});
</script>
</body>
</html>