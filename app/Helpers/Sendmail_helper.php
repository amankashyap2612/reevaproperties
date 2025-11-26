<?php
if ( ! function_exists('send_mail'))
{
	function send_mail($config, $to, $subject, $mail_body, $attach = '')
	{
		if(@fopen("https://www.reevadeveloperspvtltd.com/","r"))
		{
			$email = \Config\Services::email();
			$configs['protocol']  = 'smtp';
			$configs['SMTPHost']  = 'mail.reevadeveloperspvtltd.com';
			$configs['SMTPPort']  = '465';
			$configs['SMTPUser']  = 'contact@reevadeveloperspvtltd.com';
			$configs['SMTPPass']  = 'NC8T[GIxMJ,e';
			$configs['SMTPCrypto']  = 'ssl';
			$configs['mailType']  = 'html';
			$configs['charset']   = 'utf-8';		
			$configs['newline']   = "\r\n";		
		    $email->initialize($configs);
			$email->setFrom('contact@reevadeveloperspvtltd.com', 'Reeva');
			$email->setTo($to);
			if($config->cc != ""){ $email->setCC($config->cc); }
			if($config->bcc != ""){ $email->setBCC($config->bcc); }
			if($attach != ""){ $email->attach($attach); }
			$email->setSubject($subject);
			$email->setMessage($mail_body);

			if($email->send())
			{  
				return $arr = array('success'=>true);
			}
			else
			{
				return $arr = array('success'=>false,'message'=>$email->printDebugger());
			}
		}
		else
		{
			return $arr = array('success'=>false,'message'=>"Please check your intrenet connection.");
		}
	}
}

/*

if ( ! function_exists('send_mail'))
{
	function send_mail($config, $to, $subject, $mail_body, $attach = '')
	{
		if(@fopen("https://www.reevadeveloperspvtltd.com/","r"))
		{
			$email = \Config\Services::email();
			$configs['protocol']  = 'smtp';
			$configs['SMTPHost']  = $config->smtp_host;
			$configs['SMTPPort']  = $config->smtp_port;
			$configs['SMTPUser']  = $config->smtp_user;
			$configs['SMTPPass']  = $config->smtp_pass;
			$configs['mailType']  = 'html';
			$configs['charset']   = 'utf-8';		
			$configs['newline']   = "\r\n";		
		    $email->initialize($configs);
			$email->setFrom($config->smtp_user, $config->username);
			$email->setTo($to);
			if($config->cc != ""){ $email->setCC($config->cc); }
			if($config->bcc != ""){ $email->setBCC($config->bcc); }
			if($attach != ""){ $email->attach($attach); }
			$email->setSubject($subject);
			$email->setMessage($mail_body);

			if($email->send())
			{  
				return $arr = array('success'=>true);
			}
			else
			{
				return $arr = array('success'=>false,'message'=>$email->printDebugger());
			}
		}
		else
		{
			return $arr = array('success'=>false,'message'=>"Please check your intrenet connection.");
		}
	}
}
*/
?>