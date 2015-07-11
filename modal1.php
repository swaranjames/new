<html> 
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script>
            
            $(function(){
                $('#validUser').hide();
               $('#user').change(function(){
                //alert('inside event');
                var user=$('#user').val();
                var datast='user='+user;
               //alert('inside event'+user+datast);
                $.ajax({
                    type:'POST',
                    url:'valuser.php',
                    data:datast,
                    success:function(result){
                        $('#validUser').empty();
                        $('#validUser').show();
                        $('#validUser').append(result);
                    },
                    error:function(){
                        alert("error");
                    }
                    
                    });
                });
                
                $('#subButton').click(function(){
                   // alert('jquery');
                    var user=$('#user').val();
                    var pass=$('#pass').val();
                    var fullname=$('#fullname').val();
                    var desig=$('#desig').val();
                    var email=$('#email').val();
                    var datast='user='+user+'&pass='+pass+'&fullname='+fullname+'&desig='+desig+'&email='+email;
                    
                    $.ajax({
                        type:'POST',
                        url:'tablecall.php',
                        data:datast,
                        success:function(result){
                            $('#usertable').append(result);
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">USER REGISTRATION</h3>
        </div>
        <div class="modal-body">
         
          <center>  <table>
              <tr><td id="validUser"></td></tr>
                <tr>
                    <td>
                        <div class="input-group" style="width:428px;">
                                        <span class="input-group-addon" style="width:40px;"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" placeholder="Username" pattern="/^(?=.*[a-zA-Z]{1,})(?=.*[\d]{0,})[a-zA-Z0-9]{5,10}$/" name="user" id="user">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group" style="width:428px;">
                                        <span class="input-group-addon" style="width:40px;"><i class="fa fa-lock"></i></span>
                                        <input type="text" class="form-control" placeholder="Password" name="pass" id="pass">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group" style="width:428px;">
                                        <span class="input-group-addon" style="width:40px;"><i class="fa fa-envelope"></i></span>
                                        <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="input-group" style="width:428px;">
                                        <span class="input-group-addon" style="width:40px;"><i class="fa fa-male"></i></span>
                                        <input type="text" class="form-control" placeholder="Fullname" name="fullname" id="fullname">
                        </div>
                    </td>
                </tr>
                <tr><td></td></tr>
                <tr>
                    <td>
                        <div class="form-group">
                                <label>Designation</label>
                                            <select class="form-control" name="desig" id="desig">
                                                <option selected>Select</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Officer">Officer</option>
                                                <option value="Teacher">Teacher</option>
                                                <option value="Accountant">Accountant</option>
                                                <option value="Clerk">Clerk</option>
                                            </select>
                        </div>
                    </td>
                </tr>
                
            </table> </center>
        </div>
        <div class="modal-footer" style="background:#3c8dbc;">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="subButton">Submit</button>
            
        </div>
      </div>
      
    </div>
  </div>
 </body> 
</html>