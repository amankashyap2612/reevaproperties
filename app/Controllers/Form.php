<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Form extends BaseController
{
	public function action_update($action = null)
	{
		$error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true); 
		$frmdata = $this->request->getPost();
		$agent = $this->request->getUserAgent();
		if($action == 'contact_us')
		{   
			$check = $this->validate([
				'name' => ['rules'=>'required','errors'=>['required'=>' Name is Required']], 
				'email' =>['rules'=>'required', 'errors'=> ['required'=>'Email is required']],  
				'message' =>['rules'=>'required', 'errors'=> ['required'=>'Message  is Required']],    
				'mobile' =>['rules'=>'required', 'errors'=> ['required'=>'Mobile  is Required']]    
			]); 
			if($check)
			{ 
				$frmdata = mysql_clean($frmdata);
				$contact = array(
					'status'=>'A',
					'insert_time' => date('Y-m-d H:i:s'),
					'ip_address'  =>  $_SERVER['REMOTE_ADDR'],
					'system_info' =>  json_encode(array('browser'=>$agent->getBrowser(),'browser_ver'=>$agent->getVersion(),'platform'    =>  $agent->getPlatform())),
					'name'  => $frmdata['name'], 
					'email' =>$frmdata['email'],
					'message' =>$frmdata['message'], 
					'mobile' =>$frmdata['mobile'], 
				); 
				$insert = $this->curd_model->insert('frm_contact', $contact);
				if($insert)
				{  
					$mail_settings = $this->curd_model->get_1('*','mail_settings',array('mail_owner'=>'website','template'=>'contact_form'));
					$subject = 'Reeva Contact Us ';
					$mail_body = contact_us($contact,$insert);
					$mail_response = send_mail($mail_settings,$frmdata['email'],$subject,$mail_body);
					if($mail_response['success'])
					{
						$error['success'] = true;
						$error['alert1']  = 'Thank you for contacting us. We will reply to you soon.';
					}
					else
					{
						$error['message']['refrence'] = $mail_response['message'];
					}
				}
				else
				{
					$error['message']['reference'] = 'Error In Add Data';
				}
			}
			else
			{  
				foreach ($_POST as $key => $value)
				{
					if($this->validation->hasError($key))
					{
						$error['message'][$key] =$this->validation->getError($key);
					}
				}
			}
		}
		else if($action == 'search_property')
		{
			$check = $this->validate([
				'location' => ['rules'=>'required','errors'=>['required'=>' Location is Required']], 
				'project' =>['rules'=>'required', 'errors'=> ['required'=>'Project is required']],  
				'block' =>['rules'=>'required', 'errors'=> ['required'=>'Block  is Required']],    
			]); 
			if($check)
			{ 
				print_r($frmdata);exit;
				$contact = array(
					'status'=>'A',
					'insert_time' => date('Y-m-d H:i:s'),
					'ip_address'  =>  $_SERVER['REMOTE_ADDR'],
					'system_info' =>  json_encode(array('browser'=>$agent->getBrowser(),'browser_ver'=>$agent->getVersion(),'platform'    =>  $agent->getPlatform())),
					'name'  => $frmdata['name'], 
					'email' =>$frmdata['email'],
					'message' =>$frmdata['message'], 
					'mobile' =>$frmdata['mobile'], 
				); 
				$insert = $this->curd_model->insert('contact_us', $contact);
				if($insert)
				{  
					$error['success'] = true;
					$error['alert1']  = 'Thanks for Contact Us We will Reply U Soon';
				}
				else
				{
					$error['message']['reference'] = 'Error In Add Data';
				} 
			}
			else
			{  
				foreach ($_POST as $key => $value)
				{
					if($this->validation->hasError($key))
					{
						$error['message'][$key] =$this->validation->getError($key);
					}
				}
			}
		}
		else if($action == 'subscribe')
		{
			$check = $this->validate([ 
				'email' =>['rules'=>'required', 'errors'=> ['required'=>'Email is required']]
			]); 
			if($check)
			{ 
				$frmdata = mysql_clean($frmdata);
				$contact = array(
					'status'=>'A',
					'insert_time' => date('Y-m-d H:i:s'),
					'ip_address'  =>  $_SERVER['REMOTE_ADDR'],
					'system_info' =>  json_encode(array('browser'=>$agent->getBrowser(),'browser_ver'=>$agent->getVersion(),'platform'    =>  $agent->getPlatform())), 
					'email' =>$frmdata['email'], 
				); 
				$insert = $this->curd_model->insert('subscribe', $contact);
				if($insert)
				{  
					$error['success'] = true;
					$error['alert1']  = 'Thanks for Subscribe  Us.';
				}
				else
				{
					$error['message']['reference'] = 'Error In Add Data';
				} 
			}
			else
			{  
				foreach ($_POST as $key => $value)
				{
					if($this->validation->hasError($key))
					{
						$error['message'][$key] =$this->validation->getError($key);
					}
				}
			}
		} 
		else if($action == 'login')
		{  
			$check = $this->validate([ 
				'email' =>['rules'=>'required', 'errors'=> ['required'=>'Email is required']],  
				'password' =>['rules'=>'required', 'errors'=> ['required'=>'Password  is Required']],   
				'captcha_code' =>['rules'=>'required', 'errors'=> ['required'=>'Captcha  is Required']],   
			]); 
			if($check)
			{
				$captcha_code = $this->session->get('catcha_code');
				if($frmdata['captcha_code'] == $captcha_code)
				{
					$sql = $this->curd_model->get_1('*','registration', array('email'=>$frmdata['email'],'status'=>'A'));
					if($sql)
					{
						if($sql->password == hash('sha256', $frmdata['password']))
						{
							$data['get_user'] = $this->curd_model->get_1('*', 'registration', array('email'=>$frmdata['email'],'status'=>'A')); 
							$skills = $this->curd_model->get_all('*','skills', array('status'=>'A'),'name','ASC');
							foreach($skills as $sk)
							{
								$data['skills'][$sk->name] = $sk;
							}
								$fieldsnotempty = true;
								foreach ($sql as $field => $fieldvalue) {
									if (empty($fieldvalue)) {
										$fieldsnotempty = false;
										//echo $field."is empty!"; 
									}
								}
								if ($fieldsnotempty)
								{ 
									$login_data = array('user_id'=>$sql->id,'login_time'=>date('Y-m-d H:i:s'),'ip_address'=>$_SERVER['REMOTE_ADDR'],'last_activity_time'=>date('Y-m-d H:i:s'));
									$sql1 = $this->curd_model->insert('login_history', $login_data);
									$data = array(
										'user_id' => $sql->id,
										'login_id' => $sql1,
										'username' => $sql->username, 
										'email' => $sql->email
									);
									$this->session->set('userlogin', $data);
									$this->curd_model->update_table('registration',array('session_id'=>$sql1),array('id'=>$sql->id));
									$error['success'] = true;
									$error['rlink'] = 'user-admin/search';
								} 
								else
								{ 
									$id = data_encode($sql->id);
									$error['success'] = true;
									$error['rlink'] = site_url('/profile?response='.$id);
								} 
						}else
						{
							$error['message']['reference'] = 'Password not Match';
						}
					}else
					{
						$error['message']['reference'] = 'User Not Found';
					}
					 
				}
				else
				{
					$error['message']['refrence'] = 'Captcha is not verified properly please try again.';
				}
			}
			else
			{  
				foreach ($_POST as $key => $value)
				{
					if($this->validation->hasError($key))
					{
						$error['message'][$key] =$this->validation->getError($key);
					}
				}
			}
		}
		else if($action == 'bulk_add')
		{
			$count = 641;
			$add = array(); 
			for ($i = 0; $i < $count; $i++) {
				$add[] = array(
					'status' => 'A', // Changed '=' to '=>' for array key-value assignment
					'plot_no' => $i,
				); // Corrected syntax for array initialization
			}

			$add_property = $this->curd_model->insert_batch_data('property', $add);

			if ($add_property) {
				$error['success'] = true;
			} else {
				$error['message']['reference'] = 'Error in adding data'; // Corrected spelling of 'reference'
			}
		}
		echo json_encode($error);
	}
}




?>
