<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>MLM MLM-admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no"> 
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
                                <div>MLM Property Booking <?php if(isset($search)){ count($search);}?></span>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Booking</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<form action="<?=site_url('mlm-admin/mlm_property_book');?>" method="get" class="mrg">
						<div class="row">
							<div class="col-md-2">
								<select class="form-control project" name="project" data-change="block" >
									<option value="">Choose Project</option>
									<?php foreach($proj as $obj){ ?>
										<option value="<?=$obj->id?>" <?= (($obj->id == $project)?'selected':'')?>><?= $obj->name;?></option>
									<?php } ?>
								</select>
							</div>
							<div class="col-md-2">
								<select class="form-control area" name="block" data-change="area" >
									<option value="<?= $block;?>" selected ><?= $block; ?> Block</option>
								</select>
							</div>
							<div class="col-md-2">
								<select class="form-control" name="area" >
									<option value="<?=$area;?>" selected><?=$area;?> Gaj</option>
								</select>
							</div>
							<div class="col-md-2">
								<select class="form-control project" name="status">
									<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
									<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
								</select>
							</div>
							<div class="col-md-2">
								<input type="submit" class="form-control btn btn-success" value="Fetch">
							</div>
						</div>
					</form>
					<div class="card-body">
						<table class="table table-hover table-striped table-bordered">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Image</th>
									<th>Plot No</th>
									<th>Property Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1;if(isset($search)) {foreach($search as $obj){?>
								<tr>
									<td><?=$i++;?></td>
									<td><img src="<?=base_url('images/'.(isset($images[$obj->img_id])?$images[$obj->img_id]:''));?>" style="width:100px;"></td>
									<td><?=$obj->plot_no;?></td>
									<td><?=$obj->prop_status;?></td>
									<td>
										<?php if(in_array('1',$other_action)){ ?>
											<button type="button" class="form-control add_prop btn btn-success" data-bs-toggle="modal" 
											data-prop_id="<?= $obj->id;?>" 
											data-img_src="<?=base_url('images/'.(isset($images[$obj->img_id])?$images[$obj->img_id]:''));?>"
											data-prop_status="<?=$obj->prop_status;?>"
											data-bs-target="#addObject" >Book Now</button>
										<?php } ?>
									</td>
								</tr>
								<?php } }?>
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
				<p class="modal-title">property Booking</p>
				<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<form class="form-submit" action="<?= site_url('mlm-admin/mlm_property_book/book_property');?>">
					<div class="row">
						<div class="col-md-4 col-sm-12" >
							<img src="#" class="img-thumbnail" id="add-image-frame">
						</div>
						<div class="col-md-8 col-sm-12" >
							<div class="row">
								<div class="col-md-6 col-sm-12 form-group" >
									<label>Agent</label>
									<select name="member" class="form-control" >
										<option value="">Select Agent</option>
										<?php if(isset($get_member)){  foreach($get_member as  $obj){ ?>
										<option value="<?=$obj->id;?>" ><?=$obj->f_name;?></option>
										<?php } } ?>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 form-group" >
									<label>Property Status</label>
									<select class="form-control" name="prop_status">
										<option value="Available">Available</option>
										<option value="Booked">Booked</option>
										<option value="Partially_booked">Partially Booked</option>
										<option value="Sold">Sold</option>
									</select>
								</div>
								<div class="col-md-6 col-sm-12 form-group" >
									<label>Paid Amount</label>
									<input type="number" name="partially_book" class="form-control" placeholder="Partially Booked Payment">
								</div>
								<div class="col-md-6 col-sm-12 form-group" >
									<label>Deal Amount</label>
									<input type="number" name="pay_confirm" class="form-control" placeholder="Confirm Booking payment">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group">
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<input type="hidden" name="prop_id" value=""> 
								<input type="hidden" name="img_id" value="30"> 
								<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Add</button>
							</div>
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
	
	$(document).ready(function(){
		$('.add_prop').on('click',function(){
			var  prop_id = $(this).data('prop_id');
			var  prop_status = $(this).data('prop_status');
			$('select[name="prop_status"]').find('option[value="'+prop_status+'"]').attr("selected",true);
			$('input[name=prop_id]').attr('value',prop_id);
			if(prop_status != 'Available')
			{
				$.ajax({
					url: '<?= site_url('mlm-admin/mlm_property_book/catch_book_property')?>',
					type:'post',
					data: {property_id:prop_id,[csrf_token]:csrf_hash},
					dataType: 'json',
					cache: false,
					success:function(result){
							update_token(result); 
							$('input[name='+ csrf_token +']').attr('value',csrf_hash);
							var prop_status = result.get_data[0].prop_status;
							var member = result.get_data[0].member_id;
							var pay_confirm = result.get_data[0].pay_confirm;
							var partially_book = result.get_data[0].partially_book;
							$('input[name=pay_confirm]').attr('value',pay_confirm);
							$('input[name=partially_book]').attr('value',partially_book);
							$('select[name="prop_status"]').find('option[value="'+prop_status+'"]').attr("selected",true);
							$('select[name="get_member"]').find('option[value="'+member+'"]').attr("selected",true);
						}
				});
		  }
	});
});

	
</script>
</body>
</html>