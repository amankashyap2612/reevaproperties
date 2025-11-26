<?php

$CI_INSTANCE = [];  # It keeps a ref to global CI instance
function register_ci_instance(\App\Controllers\BaseController &$_ci)
{
    global $CI_INSTANCE;
    $CI_INSTANCE[0] = &$_ci;
}

function &get_instance(): \App\Controllers\BaseController
{
    global $CI_INSTANCE;
    return $CI_INSTANCE[0];
}

if(!function_exists('data_encode'))
{
	function data_encode($string)
	{
		$ciphering = "AES-128-CTR"; 
		$iv_length = openssl_cipher_iv_length($ciphering); 
		$options = 0; 
		$encryption_iv = '1234567891011121'; 
		$encryption_key = "GeniusWebSolutionsWorkingWithPCTIL"; 
		$encryption = openssl_encrypt($string, $ciphering, $encryption_key, $options, $encryption_iv); 
		return $encryption;
	}
}

if(!function_exists('data_decode'))
{
	function data_decode($string)
	{
		$ciphering = "AES-128-CTR"; 
		$iv_length = openssl_cipher_iv_length($ciphering); 
		$options = 0; 
		$decryption_iv = '1234567891011121'; 
		$decryption_key = "GeniusWebSolutionsWorkingWithPCTIL"; 
		$decryption=openssl_decrypt ($string, $ciphering, $decryption_key, $options, $decryption_iv); 
		return $decryption;
	}
}

if(!function_exists('member_count'))
{
	function member_count($mem_id)
	{
		$ci =& get_instance();
		$member = $ci->curd_model->get_1('*','mlm_login',array('id'=>$mem_id));
		// print($member);exit;
		if(isset($member->id))
		{
			$ci->curd_model->update_table('mlm_login',array('member_count' => ($member->member_count + 1)),array('id'=>$member->id));
			if($member->member_id != 0)
			{
				member_count($member->member_id);
			}
		}
	}
}

if(!function_exists('mysql_clean'))
{
	function mysql_clean($data)
	{
		$clean_input = array();
		if(is_array($data))
		{
			foreach($data as $k => $v)
			{
				$clean_input[$k] = mysql_clean($v);
			}
		}
		else
		{
			$data=str_replace('{','',$data);
			$data=str_replace('}','',$data);
			$data=str_replace('(','',$data);
			$data=str_replace(')','',$data);
			$data=str_replace('<','',$data);
			$data=str_replace('>','',$data);
			$data=str_replace('"','',$data);
			$data=str_replace("'",'',$data);
			$data=str_replace(';','',$data);
			$data=str_replace('^','',$data);
			$clean_input = trim(htmlentities(strip_tags($data)));
		}
		//$not_allowd_char = array("'", '"', ";");
		return $clean_input;
	}
}

if(!function_exists('get_menu'))
{
	function get_menu()
	{
		$ci =& get_instance(); 
		$data['session'] = $ci->session->get('adminlogin');
		if(isset($data['session']['user_id']))
		{
			$join = array(
				array(
					'table'=>'tab',
					'condition' => 'user_access.tab_id=tab.id',
					'type' => 'left'
					),
				array(
					'table' => 'tab_group',
					'condition' => 'tab.tab_group=tab_group.id',
					'type' => 'left'
				)
			);
			$whr = array('user_id'=>$data['session']['user_id'],'user_access.status'=>'A');
			$tab = $ci->curd_model->jointable('tab.name,tab.page_url,tab_group.themify,tab_group.name as group_name,user_access.other_action', 'user_access', $join, $whr, 'true', 'tab_group.id', 'desc');
			foreach($tab as $tb)
			{
				$data['tab'][$tb->group_name]['icon'] = $tb->themify;
				$data['tab'][$tb->group_name]['menu'][$tb->name] = $tb->page_url;
				$data['url'][] = $tb->page_url;
				$data['action_access'][$tb->page_url] = $tb->other_action;
			}
			return $data;
		}
	}
}

