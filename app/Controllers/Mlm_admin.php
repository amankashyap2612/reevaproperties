<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_admin extends BaseController
{
	public function view($url = "")
    { 
		$data['session'] = $this->session->get('mlmlogin');
		$data = get_menu2();
		
		$url = explode('.',$url);
		if($url[0] == 'dashboard')
		{
			$data['project'] = 0;
			$pj = $this->curd_model->get_all('*','project',array(),'id','DESC');
			$data['project'] = count($pj);
			
			$data['cont'] = 0;
			$data['contact'] = $this->curd_model->get_all('*','frm_contact',array(),'id','DESC');
			$data['cont'] = count($data['contact']);
			
			$data['prop'] = 0;
			$pr = $this->curd_model->get_all('*','property',array(),'id','DESC');
			$data['prop'] = count($pr);
			
			/* chart 2 work start */
			$data['Available'] = $this->curd_model->get_all('*','property',array('prop_status'=>'A'),'id','DESC');
			$data['Booked']= $this->curd_model->get_all('*','property',array('prop_status'=>'B'),'id','DESC');
			$data['Partially'] = $this->curd_model->get_all('*','property',array('prop_status'=>'P'),'id','DESC');
			$data['Sold'] = $this->curd_model->get_all('*','property',array('prop_status'=>'S'),'id','DESC');
			$data['Token'] = $this->curd_model->get_all('*','property',array('prop_status'=>'T'),'id','DESC');
			$totalProperties = count($pr);

			// Calculate percentages
			$data['availablePercentage'] = ($totalProperties > 0) ? (count($data['Available']) / $totalProperties) * 100 : 0;
			
			$data['partiallyPercentage'] = ($totalProperties > 0) ? (count($data['Partially']) / $totalProperties) * 100 : 0;
			$data['bookedPercentage'] = ($totalProperties > 0) ? (count($data['Booked']) / $totalProperties) * 100 : 0;
			$data['soldPercentage'] = ($totalProperties > 0) ? (count($data['Sold']) / $totalProperties) * 100 : 0;  
			$data['tokenPercentage'] = ($totalProperties > 0) ? (count($data['Token']) / $totalProperties) * 100 : 0;  
			
			/*  Chart 2 work end*/
			
			
			/* chart 3 User Graph Work*/
				$results = $this->curd_model->customquery1('SELECT 
					EXTRACT(YEAR FROM create_time) AS year, DATE_FORMAT(create_time, \'%M\') AS month_name, COUNT(*) AS user_count FROM mlm_login WHERE EXTRACT(YEAR FROM create_time) = YEAR(CURRENT_DATE) GROUP BY year, month_name ORDER BY year, EXTRACT(MONTH FROM create_time);', array());
					 
					$data['monthly_data'] = array();
					// Initialize an array to store user counts per month
					$month_names = array(
						'January' => 0, 
						'February' => 0, 
						'March' => 0, 
						'April' => 0, 
						'May' => 0, 
						'June' => 0, 
						'July' => 0, 
						'August' => 0, 
						'September' => 0, 
						'October' => 0, 
						'November' => 0, 
						'December' => 0
					);
					// Populate the array with user counts from the query results
					foreach ($results as $row) {
						$month_name = trim($row->month_name); // Access properties using the -> operator and trim any extra spaces from month name
						$user_count = $row->user_count;
						$month_names[$month_name] = $user_count;
					}
					// Convert to a format suitable for your needs
					foreach ($month_names as $month => $count) {
						$data['monthly_data'][] = array('month' => $month, 'user_count' => $count);
					}
			/* chart 3 User Graph Work End*/ 
			/*Block Pie chart work */
				$data['block_chart'] = $this->curd_model->customquery1('SELECT block, COUNT(*) AS block_count FROM property GROUP BY block',array());
				/*Block count*/
					$data['block_count_all'] = $this->curd_model->customquery1('SELECT * FROM `property` group by block',array());  
				/*Block count*/
			/*Block Pie chart work end*/
			
			/*Client Graph Chart */
				$client_results = $this->curd_model->customquery1('SELECT 
					EXTRACT(YEAR FROM insert_time) AS year, DATE_FORMAT(insert_time, \'%M\') AS month_name, COUNT(*) AS user_count FROM mlm_client WHERE EXTRACT(YEAR FROM insert_time) = YEAR(CURRENT_DATE) GROUP BY year, month_name ORDER BY year, EXTRACT(MONTH FROM insert_time);', array()); 
					$data['client_monthly_data'] = array(); 
					$data['total_client'] = array(); 
					$client_month_names = array(
						'January' => 0, 
						'February' => 0, 
						'March' => 0, 
						'April' => 0, 
						'May' => 0, 
						'June' => 0, 
						'July' => 0, 
						'August' => 0, 
						'September' => 0, 
						'October' => 0, 
						'November' => 0, 
						'December' => 0
					); 
					foreach ($client_results as $client_row) {
						$client_month_name = trim($client_row->month_name);  
						$client_count = $client_row->user_count;
						$data['total_client'][] = $client_row->user_count;
						$client_month_names[$client_month_name] = $client_count;
					} 
					foreach ($client_month_names as $client_month => $client_count) {
						$data['client_monthly_data'][] = array('client_month' => $client_month, 'client_user_count' => $client_count);
					}  
				/* total client variable*/	
					$data['totalclient'] = array_sum($data['total_client']);
				/* total client variable*/	 
			/*Client Graph Chart End  */
			$data['memb'] = $this->curd_model->get_1('*','mlm_login' ,array('id'=>$data['session']['user_id']));
		
			$data['detail'] = $this->curd_model->customquery1("SELECT  DISTINCT(`area_sq`) as `area`, `size_gaj` as `gaj` , `type` as `type`, `prop_status` as `prop_status` FROM `property` WHERE `prop_status` = 'A' and  `status` = 'A' ",array('A','A'));
			$count_query = array();
			foreach($data['detail'] as $row) {
				$data['count_query'][] = $this->curd_model->customquery1("SELECT COUNT(*) as count_data FROM `property` WHERE `prop_status` = 'A' 
				AND  `status` = 'A' AND `area_sq` = ".$row->area." AND `size_gaj` = ".$row->gaj." ",array());
			}
		}
		else if($url[0] == "user" && in_array('user',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A'; 
			$data['get_detail'] = $this->curd_model->customquery1("(SELECT * FROM mlm_login WHERE id = '".$data['session']['user_id']."' AND `status` ='".$data['status']."') UNION (SELECT * FROM mlm_login WHERE member_id = '".$data['session']['user_id']."' AND `status` ='".$data['status']."')",array());
			
			$type= $this->curd_model->get_all('*','mlm_member_type',array(),'id','ASC');
			foreach($type as $obj)
			{
				$data['type'][$obj->id] = $obj;
			}
		}
		else if($url[0] == "manage-properties" && in_array('manage-properties',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
			$data['prop_status'] = isset($_GET['prop_status'])?$_GET['prop_status']:'';
			$data['project'] = isset($_GET['project'])?$_GET['project']:'';
			$data['block'] = isset($_GET['block'])?$_GET['block']:'';
			$data['size'] = isset($_GET['size'])?$_GET['size']:'';
			
			$area_filter = ($data['size'] != "")?' AND `size_gaj` = "'.$data['size'].'"':'';
			$block_filter = ($data['block'] != "")?' AND `block` = "'.$data['block'].'"':'';
			$status_filter = ($data['status'] != "")?' AND `status` = "'.$data['status'].'"':'A';
			$prop_status_filter = ($data['prop_status'] != "")?' AND `prop_status` = "'.$data['prop_status'].'"':'';
			$project_filter = ($data['project'] != "")?' AND `project_id` = "'.$data['project'].'"':'';
			
			$data['proj'] = $this->curd_model->get_all('*', 'project', array('status'=>'A'), 'name', 'ASC');

			$property_booking = $this->curd_model->get_all('*', 'mlm_property_booking', array('status'=>'A'), 'id', 'ASC');
			foreach($property_booking as $obj)
			{
				$data['property_booking'][$obj->id] = $obj;
			}
			$images = $this->curd_model->get_all('*', 'images', array('purpose'=>'property'), 'id', 'ASC');
			foreach($images as $obj)
			{
				$data['images'][$obj->id] = $obj->location;
			}
			if($data['project'] != "" && $data['block'] != "" && $data['size'] != "")
			{
				$data['blocks'] = $this->curd_model->customquery1("SELECT DISTINCT(`block`) AS `blocks` FROM `property` WHERE `project_id` LIKE ? order by `blocks` ASC", array($data['project'])); 
				
				$data['areas'] = $this->curd_model->customquery1("SELECT DISTINCT(`size_gaj`) AS `size` FROM `property` WHERE `project_id` LIKE ? AND `block` LIKE ? order by `size` ASC", array($data['project'],$data['block'])); 
				
				$data['search'] = $this->curd_model->customquery1('select * from property where `id` >= 0 '.$area_filter.$block_filter.$project_filter.$status_filter.$prop_status_filter.' order by plot_no', array());
			}
		}
		else if($url[0] == "mlm_access" && in_array('mlm_access',$data['url'])) 
		{
			$data['type'] = isset($_GET['type'])?$_GET['type']:''; 
			$types = $this->curd_model->get_all('*','mlm_member_type',array(),'id','ASC'); 
			foreach($types as $ty) 
			{ 
				$data['types'][$ty->id] =$ty; 
			} 
			$data['page_url'] = "user"; 
			$data['other_action'] = explode(" ",$data['action_access']["user"]); 
			$data['type_id'] = (isset($data['type'])?$data['type']:'0'); 
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
		}
		else if($url[0] == "team_detail" && in_array('team_detail',$data['url']))
		{
			$data['user_id'] = isset($_GET['userid'])?$_GET['userid']:'';
			 
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
			$data['user_ty'] = $this->curd_model->get_all('*', 'mlm_member_type', array(), 'name', 'ASC');
			foreach($data['user_ty'] as $ut)
			{
				$data['user_type'][$ut->id] = $ut;
			}
			if($data['user_id'] != "")
			{
				$data['member'] = $this->curd_model->get_1("*","mlm_login",array("member_user_id"=>$data['user_id']));
				if(isset($data['member']->id))
				{
					$data['emp'] = $this->curd_model->get_all("*","mlm_login",array("member_id"=>$data['member']->id,"status"=>$data['status']),"id","ASC");
				}
			}
			else
			{
				$data['member'] = $this->curd_model->get_1("*","mlm_login",array("id"=>$data['session']['user_id']));
				$data['emp'] = $this->curd_model->get_all('*','mlm_login',array('member_id' => $data['session']['user_id'],'status' => $data['status']),'id','ASC');
			}
		}
		else if($url[0] == "mlm_property_book" && in_array('mlm_property_book',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'';
			$data['project'] = isset($_GET['project'])?$_GET['project']:'';
			$data['block'] = isset($_GET['block'])?$_GET['block']:'';
			$data['area'] = isset($_GET['area'])?$_GET['area']:'';
			
			$area_filter = ($data['area'] != "")?'AND `size_gaj` = "'.$data['area'].'"':'';
			$block_filter = ($data['block'] != "")?'AND `block` = "'.$data['block'].'"':'';
			$project_filter = ($data['project'] != "")?'AND `project_id` = "'.$data['project'].'"':'';
			$status_filter = ($data['status'] != "")?'AND `status` = "'.$data['status'].'"':'A';
			if($data['project'] != "" && $data['block'] != "" && $data['area'] !=""){ 
				$data['search'] = $this->curd_model->customquery1('select * from property where `id` >= 0 ' . $area_filter . $block_filter . $project_filter .$status_filter. ' order by plot_no', array('status' => $data['status']));
			}
			
			$images = $this->curd_model->get_all('*', 'images', array('purpose'=>'property'), 'id', 'ASC');
			foreach($images as $obj)
			{
				$data['images'][$obj->id] = $obj->location;
			}
			$get_member =$this->curd_model->get_all('*','mlm_login',array('member_id'=>$data['session']['user_id']),'id','ASC'); 
			foreach($get_member as $member)
			{
				$data['get_member'][$member->id] = $member;
			}
			
			$data['proj'] = $this->curd_model->get_all('*', 'project', array(), 'name', 'ASC');
			$booking = $this->curd_model->get_all('*', 'mlm_property_booking', array(),'id','ASC');
			foreach($booking as $b)
			{
				$data['book'][$b->id] = $b; 
			}
			
		}
		else if($url[0] == "client-records" && in_array('client-records',$data['url']))
		{
			$data['proj'] = $this->curd_model->get_all('*', 'project', array("status"=>"A"), 'name', 'ASC');
			$data['get_member'] =$this->curd_model->get_all('*','mlm_login',array('member_id'=>$data['session']['user_id']),'id','ASC');
		}
		else if($url[0] == "admin_manage" && in_array('admin_manage',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
		}
		else if($url[0] == "profile-promotion" && in_array('profile-promotion',$data['url']))
		{
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
			$data['load_data'] = $this->curd_model->get_all("*","mlm_member_type",array("status"=>$data['status']),'id','ASC');
			foreach($data['load_data'] as $obj)
			{
				$data['profiles'][$obj->id] = $obj->name;
			}
		}
		else if($url[0] == "profile_details" && in_array('profile_details',$data['url']))
		{
			  $data['profile_details'] = $this->curd_model->get_1('*','mlm_login',array('id'=>$data['session']['user_id']));

				$member_details = $this->curd_model->get_all('*','mlm_login',array(),'id','asc');
				foreach($member_details as $md) // Corrected variable name
				{
					$data['member_details'][$md->id] = $md;
				}

				$resourses = $this->curd_model->get_all('*', 'resourses', array('status'=>'A'), 'id', 'DESC');
				foreach($resourses as $rs)
				{
					$data['resourses'][$rs->id] = $rs->location;
				}

				$user_type = $this->curd_model->get_all('*', 'mlm_member_type', array(), 'name', 'ASC');
				foreach($user_type as $ut)
				{
					$data['user_type'][$ut->id] = $ut;
				}
 
			
		}
		else if($url[0] == "down_line_reports" && in_array('down_line_reports',$data['url']))
		{
			$mem_id = isset($_GET['member_id'])?$_GET['member_id']:$data['session']['user_id'];
			$level = 1;
			$data['levels'] = $this->downline($mem_id,$level);
			 
		}
		else if($url[0] == "sale_reports" && in_array('sale_reports',$data['url']))
		{
			
			//search data work Start
			$data['status'] = isset($_GET['status'])?$_GET['status']:'A';
			$data['project'] = isset($_GET['project'])?$_GET['project']:'';
			$data['block'] = isset($_GET['block'])?$_GET['block']:'';
			$data['size'] = isset($_GET['size'])?$_GET['size']:''; 
			$data['member_name'] = isset($_GET['member_name']) && !empty($_GET['member_name']) ? $_GET['member_name'] :$data['session']['user_id']; 
			$data['from_date'] = isset($_GET['from_date']) ? $_GET['from_date'] : date('Y-m-d');
			$data['to_date'] = isset($_GET['to_date']) ? $_GET['to_date'] :  date('Y-m-d'); 
			//print_r($timing); 
			$from_datetime = date('Y-m-d', strtotime($data['from_date']));
			$to_datetime = date('Y-m-d ', strtotime($data['to_date'])); 
			
			 $timing = ($data['from_date'] != "")?' AND A.`last_update` BETWEEN  "'.$from_datetime.'" AND "'.$to_datetime.'" ':date('Y-m-d');
			  
			$area_filter = ($data['size'] != "")?' AND B.`size_gaj` = "'.$data['size'].'"':'';
			$member_filter = ($data['member_name'] != "")?' AND A.`member_id` = "'.$data['member_name'].'"':'';
			$block_filter = ($data['block'] != "")?' AND B.`block` = "'.$data['block'].'"':'';
			$status_filter = ($data['status'] != "")?'   A.`status` = "'.$data['status'].'"':'A'; 
			//$prop_status = 'AND A.`prop_status` = "S"'; 	
			$query = "SELECT * FROM mlm_property_booking AS A LEFT JOIN property AS B ON B.id = A.property_id WHERE " .  $status_filter . $block_filter . $member_filter . $area_filter .$timing ;
			$data['search'] = $this->curd_model->customquery1($query, array()); 
			//search data work End
			
			//other query work
			$client = $this->curd_model->get_all('*', 'mlm_client', array('status'=>'A'), 'name', 'ASC');
			foreach($client as $ct)
			 {
				 $data['client'][$ct->id] = $ct;
			 } 
			 
			$data['proj'] = $this->curd_model->get_all('*', 'project', array('status'=>'A'), 'name', 'ASC');
  
			$data['blocks'] = $this->curd_model->customquery1("SELECT DISTINCT(`block`) AS `blocks` FROM `property` WHERE `project_id` LIKE ? order by `blocks` ASC", array($data['project'])); 
				
			$data['areas'] = $this->curd_model->customquery1("SELECT DISTINCT(`size_gaj`) AS `size` FROM `property` WHERE `project_id` LIKE ? AND `block` LIKE ? order by `size` ASC", array($data['project'],$data['block']));  
			$data['get_member'] =$this->curd_model->get_all('*','mlm_login',array('member_id'=>$data['session']['user_id']),'id','ASC');
		// other quwey work End	
			
		}
		else if($url[0] == "post_short" && in_array('post_short',$data['url']))
		{
			$data['profile_details'] = $this->curd_model->get_1('*','mlm_login',array('id'=>$data['session']['user_id']));

				$member_details = $this->curd_model->get_all('*','mlm_login',array(),'id','asc');
				foreach($member_details as $md) // Corrected variable name
				{
					$data['member_details'][$md->id] = $md;
				}

				$resourses = $this->curd_model->get_all('*', 'resourses', array('status'=>'A'), 'id', 'DESC');
				foreach($resourses as $rs)
				{
					$data['resourses'][$rs->id] = $rs->location;
				}

				$user_type = $this->curd_model->get_all('*', 'mlm_member_type', array(), 'name', 'ASC');
				foreach($user_type as $ut)
				{
					$data['user_type'][$ut->id] = $ut;
				}
		}
		else if($url[0] == "logout")
		{
			$this->session->remove('mlmlogin');
			return redirect()->to('/members.html');
		}
		
		if(in_array($url[0],$data['url']) || $url[0] == "dashboard")
		{
			$images = $this->curd_model->get_all('*', 'images', array('status'=>'A'), 'id', 'DESC');
			foreach($images as $img)
			{
				$data['image_detail'][$img->id] = $img->location;
			}
			
			$data['page_url'] = $url[0];
			if($url[0] != "dashboard")
			{
				$data['other_action'] = explode(" ",$data['action_access'][$url[0]]);
			}
			$emp = $this->curd_model->get_all('*', 'mlm_login', array(), 'f_name', 'ASC');
			foreach($emp as $em)
			{
					$data['user_info'][$em->id] = $em;
			}
			return view('mlm/'.$url[0],$data);
		}
		else
		{
			$data['message'] = "404 Page not found."; 
            return view('errors/html/error_404',$data);
		}
    } 
	
	public function downline($mem_id, $level)
	{
		$data['level_rec'] = array();
		if ($mem_id > 0 && $level > 0)
		{
			$queue = array(array('id' => $mem_id, 'level' => $level));
			while (!empty($queue))
			{
				$current = array_shift($queue);
				$current_mem_id = $current['id'];
				$current_level = $current['level'];

				$members = $this->curd_model->get_all('*', 'mlm_login', array('member_id' => $current_mem_id), 'id', 'ASC');
				$mem_count = count($members);
				if (!isset($data['level_rec'][$current_level]))
				{
					$data['level_rec'][$current_level] = 0;
				}
				$data['level_rec'][$current_level] += $mem_count;
				foreach ($members as $mem)
				{
					$queue[] = array('id' => $mem->id, 'level' => $current_level + 1);
				}
			}
		}
		return $data['level_rec'];
	}

	public function profile($user_id)
	{
		$data['session'] = $this->session->get('mlmlogin');
        $data = get_menu2(); 
		$data['other_action'] = explode(" ",$data['action_access']["user"]);
		 
		$user_type = $this->curd_model->get_all('*', 'mlm_member_type', array(), 'name', 'ASC');
		foreach($user_type as $ut)
		 {
			 $data['user_type'][$ut->id] = $ut;
		 } 
		$data['emp_info'] = $this->curd_model->get_1('*', 'mlm_login', array('id'=>$user_id));
		$data['member_user_id'] = $this->curd_model->get_all('*', 'mlm_login', array('status'=>'A'),'id','ASC'); 
		$data['nominee_info'] = $this->curd_model->get_all('*', 'nominee', array('id'=>$user_id),'id','ASC');
		return view('mlm/mlm-profile',$data);
    }
	
	public function adm_profile($user_id)
	{
		$data['session'] = $this->session->get('mlmlogin');
        $data = get_menu2(); 
		$data['other_action'] = explode(" ",$data['action_access']["admin_manage"]);
		 
		$user_type = $this->curd_model->get_all('*', 'mlm_member_type', array(), 'name', 'ASC');
		foreach($user_type as $ut)
		 {
			 $data['user_type'][$ut->id] = $ut;
		 } 
		$data['emp_info'] = $this->curd_model->get_1('*', 'mlm_login', array('id'=>$user_id));
		$data['member_user_id'] = $this->curd_model->get_all('*', 'mlm_login', array('status'=>'A'),'id','ASC'); 
		$data['nominee_info'] = $this->curd_model->get_all('*', 'nominee', array('id'=>$user_id),'id','ASC');
		return view('mlm/mlm-profile',$data);
    }
}
?>	