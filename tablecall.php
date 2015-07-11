<?php

include("dbquery.php");
if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['desig']) )
    
{
    $encpass=md5($_POST['pass']);
    tableUpdate($_POST['user'],$encpass,$_POST['fullname'],$_POST['email'],$_POST['desig']);
}
else{
    echo "<script>alert('Empty Fields');</script>";
}

?>