<html> 
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
       
            <script>
                
        </script>
    </head>
    
    <body><!-- Modal -->
  <div class="modal fade" id="addStudentModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">STUDENT REGISTRATION</h3>
        </div>
        <div class="modal-body">
         
          <center>
                                        <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title">Filling of Green marked feilds are mandatory</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form" action="studentregister.php" method="POST">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="studname" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter in: yyyy-mm-dd" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" name="studdob" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Qualification</label>
                                            <select class="form-control" name="last_qual" placeholder="Select" required>
                                                <option>Select</option>
                                                <option value="Higher Secondary">Higher Secondary</option>
                                                <option value="B.sc">B.sc</option>
                                                <option value="M.sc">M.sc</option>
                                                <option value="B.com">B.com</option>
                                                <option value="BA">BA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Marks in Last Qualification</label>
                                            <input type="text" class="form-control" placeholder="Enter in Percentage" name="studpercent" required/>
                                        </div>
                                        <?php //include("dbquery.php"); ?>
                                        <div class="form-group">
                                            <label>Degree in</label>
                                            <select class="form-control" name="degree" placeholder="Select" required>
                                                <option>Select</option>
                                               <option value="B.Tech" >B.Tech</option>
                                                <option value="M.Tech">M.Tech</option>
                                                <option value="Computer Application">Computer Application</option>
                                                <option value="Management">Management</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            
                                            <select class="form-control" name="dept" placeholder="Select" required>
                                                <option>Select</option>
                                                <option value="CSE" >CSE</option>
                                                <option value="ECE">ECE</option>
                                                <option value="CE">CE</option>
                                                <option value="EE">EE</option>
                                                <option value="ME">ME</option>
                                                <option value="IT">IT</option>
                                                <option value="BBA">BBA</option>
                                                <option value="MBA">MBA</option>
                                                <option value="BCA">BCA</option>
                                                <option value="MCA">MCA</option>
                                            </select>
                                        
                                        </div>
                                        <div class="form-group">
                                            <label>Year of Passing</label>
                                            <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Enter in: YYYY" name="studyop" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="studemail" placeholder="Will be used to communicate" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="studphone" placeholder="Will be used to communicate"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Approved By</label>
                                            <input type="email" class="form-control" value="<?php echo $_SESSION['s_user'] ?>" name="approved" readonly/>
                                        </div>
                                    
                                </div><!-- /.box-body -->
                            </div>    
              
              
          </center>
        </div>
        <div class="modal-footer" style="background:#3c8dbc;">
          <button type="submit" class="btn btn-default" id="subButton">Submit</button>
            </form>
        </div>
      </div>
      
    </div>
  </div>
 </body> 
</html>