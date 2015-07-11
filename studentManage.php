
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
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('button.btn.btn-info').click(function(){
                    var id=$(this).data('id');
                    var res=confirm("Are You sure to delete the student with id="+id);
                    if(res)
                    {
                        var datast='id='+id;
                        
                        $.ajax({
                            type:'POST',
                            url:'delStudentCall.php',
                            data:datast,
                            success:function(res){
                                //alert(res);
                                window.location.href='studentManage.php';
                            },
                            error:function(){
                                alert('Problem in deletion');
                            }
                            
                        });
                    }
                    else
                    {
                    }
                });
            });
            
        </script>

        
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
                        Student Registration
                        <small>Search</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Student</li><li>Registration</li>
                    </ol>
                </section>
<?php include('addstudentmodal.php'); include("studentViewModal.php"); include("editstudentmodal.php"); ?>
                <!-- Main content -->
                <section class="content"></br>
                <div id="notification"></div>
</br>                                        
                <center><button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addStudentModal">+ Student</button></center></br></br>

                    <!-- Main row -->
                     <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Student Table</h3>                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Dept.</th>
                                                <th>Degree</th>
                                                <th>Phone</th>
                                                <th>Actions</th>
                                                <th>Semester</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $arr=selectStudentTable();
                                            while($row=mysql_fetch_array($arr))
                                            {
                                    echo     "<tr>
                                                <td>".$row['id']."</td>
                                                <td>".$row['name']."</td>
                                                <td>".$row['email']."</td>
                                                <td>".$row['dept']."</td>
                                                <td>".$row['degree']."</td>
                                                <td>".$row['phone']."</td>
                                                <td>
                                                <div class='btn-group'>
                                                      <button type='button' class='btn btn-success' data-toggle='modal' data-target='#viewStudModal' data-id='".$row['id']."'>View</button>
                                                      <button type='button' class='btn btn-default' data-toggle='modal' data-target='#editStudModal' data-id='".$row['id']."'>Edit</button>
                                                      <button type='button' class='btn btn-info' data-id='".$row['id']."'>Delete</button>   
                                                     </div>
                                                </td>
                                                <td>
                                                <button type='button' class='btn btn-warning' data-toggle='modal' data-target='#editStudModal' data-id='".$row['id']."'>Update Sem</button>
                                                </td>
                                            </tr>";}  ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Dept.</th>
                                                <th>Degree</th>
                                                <th>Phone</th>
                                                <th>Actions</th>
                                                <th>Semester</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


    <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>
                
    </body>
</html>