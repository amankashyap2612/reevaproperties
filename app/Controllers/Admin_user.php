<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_user extends BaseController
{
    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 
        $session = $this->session->get('adminlogin');
		
        if($action == 'add_user_info')
        {
            $check = $this->validate([
                'fname' => ['rules' =>  'required','errors' =>  ['required' => 'First Name is required']],
                'lname' => ['rules' =>  'required','errors' =>  ['required' => 'Last Name is required']],
                'email' => ['rules' =>  'required|valid_email','errors' =>  ['required' => 'User Email is required','valid_email'   =>  'You must provide a valid email address.']],
                'type' => ['rules' =>  'required','errors' =>  ['required' => 'type is required']]
            ]);
			
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
				$update_data = array(
					'status' => "A",
					'create_time' => date('Y-m-d H:i:s'),
					'update_time' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
					'type' => $frmdata['type'], 
					'f_name' => $frmdata['fname'],
					'l_name' => $frmdata['lname'],
					'email_id' => $frmdata['email'],
					'password' => ""
				);
				$insert = $this->curd_model->insert('login', $update_data);
				if($insert)
				{
					$error['success'] = true;
				}
				else
				{
					$error['message']['refrence'] = '<p>Error in Insert.</p>';
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
        }
        else if($action == 'update_user_info')
        {
            $check = $this->validate([
                'f_name' => ['rules' =>  'required','errors' =>  ['required' => 'First Name is required']],
                'l_name' => ['rules' =>  'required','errors' =>  ['required' => 'Last Name is required']],
                'email' => ['rules' =>  'required|valid_email','errors' =>  ['required' => 'User Email is required','valid_email'   =>  'You must provide a valid email address.']],
                'user_id' => ['rules' =>  'required','errors' =>  ['required' => 'User is required']],
                'type' => ['rules' =>  'required','errors' =>  ['required' => 'Designation is required']],
                'status' => ['rules' =>  'required','errors' =>  ['required' => 'Status is required']]
            ]);
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
                $user = $this->curd_model->get_1('*', 'login', array('id'=>$frmdata['user_id']));
              
                if(isset($user->id) && $user->password != '')
                {
                    $update_data = array(
                        'status' => $frmdata['status'],
                        'update_time' => date('Y-m-d H:i:s'),
                        'update_by' => $session['user_id'],
                        'type' => $frmdata['type'], 
                        'f_name' => $frmdata['f_name'],
                        'l_name' => $frmdata['l_name'],
                        'email_id' => $frmdata['email']
                    );
					 
                    $update = $this->curd_model->update_table('login', $update_data, array('id'=>$frmdata['user_id']));
                    if($update)
                    {
                        $error['success'] = true;
                    }
                    else
                    {
                        $error['message']['refrence'] = '<p>Error in Update.</p>';
                    }
                }
                else
                {
                    $error['message']['alert'] = "Please generate user password.";
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
        }
        else if($action == 'update_user_password')
        {
            $session = $this->session->get('adminlogin');
            $check = $this->validate([
                'new_password' => ['rules' =>  'required','errors' =>  ['required' => 'New Password is required']],
                'con_password' => ['rules' =>  'required','errors' =>  ['required' => 'Confirm Password is required']],
            ]);
			
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
				
                if($frmdata['new_password'] == $frmdata['con_password'])
                {
                    $update_data = array(
                        'update_time' => date('Y-m-d H:i:s'),
                        'update_by' => $session['user_id'],
                        'password' => hash('sha256', $frmdata['new_password']), 
                    );
                    $update = $this->curd_model->update_table('login', $update_data, array('id'=>$frmdata['user_id']));
                    if($update)
                    {
                        $error['success'] = true;
                    }
                    else
                    {
                        $error['message']['refrence'] = '<p>Error in Update.</p>';
                    }
                }
                else
                {
                    $error['message']['refrence'] = "Password not match.";
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
        }
        else if($action=='update_access')
		{
            $check = $this->validate([
                'user_id' => ['rules' =>  'required','errors' =>  ['required' => 'User is required']]
            ]);
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
                $rmv_link = $this->curd_model->update_table('user_access',array('status'=>'D','other_action'=>''),array('user_id'=>$frmdata['user_id']));
               // print_r($rmv_link);
                if($rmv_link)
                {
                    foreach($frmdata['tab'] as $tab)
                    {
                        $action_tab = "";
                        if(isset($frmdata['action'][$tab]))
                        {
                            $action_tab = implode(" ",$frmdata['action'][$tab]);
                        }
                        $this->curd_model->customquery("
                            INSERT INTO user_access (`user_id`,`tab_id`,`status`,`other_action`) VALUES (".$frmdata['user_id'].",".$tab.",'A','".$action_tab."') 
                            ON DUPLICATE KEY UPDATE 
                            `status` = 'A',
                            `other_action` = '".$action_tab."'
                        ");
                    }
                    
                    $error['success'] = true;
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
		}
        echo json_encode($error);
    }
}

?>