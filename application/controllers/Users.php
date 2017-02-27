<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function login() {
		$this->session->unset_tempdata('user');
		$this->load->model(array('Users_m'));
		if($this->input->post('send-login')) {
			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$user = $this->Users_m->login($login,$password);
			if($user){
				$this->session->set_userdata('user', $user);
				redirect('/annonces/index');
				die();
			}else{
				
			}
		}		
		$this->load->view('template_landing');
	}

	public function news(){
		if($this->input->post('save') ){
			$user = array();

			$user['login'] = $this->input->post('email');
			$user['password'] = md5($this->input->post('password'));
			$user['lang'] = $this->input->post('lang');
			$user['search_price_min'] = '';
			$user['search_price_max'] = '';
			$user['search_provinces'] = '';
			$user['search_zipcodes'] = '';
			$user['search_lang'] = '';
			$user['search_sell'] = '';
			$user['search_date'] = '';
			$user['name'] = $this->input->post('name');
			$user['firstname'] = $this->input->post('firstname');
			$user['agence'] = $this->input->post('agence');
			$user['adress'] = $this->input->post('adress');
			$user['tel'] = $this->input->post('tel');
			$user['owner_email'] = $this->input->post('owner_email');
			$user['owner_commercial'] = $this->input->post('owner_commercial');
			$user['owner_name'] = $this->input->post('owner_name');
			$user['price_htva'] = $this->input->post('price_htva');
			$user['price_tvac'] = $this->input->post('price_tvac');
			
			$this->Users_m->createUser($user);
		}

		$this->load->view('template', $this->data);
	}

	public function edit(){
		
	}
	
	public function lock() {
		$this->load->view('user');
	}


	

	public function logout() {
		$this->session->session_destroy();
		redirect('users/login');
	}

	//AJAX
	public function updateFavoris(){
		$this->load->model(array('Favoris_m','Annonces_m') );
		$user_id = $this->input->post('user_id');
		$annonce_id = $this->input->post('annonce_id');
		$add = $this->input->post('add');
		if($add == 'true'){
			$annonce = $this->Annonces_m->get($annonce_id);
			$this->Favoris_m->addAnnonceInFavoris($user_id,$annonce);
		}else{
			$this->Favoris_m->removeAnnonceFromFavoris($user_id,$annonce_id);
		}
		
	}

	public function updateRappels(){
		$this->load->model(array('Rappels_m','Favoris_m','Annonces_m') );
		$user_id = $this->input->post('user_id');
		$annonce_id = $this->input->post('annonce_id');
		$favoris_id = $this->input->post('favoris_id');

		if(!$favoris_id){
			$favoris = $this->Favoris_m->getByUserAnnonceId($user_id,$annonce_id);
			if(!$favoris){
				$annonce = $this->Annonces_m->get($annonce_id);
				$this->Favoris_m->addAnnonceInFavoris($user_id,$annonce);
			}
			$favoris = $this->Favoris_m->getByUserAnnonceId($user_id,$annonce_id);
			$favoris_id = $favoris->id;
		}

		$date_rappel = strtotime('tomorrow');
		$add = $this->input->post('add');
		if($add == 'true'){
			$this->Rappels_m->addRappel($user_id,$favoris_id,$date_rappel);
		}else{
			$this->Rappels_m->removeRappel($user_id,$favoris_id);
		}
		
	}
	
	public function saveLastSearch(){
		$this->load->model(array('Users_m'));
		$user_id = $this->input->post('user_id');
		$datas = array();
		$datas['price_min'] = $this->input->post('price_min');
        $datas['price_max'] = $this->input->post('price_max');
        $datas['province'] = $this->input->post('province');
        $datas['zipcode'] = $this->input->post('zipcode');
        $datas['lang'] = $this->input->post('lang');
        $datas['vente'] = $this->input->post('vente');
        $datas['daterange'] = $this->input->post('daterange');
		$this->Users_m->saveLastSearch($user_id,$datas);
	}

	public function getListIdFavorisRappel(){
		$this->load->model(array('Rappels_m','Users_m','Favoris_m'));
		$user_id = $this->input->post('user_id');

		$favoris = $this->Favoris_m->getFavorisAnnoncesIds($user_id);
		$rappels = $this->Rappels_m->getRappelsAnnoncesIds($user_id);
		$result = array(
			'favoris' => $favoris,
			'rappels' => $rappels
		);
		echo json_encode($result);
	}
}
