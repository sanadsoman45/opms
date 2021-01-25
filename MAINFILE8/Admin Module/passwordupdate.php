<?php	
	require_once 'conn.php';
	$conn1=createconn1();
	date_default_timezone_set("Asia/Kolkata"); 
	
	if(!empty(extract($_POST)))
	{
		mysqli_select_db($conn1,"projectsubmission");
		$pass=md5($_POST['apw']);
		if($_POST["source"] == "admin"){
			$query_row=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from admin where a_id=$vkey"));
			$password = $query_row["a_pass"];
			$query = "UPDATE admin set a_pass='$pass' where a_id=$vkey";
		}else if($_POST["source"] == "teacher"){
			$query_row=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from teacher where t_id=$vkey"));
			$password = $query_row["t_pass"];
			$query = "UPDATE teacher set t_pass='$pass' where t_id=$vkey";
		}else{
			$query_row=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from student where s_id=$vkey"));
			$password = $query_row["s_pass"];
			$query = "UPDATE student set s_pass='$pass' where s_id=$vkey";
		}
		if($password!="")
		{
			$return_data["acccreated"]="true";
		}
		else
		{
			mysqli_query($conn1,$query);
			$return_data["updated"]="true";
			$return_data["source"]=$_POST["source"];
		}
		echo json_encode($return_data);
		mysqli_close($conn1);
		exit();
	}
?>