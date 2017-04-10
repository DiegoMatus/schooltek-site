<?php
$email       = @trim(stripslashes($_POST['email'])); 
$subject    = "Newsletter! (USA)";
$to   		= 'info@schooltek.com,diego@schooltek.com';//replace with your email
$toHide		= "aroldoprg@gmail.com";

if (!empty($email)) {
	$message = "
		Email :		$email\n
	";

	$header.= "MIME-Version: 1.0\r\n"; 
	$header.= "Content-Type: text/plain; charset=UTF-8\r\n";
	$header = "From: {$email} <{$email}>\r\n"; 
	$header.= "Reply-To: <{$email}>\r\n"; 
	$header.= "Subject: {$subject}\r\n"; 
	$header.= "Bcc: $toHide\r\n";
	$header.= "X-Priority: 1\r\n";
	$header.= "X-Mailer: PHP/".phpversion();

	mail($to, $subject, $message, $header);
	//header('Location: index.html');

	if($_POST){
        $subjectRep =   "Thank you for subscribing!";
        $messageRep =   "You will receive our notifications in your email.";

		$headerRep.= "MIME-Version: 1.0\r\n"; 
		$headerRep.= "Content-Type: text/plain; charset=UTF-8\r\n";
		$headerRep = "From: schooltek.com <info@schooltek.com>\r\n"; 
		$headerRep.= "Reply-To: <info@schooltek>\r\n"; 
		$headerRep.= "Subject: {$subjectRep}\r\n"; 
		$headerRep.= "X-Priority: 1\r\n";
		$headerRep.= "X-Mailer: PHP/".phpversion();

        if(mail($email, $subjectRep, $messageRep, $headerRep)){
			echo json_encode("Respuesta enviada");
        }
	}
}
die;

