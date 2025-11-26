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
                                <div>Hello <?= strtoupper($session['f_name']); ?>,<span>Welcome Here</span>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
                        <div class="row">
							<div class="col-lg-4">
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-primary ">
									<div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Total Project &nbsp;&nbsp; <?= count($project_detail);?></div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar bg-primary w-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% Property Available for Sale</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-success ">
                                    <div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Total Property &nbsp;&nbsp; <?= count($property);?></div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar bg-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% Property Available for Sale</span>
											</div>
										</div>
									</div>
                                </div>
							</div>
							<div class="col-lg-4">
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-warning">
									<div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Total Contacts  &nbsp;&nbsp; <?= count($contact);?></div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar bg-warning w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% Property Available for Sale</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-danger ">
									<div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Properties for Rent &nbsp;&nbsp; 0</div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar bg-danger w-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% </span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-light ">
									<div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Properties for sale &nbsp;&nbsp; 0</div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar bg-secondary w-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% </span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<a href="<?= site_url("/web-admin/contact/");?>">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i
                                        class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Customer query 
                                </div>
                            </div>
                            <div class="card-body">
                                <table style="width: 100%;" id="example"
                                    class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Name</th>
											<th>Phone</th>
											<th>Insert At</th>
											<th>Email ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php  if(isset($contact)){ $i=0;foreach($contact as $con){ if($i==2){break;}?>
									<tr>
										<td><?= ucfirst($con->name);?></td>
										<td><?=$con->mobile;?></td>
										<td><?= date('Y-m-d H:i:s',strtotime($con->insert_time)); ?></td>
										<td><?=$con->email;?></td>
									</tr>
									<?php $i++;}}?>
                                    </tbody>
                                </table>
                            </div>
							</a>
                        </div>
						<div class="card mb-3">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
									<i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Properties 
                                </div>
                            </div>
                            <div class="card-body">
                                <table style="width: 100%;" id="example"
                                    class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Area(sq)</th>
											<th>Size(Gaj)</th>
											<th>Type</th>
											<th>Property status</th> 
											<th>count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
                                        <?php $i=-1; if(isset($detail)){  foreach ($detail as $key => $row){ $i++;
											?>
											<tr>
												<td><?=$row->area; ?></td>
												<td><?php echo $row->gaj; ?></td>
												<td><?php echo $row->type; ?></td>
												<td><?php echo $row->prop_status; ?></td>
												<td><?php echo isset($count_query[$i][0])?$count_query[$i][0]->count_data:''; ?></td>
											</tr>
										<?php } } ?>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
					<div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
   
	 <?php include('common/footer_script.php'); ?>
</body>
</html>