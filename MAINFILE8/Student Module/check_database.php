<?php
require_once 'conn.php';
if(!empty(extract($_POST)))
{
	$conn1=createconn1();
	mysqli_select_db($conn1,"projectsubmission");
	$admin_proj_time_query=mysqli_query($conn1,"SELECT * from admin where a_type='root'");
	date_default_timezone_set("Asia/Kolkata");
	$current_date=date("Y-m-d");
	$row=mysqli_fetch_array($admin_proj_time_query);
	$stage=$_POST["id"];
	$row1=mysqli_fetch_array(mysqli_query($conn1,'SELECT * from project where s_id='.$_POST["s_id"].' AND proj_select="Selected"'));
	if($row['proj_starting_date']==NULL|| $row['proj_ending_date']== NULL){
		$return_data["dates"]="Not Alloted";
	}else if($row["proj_starting_date"]>$current_date){
		$return_data["dates"]="beforedate";
		$return_data["proj_starting_date"]=$row["proj_starting_date"];
	}else if($row["proj_ending_date"]<$current_date){
		$return_data["dates"]="expired";
		$return_data["proj_ending_date"]=$row["proj_ending_date"];	
	}else if($row1["stage".$stage."_stat"]=="Submitted"){
		$return_data["waiting"]="wait";
	}else if($row1["stage".$stage."_stat"]=="Accepted"){
		$return_data["fileaccepted"]="yes";
	}else{
		if($stage>1)
		{
			$prev_id=$stage-1;
			$stage="stage".(string)$prev_id;
			$row=mysqli_fetch_array(mysqli_query($conn1,'SELECT * from project where s_id='.$_POST["s_id"].' AND proj_select="Selected"'));	
			for($i=$prev_id;$i>=1;$i--){
				$stage = "stage".(string)$i;
				if($row[$stage."_stat"]=="Rejected"){
					$return_data["prev_rejected"]="yes";
					$return_data["stagenum"] = $i;
				}else if($row[$stage."_stat"]=="Submitted"){
					$return_data["prev_submitted"]="yes";
					$return_data["stagenum"] = $i;
				}else if($row[$stage."_stat"]==NULL){
					$return_data["project"]="Notyetsubmitted";
					$return_data["stagenum"] = $i;
				}else{
					$return_data["success"]="success";	
				}
			}	
		}else{
			$return_data["success"]="success";	
		}
	}
	echo json_encode($return_data);
	exit();
}

?>