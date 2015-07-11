<html> 
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
       
            <script>
                $(document).ready(function(){
                $('button.btn.btn-success').click(function(){
                    var id=$(this).data('id');
                    var datast='id='+id;
                    $.ajax({
                        type:'POST',
                        url:'viewStudentcall.php',
                        data:datast,
                        success:function(result){
                            var res=JSON.parse(result);
                            $('#studname').val(res.name);
                            $('#studdob').val(res.dob);
                            $('#last_qual').val(res.last_qualify);
                            $('#studpercent').val(res.last_qualify_marks);
                            $('#degree').val(res.degree);
                            $('#dept').val(res.dept);
                            $('#studyop').val(res.year_of_passing);
                            $('#studemail').val(res.email);
                            $('#studphone').val(res.phone);
                            $('#approved').val(res.added_by);
                            
                        },
                        error:function(){
                            alert("error");
                        }
                    });
                    
                });
            });
                
            </script>
    </head>
    
    <body><!-- Modal -->
  <div class="modal fade" id="viewStudModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">STUDENT VIEW</h3>
        </div>
        <div class="modal-body">
         
          <center>
                                        <div class="box box-warning">
                                <div class="box-header">
                                    <h3 class="box-title"></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <form role="form" ></form>
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Enter ..." name="studname" id="studname" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" class="form-control" placeholder="Enter in format yyyy-mm-dd" id="studdob" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Qualification</label>
                                            <select class="form-control" id="last_qual" readonly>
                                                <option value="Higher Secondary">Higher Secondary</option>
                                                <option value="B.sc">B.sc</option>
                                                <option value="M.sc">M.sc</option>
                                                <option value="B.com">B.com</option>
                                                <option value="BA">BA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Marks in Last Qualification</label>
                                            <input type="text" class="form-control" placeholder="Enter in Percentage" id="studpercent" readonly/>
                                        </div>
                                        <?php //include("dbquery.php"); ?>
                                        <div class="form-group">
                                            <label>Degree in</label>
                                            <select class="form-control" id="degree" readonly>
                                               <option value="B.Tech" >B.Tech</option>
                                                <option value="M.Tech">M.Tech</option>
                                                <option value="Computer Application">Computer Application</option>
                                                <option value="Management">Management</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Department</label>
                                            
                                            <select class="form-control" id="dept" readonly>
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
                                            <input type="text" class="form-control" name="studyop" id="studyop" readonly/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="studemail" id="studemail" placeholder="Will be used to communicate" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="studphone" id="studphone" placeholder="Will be used to communicate" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <label>Approved By</label>
                                            <input type="email" class="form-control" value="<?php echo $_SESSION['s_user'] ?>" id="approved"  readonly/>
                                        </div>
                                    </form>
                                </div><!-- /.box-body -->
                            </div>    
              
              
          </center>
        </div>
        <div class="modal-footer" style="background:#3c8dbc;">
          <button type="button" class="btn btn-warning" data-dismiss="modal" >Close</button>
        </div>
      </div>
      
    </div>
  </div>
 </body> 
</html>