<?php
include_once("dbquery.php");
$last_qual=$_POST['last_qual'];
$last_marks=$_POST['last_marks'];
$degree=$_POST['degree'];
$dept=$_POST['dept'];
$yop=$_POST['yop'];

$last_qual_q=implode("','",explode(",",$last_qual));
$degree_q=implode("','",explode(",",$degree));
$dept_q=implode("','",explode(",",$dept));

if ($res = searchStudents ( $last_qual_q,$last_marks,$degree_q,$dept_q,$yop)) 
{
	echo json_encode ( $res );
} else {
	echo json_encode ( false );
} 

?>