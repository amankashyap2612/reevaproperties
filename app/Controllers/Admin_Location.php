<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_Location extends BaseController
{
    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 		
        $session = $this->session->get('adminlogin');
		
        if($action == 'add_info')
        {
			$check = $this->validate([
                'detail' => ['rules' =>  'required','errors' =>  ['required' => 'Detail is required']],
                'sort' => ['rules' =>  'required','errors' =>  ['required' => 'Sort is required']],
                'resource' => ['rules' =>  'required','errors' =>  ['required' => 'Resource is required']],
                'distance' => ['rules' =>  'required','errors' =>  ['required' => 'Distance is required']],
                'proj_id' => ['rules' =>  'required','errors' =>  ['required' => 'Project is required']],
            ]);
			
            if($check)
            {
				$frmdata = mysql_clean($frmdata);
				$add_data = array(
					'status' => "A",
					'detail' => $frmdata['detail'],
					'sort' => $frmdata['sort'],
					'resource' => $frmdata['resource'],
					'distance' => $frmdata['distance'],
					'project_id' => $frmdata['proj_id'],
					'insert_time' => date('Y-m-d H:i:s'),
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				);
				$insert = $this->curd_model->insert('near_location', $add_data);
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
        else if($action == 'update_info')
        {
            $check = $this->validate([
				'edt_detail' => ['rules' =>  'required','errors' =>  ['required' => 'Detail is required']],
                'edt_sort' => ['rules' =>  'required','errors' =>  ['required' => 'Sort is required']],
                'edt_resource' => ['rules' =>  'required','errors' =>  ['required' => 'Resource is required']],
                'edt_distance' => ['rules' =>  'required','errors' =>  ['required' => 'Distance is required']],
            ]);
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
				$update_data = array(
					'detail' => $frmdata['edt_detail'],
					'sort' => $frmdata['edt_sort'],
					'resource' => $frmdata['edt_resource'],
					'distance' => $frmdata['edt_distance'],
					'project_id' => $frmdata['edt_proj_id'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				);
		
				$update = $this->curd_model->update_table('near_location', $update_data, array('id'=>$frmdata['edt_id']));
				
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
		else if($action == 'change_location_status')
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
				$sql = $this->curd_model->update_table('location', $data, array('id'=>$frmdata['id']));
				
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