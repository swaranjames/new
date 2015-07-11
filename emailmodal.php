<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    </head>
<body><!-- Modal -->
  <div class="modal fade" id="emailStudModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background:#3c8dbc; color:white;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">STUDENT E-MAIL</h3>
        </div>
        <div class="modal-body">
         
          <center>
              <div class="box-body">
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <label>Recepient</label>
                                            <input type="email" class="form-control" name="emailto" value="Students Searched" readonly/>
                                        </div>
                                        <div class="form-group">
                                            <lable>Subject of the Mail</lable>
                                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required/>
                                        </div>
                                        <div>
                                            <label>Body of the Mail</label>
                                           
                                        <textarea id="mailbody" class="textarea" placeholder="Place some text here" style="width: 100%; height: 248px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>                      
                                    
                               
                                        </div>
                                    </form>
                                </div>
          </center>
        </div>
        <div class="modal-footer" style="background:#3c8dbc;">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="sendmail">Send Mail</button>
            
        </div>
      </div>
      
    </div>
  </div>
    <script>
        $(document).ready(function(){
            $('#sendmail').click(function(){
                //alert('sendmail');
                  var last_qual=$("#last_qual_search").val();
                    var last_marks=$("#last_qual_marks_search").val();
                    var degree=$("#degree_search").val();
                    var dept=$("#dept_search").val();
                    var yop=$("#yop_search").val();
                    var sub=$("#subject").val();
                    var body=$("#mailbody").val();
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
                var datast='last_qual='+last_qual+'&last_marks='+last_marks+'&degree='+degree+'&dept='+dept+'&yop='+yop+'&sub='+sub+'&body='+body;
                //alert(datast);
                $.ajax({
                    type:'POST',
                    url:'send_mailapi.php',
                    data:datast,
		       	                beforeSend: function ( xhr ) {          	
		       	                	
		       	                },
		       	                success: function(data){              
		       					console.log("==="+data);
		       					data=JSON.parse(data);
		       				      if(data == false){alert('Fail to send mail.');}else{
		       				    	
		       				    	$('#notification').append('<div class="alert alert-success alert-dismissable"><i class="fa fa-check"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><b>Alert!</b>Your Emails has been send....<b>Success</b></div>');
		       				    	
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