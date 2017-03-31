<?php
function api_call($inopt_array, $end_url){
	//end_url must start with '/'

	//basic option
	$is_post = 0;	
	$post_data = array();
	$header_data = array();
	$root_url = 'http://opleapi.cloudapp.net:9999';
	$api_url = $root_url.$end_url;
	$opt_array =array(
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_URL => $api_url,
		CURLOPT_USERAGENT => "auth-token request",
	);

	//set post option at login
	//CURLOPT_POST=47
	//CURLOPT_POSTFIELDS = 10015
	if(isset($inopt_array[47])){
		$opt_array[CURLOPT_POST] = $inopt_array[47];
		$opt_array[CURLOPT_POSTFIELDS] =$inopt_array[10015];
	}
	//set header option
	//CURLOPT_HTTPHEADER = 10023
	if(isset($inopt_array[10023])){
		$opt_array[CURLOPT_HTTPHEADER] = $inopt_array[10023];
	}

	//curl process;
	$curl =  curl_init();
	$opt_array = $opt_array;

	curl_setopt_array($curl, $opt_array);
	$resp = curl_exec($curl);
	$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	curl_close($curl);
	

	return [$status, $resp];
}
?>