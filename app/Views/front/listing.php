<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include('default/header_script.php');?>

	<style>
		.slider-element { padding: 250px 0 150px; }

		.device-md .slider-element,
		.device-sm .slider-element,
		.device-xs .slider-element { padding: 60px 0; }

		.expand-link { display: none; }
		.more-search {
			display: block;
			margin-top: 10px;
			float: right;
			text-align: right;
			color: #FFF;
			cursor: pointer;
		}

		label {font-family: 'Lora', sans-serif !important;}

		.bootstrap-select.btn-group > .dropdown-toggle {
			background-color: #dae0e5;
			border-color: #d3d9df;
		}
	</style>

</head>

<body class="stretched side-push-panel">

	<div id="side-panel">
		<div id="side-panel-trigger-close" class="side-panel-trigger"><a href="#"><i class="icon-line-cross"></i></a></div>

		<div class="side-panel-wrap">
			<div class="widget clearfix">

				<h4 class="fw-normal">Login with Social Profiles</h4>

				<a href="#" class="button button-rounded fw-normal w-100 center si-colored ms-0 si-facebook">Facebook</a>
				<a href="#" class="button button-rounded fw-normal w-100 center si-colored ms-0 si-gplus">Google</a>

				<div class="line"></div>

				<h4 class="fw-normal">Existing Account?</h4>

				<form id="login-form" name="row mb-0" class="mb-0" action="#" method="post">

					<div class="col-12 form-group">
						<label for="login-form-username" class="fw-normal">Username:</label>
						<input type="text" id="login-form-username" name="login-form-username" value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<label for="login-form-password" class="fw-normal">Password:</label>
						<input type="password" id="login-form-password" name="login-form-password" value="" class="form-control" />
					</div>

					<div class="col-12 form-group">
						<button class="button button-rounded fw-normal m-0" id="login-form-submit" name="login-form-submit" value="login">Login</button>
						<a href="#" class="float-end">Forgot Password?</a>
					</div>

				</form>

			</div>
		</div>
	</div>

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

    <?php include('default/header.php');?>

		<!-- Slider
		============================================= -->
		<section id="slider" class="slider-element include-header include-topbar" style="background: url('<?= base_url('assets/');?>demos/real-estate/images/items/page-title.jpg') center center no-repeat; background-size: cover; overflow: visible;">

			<div class="container" style="z-index: 2">
				<div class="tabs advanced-real-estate-tabs">

					<div class="tab-container">

						<div class="tab-content clearfix" id="tab-properties">
							<form action="#" method="post" class="mb-0">
								<div class="row clearfix">
									<div class="col-md-2 col-sm-12">
										<label for="" class="d-block">Type</label>
										<input class="bt-switch" type="checkbox" checked data-on-text="Buy" data-off-text="Rent" data-on-color="themecolor" data-off-color="themecolor">
									</div>
									<div class="col-md-4 col-sm-6 col-12">
										<label for="">Locations</label>
										<select class="selectpicker" multiple data-live-search="true" data-size="5" style="width:100%;">
											<optgroup label="Alaskan/Hawaiian Time Zone">
												<option selected value="AK">Alaska</option>
												<option value="HI">Hawaii</option>
											</optgroup>
											<optgroup label="Pacific Time Zone">
												<option value="CA">California</option>
												<option value="NV">Nevada</option>
												<option value="OR">Oregon</option>
												<option value="WA">Washington</option>
											</optgroup>
											<optgroup label="Mountain Time Zone">
												<option value="AZ">Arizona</option>
												<option value="CO">Colorado</option>
												<option value="ID">Idaho</option>
												<option value="MT">Montana</option>
												<option value="NE">Nebraska</option>
												<option value="NM">New Mexico</option>
												<option value="ND">North Dakota</option>
												<option value="UT">Utah</option>
												<option value="WY">Wyoming</option>
											</optgroup>
											<optgroup label="Central Time Zone">
												<option value="AL">Alabama</option>
												<option value="AR">Arkansas</option>
												<option value="IL">Illinois</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="MN">Minnesota</option>
												<option value="MS">Mississippi</option>
												<option value="MO">Missouri</option>
												<option value="OK">Oklahoma</option>
												<option value="SD">South Dakota</option>
												<option value="TX">Texas</option>
												<option value="TN">Tennessee</option>
												<option value="WI">Wisconsin</option>
											</optgroup>
											<optgroup label="Eastern Time Zone">
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="IN">Indiana</option>
												<option value="ME">Maine</option>
												<option value="MD">Maryland</option>
												<option value="MA">Massachusetts</option>
												<option value="MI">Michigan</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NY">New York</option>
												<option value="NC">North Carolina</option>
												<option value="OH">Ohio</option>
												<option value="PA">Pennsylvania</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="VT">Vermont</option>
												<option value="VA">Virginia</option>
												<option value="WV">West Virginia</option>
											</optgroup>
										</select>
									</div>
									<div class="col-md-4 col-sm-6 col-12">
										<label for="">Property Type</label>
										<select class="selectpicker" style="width:100%; line-height: 30px;">
											<option value="Any">Any</option>
											<optgroup label="Residential">
												<option value="Apartment">Apartment</option>
												<option value="Condo">Condo</option>
												<option value="Villa">Villa</option>
												<option value="Building">Building</option>
											</optgroup>
											<optgroup label="Commercial">
												<option value="Shop">Shop</option>
												<option value="Office">Office</option>
												<option value="Warehouse">Warehouse</option>
											</optgroup>
										</select>
									</div>
									<div class="col-md-2 col-sm-6 col-6">
										<button class="button button-3d button-rounded w-100 m-0" style="margin-top: 29px !important;">Search</button>
									</div>
								</div>
								<div class="clear"></div>

								<div class="expand-link">
									<div class="row justify-content-between mt-3">
										<div class="col-md-4 col-sm-6 col-12">
											<label class="mb-3">Price Range</label>
											<input class="price-range-slider" />
										</div>
										<div class="clear d-xl-none d-lg-none d-md-none d-sm-none bottommargin-sm"></div>
										<div class="col-md-4 col-sm-6 col-12">
											<label class="mb-3">Property Area</label>
											<input class="area-range-slider" />
										</div>
										<div class="col-md-2 col-sm-6 bottommargin-sm">
											<label for="">Beds</label>
											<select class="selectpicker" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5+">5+</option>
											</select>
										</div>
										<div class="col-md-2 col-sm-6 bottommargin-sm">
											<label for="">Baths</label>
											<select class="selectpicker" multiple data-size="6" data-placeholder="Any" style="width:100%; line-height: 30px;">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5+">5+</option>
											</select>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<span class="more-search"><i class="icon-line-plus"></i> Advanced Search</span>
				</div>
			</div>
			<div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;">
				<div class="video-overlay" style="background: rgba(0,0,0,0.3); z-index: 1;"></div>
			</div>

		</section><!-- #slider end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap pt-0">

				<div class="section bg-transparent m-0 clearfix">
					<div class="container clearfix">
						<div class="row justify-content-between">
							<div class="col-4">
								<a href="#" class="btn text-white bg-color px-4"><i class="icon-line2-list"></i> List</a>
								<a href="#" class="btn btn-light ms-2 px-4"><i class="icon-map-marker2"></i> Map</a>
							</div>
							<div class="col-8 text-end">

								<div class="btn-group">
									<div class="dropdown">
										<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Listing</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
											<button class="dropdown-item" type="button">New Listing</button>
											<button class="dropdown-item" type="button">Home Opens</button>
										</div>
									</div>
									<div class="dropdown ms-2">
										<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Popular Listed</button>
										<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
											<button class="dropdown-item" type="button">A - Z Listed</button>
											<button class="dropdown-item" type="button">Price: Lowest First</button>
											<button class="dropdown-item" type="button">Price: Highest First</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="real-estate mt-5 grid-container row portfolio gutter-20 col-mb-50" data-layout="fitRows">

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger bg-color2">For Sale</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" alt="Image 1">
									</a>
									<div class="real-estate-item-price">
										$1.2m<span>Leasehold</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">3 Bedroom Villa</a></h3>
									<span>Seminyak Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium font-primary px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-danger"><i class="icon-minus-sign-alt"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-success">Hot Deal</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/2.jpg" alt="Image 2">
									</a>
									<div class="real-estate-item-price">
										$200,000<span>bi-annually</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">3 Bedroom Villa</a></h3>
									<span>Seminyak Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger">Sale</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" alt="Image 3">
									</a>
									<div class="real-estate-item-price">
										$1600<span>per Sale</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">3 Bedroom Villa</a></h3>
									<span>Seminyak Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger">Long Term Rental</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/4.jpg" alt="Image 3">
									</a>
									<div class="real-estate-item-price">
										$799<span>per month</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">2 Bedroom Appartment</a></h3>
									<span>Ubud Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger">Long Term Rental</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/5.jpg" alt="Image 3">
									</a>
									<div class="real-estate-item-price">
										$1600<span>per month</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">4 Bedroom Villa</a></h3>
									<span>Kutta Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger">Day/Monthly Rental</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/6.jpg" alt="Image 3">
									</a>
									<div class="real-estate-item-price">
										$99<span>per Day</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">3 Bedroom Villa</a></h3>
									<span>Seminyak Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger">Monthly Rental</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/7.jpg" alt="Image 3">
									</a>
									<div class="real-estate-item-price">
										$1600<span>per month</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">5 Bedroom Villa</a></h3>
									<span>Seminyak Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger">Long Term Rental</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/8.jpg" alt="Image 3">
									</a>
									<div class="real-estate-item-price">
										$1199<span>per month</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">Corporate Office</a></h3>
									<span>Legian Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

							<div class="real-estate-item portfolio-item col-12 col-md-6 col-lg-4">
								<div class="real-estate-item-image">
									<div class="label badge bg-danger">Coworking Space</div>
									<a href="#">
										<img src="<?= base_url('assets/');?>demos/real-estate/images/items/9.jpg" alt="Image 3">
									</a>
									<div class="real-estate-item-price">
										$99<span>per Week</span>
									</div>
									<div class="real-estate-item-info clearfix" data-lightbox="gallery">
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/1.jpg" data-bs-toggle="tooltip" title="Images" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
										<a href="<?= base_url('assets/');?>demos/real-estate/images/items/3.jpg" class="d-none" data-lightbox="gallery-item"></a>
										<a href="#" data-bs-toggle="tooltip" title="Like"><i class="icon-line-heart"></i></a>
									</div>
								</div>

								<div class="real-estate-item-desc p-0">
									<h3><a href="#">Coworking Office</a></h3>
									<span>Ubud Area</span>

									<a href="#" class="real-estate-item-link"><i class="icon-info"></i></a>

									<div class="line" style="margin-top: 15px; margin-bottom: 15px;"></div>

									<div class="real-estate-item-features row fw-medium px-3 clearfix">
										<div class="col-lg-4 col-6 p-0">Beds: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Baths: <span class="color">3</span></div>
										<div class="col-lg-4 col-6 p-0">Area: <span class="color">150 sqm</span></div>
										<div class="col-lg-4 col-6 p-0">Pool: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Internet: <span class="text-success"><i class="icon-check-sign"></i></span></div>
										<div class="col-lg-4 col-6 p-0">Cleaning: <span class="text-success"><i class="icon-check-sign"></i></span></div>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>

				<div class="container clearfix">
					<div class="section center m-0" style="padding:80px 0 ">
						<h3 class="fw-normal ls1">Special Offers on Villa Long Term Rentals &amp; Lease Agreements</h3>
						<a href="contact.html" class="button button-color button-large button-rounded">Contact Now</a>
					</div>
				</div>
			</div><!-- .content-wrap end -->
		</section><!-- #content end -->

		<?php include('default/footer.php');?>
	</div><!-- #wrapper end -->

	<?php include('default/footer_script.php');?>

</body>
</html>