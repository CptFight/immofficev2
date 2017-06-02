<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agences extends MY_Controller {

	public function index() {
		if($this->current_user->role_id != 4){
			redirect('annonces/index');
		}
		$this->load->view('template', $this->data);
	}

	public function news(){
		if($this->current_user->role_id != 4){
			redirect('annonces/index');
		}

		if($this->input->post('save') ){
			$this->load->model(array('Agences_m'));
			$agence = array();
			$agence['name'] = $this->input->post('name');
			$agence['adress'] = $this->input->post('adress');
			$agence['price_htva'] = $this->input->post('price_htva');
			$agence['price_tvac'] = $this->input->post('price_tvac');
			$agence['boss_name'] = $this->input->post('boss_name');
			$agence['tel'] = $this->input->post('tel');
			$agence['note'] = $this->input->post('note');
			
			if($this->Agences_m->insert($agence)){
				$this->addMessage($this->lang->line('insert_done'));
			}
			redirect('agences/index');
		}
		$this->load->view('template', $this->data);
	}

	public function edit(){
		if($this->current_user->role_id != 4){
			redirect('annonces/index');
		}

		$this->load->model(array('Agences_m'));

		if($this->input->post('save') ){
			$agence = array();
			$agence['id'] = $this->input->post('id');
			$agence['name'] = $this->input->post('name');
			$agence['adress'] = $this->input->post('adress');
			$agence['price_htva'] = $this->input->post('price_htva');
			$agence['price_tvac'] = $this->input->post('price_tvac');
			$agence['boss_name'] = $this->input->post('boss_name');
			$agence['tel'] = $this->input->post('tel');
			$agence['note'] = $this->input->post('note');
			
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

	public function users(){
		$this->data['agence_id'] = $this->input->get('id');
		$this->load->view('template', $this->data);
	}


	public function edit_param(){
		$this->load->model(array('Agences_m','Status_m'));
		

		$this->data['status_favoris'] = $this->Status_m->getStatus($this->current_user->agence_id,'favoris');
		$this->data['status_owners'] = $this->Status_m->getStatus($this->current_user->agence_id,'owners');
		
		if($this->input->post('save')){

			$agence['id'] = $this->current_user->agence_id;
			$agence['adress'] = $this->input->post('adress');
			$agence['number'] = $this->input->post('number');
			$agence['zipcode'] = $this->input->post('zipcode');
			$agence['city'] = $this->input->post('city');
			$agence['tel'] = $this->input->post('tel');
			
			
			foreach($this->input->post('status_favoris') as $key => $status_favoris){
				if($status_favoris && $status_favoris != ''){
					$status = array();
					$status['agence_id'] = $this->current_user->agence_id;
					$status['name'] = $status_favoris;
					$status['color'] = 'green';
					$status['type'] = 'favoris';
					$this->Status_m->insert($status);
				}
			}

			foreach($this->input->post('status_owners') as $key => $status_owners){
				if($status_owners && $status_owners != ''){
					$status = array();
					$status['agence_id'] = $this->current_user->agence_id;
					$status['name'] = $status_owners;
					$status['color'] = 'green';
					$status['type'] = 'owners';
					$this->Status_m->insert($status);
				}
			}

			if($this->Agences_m->update($agence)){
				$this->addMessage($this->lang->line('update_done'));
			}
			
		}

		$this->data['agence'] = $this->Agences_m->get($this->current_user->agence_id);
		$this->load->view('template', $this->data);
	}
	


	public function getAllDataTable(){
		$this->load->model(array('Agences_m','Users_m'));
		
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
				case 1:
					$order['column'] = 'price_htva';
					break;
				case 2:
					$order['column'] = 'price_tvac';
					break;
				case 3:
					$order['column'] = 'name';
					break;
				default:
					$order['column'] = '';
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
		$all_agences = $this->Agences_m->getAll();
	//	echo $this->db->last_query();
		$data = array();

		foreach($agences as $key => $agence){

			$count_users = count($this->Users_m->getByAgences($agence->id) );

			$data[] = array(
				$agence->name,
				$agence->price_htva,
				$agence->price_tvac,
				$count_users,
				'<ul class="list-tables-buttons">
                    <li class="table-btn-edit"><a href="'.site_url('agences/edit/?id='.$agence->id).'"><i class="fa fa-pencil"></i><span>Editer agence</span></a></li>
                    <li class="table-btn-rappel"><a href="'.site_url('agences/users/?id='.$agence->id).'"><i class="fa fa-user"></i><span>utilisateurs agence</span></a></li>
                </ul>'
			);
		}
		$return["recordsTotal"] = count($all_agences);
		$return["recordsFiltered"] = count($agences);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	
	}


}

