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
		padding: 60px 60px 60px 180px;
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
		<section id="page-title" class="page-title-parallax page-title-dark page-title-center  " style="background: url('<?= base_url('assets/')?>demos/real-estate/images/builders/page-title.jpg') no-repeat center center / cover; padding: 140px 0;" data-center="background-position: 0px 50%;" data-top-bottom="background-position:0px 0%;">

			<div class="container clearfix">
				<h1>Vision</h1>
				<ol class="breadcrumb text-white">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Reava Developer</a></li>
					<li class="breadcrumb-item active">Vision</li>
				</ol>
			</div> 

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix">
					<div class="heading-block border-0 mw-100">
						<h2 class="mb-4">Our Vision</h2>
						<img src="<?= base_url('assets/images/photo_6120594380285918231_x.jpg');?>" class="mb-5"/>
						<p class="lead">Welcome to Reeva Developers, where we specialize in addressing your real estate requirements with utmost professionalism. Driven by a dedication to excellence and a genuine enthusiasm for client satisfaction, we are dedicated to delivering unmatched service and expertise throughout every interaction. Our seasoned team of agents possesses comprehensive understanding of the local market, enabling us to assist you in locating the perfect property or maximizing the potential of your current investment.</p>
					</div>
					
				</div>
			</div><!-- .content-wrap end -->
		</section>
		<?php include('default/footer.php')?>
	</div>
	<?php include('default/footer_script.php')?>
</body>
</html>