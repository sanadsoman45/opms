<?php
$conn1=mysqli_connect("localhost","root","");
mysqli_select_db($conn1,"projectsubmission");
 
$query=mysqli_query($conn1,"SELECT s_id,s_name,s_gr,s_pn,s_email,'NOT YET ASSIGNED' from college_database.stud_table where s_id NOT IN (SELECT s_id from projectsubmission.student)");
if(mysqli_num_rows(mysqli_query($conn1,"SELECT * FROM teacher where t_id not in (SELECT t_id from college_database.teac_table)"))>0)
{
	mysqli_query($conn1,"DELETE FROM teacher where t_id not in (SELECT t_id from college_database.teac_table)");
}

if(mysqli_num_rows(mysqli_query($conn1,"SELECT * FROM student where s_id not in (SELECT s_id from college_database.stud_table)"))>0)
{
	mysqli_query($conn1,"DELETE from student where s_id not in (SELECT s_id from college_database.stud_table)");	
}

if(mysqli_num_rows($query)>0)
{
	$arr1=[];
	$arr2=[];
	$arr3=[];
	$total_rows=mysqli_query($conn1,"SELECT s_id,s_email,s_name from college_database.stud_table where s_id NOT IN (SELECT s_id from projectsubmission.student) order by s_id");
    $a=0;
    while($rows= mysqli_fetch_array($total_rows)){
        $arr1[$a]=$rows['s_id'];
        $arr2[$a]=$rows['s_email'];
        $arr3[$a]=$rows['s_name'];
        $a++;
    }
	mysqli_query($conn1,"INSERT INTO student(s_id,s_name,s_gr,s_pn,s_email,group_id) SELECT s_id,s_name,s_gr,s_pn,s_email,'NOT YET ASSIGNED' from college_database.stud_table where s_id NOT IN (SELECT s_id from projectsubmission.student) order by s_id");
	for($i=0;$i<count($arr1);$i++){
		$vkey = base64_encode($arr1[$i]);
		$source = base64_encode("student");
    	$msg="Hi"." ".explode("@",$arr3[$i].' '.$arr1[$i])[0].",\n A new Account Has been created for You.\n Click the url below to activate your account and select a password! \n http://localhost/pro/MAINFILE8/Admin%20Module/setPassword.php?vkey=$vkey&source=$source \n If the above URL does not work try copying and pasting it into your browser. If you continue to have problems, please feel free to contact us.\nRegards\nAdmin,";
	    $msg=nl2br($msg);
	    $headers = "From:sanadsoman871@gmail.com";
    	mail($arr2[$i],"Account Creation",$msg,$headers);
    }
}
	
$teac_total_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT group_id from teacher"));
$stud_total_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT s_id from college_database.stud_table"));
if($teac_total_rows==0)
{
	mysqli_query($conn1,"UPDATE student set group_id='NOT YET ASSIGNED'");
}

if($teac_total_rows>0)
{
	 $remaining_stud_total_rows=0;
	 $remaining_teac_total_rows=$teac_total_rows;
	 $stud_total_rows1 = $stud_total_rows;
	 $z=0;
	 for($i=0;$i<$teac_total_rows;$i++){
	       $remaining_stud_total_rows = ceil($stud_total_rows / $remaining_teac_total_rows);
	       for($j=0;$j<$remaining_stud_total_rows;$j++){
	              mysqli_query($conn1, "UPDATE student set group_id=(SELECT group_id from teacher order by group_id LIMIT $i,1) where s_id IN (SELECT s_id from (SELECT s_id from student order by s_id LIMIT $z,1)l)");
	              $z++;
	        }
	        $remaining_teac_total_rows--;
	        $stud_total_rows = $stud_total_rows - $remaining_stud_total_rows;
	  }
}

?>