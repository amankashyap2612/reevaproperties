<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Ajax_request extends BaseController
{
    public function action_update($action = null)
    {
		$error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost();
		if($action == 'catch_block')
		{
			$check=  $this->validate([
                'proj_id' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']]
            ]);
            if($check)
            {
				$error['block_name'] = $this->curd_model->customquery1('SELECT DISTINCT(`block`) AS `blocks` FROM `property` WHERE `project_id` LIKE ?', array($frmdata['proj_id']));
				$error['success'] = true;
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
		else if($action == 'catch_area')
		{
			$check=  $this->validate([
                'block' => ['rules' =>  'required','errors' =>  ['required' => 'Block is required']],
                'project' => ['rules' =>  'required','errors' =>  ['required' => 'Project is required']]
            ]);
            if($check)
            {      
				$error['size_name'] = $this->curd_model->customquery1('SELECT DISTINCT(`size_gaj`) AS `size` FROM `property` WHERE `project_id` LIKE ? AND `block` LIKE ?', array($frmdata['project'],$frmdata['block']));
				$error['success']= true;
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
		else if($action == 'catch_plot_no')
		{
			$check=  $this->validate([
                'area' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']]
            ]);
            if($check)
            {      
				$error['search_plot'] = $this->curd_model->get_all("*","property",array('size_gaj'=> $frmdata['area'],'block'=>$frmdata['block'],'project_id'=>$frmdata['project']), 'id', 'ASC');
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
				$data['session'] = $this->session->get('mlmlogin');
				if(isset($data['session']['user_id']))
				{
					$error['get_sub_member'] =$this->curd_model->get_all('*','mlm_login',array('member_id'=>$frmdata['id']),'id','ASC');  
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
		else if($action == 'catch_mlm_data')
		{
			$data['session'] = $this->session->get('mlmlogin');
			if(isset($data['session']['user_id']))
			{
				$error['mlm_id'] = $this->curd_model->customquery1("SELECT A.*, B.name FROM mlm_login AS A LEFT JOIN mlm_member_type AS B ON A.user_type = B.id WHERE A.member_user_id = '".$frmdata['id']."'", array());
			}	
		}
		
		echo json_encode($error);
	}
}

?> 