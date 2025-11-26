<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Ajax_request extends BaseController
{
	public function action_update($action = null)
	{
		$error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
		$frmdata = $this->request->getPost();
		$agent = $this->request->getUserAgent();
		if($action == 'catch_block')
        {
			$check=  $this->validate([
                'block' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']]
            ]);
            if($check)
            {    
				$qry = 'SELECT DISTINCT(`block`) AS `blocks` FROM `property` WHERE `project_id` LIKE "'.$frmdata['block'].'"';
				$block = $this->curd_model->customquery1($qry, array(), 'blocks', 'ASC'); 
				foreach ($block as $obj) {
					$error['block_name'][] = array('blocks' => $obj->blocks);
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
		else if($action == 'catch_area')
        {
			$check=  $this->validate([
                'area' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']]
            ]);
            if($check)
            {      
				$qry = 'SELECT DISTINCT(`size_gaj`) AS `size` FROM `property` WHERE `block` LIKE "'.$frmdata['area'].'"';
				$area = $this->curd_model->customquery1($qry, array(), 'id', 'ASC'); 
				foreach ($area as $obj) {
					$error['area_name'][] = array('size' => $obj->size);
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
		else if($action == 'catch_sub_member')
        { 
			$check=  $this->validate([
                'id' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']]
            ]);
            if($check)
            {      
				$error['get_sub_member'] =$this->curd_model->get_all('*','mlm_login',array('member_id'=>$frmdata['id']),'id','ASC');  
					
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
