<?php
include("dbquery.php");
if(isset($_POST['id']))
{
    $res=delStudent($_POST['id']);
    if($res)
    {
        echo "Delete Successful";
    }
    else
        echo "Delete Unsuccessful";
    
}

?>