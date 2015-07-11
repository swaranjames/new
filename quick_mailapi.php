<?php



$to=$_POST['recepient'];
$sub=$_POST['sub'];
$body=$_POST['body'];

$arr=array(
    array(
        'email'=$to;
        'name'=$sub;
        'type'=;
    );
);

$status=sendMail($arr,$sub,$body);
if($status==true)
    echo json_encode($status);
else
    echo false;

function sendMail($list,$sub,$body)
{
	try {
		$mandrill = new Mandrill('LtBbvjIthLObhrLOVyKGxA');
		$message = array(
				'html' => $body,
				'text' => strip_tags($mailbody),
				'subject' => $sub,
				'from_email' => 'swaranjames@gmail.com',
				'from_name' => 'Swaran Sovan Mandal',
				'to' =>$list				 
				);

		$async = true;//not wait for send mail
		$ip_pool = 'Main Pool';
		$send_at = date('c');
		$result = $mandrill->messages->send($message, $async);
		//print_r($result);
		return true;
	} catch(Mandrill_Error $e) {
		// Mandrill errors are thrown as exceptions
		//echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
		// A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
		return false;
	}
}

?>