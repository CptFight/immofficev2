<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Campains extends MY_Controller {

	
	public function index() {
		
		$this->load->library('Mailchimp');

		$campaigns 	= $this->mailchimp->call('GET', 'campaign-folders',array('Name' => 'Honesty') );
		
		$folder = $campaigns['folders'][0];

		$campaigns 	= $this->mailchimp->call('GET', 'campaigns',array('folder_id' => $folder['id']) );
			
		$this->data['campaigns'] = array();
		foreach($campaigns['campaigns'] as $key => $campaign){
			$this->data['campaigns'][$key]['content'] = $this->mailchimp->call('GET', '/campaigns/'.$campaign['id'].'/content', array() );
		}		
		
		$this->load->view('template', $this->data);

	}

	
	

}

