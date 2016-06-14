<?php
include("aes.php");
session_start();

require 'vendor/autoload.php';
require 'helpers/helpers.php';
// Get API Credentials
$config = parse_ini_file('helpers/config.ini');
$notice = '';
$authException = false;
$mime = new Mail_mime();
// Setup Google API Client
$client = new Google_Client();
$client->setClientId($config['client_id']);
$client->setClientSecret($config['client_secret']);
$client->setRedirectUri($config['redirect_url']);
$client->addScope('https://mail.google.com/');
// Create GMail Service
$service = new Google_Service_Gmail($client);
// Check if user is logged out
if(isset($_REQUEST['logout'])){
	unset($_SESSION['access_token']);
	#header("location: index.php");
}

// Check if we have an authorization code
if(isset($_GET['code'])){
    $code = $_GET['code'];
    $client->authenticate($code);
    $_SESSION['access_token'] = $client->getAccessToken();
    $uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
    header('Location:' . filter_var($uri,FILTER_VALIDATE_URL));
}

// Check if we have an access token in the session
if(isset($_SESSION['access_token'])){
    $client->setAccessToken($_SESSION['access_token']);				           
} else {
    $loginUrl = $client->createAuthUrl();
}

// Check if we have an access token ready for API calls
try
{
    if(isset($_SESSION['access_token']) && $client->getAccessToken()){
        // Make API Calls
        if(isset($_POST['send'])){
            $to = $_POST['to'];
			#$key = $_POST['key'];
            $body = $_POST['message'];
            $subject = $_POST['subject'];
            $password = $_POST['password'];
			if($to==""){
				$notice='<div class="alert alert-danger">Gagal mengirim email. To tidak boleh kosong ! </div>';
			} else {
			     //if($message==""){
				 // $notice='<div class="alert alert-danger">Gagal mengirim email. Message tidak boleh kosong ! </div>';
			    // }
			 //else {
			
			$start = (double)microtime()+time();
			$Key=strlen($subject);
			if($Key==0){
				$notice='<div class="alert alert-danger">Subjek harus diisi '.$Key.'&nbsp; karakter </div>';
			} else{
			// $blowfish = new Blowfish($subject);
			// $crypto = $blowfish->enkripsi($body);
            #aes
            $aes = new aes();
            $crypto = $aes->encrypt($body,$password);
            $mime->addTo($to);
            $mime->setTXTBody($crypto);
            $mime->setHTMLBody($crypto);
            $mime->setSubject($subject);
            $message_body = $mime->getMessage();
            $encoded_message = base64url_encode($message_body);

            $message = new Google_Service_Gmail_Message();
            $message->setRaw($encoded_message);

            $email = $service->users_messages->send('me',$message);
			$diff = (double)microtime()+time() - $start;
            if($email->getId()){
                $notice = '<div class="alert alert-success">Email sudah terkirim <br/>
                            Email Asli : '.$body.'<br/>
                            Email Stelah di enkrip: '.$crypto.'<br/>
                            Key: '.$password.'</div>'; 				
            } else {
                $notice = '<div class="alert alert-danger">Gagal mengirim email, coba lagi </div>';
            }
		  } 
		}
			//}
		
	}
		//$service = new Google_Service_Gmail($client);
        /**
         * Get the list of message ids and filter only messages in inbox under the primary category tab
         * Also limit the result to 5 and return only the message ids
         */
		 
        //$list = $service->users_messages->listUsersMessages('me',['maxResults' => 5, 'fields' => 'messages/id', 'q' => 'in:inbox category:primary']);
        //$messageList = $list->getMessages();

        /**
         * Enable Batch Request to ease up on our HTTP Requests
         */
        $client->setUseBatch(true);
        $batch = new Google_Http_Batch($client);

        /**
         * Prepare batch request for getting user messages
         */
         // foreach($messageList as $mlist){
         //     $batch->add($service->users_messages->get('me',$mlist->id,['format' => 'raw']),$mlist->id);
         // }

        /**
         * Execute the Batch Request
         */
         $batchMessages = $batch->execute();

         $inboxMessage = [];

        /**
         * Create a new Mime Mail Parser Instance ready to decode raw message content
         */
        $mimeDecode = new PhpMimeMailParser\Parser();

         foreach($batchMessages as $dMessage){
             $messageId = $dMessage->id;
             $gMessage = $service->users_messages->get('me',$messageId,['format' => 'raw']);
             $dcMessage = base64url_decode($dMessage->getRaw());

             $mimeDecode->setText($dcMessage);
             $mimeSubject = $mimeDecode->getHeader('subject');

             $inboxMessage[] = [
                 'messageId' => $messageId,
                  'messageSubject' => $mimeSubject
             ];
         }

    }
}
catch (Google_Auth_Exception $e)
{
	$AuthException = true;
}
?>