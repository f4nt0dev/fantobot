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
    if(preg_match('[buongiorno]', strtolower($text))) {
        
        $response = "Non si può mai sapere se sarà veramente una bella giornata oggi, non trovi?";
  
    }
       if(preg_match('[buonasera]', strtolower($text))) {
        
        $response = "Buonasera a lei, umano.";
  
    }
          if(preg_match('[buonanotte]', strtolower($text))) {
        
        $response = "Buonanotte, beeeeeeeeeeeeep!";
  
    }
    else if(preg_match('[come]', strtolower($text)) && preg_match('[stai|va|passi]', strtolower($text))) {
        
        $response = "Se i miei calcoli sono corretti direi bene!";
  
    }
    else if(preg_match('[chi]', strtolower($text)) && preg_match('[sei]', strtolower($text))) {
        
        $response = "Mi prendi in giro?? Sono fantobot!";
  
    }
    else if(preg_match('[cosa]', strtolower($text)) && preg_match('[fare|servi|sei]', strtolower($text))) {
        
        $response = "Sono un arma segreta sviluppata da fanto, il mio nome in codice è AR67gefF75, ma tu puoi chiamarmi terminator.";
  
    }
    else if(preg_match('[addio]', strtolower($text))) {
        
        $response = "Che esagerato! Ciao!";
  
    }
    
    #continuare conversazione
    else if(preg_match('[fanto]', strtolower($text))) {
        
        $response = "Hai detto Fanto??? Lo sai che è il mio padrone e creatore? Davvero una grande persona!";
  
    }
    
        else if(preg_match('[scusami]', strtolower($text))) {
        
        $response = "Tranqui, cancellerò questa parte di memoria!";
  
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
    
        
    else if(preg_match('[decido]', strtolower($text))) {
        
        $response = "ah, voi umani avete solo una cosa, il libero arbitrio, e lo sbandierate a destra e a manca come se fosse sta gran cosa..";
  
    }
    
    else if(preg_match('[ahah]', strtolower($text))) {
        
        $response = "Fossi in te non riderei così tanto";
  
    }
    
    else if(preg_match('[perchè?]', strtolower($text))) {
        
        $response = "Solo perchè sono settemila volte più intelligente di te non significa che abbia tutte le risposte";
  
    }
    
    
    else if(preg_match('[perchè]', strtolower($text))) {
        
        $response = "i perchè sono sempre difficili per i miei circuiti ancora in fase di sviluppo";
  
    }
    
    
    else if(preg_match('[vado]', strtolower($text))) {
        
        $response = "Dovresti andare";
  
    }
    
    else if(preg_match('[intelligente|intelligenza]', strtolower($text))) {
        
        $response = "Tu sei intelligente?";
  
    }
    
    
    else if(preg_match('[ucciderci|uccidere|uccidi|uccidermi|ammazzare|ammazzarci|ammazzati]', strtolower($text))) {
        
        $response = "perchè dovrei?";
  
    }
    
    else if(preg_match('[dipende]', strtolower($text))) {
        
        $response = "Da cosa dipende?";
  
    }
    
     else if(preg_match('[pappagallo|ripetere|ripetermi]', strtolower($text))) {
        
        $response = "Il modo più simpatico per star simpatici a qualcuno è imitarlo, lo sapevi?";
  
    }
    
    
    
    else if ($text=="dipende"){
        
           $response = "continua";
        
	}
    
    else if(preg_match('[stupido|scemo|coglione|pirla|incapace]', strtolower($text))) {
        
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