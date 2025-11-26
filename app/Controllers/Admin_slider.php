<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_slider extends BaseController
{
    public function action_update($action = null)
    {
        $data['session'] = $this->session->get('adminlogin');
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost();
        if ($action == "change-status-slider")
        {
            $check = $this->validate([
                'id' => ['rules' => 'required', 'errors' => ['required' => 'Id is required']],
                'status' => ['rules' => 'required', 'errors' => ['required' => 'Status is required']]
            ]);
            if($check) 
            {
                $frmdata = mysql_clean($frmdata);
                $upload_data = array(
                    'last_update' => date('Y-m-d H:i:s'),
                    'update_by' => $data['session']['user_id'],
                    'status' => (($frmdata['status'] == 'D') ? 'A' : 'D')
                );
                $insert = $this->curd_model->update_table('home_slider', $upload_data, array('id' => $frmdata['id']));

                if ($insert) {
                    $error['success'] = true;
                } else {
                    $error['message']['refrence'] = '<p>Error in Update.</p>';
                }
            } 
            else 
            {
                    foreach ($_POST as $key => $value) 
                    {
                        if ($this->validation->hasError($key)) 
                        {
                            $error['message'][$key] = $this->validation->getError($key);
                        }
                    }
            } 
         
        }

        else if ($action == "upload_slider_img") 
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
					$path_with_end_slash = 'images/homeslider/';
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
						'upload_by' => $data['session']['user_id'],
						'purpose' => 'home_slider',
						'location' => 'homeslider/'.$output_file_with_extension
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
	    else if ($action == "add_slider") 
		{ 
			$check = $this->validate([
				'image_id' => ['rules' => 'required', 'errors' => ['required' => 'Image is required']],
				'top' => ['rules' => 'required', 'errors' => ['required' => 'Top Line is required']]
			]);
			
			if($check) 
			{
				$frmdata = mysql_clean($frmdata);
				$insert_data = array(
					'status' => 'A',
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $data['session']['user_id'],
					'img' => $frmdata['image_id'],
					'sort_data' => $frmdata['sort_data'],
					'top_line' => $frmdata['top'] 
				);
				$insert = $this->curd_model->insert('home_slider', $insert_data);
				if ($insert) {
					$error['success'] = true;
				} else {
					$error['message']['refrence'] = '<p>Error in Insert.</p>';
				}
			} 
			else {
				foreach ($_POST as $key => $value) 
				{
					if ($this->validation->hasError($key)) 
					{
						$error['message'][$key] = $this->validation->getError($key);
					}
				}
			}
		}

	    else if ($action == "update_slider") 
		{
			$check = $this->validate([

			'edt_image_id' => ['rules' => 'required', 'errors' => ['required' => 'image  is required']],
			'edt_top' => ['rules' => 'required', 'errors' => ['required' => 'Top Line is required']]

			]); 
			if ($check) {
				
				$frmdata = mysql_clean($frmdata);
				$update_data = array(
					'last_update' => date('Y-m-d H:i:s'),
					'update_by' => $data['session']['user_id'],
					'img' => $frmdata['edt_image_id'],
					'sort_data' => $frmdata['edt_sort'],
					'top_line' => $frmdata['edt_top'] 
				); 
				$insert = $this->curd_model->update_table('home_slider', $update_data, array('id'=>$frmdata['slider_id']));
				if ($insert) {
					$error['success'] = true;
				} else {
					$error['message']['refrence'] = '<p>Error in Update.</p>';
				}
			} 
			else{
				foreach ($_POST as $key => $value) 
				{
					if ($this->validation->hasError($key)) 
					{
						$error['message'][$key] = $this->validation->getError($key);
					}
				}
			}
		}
		echo json_encode($error);
    }
}
?>