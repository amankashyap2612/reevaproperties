<?php if(session()->has('mlmlogin')){ ?>
<div class="cropHolder">
	<div class="row">
		<div class="col-md-10">
			<div id="cropWrapper">
				<img id="inputImage" src="images/face.jpg">
			</div>
		</div>
		<div class="col-md-2">
			<div class="cropInputs">
				<div class="row">
					<div class="col-md-12 form-group">
						<div class="inputtools">
							<p><span>Horizontal Movement</span></p>
							<input type="range" class="cropRange form-control" name="xmove" id="xmove" min="0" value="0">
						</div>
					</div>
					<div class="col-md-12 form-group">
						<div class="inputtools">
							<p><span>Vertical Movement</span></p>
							<input type="range" class="cropRange form-control" name="ymove" id="ymove" min="0" value="0">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 form-group">
						<button class="cropButtons btn btn-primary form-control" id="zplus" >
							<i class="fa fa-plus" aria-hidden="true"></i>
						</button>
					</div>
					<div class="col-md-6 form-group">
						<button class="cropButtons btn btn-primary form-control" id="zminus">
							<i class="fa fa-minus" aria-hidden="true"></i>
						</button>
					</div>
					<div class="col-md-6 form-group">
						<button id="cropSubmit" class="btn btn-primary form-control">submit</button>
					</div>
					<div class="col-md-6 form-group">
						<button id="closeCrop" class="btn btn-primary form-control">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<script src="<?= base_url('assets/include'); ?>/js/lib/jquery.min.js"></script>
<!-- bootstrap -->
<script src="<?= base_url('assets/include/js'); ?>/moment.js"></script>
<script src="<?= base_url('assets/include'); ?>/js/bootstrap.min.js"></script>
<!-- nano scroller -->
<script src="<?= base_url('assets/include'); ?>/js/lib/jquery.nanoscroller.min.js"></script>
<!-- sidebar -->
<script src="<?= base_url('assets/include'); ?>/scripts/main.d810cf0ae7f39f28f336.js"></script>
<script src="<?= base_url('assets/include'); ?>/js/lib/menubar/sidebar.js"></script>
<script src="<?= base_url('assets/include'); ?>/js/lib/preloader/pace.min.js"></script>
<script src="<?= base_url('assets/include'); ?>/js/lib/jquery-ui.js"></script>
<script src="<?= base_url('assets/include'); ?>/js/lib/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/include/js/fineCrop.js'); ?>"></script>
<script src="<?= base_url('assets/include'); ?>/js/scripts.js"></script>
<script src="<?= base_url('assets/include/js'); ?>/datepicker.js"></script>
<script src="<?= base_url('assets/include/js'); ?>/timepicker.js"></script>
<script src="<?= base_url('assets/include/js'); ?>/daterangepicker.js"></script>
<script src="<?= base_url('assets/include/js'); ?>/client.js"></script>
<script>
var csrf_token = '<?=csrf_token();?>';
var csrf_hash = '<?=csrf_hash();?>';
var base_url = '<?=base_url();?>';
$(document).ready(function(){
	
	$( ".datepicker" ).datepicker({
		dateFormat: 'yy-mm-dd',
		changeYear: true,
		changeMonth: true
	});
	
	function updateBlockOptions(proj_id, changeSelector)
	{
		$.ajax({
			url: '<?=site_url('catches/catch_block');?>',
			data: {proj_id:proj_id,[csrf_token]:csrf_hash},
			type: 'POST',
			dataType: 'json',
			cache: false,
			success: function(result) {
				update_token(result);
				$('input[name='+ result.error_token.cname +']').attr('value',result.error_token.cvalue);
				if(result.success)
				{
					var opt = '<option value="">Choose Block</option>';
					$.each(result.block_name, function(ind, val) {
						opt = opt + '<option value="' + val.blocks + '">' + val.blocks + ' Block</option>';
					});
					$('select[name="' + changeSelector + '"]').html(opt);
				}
			}
		});
	}

	$('.project').on('change', function() {
		var change = $(this).data('change');
		var proj_id = this.value;
		updateBlockOptions(proj_id, change);
		$('select[name="' + change + '"]').data("project",proj_id);
	});

	function updateAreaOptions(block, project, changeSelector)
	{
		$.ajax({
			url: '<?= site_url('catches/catch_area')?>',
			data: { block: block, project:project, [csrf_token]: csrf_hash},
			type: 'POST',
			dataType: 'json',
			cache: false,
			success: function(result)
			{
				update_token(result);
				$('input[name='+ result.error_token.cname +']').attr('value',result.error_token.cvalue);
				if(result.success)
				{
					var opt = '<option value="">Choose Size</option>';
					$.each(result.size_name, function(ind, val){
						opt = opt + '<option value="' + val.size + '">' + val.size + ' Gaj </option>';
					});
					$('select[name="' + changeSelector + '"]').html(opt);
				}
			}
		});
	}

	$('.block').on('change',function(){
		var change = $(this).data('change');
		var project = $(this).data('project');
		var block = this.value;
		updateAreaOptions(block, project, change);
		$('select[name="' + change + '"]').data("project",project);
		$('select[name="' + change + '"]').data("block",block);
	});
	
	function updatePlotOptions(area, block, project, changeSelector)
	{
		$.ajax({
			url: '<?= site_url('catches/catch_plot_no')?>',
			data: { area: area, block: block, project: project, [csrf_token]: csrf_hash },
			type: 'POST',
			dataType: 'json',
			cache: false,
			success: function(result) {
				update_token(result);
				$('input[name='+ result.error_token.cname +']').attr('value',result.error_token.cvalue);
				var opt = '<option value="">Choose Plot</option>';
				$.each(result.search_plot, function(ind, val) {
					opt = opt + '<option value="' + val.id + '">' + val.plot_no + ' </option>';
				});
				$('select[name="' + changeSelector + '"]').html(opt);
			}
		});
	}

	$('.catch_plot').on('change', function() {
		var change = $(this).data('change');
		var project = $(this).data('project');
		var block = $(this).data('block');
		var area = this.value;
		updatePlotOptions(area, block, project, change);
	});

});
</script>
<script>

$(function(){
var minLength = 5;
var maxLength = 10;
	
	$('.contact').on('keydown keyup change', function(){
        var char = $(this).val();
        var charLength = $(this).val().length;
        if(charLength < minLength){
           // $('span').text('Length is short, minimum '+minLength+' required.');
        }else if(charLength > maxLength){
           // $('span').text('Length is not valid, maximum '+maxLength+' allowed.');
            $(this).val(char.substring(0, maxLength));
        }else{
            //$('span').text('Length is valid');
        }
    });
	
	

	$('.datetimepicker3,.datetimepicker4').datetimepicker({
		format: 'DD-MM-YYYY HH:mm:ss',
		minDate: '<?=date('d-M-Y H:i:s',strtotime("+2 Hour"));?>',
	});
	
	$('.change-status').on('click', function(){
		var item = $(this).data('id');
		var status = $(this).data('status');
		var url = $(this).data('url');
		if(item != "" && status != "" && url != "")
		{
			$("#object-" + item).html("<img src='<?= base_url('assets'); ?>/images/loader.gif' style='width: 40px;'>");
			$.ajax({
				type: "POST",
				url: url,
				data: {status:status,id:item,[csrf_token]:csrf_hash},
				dataType: 'json',
				cache: false,
				success: function(result){
					update_token(result);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
					if(result.success == true){
						location.reload();
					}else{
						$.each(result.message, function(key,value){
							var inpt = frm.find('input[name='+key+'], textarea[name='+key+'], select[name='+key+']');
							if(value.length > 2){
								if(result.border == true){
									inpt.addClass('border-danger');
									$('#toast-erromsg').show().append(value);
								}else{
									inpt.addClass('border-danger').before(value);
								}
							}
						});
						setTimeout(function(){
							$('#toast-erromsg').fadeOut(600)
						}, 3500);
					}
					$('.preloader').hide();
				}
			});
		}
	});
});

 
</script>