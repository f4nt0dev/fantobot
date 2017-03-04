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
   
    #convenievoli
    if(preg_match('[ciao|hola]', strtolower($text))) {
        
        $response = "Ciao!! Per ora sono un pappagallo!";
  
    }
    else if(preg_match('[come]', strtolower($text)) && preg_match('[stai|va|passi]', strtolower($text))) {
        
        $response = "Vivo la mia vita un quarto di bit alla volta.";
  
    }
    else if(preg_match('[chi]', strtolower($text)) && preg_match('[sei]', strtolower($text))) {
        
        $response = "Mi prendi in giro?? Sono fantobot!";
  
    }
    else if(preg_match('[cosa]', strtolower($text)) && preg_match('[fare|servi]', strtolower($text))) {
        
        $response = "Per ora sono un pappagallo, ma mi stanno programmando!!";
  
    }
    else if(preg_match('[addio]', strtolower($text))) {
        
        $response = "Che esagerato! Ciao!";
  
    }
    
    #elisa
    else if(preg_match('[fanto]', strtolower($text))) {
        
        $response = "Hai detto Fanto??? Lo sai che è il mio padrone e creatore? Davvero una grande persona!";
  
    }
    
    #fantotest
    else if ($text=="fantotest"){
        
		$response = date('Y-m-d H:i:s');
	}
    
    #default risposta!
    else {
        $response = $text;
    }
	return $response;
}