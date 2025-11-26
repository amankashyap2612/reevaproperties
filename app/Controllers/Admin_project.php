<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Admin_project extends BaseController
{
    public function action_update($action = null)
    {
        $error = array('success' => false,'error_token'=>array('cname'=>csrf_token(),'cvalue'=>csrf_hash()), 'message' =>array(),'border'=>true);
        $frmdata = $this->request->getPost(); 		
        $session = $this->session->get('adminlogin');
		
        if($action == 'add_project')
        {
			$check = $this->validate([
                'name' => ['rules' =>  'required','errors' =>  ['required' => 'Name is required']],
				'image_id' => ['rules' => 'required', 'errors' => ['required' => 'Image is required']],
            ]);
			
            if($check)
            {
				$frmdata = mysql_clean($frmdata);
				$add_data = array(
					'status' => "A",
					'name' => $frmdata['name'],
					'insert_time' => date('Y-m-d H:i:s'),
					'last_update' => date('Y-m-d H:i:s'),
					'updated_by' => $session['user_id'],
					'img_id' => $frmdata['image_id']
				);
				$insert = $this->curd_model->insert('project', $add_data);
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
                foreach($_POST as $key =>$value)
                {
                    if ($this->validation->hasError($key)) 
					{
                        $error['message'][$key] = $this->validation->getError($key);
                    }
                }
            }
        }
        else if($action == 'update_project')
        {
            $check = $this->validate([
                'edt_name' => ['rules' =>  'required','errors' =>  ['required' => 'Name is required']],
                'edt_image_id' => ['rules' =>  'required','errors' =>  ['required' => 'Image is required']]
            ]);
            if($check)
            {
                $frmdata = mysql_clean($frmdata);
				$update_data = array(
					'last_update' => date('Y-m-d H:i:s'),
					'updated_by' => $session['user_id'],
					'name' => $frmdata['edt_name'],
					'img_id' => $frmdata['edt_image_id']
				);
		
				$update = $this->curd_model->update_table('project', $update_data, array('id'=>$frmdata['edt_id']));
				
				if($update)
				{
					$error['success'] = true;
				}
				else
				{
					$error['message']['refrence'] = '<p>Error in Update.</p>';
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
		else if($action == 'change_project_status')
		{
			$check = $this->validate([
				'status' => ['rules' =>  'required','errors' =>  ['required' => 'status is required']],
				'id' => ['rules' =>  'required','errors' =>  ['required' => 'web page is required']],
			]);
			
			if($check)
			{
				$frmdata = mysql_clean($frmdata);
				$data = array(
					'last_update' => date('Y-m-d H:i:s'),
					'updated_by' => $session['user_id'],
					'status' => (($frmdata['status'] == 'D') ? 'A' : 'D')
				);
				$sql = $this->curd_model->update_table('project', $data, array('id'=>$frmdata['id']));
				
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
		else if ($action == "upload_project_img") 
		{
			//------------------------------
			$doc1 = $this->request->getFile('project_image');
			if($doc1->isValid())
			{
				$doc1validationRule = [
					'project_image' => [
						'label' => 'Image File',
						'rules' => 'uploaded[project_image]'
							. '|mime_in[project_image,image/png,image/jpg,image/jpeg]'
							. '|max_size[project_image,1000]'
							. '|max_dims[project_image,1200,900]',
					],
				];
				if ($this->validate($doc1validationRule)) {
					if (! $doc1->hasMoved()) {
						$file1 = $doc1->getRandomName();
						$doc1->move(ROOTPATH . '../images/project/', $file1);
						$upload = array(
							'status' => 'A',
							'upload_time' => date('Y-m-d H:i:s'),
							'upload_by' => $session['user_id'],
							'purpose' => 'project',
							'location' => 'project/' . $file1,
						);
						$sql = $this->curd_model->insert('images', $upload);
						if ($sql) {
							$error['success'] = true;
						} else {
							$error['message']['refrence'] = '<p >Error in storing Image please try again.</p>';
						}
					}
				}
				else
				{
					$upload_file = false;
					$error['message']['fileerrors'] = $this->validator->getErrors();
				}
			}
			//---------------------------------
		  
		}
		else if($action == "project_image_delete")
		{
			$check = $this->validate([
                'proj_img_id' => ['rules' =>  'required','errors' =>  ['required' => 'object is required']]
            ]);
			if($check)
			{  
				$frmdata = mysql_clean($frmdata);
				$get_sql = $this->curd_model->get_1('*', 'images', array('id'=>$frmdata['proj_img_id'], 'status'=>'A'));
				$old_image = $get_sql->location;
				if(isset($get_sql->id))
				{
					unlink(FCPATH.'./images/'.$old_image);
					// delete image from database
					$query = $this->curd_model->delete_row('images', array('id'=>$frmdata['proj_img_id']));
					if($query)
					{
						$error['success'] = true;
					} 
					else 
					{
						$error['message']['refrence'] = '<p>Error in deleting Image please try again.</p>';
					}
				}
				else 
				{
					$error['message']['refrence'] = '<p >Error in deleting Image please try again.</p>';
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