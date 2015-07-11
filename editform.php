<?php
//editmodal comes here
//editmodal comes here
include('dbquery.php');
if(isset($_POST['id']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['designation']) && isset($_POST['created_on']) && isset($_POST['last_login']) && isset($_POST['pass']) && isset($_POST['user']) )
{
    $ret=editTable($_POST['id'],$_POST['fullname'],$_POST['email'],$_POST['designation']);
    if($ret==true)
        echo "<script>window.location.href='userinfo.php'</script>";
    else
        echo "Edit Unsuccessful";
}
?>