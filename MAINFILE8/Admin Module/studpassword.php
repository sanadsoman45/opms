<?php	
	require_once 'conn.php';
	$conn1=createconn1();
	date_default_timezone_set("Asia/Kolkata"); 
	
	if(!empty(extract($_POST)))
	{
		mysqli_select_db($conn1,"projectsubmission");
		$pass=md5($_POST['apw']);
		$query_row=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from student where s_id=$vkey"));
		$password = $query_row["s_pass"];
		$query = "UPDATE student set s_pass='$pass' where s_id=$vkey";
		if($password!="")
		{
			$return_data["acccreated"]="true";
		}
		else
		{
			mysqli_query($conn1,$query);
			$return_data["updated"]="true";
		}
		echo json_encode($return_data);
		mysqli_close($conn1);
		exit();
	}
?>