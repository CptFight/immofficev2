<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Map extends MY_Controller {

	private $zipcodes; 
	
	public function __construct(){
		$this->zipcodes = new Zipcodes(); 
		parent::__construct();
	}

	public function index() {
		if($this->input->post('load_zip_code')){
			
			//print_r($this->zipcodes);
			if(!$this->zipcodes->last_query){
				$zipcodes = $this->zipcodes->getZipCodes($this->input->post('codepostal'),$this->input->post('radius'));
			}else{
				$zipcodes = $this->zipcodes->last_query;
			}
			
			$list = array();
			$zipcodes_in_string = '';
			foreach($zipcodes as $key => $city){
				$list[$city->zip] = $city->zip;
			}

			foreach($list as $zip => $zip){
				$zipcodes_in_string .= $zip." ";
			}	
			$zip = trim($zipcodes_in_string," ");
			
			switch($this->input->post('redirect')){
				case 'annonces/index':
					$this->current_user->search_zipcodes = $zipcodes_in_string;
					break;
				case 'subscribers/index':
					$this->load->model(array('Subscribers_m'));
					$data['id'] = $this->input->get('id');
					$data['search_zipcodes'] = $zipcodes_in_string;
					$data['user_id'] = $this->current_user->id;
					if($data['id'] > 0){
						$this->Subscribers_m->update($data);
					}else{
						$this->Subscribers_m->insert($data);
					}
					break;
				default:
					break;
			}
			redirect($this->input->post('redirect'));
		}
		$this->data['redirect'] = $_REQUEST['back'];

		$this->load->view('template', $this->data);
	}

	//AJAX
	public function getCitiesInAreas(){
		$return = $this->input->get();


		$zipcode = $this->input->get('zipcode');
		$radius = $this->input->get('radius');
		$data = array();

		$zipcodes = $this->zipcodes->getZipCodes($zipcode,$radius);

		$cpt = $return['start'];
		$max = $cpt+$return['length'];

/*		if($zipcodes && is_array($zipcodes) && count($zipcodes) > 0)
		foreach($zipcodes as $key => $zipcode){
			$data[] = array(
					$zipcodes[$cpt]->city,
					$zipcodes[$cpt]->zip
				);
		}*/

		for($cpt;$cpt<$max;$cpt++){
			if(isset($zipcodes[$cpt])){
				$data[] = array(
					$zipcodes[$cpt]->city,
					$zipcodes[$cpt]->zip
				);
			}	
		}
		
		$return["recordsTotal"] = count($zipcodes);
		$return["recordsFiltered"] = count($zipcodes);
		
		$return["data"] = $data;
		echo json_encode($return);
	}

}


Class Zipcodes{

    private $zipcodes_list;
    public $last_query;

   
    public function __construct(){
        $this->initListCoordBelgium();  
    }

    public function getZipCodes($zip_code, $radius){
    	$arrContextOptions=array(
		    "ssl"=>array(
		        "verify_peer"=>false,
		        "verify_peer_name"=>false,
		    ),
		);  

    	$json = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$zip_code.",belgium&sensor=false&key=AIzaSyAvjFjp5hRq_ipP39YWgGFZOMnopRKsplo", false, stream_context_create($arrContextOptions));
    	$geo_info = json_decode($json);

        if(isset($geo_info->results[0]->geometry)){
        	$location = $geo_info->results[0]->geometry->location;
        	$this->last_query = $this->searchCitiesInTheRadius($location->lat, $location->lng, $radius);
            return $this->last_query;
        }else{
            return false;
        }
        
    }

    private function initListCoordBelgium(){
        $this->zipcodes_list = json_decode(file_get_contents("assets/geolocalisations/belgium/zipcode-belgium.json"));

    }

    private function searchCitiesInTheRadius($lat,$long,$radius){
        $radius = $radius;
        $list_city_in_area = array();
        foreach($this->zipcodes_list as $key => $zipcode){
            $dist = $this->getDistanceFromLatLonInMeter($lat,$long,$zipcode->lat,$zipcode->lng);
            if($dist <= $radius){
                $list_city_in_area[] = $zipcode;
            }
        }
        return $list_city_in_area;
    }
    
    private function getDistanceFromLatLonInMeter($lat1,$lon1,$lat2,$lon2){
        $R = 6371; // Radius of the earth in km
        $dLat = deg2rad($lat2-$lat1);  // deg2rad below
        $dLon = deg2rad($lon2-$lon1); 
        $a = 
            sin($dLat/2) * sin($dLat/2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
            sin($dLon/2) * sin($dLon/2)
            ; 
        $c = 2 * atan2(sqrt($a), sqrt(1-$a)); 
        $d = $R * $c; // Distance in km
        return $d * 1000 - 2000;
    }

}

