<?php
include ("dbquery.php");
if(isset($_POST['editid'],$_POST['editname']) && isset($_POST['editdob']) && isset($_POST['editlast_qual']) && isset($_POST['editpercent']) && isset($_POST['editdegree']) && isset($_POST['editdept']) && isset($_POST['edityop']) && isset($_POST['editemail']) && isset($_POST['editphone']) && isset($_POST['editapproved']))
{
 /*echo $_POST['editid'];
 echo $_POST['editname'];
 echo $_POST['editdob'];
 echo $_POST['editlast_qual'];
echo $_POST['editpercent'];
echo $_POST['editdegree'];
echo $_POST['editdept'];
echo $_POST['edityop'];
echo $_POST['editemail'];
echo $_POST['editphone'];
echo $_POST['editapproved'];*/
    $res=editStudent($_POST['editid'],$_POST['editname'],$_POST['editdob'],$_POST['editlast_qual'],$_POST['editpercent'],$_POST['editdegree'],$_POST['editdept'],$_POST['edityop'],$_POST['editemail'],$_POST['editphone'],$_POST['editapproved']);
   if($res)
   {
       echo "<script>window.location.href='studentManage.php';</script>";
    }
 else
        echo "<script>alert('edit not successful');</script>";
}

?>