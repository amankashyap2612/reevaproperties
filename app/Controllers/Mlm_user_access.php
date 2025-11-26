<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_user_access extends BaseController
{
    public function view($action = null)
    {   
		$error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 
        $session = $this->session->get('mlmlogin');
		
        if($action == 'update'){
		$data['session'] = $this->session->get('mlmlogin');
        $data = get_menu2();
		$data['page_url'] = "user";
		$data['other_action'] = explode(" ",$data['action_access']["user"]);
		$data['type_id'] = (isset($type_id)?$type_id:'0');
		$join = array(
			array(
				'table' => 'mlm_tab_group',
				'condition' => 'mlm_tab.tab_group=mlm_tab_group.id',
				'type' => 'left'
			)
		);
		$whr = array('mlm_tab.status'=>'A');
		$menu = $this->curd_model->jointable('mlm_tab.other_action,mlm_tab.id as tab_id,mlm_tab.name,mlm_tab.page_url,mlm_tab_group.themify,mlm_tab_group.name as group_name', 'mlm_tab', $join, $whr, 'true', 'mlm_tab_group.id', 'desc');
		foreach($menu as $mn)
		{
			$data['menu'][$mn->group_name]['icon'] = $mn->themify;
			$data['menu'][$mn->group_name]['menu'][$mn->name] = array('url'=>$mn->page_url,'id'=>$mn->tab_id,'other_action'=>$mn->other_action);
		}
		$data['emp'] = $this->curd_model->get_all('*', 'mlm_login', array(), 'f_name', 'ASC');
		$data['user_type'] = $this->curd_model->get_all('*', 'mlm_member_type', array(), 'name', 'ASC');
		$data['emp_info'] = $this->curd_model->get_1('*', 'mlm_login', array('user_type'=>$data['type_id']));
		$user_access = $this->curd_model->get_all('*', 'mlm_user_access', array('user_type_id'=>$data['type_id']), 'tab_id', 'ASC');
		foreach($user_access as $ua)
		{
			$data['user_access'][$ua->tab_id] = array('status'=>$ua->status,'other_action'=>$ua->other_action);
		}
		$data['global_count'] = $this->session->get('global_count');
		return view('mlm/mlm_access',$data);
    }
	else if($action == 'update_mlm_access')
	{
		   $check = $this->validate([
                'type_id' => ['rules' =>  'required','errors' =>  ['required' => 'User is required']]
            ]);
            if($check)
            {
				 
                $frmdata = mysql_clean($frmdata);
                $rmv_link = $this->curd_model->update_table('mlm_user_access',array('status'=>'D','other_action'=>''),array('user_type_id'=>$frmdata['type_id']));
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
                            INSERT INTO mlm_user_access (`user_type_id`,`tab_id`,`status`,`other_action`) VALUES (".$frmdata['type_id'].",".$tab.",'A','".$action_tab."') 
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