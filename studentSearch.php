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
        <title>Student Search</title>
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
                        Student Finder
                        <small>Search</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Student</li><li>Search</li>
                    </ol>
                </section>
<?php  include("studentViewModal.php"); include("editstudentmodal.php"); ?>
                <!-- Main content -->
                <section class="content">
                        <!-- Main row -->         <center>
                    <div id="notification"></div>
                    <div class="row">
                        
                        <div class="col-xs-12">
                            <!-- general form elements disabled -->
                            <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title"><i class="ion ion-search"></i>&nbsp;&#160;Advanced Search Form</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form">
                                        <!-- text input -->
                                        <div class="form-group col-md-12">
                                            <label>Year of Passing</label>
                                            <input type="text" class="form-control" placeholder="Enter ... in Format YYYY" id="yop_search"/>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Last Qualification of Student</label>
                                            <select multiple class="form-control" id="last_qual_search" >
                                                <?php
											$quals = getAlllast_qual();
											foreach ( $quals as $qual ) {
												echo "<option value='" . $qual ['last_qualify'] . "'>" . $qual ['last_qualify'] . "</option>";
											}
											?>
                                            </select>
                                        
                                       
                                            <label>Last Qualification Marks</label>
                                            <input type="text" class="form-control" placeholder="Enter ...in Format two Digits e.g-78 for 78%" id="last_qual_marks_search" style="height:80px;"/>
                                        </div>

                                        <!-- select -->
                                        </br>
                                        <div class="form-group col-sm-6" style="margin-top=none;">
                                            <label>Degree of Student</label>
                                            <select multiple="multiple" class="form-control select2" id="degree_search" >
                                               <?php
											$degrees = getAlldegree();
											foreach ( $degrees as $degree ) {
												echo "<option value='" . $degree ['degree'] . "'>" . $degree ['degree'] . "</option>";
											}
											?> 
                                            </select>
                                        
                                            <label>Department of Student</label>
                                            <select multiple class="form-control" id="dept_search">
                                                <?php
											$depts = getAlldept();
											foreach ( $depts as $dept ) {
												echo "<option value='" . $dept ['dept'] . "'>" . $dept ['dept'] . "</option>";
											}
											?>
                                            </select>
                                        </div>
                                         

                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger btn-lg" id="search">Search</button>
                                        </div>
                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </center>
                    <!-- Main row -->
                    
                     <div class="row">
                        <div class="col-xs-12">    
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Student Search Table</h3>                                    
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
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
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
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="row">
									<div class="col-sm-2 pull-right" id="tablebox"></div>
								</div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
    
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

<?php include("emailmodal.php"); ?>
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
            var sTable;
            $(function() {
                
                sTable=$("#example1").dataTable();
                 
                 
            
                $("#search").click(function(){
                    var last_qual=$("#last_qual_search").val();
                    var last_marks=$("#last_qual_marks_search").val();
                    var degree=$("#degree_search").val();
                    var dept=$("#dept_search").val();
                    var yop=$("#yop_search").val();
                    if (last_qual===null)
                    {
                        last_qual="";
                    }
                     if (degree===null)
                    {
                        degree="";
                    }
                     if (dept===null)
                    {
                        dept="";
                    }
                    //alert(last_qual+last_marks+degree+dept+yop);
                    var datast='last_qual='+last_qual+'&last_marks='+last_marks+'&degree='+degree+'&dept='+dept+'&yop='+yop;
                    $.ajax({
                        type:'POST',
                        url:'searchStudapi.php',
                        data:datast,
                        beforeSend: function ( xhr ) {                	
	                	  sTable.fnClearTable();
	                },
                        success: function(data){              
					console.log("==="+data);
					data=JSON.parse(data);
				      if(data == false){
				    	  $('#notification').append("<div class='alert alert-danger alert-dismissable'><i class='fa fa-ban'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>Alert!   </b>No Records Found</div>");

						}else{
                     jQuery.each(data, function(i, r){	                      
	                        var clicktourl=r.id;
	                        var linkgoto='<a href="#'+clicktourl+'"><button title="view" class="btn btn-success"><i class="glyphicon glyphicon-search"></i></button></a>';
	         

	                        sTable.fnAddData( [r.id, r.name, r.email, r.dept, r.degree, r.phone,linkgoto ]);
	                       
	                    });         
                     $('#tablebox').empty();
                     $('#tablebox').append('<button id="mail" class="btn btn-info form-control" data-toggle="modal" data-target="#emailStudModal"><i class="fa fa-envelope"></i> Send mail</button>');
				      }
				    
	                },
                         error: function(data){

	                	alert("error while processing");

	                }

                    });
                });
                
            });
        </script>
                    
       

                
    </body>
</html>