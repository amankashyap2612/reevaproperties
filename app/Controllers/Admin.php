<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin extends BaseController
{
	public function view($url = "")
    {
		$data['session'] = $this->session->get('adminlogin');
		$data = get_menu();
		$url = explode('.',$url);
		if($url[0] == 'dashboard')
		{
			$data['property'] = $this->curd_model->get_all('*','property',array('status'=>'A'),'id','DESC');
			//count
			$data['detail'] = $this->curd_model->customquery1("SELECT  DISTINCT(`area_sq`) as `area`, `size_gaj` as `gaj` , `type` as `type`, `prop_status` as `prop_status` FROM `property` WHERE `prop_status` = 'A' and  `status` = 'A' ",array('A','A'));
			
			$count_query = array();
			
			foreach($data['detail'] as $row) {
				
				$data['count_query'][] = $this->curd_model->customquery1("
					SELECT COUNT(*) as count_data 
					FROM `property` 
					WHERE `prop_status` = 'A' 
					AND  `status` = 'A' 
					AND `area_sq` = ".$row->area." 
					AND `size_gaj` = ".$row->gaj." ",
					array()
				);
			}
		}
		else if($url[0] == "gallery" && in_array('gallery',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['gallery'] = $this->curd_model->get_all('*', 'gallery', array('status'=>$data['status']), 'id', 'DESC');
			$data['gallery_img'] = $this->curd_model->get_all('*', 'images', array('purpose'=>'gallery'), 'id', 'ASC');
		}
		else if($url[0] == "web_setting" && in_array('web_setting',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['setting'] = $this->curd_model->get_all('*','web_settings',array('status'=>$data['status']),'id','ASC');
		}
		else if($url[0] == "facility" && in_array('facility',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['facility'] = $this->curd_model->get_all('*','facility',array('status'=>$data['status']),'id','ASC');
		}
		else if($url[0] == "near_location" && in_array('near_location',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['location'] = $this->curd_model->get_all('*', 'near_location', array('status'=>$data['status']), 'id', 'ASC');
		}
		else if($url[0] == "navbar" && in_array('navbar',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['navbar'] = $this->curd_model->get_all('*', 'navbar', array('status'=>$data['status']), 'id', 'ASC');
		}
		else if($url[0] == "features" && in_array('features',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['feature'] = $this->curd_model->get_all('*', 'features', array('status'=>$data['status']), 'id', 'ASC');
		}
		else if($url[0] == "slider" && in_array('slider',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['slider_img'] = $this->curd_model->get_all('*', 'images', array('purpose'=>'home_slider','status'=>'A'), 'id', 'DESC');
			$data['slider'] = $this->curd_model->get_all('*', 'home_slider', array('status'=>$data['status']), 'id', 'DESC');
		}
		else if($url[0] == "contact" && in_array('contact',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
		}
		else if($url[0] == "project" && in_array('project',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';	
			$data['proj'] = $this->curd_model->get_all('*','project',array('status'=>$data['status']),'id','DESC');
			$data['project_img'] = $this->curd_model->get_all('*', 'images', array('purpose'=>'project'), 'id', 'ASC');
		}
		else if($url[0] == "property" && in_array('property',$data['url']))
		{
			$data['property_img'] = $this->curd_model->get_all('*', 'images', array('purpose'=>'property'), 'id', 'ASC');
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';  
			$data['block'] = isset($_GET['block'])?$_GET['block']:'';
            $data['area'] = isset($_GET['area'])?$_GET['area']:'';
            $data['project'] = isset($_GET['project'])?$_GET['project']:'';   
			
			$status_filter = ($data['status'] != "")?' AND `status` = "'.$data['status'].'"':'A';
			$project_filter = ($data['project'] != "") ? ' AND `project_id` = "' . $data['project'] . '" ' : '';
            $area_filter = ($data['area'] != "") ? ' AND `size_gaj` = "' . $data['area'] . '" ' : '';
            $block_filter = ($data['block'] != "") ? ' AND `block` = "' . $data['block'] . '" ' : '';
			 
			if($data['project'] != ""  && $data['block'] != "" && $data['area'] != ""){
				
				$data['blocks'] = $this->curd_model->customquery1("SELECT DISTINCT (`block`) as `blocks` FROM `property` WHERE `project_id` LIKE ? ORDER BY `blocks` ASC" ,array($data['project']));
				
				$data['areas'] = $this->curd_model->customquery1("SELECT DISTINCT (`size_gaj`) as `areas` FROM `property` WHERE `project_id` LIKE ? AND `block` LIKE ? order by `areas` ASC", array($data['project'],$data['block']));
				
				$data['property'] = $this->curd_model->customquery1('select * from property where  `id` >=0  '.$project_filter.$status_filter.$area_filter.$block_filter.' order by plot_no', array()); 
			}
		}
		else if($url[0] == "user" && in_array('user',$data['url']))
		{ 
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
			$data['user_ty'] = $this->curd_model->get_all('*', 'user_type', array(), 'name', 'ASC');
			foreach($data['user_ty'] as $ut)
			{
					$data['user_type'][$ut->user_key] = $ut;
			}
			$data['emp'] = $this->curd_model->get_all('*', 'login', array('status'=>$data['status']), 'f_name', 'ASC');
		}
		else if($url[0] == "web_pages" && in_array('web_pages',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
			$data['pages'] = $this->curd_model->get_all('*','web_pages',array('status'=>$data['status']),'id','DESC');
		}
		else if($url[0] == "logout")
		{
			$this->session->remove('adminlogin');
			return redirect()->to('/web-admin');
		}
		if(in_array($url[0],$data['url']) || $url[0] == "dashboard")
		{
			$data['page_url'] = $url[0];
			if($url[0] != "dashboard")
			{
					$data['other_action'] = explode(" ",$data['action_access'][$url[0]]);
			}
			$emp = $this->curd_model->get_all('*', 'login', array(), 'f_name', 'ASC');
			foreach($emp as $em)
			{
					$data['user_info'][$em->id] = $em;
			}
			//Total
			$data['project_detail'] = $this->curd_model->get_all('*','project',array('status'=>'A'),'id','DESC');
			$data['contact'] = $this->curd_model->get_all('*','frm_contact',array('status'=>'A'),'id','DESC');
			$images_detail = $this->curd_model->get_all('*', 'images', array('status'=>'A'), 'id', 'ASC');
            foreach($images_detail as $img)
            {
                $data['image_detail'][$img->id] = $img->location;
            }
			return view('admin/'.$url[0],$data);
		}
		else
		{
			
		}
    }
	public function access($user_id = "")
	{
		$data['session'] = $this->session->get('adminlogin');
        $data = get_menu();
		$data['page_url'] = "user";
		$data['other_action'] = explode(" ",$data['action_access']["user"]);
		$data['user_id'] = (isset($user_id)?$user_id:'0');
		
		$join = array(
			array(
				'table' => 'tab_group',
				'condition' => 'tab.tab_group=tab_group.id',
				'type' => 'left'
			)
		);
		
		$whr = array('tab.status'=>'A');
		$menu = $this->curd_model->jointable('tab.other_action,tab.id as tab_id,tab.name,tab.page_url,tab_group.themify,tab_group.name as group_name', 'tab', $join, $whr, 'true', 'tab_group.id', 'desc');
		foreach($menu as $mn)
		{
			$data['menu'][$mn->group_name]['icon'] = $mn->themify;
			$data['menu'][$mn->group_name]['menu'][$mn->name] = array('url'=>$mn->page_url,'id'=>$mn->tab_id,'other_action'=>$mn->other_action);
		}
		
		$data['emp'] = $this->curd_model->get_all('*', 'login', array(), 'f_name', 'ASC');
	
		$data['user_type'] = $this->curd_model->get_all('*', 'user_type', array(), 'name', 'ASC');
		$data['emp_info'] = $this->curd_model->get_1('*', 'login', array('id'=>$data['user_id']));
		$user_access = $this->curd_model->get_all('*', 'user_access', array('user_id'=>$data['user_id']), 'tab_id', 'ASC');
		foreach($user_access as $ua)
		{
			$data['user_access'][$ua->tab_id] = array('status'=>$ua->status,'other_action'=>$ua->other_action);
		}
	
		return view('admin/user_access',$data);
    }
	
}
?>	