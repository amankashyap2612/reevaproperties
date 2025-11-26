<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_client extends BaseController
{
    public function action_update($action = null)
    {
		$error = array('success'=> false, 'error_token'=> array('cname'=> csrf_token() ,'cvalue'=> csrf_hash()),'message'=> array(),'border' => true);
		$frmdata = $this->request->getPost();
		$session = $this->session->get('mlmlogin');
		
		if($action == 'add_client')
		{
			$check = $this->validate([
				'c_name' => ['rules' =>  'required','errors' =>  ['required' => 'Name is required']],
				'address' => ['rules' =>  'required','errors' =>  ['required' => 'Address   is required']],
				'contact_number' => ['rules' => 'required', 'errors' => ['required' => 'Contact Number is required']]

			]);
			if($check)
			{ 
				$client_exists = $this->curd_model->get_1("*","mlm_client",array('name'=>$frmdata['c_name'],'mobile_number'=>$frmdata['contact_number']));
				if(empty($client_exists))
				{
					 
					$client_info = array(
						'insert_by' => $session['user_id'],
						'name' => $frmdata['c_name'],
						'email' => $frmdata['email'],
						'address' => $frmdata['address'],
						'mobile_number' => $frmdata['contact_number']
					); 
					$sql = $this->create_client($client_info);
					if($sql){
						$error['success'] = true;
					}else{
						$error['message']['refrence'] = '<p>Error in create please try again.</p>';
					}
				}
				else{
					$error['message']['refrence'] = '<p>Client Already Register.</p>';
				}
				
			}else{
				foreach($_POST as $key =>$value)
				{
					if ($this->validation->hasError($key)) {
						$error['message'][$key] = $this->validation->getError($key);
					}
				}
			}
		}
		else if($action == 'add_deal')
        {
			$check = $this->validate([
				'vst_project' => ['rules' =>  'required','errors' =>  ['required' => 'Project is required']],
				'vst_block' => ['rules' =>  'required','errors' =>  ['required' => 'Block is required']],
				'vst_area' => ['rules' =>  'required','errors' =>  ['required' => 'Area is required']],
				'vst_plot_no' => ['rules' =>  'required','errors' =>  ['required' => 'Plot No is required']],
				'vst_agent' => ['rules' =>  'required','errors' =>  ['required' => 'Agent is required']],
				'vst_deal_amount' => ['rules' =>  'required','errors' =>  ['required' => 'Deal Amount required']],
				'c_id' => ['rules' =>  'required','errors' =>  ['required' => 'Client is required']]
				
			]);
			if($check)
			{ 
				$prop = $this->curd_model->get_1("*","property",array("id"=>$frmdata['vst_plot_no']));
				if(isset($prop->id) && $prop->prop_status == 'A')
				{
					$frmdata = mysql_clean($frmdata);
					$deal = array(
						'status' => "A",
						'insert_time' => date('Y-m-d H:i:s'),
						'last_update' => date('Y-m-d H:i:s'),
						'update_by' => $session['user_id'],
						'client_id' => $frmdata['c_id'],
						'property_id' => $frmdata['vst_plot_no'],
						'member_id' => $frmdata['vst_agent'],
						'deal_amount' => $frmdata['vst_deal_amount']
					); 
					$insert = $this->curd_model->insert('mlm_property_deal', $deal);
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
					$error['message']['refrence'] = '<p>Property not avilable.</p>';
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
		else if($action == 'deal_mature')
        {
			$check = $this->validate([
				'prop_status' => ['rules' =>  'required','errors' =>  ['required' => 'Project is required']],
				'recieved_amount' => ['rules' =>  'required','errors' =>  ['required' => 'Block is required']],
				'deal_id' => ['rules' =>  'required','errors' =>  ['required' => 'Area is required']]
			]);
			if($check)
			{
				$prop = $this->curd_model->get_1("*","mlm_property_deal",array("id"=>$frmdata['deal_id']));
				if(isset($prop->id) && $prop->status == 'A')
				{
					$frmdata = mysql_clean($frmdata);
					$property_booking_data = array(
						'status' => "A",
						'insert_time' => date('Y-m-d H:i:s'),
						'client_id' => $prop->client_id,
						'property_id' => $prop->property_id,
						'member_id' => $prop->member_id,
						'prop_status' => $frmdata['prop_status'],
						'paid_amount' => $frmdata['recieved_amount'],
						'deal_amount' => $prop->deal_amount,
						'last_update' => date('Y-m-d H:i:s'),
						'update_by' => $session['user_id']
					); 
					$property_booking_id = $this->curd_model->insert('mlm_property_booking', $property_booking_data);
					if($property_booking_id)
					{
						$amount_data = array(
							'booking_id' => $property_booking_id,
							'status' => $frmdata['prop_status'],
							'amount' => $frmdata['recieved_amount'],
							'booking_date' => date('Y-m-d H:i:s')
						); 
						$property_amount = $this->curd_model->insert('prop_amount_recieved', $amount_data);
						if ($property_amount)
						{
							$property_data = array(
								'prop_status' => $frmdata['prop_status'],
								'last_update' => date('Y-m-d H:i:s'),
								'update_by' => $session['user_id']
							);
							$update_prop = $this->curd_model->update_table('property',$property_data,array('id'=>$prop->property_id));
							if($update_prop)
							{
								$status_logs = array(
									"last_update" => date('Y-m-d H:i:s'),
									"update_by" => $session['user_id'],
									"booking_id" => $property_booking_id,
									"status" => $frmdata['prop_status']
								);
								$this->curd_model->insert('mlm_property_status_log', $status_logs);
								$this->curd_model->update_table('mlm_property_deal', array("status"=>"M"),array("id"=>$prop->id));
								$error['success'] = true;
							}
						} else {
							$error['message']['refrence'] = '<p>Error in Insert.</p>';
						}
					}
				}
				else
				{
					$error['message']['refrence'] = '<p>Property not avilable.</p>';
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
		else if($action == 'delete_amount')
		{
			$check = $this->validate([
				'payid' => ['rules' =>  'required','errors' =>  ['required' => ' Amount is required']]
			]);
			if($check)
			{
				$avail_amt = $this->curd_model->get_1("*","prop_amount_recieved",array("id"=>$frmdata['payid']));
				if(isset($avail_amt->id))
				{
					$delete_amt = $this->curd_model->update_table("prop_amount_recieved",array("last_update"=>date('Y-m-d H:i:s'),"update_by"=>$session['user_id'],"count_status"=>0),array("id"=>$avail_amt->id));
					$booking = $this->curd_model->get_1('*','mlm_property_booking',array('id'=>$avail_amt->booking_id));
					$error['paid_amt'] = $booking->paid_amount - $avail_amt->amount;
					$update_data = array(
						'last_update' => date('Y-m-d H:i:s'),
						'paid_amount' => $error['paid_amt'],
						'update_by' => $session['user_id']
					);
					$new_amount = $this->curd_model->update_table('mlm_property_booking', $update_data, array('id'=>$avail_amt->booking_id));
					if($new_amount){
						$error['success'] = true;
						$error['amount_history'] = $this->curd_model->get_all("*","prop_amount_recieved",array("count_status"=>1,"booking_id"=>$booking->id),'booking_date','ASC');
					}
					else{
						$error['message']['refrence'] = '<p>Error in Updating</p>';
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
		else if($action == 'add_amount')
		{ 
			$check = $this->validate([
				'installment' => ['rules' =>  'required','errors' =>  ['required' => ' Amount is required']],
				'c_id' => ['rules' =>  'required','errors' =>  ['required' => ' Client is required']],
				'b_id' => ['rules' =>  'required','errors' =>  ['required' => ' Booking is required']]
			]);
			if($check){	
				$booking = $this->curd_model->get_1('*','mlm_property_booking',array('client_id' => $frmdata['c_id'],'id'=>$frmdata['b_id']));
				if($booking->paid_amount < $booking->deal_amount)
				{
					$error['paid_amt'] = ($booking->paid_amount + $frmdata['installment']);
					if($error['paid_amt'] <= $booking->deal_amount)
					{
						$prop = $this->curd_model->get_1("*","property",array("id"=>$booking->property_id));
						$insert_amount = array(
							'last_update' => date('Y-m-d H:i:s'),
							'update_by' => $session['user_id'],
							'count_status' => 1,
							'booking_id' => $frmdata['b_id'],
							'status' => $prop->prop_status,
							'amount' => $frmdata['installment'],
							'booking_date' => date('Y-m-d H:i:s')
						);
						$amount = $this->curd_model->insert('prop_amount_recieved', $insert_amount);
						if($amount)
						{
							
							if($error['paid_amt'] == $booking->deal_amount)
							{
								$update_data = array(
									'last_update' => date('Y-m-d H:i:s'),
									'prop_status' => 'S',
									'paid_amount' => $error['paid_amt'],
									'update_by' => $session['user_id']
								);
							}
							else
							{
								$update_data = array(
									'last_update' => date('Y-m-d H:i:s'),
									'paid_amount' => $error['paid_amt'],
									'update_by' => $session['user_id']
								);
								
							}
							
							$new_amount = $this->curd_model->update_table('mlm_property_booking', $update_data, array('id'=>$booking->id));
							if($new_amount){
								$error['success'] = true;
								$error['alert1'] = "Amount Successfully Recieved.";
								$error['amount_history'] = $this->curd_model->get_all("*","prop_amount_recieved",array("count_status"=>1,"booking_id"=>$booking->id),'booking_date','ASC');
							}
							else{
								$error['message']['refrence'] = '<p>Error in Updating</p>';
							}
						}
						else
						{
							$error['message']['refrence'] = '<p>Error in Insert Amount.</p>';
						}
					}
					else
					{
						$error['message']['refrence'] = '<p>Insert Amount is more then Deal Amount.</p>';
					}
				}
				else
				{
					$error['message']['refrence'] = '<p>Payment completed.</p>';
					if($booking->paid_amount == $booking->deal_amount)
					{
						$update_status = array(
							'last_update' => date('Y-m-d H:i:s'),
							'prop_status' => 'Booked',
							'update_by' => $session['user_id']
							);
						$status = $this->curd_model->update_table('mlm_property_booking', $update_status, array('id'=>$booking->id)); 
					}
					else{
						return false;
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
		else if($action == 'change-booking-status')
		{ 
			$check = $this->validate([
				'status' => ['rules' =>  'required','errors' =>  ['required' => ' Amount is required']],
				'b_id' => ['rules' =>  'required','errors' =>  ['required' => ' Booking is required']]
			]);
			if($check){
				$booking = $this->curd_model->get_1('*','mlm_property_booking',array('id'=>$frmdata['b_id']));
				if(isset($booking->id))
				{
					if($booking->prop_status != $frmdata['status'])
					{
						if($frmdata['status'] == "C")
						{
							$staus_log = array(
								'last_update' => date("Y-m-d H:i:s"),
								'update_by' => $session['user_id'],
								'booking_id' => $booking->id,
								'status' => $frmdata['status']
							);
							$log = $this->curd_model->insert('mlm_property_status_log', $staus_log);
							if($log)
							{
								$update_booking = array(
									'last_update' => date('Y-m-d H:i:s'),
									'prop_status' => $frmdata['status'],
									'update_by' => $session['user_id']
								);
								$update_booking_qry = $this->curd_model->update_table('mlm_property_booking', $update_booking, array('id'=>$booking->id));
								if($update_booking_qry)
								{
									$update_property = array(
										'last_update' => date('Y-m-d H:i:s'),
										'prop_status' => "A",
										'update_by' => $session['user_id']
									);
									$update_property_qry = $this->curd_model->update_table('property', $update_property, array('id'=>$booking->property_id));
									if($update_property_qry)
									{
										$error['success'] = true;
										$error['property'] = $this->curd_model->get_1('*','property',array('id'=>$booking->property_id));
										$error['alert1'] = "Status Successfully Updated.";
										$status_logs = $this->curd_model->get_all("*","mlm_property_status_log",array("booking_id"=>$booking->id),'last_update','DESC');
										foreach($status_logs as $obj){
											if($obj->status == "A"){ $obj->status = "Avilable"; }
											if($obj->status == "T"){ $obj->status = "Token"; }
											if($obj->status == "P"){ $obj->status = "Partially Booked"; }
											if($obj->status == "B"){ $obj->status = "Booked"; }
											if($obj->status == "S"){ $obj->status = "Sold"; }
											$agent = $this->curd_model->get_1("*","mlm_login",array("id"=>$obj->update_by));
											$obj->update_by = $agent->f_name.' '.$agent->l_name;
											$error['status_logs'][] = $obj;
										}
									}
								}
							}
						}
						else if($frmdata['status'] == "S")
						{
							if($booking->paid_amount == $booking->deal_amount)
							{
								$staus_log = array(
									'last_update' => date("Y-m-d H:i:s"),
									'update_by' => $session['user_id'],
									'booking_id' => $booking->id,
									'status' => $frmdata['status']
								);
								$log = $this->curd_model->insert('mlm_property_status_log', $staus_log);
								if($log)
								{
									$update_booking = array(
										'last_update' => date('Y-m-d H:i:s'),
										'prop_status' => $frmdata['status'],
										'update_by' => $session['user_id']
									);
									$update_booking_qry = $this->curd_model->update_table('mlm_property_booking', $update_booking, array('id'=>$booking->id));
									if($update_booking_qry)
									{
										$update_property = array(
											'last_update' => date('Y-m-d H:i:s'),
											'prop_status' => $frmdata['status'],
											'update_by' => $session['user_id']
										);
										$update_property_qry = $this->curd_model->update_table('property', $update_property, array('id'=>$booking->property_id));
										if($update_property_qry)
										{
											$error['success'] = true;
											$error['property'] = $this->curd_model->get_1('*','property',array('id'=>$booking->property_id));
											$error['alert1'] = "Status Successfully Updated.";
											$status_logs = $this->curd_model->get_all("*","mlm_property_status_log",array("booking_id"=>$booking->id),'last_update','DESC');
											foreach($status_logs as $obj){
												if($obj->status == "A"){ $obj->status = "Avilable"; }
												if($obj->status == "T"){ $obj->status = "Token"; }
												if($obj->status == "P"){ $obj->status = "Partially Booked"; }
												if($obj->status == "B"){ $obj->status = "Booked"; }
												if($obj->status == "S"){ $obj->status = "Sold"; }
												$agent = $this->curd_model->get_1("*","mlm_login",array("id"=>$obj->update_by));
												$obj->update_by = $agent->f_name.' '.$agent->l_name;
												$error['status_logs'][] = $obj;
											}
											$com = commission_distribution($booking->id,$booking->member_id);
										}
									}
								}
							}
							else
							{
								$error['message']['refrence'] = '<p>Recieved amount is not same as deal amount.</p>';
							}
						}
						else
						{
							$staus_log = array(
								'last_update' => date("Y-m-d H:i:s"),
								'update_by' => $session['user_id'],
								'booking_id' => $booking->id,
								'status' => $frmdata['status']
							);
							$log = $this->curd_model->insert('mlm_property_status_log', $staus_log);
							if($log)
							{
								$update_booking = array(
									'last_update' => date('Y-m-d H:i:s'),
									'prop_status' => $frmdata['status'],
									'update_by' => $session['user_id']
								);
								$update_booking_qry = $this->curd_model->update_table('mlm_property_booking', $update_booking, array('id'=>$booking->id));
								if($update_booking_qry)
								{
									$update_property = array(
										'last_update' => date('Y-m-d H:i:s'),
										'prop_status' => $frmdata['status'],
										'update_by' => $session['user_id']
									);
									$update_property_qry = $this->curd_model->update_table('property', $update_property, array('id'=>$booking->property_id));
									if($update_property_qry)
									{
										$error['success'] = true;
										$error['property'] = $this->curd_model->get_1('*','property',array('id'=>$booking->property_id));
										$error['alert1'] = "Status Successfully Updated.";
										$status_logs = $this->curd_model->get_all("*","mlm_property_status_log",array("booking_id"=>$booking->id),'last_update','DESC');
										foreach($status_logs as $obj){
											if($obj->status == "A"){ $obj->status = "Avilable"; }
											if($obj->status == "T"){ $obj->status = "Token"; }
											if($obj->status == "P"){ $obj->status = "Partially Booked"; }
											if($obj->status == "B"){ $obj->status = "Booked"; }
											if($obj->status == "S"){ $obj->status = "Sold"; }
											$agent = $this->curd_model->get_1("*","mlm_login",array("id"=>$obj->update_by));
											$obj->update_by = $agent->f_name.' '.$agent->l_name;
											$error['status_logs'][] = $obj;
										}
									}
								}
							}
						}
						
					}
					else
					{
						$status = "";
						if($booking->prop_status == "A"){ $status = "Avilable"; }
						if($booking->prop_status == "T"){ $status = "Token"; }
						if($booking->prop_status == "P"){ $status = "Partially Booked"; }
						if($booking->prop_status == "B"){ $status = "Booked"; }
						if($booking->prop_status == "S"){ $status = "Sold"; }
						$error['message']['refrence'] = '<p>Property is already '.$status.'.</p>';
					}
				}
				else
				{
					$error['message']['refrence'] = '<p>Property Booking not found.</p>';
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
		else if($action == 'add_property')
        { //working
			$check = $this->validate([
				'project' => ['rules' => 'required', 'errors' => ['required' => 'Project is required']],
				'block' => ['rules' => 'required', 'errors' => ['required' => 'Block is required']],
				'area' => ['rules' => 'required', 'errors' => ['required' => 'Area is required']],
				'plot_no' => ['rules' => 'required', 'errors' => ['required' => 'Property is required']],
				'agent' => ['rules' => 'required', 'errors' => ['required' => 'Agent is required']],
				'prop_status' => ['rules' => 'required', 'errors' => ['required' => 'Property status is required']],
				'recieved_amount' => ['rules' => 'required', 'errors' => ['required' => 'Recieved Amount is required']],
				'deal_amount' => ['rules' => 'required', 'errors' => ['required' => 'Deal Amount is required']],
				'client_id' => ['rules' => 'required', 'errors' => ['required' => 'Client  is required']]
			]);
			if($check)
			{
				$prop = $this->curd_model->get_1("*","property",array("id"=>$frmdata['plot_no']));
				if(isset($prop->id) && $prop->prop_status == 'A')
				{
					if($frmdata['prop_status'] != "A")
					{
						$property_booking_data = array(
							'status' => "A",
							'insert_time' => date('Y-m-d H:i:s'),
							'client_id' => $frmdata['client_id'],
							'property_id' => $frmdata['plot_no'],
							'member_id' => $frmdata['agent'],
							'prop_status' => $frmdata['prop_status'],
							'paid_amount' => $frmdata['recieved_amount'],
							'deal_amount' => $frmdata['deal_amount'],
							'last_update' => date('Y-m-d H:i:s'),
							'update_by' => $session['user_id']
						); 
						$property_booking_id = $this->curd_model->insert('mlm_property_booking', $property_booking_data);
						if($property_booking_id)
						{
							$amount_data = array(
								'booking_id' => $property_booking_id,
								'status' => $frmdata['prop_status'],
								'amount' => $frmdata['recieved_amount'],
								'booking_date' => date('Y-m-d H:i:s')
							); 
							$property_amount = $this->curd_model->insert('prop_amount_recieved', $amount_data);
							if ($property_amount)
							{
								$property_data = array(
									'prop_status' => $frmdata['prop_status'],
									'last_update' => date('Y-m-d H:i:s'),
									'update_by' => $session['user_id']
								);
								$update_prop = $this->curd_model->update_table('property', $property_data, array('id' => $frmdata['plot_no']));
								if($update_prop)
								{ 
									$status_logs = array(
										"last_update" => date('Y-m-d H:i:s'),
										"update_by" => $session['user_id'],
										"booking_id" => $property_booking_id,
										"status" => $frmdata['prop_status']
									);
									$this->curd_model->insert('mlm_property_status_log', $status_logs);
									$error['success'] = true;
								}
							} else {
								$error['message']['refrence'] = '<p>Error in Insert.</p>';
							}
						}
					}
					else
					{
						$error['message']['refrence'] = '<p>Please update the status.</p>';
					}
				}
				else
				{
					$error['message']['refrence'] = '<p>Property is not avilable.</p>';
				}
			}
			else 
			{
				foreach ($_POST as $key => $value) {
					if (method_exists($this->validation, 'hasError') && method_exists($this->validation, 'getError') && $this->validation->hasError($key)) {
						$error['message'][$key] = $this->validation->getError($key);
					}
				}
			}
		}
		else if($action == 'cancel_booking_amount')
        {
			$check = $this->validate([
				'booking_table_id' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']], 
				'booking_prop_id' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']], 
				'booking_client_id' => ['rules' =>  'required','errors' =>  ['required' => 'Object is required']], 
			]);
			if($check)
			{ 
				$cancel_property = $property_status = false;
				$cancel_property_id = $property_status_id = 0;
				$cancel_data = $property_status_data = array();
		
				$cancel_data = array(
				'status' => "D",
				'last_update' => date('Y-m-d H:i:s'), 
				'update_by' => $session['user_id']
				);
				$cancel_property = true;
				$property_status_data = array(
					'status' => 'A',
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id']
				);
				$property_status = true;
				if($cancel_property && $property_status)
				{
					$cancel_property_id = $this->curd_model->update_table('mlm_property_booking', $cancel_data,array('id'=>$frmdata['booking_table_id']));
					$property_status_id = $this->curd_model->update_table('property', $property_status_data, array('id' => $frmdata['booking_prop_id']));
					
					if($cancel_property_id && $property_status_id){  
					   $error['success'] = true;
					}
					else	
					{
						$error['message'] = 'Error in Cancel Data';
					}
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
	
	
	
	
	public function create_client($client_info)
	{
		$client_info = mysql_clean($client_info);
		$data = array(
			'status' => 'A',
			'insert_time' => date('Y-m-d H:i:s'),
			'insert_by' => $client_info['insert_by'],
			'name' => $client_info['name'],
			'email' => $client_info['email'],
			'address' => $client_info['address'],
			'mobile_number' => $client_info['mobile_number']
		);
		$insert_id = $this->curd_model->insert('mlm_client', $data);
		if($insert_id)
		{
			$info[]=array(
				'status' => 'A',
				'last_update' => date('Y-m-d H:i:s'),
				'update_by' => $client_info['insert_by'],
				'client_id' => $insert_id,
				'type' => 'client',
				'info_type' => 'mobile',
				'info_value' => $client_info['mobile_number']
				);
				
			$info[]=array(
				'status' => 'A',
				'last_update' => date('Y-m-d H:i:s'),
				'update_by' => $client_info['insert_by'],
				'client_id' => $insert_id,
				'type' => 'client',
				'info_type' => 'name',
				'info_value' => $client_info['name']
			);
			
			$info[]=array(
				'status' => 'A',
				'last_update' => date('Y-m-d H:i:s'),
				'update_by' => $client_info['insert_by'],
				'client_id' => $insert_id,
				'type' => 'client',
				'info_type' => 'email',
				'info_value' => $client_info['email']
			);
			$query = $this->curd_model->insert_batch_data('mlm_client_info',$info);
			if($query)
			{
				return true;
			}
			else
			{
				return false;
			}
		}else
		{
			return false;
		}
	}
}
?>