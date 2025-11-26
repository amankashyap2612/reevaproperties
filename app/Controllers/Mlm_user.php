<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class Mlm_user extends BaseController
{
    public function action_update($action = null)
    {
		$error = ["success" => false,"error_token" => ["cname" => csrf_token(), "cvalue" => csrf_hash()],"message" => [],"border" => true,];
        $frmdata = $this->request->getPost();
		$session = $this->session->get("mlmlogin");
		if($action == "add_user_info")
		{	
			$check = $this->validate([
				"fname" => ["rules" => "required", "errors" => ["required" => "First Name is required"]],
				"lname" => ["rules" => "required", "errors" => ["required" => "Last Name is required"]],
				"nominee" => ["rules" => "required", "errors" => ["required" => "Nominee Name is required"]],
				"office" => ["rules" => "required", "errors" => ["required" => "Office is required"]], 
				"dob" => ["rules" => "required", "errors" => ["required" => "DOB is required"]],
				"nominee_mobile" => ["rules" => "required", "errors" => ["required" => "Nominee Mobile is required"]],
				"relation" => ["rules" => "required", "errors" => ["required" => "Relation is required"]],
				"nominee_dob" => ["rules" => "required", "errors" => ["required" => " Nominee DOB is required"]],
				"contact" => [
					"rules" => 'required|regex_match[/^\d{10}$/]',
					"errors" => [
						"required" => "Mobile is Required",
						"regex_match" => "Mobile must be a 10-digit number",
					]
				],
				"email" => [
					"rules" => "required|valid_email|is_unique[mlm_login.email_id]",
					"errors" => [
						"required" => "User Email is required",
						"valid_email" => "You must provide a valid email address."
					]
				],
				"croppedImg" => ["rules" => "required", "errors" => ["required" => "Profile is Required."]],
			]);

			if($check)
			{
				$aadhar = $pan = $profile = false;
				$aadhar_id = $pan_id = $profile_id = 0;
				$upload_pan = $upload_aadhar = $upload_profile = array();
				//----------------------upload PAN Card;
				$doc = $this->request->getFile("pan");
				if($doc->isValid())
				{
					$docValidationRule = [
						"pan" => [
							"label" => "PDF File",
							"rules" => "uploaded[pan]|mime_in[pan,application/pdf]",
						],
					];
					if($this->validate($docValidationRule))
					{
						$file = $doc->getRandomName();
						if(!$doc->hasMoved())
						{
							$doc->move(ROOTPATH . "assets/pdf/pan/", $file);
							$upload_pan = [
								"status" => "A",
								"insert_time" => date("Y-m-d H:i:s"),
								"update_by" => $session["user_id"],
								"purpose" => "pan",
								"location" => "pan/" . $file,
							];
							$pan = true;
						}
					}
					else
					{
						$error["message"]["reference"] = "Pan card is required in PDF.";
					}
				}
				else
				{
					$error["message"]["reference"] = "Pan card is required in PDF.";
				}
				//----------------------upload Aadhar Card;
				$doc = $this->request->getFile("aadhar");
				if($doc->isValid())
				{
					$docValidationRule = [
						"aadhar" => [
							"label" => "PDF File",
							"rules" => "uploaded[aadhar]|mime_in[aadhar,application/pdf]",
						],
					];
					if($this->validate($docValidationRule))
					{
						$file = $doc->getRandomName();
						if(!$doc->hasMoved())
						{
							$doc->move(ROOTPATH . "assets/pdf/aadhar/", $file);
							$upload_aadhar = [
								"status" => "A",
								"insert_time" => date("Y-m-d H:i:s"),
								"update_by" => $session["user_id"],
								"purpose" => "aadhar_card",
								"location" => "aadhar/" . $file,
							];
							$aadhar = true;
						
						} else {
							$upload_file = false;
							$error["message"]["fileerrors"] = $this->validator->getErrors();
						}
					}
				}
				else
				{
					$error["message"]["reference"] = "Pan card is required in PDF.";
				}
				
				//----------------------upload profile image;
				if($frmdata["croppedImg"] != "")
				{
					$output_file_without_extension = date("YmdHis") . rand(000, 100);
					$output_file_with_extension = "";
					$path_with_end_slash = "images/mlm_user_profile/";
					$splited = explode(",", substr($frmdata["croppedImg"], 5), 2);
					$mime = $splited[0]; //image/png;base64
					$data = $splited[1]; //asdfasdfasdf
					$mime_split_without_base64 = explode(";", $mime, 2);
					$mime_split = explode("/", $mime_split_without_base64[0], 2);
					if (count($mime_split) == 2) {
						$extension = $mime_split[1];
						if ($extension == "jpeg") {
							$extension = "jpg";
						}
						$output_file_with_extension = preg_replace("/base64/", "", $output_file_without_extension) . "." . $extension;
					}
					file_put_contents($path_with_end_slash . $output_file_with_extension, base64_decode($data));
					$upload_profile = [
						"status" => "A",
						"upload_time" => date("Y-m-d H:i:s"),
						"upload_by" => $session["user_id"],
						"purpose" => "mlm_user_profile",
						"location" => "mlm_user_profile/" . $output_file_with_extension,
					];
					$profile = true;
					
				}
				else
				{
					$error["message"]["reference"] = "<p>Crop Image not found.</p>";
				}
				
				if($aadhar && $pan && $profile)
				{
					//--insert PAN
					$pan_id = $this->curd_model->insert("resourses", $upload_pan);
					//--insert Aadhar
					$aadhar_id = $this->curd_model->insert("resourses", $upload_aadhar);
					//--insert profile
					$profile_id = $this->curd_model->insert("images", $upload_profile);
					
					$member_id = 0;
					if(isset($frmdata['member_id']) && $frmdata['member_id'] !== '')
					{
						$member_id = $frmdata['member_id'];
					}
					else
					{
						$member_id = $session["user_id"];
					}
					
					$insert_data = [
						"status" => "A",
						"create_time" => date("Y-m-d H:i:s"),
						"update_time" => date("Y-m-d H:i:s"),
						"update_by" => $session["user_id"],
						"user_type" => 1,
						"f_name" => $frmdata["fname"],
						"l_name" => $frmdata["lname"],
						"contact" => $frmdata["contact"],
						"email_id" => $frmdata["email"],
						"dob" => $frmdata["dob"],
						"member_id" => $member_id,
						"aadhar_id" => $aadhar_id,
						"office" => $frmdata["office"],
						"pan_id" => $pan_id,
						"img_id" => $profile_id,
						"password" => str_replace(" ","-",strtolower($frmdata["fname"])) . "@" . rand(1001, 9999),
					];
					$insert_member = $this->curd_model->insert("mlm_login", $insert_data);
					if($insert_member)
					{
						//-------------insert wallet
						$wallet = array(
							'status' => 'A',
							'create_time' => date('Y-m-d H:i:s'),
							'wallet_id' => date('Ymd').$insert_member,
							'last_update' => date('Y-m-d H:i:s'),
							'update_by' => $session["user_id"],
							'balance' => 0,
							'member_id' => $insert_member
						);
						$wal = $this->curd_model->insert("agent_wallet",$wallet);
						//-------------insert nominee
						$nominee_array = [
							'status' => 'A',
							'insert_time' => date('Y-m-d H:i:s'),
							'last_update' => date('Y-m-d H:i:s'),
							'update_by' => $session["user_id"],
							'mlm_login_id' => $insert_member,
							'name' => $frmdata['nominee'],
							'relation' => $frmdata['relation'],
							'dob' => $frmdata['nominee_dob'],
							'contact' => $frmdata['nominee_mobile'],
						];
						$nominee = $this->curd_model->insert('nominee', $nominee_array);
						if($nominee)
						{
							$user_id_data = [
								'status' => 'A',
								'create_time' => date('Y-m-d H:i:s'),
								'last_update' => date('Y-m-d H:i:s'),
								'update_by' => $session["user_id"],
								'member_login_id' => $insert_member,
								'name' => $frmdata["fname"] . ' ' . $frmdata["lname"]
							];
							$member_id_sql = $this->curd_model->insert('mlm_member_id', $user_id_data);
							if($member_id_sql)
							{
								$member_id_ref = 'RD'.$member_id_sql;
								$update_member = $this->curd_model->update_table('mlm_login', array('member_user_id' => $member_id_ref), array('id' => $insert_member));
								$count = member_count($member_id);
								$mail_settings = $this->curd_model->get_1("*", "mail_settings", ["mail_owner" => "website", "template" => "contact_form"]);
								$subject = "Welcome to Reeva Developers";
								$mail_body = mlm_user($insert_data);
								$mail_response = send_mail($mail_settings, $frmdata["email"], $subject, $mail_body);
								if($mail_response["success"])
								{
									$error["success"] = true;
								}
								else
								{
									$error["message"]["reference"] = $mail_response["message"];
								}
								$error["success"] = true;
							}
							else
							{
								$error['message']["reference"] = 'Error in creating user id';
							}
						}
						else
						{
							$error['message'] = 'Error in Nominee Data';
						}
					}
					else
					{
						$error["message"]["reference"] = "<p>Error in Insert.</p>";
					}
				}
				else
				{
					$error["message"]["reference"] = "<p>Error with documents.</p>";
				}
			}
			else 
			{
				foreach ($_POST as $key => $value) {
					if ($this->validation->hasError($key)) {
						$error["message"][$key] = $this->validation->getError($key);
					}
				}
			}
        }
		else if($action == "update_user_info")
		{
            $check = $this->validate([
                "f_name" => ["rules" => "required","errors" => ["required" => "First Name is required"]],
                "contact" => [
                    "rules" => 'required|regex_match[/^\d{10}$/]',
                    "errors" => [
                        "required" => "Mobile is Required",
                        "regex_match" => "Mobile must be a 10-digit number",
                    ],
                ],
                "l_name" => ["rules" => "required","errors" => ["required" => "Last Name is required"]],
                "office" => ["rules" => "required","errors" => ["required" => "Office is required"]],
                //'email' => ['rules' =>  'required|valid_email','errors' =>  ['required' => 'User Email is required','valid_email'   =>  'You must provide a valid email address.']],
                "user_id" => [
                    "rules" => "required",
                    "errors" => ["required" => "User is required"],
                ],
                "status" => [
                    "rules" => "required",
                    "errors" => ["required" => "Status is required"],
                ],
            ]);
            if ($check) {
                $frmdata = mysql_clean($frmdata);
                $user = $this->curd_model->get_1("*", "mlm_login", [
                    "id" => $frmdata["user_id"],
                ]);

                if (isset($user->id) && $user->password != "") {
                    $update_data = [
                        "status" => $frmdata["status"],
                        "update_time" => date("Y-m-d H:i:s"),
                        "update_by" => $session["user_id"],
                        "f_name" => $frmdata["f_name"],
                        "l_name" => $frmdata["l_name"],
                        "contact" => $frmdata["contact"],
                        "office" => $frmdata["office"],
                    ];

                    $update = $this->curd_model->update_table(
                        "mlm_login",
                        $update_data,
                        ["id" => $frmdata["user_id"]]
                    );
                    if ($update) {
                        $error["success"] = true;
                    } else {
                        $error["message"]["refrence"] =
                            "<p>Error in Update.</p>";
                    }
                } else {
                    $error["message"]["alert"] =
                        "Please generate user password.";
                }
            } else {
                foreach ($_POST as $key => $value) {
                    if ($this->validation->hasError($key)) {
                        $error["message"][$key] = $this->validation->getError(
                            $key
                        );
                    }
                }
            }
        } 
		else if($action == "update_user_password")
		{
            $session = $this->session->get("mlmlogin");
            $check = $this->validate([
                "new_password" => [
                    "rules" => "required",
                    "errors" => ["required" => "New Password is required"],
                ],
                "con_password" => [
                    "rules" => "required",
                    "errors" => ["required" => "Confirm Password is required"],
                ],
            ]);

            if ($check) {
                $frmdata = mysql_clean($frmdata);

                if ($frmdata["new_password"] == $frmdata["con_password"]) {
                    $update_data = [
                        "update_time" => date("Y-m-d H:i:s"),
                        "update_by" => $session["user_id"],
                        "password" => $frmdata["new_password"],
                    ];
                    $update = $this->curd_model->update_table(
                        "mlm_login",
                        $update_data,
                        ["id" => $frmdata["user_id"]]
                    );
                    if ($update) {
                        $error["success"] = true;
                    } else {
                        $error["message"]["refrence"] =
                            "<p>Error in Update.</p>";
                    }
                } else {
                    $error["message"]["refrence"] = "Password not match.";
                }
            } else {
                foreach ($_POST as $key => $value) {
                    if ($this->validation->hasError($key)) {
                        $error["message"][$key] = $this->validation->getError(
                            $key
                        );
                    }
                }
            }
        }
		else if($action == "update_nominee_info")
		{
            $session = $this->session->get("mlmlogin");
            $check = $this->validate([
                "edt_nominee" => ["rules" => "required","errors" => ["required" => "Name is required"]],
                "edt_nominee_mobile" => ["rules" => "required","errors" => ["required" => "Contact is required"]],
                "edt_relation" => ["rules" => "required","errors" => ["required" => "Relation is required"]],
                "edt_nominee_dob" => ["rules" => "required","errors" => ["required" => "DOB is required"]],
            ]);

            if ($check) {
                $frmdata = mysql_clean($frmdata);
				$update_nominee = array(
				'last_update' => date('Y-m-d H:i:s'),
				'update_by' => $session["user_id"],
				'name' => $frmdata['edt_nominee'],
				'relation' => $frmdata['edt_relation'],
				'dob' => $frmdata['edt_nominee_dob'],
				'contact' => $frmdata['edt_nominee_mobile'],
				);
               $nominee = $this->curd_model->update_table('nominee', $update_nominee,array('id'=>$frmdata['edt_nominee_id']));
				if($nominee)
				{
					$error['success'] = true;
				}
				else{
					$error['message'] = 'error i n update data';
				}
            } else {
                foreach ($_POST as $key => $value) {
                    if ($this->validation->hasError($key)) {
                        $error["message"][$key] = $this->validation->getError(
                            $key
                        );
                    }
                }
            }
        }
		else if($action == "update_member_user_id")
		{
            $check = $this->validate([
                "member_user_id" => ["rules" => "required","errors" => ["required" => "Member Id is required"]] 
            ]);
            if($check)
			{
				$get_member_id = $this->curd_model->get_1('*','mlm_member_id', array('id' => $frmdata['member_user_id']));
				if(isset($get_member_id->id))
				{
					$error['message']['reference'] = 'Member Id already booked';
				}
				else
				{
					if($frmdata['member_user_id'] < 1000)
					{
						$get_member = $this->curd_model->get_1('*','mlm_login', array('id' => $frmdata['user_id']));
						if(isset($get_member->id))
						{
							$get_member_id_detail = $this->curd_model->get_1('*','mlm_member_id', array('member_login_id' => $get_member->id));
							if(isset($get_member_id_detail->id))
							{
								$update_mlm_member_id = array(
									'id' => $frmdata['member_user_id'],
									'status' => 'A',
									'create_time' => date('Y-m-d H:i:s'),
									'update_by' => $session["user_id"],
									'name' => $get_member->f_name . ' ' . $get_member->l_name,
								); 
								
								$update_member = $this->curd_model->update_table('mlm_member_id', $update_mlm_member_id, array('member_login_id' => $get_member->id));
								if($update_member)
								{
									$member_id_ref = '';
									if($frmdata['member_user_id'] < 10) {
										$member_id_ref = 'RD000' . $frmdata['member_user_id'];
									}
									else if($frmdata['member_user_id'] < 100) {
										$member_id_ref = 'RD00' . $frmdata['member_user_id'];
									}
									else{
										$member_id_ref = 'RD0' . $frmdata['member_user_id'];
									}
									$update_member = $this->curd_model->update_table('mlm_login', array('member_user_id' => $member_id_ref), array('id' => $get_member->id));
									if($update_member)
									{
										$error['success'] = true;
									}
									else
									{
										$error['message']['reference'] = 'Error in Update Member Id';
									}
								}
								else
								{
									$error['message']['reference'] = 'Error in Update Member Id';
								}
							}
							else
							{
								$update_mlm_member_id = array(
									'id' => $frmdata['member_user_id'],
									'status' => 'A',
									'create_time' => date('Y-m-d H:i:s'),
									'update_by' => $session["user_id"],
									'member_login_id' => $get_member->id,
									'name' => $get_member->f_name . ' ' . $get_member->l_name,
								); 
								$member_id = $this->curd_model->insert('mlm_member_id', $update_mlm_member_id);
								if($member_id)
								{
									$member_id_ref = '';
									if($frmdata['member_user_id'] < 10) {
										$member_id_ref = 'RD000' . $frmdata['member_user_id'];
									}
									else if($frmdata['member_user_id'] < 100) {
										$member_id_ref = 'RD00' . $frmdata['member_user_id'];
									}
									else{
										$member_id_ref = 'RD0' . $frmdata['member_user_id'];
									}
									$update_member = $this->curd_model->update_table('mlm_login', array('member_user_id' => $member_id_ref), array('id' => $get_member->id));
									if($update_member)
									{
										$error['success'] = true;
									}
									else
									{
										$error['message']['reference'] = 'Error in Update Member Id';
									}
								}
							}
						}
					}
					else
					{
						$error['message']['reference'] = 'User Id must be lessthen 1000.';
					}
				}
				
			} else {
                foreach ($_POST as $key => $value) {
                    if ($this->validation->hasError($key)) {
                        $error["message"][$key] = $this->validation->getError(
                            $key
                        );
                    }
                }
            }
        }
		else if($action == "update_promotion")
		{
			$check = $this->validate([
                "edt_user_key" => ["rules" => "required","errors" => ["required" => "Member Id is required"]],
                "edt_position" => ["rules" => "required","errors" => ["required" => "Member Id is required"]],
                "edt_next_position" => ["rules" => "required","errors" => ["required" => "Member Id is required"]],
                "edt_direct_sale" => ["rules" => "required","errors" => ["required" => "Member Id is required"]],
                "edt_group_sale" => ["rules" => "required","errors" => ["required" => "Member Id is required"]],
                "edt_require_profile" => ["rules" => "required","errors" => ["required" => "Member Id is required"]],
                "edt_profile_count" => ["rules" => "required","errors" => ["required" => "Member Id is required"]],
                "edt_id" => ["rules" => "required","errors" => ["required" => "Member Id is required"]]
            ]);
            if($check)
			{
				$update = array(
					'user_key' => $frmdata['edt_user_key'],
					'last_update' => date('Y-m-d H:i:s'),
					'name' => $frmdata['edt_position'],
					'direct_sale' => $frmdata['edt_direct_sale'],
					'group_sale' => $frmdata['edt_group_sale'],
					'next_profile_id' => $frmdata['edt_next_position'],
					'require_profile' => $frmdata['edt_require_profile'],
					'require_profile_count' => $frmdata['edt_profile_count']
				);
				$update_query = $this->curd_model->update_table("mlm_member_type",$update,array("id"=>$frmdata['edt_id']));
				if($update_query)
				{
					$error['success'] = true;
				}
			}
			else
			{
                foreach($_POST as $key => $value)
				{
                    if($this->validation->hasError($key))
					{
                        $error["message"][$key] = $this->validation->getError($key);
                    }
                }
            }
		}
        echo json_encode($error);
    }
}

?>
