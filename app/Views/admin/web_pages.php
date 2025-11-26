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
                                <div>Web Pages</span>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Web Pages</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<form action="<?=site_url('web-admin/web_pages');?>" method="get">
						<div class="row">
							<div class="col-md-4">
								<select class="form-control" name="status">
									<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
									<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
								</select>
							</div>
							<div class="col-md-4">
								<button type="submit" class="form-control btn btn-success" data-loading-text="Please wait...!">Fetch</button>
							</div>
							<div class="col-md-4">
							<?php if(in_array('1',$other_action)){ ?>
								<a class="form-control btn btn-success" href="<?= site_url('web-admin/create-page');?>">Add</a>
							<?php } ?>
							</div>
						</div>
					</form>
                       
					<table class="table table-hover table-striped table-bordered mt-4">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Heading</th>
								<th>URL</th>
								<th>Form</th>
								<th>Last Update</th>
								<th>Updated By</th>
								<th>Action</th>
								<th>Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($pages as $pgs){?>
							<tr>
								<td>
									<?= $i++; ?>
								</td>
								<td><?= $pgs->page_heading; ?></td>
								<td><?= $pgs->page_url; ?></td>
								<td><?= $pgs->form; ?></td>
								<td><?= $pgs->last_update; ?></td>
								<td><?= $user_info[$pgs->update_by]->f_name; ?></td>
								
								<td id="page-<?=$pgs->id;?>">
								<?php if(in_array('3',$other_action)){ ?>
									<a href="#" data-url="<?=site_url('/web-admin/web-page/change_page_status');?>" data-id="<?=$pgs->id;?>" data-status="<?=$pgs->status;?>" class="change-status btn btn-primary"><?=($pgs->status=="A")?'Deactive':'Active'?></a>
								<?php } ?>
								</td>
								
								<td>
								<?php if(in_array('2',$other_action)){ ?>
									<a class="edit-course btn btn-primary" href="<?= site_url("web-admin/edit-page/".$pgs->id); ?>" >Edit</a>
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
                           
    <div class="app-drawer-overlay d-none animated fadeIn"></div> 
	<?php include('common/footer_script.php'); ?>

</body>
</html>
            