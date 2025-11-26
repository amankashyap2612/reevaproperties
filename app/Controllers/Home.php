<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
		$data['get_project'] = $this->curd_model->get_all('*','project', array('status'=>'A'),'name','ASC');
		
		$data['project'] = $this->curd_model->get_all('*','project', array(),'id','ASC');
		$data['home_slider'] = $this->curd_model->get_all('*','home_slider', array('status'=>'A'),'id','ASC');
		$data['near_location'] = $this->curd_model->get_all('*','near_location',array('status'=>'A'),'id','ASC');
		
		$data['get_location'] = $this->curd_model->customquery1('SELECT DISTINCT `distance` AS `dist`, `resource` AS `res` FROM near_location;', array());
		
		// echo "<pre>";
		// print_r($data['get_location'] );
		// echo "</pre>";
		// exit;

		$image = $this->curd_model->get_all('*','images',array('status'=>'A'),'id','ASC');
		foreach($image as $img)
		{
			$data['image'][$img->id] = $img->location;
		}
		$data['feature'] = $this->curd_model->get_all('*','features',['status'=>'A'],'id', 'ASC');
		$data['facility'] = $this->curd_model->get_all('*','facility',['status'=>'A'],'id', 'DESC');
        return view('front/home', $data);
    }
}
