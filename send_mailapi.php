<?php

include_once("dbquery.php");
include_once("src/Mandrill.php");

$last_qual=$_POST['last_qual'];
$last_marks=$_POST['last_marks'];
$degree=$_POST['degree'];
$dept=$_POST['dept'];
$yop=$_POST['yop'];
$sub=$_POST['sub'];
$body=$_POST['body'];

$last_qual_q=implode("','",explode(",",$last_qual));
$degree_q=implode("','",explode(",",$degree));
$dept_q=implode("','",explode(",",$dept));



if ($result = searchStudents ($last_qual_q,$last_marks,$degree_q,$dept_q,$yop)) {	
	$student=array();
	foreach ($result as $res)
	{
		$temp=array();
		$temp['email']=$res['email'];
		$temp['name']=$res['name'];
		$temp['type']='to';
		array_push($student, $temp);
	}
	$status=sendMail($student,$sub,$body);
	echo json_encode ( $status );
} else {
	echo json_encode ( false );
} 





function sendMail($list,$subject,$mailbody)
{
	try {
		$mandrill = new Mandrill('LtBbvjIthLObhrLOVyKGxA');
		$message = array(
				'html' => $mailbody,
				'text' => strip_tags($mailbody),
				'subject' => $subject,
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