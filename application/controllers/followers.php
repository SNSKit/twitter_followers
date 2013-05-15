<?php ;
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Followers extends CI_Controller 
{
	function followers()
	{	
		parent::__construct();
		//$this->load->model("user_model");
	}	
	function follow()
	{			
		$this->load->view('put_followers');
	}
	
	function getFollowers()
	{
		$tabledata = array();		
		$scr_name = $this->input->post('handleText');
		
		$data = json_decode(file_get_contents('https://api.twitter.com/1/users/lookup.json?screen_name='.$scr_name), true);
		$handle_foll_num =  $data[0]['followers_count'];
		
		
		$trends_url = "http://api.twitter.com/1/statuses/followers/"."$scr_name".".json";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $trends_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$curlout = curl_exec($ch);
		curl_close($ch);
		$response = json_decode($curlout, true);
		$i = 1;
		
		//$datas = array ("data"=>array());
		
		foreach($response as $friends){
			$thumb = $friends['profile_image_url'];
			$url = $friends['screen_name'];
			$name = $friends['name'];
		
			$data = json_decode(file_get_contents('https://api.twitter.com/1/users/lookup.json?screen_name='.$url), true);
			$foll_num =  $data[0]['followers_count'];
			
		$datas['data'][$i]['name'] = $name;
		$datas['data'][$i]['foll_num'] = $foll_num;
		$datas['data'][$i]['screen_name'] = $url;
		$datas['data'][$i]['profile_image_urls'] = $thumb;
		//handler  information
		$datas['data'][$i]['scr_name'] = $scr_name;
		$datas['data'][$i]['handle_foll_num'] = $handle_foll_num;
		
		//$datas =  "<div><a title='" . $name ." has ". $foll_num ." Follwers " . "' href='http://www.twitter.com/" . $url . "'>" . "<img src='" . $thumb . "' '".$size." ' /></a></div>";
		$i++;
		}
			//echo "<pre>";
			//print_r($datas);	
		$this->load->view('put_followers',$datas);
		
		
		
		
		
	}
}

