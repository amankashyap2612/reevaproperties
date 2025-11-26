<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class AdminLogin extends BaseController
{
    public function index()
    {
		
		$chk = $this->curd_model->get_1('ip_address', 'allowed_ip', array('status'=>'A', 'ip_address'=>$_SERVER['REMOTE_ADDR']));
		
		if(1 || isset($chk->ip_address))
		{
			if($this->session->has('adminlogin'))
			{
				//return redirect()->back();
				return redirect()->to('web-admin/dashboard');
			}
			$data['allow'] = true;   
			return view('admin/adminlogin',$data);
		}
		else
		{
			$data['allow'] = false;   
			$data['ip'] = $_SERVER['REMOTE_ADDR'];   
			return view('admin/adminlogin',$data);
		}
    }
	
	public function catch_captcha()
	{
		return (generate_captcha());
	}
}

?>