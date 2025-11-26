<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include('default/header_script.php')?>
</head>
<body class="stretched side-push-panel"> 
	<div id="wrapper" class="clearfix">
    <?php include('default/header.php')?>
		<div class="tabs advanced-real-estate-tabs clearfix" >
			<div class="tab-container"  style="background:#EEE;"    >
				<div class="container clearfix">
					<div class="tab-content clearfix" id="tab-properties">
						<form action="<?= site_url('/search');?>" method="get" class="mb-0 ">
							<div class="row">
								<!--<div class="col-lg-2 col-md-12 bottommargin-sm">
									<label style="display:block;">Type</label>
									<input class="bt-switch" type="checkbox" checked data-on-text="Buy" data-off-text="Rent" data-on-color="themecolor" data-off-color="themecolor">
								</div>-->
								<div class="col-lg-3 col-md-3 col-12 bottommargin-sm">
									<label>Location </label>
									<select class="form-control" data-size="6" name="location">
										<optgroup label="Our Project">
											<option value="AK" <?= ($location == 'AK')?'selected':''; ?>>Narela</option> 
										</optgroup> 
									</select>
								</div>
								<div class="col-lg-3 col-md-3 col-12 bottommargin-sm">
									<label>Our Project </label>
									<select class="form-control project" data-change="block" data-size="6" name="project">
										<option value="">Select Project</option>
										<?php foreach($get_project as $obj){ ?>
										<option value="<?= $obj->id;?>"  <?= ($project == $obj->id)?'selected':''; ?>  ><?= $obj->name;?></option> 
										<?php }?>
									</select>
								</div>
								<div class="col-lg-3 col-md-3 col-12 bottommargin-sm">
									<label>Block </label>
									<select class="form-control block" data-change="area" name="block" data-live-search="true" data-size="6">
									<?php if(isset($get_blocks)){ foreach($get_blocks as $obj){ ?>
										<option value="<?= $obj->blocks;?>" <?=(($block==$obj->blocks)?'selected':'');?> ><?= $obj->blocks; ?>  Block</option>
									<?php } } ?>
									</select>
								</div> 
								<div class="col-lg-3 col-md-3 col-6 bottommargin-sm">
									<label>Area</label>
									<select class="form-control" name="area" data-size="6" data-placeholder="Any">
										<?php if(isset($size_name)){ foreach($size_name as $obj){ ?>
											<option value="<?= $obj->size;?>" <?=(($area==$obj->size)?"selected":"");?>><?= $obj->size;?>  Gaj</option>
										<?php } } ?>
									</select>
								</div>
								<div class="w-100"></div>
								<!--<div class="col-lg-4 col-md-6 col-12">
									<label style="margin-bottom: 20px !important;">Price Range</label>
									<input class="price-range-slider"  name="price_range" />
								</div>
								<div class="w-100 d-block d-md-none bottommargin-sm"></div>
								<div class="col-lg-4 offset-lg-1 col-md-6 col-12">
									<label style="margin-bottom: 20px !important;">Property Area</label>
									<input class="area-range-slider" name="property_area"/>
								</div>-->
								<div class=" col-lg-4 col-md-12 clearfix">
									<button class="button button-3d button-rounded w-100 m-0">Search</button>
								</div>
								<div class=" col-lg-4 col-md-12 clearfix">
									<a class="button button-3d button-rounded w-100 m-0 text-center button-purple"  href="<?= base_url('assets/pdf/reevadeveloperspvtltd.pdf')?>" download  >Download  Map</a>
								</div>
								<div class=" col-lg-4 col-md-12 clearfix">
									<button class="button button-3d button-rounded w-100 m-0 button-blue  " onclick=" window.open('<?= base_url('assets/pdf/reevadeveloperspvtltd.pdf')?>'); return false;" >View Map</button>
								</div>
							</div>
						</form>
						<div class="row mt-3">
							<div class="col-md-3 form-group">
								<div class="btn btn-success form-control" type="button">Available</div>
							</div>
							<div class="col-md-3 form-group">
								<div class="btn btn-secondary form-control" type="button">Token</div>
							</div>
							<div class="col-md-3 form-group">
								<div class="btn btn-warning form-control text-white" type="button">Partially Book</div>
							</div>
							<div class="col-md-3 form-group">
								<div class="btn btn-info form-control text-white" type="button">Booked</div>
							</div>
							<div class="col-md-12 form-group">
								<div class="btn btn-danger form-control" type="button">Sold</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>  
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="row">
						<?php if(isset($search_data)){ $count = 0; foreach($search_data as $obj){  
								$bg = '';
								if($obj->prop_status == 'A'){ $bg = 'text-success'; }
								if($obj->prop_status == 'T'){ $bg = 'text-secondary'; }
								if($obj->prop_status == 'P'){ $bg = 'text-warning'; }
								if($obj->prop_status == 'B'){ $bg = 'text-info'; }
								if($obj->prop_status == 'S'){ $bg = 'text-danger'; }
						?>
								<div class="col-md-3 col-sm-6 col-6 mb-4 text-center">
									<div>
										<i class="icon-home <?= $bg ?>" style="font-size:30px;"></i>
									</div>
									<div style="padding:10px;">
										<?= $obj->type ?> :-  <?= $obj->plot_no ?><br>
									</div>
								</div>
						<?php  $count++; 
								if ($count % 4 == 0) {
									echo '</div><div class="row">';
								}
							} 
						} 
						?> 
					</div>

				</div>
			</div>
		</section>
		<?php include('default/footer.php')?>
	</div>
	<?php include('default/footer_script.php')?>
</body>
</html>