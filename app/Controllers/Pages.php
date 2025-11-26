<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function view($url = ""): string
    {
        $url = explode('.', $url);
		$other_page = false;
        $data = array();
		
        if($url[0] == 'about_us')
		{
            $other_page = true;
			$contact = $this->curd_model->get_all('*','project', array(),'id','ASC');
        }
		else if($url[0] == 'search')
		{
            $price = isset($_GET['price_range'])?$_GET['price_range']:'';
            $area_range = isset($_GET['property_area'])?$_GET['property_area']:'';
            $data['location'] = isset($_GET['location'])?$_GET['location']:'';
            $data['block'] = isset($_GET['block'])?$_GET['block']:'';
            $data['area'] = isset($_GET['area'])?$_GET['area']:'';
            $data['project'] = isset($_GET['project'])?$_GET['project']:''; 

            $project_filter = ($data['project'] != "") ? ' AND `project_id` = "' . $data['project'] . '" ' : '';
            $area_filter = ($data['area'] != "") ? ' AND `size_gaj` = "' . $data['area'] . '" ' : '';
            $block_filter = ($data['block'] != "") ? ' AND `block` = "' . $data['block'] . '" ' : '';

            $data['search_data'] = $this->curd_model->customquery1('select * from property where `id` >=0  '.$project_filter.$area_filter.$block_filter.' order by `plot_no` ASC ', array()); 
			
			$data['get_project'] = $this->curd_model->get_all('*','project', array('status'=>'A'),'name','ASC');
			if($data['project'] != "")
			{
				$data['get_blocks'] = $this->curd_model->customquery1('SELECT DISTINCT(`block`) AS `blocks` FROM `property` WHERE `project_id` LIKE ?', array($data['project']));
			}
			if($data['project'] != "" && $data['block'] != "")
			{
				$data['size_name'] = $this->curd_model->customquery1('SELECT DISTINCT(`size_gaj`) AS `size` FROM `property` WHERE `project_id` LIKE ? AND `block` LIKE ?', array($data['project'],$data['block']));
			}
			$other_page = true;
        }
		else if($url[0]=='contact' || $url[0]=='vision' || $url[0]=='listing' || $url[0]=='services' || $url[0]=='property' || $url[0]=='facility')
		{
			$other_page = true; 
		}

        $data['page_info'] = $this->curd_model->get_1('*','web_pages', array('page_url'=>$url[0],'status'=>'A'));
		if(isset($data['page_info']->id) && $data['page_info']->id > 0)
		{
			$data['url'] = $url[0];
			$settings = $this->curd_model->get_all('*', 'web_settings', array('status'=>'A'), 'id', 'ASC');
			foreach($settings as $set)
			{
				$data['settings'][$set->name] = $set->value;
			}
			 
			if($other_page)
			{
				return view('front/'.$url[0],$data);
			}
			else
			{
				return view('front/default-page',$data);
			}
		}
		else
		{
			$data['message'] = "404 Page not found.";
			return view('errors/html/error_404',$data);
		}
    }
	
	public function gallery($id)
	{
		$id =	data_decode($id);
		$data['gallery'] = $this->curd_model->get_all('*','gallery', array('status'=>'A','project_id'=>$id),'id','DESC');
		$image = $this->curd_model->get_all('*','images',array('status'=>'A'),'id','ASC');
		foreach($image as $img)
		{
			$data['image'][$img->id] = $img->location;
		}
		return view('front/gallery',$data);
	}
}