if(!function_exists('get_menu2'))
{
	function get_menu2()
	{
		$ci =& get_instance(); 
		$data['session'] = $ci->session->get('mlmlogin');
		
		/*----------Prepare Tab---------------*/
		$join = array(
			array(
				'table'=>'mlm_tab',
				'condition' => 'mlm_user_access.tab_id = mlm_tab.id',
				'type' => 'left'
				),
			array(
				'table' => 'mlm_tab_group',
				'condition' => 'mlm_tab.tab_group = mlm_tab_group.id',
				'type' => 'left'
			)
		);
		
		$whr = array('user_type_id'=>$data['session']['type'] ,'mlm_user_access.status'=>'A','mlm_tab.status'=>'A');
		$tab = $ci->curd_model->jointable('mlm_tab.name,mlm_tab.page_url,mlm_tab_group.themify,mlm_tab_group.name as group_name,mlm_user_access.other_action,mlm_tab.sort', 'mlm_user_access', $join, $whr, 'true', 'mlm_tab.sort', 'ASC');
		
		foreach($tab as $tb)
		{
			$data['tab'][$tb->group_name]['icon'] = $tb->themify;
			$data['tab'][$tb->group_name]['menu'][$tb->name] = $tb->page_url;
			$data['url'][] = $tb->page_url;
			$data['action_access'][$tb->page_url] = $tb->other_action;
			
		}
		/*---------------Prepare Tab---------------*/
		return $data;
	}
}

if(!function_exists('generate_captcha'))
{
	function generate_captcha()
	{
		$image_width = 280;
		$image_height = 50;
		$characters_on_image = 6;
		// var_dump(realpath('./monofont.ttf'));
		$font = realpath('./assets/fonts/monofont.ttf');

		//The characters that can be used in the CAPTCHA code.
		//avoid confusing characters (l 1 and i for example)
		$possible_letters = '23456789bcdfghjkmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZ';
		$random_dots = 30;
		$random_lines = 20;
		$captcha_text_color="0x142864";
		$captcha_noice_color = "0x142864";

		$code = '';

		$i = 0;
		while ($i < $characters_on_image) { 
			$code .= substr($possible_letters, mt_rand(0, strlen($possible_letters)-1), 1);
			$i++;
		}

		$font_size = $image_height * .75;
		$image = @imagecreate($image_width, $image_height);

		/* setting the background, text and noise colours here */
		$background_color = imagecolorallocate($image, 255, 255, 255);

		$arr_text_color = hexrgb($captcha_text_color);
		$text_color = imagecolorallocate($image, $arr_text_color['red'],$arr_text_color['green'], $arr_text_color['blue']);

		$arr_noice_color = hexrgb($captcha_noice_color);
		$image_noise_color = imagecolorallocate($image, $arr_noice_color['red'],$arr_noice_color['green'], $arr_noice_color['blue']);

		/* generating the dots randomly in background */
		for( $i=0; $i<$random_dots; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$image_width),mt_rand(0,$image_height), 2, 3, $image_noise_color);
		}

		/* generating lines randomly in background of image */
		for( $i=0; $i<$random_lines; $i++ ) {
			imageline($image, mt_rand(0,$image_width), mt_rand(0,$image_height),mt_rand(0,$image_width), mt_rand(0,$image_height), $image_noise_color);
		}

		/* create a text box and add 6 letters code in it */
		$textbox = imagettfbbox($font_size, 0, $font, $code); 
		$x = intval(($image_width - $textbox[4])/2);
		$y = intval(($image_height - $textbox[5])/2);
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $font , $code);

		// var_dump($image);exit;
		/* Show captcha image in the page html page */
		header('Content-Type: image/jpeg');// defining the image type to be shown in browser widow
		imagejpeg($image);//showing the image
		imagedestroy($image);//destroying the image instance
		$_SESSION['catcha_code'] = $code;
	}
}

if(! function_exists('hexrgb'))
{
	function hexrgb($hexstr)
	{
		$int = hexdec($hexstr);
		return array("red" => 0xFF & ($int >> 0x10),"green" => 0xFF & ($int >> 0x8),"blue" => 0xFF & $int);
	}
}

if(!function_exists('web_file_location'))
{
    function web_file_location()
    {
		$var = "../";
        return $var;
    }   
}

if(!function_exists('site_url_html'))
{
    function site_url_html($url = '')
    {
		$var = base_url($url).'.html';
        return $var;
    }   
}

if(!function_exists('leader_promotion'))
{
	function leader_promotion($member_id)
	{
		$ci =& get_instance(); 
		$data['session'] = $ci->session->get('mlmlogin');
		$member = $ci->curd_model->get_1("*","mlm_login",array("id"=>$member_id));
		if(isset($member->id))
		{
			$member_prof_count = 0;
			$promotion = $ci->curd_model->get_1("*","mlm_member_type",array("id"=>$member->user_type));
			if($promotion->require_profile > 0)
			{
				$member_prof_count = $ci->curd_model->count_where("mlm_login",array("member_id"=>$member->id,"user_type"=>$promotion->require_profile));
			}
			if($member_prof_count >= $promotion->require_profile_count && $member->direct_sale >= $promotion->direct_sale && $member->group_sale >= $promotion->group_sale)
			{
				if($promotion->next_profile_id > 0)
				{
					$ci->curd_model->update_table("mlm_login",array("user_type"=>$promotion->next_profile_id),array("id"=>$member->id));
				}
			}
		}
	}
}

