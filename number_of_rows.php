<?php
include("dbquery.php");
$table=$_POST['table'];

$res=no_of_rows($table);
echo $res

?>