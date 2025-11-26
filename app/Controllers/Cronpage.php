<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Cronpage extends BaseController
{
	public function test()
	{
		///
	}
	
	public function mlm_event()
	{
		$this->birthday(); 
	}
	
	public function birthday()
	{
		$birthdays = $this->curd_model->customquery1("select * from `mlm_login` where `dob` LIKE '%".date('-m-d')."' and `status` = 'A' order by `dob` ASC",array()); 
		if (count($birthdays) > 0)
		{
			foreach ($birthdays as $birth)
			{ 
				$mail_settings = $this->curd_model->get_1("*","mail_settings",["mail_owner" =>"website","template" =>"contact_form",]);
				$subject = 'Happy Birthday ' . ucwords($birth->f_name . ' ' . $birth->l_name); 
				$mail_body = mlm_user_birthday($birth->f_name . ' ' . $birth->l_name, $birth->dob);
				//print_r($mail_body);
				$mail_response = send_mail($mail_settings,$birth->email_id,$subject,$mail_body);
				if ($mail_response["success"]) {
					$error["success"] = true;
				}
				else 
				{
					$error["message"]["refrence"] = $mail_response["message"];
				}
			}
		}
	}
}
