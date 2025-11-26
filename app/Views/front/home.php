<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <?php include('default/header_script.php')?>
	<style>
		input,textarea{margin-bottom:10px;}
		.iconlist{margin-bottom:5px;}
		@media only screen and (max-width: 600px) {
			.mdq{padding:1px 5px !important; line-height:20px !important;font-size: 12px !important;}
		}
		
		
	</style>
</head>
<body class="stretched side-push-panel">
	<div id="wrapper" class="clearfix">
	<?php include('default/header.php')?>
		<section id="slider" class="slider-element min-vh-60 min-vh-md-100 dark include-header include-topbar">
			<div class="slider-inner">
				<div class="fslider h-100 position-absolute" data-speed="3000" data-pause="7500" data-animation="fade" data-arrows="false" data-pagi="false" style="background-color: #333;">
					<div class="flexslider">
						<div class="slider-wrap">
							<?php foreach($home_slider as $sld){ ?> 
								<div class="slide" style="background: url('<?= base_url('images/'.$image[$sld->img])?>') center center; background-size: cover;"></div>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="vertical-middle">
					<div class="container text-center">
						<div class="emphasis-title m-0">
							<h1 class="text-white">Welcome to Reeva Developers </h1>
							<!--<span class="fw-light text-uppercase" style="font-size: 18px; letter-spacing: 10px; color: rgba(255,255,255,0.9);">Nahri Gaon Narela near by Facility.</span>-->
						</div>
					</div>
				</div>
				<div class="video-wrap">
					<div class="video-overlay real-estate-video-overlay"></div>
				</div>
			</div>
		</section>
		<div class="tabs advanced-real-estate-tabs clearfix">
			<div class="container clearfix">
				<ul class="tab-nav clearfix">
					<li><a href="#tab-properties" data-scrollto="#tab-properties" data-offset="133">Search Properties</a></li>
				</ul>
			</div>
			<div class="tab-container">
				<div class="container clearfix">
					<div class="tab-content clearfix" id="tab-properties">
						<form action="<?= site_url('search');?>" method="get" class="mb-0 ">
							<div class="row">
								<!--<div class="col-lg-2 col-md-12 bottommargin-sm">
									<label style="display:block;">Type</label>
									<input class="bt-switch" type="checkbox" checked data-on-text="Buy" data-off-text="Rent" data-on-color="themecolor" data-off-color="themecolor">
								</div>-->
								<div class="col-lg-3 col-md-6 col-12 bottommargin-sm">
									<label>Location </label>
									<select class="form-control" data-size="6" name="location">
										<optgroup label="Our Project ">
											<option value="AK">Narela</option> 
										</optgroup> 
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-12 bottommargin-sm">
									<label>Our Project </label>
									<select class="form-control project" data-change="block" data-size="6" name="project">
										<option value="">Select Project</option>
										<?php foreach($get_project as $obj){ ?>
											<option value="<?= $obj->id;?>"><?= $obj->name;?></option> 
										<?php }?>
									</select>
								</div>
								<div class="col-lg-3 col-md-6 col-12 bottommargin-sm">
									<label>Block </label>
										<select class="form-control block" data-change="area" name="block" data-live-search="true" data-size="6">
										<option>Choose Blocks</option>
									</select>
								</div> 
								<div class="col-lg-3 col-md-6 col-6 bottommargin-sm">
									<label>Area</label>
									<select class="form-control" name="area" data-size="6" data-placeholder="Any"> 
										<option>Choose Area</option>
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
									<button class="button button-3d button-rounded w-100 m-0" style="margin-top: 35px !important;">Search</button>
								</div>
								<div class=" col-lg-4 col-md-12 clearfix">
									<a class="button button-3d button-rounded w-100 m-0 text-center "  href="<?= base_url('assets/pdf/reevadeveloperspvtltd.pdf')?>" style="margin-top: 35px !important; background-color:#038cb5;" download  >Download  Map</a>
								</div>
								<div class=" col-lg-4 col-md-12 clearfix">
									<button class="button button-3d button-rounded w-100 m-0 button-blue  " style="margin-top: 35px !important;" onclick=" window.open('<?= base_url('assets/pdf/reevadeveloperspvtltd.pdf')?>'); return false;" >View Map</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div> 
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="row col-mb-50">
						<?php foreach($feature as $feat){ ?> 
							<div class="col-sm-6 col-lg-4">
								<div class="feature-box fbox-plain">
									<div class="fbox-icon">
										<a href="#"><i class="<?= $feat->icon;?>"></i></a>
									</div>
									<div class="fbox-content">
										<h3 class="fw-normal"><?= $feat->heading;?></h3>
										<p><?= $feat->paragraph?></p> 
									</div>
								</div>
							</div>
											
						<?php } ?>
					</div>
					<div class="line"></div>
 
				</div>

				<div class="row align-items-stretch mx-0 topmargin bottommargin-lg">
					<div class="col-lg-8 px-0 d-none d-md-block"  style="background: url('<?= base_url('assets/')?>images/close-up-woman-s-hand-giving-house-key-man-wooden-table.jpg') no-repeat center center; background-size: cover;"   >
						
					</div>
					 
					<div class="col-lg-4 bg-color">
						<div class="col-padding">
							<div class="quick-contact-widget  dark  ">
								<h3 class="text-capitalize ls1 fw-normal">Get a Quick Quote</h3>
								<form action="<?= site_url('/form/contact_us');?>" method="post" class=" form-submit  mb-0">
									<input type="text" class=" form-control input-block-level mb-20 not-dark"  name="name" value="" placeholder="Full Name"   oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');" />
									<input type="email" class=" form-control email input-block-level  mb-20 not-dark"   name="email" value="" placeholder="Email Address" />
									<input type="text" class=" form-control input-block-level not-dark  mb-20 contact  "  name="mobile" value="" placeholder="Phone Number "   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
									<textarea class=" form-control input-block-level not-dark short-textarea    mb-20  "  name="message" rows="5" cols="30" placeholder="What are you Looking for? (Ex: Apartment on the Flat)"></textarea>
									<input type="hidden" id="csrf-token" name="<?= csrf_token();?>" value="<?= csrf_hash();?>">
									<button type="submit"   class="button button-small button-rounded button-light button-white m-0" value="submit">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row col-mb-50">
						<div class="col-md-12 col-12">
							<div class="tabs tabs-justify tabs-tb tabs-alt mb-0 clearfix" id="realestate-tabs" data-active="2">
								
								<ul class="tab-nav clearfix col-12">
									<?php $count=1;   foreach($get_location as $location ){ if($count == 4 ) { break; } ?>
										<?php $check[] = $location->res;?>
										<li><a class="mdq" href="#realestate-tab-<?= $location->res;?>"><?= $location->res;?> in Narela <?= $location->dist?></a></li>
									<?php $count++; }?> 
								</ul>
								<div class="tab-container">
									<?php  foreach($near_location as $obj) {
										?>
										<div class="tab-content clearfix" id="realestate-tab-<?= $check[0];?>">
										<div class="row clearfix">
											<?php foreach($near_location as $obj){
													if($obj->resource == $check[0]){
													?>
													<div class="col-md-4">
														<ul class="iconlist">
															<li><i class="icon-ok"></i><?= $obj->detail;?></li>
														</ul>
													</div>
											<?php } } ?>
											
										</div>
									</div>
									
									<div class="tab-content clearfix" id="realestate-tab-<?= $check[1];?>"> 
										<div class="row col-mb-30">
											<?php foreach($near_location as $obj){
													if($obj->resource ==  $check[1]){
													?>
													<div class="col-md-4">
														<ul class="iconlist">
															<li><i class="icon-ok"></i><?= $obj->detail;?></li>
														</ul>
													</div>
											<?php } } ?>
										</div>
									</div>
									<div class="tab-content clearfix" id="realestate-tab-<?= $check[2];?>">
										<div class="row col-mb-30">
											<?php foreach($near_location as $obj){
													if($obj->resource ==  $check[2]){
													?>
													<div class="col-md-4">
														<ul class="iconlist">
															<li><i class="icon-ok"></i><?= $obj->detail;?></li>
														</ul>
													</div>
											<?php } } ?>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div> 
					</div>
				</div>
				
				<div class="section bg-transparent my-5">
					<div class="container">
						<div class="line"></div>
						<div class="row align-items-center flex-md-row-reverse col-mb-50 mb-0">
							<div class="col-lg-6">
								<img class="box-img shadow-left" src="<?= base_url('assets/')?>demos/real-estate/images/1.jpg" alt="Image">
							</div>
							<div class="col-lg-6 pe-0 pe-md-5"> 
								<h3 class="text-dark h1 fw-semibold ls0 mb-4">Reeva Developer</h3>
								<p class="mb-5">Welcome to our vibrant residential community, where modern amenities harmonize with nature's beauty. Nestled amidst lush greenery and tranquil surroundings, our community offers a serene retreat from the hustle and bustle of city life.</p>
								<p>As you enter through our welcoming gate, you are greeted by the sight of meticulously maintained gardens and well-lit pathways, inviting you to explore our vibrant neighborhood. Our boundary walls ensure security and privacy, allowing residents to enjoy peace of mind.</p> 
								<div class="row">
									<div class="col-6">
										<?php $count = 0; foreach($facility as $fct) { if($count == 6){break;}?><ul class="list-group list-group-flush">
											<li class="list-group-item ps-0"><i class="icon-line-arrow-right me-2"></i><?= $fct->name;?></li>
										</ul><?php  $count++;}?>
									</div>
									<div class="col-6">
										<?php $count = 0; foreach($facility as $fct) { if($count >= 6 && $count <= 11 ){?><ul class="list-group list-group-flush">
											<li class="list-group-item ps-0"><i class="icon-line-arrow-right me-2"></i><?= $fct->name;?></li>
										</ul><?php } $count++;}?>
									</div>
								</div> 
							</div>
						</div>
						<div class="clear"></div> 
					</div>
				</div>
				<div class="section topmargin mb-0 border-bottom-0">
					<div class="container clearfix">
						<div class="heading-block center m-0">
							<h3>Our Latest Project</h3>
						</div>
					</div>
				</div>
				<div id="portfolio" class="container m-auto mt-20 portfolio row g-0 portfolio-reveal grid-container">
					<?php foreach($project as $pro) { ?>
						<article class="portfolio-item col-6 col-md-4 col-lg-3 pf-media pf-icons"  >
							<div class="grid-inner">
								<div class="portfolio-image"   style="margin-top:20px;">
									<a href="#">
										<img src="<?= base_url("images/". $image[$pro->img_id] );?>" alt="Open Imagination">
									</a>
									<div class="bg-overlay">
										<div class="bg-overlay-content dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item">
											<a href="<?= site_url('/gallery/'.data_encode($pro->id))?>" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350"     ><i class="icon-arrow-right"></i></a> 
										</div>
										<div class="bg-overlay-bg dark" data-hover-animate="fadeIn" data-hover-parent=".portfolio-item"></div>
									</div>
								</div>
								<div class="portfolio-desc">
									<h3><a href="#"><?= $pro->name;?></a></h3> 
								</div>
							</div>
						</article>
					<?php } ?>
				</div>
				<div class="container">
					<hr>
					<div class="row col-mb-50 topmargin ">
						<div class="col-sm-6 col-lg-3 text-center">
							<i class="i-plain i-xlarge mx-auto mb-0 icon-home"></i>
							<div class="counter counter-large" style="color: #1abc9c;"><span data-from="0" data-to="465" data-refresh-interval="50" data-speed="2000">465</span></div>
							<h5>Land Viewers</h5>
						</div>

						<div class="col-sm-6 col-lg-3 text-center">
							<i class="i-plain i-xlarge mx-auto mb-0 icon-globe"></i>
							<div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="541" data-refresh-interval="50" data-speed="2500">541</span></div>
							<h5>Real Estate Visitor</h5>
						</div>

						<div class="col-sm-6 col-lg-3 text-center">
							<i class="i-plain i-xlarge mx-auto mb-0 icon-search"></i>
							<div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="154" data-refresh-interval="50" data-speed="3500">154</span></div>
							<h5>House Seekers</h5>
						</div>

						<div class="col-sm-6 col-lg-3 text-center">
							<i class="i-plain i-xlarge mx-auto mb-0 icon-book3"></i>
							<div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="74" data-refresh-interval="30" data-speed="2700">74</span></div>
							<h5>Property Seekers</h5>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include('default/footer.php');?>
	</div>
	<?php include('default/footer_script.php');?>
</body>
</html>