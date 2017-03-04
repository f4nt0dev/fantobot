<?php
require_once 'config.php';
require_once 'FacebookBot.php';
$bot = new FacebookBot(FACEBOOK_VALIDATION_TOKEN, FACEBOOK_PAGE_ACCESS_TOKEN);
$bot->run();
$messages = $bot->getReceivedMessages();
foreach ($messages as $message)
{
	$recipientId = $message->senderId;
	if($message->text)
	{
		$response = processRequest($message->text);
		$bot->sendTextMessage($recipientId, $response);
	}
}
function processRequest($text)
{
	$text = trim($text);
	$text = strtolower($text);
	$response = "";
	if($text=="Ciao")
	{
		$response = "Ciao! Beeeep.";
	}
	elseif ($text=="Come stai?")
	{
		$response = "Vivo la mia vita un quarto di bit alla volta..";
	}
	else
	{
		$response = "Mi stanno ancora programmando, non rompere i circuiti! Comunque ecco cosa mi hai detto:";
	}
	return $response;
}