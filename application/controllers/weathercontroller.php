<?php

class WeatherController extends Controller{

	public $result;


	public function index(){
		$this->set('result',false);

	}

	public function getresults() {
		$xml = simplexml_load_file("http://api.worldweatheronline.com/premium/v1/weather.ashx?key=a08d034061ba45bca2f23956181911&q=" . $_POST['zip'] . "&format=xml&num_of_days=2");
		$this->set('result',true);
		$this->set('weather', $xml);
	}

}

?>
