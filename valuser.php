<?php
include('dbquery.php');
    if(isset($_POST['user']))
    {
        $res=checkUser($_POST['user']);
        if($res==true)
        {
            echo '<span class="glyphicon glyphicon-remove"></span><span class="glyphicom-class"> Username Exists</span>';
        }
        elseif($res==false)
        {
            echo '<span class="glyphicon glyphicon-ok"></span><span class="glyphicom-class"> Username Available</span>';
        }
    }

?>