<?php
	require_once 'conn.php';
	$conn1=createconn1();
	if(!empty(extract($_POST)))
	{
		mysqli_select_db($conn1,"projectsubmission");
		$row=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from project where s_id=".$_POST["sid"]." && proj_select='Selected'"));
		for($i=1;$i<=7;$i++)
		{
			if($row["stage".(String)$i."_stat"]=="Accepted")
			{
				$return_data["stage".(String)$i."_accepted"]="yes";
			}
			else if($row["stage".(String)$i."_stat"]=="Rejected")
			{
				$return_data["stage".(String)$i."_rejected"]="yes";
			}
			else if($row["stage".(String)$i."_stat"]=="Submitted")
			{
				$return_data["stage".(String)$i."_submitted"]="yes";	
			}
			else if($i>1){
				$return_data["abc"]="";
				for($x=$i;$x>1;$x--){
					if($row["stage".(String)$i."_stat"]==NULL && $row["stage".(String)($x-1)."_stat"]=="Accepted"){
						$return_data["stage".(String)$i."_normal"]="yes";
					}else if($row["stage".(String)($x-1)."_stat"]!="Accepted"){
						$return_data["stage".(String)$i."_normal"]="no";
						$return_data["stage".(string)$i."_blocked"]="yes";
						break;
					}
				}
			}else{
				$return_data["stage".(String)$i."_normal"]="yes";
			}
		}
		echo json_encode($return_data);
		exit();
	}
?>