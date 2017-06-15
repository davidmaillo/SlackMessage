<?php
	require_once('class/SlackMessage.class.php');

	// Create a BOT in Slack settings, then paste here its TOKEN ID
	$token = "XXXXXXX";
	$Slack = new \Slack\SlackMessage($token);

	// Choose the channel and the message to be sent (Note: BOT can only send messages to those channels it was added as member)
	$channel = "general";
	$message = "Hello world! :)";

	$Slack->sendMessageToChannel($channel, $message);