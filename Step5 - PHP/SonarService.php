<?php

class SonarService{

	//Base url where Sonar service is deployed
	const SONAR_URL = 'http://uk9c0jvb9f6nvxvhursp.olapic.com';

	public function __construct(){
	}

	// Add a new place in sonar 
	// $provider_name: The name of the provider.
	// $provider_place_id: The place id of the provider's place.
	public function addNewPlace($provider_name,$provider_place_id){
		$curl = curl_init(self::SONAR_URL.'/v1/places/'.$provider_name.'/'.$provider_place_id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return($response);
	}

	// Get a registered place
	// $provider_name: The name of the provider.
	// $provider_place_id: The place id of the provider's place. 
	public function getPlace($provider_name,$provider_place_id){
		$curl = curl_init(self::SONAR_URL.'/v1/places/'.$provider_name.'/'.$provider_place_id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return($response);
	}

	// Delete a registered place and all its associations
	// $provider_name: The name of the provider.
	// $provider_place_id: The place id of the provider's place.
	public function deletePlace($provider_name,$provider_place_id){
		$curl = curl_init(self::SONAR_URL.'/v1/places/'.$provider_name.'/'.$provider_place_id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return($response);
	}

	// Get a place registered in Sonar using the UUID
	// $sonar_place_id: The id of the place saved in Sonar (UUID)
	public function getPlaceBySonarPlaceId($sonar_place_id){
		$curl = curl_init(self::SONAR_URL.'/v1/places/sonar/'.$sonar_place_id);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($curl);
		curl_close($curl);
		return($response);
	}
}

?>

