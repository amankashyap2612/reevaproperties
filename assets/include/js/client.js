
function update_token(result)
{
    csrf_token = result.error_token.cname;
    csrf_hash = result.error_token.cvalue;
}
$(document).ready(function(){
	$('.form-submit').submit(function(e){
        e.preventDefault();
        var frm = $(this);
		var form_btn = $(frm).find('button[type="submit"]');
		var form_result_div = '#form-result';
		$(form_result_div).remove();
		form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
		var form_btn_old_msg = form_btn.html();
		form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
        var csrf = frm.find('input[name='+ csrf_token +']').val();
        if(csrf && csrf.length > 5)
        {
            $.ajax({
                url: frm.attr('action'),
                data: new FormData(this),
                type: 'post',
                dataType: 'json',
                contentType: false,
                processData: false,
                cache: false,
                success: function(result){
                    update_token(result);
					console.log(result);
					$('input[name='+ csrf_token +']').attr('value',csrf_hash);
                    if(result.success == true){
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        if(result.rlink){
                            window.location.href = result.rlink;
                        }else if(result.alert){
							$(frm).find('.form-control').val('');
							$(form_result_div).html(result.alert).fadeIn('slow');
                        }else if(result.alert1){
							$(frm).find('.form-control').val('');
                            $(form_result_div).html(result.alert1).fadeIn('slow');
                            setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                        }else if(result.result){
                            $(".card-body").html(result.output);
							$('.modal').modal('hide');
                        }else{
							window.location = window.location.href;
                        }
                    }else{
                        form_btn.prop('disabled', false).html(form_btn_old_msg);
                        var error = '';
                        $.each(result.message, function(key,value){
                            var inpt = frm.find('input[name='+key+'], textarea[name='+key+'], select[name='+key+']');
                            if(value.length > 2){
                                if(result.border == true){
                                    inpt.addClass('border-danger');
                                    error = error + ', ' + value;
                                }else{
                                    inpt.addClass('border-danger').before(value);
                                }
                            }
                        });
						$("#captcha_code").attr("src",'https://reevadeveloperspvtltd.com/catch_captcha');
                        $(form_result_div).html(error).fadeIn('slow');
                        setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                        
                    }
                   
                }
            });
        }
    });
	// $(document).bind("contextmenu",function(e){ return false; }); $(window).on('keydown',function(event){ if(event.keyCode==123){ return false; }else if(event.ctrlKey && event.shiftKey && event.keyCode==73){ return false; }else if(event.ctrlKey && event.keyCode==73){ return false; } });
});