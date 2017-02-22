<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function login() {
		//$this->session->session_destroy();
		//session_destroy();
		$this->session->unset_tempdata('user');
		$this->load->model(array('Users_m'));

		if($this->input->post('send-login')) {

			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$user = $this->Users_m->login($login,$password);
			if($user){
				$this->session->set_userdata('user', $user);
				/*$this->input->set_cookie('logged', true, 60 * 60 * 24* 365);
				$this->input->set_cookie('user', 1, 60 * 60 * 24* 365);*/
				redirect('/annonces/index');
				die();
			}else{
				
			}
		}		
		$this->load->view('template_landing');
	}

	public function news(){
		$this->load->model(array('Users_m'));
		$user = $this->Users_m->getCurrentUser();
		$this->data['user'] = $user;
		$this->data['user_id'] = $user->id;
		$this->lang->load('global', $user->lang);
		$this->data['pagename'] = "users";

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
		if(!isset($_GET['id']) || $_GET['id'] == ''){
			redirect('users/new');
		}else{		
			$this->load->model(array('Users_m'));
			$user = $this->Users_m->getCurrentUser();

			$this->data['user_id'] = $user->id;
			$this->lang->load('global', $user->lang);

			if($this->input->post('save') ){
				$favoris = array();
				$favoris['id'] = $this->input->post('id');
				$favoris['tags'] = $this->input->post('tags');
				$favoris['title'] = $this->input->post('title');
				$date_publication = str_replace('/', '-', $this->input->post('date_publication') );
				$favoris['date_publication'] = strtotime( $date_publication );
				$favoris['price'] = $this->input->post('price');
				$favoris['url'] = $this->input->post('url');
				$favoris['web_site'] = $this->input->post('web_site');
				$favoris['adress'] = $this->input->post('adress');
				$favoris['city'] = $this->input->post('city');
				$favoris['zip_code'] = $this->input->post('zip_code');
				$favoris['province'] = $this->input->post('province');
				$favoris['living_space'] = $this->input->post('living_space');
				$favoris['owner_name'] = $this->input->post('owner_name');
				$favoris['tel'] = $this->input->post('tel');
				$favoris['sale'] = $this->input->post('sale');
				$favoris['lang'] = $this->input->post('lang');
				//$this->Favoris_m->saveFavoris($favoris);
			}

			$this->data['favoris'] = $this->Users_m->get($_GET['id']);

			$this->load->view('template', $this->data);
		}
	}
	public function lock() {
		if($login = $this->input->post('login')) {
			$this->session->set_userdata('logged', true);
			redirect('/');
			exit;
		}
		$this->load->view('user');
	}


	

	public function logout() {
		$this->session->session_destroy();
		redirect('users/login');
	}

	//AJAX

	/*public function changeLang(){
		$this->load->model(array('Users_m'));
		$user_id = $this->input->post('user_id');

		/*$user = $this->session->get_userdata('user');
		$user->lang = $this->input->post('lang');
		$this->session->set_userdata('user', $user);
		echo json_encode($user);
	}*/

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
