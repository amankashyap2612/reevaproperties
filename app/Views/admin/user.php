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
                                <div>User</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">User</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('web-admin/user');?>" method="get">
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
									<input type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addUser" value="Add New">
								<?php } ?>
								</div>
							</div>
						</form>
						<table class="table table-hover table-striped table-bordered mt-4">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Name</th>
									<th>Email_ID</th>
									<th>Type</th>
									<th>CreateAT</th>
									<th>LastUpdate</th>
									<th>UpdateBy</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; foreach($emp as $em){ ?>
								<tr>
									<td><?=$i++;?></td>
									<td><?=$em->f_name;?></td>
									<td><?=$em->email_id;?></td>
									<td><?= strtoupper($user_type[$em->type]->name); ?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($em->create_time)); ?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($em->update_time)); ?></td>
									<td><?=$user_info[$em->update_by]->f_name;?></td>
									<td>
									<?php if(in_array('3',$other_action)){ ?>
										<a href="<?=site_url("web-admin/user_access/".$em->id);?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
	<div class="modal fade" id="addUser" role="dialog">
		<div class="modal-dialog modal-lg modal-full">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Add User </h4>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form class="form-submit" method="post" action="<?= site_url('web-admin/user/add_user_info')?>">
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group" >
								<label>First Name</label>
								<input type="text" name="fname" class="form-control" placeholder="First Name">
							</div>
							<div class="col-md-6 col-sm-12 form-group" >
								<label>Last Name</label>
								<input type="text" name="lname" class="form-control" placeholder="Last Name">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12 form-group ">
								<label>Type</label>
								<select name="type" class="form-control">
								<?php foreach($user_type as $key => $obj){ ?>
									<option value="<?=$obj->user_key;?>"><?=strtoupper($obj->name);?></option>
								<?php } ?>
								</select>
							</div>
							<div class="col-md-6 col-sm-12 form-group ">
								<label>Email ID</label>
								<input type="email" name="email" class="form-control" placeholder="Email-ID">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-sm-12 form-group">
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control">Add User</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="app-drawer-overlay d-none animated fadeIn"></div> 
	<?php include('common/footer_script.php'); ?>

</body>
</html>