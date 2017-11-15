<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends MY_Controller {

	
	public function index() {
		
		$this->load->library('Mailchimp');

		$campaigns 	= $this->mailchimp->call('GET', 'campaign-folders',array('Name' => 'Honesty') );
		
		$folder = $campaigns['folders'][0];

		$campaigns 	= $this->mailchimp->call('GET', 'campaigns',array('folder_id' => $folder['id']) );
			
		$this->data['campaigns'] = array();
		foreach($campaigns['campaigns'] as $key => $campaign){
			$this->data['campaigns'][$key]['content'] = '';//$this->mailchimp->call('GET', '/campaigns/'.$campaign['id'].'/content', array() );
			$this->data['campaigns'][$key]['url'] = site_url('campaigns/view/?id='.$campaign['id']); 
		}		
		
	
		$this->load->view('template', $this->data);

	}

	public function view(){
		if($this->input->get('id')){
			$this->load->library('Mailchimp');
			$campaign_id = $this->input->get('id');
			$value = $this->mailchimp->call('GET', '/campaigns/'.$campaign_id.'/content', array() );
			$this->data['html'] = $value['html'];
		}else{
			$this->data['html'] = 'No result';
		}


		
		$this->load->view('template_empty', $this->data);
	}

	
	

}

