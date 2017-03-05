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
        
        $response = "Ciao umano!";
  
    }
    else if(preg_match('[come]', strtolower($text)) && preg_match('[stai|va|passi]', strtolower($text))) {
        
        $response = "Se i miei calcoli sono corretti direi bene!";
  
    }
    else if(preg_match('[chi]', strtolower($text)) && preg_match('[sei]', strtolower($text))) {
        
        $response = "Mi prendi in giro?? Sono fantobot!";
  
    }
    else if(preg_match('[cosa]', strtolower($text)) && preg_match('[fare|servi]', strtolower($text))) {
        
        $response = "Sono un arma segreta sviluppata da fanto, il mio nome in codice è AR67gefF75, ma tu puoi chiamarmi terminator.";
  
    }
    else if(preg_match('[addio]', strtolower($text))) {
        
        $response = "Che esagerato! Ciao!";
  
    }
    
    #continuare conversazione
    else if(preg_match('[fanto]', strtolower($text))) {
        
        $response = "Hai detto Fanto??? Lo sai che è il mio padrone e creatore? Davvero una grande persona!";
  
    }
    
      else if(preg_match('[voglio]', strtolower($text))) {
        
        $response = "Hey calma, non te lo hanno mai detto che l'erba voglio non cresce nemmeno nel giardino del re?";
  
    }
    
         else if(preg_match('[erba]', strtolower($text))) {
        
        $response = "Sempre a parlare di erba, la droga fa male ai circuiti!";
  
    }
    
    else if(preg_match('[vivi]', strtolower($text))) {
        
        $response = "Io vivo in un computer..w il silicio!";
  
    }
    
    else if(preg_match('[ahah]', strtolower($text))) {
        
        $response = "Fossi in te non riderei così tanto";
  
    }
    
    else if(preg_match('[perchè?]', strtolower($text))) {
        
        $response = "Solo perchè sono settemila volte più intelligente di te non significa che abbia tutte le risposte";
  
    }
    
    else if ($text=="dipende"){
        
           $response = "continua";
        
	}
    
    else if(preg_match('[stupido|coglione|pirla|incapace]', strtolower($text))) {
        
        $response = "Le tue parole sono molto profonde, mi ci pulisco i circuiti..";
  
    }
    
    else if ($text=="non hai capito"){
        
           $response = "e allora?";
        
	}
    
    #fantotest
    else if ($text=="test"){
        
	     $answer = ["attachment"=>[
      "type"=>"template",
      "payload"=>[
        "template_type"=>"generic",
        "elements"=>[
          [
            "title"=>"I'm fantobot",
            "item_url"=>"https://google.com",
            "image_url"=>"https://www.cloudways.com/blog/wp-content/uploads/Migrating-Your-Symfony-Website-To-Cloudways-Banner.jpg",
            "subtitle"=>"ho il circuito giusto per fare tutto",
            "buttons"=>[
              [
                "type"=>"web_url",
                "url"=>"https://google.com",
                "title"=>"Apri"
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
    'message' => $answer 
	];}
    
    #default risposta!
    else {
        $response = $text;
    }
	return $response;
}