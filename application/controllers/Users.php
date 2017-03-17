<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index(){

		$this->load->view('template', $this->data);
	}

	public function login() {
		$this->session->unset_userdata('user');
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
		$this->load->model(array('Users_m'));
		if($this->input->post('save') ){
			$user = array();
			
			$user['login'] = $this->input->post('email');
			$user['lang'] = $this->input->post('lang');
			$user['password'] = md5($this->input->post('password'));
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
			$user['created'] = strtotime('now');
			
			if($this->Users_m->insert($user)){
				$this->addMessage($this->lang->line('insert_done'));
			}

			if(!$this->verifyPassword($this->input->post('password'), $this->input->post('verify_password'))){	
				$this->addError($this->lang->line('error_password'));
			}
		}

		$this->load->view('template', $this->data);
	}

	public function edit(){
		if($this->current_user->role != 'admin'){
			redirect('annonces/index');
		}
		$this->load->model(array('Users_m'));
		
		if($this->input->post('save') ){
			$user = array();
			$user['id'] = $this->input->get('id');
			$user['login'] = $this->input->post('email');
			$user['lang'] = $this->input->post('lang');
			$user['password'] = md5($this->input->post('password'));
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
			$user['created'] = strtotime('now');
			
			if($this->Users_m->update($user)){
				$this->addMessage($this->lang->line('update_done'));
			}

			if(!$this->verifyPassword($this->input->post('password'), $this->input->post('verify_password'))){	
				$this->addError($this->lang->line('error_password'));
			}
		}

		if($this->input->post('delete') ){
			$user = array();
			$user['id'] = $this->input->get('id');
			$user['deleted'] = 1;
			$this->Users_m->update($user);
			redirect('users/index');
		}
		$this->data['user'] = $this->Users_m->get($this->input->get('id'));

		$this->load->view('template', $this->data);
	}

	private function verifyPassword($password1,$password2,$verify_empty = true){
		if($password1 == '') return true;
		
		if($verify_empty){
			if(  $password1 == '' || $password2 == '' ) {
				return false;
			}
		}
		
		if( $password1 != $password2 ){
			return false;
		}
		return true;
	}

	public function edit_profile(){
		$this->load->model(array('Users_m'));
		if($this->input->post('save') ){
			$user = array();
			$user['id'] = $this->current_user->id;
			$user['login'] = $this->current_user->login = $this->input->post('email');
			if($this->verifyPassword($this->input->post('password'), $this->input->post('verify_password'),false)){
				$user['password'] = $this->current_user->password = md5($this->input->post('password'));
			}else{
				$this->data['errors'][] = $this->lang->line('error_password');
			}
			$user['lang'] = $this->current_user->lang = $this->input->post('lang');
			$user['name'] = $this->current_user->name = $this->input->post('name');
			$user['firstname'] = $this->current_user->firstname = $this->input->post('firstname');
			$user['agence'] = $this->current_user->agence = $this->input->post('agence');
			$user['adress'] = $this->current_user->adress = $this->input->post('adress');
			$user['tel'] = $this->current_user->tel = $this->input->post('tel');
			$this->Users_m->update($user);
		}

		$this->data['user'] = $this->current_user;
		$this->load->view('template', $this->data);
	}
	
	public function lock() {
		$this->load->view('user');
	}

	public function logout() {
		$this->session->unset_userdata('user');
		redirect('users/login');
	}

	//AJAX

	public function addOrRemoveFavoris(){
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

	public function addOrRemoveVisited(){
		$this->load->model(array('Visits_m') );
		$user_id = $this->input->post('user_id');
		$annonce_id = $this->input->post('annonce_id');
		$add = $this->input->post('add');
		if($add == 'true'){
			$data = array(
				'user_id' => $user_id,
				'annonce_id' => $annonce_id
			);
			$this->Visits_m->insert($data);
		}else{
			$this->Visits_m->deleteByUserAnnonceIds($user_id,$annonce_id);
		}
	}

	public function addOrRemoveRappels(){
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

		//$date_rappel = strtotime('+1 Weekday');
		$date_rappel = strtotime('now');
		$add = $this->input->post('add');
		if($add == 'true'){
			$this->Rappels_m->add($user_id,$favoris_id,$date_rappel);
		}else{
			$this->Rappels_m->deleteByUserFavorisIds($user_id,$favoris_id);
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

	public function getListIdFavorisRappelVisits(){
		$this->load->model(array('Rappels_m','Users_m','Favoris_m','Visits_m'));
		$user_id = $this->input->post('user_id');

		$favoris = $this->Favoris_m->getFavorisAnnoncesIds($user_id);
		$rappels = $this->Rappels_m->getRappelsAnnoncesIds($user_id);
		$rappels_favoris_ids  = $this->Rappels_m->getRappelsFavorisIds($user_id);
		$visits_ids = $this->Visits_m->getVisitsAnnoncesIds($user_id);
		
		$result = array(
			'favoris' => $favoris,
			'rappels' => $rappels,
			'rappels_favoris_ids' => $rappels_favoris_ids,
			'visits' => $visits_ids
		);
		echo json_encode($result);
	}

	public function getAllUsersDataTable(){
		$this->load->model(array('Users_m'));
		
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
					$order['column'] = 'agence';
					break;
				case 2:
					$order['column'] = 'login';
					break;
				default:
					break;
			}
		}

		
		$params = array(
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
		);

		
		$users = $this->Users_m->get($params);
	//	echo $this->db->last_query();
		$data = array();

		foreach($users as $key => $user){
			$data[] = array(
				$user->name,
				$user->agence,
				$user->login,
				date('d/m/Y H:i:s',$user->created),
				date('d/m/Y H:i:s',$user->last_connection),
				'<ul class="list-tables-buttons" data-user_id="'.$user->id.'">
                    <li class="table-btn-edit"><a href="'.site_url('users/edit/?id='.$user->id).'"><i class="fa fa-pencil"></i><span>Editer le user</span></a></li>
                </ul>'
			);
		}

		$return["recordsTotal"] = count($users);
		$return["recordsFiltered"] = count($users);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	}
}
