<?php
include('dbquery.php');
if(isset($_POST['id']))
{
    $arr=viewModalquery($_POST['id']);
    if($arr)
    {
        $html="<tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-key'></i></span>
                                        <input type='text' class='form-control'  name='id' id='id' value=".$arr['id']." disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-user'></i></span>
                                        <input type='text' class='form-control'  name='user' id='user' value=".$arr['username']." disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-lock'></i></span>
                                        <input type='text' class='form-control'  name='pass' id='pass' value=".$arr['password']." disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-envelope'></i></span>
                                        <input type='text' class='form-control'  name='email' id='email' value=".$arr['email']." disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-male'></i></span>
                                        <input type='text' class='form-control'  name='fullname' id='fullname' value=".$arr['fullname']." disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-briefcase'></i></span>
                                        <input type='text' class='form-control' name='designation' id='designation' value=".$arr['designation']." disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-calendar'></i></span>
                                        <input type='text' class='form-control' name='created_on' id='created_on' value=".$arr['created_on']." disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class='input-group' style='width:428px;'>
                                        <span class='input-group-addon' style='width:40px;'><i class='fa fa-clock-o'></i></span>
                                        <input type='text' class='form-control' name='last_login' id='last_login' value=".$arr['last_login']." disabled>
                        </div>
                    </td>
                </tr>";
    }
    else{
        $html="";
    }
    echo $html;
}

?>