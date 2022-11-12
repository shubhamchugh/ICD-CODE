<?php

namespace App\Helpers\HelperClasses\ICD;

class ICD_API
{
        const TOKEN_ENPOINT = "https://icdaccessmanagement.who.int/connect/token";
		
		const SCOPE = "icdapi_access";
		const GRANT_TYPE = "client_credentials";
		
        private $CLIENT_ID;
        private $CLIENT_SECRET;
		
		private $token;
		private $url;
		private $api_response;


        public function __construct() {
		    
			if(isset($_SESSION['token'])) {
				$this->token = $_SESSION['token'];
			}
			else {
				$this->newToken();
			}
		}		

    public function newToken()
    {
        $this->CLIENT_ID  = config('value.CLIENT_ID');
        $this->CLIENT_SECRET  = config('value.CLIENT_SECRET');

        $ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, self::TOKEN_ENPOINT);
			curl_setopt($ch, CURLOPT_POST, TRUE);
			curl_setopt($ch, CURLOPT_POSTFIELDS, array(
					'client_id' => $this->CLIENT_ID,
					'client_secret' =>  $this->CLIENT_SECRET,
					'scope' => self::SCOPE,
					'grant_type' => self::GRANT_TYPE
			));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // set curl without result echo
			$result = curl_exec($ch);
			curl_close($ch);
			
			$json_array = (json_decode($result, true));
			$this->token = $json_array['access_token'];
			$_SESSION['token'] =  $this->token;
    }

    private function makeRequest()
    {
        $lang = (!empty($lang)) ? $lang : 'en';
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $this->url);
        $headers = [
            'accept: application/json',
            'API-Version: v2',
            'Accept-Language:'. $lang,
            'Authorization: Bearer  '.$this->token,
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);			
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // set curl without result echo
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
        curl_close($ch);

        $this->api_response = curl_exec($ch);
        dd($this->api_response);
        return $http_code;	
    }

    public function get($url) {
        
        $this->url = $url;

        $http_code  = $this->makeRequest($this->url);

        if($http_code == 0) { // Api Limit 
            return "Error with API";
        }

        if( $http_code == 401) { // unauthorized token 
            $this->newToken();
            $this->makeRequest($this->url);
        }
        
        return json_decode($this->api_response);
    }

    public static function request($url)
    {
        $result = new ICD_API();
        return $result->get($url);
    }



}
