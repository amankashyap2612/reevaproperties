<div id="gotoTop" class="icon-angle-up"></div> 
	<script src="<?= base_url('assets/')?>js/jquery.js"></script>
	<script src="<?= base_url('assets/')?>js/plugins.min.js"></script>  
	<script src="<?= base_url('assets/')?>js/components/bs-select.js"></script> 
	<script src="<?= base_url('assets/')?>js/components/bs-switches.js"></script> 
	<script src="<?= base_url('assets/')?>js/components/rangeslider.min.js"></script> 
	<script src="<?= base_url('assets/')?>js/functions.js"></script>
	<script src="<?= base_url('assets/')?>js/gaurav_js.js"></script>
	<script>
	var csrf_token = '<?=csrf_token();?>';
	var csrf_hash = '<?=csrf_hash();?>';
	$(document).ready(function(){
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
	});

	jQuery(document).ready(function(){
		$(".price-range-slider").ionRangeSlider({
			type: "double",
			prefix: "Rs",
			min: 0,
			max: 10000,
			max_postfix: "+"
		});
		$(".area-range-slider").ionRangeSlider({
			type: "double",
			min: 10,
			max: 20000,
			from: 10,
			to: 20000,
			postfix: " sqm.",
			max_postfix: "+"
		});
		jQuery(".bt-switch").bootstrapSwitch();
	});
</script>