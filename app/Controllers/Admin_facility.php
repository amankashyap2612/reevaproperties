<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_facility extends BaseController
{
    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 		
        $session = $this->session->get('adminlogin');
		
        if($action == 'add_facility')
        {
			$check = $this->validate([
                'name' => ['rules' =>  'required','errors' =>  ['required' => 'Name is required']]
            ]);
            if($check)
            {
				$frmdata = mysql_clean($frmdata);
				$add_data = array(
					'status' => "A",
					'name' => $frmdata['name'],
					'insert_time' => date('Y-m-d H:i:s'),
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				);
				$insert = $this->curd_model->insert('facility', $add_data);
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
        else if($action == 'update_facility')
        {
            $check = $this->validate([
                'edt_name' => ['rules' =>  'required','errors' =>  ['required' => 'Name is required']]
            ]);
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
				$update_data = array(
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
					'name' => $frmdata['edt_name'],
				);
				$update = $this->curd_model->update_table('facility', $update_data, array('id'=>$frmdata['edt_id']));
				
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
		else if($action == 'change_facility_status')
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
				$sql = $this->curd_model->update_table('facility', $data, array('id'=>$frmdata['id']));
				
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