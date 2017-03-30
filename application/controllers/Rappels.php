<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rappels extends MY_Controller {

	public function index() {
		$this->load->view('template', $this->data);
	}

	public function calendar() {
		
		$this->load->view('template', $this->data);
	}

	public function edit(){
		if(!isset($_GET['id']) || $_GET['id'] == ''){
			redirect('rappels/index');
		}else{		
			$this->load->model(array('Rappels_m'));
			
			if($this->input->post('delete') ){
				$id = $this->input->post('id');
				$this->Rappels_m->delete($id);
				redirect('rappels/index');
			}

			if($this->input->post('save') ){
				$rappel = array();
				$rappel['id'] = $this->input->post('id');
				$rappel['tags'] = $this->input->post('tags');
				$date_rappel = str_replace('/', '-', $this->input->post('date_rappel') );
				$rappel['date_rappel'] = strtotime( $date_rappel );

				
				$this->Rappels_m->update($rappel);
				redirect('rappels/index');
			}
			$this->data['rappel'] = $this->Rappels_m->get($_GET['id']);
			$this->load->view('template', $this->data);
		}
	}

	//AJAX 
	public function getAllRappelsDataTable(){
		$this->load->model(array('Rappels_m'));
		
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

		if($this->input->get('user_id')){
			$user_id = $this->input->get('user_id');
		}

		$order = false;
		if($this->input->get('order')){
			$order = array('column','dir');
			$order['dir'] = $this->input->get('order')[0]['dir'];
			switch($this->input->get('order')[0]['column']){
				case 0:
					$order['column'] = 'title';
					break;
				case 1:
					$order['column'] = 'zip_code';
					break;
				case 2:
					$order['column'] = 'price';
					break;
				case 3:
					$order['column'] = 'web_site';
					break;
				case 4:
					$order['column'] = 'date_rappel';
					break;
				case 5:
					$order['column'] = 'title';
					break;
				case 6:
					$order['column'] = 'title';
					break;
				
				default:
					break;
			}
		}

		$params = array(
			"id" => false,
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"user_id" => $user_id
		);

		
		$rappels = $this->Rappels_m->get($params);
		$data = array();

		foreach($rappels as $key => $rappel){
			$data[] = array(
				$rappel->title,
				$rappel->zip_code,
				$rappel->price.' €',
				$rappel->web_site,
				date('d/m/Y',$rappel->date_rappel),
				'<ul class="list-tables-buttons list-rappel" data-rappel_id="'.$rappel->id.'">
	 				<li class="table-btn-link"><a target="_blank" href="'.$rappel->url.'"><i class="fa fa-external-link"></i><span>Voir le site</span></a></li>
                    <li class="table-btn-edit"><a href="'.site_url('favoris/edit/?id='.$rappel->favoris_id.'&back_path=rappels/index&view=rappel').'"><i class="fa fa-pencil"></i><span>Editer le favoris</span></a></li>
                </ul>',
                $rappel->id,
                "<span class='historic_price'>".$rappel->price."</span>",
                "<span class='historic_publications'>".date('d/m/Y',$rappel->date_publication)."</span>",
                $rappel->adress,
                $rappel->province,
                $rappel->city,
              	$rappel->description,
				"<a href='".$rappel->url."'>".$rappel->url."</a>"
			);
		}

		$return["recordsTotal"] = $this->Rappels_m->countAllDatas();
		$return["recordsFiltered"] = $this->Rappels_m->countDataLastRequest($params);
		
		$return["data"] = $data;

		echo json_encode($return);
	}

	public function update(){
		$rappel_id = false;
		$new_date = false;
		if($this->input->post('new_date')){
			$new_date = $this->input->post('new_date');
		}
		if($this->input->post('rappel_id')){
			$rappel_id = $this->input->post('rappel_id');
		}
		if(!$new_date || !$rappel_id) return;

		$this->load->model(array('Rappels_m'));
		$rappel = array(
			'id' => $rappel_id,
			'date_rappel' => $new_date
		);
		echo $this->Rappels_m->update($rappel);
	}

	public function getEventsJson() {
		$this->load->model(array('Rappels_m'));

		$start = 0;
		$end = 0;
		$user_id = 0;
		if($this->input->get('start')){
			$start = strtotime($this->input->get('start'));
		}
		if($this->input->get('end')){
			$end = strtotime($this->input->get('end'));
		}

		if($this->input->get('user_id')){
			$user_id = $this->input->get('user_id');
		}

		//start
        $rappels = $this->Rappels_m->getRappelsBetween($user_id,$start,$end);
        $eventsJson = array();
        foreach ($rappels as $key => $rappel) {
            $eventsJson[] = array(
                'id' => $rappel->id,
                'title' => $rappel->title,
                'url' => site_url('favoris/edit/?id='.$rappel->favoris_id.'&back_path=rappels/calendar&view=rappel'),
                'start' => date("Y-m-d H:i:s",$rappel->date_rappel),
                'test' => $rappel->date_rappel
            );
        }
        echo json_encode($eventsJson);
    }

}

