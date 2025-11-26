<!DOCTYPE html>
<html lang="en">

<head>  
	 <?php include('common/header_script.php'); ?>
	 <style>
		a{text-decoration:none;color:black;}
		.canvasjs-chart-credit{display:none;}
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
                                <div>Hello <?= strtoupper($session['f_name']); ?>,<span>Welcome Here</span>
                                </div>
                            </div>
                            <!--<div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">MLM Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Home</a></li>
                                </ol>
                            </div>-->
                        </div>
                    </div>
					<div class="tabs-animation">
                        <div class="row">
							<div class="col-lg-6">
								<div id="chartContainer2" style="height: 300px; width: 100%;"></div>
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-light ">
									<div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Total Clients &nbsp;&nbsp; <?= $totalclient?></div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar progress-bar-light w-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% </span>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6">
							<div id="chartContainer" style="height: 300px; width: 100%;"></div>
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-success ">
								<a href="#">

                                    <div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Total Property &nbsp;&nbsp; <?=$prop;?></div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar progress-bar-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% Property Available for Sale</span>
											</div>
										</div>
									</div>
									</a>
                                </div>
							</div>
							<div class="col-lg-6">
								<div id="chartContainer4" style="height: 300px; width: 100%;"></div>
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-primary ">
									<div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Total Blocks &nbsp;&nbsp; <?= count($block_count_all);?></div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar progress-bar-primary w-80" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% Property Available for Sale</span>
											</div>
										</div>
									</div> 
								</div>
							</div>
							
							<div class="col-lg-6">
								<div id="chartContainer3" style="height: 300px; width: 100%;"></div>
								<div class="card mb-3 widget-chart widget-chart2 text-left card-shadow-success ">
									<a href="#">
									<div class="stat-widget-eight">
										<div class="stat-header">
											<div class="header-title pull-left">Total Members &nbsp;&nbsp;  <?= count($user_info)?></div>
										</div>
										<div class="clearfix"></div>
										<div class="progress">
											<div class="progress-bar progress-bar-success w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
												<span class="sr-only">100% </span>
											</div>
										</div>
									</div>
									</a>
								</div>
							</div>
						</div>
						<div class="card mb-3">
							<a href="#">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i
                                        class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Property Count
                                    Tables
                                </div>
                            </div>
                            <div class="card-body">
                                <table style="width: 100%;" id="example"
                                    class="table table-hover table-striped table-bordered">
                                    <thead>
                                        <tr>
											<th>Area(sq ft)</th>
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
							</a>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>This dashboard was generated on  <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-drawer-overlay d-none animated fadeIn"></div>
	 <?php include('common/footer_script.php'); ?>
<script src="<?= base_url('assets/include/js/')?>canvasjs.min.js"></script>
<script>
window.onload = function () {
	// Pie Chart
	var chart1 = new CanvasJS.Chart("chartContainer", {
		theme: "light2",
		animationEnabled: true,
		data: [{
			type: "pie",
			indexLabelFontSize: 18,
			radius: 80,
			indexLabel: "{label} - {y}%",
			click: explodePie,
			dataPoints: [
				{ y: <?php echo $availablePercentage; ?>, label: "Available" },
				{ y: <?php echo $partiallyPercentage; ?>, label: "Partially Booked"},
				{ y: <?php echo $bookedPercentage; ?>, label: "Booked" },
				{ y: <?php echo $soldPercentage; ?>, label: "Sold" },
				{ y: <?php echo $tokenPercentage; ?>, label: "Token" },
			]
		}]
	});
	chart1.render();
	function explodePie(e) {
		for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
			if(i !== e.dataPointIndex)
				e.dataSeries.dataPoints[i].exploded = false;
		}
	}

	/////////////////// Area Chart
	var chart2 = new CanvasJS.Chart("chartContainer2", {
		animationEnabled: true,	
	title: {
		text:"Client per Months"
	},
	axisX: {
		interval: 1
	},
	axisY2: {
		interlacedColor: "rgba(1,77,101,.2)",
		gridColor: "rgba(1,77,101,.1)",
		//title: "Number of Companies"
	},
	data: [{
		type: "bar",
		name: "companies",
		color: "#014D65",
		axisYType: "secondary",
		dataPoints: [
			<?php foreach($client_monthly_data as $cmd){?>
			{ y: <?= $cmd['client_user_count']?>, label: "<?= $cmd['client_month']?>" },
			<?php }?> 
		]
	}]
	});
	chart2.render();
	
	
	// chart 3  user graph
	var chart3 = new CanvasJS.Chart("chartContainer3", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	<!-- title:{ -->
		<!-- text: "Top Oil Reserves" -->
	<!-- }, -->
	<!-- axisY: { -->
		<!-- title: "Reserves(MMbbl)" -->
	<!-- }, -->
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		//legendText: "MMbbl = one million barrels",
		dataPoints: [  
			<?php foreach($monthly_data as $graph){ ?>
				{y:<?= $graph['user_count']?>,label:'<?= $graph['month']?>'},
			<?php } ?>
			<!-- { y: 300878, label: "January" }, --> 
		]
	}]
	});
	chart3.render();
	
	//Block Pie Chart Start
	var chart4 = new CanvasJS.Chart("chartContainer4", {
		animationEnabled: true,
		title:{
		text: "Block Count"
		},
		axisY: {
			title: "Reserves(MMbbl)"
		},
		data: [{
			type: "doughnut",
			startAngle: 60,
			indexLabelFontSize: 17,
			indexLabel: "{label} - {y}",
			toolTipContent: "<b>{label}:</b> {y} (#count)",
			dataPoints: [
				<?php foreach($block_chart as $bc){ ?>
					{ y:<?= $bc->block_count;?>, label: "<?= $bc->block;?>" },
				<?php } ?>
				<!-- { y: 28, label: "B" }, -->
				<!-- { y: 10, label: "C" }, -->
				<!-- { y: 8, label: "D" },  -->
			]
		}]
	});
	// Calculate total count
	var totalCount = 0;
	chart4.options.data[0].dataPoints.forEach(function(dataPoint) {
		totalCount += dataPoint.y;
	});
	// Set total count in each tooltip
	chart4.options.data[0].toolTipContent = function(e) {
		var label = e.entries[0].dataPoint.label;
		var count = e.entries[0].dataPoint.y;
		return "<b>" + label + ":</b> " + count + " (" + (count / totalCount * 100).toFixed(2) + "%)";
	};
	chart4.render();
	//Block Pie Chart End
	
}
</script> 
</body>
</html>