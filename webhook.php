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
   
    if(preg_match('[ciao]', strtolower($text))) {
        
        $response = "Ciao!! Per ora sono un pappagallo!";
  
    }
       if(preg_match('[come]', strtolower($text)) && (preg_match('[stai]', strtolower($text))) {
        
        $response = "Vivo la mia vita un quarto di bit alla volta.";
  
    }
    else {
        $response = $text;
    }
	return $response;
}