<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function index(){
		$this->load->view('template', $this->data);
	}

	public function lost_password(){
		$lang = 'french';
		if(isset($_GET['lang_user'])){
			$lang = $_GET['lang_user'];
		}
		$this->lang->load('global', $lang);
		$this->load->model(array('Users_m'));
		if($this->input->post('send-login')) {
			$email = $this->input->post('login');
			$user = $this->Users_m->emailExist($email);
			
			if($user){
				$password = uniqid();
				$params = array(
					'to' => $email,
					'subject' => $this->lang->line('new_password_subject'),
					'body' => array(
						'template' => 'emails/new_password.php',
						'data' => array(
							'password' => $password
						)
					)
				);
				if($this->sendMail($params)){
					$new_param['id'] = $user->id;
					$new_param['password'] = md5($password);
					$this->Users_m->update($new_param);
					$this->addMessage($this->lang->line('new_password_send').$email);
					redirect('users/login');
				}
				
			}else{
				$this->addError($this->lang->line('email_not_exist'));
			}
		}
		$this->load->view('template_landing');
	}

	public function change() {
		$user_id = $this->input->get('id');
		$token = $this->input->get('token');
		$back_path = $this->input->get('back_path');
		if($token == md5('immofficetoken'.date('i'))){
			$this->load->model(array('Users_m'));
			$user = $this->Users_m->get($user_id);
			echo $user_id;
			if($user){
				$this->session->unset_userdata('user');
				$this->session->set_userdata('user', $user);
				redirect($back_path);
			}
		}else{
			$this->addError($this->lang->line('bad_token'));
			redirect($back_path);
		}
	}

	public function login() {
		$lang = 'french';
		if(isset($_GET['lang_user'])){
			$lang = $_GET['lang_user'];
		}
		$this->lang->load('global', $lang);

		$this->session->unset_userdata('user');
		$this->load->model(array('Users_m','Connections_m'));

		if($this->input->post('send-login')) {

			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$user = $this->Users_m->login($login,$password);
			if($user){
				$this->Connections_m->insert(array(
					'user_id' => $user->id,
					'timestamp' => strtotime('now')
				));
				$this->session->set_userdata('user', $user);
				redirect('/annonces/index');
				die();
			}else{
				$this->addError($this->lang->line('error_login'));
			}
		}		
		$this->load->view('template_landing');
	}

	public function news(){
		if($this->current_user->role_id != 4){
			redirect('annonces/index');
		}
		$this->load->model(array('Users_m'));
		$this->load->model(array('Users_m','Agences_m','Roles_m'));
		$this->data['agences'] = $this->Agences_m->getAll();
		$this->data['roles'] = $this->Roles_m->getAll();

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
			$user['agence_id'] = $this->input->post('agence');
			$user['adress'] = $this->input->post('adress');
			$user['tel'] = $this->input->post('tel');
			$user['role_id'] = $this->input->post('role');

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
		if($this->current_user->role_id != 4){
			redirect('annonces/index');
		}
		$this->load->model(array('Users_m','Agences_m','Roles_m'));
		$this->data['agences'] = $this->Agences_m->getAll();
		$this->data['roles'] = $this->Roles_m->getAll();
		
		if($this->input->post('save') ){
			$user = array();
			$user['id'] = $this->input->post('id');
			$user['login'] = $this->input->post('email');
			$user['lang'] = $this->input->post('lang');
			if($this->input->post('password') != ''){
				$user['password'] = md5($this->input->post('password'));
			}
			
			$user['name'] = $this->input->post('name');
			$user['firstname'] = $this->input->post('firstname');
			$user['agence_id'] = $this->input->post('agence');
			$user['adress'] = $this->input->post('adress');
			$user['tel'] = $this->input->post('tel');
			$user['role_id'] = $this->input->post('role');
			$user['deleted'] = $this->input->post('deleted');
			
			if($this->Users_m->update($user)){
				$this->addMessage($this->lang->line('update_done'));
				redirect('users/index');
			}

			if(!$this->verifyPassword($this->input->post('password'), $this->input->post('verify_password'))){	
				$this->addError($this->lang->line('error_password'));
			}
		}

		if($this->input->post('delete') ){
			$user = array();
			$user['id'] = $this->input->get('id');
			//$user['deleted'] = 1;
			if(!$this->Users_m->delete($this->input->get('id'))){
				$this->addError($this->lang->line('users_with_favoris'));
			}else{
				$this->addMessage($this->lang->line('delete_done'));
			}
			redirect('users/index');
		}
		$this->data['user'] = $this->Users_m->get($this->input->get('id'));
		if(!$this->data['user']){
			//redirect('users/index');
		}
		
		$this->load->view('template', $this->data);
	}

	private function verifyPassword($password1,$password2,$verify_empty = true){
		
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

			if($this->input->post('password') != ''){
				if($this->verifyPassword($this->input->post('password'), $this->input->post('verify_password'),false)){
					$user['password'] = $this->current_user->password = md5($this->input->post('password'));
				}else{
					$this->addError($this->lang->line('error_password'));
				}
			}
			
			$user['public_access'] = $this->current_user->lang = $this->input->post('public_access');
			$user['public_access_option'] = $this->current_user->lang = $this->input->post('public_access_option');

			$user['lang'] = $this->current_user->lang = $this->input->post('lang');
			$user['name'] = $this->current_user->name = $this->input->post('name');
			$user['firstname'] = $this->current_user->firstname = $this->input->post('firstname');
			$user['adress'] = $this->current_user->adress = $this->input->post('adress');
			$user['tel'] = $this->current_user->tel = $this->input->post('tel');
			$user['direct_access_page'] = $this->current_user->direct_access_page = $this->input->post('direct_access_page');
			if($this->Users_m->update($user)){
				$this->addMessage($this->lang->line('update_done'));
			}
			
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
		$this->load->model(array('Favoris_m','Annonces_m','Status_m') );
		$user_id = $this->input->post('user_id');
		$annonce_id = $this->input->post('annonce_id');
		$add = $this->input->post('add');
		$favoris_id = 0;
		if($add == 'true'){
			$annonce = $this->Annonces_m->get($annonce_id);
			$status = $this->Status_m->getFirstStatus($this->current_user->agence_id,'favoris');

			$favoris_id = $this->Favoris_m->addAnnonceInFavoris($user_id,$annonce,$status->id);
		}else{
			$this->Favoris_m->removeAnnonceFromFavoris($user_id,$annonce_id);
		}	
		$return = array();
		if($this->current_user->direct_access_page){
			$return['direct_access_page'] = site_url('favoris/edit/?id='.$favoris_id);
		}
		echo json_encode($return);
	}

	public function addOrRemoveVisited(){
		$this->load->model(array('Visits_m') );
		$user_id = $this->input->post('user_id');
		$annonce_id = $this->input->post('annonce_id');
		$add = $this->input->post('add');
		if($add == 'true'){
			$data = array(
				'user_id' => $user_id,
				'annonce_id' => $annonce_id,
				'created' => strtotime('now')
			);
			$this->Visits_m->insert($data);
		}else{
			$this->Visits_m->deleteByUserAnnonceIds($user_id,$annonce_id);
		}
	}

	public function addOrRemoveRappels(){
		$this->load->model(array('Rappels_m','Favoris_m','Annonces_m','Status_m') );
		$user_id = $this->input->post('user_id');
		$annonce_id = $this->input->post('annonce_id');
		$favoris_id = $this->input->post('favoris_id');

		if(!$favoris_id){
			$favoris = $this->Favoris_m->getByUserAnnonceId($user_id,$annonce_id);
			if(!$favoris){
				$annonce = $this->Annonces_m->get($annonce_id);

				$status = $this->Status_m->getFirstStatus($this->current_user->agence_id,'favoris');
				$this->Favoris_m->addAnnonceInFavoris($user_id,$annonce,$status->id);
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
		$return = array();
		if($this->current_user->direct_access_page){
			$return['direct_access_page'] = site_url('favoris/edit/?id='.$favoris_id.'&view=rappel');
		}
		echo json_encode($return);
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

		if($this->input->get('agence_id')){
			$agence_id = $this->input->get('agence_id');
		}else{
			$agence_id = false;
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
					$order['column'] = 'users.name';
					break;
				case 1:
					$order['column'] = 'agence_name';
					break;
				case 2:
					$order['column'] = 'role_name';
					break;
				case 3:
					$order['column'] = 'login';
					break;
				case 4:
					$order['column'] = 'created';
					break;
				case 5:
					$order['column'] = 'last_connection';
					break;	
				case 6:
					$order['column'] = 'deleted';
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
			"agence_id" => $agence_id,
			"deleted" => true
		);

		
		$users = $this->Users_m->get($params);
		$all_users = $this->Users_m->getAll();
	//	echo $this->db->last_query();
		$data = array();

		foreach($users as $key => $user){
			if($user->deleted != 1)
				$deleted = '<i class="fa fa-check green"></i>';
			else $deleted = '<i class="fa fa-remove red"></i>';

			if($user->last_connection){
				$last_connection = date('d/m/Y H:i:s',$user->last_connection);
			}else{
				$last_connection = '';
			}
			
			$data[] = array(
				$user->name." ".$user->firstname,
				$user->agence_name,
				$user->role_name,
				$user->login,
				date('d/m/Y H:i:s',$user->created),
				$last_connection,
				$deleted,
				'<ul class="list-tables-buttons">
                    <li class="table-btn-edit"><a href="'.site_url('users/edit/?id='.$user->id).'"><i class="fa fa-pencil"></i><span>Editer le user</span></a></li>
                    <li class="table-btn-rappel"><a href="'.site_url('supervision/view').'/?id='.$user->id.'" ><i class="fa fa-binoculars"></i><span>See More</span></a></li>
                </ul>'
			);
		}
		$return["recordsTotal"] = count($all_users);
		$return["recordsFiltered"] = count($users);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	}
}
