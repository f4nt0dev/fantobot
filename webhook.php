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
    else if ($text=="fantobot test"){
        
	     $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"generic",
        "elements"=>[
          [
            "title"=>"Welcome to Peter\'s Hats",
            "item_url"=>"https://www.cloudways.com/blog/migrate-symfony-from-cpanel-to-cloud-hosting/",
            "image_url"=>"https://www.cloudways.com/blog/wp-content/uploads/Migrating-Your-Symfony-Website-To-Cloudways-Banner.jpg",
            "subtitle"=>"We\'ve got the right hat for everyone.",
            "buttons"=>[
              [
                "type"=>"web_url",
                "url"=>"https://petersfancybrownhats.com",
                "title"=>"View Website"
              ],
              [
                "type"=>"postback",
                "title"=>"Start Chatting",
                "payload"=>"DEVELOPER_DEFINED_PAYLOAD"
              ]              
            ]
          ]
        ]
      ]
    ]];
     $response = [
    'recipient' => [ 'id' => $senderId ],
    'message' => $answer 
	];}
    
    #default risposta!
    else {
        $response = $text;
    }
	return $response;
}