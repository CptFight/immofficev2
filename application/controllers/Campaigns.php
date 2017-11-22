<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Campaigns extends MY_Controller {

	private $access_app_infos;
	
	public function index() {
		
		$this->load->library('Mailchimp');

	

		//$this->access_app_infos = $this->mailchimp->call('POST', '/authorized-apps',array('client_id' => '826491785515','client_secret' => 'fcb2e01df7b588293fd812050663d9e794b07f3323edd18325') );
		

		$campaigns = $this->session->get_userdata('campaigns');
        if(!$campaigns || !isset($campaigns['campaigns']) ){
            $campaigns 	= $this->mailchimp->call('GET', 'campaign-folders',array('Name' => '826491785515') );

            $folder = $campaigns['folders'][0];
            $campaigns 	= $this->mailchimp->call('GET', 'campaigns',array('folder_id' => $folder['id']) );

            $this->session->set_userdata('campaigns', $campaigns);
        }else{
        	//print_r("YESS");
            $campaigns = $campaigns['campaigns'];
           
        }

			
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

