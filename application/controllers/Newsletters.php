<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletters extends MY_Controller {

	private $access_app_infos;
	
	public function index() {
		$this->load->model(array('Newsletters_templates_m'));
		
		$templates = $this->Newsletters_templates_m->getTemplates($this->current_user->id,$this->current_user->lang);
		$templates = array_merge($templates,$this->Newsletters_templates_m->getDefaultTemplates($this->current_user->lang));

	
		$this->data['templates'] = $templates;

		$this->load->view('template', $this->data);

	}

	public function new_template(){
		if($this->input->post('save') ){
			$this->load->model(array('Newsletters_templates_m'));

			$data = array();
			$data['title'] = $this->input->post('title');
			$data['value'] = $this->input->post('value');
			$data['user_id'] = $this->current_user->id;
			$data['lang'] = $this->current_user->lang;
			$data['defaut'] = false;
			$data['subject'] = $this->input->post('subject');
			$data['bcc'] = $this->input->post('bcc');
			$data['cc'] = $this->input->post('cc');
			if($this->Newsletters_templates_m->insert($data)){
				$this->addMessage($this->lang->line('insert_done'));
			}else{
				$this->addError($this->lang->line('insert_error'));
			}
			redirect('newsletters/index');
		}

		$this->load->view('template', $this->data);
	}

	public function edit_template(){
		if($this->input->get('id')){
			$id = $this->input->get('id');
			$this->load->model(array('Newsletters_templates_m'));

			if($this->input->post('delete') ){
				$this->Newsletters_templates_m->delete($id);
				redirect('newsletters/index');
			}

			if($this->input->post('save') ){
				$data = array();
				$data['id'] = $this->input->post('id');
				$data['title'] = $this->input->post('title');
				$data['value'] = $this->input->post('value');
				$data['subject'] = $this->input->post('subject');
				$data['bcc'] = $this->input->post('bcc');
				$data['cc'] = $this->input->post('cc');
				if($this->Newsletters_templates_m->update($data)){
					$this->addMessage($this->lang->line('update_done'));
				}else{
					$this->addError($this->lang->line('update_error'));
				}
				redirect('newsletters/index');
			}


			$template = $this->Newsletters_templates_m->get($id);

			if($template->defaut == 1){
				$data = [];
				$data['lang'] = $template->lang;
				$data['title'] = $template->title;
				$data['user_id'] = $this->current_user->id;
				$data['value'] = $template->value;
				$data['defaut'] = false;
				$id = $this->Newsletters_templates_m->insert($data);
				redirect('newsletters/edit_template?id='.$id);
			}

			$this->data['template'] = $template;

			$this->load->view('template', $this->data);
		}else{
			redirect('newsletters/index');
		}
	}

	public function liste(){
		if($this->current_user->role_id != 4){
			redirect('newsletters/index');
		}

		$this->config->load('mailchimp');
		$this->config->set_item('api_key', '668d471947686d8d637d9ad2d9db15ee-us9');

		$this->load->view('template', $this->data);
	}

	public function view(){
		if($this->current_user->role_id != 4){
			redirect('newsletters/index');
		}

		if($this->input->get('id')){
			$this->load->library('Mailchimp');
			$campaign_id = $this->input->get('id');

			$user_data = $this->session->get_userdata();

			if(!isset($user_data['campaigns']) || !$user_data['campaigns']){
				redirect('templatechoice');
			}else{
				$this->data['html'] = $user_data['campaigns'][$campaign_id]['content']['html'];
			}
		}else{
			$this->data['html'] = 'No result';
		}

		$this->load->view('template_empty', $this->data);
	}

	public function templatechoice() {
		if($this->current_user->role_id != 4){
			redirect('newsletters/index');
		}

		if($this->input->post('save') ){
			$this->load->model(array('Newsletters_m'));
				
			$newsletter = array();
			$newsletter['agence_id'] = $this->current_user->agence_id;
			$newsletter['template_id'] = $this->input->post('template_id');

			$user_data = $this->session->get_userdata();
			if(isset($user_data['campaigns']) || !$user_data['campaigns']){
				$newsletter['html']= $user_data['campaigns'][$newsletter['template_id']]['content']['html'];
			}

			$newsletter_id = $this->Newsletters_m->insert($newsletter);
			redirect('newsletters/infos?id='.$newsletter_id);
		}


		$user_data = $this->session->get_userdata();
		//$user_data = false;
		if(!isset($user_data['campaigns']) || !$user_data['campaigns']){
			$this->load->library('Mailchimp');

            $campaigns 	= $this->mailchimp->call('GET', 'campaign-folders',array('Name' => '826491785515') );
            if(!isset($campaigns['folders'])){
            	$this->addMessage($this->lang->line('newsletter_no_folders'));
            	redirect('newsletters/index');
            }


            $folder = $campaigns['folders'][0];
            $campaigns 	= $this->mailchimp->call('GET', 'campaigns',array('folder_id' => $folder['id']) );

            
            $campaigns_set = array();
			foreach($campaigns['campaigns'] as $key => $campaign){
				$campaigns_set[$campaign['id']]['content'] = $this->mailchimp->call('GET', '/campaigns/'.$campaign['id'].'/content', array() );
				$campaigns_set[$campaign['id']]['url'] = site_url('newsletters/view/?id='.$campaign['id']); 
			}	

            $this->session->set_userdata('campaigns', $campaigns_set);
            $this->data['campaigns'] = $campaigns_set;
        }else{
        	$this->data['campaigns'] = $user_data['campaigns'];
        }

      	$this->load->view('template', $this->data);

	}

	public function infos() {
		if($this->current_user->role_id != 4){
			redirect('newsletters/index');
		}

		$newsetter_id = $this->input->get('id');
		if(!$newsetter_id){
			redirect('newsletters/index');
		}

		if($this->input->post('save') ){
			$this->load->model(array('Newsletters_m'));
				
			$newsletter = array();
			$newsletter['id'] = $newsetter_id;
			$newsletter['name'] = $this->input->post('name');
			$newsletter['subject'] = $this->input->post('email_subject');
			$newsletter['sender_name'] = $this->input->post('from_name');
			$newsletter['sender_adress'] = $this->input->post('from_email_adress');
			if($this->Newsletters_m->update($newsletter)){
				redirect('newsletters/template?id='.$newsetter_id);
			}	
		}

		$this->load->view('template', $this->data);
	}

	public function template() {
		if($this->current_user->role_id != 4){
			redirect('newsletters/index');
		}

		$newsetter_id = $this->input->get('id');
		if(!$newsetter_id){
			redirect('newsletters/index');
		}

		$this->load->model(array('Newsletters_m'));
		$newsletter = $this->Newsletters_m->get($newsetter_id);
		if(!$newsletter){
			redirect('newsletters/index');
		}
		$this->data['newsletter'] = $newsletter;


		$campaign_id = $newsletter->template_id;
		$user_data = $this->session->get_userdata();
		if(isset($user_data['campaigns']) || !$user_data['campaigns']){
			$this->data['html'] = $user_data['campaigns'][$campaign_id]['content']['html'];
		}else{
			redirect('newsletters/index');
		}

		$this->load->view('template', $this->data);
	}

	public function rapport() {
		if($this->current_user->role_id != 4){
			redirect('newsletters/index');
		}

		$this->load->view('template', $this->data);

	}

	
	

}

