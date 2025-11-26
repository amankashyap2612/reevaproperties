<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<?php include('default/header_script.php')?>

<style>
	input,textarea{margin-bottom:10px;}
	.contact-section {
		position: absolute;
		display: block;
		top: 0;
		right: 0;
		width: 50%;
		/*padding: 60px 60px 60px 180px;*/
		padding: 35px 30px 35px 140px;
		z-index: 0;
	}
	.contact-image {
		position: relative;
		width: 60%;
		margin-top: 30px;
		z-index: 2;
		box-shadow: 0 0 40px rgba(0,0,0,.3);
	}
	@media (max-width: 991px) {
		.contact-section {
			position: relative;
			display: block;
			width: 100%;
			padding: 20px;
		}
		.contact-image {
			width: 100%;
			margin-top: 0;
		}
	}
	</style>
</head>
<body class="stretched side-push-panel"> 
	<div id="wrapper" class="clearfix">
    <?php include('default/header.php')?>
		<section id="page-title">

			<div class="container clearfix">
				<h1>Contact</h1>
				<span>Get in Touch with Us</span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Contact</li>
				</ol>
			</div>

		</section><!-- #page-title end -->
 

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">

					<div class="row align-items-stretch col-mb-50 mb-0">
						<!-- Contact Form
						============================================= -->
						<div class="col-lg-6">

							<div class="fancy-title title-border">
								<h3>Contact Us</h3>
							</div> 

								<div class="form-result"></div>

								<form action="<?= site_url('/form/contact_us');?>" method="post" class=" form-submit  mb-0">
									<input type="text" class=" form-control input-block-level mb-20 not-dark"  name="name" value="" placeholder="Full Name"   oninput="this.value = this.value.replace(/[^A-z .]/g, '').replace(/(\..*?)\..*/g, '$1');" />
									<input type="email" class=" form-control email input-block-level  mb-20 not-dark"   name="email" value="" placeholder="Email Address" />
									<input type="text" class=" form-control input-block-level not-dark  mb-20 contact  "  name="mobile" value="" placeholder="Phone Number "   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
									<textarea class=" form-control input-block-level not-dark short-textarea    mb-20  "  name="message" rows="5" cols="30" placeholder="What are you Looking for? (Ex: Apartment on the Flat)"></textarea>
									<input type="hidden" id="csrf-token" name="<?= csrf_token();?>" value="<?= csrf_hash();?>">
									<button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit" class="button button-3d m-0">Submit </button>
								</form> 

						</div><!-- Contact Form End -->

						<!-- Google Map
						============================================= -->
						<div class="col-lg-6 min-vh-50">
							<div class="gmap h-100"  ><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3497.9153048677986!2d77.17221472445048!3d28.75194557864987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d01b0ffffffff%3A0xc6b1b8741a343841!2sReeva%20Little%20Angel%20Convent%20School!5e0!3m2!1sen!2sin!4v1713857126319!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
						</div><!-- Google Map End -->
					</div>

					<!-- Contact Info
					============================================= -->
					<div class="row col-mb-50">
						<div class="col-sm-12 col-lg-12">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-map-marker2"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Head Office  Address<span class="subtitle">KH.no.325, G.no D-13, Additional Floor Portion 2nd Floor, Guru Nanak Dev Colony Village, Bhalswa Dairy, Delhi 110042
									Nr. Reeva Little Angel School.</span></h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-map-marker2"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Branch Office 1 :- <span class="subtitle">A-1025. New Sabzi Mandi, Azadpur, Delhi-110033</span></h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-lg-4">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-map-marker2"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Branch Office 2 :- <span class="subtitle">Kh.no 51/3, Rewa Angel Mountain, Near Landa Properties, Nahari Village, Lampur Bodar, Narela</span></h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-4">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-map-marker2"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Branch Office 3 :- <span class="subtitle">A-8, Metro Bazaar, Near Nangloi Metro Station, Nangloi, Delhi-41.</span></h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-6">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-phone3"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Speak to Us<span class="subtitle"><?php $settings['contact'] = str_replace(',', ', ', $settings['contact']);echo $settings['contact']; ?></span></h3>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-lg-6">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-email"></i></a>
								</div>
								<div class="fbox-content">
									<h3>Email 
									<span class="subtitle">guptanandan46@gmail.com</span></h3>
								</div>
							</div>
						</div> 
					</div><!-- Contact Info End -->

				</div>
			</div>
		</section><!-- #content end -->

		<?php include('default/footer.php')?>
	</div>
	<?php include('default/footer_script.php')?>
</body>
</html>