if(!function_exists('commission_distribution'))
{
	function commission_distribution($bookingid,$memberid,$level=1,$commission=15)
	{
		$ci =& get_instance(); 
		$data['session'] = $ci->session->get('mlmlogin');
		$booking = $ci->curd_model->get_1("*","mlm_property_booking",array("id"=>$bookingid));
		if(isset($booking->id))
		{
			$prop = $ci->curd_model->get_1("*","property",array("id"=>$booking->property_id));
			$proj = $ci->curd_model->get_1("*","project",array("id"=>$prop->project_id));
			
			$member = $ci->curd_model->get_1("*","mlm_login",array("id"=>$memberid));
			if($member->member_id > 0)
			{
				$comm_dist_check = $ci->curd_model->count_where("wallet_transection_history",array("booking_id"=>$booking->id));
				if(isset($comm_dist_check) && $comm_dist_check > 0)
				{
					return false;
				}
				else
				{
					$agent_wallet = $ci->curd_model->get_1("*","agent_wallet",array("member_id"=>$member->id,"status"=>"A"));
					
					if(isset($member->id) && isset($agent_wallet->id))
					{
						$comm_amount = 0; $comm = 0;
						// Calculate commission based on level
						switch ($level) {
							case 1:
								$comm = 9;
								break;
							case 2:
								$comm = 2;
								break;
							case 3:
								$comm = 1;
								break;
							case 4:
							case 5:
								$comm = 0.50;
								break;
							case 6:
							case 7:
							case 8:
							case 9:
							case 10:
								$comm = 0.40;
								break;
							default:
								$comm = 0;
						}
						
						if($comm > 0 && $level<=10)
						{
							$comm_amount = $booking->deal_amount * ($comm / 100);
							$commission -= $comm;

							$wallet = array(
								'status' => 'A',
								'insert_at' => date('Y-m-d H:i:s'),
								'insert_by' => $data['session']['user_id'],
								'type' => 'credit',
								'amount' => $comm_amount,
								'booking_id' => $booking->id,
								'message' =>$comm.'% comm for sale '.$prop->plot_no.' Block '.$prop->block.' from '.$proj->name,
								'wallet_id' => $agent_wallet->id
							);
							$wallet_ins = $ci->curd_model->insert("wallet_transection_history",$wallet);
							if($wallet_ins)
							{
								$wallet_update = $ci->curd_model->customquery("update `agent_wallet` set `balance` = (`balance` + ".$comm_amount.") where `id` = ".$agent_wallet->id);
							}
							if($level == 1)
							{
								$ci->curd_model->customquery("update `mlm_login` set `direct_sale` = (`direct_sale` + 1) where `id` = ".$member->id);
							}
							else
							{
								$ci->curd_model->customquery("update `mlm_login` set `group_sale` = (`group_sale` + 1) where `id` = ".$member->id);
							}
							leader_promotion($member->id);
							$level++;
							commission_distribution($bookingid,$member->member_id,$level,$commission);
							return false;
						}
					}
				}
			}
			else
			{
				$agent_wallet = $ci->curd_model->get_1("*","agent_wallet",array("member_id"=>$member->id,"status"=>"A"));
				if(isset($member->id) && isset($agent_wallet->id))
				{
					$comm_amount = $booking->deal_amount * ($commission / 100);
					if($comm_amount > 0 && $commission > 0)
					{
						$wallet = array(
							'status' => 'A',
							'insert_at' => date('Y-m-d H:i:s'),
							'insert_by' => $data['session']['user_id'],
							'type' => 'credit',
							'amount' => $comm_amount,
							'booking_id' => $booking->id,
							'message' =>$commission.'% comm for sale '.$prop->plot_no.' Block '.$prop->block.' from '.$proj->name,
							'wallet_id' => $agent_wallet->id
						);
						$wallet_ins = $ci->curd_model->insert("wallet_transection_history",$wallet);
						if($wallet_ins)
						{
							$wallet_update = $ci->curd_model->customquery("update `agent_wallet` set `balance` = (`balance` + ".$comm_amount.") where `id` = ".$agent_wallet->id);
						}
					}
				}
			}
		}
	}
}


?>