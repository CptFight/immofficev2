<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Crons extends MY_Controller {

	public function index(){
		$this->load->model(array('Users_m'));
	}

	public function mails(){
		$this->load->model(array('Subscribers_m','Annonces_m'));

		$subscribers = $this->Subscribers_m->get();
		$date_min = strtotime(date("Y-m-d 00:00:01"));
		if($this->input->get('frequency')){
			switch($this->input->get('frequency')){
				case 'hour':
					$date_min = strtotime('-1 hour');
					break;
				case 'week':
					$date_min = strtotime('-1 week');
					break;
				case 'month':
				echo "passe";
					$date_min = strtotime('-1 month');
					break;
				case 'day':
				default:
					//already the good value;
					break;
			}
		}

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
				"length" => 50,
				"order" => $order,
				"criterias" => $criterias
			);

			$annonces = $this->Annonces_m->get($params);

			$this->load->library('email');

			$this->email->from('gabypirson@gmail.com', 'Your Name');
			$this->email->to('gabypirson@gmail.com');
			$this->email->cc('another@another-example.com');
			$this->email->bcc('them@their-example.com');

			$this->email->subject('Email Test');
			$this->email->message('Testing the email class.');

			if($this->email->send()){
				echo "mail send ! ";
			}else{
				echo "error";
			}
			echo "<pre>";
			print_r($annonces);
			echo "</pre>";
			die();
		}
		
	}

}
