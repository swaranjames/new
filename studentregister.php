<?php
include("dbquery.php");
/*echo $_POST['studname'];
echo $_POST['studdob'];
echo $_POST['last_qual'];
echo $_POST['studpercent'];
echo $_POST['degree'];
echo $_POST['dept'];
echo $_POST['studemail'];
echo $_POST['studphone'];
echo $_POST['approved'];*/
if(isset($_POST['studname']) && isset($_POST['studdob']) && isset($_POST['last_qual']) && isset($_POST['studpercent']) && isset($_POST['degree']) && isset($_POST['dept']) && isset($_POST['studyop']) && isset($_POST['studemail']) && isset($_POST['studphone']) && isset($_POST['approved']))
{
    $res=studInsert($_POST['studname'],$_POST['studdob'],$_POST['last_qual'],$_POST['studpercent'],$_POST['degree'],$_POST['dept'],$_POST['studyop'],$_POST['studemail'],$_POST['studphone'],$_POST['approved']);
    if($res)
    {
        echo "<script>window.location.href='studentManage.php'</script>";
    }
    else{
        echo "not inserted";
    }
}

?>