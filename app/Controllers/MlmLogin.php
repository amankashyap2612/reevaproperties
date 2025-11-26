<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class MlmLogin extends BaseController
{
    public function index()
    {
		$chk = $this->curd_model->get_1('ip_address', 'allowed_ip', array('status'=>'A', 'ip_address'=>$_SERVER['REMOTE_ADDR']));
		
		if(1 || isset($chk->ip_address))
		{
			if($this->session->has('mlmlogin'))
			{
				//return redirect()->back();
				return redirect()->to('members/dashboard.html');
			}
			else
			{
				$data['allow'] = true;  		
				return view('mlm/mlmlogin',$data);
			}
		}
		else
		{
			$data['allow'] = false;   
			$data['ip'] = $_SERVER['REMOTE_ADDR'];   
			return view('mlm/mlmlogin',$data);
		}
    }
	
	public function client()
    {
		
		$chk = $this->curd_model->get_1('ip_address', 'allowed_ip', array('status'=>'A', 'ip_address'=>$_SERVER['REMOTE_ADDR']));
		
		if(1 || isset($chk->ip_address))
		{
			if($this->session->has('clientlogin'))
			{
				//return redirect()->back();
				return redirect()->to('client-admin/dashboard');
			}
			$data['allow'] = true;  		
			return view('client/clientlogin',$data);
		}
		else
		{
			$data['allow'] = false;   
			$data['ip'] = $_SERVER['REMOTE_ADDR'];   
			return view('mlm/mlmlogin',$data);
		}
    }
	public function catch_captcha()
	{
		return (generate_captcha());
	}
}

?>