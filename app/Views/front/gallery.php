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
		<section id="page-title" class="page-title-parallax page-title-dark page-title-center include-header include-topbar" style="background: url('<?= base_url('assets/')?>demos/real-estate/images/contact/page-title.jpg') no-repeat center center / cover; padding: 160px 0;" data-center="background-position: 0px 50%;" data-top-bottom="background-position:0px 0%;">
			<div class="container clearfix">
				<h1>Gallery</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item"><a href="#">Real Estate</a></li>
					<li class="breadcrumb-item active">Gallery</li>
				</ol>
			</div>
			<div class="video-wrap" style="position: absolute; top: 0; left: 0; height: 100%; z-index:1;"> 
				</div>
		</section>
		<section id="content">
			<div class="content-wrap">
				<div class="container clearfix"> 
					<div class="masonry-thumbs grid-container grid-6" data-big="3" data-lightbox="gallery">
						<?php foreach($gallery as $gal){ ?>
							<a class="grid-item" href="<?= base_url("images/". $image[$gal->img_id] );?>" data-lightbox="gallery-item"><img src="<?= base_url("images/". $image[$gal->img_id] );?>" alt="<?= $gal->area;?>"></a>
						<?php } ?>
						<div class="mt-3"> 
						</div>
					</div> 
				</div>
			</div>
		</section>
		<?php include('default/footer.php')?>
	</div>
	<?php include('default/footer_script.php')?>
</body>
</html>