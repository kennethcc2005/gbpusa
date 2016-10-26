<?php
//	$owner_email = $_POST["owner_email"];
$owner_email ="g.b.produce@gmail.com";
	$headers = 'From:' . $_POST["email"] . "\r\n" . 'Reply-To: ' . $email . "\r\n" . 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
	$subject = 'New message from GBP website user ' . $_POST["name"];
	$messageBody = "";
	
	if($_POST['name']!='nope'){
		$messageBody .= 'Visitor: ' . $_POST["name"] .  "\n";
		$messageBody .=  "\n";
		

	}
	if($_POST['email']!='nope'){
		$messageBody .= 'Email Address: ' . $_POST['email']  . "\n";
		$messageBody .=  "\n";
	}else{
		$headers = '';
	}
	if($_POST['phone']!='nope'){		
		$messageBody .= 'Phone Number: ' . $_POST['phone'] .  "\n";
		$messageBody .=  "\n";
	}	
	if($_POST['message']!='nope'){
		$messageBody .= 'Message: ' . $_POST['message'] . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
		}else{
			echo 'mail sent';
			$url='http://gbpusa.com/index.html';
			header( "Location: $url" );
		}
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
	}
?>