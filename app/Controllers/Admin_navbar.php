<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_navbar extends BaseController
{
    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 		
        $session = $this->session->get('adminlogin');
		
        if($action == 'add_navbar')
        {
			$check = $this->validate([
                'name' => ['rules' =>  'required','errors' =>  ['required' => 'Name is required']],
                'url' => ['rules' =>  'required','errors' =>  ['required' => 'Link is required']],
                'sort' => ['rules' =>  'required','errors' =>  ['required' => 'Sort is required']],
                'parent_name' => ['rules' =>  'required','errors' =>  ['required' => 'Parent name is required']],
            ]);
			
            if($check)
            {
				$frmdata = mysql_clean($frmdata);
				$add_data = array(
					'status' => "A",
					'name' => $frmdata['name'],
					'url' => $frmdata['url'],
					'parent_name' => $frmdata['parent_name'],
					'sort' => $frmdata['sort'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				);
				$insert = $this->curd_model->insert('navbar', $add_data);
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
                    if ($this->validation->hasError($key)) 
					{
                        $error['message'][$key] = $this->validation->getError($key);
                    }
                }
            }
        }
        else if($action == 'update_navbar')
        {
            $check = $this->validate([
                'edt_name' => ['rules' =>  'required','errors' =>  ['required' => 'Name is required']],
                'edt_url' => ['rules' =>  'required','errors' =>  ['required' => 'Link is required']],
                'edt_sort' => ['rules' =>  'required','errors' =>  ['required' => 'Sort is required']],
                'edt_parent_name' => ['rules' =>  'required','errors' =>  ['required' => 'Parent name is required']],
            ]);
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
				$update_data = array(
					'name' => $frmdata['edt_name'],
					'url' => $frmdata['edt_url'],
					'parent_name' => $frmdata['edt_parent_name'],
					'sort' => $frmdata['edt_sort'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				);
		
				$update = $this->curd_model->update_table('navbar', $update_data, array('id'=>$frmdata['edt_id']));
				
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
                foreach($_POST as $key =>$value)
                {
                    if ($this->validation->hasError($key)) 
					{
                        $error['message'][$key] = $this->validation->getError($key);
                    }
                }
            }
        }
		else if($action == 'change_navbar_status')
		{
			$check = $this->validate([
				'status' => ['rules' =>  'required','errors' =>  ['required' => 'status is required']],
				'id' => ['rules' =>  'required','errors' =>  ['required' => 'web page is required']],
			]);
			if($check)
			{
				$frmdata = mysql_clean($frmdata);
				$data = array(
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
					'status' => (($frmdata['status'] == 'D') ? 'A' : 'D')
				);
				$sql = $this->curd_model->update_table('navbar', $data, array('id'=>$frmdata['id']));
				if($sql){
				   $error['success'] = true;
				}else{
					$error['message']['refrence'] = '<span class="frm-error form_err">Error in data storing please try again.</span>';
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