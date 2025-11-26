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
                                <div>Contact Form</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Contact</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?= site_url('web-admin/contact');?>" method="get">
							<div class="row">
								<div class="col-md-6">
									<select class="form-control" name="status">
										<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
										<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
									</select>
								</div>
								<div class="col-md-6">
									<input type="submit" class="form-control btn btn-success" value="Fetch">
								</div>
							</div>
						</form>
						<table class="table table-hover table-striped table-bordered mt-4">
							<thead>
								<tr>
									<th>S.no</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Insert At</th>
									<th>Email ID</th> 
									<th>Message</th>
								</tr>
							</thead>
							<tbody>
								<?php $i=1; if(isset($contact)){foreach($contact as $con){ ?>
								<tr>
									<td><?=$i++;?></td>
									<td><?= ucfirst($con->name);?></td>
									<td><?=$con->mobile;?></td>
									<td><?= date('Y-m-d H:i:s',strtotime($con->insert_time)); ?></td>
									<td><?=$con->email;?></td> 
									<td><?=$con->message;?></td>
								</tr>
								<?php }} ?>
							</tbody>
						</table>
                    </div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="app-drawer-overlay d-none animated fadeIn"></div> 
	<?php include('common/footer_script.php'); ?>

</body>
</html>