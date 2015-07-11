<?php
include("dbquery.php");
if(isset($_POST['delid']))
{
    $ret=delUserQuery($_POST['delid']);
    if($ret)
    {
        echo "true";
    }
    else
        echo "false";
}

?>