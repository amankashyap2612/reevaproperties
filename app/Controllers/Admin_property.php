<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_property extends BaseController
{
    public function action_update($action = null)
    {
		$error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 		
        $session = $this->session->get('adminlogin');
		
        if($action == 'add_property')
        {
            $check = $this->validate([
				'plot_no' => ['rules' =>  'required','errors' =>  ['required' => 'Plot No is required']],
				'area_sq' => ['rules' =>  'required','errors' =>  ['required' => 'Area is required']],
				'size_gaj' => ['rules' =>  'required','errors' =>  ['required' => 'Size is required']],
				'prop_status' => ['rules' =>  'required','errors' =>  ['required' => 'Property status is required']],
				'block' => ['rules' =>  'required','errors' =>  ['required' => 'Block is required']],
				'type' => ['rules' =>  'required','errors' =>  ['required' => 'Property Type is required']]
			]);
            if($check)
            {
				$frmdata = mysql_clean($frmdata);
				$update_data = array(
					'status' => "A",
					'insert_time' => date('Y-m-d H:i:s'),
					'plot_no' => $frmdata['plot_no'],
					'area_sq' => $frmdata['area_sq'],
					'size_gaj' => $frmdata['size_gaj'],
					'prop_status' => $frmdata['prop_status'],
					'block' => $frmdata['block'],
					'type' => $frmdata['type'],
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id']
				);
				$insert = $this->curd_model->insert('property', $update_data);
				if($insert){
					$error['result'] = true;
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
        {
			$check = $this->validate([
				'edt_plot_no' => ['rules' =>  'required','errors' =>  ['required' => 'Plot Number is required']],
				'edt_area_sq' => ['rules' =>  'required','errors' =>  ['required' => 'Area is required']],
				'edt_size_gaj' => ['rules' =>  'required','errors' =>  ['required' => 'Size is required']],
				'edt_prop_status' => ['rules' =>  'required','errors' =>  ['required' => 'Property status is required']],
				'edt_block' => ['rules' =>  'required','errors' =>  ['required' => 'Block is required']],
				'edt_type' => ['rules' =>  'required','errors' =>  ['required' => 'Property Type is required']]
			]);
			if($check)
			{
				$frmdata = mysql_clean($frmdata);
				$update_data = array(
					'plot_no' => $frmdata['edt_plot_no'],
					'area_sq' => $frmdata['edt_area_sq'],
					'size_gaj' => $frmdata['edt_size_gaj'],
					'prop_status' => $frmdata['edt_prop_status'],
					'block' => $frmdata['edt_block'],
					'type' => $frmdata['edt_type'],
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
		{
			$check = $this->validate([
				'status' => ['rules' =>  'required','errors' =>  ['required' => 'status is required']],
				'id' => ['rules' =>  'required','errors' =>  ['required' => 'property is required']],
			]);
			
			if($check)
			{
				$frmdata = mysql_clean($frmdata);
				$data = array(
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
		else if($action == "add_prop")
		{
			$property = [];

			// Prepare data for insertion
			for ($i = 601; $i <= 660; $i++) {
				$plot_no = str_pad($i, 4, '0', STR_PAD_LEFT);// Ensure 4-digit format 
				$property[] = [
					'status' => 'A',
					'insert_time' => date('Y-m-d H:i:s'),
					'plot_no' => $plot_no,
					'area_sq' => 25, // Set the area for all plots
					'size_gaj' => 40,  // Set the size for all plots
					'block' => 'D' ,					
					'type' => 'plot' ,					
					'prop_status' => 'Available',  // Set the size for all plots
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $session['user_id'],
				];
			}

			$add_data = $this->curd_model->insert_batch_data('property',$property);
			if($add_data)
			{
				$error['success'] = true;
			}
			else
			{
				$error['message']['reference'] = 'Error in Add Data';
			}
		}
		else if($action == 'catch_block')
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
		else if($action == "property_images_upload")
		{
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
					$base=$splited[1];		//asdfasdfasdf
					
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
							
					file_put_contents( $path_with_end_slash . $output_file_with_extension, base64_decode($base) );
					$uploadData = array(
						'status' => 'A',
						'upload_time' => date('Y-m-d H:i:s'),
						'upload_by' => $session['user_id'] ,
						'purpose' => 'property',
						'location' => 'property/'.$output_file_with_extension
					);
					$profile = $this->curd_model->insert('images', $uploadData);
					print_r($this->db->getLastQuery());
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
        echo json_encode($error);
	}	
}

?> 