<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_features extends BaseController
{
    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 		
        $session = $this->session->get('adminlogin');
		
        if($action == 'add_feature')
        {
			$check = $this->validate([
                'heading' => ['rules' =>  'required','errors' =>  ['required' => 'Heading is required']],
                'para' => ['rules' =>  'required','errors' =>  ['required' => 'Paragraph is required']],
                'icon' => ['rules' =>  'required','errors' =>  ['required' => 'Icon is required']],
            ]);
			
            if($check)
            {
				$frmdata = mysql_clean($frmdata);
				$add_data = array(
					'status' => "A",
					'insert_time' => date('Y-m-d H:i:s'),
					'heading' => $frmdata['heading'],
					'paragraph' => $frmdata['para'],
					'icon' => $frmdata['icon'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				);
				$insert = $this->curd_model->insert('features', $add_data);
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
        else if($action == 'update_feature')
        {
            $check = $this->validate([
                'edt_heading' => ['rules' =>  'required','errors' =>  ['required' => 'Heading is required']],
                'edt_para' => ['rules' =>  'required','errors' =>  ['required' => 'Paragraph is required']],
                'edt_icon' => ['rules' =>  'required','errors' =>  ['required' => 'Icon is required']],
            ]);
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
				$update_data = array(
					'heading' => $frmdata['edt_heading'],
					'paragraph' => $frmdata['edt_para'],
					'icon' => $frmdata['edt_icon'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				);
				$update = $this->curd_model->update_table('features', $update_data, array('id'=>$frmdata['edt_id']));
				
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
		else if($action == 'change_feature_status')
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
				$sql = $this->curd_model->update_table('features', $data, array('id'=>$frmdata['id']));
				
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