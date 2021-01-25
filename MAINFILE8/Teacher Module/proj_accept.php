<?php
require_once 'conn.php';
$conn1=createconn1();
if(!empty(extract($_POST)))
{
	mysqli_select_db($conn1,"projectsubmission");
	if($_POST["project"]=="acceptproject")
	{
		$selected_rows_count = mysqli_num_rows(mysqli_query($conn1,"SELECT * FROM `project` WHERE proj_select='Selected' AND s_id=".$_POST["id"]));
		$projname = $_POST["projName"];
		$row=mysqli_fetch_array(mysqli_query($conn1,"SELECT proj_name from project where s_id=".$_POST["id"]));
		if(mysqli_query($conn1,"UPDATE project set proj_status='Active' where s_id=".$_POST["id"]." AND proj_name='$projname'"))
		{
			if($selected_rows_count == 0){
				mysqli_query($conn1,"UPDATE project set proj_select='Selected' where s_id=".$_POST["id"]." AND proj_name='$projname'");
			}
			$msg="Your Project ". $projname ." Has Been Accepted";
			if(mysqli_query($conn1,"INSERT into rejected_proj_table (s_id,reject_message) values($id,'$msg')"))
			{
				$return_data["proj_status"]="Accepted";
			}
		}
		else
		{
			$return_data["proj_status"]="Error";	
		}
	}
	else if($_POST["project"]=="rejectproject")
	{
		$id=$_POST["id"];
		$content=$_POST["content"];
		$projname = $_POST["projName"];
		if(mysqli_query($conn1,"DELETE FROM project where s_id=".$_POST["id"]." AND proj_name='$projname'"))
		{
			$selected_rows_count = mysqli_num_rows(mysqli_query($conn1,"SELECT * FROM `project` WHERE proj_select='Selected' AND s_id=".$_POST["id"]));
			if($selected_rows_count == 0){
				mysqli_query($conn1,"UPDATE project set proj_select='Selected' where s_id=".$_POST["id"]." AND proj_status!='Submitted' LIMIT 1");
			}
			$msg="Your Project ". $projname ." Has Been Rejected Because ".$content;
			if(mysqli_query($conn1,"INSERT into rejected_proj_table (s_id,reject_message) values($id,'$msg')"))
			{
				$return_data["proj_status"]="Rejected";
			}
		}
		else
		{
			$return_data["proj_status"]="Error";
		}		
	}else if($_POST["project"]=="checkSupervisor"){
		$query_rows=mysqli_fetch_array(mysqli_query($conn1,"SELECT t_type from teacher where t_id=".$_POST["tid"]));
		$return_data["teac_type"] = $query_rows["t_type"];
	}else if($_POST["project"] == "accepted"){
		$proj_name = $_POST["proj_name"];
		preg_match_all('!\d+!', $_POST["stage"], $matches);
		$stage_num = (int) filter_var($_POST["stage"], FILTER_SANITIZE_NUMBER_INT);

		if(mysqli_query($conn1, "UPDATE project SET ".$_POST["stage"]."_stat='Accepted' WHERE s_id=".$_POST["s_id"]." AND proj_name='$proj_name'")){
			mysqli_query($conn1, "INSERT INTO rejected_proj_table(s_id, reject_message) VALUES(".$_POST["s_id"].", 'Your Stage ".$stage_num." Has Been Accepted')");
			$return_data["accp"]="yes";
		}else{
			$return_data["accp"]="no";
		}
	}else if($_POST["project"] == "rejected"){
		$proj_name = $_POST["proj_name"];
		$reason = $_POST["reason"];
		$stage_num = (int) filter_var($_POST["stage"], FILTER_SANITIZE_NUMBER_INT);

		if(mysqli_query($conn1, "UPDATE project SET ".$_POST["stage"]."_stat='Rejected', ".$_POST["stage"]."_reje_reason='$reason' WHERE s_id=".$_POST["s_id"]." AND proj_name='$proj_name'")){
			mysqli_query($conn1, "INSERT INTO rejected_proj_table(s_id, reject_message) VALUES(".$_POST["s_id"].", 'Your Stage ".$stage_num." Has Been Rejected')");
			$return_data["accp"]="yes";
		}else{
			$return_data["accp"]="no";
		}
	}else if($_POST["project"] == "DLViewStageFile"){
		$projName = $_POST["projName"];
        $row = mysqli_fetch_array(mysqli_query($conn1, "SELECT ".$_POST["stage"]."_file FROM project WHERE s_id=".$_POST["sid"]." AND proj_name='$projName'"));
        $return_data["dlfile"] = $row[$_POST["stage"]."_file"];
    }else if($_POST["project"] == "CompletedPro"){
    	$projName = $_POST["projName"];
    	if(mysqli_query($conn1, "UPDATE `project` SET `proj_status`='Completed' WHERE s_id=".$_POST["sid"]." AND proj_name='$projName'")){
			$return_data["accep"]="yes";
		}else{
			$return_data["accep"]="no";
		}
    }
	echo json_encode($return_data);
	exit();    
}
?>