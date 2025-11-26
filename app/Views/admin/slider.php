<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('common/header_script.php'); ?>
	<style> 
		#croppedImg{ 
			height:160px;
		}
		.media-container{
			height: 300px;
			overflow-x: hidden;
		}
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
                                <div>Home Slider</div>
                            </div>
                            <div class="page-title-actions">
                                 <ol class="breadcrumb float-end p-2">
                                    <li class="p-l-5"><a href="#">Dashboard</a></li>
                                    <li class="p-l-5"><a href="#">/</a></li>
                                    <li class="p-l-5"><a href="#">Slider</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
					<div class="tabs-animation">
						<form action="<?=site_url('web-admin/slider');?>" method="get">
							<div class="row">
								<div class="col-md-6">
									<select class="form-control" name="status">
										<option value="A" <?php echo (('A'==$status)?'selected':''); ?>>Activated</option>
										<option value="D" <?php echo (('D'==$status)?'selected':''); ?>>Deactivated</option>
									</select>
								</div>
								<div class="col-md-3">
									<input type="submit" class="form-control btn btn-success" value="Fetch">
								</div>
								<div class="col-md-3">
								<?php if(in_array('1',$other_action)){ ?>
									<input type="button" class="form-control btn btn-success" data-bs-toggle="modal" data-bs-target="#addSlider" value="Add New">
								<?php } ?>
								</div>
							</div>
						</form>
						<table class="table table-hover table-striped table-bordered mt-4">
							<thead>
								<tr>
									<th>Image</th>
									<th>Heading</th>
									<th>Sub-Heading</th>
									<th>Text</th>
									<th>Sort</th>
									<th>Updated By</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($slider as $sld){?>
								<tr>
									<td><img src="<?= base_url('images/'.$image_detail[$sld->img]);?>" style="width:100px;"></td>
									<td><?= $sld->top_line; ?></td>
									<td><?= $sld->middle_line; ?></td>
									<td><?= $sld->bottom_text; ?></td>
									<td><?= $sld->sort_data; ?></td>
									<td><?= $user_info[$sld->update_by]->f_name; ?></td>
									<td id="slide-<?= $sld->id;?>">
										<?php if(in_array('3',$other_action)){ ?>
										<a href="#" data-url="<?=site_url('/web-admin/slider/change-status-slider');?>" data-id="<?=$sld->id;?>" data-status="<?=$sld->status;?>" class="change-status btn btn-primary"><?=($sld->status=="A")?'Deactive':'Active'?></a>
										<?php } ?>	
									</td>
									<td><a class="edit-slider btn btn-primary" href="#" 
									data-bs-toggle="modal" 
									data-bs-target="#editSlider" 
									data-imgid="<?=$sld->img?>" 
									data-top="<?= $sld->top_line; ?>" 
									data-mid="<?= $sld->middle_line; ?>" 
									data-bottom="<?= $sld->bottom_text ;?>" 
									data-sort="<?= $sld->sort_data ?>" 
									data-link_button="<?= $sld->link_button; ?>" 
									data-form_button="<?= $sld->form_button; ?>" 
									data-form_type="<?= $sld->form_type; ?>" 
									data-url_ref="<?= $sld->url_ref; ?>" data-img_src="<?=site_url();?>images/<?= $image_detail[$sld->img]; ?>" data-slideid="<?= $sld->id; ?>">Edit</a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="addSlider" role="dialog">
		<div class="modal-dialog modal-lg modal-full">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<p class="modal-title">Add Slider</p>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#main">Add Slider</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#mediaadd">Media</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#uploadadd">Upload</a></li>
					</ul>
					<div class="tab-content">
						<div id="mediaadd" class="tab-pane p-10">
							<div class="row media-container">
								<?php if(isset($slider_img)){ foreach($slider_img as $loc){?>
								<div class="col-md-3 text-center">
									<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?= $loc->id;?>" data-display="add-image-frame" data-copy="image_id">
									<!-- delete icon bottom of image -->
									<i class="ti-trash" data-slider_img_id="<?= $loc->id;?>"></i>
								</div>
								<?php } } ?>
							</div>
						</div>
						
						<div id="uploadadd" class="tab-pane p-10">
							<form class="form-submit" action="<?= site_url('/web-admin/slider/upload_slider_img')?>" enctype="multipart/form-data">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												<label>Slider Image Size : (1200x800)</label>
												<input type="file" name="slider_images" id="upphoto" class="form-control">
											</div>
											<div class="col-md-12">
												<input type="hidden" name="croppedImg" value="">
												<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
												<button type="submit" class="btn btn-success form-control" data-loading-text="Please Wait...!">Upload</button>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<img id="croppedImg">
									</div>
								</div>
							</form>
						</div>
								
						<div id="main" class="tab-pane in active">
							<form class="form-submit" method="post" action="<?= site_url('/web-admin/slider/add_slider')?>">
								<div class="row">
									<div class="col-md-4 col-sm-12" >
										<img src="<?=base_url("images/".$image_detail[3]);?>" class="img-thumbnail" id="add-image-frame">
									</div>
									<div class="col-md-8 col-sm-12" >
										<div class="row">
											<div class="col-md-12 col-sm-12 form-group" >
												<input type="text" name="top" class="form-control" placeholder="Top Line">
											</div>
											<div class="col-md-12 col-sm-12 form-group" >
												<input type="number" name="sort_data" class="form-control" placeholder="Sort Data">
											</div>
										</div> 
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input type="hidden" class="form-control" name="image_id">
										<input id="csrf-token" type="hidden" name="<?= csrf_token(); ?>" value="<?= csrf_hash(); ?>">
										<button type="submit" class="btn btn-success" style="width: 100%;"> <span class="btn-val">Add Slider</span></button>
									</div> 
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Add Home Slide-->

	<!--Edit slider-->
		
	<div class="modal fade" id="editSlider" role="dialog">
		<div class="modal-dialog modal-lg modal-full">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Edit Slider </h4>
					<button type="button" class="close" data-bs-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
						<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#edt_main">Update Slider</a></li>
						<li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#edt_media">Media</a></li>
					</ul>
					<div class="tab-content">
						<div id="edt_media" class="tab-pane">
							<div class="row media-container">
								<?php if(isset($slider_img)){ foreach($slider_img as $loc){ ?>
								<div class="col-md-3">
									<img src="<?=base_url("images/".$loc->location);?>" class="img-thumbnail banner-img" data-img_id="<?= $loc->id;?>" data-display="edit-image-frame" data-copy="edt_image_id">
									<i class="ti-trash" style="margin-left:70px;" data-slider_img_id="<?= $loc->id;?>"></i>
								</div>
								<?php } } ?>
							</div>
						</div>
						<div id="edt_main" class="tab-pane in active">
							<form class="form-submit" method="post" action="<?= site_url('/web-admin/slider/update_slider')?>">
								<div class="row">
									<div class="col-md-4 col-sm-12" >
										<img src="<?=base_url("images/".$image_detail[3]);?>" class="img-thumbnail" id="edit-image-frame">
									</div>
									<div class="col-md-8 col-sm-12">
										<div class="row">
											<div class="col-md-12 col-sm-12 form-group">
												<input type="text" name="edt_top" class="form-control" placeholder="Top Line">
											</div>
											<div class="col-md-12 col-sm-12 form-group" >
												<input type="number" name="edt_sort" class="form-control" placeholder="Sort Data">
											</div>
										</div>
									</div>
								</div>		
								<div class="row">
									<div class="col-md-12 col-sm-12 form-group">
										<input type="hidden" class="form-control" name="edt_image_id">
										<input type="hidden" class="form-control" name="slider_id">
										<input id="csrf-token" type="hidden" name="<?= csrf_token();?>" value="<?= csrf_hash();?>">
										<button type="submit" class="btn btn-success" style="width: 100%;"> <span class="btn-val">Update Slider</span></button>
									</div> 
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="app-drawer-overlay d-none animated fadeIn"></div> 
	<?php include('common/footer_script.php'); ?>
    <script>
        $( function() {
			
			$('.banner-img').on('click',function(){
				var src = $(this).attr("src");
				var img_id = $(this).data("img_id");
				var copy = $(this).data("copy");
				var display = $(this).data("display");
				$("input[name='"+copy+"']").attr("value",img_id);
				$("#"+display).attr("src",src);
				$('.banner-img').css("background-color","#fff");
				$(this).css("background-color","darkcyan");
			}); 
			
			$('.edit-slider').on('click',function(){
				var slideid = $(this).data('slideid');
				var imgid = $(this).data('imgid');
				var top = $(this).data('top');
				var mid = $(this).data('mid');
				var sort = $(this).data('sort');
				var bottom = $(this).data('bottom');
				var link_button = $(this).data('link_button');
				var form_button = $(this).data('form_button');
				var form_type = $(this).data('form_type');
				var url_ref = $(this).data('url_ref');
				var img_src = $(this).data('img_src');
				
				$('input[name=slider_id]').attr('value',slideid);
				$('input[name=edt_image_id]').attr('value',imgid);
				$('input[name=edt_top]').attr('value',top);
				$('input[name=edt_mid]').attr('value',mid);
				$('input[name=edt_sort]').attr('value',sort);
				$('input[name=edt_bottom]').attr('value',bottom);
				if(link_button == 'Y'){
					$('input[name="edt_link_button"]').prop("checked",true);
				}
				else{
					$('input[name="edt_link_button"]').prop("checked",false);
				}
				if(form_button == 'Y'){
					$('input[name="edt_form_button"]').prop("checked",true);
				}
				else{
					$('input[name="edt_form_button"]').prop("checked",false);
				}
				$('select[name="edt_form_type"]').find('option[value="'+form_type+'"]').attr("selected",true);
				$('input[name=edt_url_ref]').attr('value',url_ref);
				$('#edit-image-frame').attr('src',img_src);
			});
			
			$("#upphoto").finecrop({
				viewHeight: 1400,
				cropWidth: 1200,
				cropHeight: 800,
				cropInput: 'inputImage',
				cropOutput: 'croppedImg',
				zoomValue: 50
			});
			
		});
    </script>
</body>
</html>