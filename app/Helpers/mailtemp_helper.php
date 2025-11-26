<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
	
if(!function_exists('iti_registration_form_check'))
{
    function contact_us($contact,$id)
    {
        $msg = '
         <html>
            <head></head>
            <body>
                <div style="background: #efefef; padding: 0 15%;">
                    <div style="background: #fff; padding: 5px 3%;">
                        <div>
                        <div style="display: inline;text-align:center;">
                            <img src="https://reevadeveloperspvtltd.com/assets/images/Reeva_Developers.png"/>
                        </div>
                        </div>
                        <hr style="height: 10px;background-color: black;border: none;">
						<div>
                            <h3 style="text-align: center;">Reeva Developer Pvt Ltd.</h3>
                            <p>Dear '.$contact['name'].',</p>
                            <p>Thank you for your interest in Reeva Developer. Your feedback and inquiries are important to us. Please do not hesitate to get in touch using the contact information provided below: </p>
							<p>Nahri Gaon Narela</p> 
							<p>8800885758,8750885758 </p> 
                            <br>
                            <br>
                            <p style="margin: 2px 0;">Reeva Developer Pvt Ltd.</p> 
                        </div> 
                    </div>
                    
                    <div style="text-align: center; padding: 3%; font-family: monospace;">
                        <p style="font-size: 10px; margin: 0px;">© ' . date('Y') . ' Consultant. All right reserved. Developed by PCTIL.</p>
                        <p style="font-size: 10px; margin: 0px;">PLEASE DO NOT PRINT THIS EMAIL TO SAVE ENVIRONMENT</p>
                    </div>
                </div>
            </body>
        </html>
        ';
        return $msg;
    }
}
if (!function_exists('mlm_user')) {
    function mlm_user($user)
    {
        $msg = '
        <html>
            <head></head>
            <body>
                <div style="background: #efefef; padding: 0 15%;">
                    <div style="background: #fff; padding: 5px 3%;">
                        <div style="display: inline; text-align: center;">
                            <img  width="100%" src="https://reevadeveloperspvtltd.com/assets/images/Reeva_Developers.png" alt="Reeva Developers Logo"/>
                        </div>
                        <hr style="height: 10px; background-color: black; border: none;">
                        <div>
                            <h3 style="text-align: center;">Reeva Developer Pvt Ltd.</h3>
                            <p>Dear '.$user['f_name'].',</p>
                            <p>We\'re thrilled to inform you that your registration with Reeva Developers Pvt Ltd. was successful! Welcome to our community.</p>
							<p>Your account has been created, and you are now part of our platform. Here are your login details:</p>
							<ul>
								<li>Email:- '.$user['email_id'].' </li>
								<li>Password:- '.$user['password'].'</li>
							</ul>
							<p>Thank you for choosing Reeva Developer Pvt Ltd. We look forward to serving you.</p>
                            <p>Best regards</p>
                            <p>Reeva Developer Pvt Ltd.</p>
                            <p>Nahri Gaon Narela</p>
                            <p>8800885758, 8750885758 </p>
                            <br>
                            <br>
                            <p style="margin: 2px 0;">Reeva Developer Pvt Ltd.</p>
                        </div>
                    </div>

                    <div style="text-align: center; padding: 3%; font-family: monospace;">
                        <p style="font-size: 10px; margin: 0px;">© ' . date('Y') . ' Consultant. All rights reserved. Developed by PCTIL.</p>
                        <p style="font-size: 10px; margin: 0px;">PLEASE DO NOT PRINT THIS EMAIL TO SAVE THE ENVIRONMENT</p>
                    </div>
                </div>
            </body>
        </html>
        ';
        return $msg;
    }
}

if (!function_exists('mlm_user_birthday')) {
    function mlm_user_birthday($name, $dob)
    {
        $msg = '
        <html>
            <head></head>
            <body>
                <div style="background: #efefef; padding: 0 15%;">
                    <div style="background: #fff; padding: 5px 3%;">
                        <div style="display: inline; text-align: center;">
                            <img  width="100%" src="https://reevadeveloperspvtltd.com/assets/images/Reeva_Developers.png" alt="Reeva Developers Logo"/>
                        </div>
                        <hr style="height: 10px; background-color: black; border: none;">
                        <div>
                            <h3 style="text-align: center;">Happy Birthday '.$name.'</h3>
                            Dear "'.$name.'",
							Happy Birthday! 🎉🎂 We hope this special day brings you joy, laughter, and wonderful memories.
							On behalf of the entire Reeva Developer  family, I want to take a moment to express our gratitude for your continued support and dedication to our mission. Your enthusiasm and commitment inspire us every day.
							<p>Best regards</p>
							<p>Reeva Developer Pvt Ltd.</p>
							<p>Nahri Gaon Narela</p>
							<p>8800885758, 8750885758 </p>
						</div>
					</div>
					<div style="text-align: center; padding: 3%; font-family: monospace;"> 
						<p style="font-size: 10px; margin: 0px;">PLEASE DO NOT PRINT THIS EMAIL TO SAVE THE ENVIRONMENT</p>
					</div>
				</div>
			</body>
		</html>
        ';
        return $msg;
    }
}

 


?>