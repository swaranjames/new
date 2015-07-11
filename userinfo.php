<?php
session_start();
if(!isset($_SESSION['s_user']))
{
  echo "<script>window.location.href='login.php'</script>";
}


?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>User Information</title>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABES SCRIPT -->
        <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <script>
            $(document).ready(function(){
                $('button.btn.btn-info').click(function(){
                    //alert('clicked');
                    var id=$(this).data('id');
                    //
                    var con=confirm("Are you sure you want to delete the user with id="+id);
                    if(con==true)
                    {
                    var datast='delid='+id;
                    $.ajax({
                        type:'POST',
                        url:'delUser.php',
                        data:datast,
                        success:function(){
                            window.location.href='userinfo.php';
                        },
                        error:function(){
                            alert("not deleted");
                        }
                    });
                    }
                    else
                        return false;
                });
            });
        </script>

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
                                        

                            <?php include("modal1.php"); include('viewmodal.php'); include('editmodal.php'); ?>
                    <!-- Main row -->
                    <center><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="ion ion-plus-round"></i>  User</button></center>
                    </br></br>
                    <center>
                                            <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">User Information Table</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" style="height: 30px;"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped" id="usertable">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Fullname</th>
                                            <th></th>
                                            <th>Email</th>
                                            <th>Created On</th>
                                            <th>Last Login</th>
                                            <th>Designation</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            
                                        
                                        $arr=selectTable();
                                        while($row1=mysql_fetch_array($arr))
                                        {
                                            if($_SESSION['s_id']==1)
                                            {
                                                $editBtn="<button type='button' class='btn btn-default' data-toggle='modal' data-target='#editModal' data-id=".$row1['id']."><i class='glyphicon glyphicon-edit'></i></button>";
                                                $delBtn="<button type='button' class='btn btn-info' data-id=".$row1['id']."><i class='glyphicon glyphicon-trash'></i></button>";
                                            }
                                            else
                                            {
                                                $editBtn="";
                                                $delBtn="";
                                            }
                                        echo "<tr id=".$row1['id'].">";
                                              
                                            echo "<td>".$row1['id']."</td>";
                                            echo "<td>".$row1['username']."</td>";
                                            echo "<td>".$row1['fullname']."</td>";
                                            echo "<td>";
                                             $email = $row1['email'];
                                    $default = "http://geeknews.net/images/no_gravatar.jpg";
                                    $size = 80;
                                    $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
                                    
                                            echo" <img src=$grav_url class='img-circle' alt='User Image' /></td>";
                                            echo "<td>".$row1['email']."</td>";
                                            echo "<td>".$row1['created_on']."</td>";
                                            echo "<td>".$row1['last_login']."</td>";
                                            echo "<td>".$row1['designation']."</td>";
                                            echo "<td>";
                                            echo "<div class='btn-group'>
                                                      <button type='button' class='btn btn-success' data-toggle='modal' data-target='#viewModal' data-id=".$row1['id']."><i class='glyphicon glyphicon-eye-open'></i></button>";
                                                    echo  $editBtn;
                                                      if($row1['id']!=1)
                                                      {
                                                      echo $delBtn;
                                                      }
                                                    echo "</div>";
                                            echo "</td>";
                                            
                                        echo "</tr>";
                                        }?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                    </center>
                   
    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



        <?php include ("body_js.php"); ?>
    </body>
</html>