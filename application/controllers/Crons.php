<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crons extends MY_Controller {

	public function index(){
		$this->load->model(array('Users_m'));
	}

	public function mails(){
		if(!$this->input->get('frequency')){
			return;
		}else{
			$frequency = $this->input->get('frequency');
		}

		$this->config->load('email');
		$this->load->model(array('Subscribers_m','Annonces_m'));

		$date_min = strtotime(date("Y-m-d 00:00:01"));
		switch($frequency){
			case 'hour':
				$date_min = strtotime('-1 hour');
				break;
			case 'week':
				$date_min = strtotime('-1 week');
				break;
			case 'month':
				$date_min = strtotime('-1 month');
				break;
			case 'day':
			default:
				//already the good value;
				break;
		}
		

		$params_subscribers = array(
			"frequency" => $frequency,
			"active" => 1
		);
		$subscribers = $this->Subscribers_m->get($params_subscribers);
		if($subscribers){
			foreach($subscribers as $key => $subscriber){
				$criterias = array(
					'date_min' => $date_min,
					'date_max' => '',
					'price_min' => $subscriber->search_price_min,
					'price_max' => $subscriber->search_price_max,
					'zipcode' => $subscriber->search_zipcodes,
					'province' => $subscriber->search_provinces,
					'lang' => $subscriber->search_lang,
					'vente' => $subscriber->search_sell
				);

				$order = array(
					'column' => 'last_publication_id',
					'dir' => 'DESC'
				);

				$params = array(
					"search" => $subscriber->search_words,
					"start" => 0,
					"length" => 100,
					"order" => $order,
					"criterias" => $criterias
				);

				$annonces = $this->Annonces_m->get($params);
				if($annonces){
					$this->load->library('email');
					$this->lang->load('global', $subscriber->lang);

					$this->email->from('no-reply@immoffice.be', 'Immoffice');
					$this->email->to($subscriber->login);
					//$this->email->cc('another@another-example.com');
					//$this->email->bcc('them@their-example.com');

					$this->email->subject(utf8_decode($this->lang->line('mail_subscribers_subject')));


					$data = array(
						"variable" => "test",
						"host" => "http://www.google.be",
						"subscriber" => $subscriber,
						"annonces" => $annonces
					);
					$body = $this->load->view('emails/subscribers.php',$data,TRUE);
		   			$this->email->message($body);   
					
					if($this->email->send()){
						echo "mail send ! ";
					}
				}
				
				
			}
		}
		
	}

}
