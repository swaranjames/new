<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
        <script>
            $(document).ready(function(){
                $('button.btn.btn-success').click(function(){
                    var id=$(this).data('id');
                   // alert('value='+id);
                    var datast='id='+id;
                    $.ajax({
                        type:'POST',
                        url:'viewmodalcall.php',
                        data:datast,
                        success:function(result){
                            $('#viewTable').empty();
                            $('#viewTable').append(result);
                            
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
        <div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">USER INFORMATIONS</h3>
        </div>
        <div class="modal-body">
         
          <center>  <table id="viewTable">
                    </table> </center>
        </div>
        <div class="modal-footer" style="background:#3c8dbc;">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
        </div>
      </div>
      
    </div>
  </div>
    </body>
</html>