<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_property_book extends BaseController
{
    public function action_update($action = null)
    {
		$error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost();
        $session = $this->session->get('mlmlogin');
		
		if($action == 'book_property')
        {
             $check = $this->validate([
				'prop_status' => ['rules' =>  'required','errors' =>  ['required' => 'Property status is required']],
				'prop_id' => ['rules' =>  'required','errors' =>  ['required' => 'Property is required']],
				'get_member' => ['rules' =>  'required','errors' =>  ['required' => 'Agent is required']]
			]);
            if($check)
            {
				$insert_data = array(
					'status' => "A",
					'insert_time' => date('Y-m-d H:i:s'),
					'img_id' => $frmdata['img_id'],
					'property_id' => $frmdata['prop_id'],
					'member_id' => $frmdata['get_member'],
					'prop_status' => $frmdata['prop_status'],
					'partially_book' => $frmdata['partially_book'],
					'pay_confirm' => $frmdata['pay_confirm'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id']
				);
				
        		$insert = $this->curd_model->insert('mlm_property_booking', $insert_data);
				if($insert){
					$update = $this->curd_model->update_table('property',array("status"=>"A",'prop_status' => $frmdata['prop_status'],'update_by' => $session['user_id'],'last_update' => date('Y-m-d H:i:s')),array('id'=>$frmdata['prop_id']));
					if($update)
					{
						$error['result'] = true;
						$error['success'] = true;
					}
					else{
						$error['message']['refrence'] = '<p>Error in update please try again.</p>';
					}
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
		else if($action == "catch_book_property")
		{
			$check = $this->validate([
				'property_id' => ['rules' =>  'required','errors' =>  ['required' => 'Property is required']],
			]);
            if($check)
            {
				//$error['get_data'] = $this->curd_model->get_1('*', 'mlm_property_booking', array('property_id'=>$frmdata['property_id']),'id','ASC');
				$error['get_data'] = $this->curd_model->customquery1("SELECT * FROM mlm_property_booking WHERE `property_id` = ? ORDER BY id DESC Limit 1", array($frmdata['property_id']));

				$error['success'] = true;
				
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
        else if($action == "prop_change_status")
		{
			$check = $this->validate([
				'status' => ['rules' =>  'required','errors' =>  ['required' => 'status is required']],
				'id' => ['rules' =>  'required','errors' =>  ['required' => 'property is required']],
			]);
			
			if($check)
			{
				$data = array(
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
					'status' => (($frmdata['status'] == 'D') ? 'A' : 'D')
				);
				$sql = $this->curd_model->update_table('property', $data, array('id'=>$frmdata['id']));
				
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