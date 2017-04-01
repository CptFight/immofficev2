<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agences extends MY_Controller {

	public function index() {
		$this->load->view('template', $this->data);
	}

	public function news(){

		if($this->input->post('save') ){
			$this->load->model(array('Agences_m'));
			$agence = array();
			$agence['name'] = $this->input->post('name');

			if($this->Agences_m->insert($agence)){
				$this->addMessage($this->lang->line('insert_done'));
			}
			redirect('agences/index');
		}
		$this->load->view('template', $this->data);
	}

	public function edit(){
		if($this->current_user->role != 'admin'){
			redirect('annonces/index');
		}

		$this->load->model(array('Agences_m'));

		if($this->input->post('save') ){
			$agence = array();
			$agence['id'] = $this->input->post('id');
			$agence['name'] = $this->input->post('name');

			if($this->Agences_m->update($agence)){
				$this->addMessage($this->lang->line('update_done'));
			}
			redirect('agences/index');
		}


		if($this->input->post('delete') ){
			if(!$this->Agences_m->delete($this->input->post('id'))){
				$this->addError($this->lang->line('agences_with_users'));
			}
			redirect('agences/index');
		}

		$this->data['agence'] = $this->Agences_m->get($this->input->get('id'));
		$this->load->view('template', $this->data);
	}

	public function getAllDataTable(){
		$this->load->model(array('Agences_m'));
		
		$return = $this->input->get();
		if(isset($this->input->get('search')['value'])){
			$search = $this->input->get('search')['value'];
		}else{
			$search = false;
		}

		$start = 0;
		$length = 0;

		if($this->input->get('start')){
			$start = $this->input->get('start');
		}

		if($this->input->get('length')){
			$length = $this->input->get('length');
		}

		$order = false;
		if($this->input->get('order')){
			$order = array('column','dir');
			$order['dir'] = $this->input->get('order')[0]['dir'];
			switch($this->input->get('order')[0]['column']){
				case 0:
					$order['column'] = 'name';
					break;
				default:
					$order['column'] = 'name';
					break;
			}
		}

		
		$params = array(
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
		);

		
		$agences = $this->Agences_m->get($params);
	//	echo $this->db->last_query();
		$data = array();

		foreach($agences as $key => $agence){
			$data[] = array(
				$agence->name,
				'<ul class="list-tables-buttons">
                    <li class="table-btn-edit"><a href="'.site_url('agences/edit/?id='.$agence->id).'"><i class="fa fa-pencil"></i><span>Editer agence</span></a></li>
                </ul>'
			);
		}
		$return["recordsTotal"] = count($agences);
		$return["recordsFiltered"] = count($agences);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	
	}
	

}

