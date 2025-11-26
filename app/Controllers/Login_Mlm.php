<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Login_Mlm extends BaseController
{
	public function admin()
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost();
        $check = $this->validate([
            'user_email' => [
                'rules' =>  'required|valid_email',
                'errors' =>  [
                    'required' => 'User Email is required',
                    'valid_email'   =>  'You must provide a valid email address.'
                ]
            ],
            'user_pass' => [
                'rules' =>  'required',
                'errors' =>  [
                    'required' => 'User Password is required'
                ]
            ],
			'captcha_code' => [
                'rules' =>  'required',
                'errors' =>  [
                    'required' => 'Captcha is required'
                ]
            ]
        ]);
        if($check)
        {
            $captcha_code = $this->session->get('catcha_code');
            if($frmdata['captcha_code'] === $captcha_code)
            { 
				$frmdata = mysql_clean($frmdata);
				
				$l_user = $this->curd_model->get_1('*', 'mlm_login', array('email_id'=>$frmdata['user_email'], 'status'=>'A'));
				
				if(isset($l_user->id))
				{ 
					if($l_user->password == $frmdata['user_pass'])
					{
						$login_data = array('user_id'=>$l_user->id,'login_time'=>date('Y-m-d H:i:s'),'ip_address'=>$_SERVER['REMOTE_ADDR'],'last_activity_time'=>date('Y-m-d H:i:s')); 
						$login_id = $this->curd_model->insert('mlm_login_history', $login_data);
						$data = array(
							'user_id' => $l_user->id,
							'login_id' => $login_id,
							'f_name' => $l_user->f_name,
							'l_name' => $l_user->l_name,
							'type' => $l_user->user_type,
							'email_id' => $l_user->email_id,
							'member_user_id' => $l_user->member_user_id
						);
						$this->curd_model->update_table('mlm_login',array('session_id'=>$login_id),array('id'=>$l_user->id)); 
						$this->session->set('mlmlogin', $data);
						$error['success'] = true;
						$error['rlink'] = site_url('members/dashboard.html');
					}else {
						$error['message']['refrence'] = 'Invalid User or Password';
					}
					 
				}
				else
				{
					$error['message']['alert'] = "Invalid User or Password";
				}
            }else{
                $error['message']['refrence'] = 'Captcha is not verified properly please try again.';
            }
        }
        else
        {
            foreach($_POST as $key =>$value)
            {
                if ($this->validation->hasError($key)) {
                    $error['message'][$key] = $this->validation->getError($key);
                }
            }
        }
        echo json_encode($error);
    }
}
?>