<?php
namespace Slack;

class SlackMessage {

	function __construct($token = "") {
		$this->token          =     $token;
		$this->base_url       =     'https://slack.com/api/';
		$this->curl_headers   =     array("Content-type: application/json", "Accept: application/json");
		$this->channel        =     '';
	}

	function sendMessageToChannel($channel, $text) {
		$method = "chat.postMessage";
		$params = array(
			'token'          =>     $this->token,
			'channel'        =>     $channel,
			'text'           =>     $text,
			'pretty'         =>     1,
			'as_user'        =>     true
		);

		$this->query($method, $params);
	}

	function query($query, $data = array()) {
		$response = "";
	
		$arrContextOptions = array(
		    "ssl" => array(
		        "verify_peer"         =>      false,
		        "verify_peer_name"    =>      false,
		    ),
		); 

		$query_url = $this->base_url.$query;
		$response = file_get_contents($query_url."?".http_build_query($data), false, stream_context_create($arrContextOptions));

		return $response;
	}
}
