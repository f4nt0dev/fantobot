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
    switch ($text) {
        
        case 'ciao':
        $response = "Ciao! Beeeep.";
        break;
        
        case 'come stai?':
        $response = "Bene grazie, tu?";
        break;
        
        case 'cosa sai fare?':
        $response = "Sto imparando, per ora sono un pappagallo.";
        break;
        
        default:
        $response = $text;
    }
	return $response;
}