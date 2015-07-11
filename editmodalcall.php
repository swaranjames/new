<?php

include("dbquery.php");
if(isset($_POST['id']) && isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['desig']) )
{
    $row1=editTable($_POST['id'],$_POST['fullname'],$_POST['email'],$_POST['desig']);
    if($row1)
    {
       if($_SESSION['s_id']==1)
                                          {
                                                $editBtn="<button type='button' class='btn btn-default' data-toggle='modal' data-target='#editModal' data-id=".$row1['id'].">Edit</button>";
                                                $delBtn="<button type='button' class='btn btn-info' data-toggle='modal' data-target='#delModal' data-id=".$row1['id'].">Delete</button>";
                                        }
                                            else
                                            {
                                                $editBtn="";
                                                $delBtn="";
                                            }
                                        echo "<tr id=".$row1['id'].">";
                                              
                                            echo "<td>".$row1['id']."</td>";
                                            echo "<td>".$row1['username']."</td>";
                                            echo "<td>".row1['fullname']"</td>";
                                            echo "<td>".$row1['email']."</td>";
                                            echo "<td>".$row1['created_on']."</td>";
                                            echo "<td>".$row1['last_login']."</td>";
                                            echo "<td>".$row1['designation']."</td>";
                                            echo "<td>";
                                            echo "<div class='btn-group'>
                                                      <button type='button' class='btn btn-success' data-toggle='modal' data-target='#viewModal' data-id=".$row1['id'].">View</button>
                                                      $editBtn
                                                      $delBtn
                                                     </div>";
                                            echo "</td>";
                                            
                                        echo "</tr>";
    }
}
else{
    echo "<script>alert('Edit not success');</script>";
}

?>