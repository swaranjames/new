<?php
session_start();
//if(!isset($_SESSION['s_user']))
{
   // echo "<script>window.location.href='login.php'</script>";
}


?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>User Information</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <?php include("header_js.php"); ?>
        
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include("header.php"); ?>
                <div class="wrapper row-offcanvas row-offcanvas-left">
                <?php include("left_sidebar.php"); ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        User Information
                        <small>Tables</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">User Information</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                                        


                    <!-- Main row -->
                    
                   
    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



        <?php include ("body_js.php"); ?>
    </body>
</html>