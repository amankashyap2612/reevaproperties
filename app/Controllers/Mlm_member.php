<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_member extends BaseController
{
    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 	
        $session = $this->session->get('mlmlogin');
		
		if($action == 'change_member_status')
		{ 
			$check = $this->validate([
				'id' => ['rules' => 'required', 'errors'=>['required' => 'member is required']],
				'status' => ['rules' => 'required' , 'errors' => ['required' => 'status is required']]
			]);
			if($check)
			{
				$data = array(
					'update_time' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
					'status' => (($frmdata['status'] == 'D')? 'A':'D')
				);
				$sql = $this->curd_model->update_table('mlm_login',$data,array('id' => $frmdata['id']));
				if($sql){
					$error['success']= true;
				}
				else{
					$error['message']['reference'] = 'Error in storing data';
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
		else{
		}
			echo json_encode($error);
	}
}
?>