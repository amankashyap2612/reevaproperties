<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('common/header_script.php'); ?>
	<script src="<?= base_url("assets/js/nicEdit-latest.js");?>"></script>
	<script>
	//<![CDATA[
		bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true}).panelInstance('page-main-content'); });
	//]]>
	</script>
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
                                <div>Add Web Pages</span>
                                </div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Add Web Pages</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
				
					<form class="form-submit" action="<?= site_url('web-admin/web-page/create_page'); ?>">
						<div class="row">
							<div class="col-md-6 form-group">
								<label> Heading</label>
								<input class="form-control" type="text" name="heading">
							</div>
							<div class="col-md-6 form-group">
								<label> Title</label>
								<input class="form-control" type="text" name="title">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label> Keyword</label>
								<input class="form-control" type="text" name="keyword">
							</div>
							<div class="col-md-6 form-group">
								<label> Description</label>
								<input class="form-control" type="text" name="description">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 form-group">
								<label> URL (After Domain | without: space | without: any special charector )</label>
								<input class="form-control" type="text" name="url">
							</div>
							<div class="col-md-6 form-group">
								<label> Contact Form</label>
								<select class="form-control" name="form">
									<option value="Y">Yes</option>
									<option value="N">NO</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 form-group">
								<button type="button" class="btn btn-success form-control" data-bs-toggle="modal" data-bs-target="#banner_image">Banner Image</button>
								<img id="display-img" src="<?= base_url("images/pagebanner/202004021608090.jpg");?>" style="width:100%;height:200px;">
								<input type="hidden" name="image_id" value="1">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 form-group">
								<label>Content</label>
								<textarea id="page-main-content" class="form-control" name="main_content"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 form-group">
								<label> Header Script Option</label>
								<textarea class="form-control" name="header_script" rows="5"></textarea>
							</div>
						</div>
						<div class="row"> 
							<div class="col-md-12 form-group">
								<label> Footer Script Option</label>
								<textarea class="form-control" name="footer_script" rows="5"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 form-group">
								<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
								<button type="submit" class="btn btn-success form-control">Add Page</button>
							</div>
						</div>
					</form>
                </div>      
            </div>
        </div>
    </div>

    <!--add slider-->
	
<div class="modal fade" id="banner_image" tabindex="-1" aria-labelledby="banner_image" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-full">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<p class="modal-title">Page Banner</p>
				<button type="button" class="close pull-right" data-bs-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li class="nav-item"><a class="nav-link media-link active" data-bs-toggle="tab" href="#mediaadd">Media Library</a></li>
					<li class="nav-item"><a class="nav-link file-link" data-bs-toggle="tab" href="#uploadadd">Upload Files</a></li>
				</ul>
				<div class="tab-content">
					<div id="mediaadd" class="tab-pane in active">
						<div class="row">
							<?php if(isset($image)){ foreach($images as $id => $loc){ ?>
							<div class="col-md-3">
								<img src="<?=base_url("images/".$loc);?>" class="img-thumbnail banner-img" data-img_id="<?=$id;?>">
							</div>
							<?php } } ?>
						</div>
					</div>
					<div id="uploadadd" class="tab-pane">
						<form class="form-submit" action="<?= site_url('web-admin/web-page/upload_banner_img')?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-12">
									<input type="file" name="banner_images" multiple>
								</div>
								<div class="col-md-12">
									<small>Image Size : (1200x800)</small>
								</div>
								<div class="col-md-12">
									<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
									<button type="submit" class="btn btn-success form-control">Upload</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="close" class="btn btn-default" data-bs-dismiss="modal">Select</button>
			</div>
		</div>
    </div>
</div>
<!--End Add Home Slide-->
<?php include ('common/footer_script.php');?>
<script>
$('.file-link').on('click',function(){
	$('#close').hide();
});
$('.media-link').on('click',function(){
	$('#close').show();
});
$('.banner-img').on('click',function(){
	$('.banner-img').css("background-color","#fff");
	$(this).css("background-color","darkcyan");
	var src = $(this).attr('src');
	var img_id = $(this).data('img_id');
	$('#display-img').attr('src',src);
	$('input[name=image_id]').attr('value',img_id);
});
</script>
</body>
</html>