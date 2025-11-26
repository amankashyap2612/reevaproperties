<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_property extends BaseController
{
    public function action_update($action = null)
    {
		$error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost();
        $session = $this->session->get('mlmlogin');
        if($action == 'add_property')
        { //working now
			$check = $this->validate([
				'plot' => ['rules' =>  'required','errors' =>  ['required' => 'Plot No is required']],
				'area' => ['rules' =>  'required','errors' =>  ['required' => 'Area is required']],
				'size' => ['rules' =>  'required','errors' =>  ['required' => 'Size is required']],
				'p_status' => ['rules' =>  'required','errors' =>  ['required' => 'Property status is required']],
				'block' => ['rules' =>  'required','errors' =>  ['required' => 'Block is required']],
				'type' => ['rules' =>  'required','errors' =>  ['required' => 'Property Type is required']],
				'image_id' => ['rules' => 'required','errors' =>['required' => 'image is required']]
			]);
            if($check)
            {
				$insert_data = array(
					'status' => "A",
					'insert_time' => date('Y-m-d H:i:s'),
					'plot_no' => $frmdata['plot'],
					'area_sq' => $frmdata['area'],
					'size_gaj' => $frmdata['size'],
					'prop_status' => $frmdata['p_status'],
					'block' => $frmdata['block'],
					'type' => $frmdata['type'],
					'project_id' => $frmdata['project'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
					'img_id' => $frmdata['image_id']
				);
				$insert = $this->curd_model->insert('property', $insert_data);
				if($insert){
					$error['result'] = true;
					$error['output'] = $this->ajax_view('property',array('project'=>$frmdata['filter_project'],'block'=>$frmdata['filter_block'],'size'=>$frmdata['filter_size'],'status'=>$frmdata['filter_status']));
					$error['success'] = true;
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
        else if($action == 'update_property')
        { //working now
			$check = $this->validate([
				'edt_project' => ['rules' =>  'required','errors' =>  ['required' => 'Project Name is required']],
				'edt_plot_no' => ['rules' =>  'required','errors' =>  ['required' => 'Plot Number is required']],
				'edt_area_sq' => ['rules' =>  'required','errors' =>  ['required' => 'Area is required']],
				'edt_size_gaj' => ['rules' =>  'required','errors' =>  ['required' => 'Size is required']],
				'edt_prop_status' => ['rules' =>  'required','errors' =>  ['required' => 'Property status is required']],
				'edt_block' => ['rules' =>  'required','errors' =>  ['required' => 'Block is required']],
				'edt_type' => ['rules' =>  'required','errors' =>  ['required' => 'Property Type is required']],
				'edt_image_id' => ['rules' =>  'required','errors' =>  ['required' => 'Image is required']],
				'edt_id' => ['rules' =>  'required','errors' =>  ['required' => 'Property is required']]
			]);
			if($check)
			{
				$update_data = array(
					'img_id' => $frmdata['edt_image_id'],
					'plot_no' => $frmdata['edt_plot_no'],
					'area_sq' => $frmdata['edt_area_sq'],
					'size_gaj' => $frmdata['edt_size_gaj'],
					'prop_status' => $frmdata['edt_prop_status'],
					'block' => $frmdata['edt_block'],
					'type' => $frmdata['edt_type'],
					'project_id' => $frmdata['edt_project'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id']
				);
					
				$query = $this->curd_model->update_table('property', $update_data, array('id'=>$frmdata['edt_id']));
				if($query)
				{	    
					$error['result'] = true;
					$error['success'] = true;
				}
				else
				{
					$error['message']['refrence'] = '<p>Error in update.</p>'; }
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
		{ //working now
			$check = $this->validate([
				'status' => ['rules' =>  'required','errors' =>  ['required' => 'status is required']],
				'id' => ['rules' =>  'required','errors' =>  ['required' => 'property is required']],
			]);
			
			if($check)
			{
				$data = array(
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
					'status' => (($frmdata['status'] == 'A') ? 'D' : 'A')
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
		else if($action == "property_images_upload")
		{ //working now
			$check = $this->validate([
				'croppedImg' => ['rules' =>  'required','errors' =>  ['required' => 'Only Croped Image is allowed.']]
			]);
			if($check)
			{
				$image_valid = false;
				$profile = 0;
				if($frmdata['croppedImg'] != '')
				{
					$uploadData = array();
					$output_file_without_extension = date('YmdHis').rand(000,100);
					$output_file_with_extension = '';
					$path_with_end_slash = 'images/property/';
					//data:image/png;base64,asdfasdfasdf
					$splited = explode(',',substr($frmdata['croppedImg'],5),2);
					$mime=$splited[0];		//image/png;base64
					$data=$splited[1];		//asdfasdfasdf
					
					// image/png;base64
					$mime_split_without_base64=explode(';', $mime,2);
					// image/png
					$mime_split=explode('/', $mime_split_without_base64[0],2);
					
					if(count($mime_split)==2)
					{
						// png
						$extension=$mime_split[1];
						if($extension=='jpeg')$extension='jpg';
						$output_file_with_extension=$output_file_without_extension.'.'.$extension;
					}
					file_put_contents($path_with_end_slash . $output_file_with_extension, base64_decode($data) );	
					$uploadData = array(
						'status' => 'A',
						'upload_time' => date('Y-m-d H:i:s'),
						'upload_by' => 1,
						'purpose' => 'property',
						'location' => 'property/'.$output_file_with_extension
					);
					$profile = $this->curd_model->insert('images', $uploadData);
					if($profile)
					{
						$error['success'] = true;
					}
					else 
					{
						$error['message']['refrence'] = '<p>Error in storing Image please try again.</p>';
					}
				}
				else 
				{
					$error['message']['refrence'] = '<p >Crop Image not found.</p>';
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
		else if($action == "property_images_delete")
		{ //pending
			$check = $this->validate([
                'prop_img_id' => ['rules' =>  'required','errors' =>  ['required' => 'object is required']]
            ]);
			if($check)
			{
				$get_sql = $this->curd_model->get_1('*', 'images', array('id'=>$frmdata['prop_img_id'], 'status'=>'A'));
				$old_image = $get_sql->location;
				if(!empty($old_image))
				{
					unlink(ROOTPATH.'./images/'.$old_image);
					// delete image from database
					$query = $this->curd_model->delete_row('images', array('id'=>$frmdata['prop_img_id']));
					 if ($query) {
						
						$error['success'] = true;
					} 
					else 
					{
					$error['message']['refrence'] = '<p >Error in deleting Image please try again.</p>';
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
	
    public function ajax_view($table = null,$filter = null)
	{
		$emp = $this->curd_model->get_all('*', 'login', array(), 'f_name', 'ASC');
		foreach($emp as $em)
		{
			$data['user_info'][$em->id] = $em;
		}
		
		$area_filter = ($filter['size'] != "")?' AND `size_gaj` = "'.$filter['size'].'"':'';
		$block_filter = ($filter['block'] != "")?' AND `block` = "'.$filter['block'].'"':'';
		$status_filter = ($filter['status'] != "")?' AND `status` = "'.$filter['status'].'"':'A';
		$project_filter = ($filter['project'] != "")?' AND `project_id` = "'.$filter['project'].'"':'';
		
		if($filter['project'] != "" && $filter['block'] != "" && $filter['size'] != "")
		{
			$data['search'] = $this->curd_model->customquery1('select * from property where `id` >= 0 '.$area_filter.$block_filter.$project_filter.$status_filter.' order by plot_no', array());
		}
		return view("mlm/ajax/manage-properties",$data);
	}
}

?> 