<?php
include("connection.php");
function login($user,$pass)
{
    $encpass=md5($pass);
    $sql="select * from usermaster where username='{$user}' and password='{$encpass}'";
    $res=mysql_query($sql);
    $arr=mysql_fetch_row($res);
    //update usermaster set last_login=sysdate() where id='{$arr['id']}'
    if($arr)
    {
        return true;     
    }
    else
    {
        return false;
    }
}
//to get allthe degrees
function getAlldegree() {
	$res = mysql_query ( "select distinct(degree) from student order by degree" );
	$result = array ();
	while ( $row = mysql_fetch_array ( $res, MYSQL_ASSOC ) ) {
		$result [] = $row;
	}
	return $result;
}

function getAlldept() {
	$res = mysql_query ( "select distinct(dept) from student order by dept" );
	$result = array ();
	while ( $row = mysql_fetch_array ( $res, MYSQL_ASSOC ) ) {
		$result [] = $row;
	}
	return $result;
}
function getAlllast_qual()
{
    $res = mysql_query ( "select distinct(last_qualify) from student order by last_qualify" );
	$result = array ();
	while ( $row = mysql_fetch_array ( $res, MYSQL_ASSOC ) ) {
		$result [] = $row;
	}
	return $result;
    
}

function searchStudents ( $last_qual,$last_marks,$degree,$dept,$yop)
{
    $sql = "Select * from student where 1=1 ";
	$whr = "";
	
	if (!empty ( $last_qual )) {
		$whr .= " and last_qualify in('$last_qual')";
	}
	if (!empty ( $last_marks )) {
		$whr .= " and last_qualify_marks >='{$last_marks}'";
	}
	if (!empty ( $degree )) {
		$whr .= " and degree in('$degree')";
	}
	if (!empty ( $dept )) {
		$whr .= " and dept in('$dept')";
	}	
    if (!empty ( $yop )) {
		$whr .= " and year_of_passing = '$yop'";
	}	
	$sql .= $whr;
    //echo $sql;
	$res = mysql_query($sql);
	$result = array ();
	while ( $row = mysql_fetch_array ( $res, MYSQL_ASSOC ) ) 
    {
		$result [] = $row;
	}
	return $result;
}

function delUserQuery($id)
{
    $sql="delete from usermaster where id='{$id}'";
    $res=mysql_query($sql);
    if($res)
    {
        return true;
    }
    else
        return false;
}
function delStudent($id)
{
    $sql="delete from student where id='{$id}'";
    $res=mysql_query($sql);
    if($res)
    {
        return true;
    }
    else
        return false;
        
}
function getStudent($id)
{
    $sql="select * from student where id='{$id}'";
    $res=mysql_query($sql);
    $arr=mysql_fetch_array($res,MYSQL_ASSOC);
    if($arr)
    {
        return $arr;
    }
    else{
        return false;
    }
}
function editStudent($id,$name,$dob,$last_qual,$percent,$degree,$dept,$yop,$email,$phone,$approved)
{
    $sql="update student set name='{$name}',dob='{$dob}',last_qualify='{$last_qual}',last_qualify_marks='{$percent}',degree='{$degree}',dept='{$dept}',year_of_passing='{$yop}',email='{$email}',phone='{$phone}',added_by='{$approved}' where id='{$id}'";
    $res=mysql_query($sql);
    if($res)
        return true;
    else
        return false;
}
function studInsert($studname,$studdob,$last_qual,$studpercent,$degree,$dept,$studyop,$studemail,$studphone,$approved)
{
    $sql="INSERT INTO `projectdb`.`student` (`id`, `name`, `dob`, `last_qualify`, `last_qualify_marks`, `degree`, `dept` ,`year_of_passing`, `email`, `phone`, `added_on`, `added_by`) VALUES (NULL, '{$studname}', '{$studdob}', '{$last_qual}', '{$studpercent}', '{$degree}', '{$dept}','{$studyop}', '{$studemail}', '{$studphone}', CURRENT_TIMESTAMP, '{$approved}');";
    $res=mysql_query($sql);
    if($res)
    {
        return true;
    }
    else
        return false;
}

function selectall($user)
{
    $sql="select * from usermaster where username='{$user}'";
    $res=mysql_query($sql);
    $arr=mysql_fetch_array($res);
    
    return $arr;
}
function editTable($id,$full,$email,$desig)
{
    $sql="update usermaster set fullname='{$full}',email='{$email}',designation='{$desig}' where id='{$id}'";
    $res=mysql_query($sql);
    if($res)
    {
        return true;
    }
    else 
        return false;
        
}
function checkUser($user)
{
    $sql="select * from usermaster where username='{$user}'";
    $res=mysql_query($sql);
    $arr=mysql_fetch_array($res);
    if($arr)
    {
        return true;
    }
    else
        return false;
}
function last_login($user)
{
    $sql="update usermaster set last_login=sysdate() where username='{$user}'";
    $res=mysql_query($sql);
}
function viewModalquery($id)
{
    $sql="select * from usermaster where id='{$id}'";
    $res=mysql_query($sql);
    $arr=mysql_fetch_array($res,MYSQL_ASSOC);
    if($arr)
    {
        return $arr;
    }
    else{
        return false;
    }
}

function selectTable()
{
    $sql="select * from usermaster";
    $res=mysql_query($sql);
    
        return $res;
}

function tableUpdate($user,$password,$fullname,$email,$desig)
{
    $sql="insert into usermaster(username,fullname,email,designation,password) values('{$user}','{$fullname}','{$email}','{$desig}','{$password}')";
    $res=mysql_query($sql);
    if($res)
    {
        $sql1="select * from usermaster where username='{$user}'";
        $res1=mysql_query($sql1);
        $row1=mysql_fetch_array($res1);
        $html= "<tr>
                                              
                                             <td>".$row1['id']."</td>
                                             <td>".$row1['username']."</td>
                                             <td>".$row1['fullname']."</td>
                                             <td>".$row1['email']."</td>
                                            <td>".$row1['created_on']."</td>
                                            <td>".$row1['last_login']."</td>
                                            <td>".$row1['designation']."</td>
                                             <td>
                                             <div class='btn-group'>
                                                      <button type='button' class='btn btn-success'>View</button>
                                                      <button type='button' class='btn btn-default'>Edit</button>
                                                      <button type='button' class='btn btn-info'>Delete</button>
                                                     </div>
                                             </td>
                                            
                                         </tr>";
    }
    else
    {
        $html="";
        echo "<script>alert(insert unsuccessful);</script>";
    }
    echo $html;
}
function selectStudentTable()
{
    $sql="select * from student";
    $res=mysql_query($sql);
    if($res)
    {
        return $res;
    }
    else
        return false;
}

function no_of_rows($table)
{
    $sql="select count(*) from ".$table;
    $res=mysql_query($sql);
    $row=mysql_fetch_array($res,MYSQL_ASSOC);
    $ret=$row['count(*)'];
    return $ret;
}
    

?>