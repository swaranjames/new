<?php
session_start();
if(isset($_SESSION['s_user']))
{
     session_unset();
     echo "<script>window.location.href='login.php'</script>";
}
else
{
    echo "UNAUTHORIZED ACCESS PROHIBITED";
}
?>