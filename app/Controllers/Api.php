<?php

namespace App\Controllers;
use CodeIgniter\Controller;
class Api extends BaseController
{
	public function get_edit_data(){
		
		$error = array('success' =>false,'error_token'=>array('cname'=> csrf_token(),'cvalue'=>csrf_hash()),'message'=> array(),'border'=>true);
		$json_data = file_get_contents('php://input');
		$frmdata = json_decode($json_data, true);  
		$error['get_id'] = $this->curd_model->get_all('*','api_data',array('id'=>$frmdata['id']),'id','ASC'); 
		if($error['get_id'])
		{
			$error['success'] = true;
		}
		else{
			$error['message'] = 'data not found';
		}
		echo json_encode($error);
	}
	
	public function save_edit_data()
	{
		$error = array('success' =>false,'error_token'=>array('cname'=> csrf_token(),'cvalue'=>csrf_hash()),'message'=> array(),'border'=>true);
		$json_data = file_get_contents('php://input');
		$frmdata = json_decode($json_data, true);
		$update = array(
			'status' =>'A',
			'insert_time' =>date('Y-m-d H:i:s'),
			'name' =>$frmdata['name'],
			'email'=> $frmdata['email'],
			'password' =>$frmdata['password']
		);

		$sql = $this->curd_model->update('api_data',$update, array('id'=>$frmdata['id']));
		if($sql)
		{
			$error['success'] = true;
		}
		else{
			$error['message'] = 'Error in Update Data';
		}
		
		
		echo json_encode($error);
	}
	public function test_add()
	{
		$error = array('success' =>false,'error_token'=>array('cname'=> csrf_token(),'cvalue'=>csrf_hash()),'message'=> array(),'border'=>true);
		$json_data = file_get_contents('php://input');
		$frmdata = json_decode($json_data, true);
		$add = array(
			'status' =>'A',
			'insert_time' =>date('Y-m-d H:i:s'),
			'name' =>$frmdata['name'],
			'email'=> $frmdata['email'],
			'password' =>$frmdata['password']
		);

		$sql = $this->curd_model->insert('api_data',$add);
		if($sql)
		{
			$error['success'] = true;
		}
		else{
			$error['message'] = 'Error in add Data';
		}
		
		
		echo json_encode($error);
	}
	public function get_data()
	{
		$error = array('success' =>false,'error_token'=>array('cname'=> csrf_token(),'cvalue'=>csrf_hash()),'message'=> array(),'border'=>true);
		$error['get'] = $this->curd_model->get_all('*','api_data',array('status'=>'A'),'id','ASC');
		if($error['get'])
		{
			$error['success'] = true;
		}
		else{
			$error['message'] = 'data not found';
		}
		echo json_encode($error);
	}
	public function image_data()
	{
		$error = array('success' =>false,'error_token'=>array('cname'=> csrf_token(),'cvalue'=>csrf_hash()),'message'=> array(),'border'=>true);
		$error['images'] = $this->curd_model->get_all('*','images',array('status'=>'A'),'id','ASC');
		if($error['images'])
		{
			$error['success'] = true;
		}
		else{
			$error['message'] = 'data not found';
		}
		echo json_encode($error);
	}
	
	
	  
}
