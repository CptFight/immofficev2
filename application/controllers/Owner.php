<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends MY_Controller {

	public function index() {
		$this->load->model(array('Owners_m'));
		$this->data['owners'] = $this->Owners_m->getByAgence($this->current_user->agence_id);
		$this->load->view('template', $this->data);
	}

	public function edit(){
		if(!$this->input->get('id')){
			redirect('owner/index');
		}
		$this->load->model(array('Owners_m','Status_m'));


		if($this->input->post('delete') ){
			$id = $this->input->post('id');
			if($this->Owners_m->delete($id)){
				$this->addMessage($this->lang->line('delete_done'));
			}else{
				$this->addError($this->lang->line('owner_associated'));
			}
			redirect('owner/index');
		}

		if($this->input->post('save') ){
		
			$owner = array();
			$owner['name'] = $this->input->post('name');
			$owner['tel'] = $this->input->post('tel');
			$owner['status_id'] = $this->input->post('owner_status');
			$owner['email'] = $this->input->post('email');
			$owner['note'] = $this->input->post('note');
			$owner['id'] = $this->input->post('id');
			if($this->Owners_m->update($owner)){
				$this->addMessage($this->lang->line('update_done'));
				redirect('owner/index');
			}
		}




		$this->data['owners_status'] = $this->Status_m->getStatus($this->current_user->agence_id,'owners');
		$this->data['owner'] = $this->Owners_m->get($this->input->get('id'));
		$this->load->view('template', $this->data);
	}


	public function news(){
		
		$this->load->model(array('Owners_m','Status_m'));

		if($this->input->post('save') ){
		
			$owner = array();
			$owner['name'] = $this->input->post('name');
			$owner['tel'] = $this->input->post('tel');
			$owner['agence_id'] = $this->current_user->agence_id;
			$owner['status_id'] = $this->input->post('owner_status');
			$owner['email'] = $this->input->post('email');
			$owner['note'] = $this->input->post('note');

			if($this->Owners_m->insert($owner)){
				$this->addMessage($this->lang->line('insert_done'));
				redirect('owner/index');
			}
		}

		$this->data['owners_status'] = $this->Status_m->getStatus($this->current_user->agence_id,'owners');
		$this->data['owner'] = $this->Owners_m->get($this->input->get('id'));
		$this->load->view('template', $this->data);
	}

}
