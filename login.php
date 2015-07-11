<?php
session_start();
include("dbquery.php");
$error="";

if(isset($_POST['userid']) && isset($_POST['password']))
{
    if(login($_POST['userid'],$_POST['password']))
    {
        $_SESSION['s_user']=$_POST['userid'];
        $row=selectall($_SESSION['s_user']);
        $_SESSION['s_id']=$row['id'];
        $_SESSION['s_email']=$row['email'];
        $email=$_SESSION['s_email'];
        //echo"<script>alert('email is set: ".$email."');</script>";
        $_SESSION['s_desig']=$row['designation'];
        $_SESSION['s_created']=$row['created_on'];
        $_SESSION['last_login']=$row['last_login'];
        last_login($_SESSION['s_user']);
        if(isset($_POST['remember_me']))    //cookie setting up
        {
            setcookie('c_user',$_POST['userid'],time()+3600);
            setcookie('c_pass',$_POST['password'],time()+3600);
        }
        else
        {
            if(isset($_COOKIE['c_user']) && isset($_COOKIE['c_pass']))
            {
                setcookie('c_user',null,time()-1);
                setcookie('c_pass',null,time()-1);
            }
        }
        echo "<script>window.location.href='index.php';</script>";
        $error="";
    }
    else
    {
        $error="<div class='alert alert-danger alert-dismissable'>
                                        <i class='fa fa-ban'></i>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <b>Alert!</b> Invalid Creditials.
                                    </div>";
    }
}

if(isset($_COOKIE['c_user']) && isset($_COOKIE['c_pass']))   //checking for the cookie
{
    $userc=$_COOKIE['c_user'];   //setting the text fields
    $passc=$_COOKIE['c_pass'];
    $rem='checked';
}
else
{
    $rem='';
    $userc="";
    $passc="";
}

?>

<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        
    </head>
    <body class="bg-black">
        </br>
        <?php echo $error; ?>

        <div class="form-box" id="login-box">
            <div class="header">Student Management</div>
            <form action="login.php" method="POST">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="userid" class="form-control" placeholder="User ID" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                    </div>          
                    <div class="form-group">
                        <input type="checkbox" name="remember_me" value="1" <?php echo $rem; ?>/> Remember me
                    </div>
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-olive btn-block">Sign in</button>  
                    
                    <center><p><a href="#">I forgot my password</a></p></center>
                    
                    
                </div>
            </form>

            
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>