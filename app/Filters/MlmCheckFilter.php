<?php

namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\CurdModel;

class MlmCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('mlmlogin'))
        {
            return redirect()->to('/members.html');
        }
        else
        {
			
            if(session()->has('mlmlogin'))
            {
                $this->curd_model = new CurdModel;
                $data['session'] = session()->get('mlmlogin');
                $user = $this->curd_model->get_1('*', 'mlm_login', array('id'=>$data['session']['user_id']));
                if($user->session_id ==  $data['session']['login_id'])
                {
					
					$this->curd_model->update_mlm_session();
                }
                else
                {
                    session()->remove('mlmlogin');
                    return redirect()->to('/members.html');
                }
                
            }
            else
            {
                return redirect()->to('/members.html');
            }
            
        }
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}

?>