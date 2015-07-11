<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script>
            $(document).ready(function(){
                $('.btn.btn-default').click(function(){
                    var id=$(this).data('id');
                    //alert('value='+id);
                    var datast='id='+id;
                    $.ajax({
                        type:'POST',
                        url:'editmodalview.php',
                        data:datast,
                        success:function(result){
                            var returnData= JSON.parse(result);
                            //console.log(returnData.username);
                            $('#idedit').val(returnData.id);
                            $('#useredit').val(returnData.username);
                            $('#passedit').val(returnData.password);
                            $('#emailedit').val(returnData.email);
                            $('#fullnameedit').val(returnData.fullname);
                            $('#designationedit').val(returnData.designation);
                            $('#created_onedit').val(returnData.created_on);
                            $('#last_loginedit').val(returnData.last_login);
                            
                        },
                        error:function(){
                            alert("error");
                        }
                    });
                    
                });
            });
        </script>
    </head>
    <body>
        <div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">USER INFORMATIONS UPDATE</h3>
        </div>
        <div class="modal-body">
          <center><form action="editform.php" method="POST"> 
              <table id="vieweditTable" class="editTableview">
                        
                    <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-key'></i></span>
                                        <input type='text' class='form-control'  name='id' id='idedit' readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-user'></i></span>
                                        <input type='text' class='form-control'  name='user' id='useredit'  readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-lock'></i></span>
                                        <input type='text' class='form-control'  name='pass' id='passedit'  readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-envelope'></i></span>
                                        <input type='text' class='form-control'  name='email' id='emailedit'  >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-male'></i></span>
                                        <input type='text' class='form-control'  name='fullname' id='fullnameedit'  >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-briefcase'></i></span>
                                        <input type='text' class='form-control' name='designation' id='designationedit' >
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-calendar'></i></span>
                                        <input type='text' class='form-control' name='created_on' id='created_onedit'  readonly>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-clock-o'></i></span>
                                        <input type='text' class='form-control' name='last_login' id='last_loginedit'  readonly>
                        </div>
                    </td>
                </tr>         
                         
                    </table> </center>
        </div>
        <div class="modal-footer" style="background:#3c8dbc;">
         <input type="submit" id ="editsubmit" value="Submit"/></form>
        </div>
      </div>
      
    </div>
  </div>
    </body>
</html>