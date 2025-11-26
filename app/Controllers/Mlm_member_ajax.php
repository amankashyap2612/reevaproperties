<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_member_ajax extends BaseController
{
	public function ajax_request($action = null)
	{
		$error = array('success'=> false, 'error_token'=> array('cname'=> csrf_token() ,'cvalue'=> csrf_hash()),'message'=> array(),'border' => true);
		$frmdata = $this->request->getPost();
		$session = $this->session->get('mlmlogin');
		if($action == "search-client")
		{
			$check = $this->validate([
                'details' => ['rules' =>  'required','errors' =>  ['required' => 'value is required']]
			]);
			if($check)
			{ 
				$search_members = $this->curd_model->customquery1("select * from `mlm_client_info` where `info_value` LIKE '%".$frmdata['details']."%' ORDER BY `info_value` ASC LIMIT 0,10",array());
				if(count($search_members) > 0)
				{
					foreach($search_members as $obj)
					{
						$error['result'][$obj->client_id] = $this->curd_model->get_1("*","mlm_client",array('id'=>$obj->client_id));
					}
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
		else if($action == 'client-records')
		{
			$check = $this->validate([
                'item_id' => ['rules' =>  'required','errors' =>  ['required' => 'Client is required']]
			]);
			if($check)
			{
				$error['v_result'] = $this->curd_model->customquery1("SELECT A.*, B.`project_id`,B.`block`,B.`plot_no` ,C.name,D.member_user_id,D.f_name from `mlm_property_deal` as A LEFT JOIN `property` as B ON A.`property_id` = B.`id` Left JOIN `project` as C ON B.project_id = C.id LEFT JOIN `mlm_login` as D ON D.`id` = A.`client_id` where A.`client_id` = '".$frmdata['item_id']."' order by A.`id` DESC ",array());
				
				$error['property_result'] = $this->curd_model->customquery1("SELECT A.*, B.`project_id`, B.`block`, B.`plot_no`, C.name FROM `mlm_property_booking` AS A LEFT JOIN `property` AS B ON A.`property_id` = B.`id` LEFT JOIN `project` AS C ON B.project_id = C.id WHERE A.`client_id` = '" . $frmdata['item_id'] . "' AND A.`status` = 'A' ORDER BY A.`id` ASC", array());
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
		else if($action == "catch-booking-info")
		{
			$check = $this->validate([
                'client_id' => ['rules' =>  'required','errors' =>  ['required' => 'Client is required']],
                'booking_id' => ['rules' =>  'required','errors' =>  ['required' => 'Booked Property is required']]
			]);
			if($check)
			{ 
				$error['result']['client'] = $this->curd_model->get_1("*","mlm_client",array("id"=>$frmdata['client_id']));
				$booking = $this->curd_model->get_1("*","mlm_property_booking",array("id"=>$frmdata['booking_id']));
				$error['result']['property'] = $this->curd_model->get_1("*","property",array("id"=>$booking->property_id));
				$error['result']['agent'] = $this->curd_model->get_1("*","mlm_login",array("id"=>$booking->member_id));
				$parent = $this->curd_model->get_1("f_name,l_name","mlm_login",array("id"=>$error['result']['agent']->member_id));
				//$error['result']['agent']->member_id = $parent->f_name.' '.$parent->l_name;
				$error['result']['amount_history'] = $this->curd_model->get_all("*","prop_amount_recieved",array("count_status"=>1,"booking_id"=>$booking->id),'booking_date','ASC');
				$status_logs = $this->curd_model->get_all("*","mlm_property_status_log",array("booking_id"=>$booking->id),'last_update','DESC');
				foreach($status_logs as $obj){
					if($obj->status == "A"){ $obj->status = "Avilable"; }
					if($obj->status == "T"){ $obj->status = "Token"; }
					if($obj->status == "P"){ $obj->status = "Partially Booked"; }
					if($obj->status == "B"){ $obj->status = "Booked"; }
					if($obj->status == "S"){ $obj->status = "Sold"; }
					$agent = $this->curd_model->get_1("*","mlm_login",array("id"=>$obj->update_by));
					$obj->update_by = $agent->f_name.' '.$agent->l_name;
					$error['result']['status_logs'][] = $obj;
				}
				$error['result']['project'] = $this->curd_model->get_1("*","project",array("id"=>$error['result']['property']->project_id));
				$error['result']['paid_amount'] = $booking->paid_amount;
				$error['result']['deal_amount'] = $booking->deal_amount;
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
		else if($action == "catch_mlm_data")
		{
			$check = $this->validate([
                'id' => ['rules' =>  'required','errors' =>  ['required' => 'Client is required']]
			]);
			if($check)
			{
				$error['mlm_id'] = $this->curd_model->customquery1("SELECT A.*, B.name FROM mlm_login AS A LEFT JOIN mlm_member_type AS B ON A.user_type = B.id WHERE A.member_user_id = '".$frmdata['id']."'", array());
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
		else if($action == "catch_sub_member")
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