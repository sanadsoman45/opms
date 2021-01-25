<?php
      require_once 'conn.php';
      $conn1=createconn1();
      mysqli_select_db($conn1,"projectsubmission");
      if($_POST["func"] == "checkMessages"){
            $arr=[];
            $query= mysqli_query($conn1, "SELECT reject_message,message_time FROM rejected_proj_table WHERE s_id=".$_POST['sid']." order by message_time");
            $a=0;
            while($query_rows = mysqli_fetch_array($query)){
                  $arr[$a] = $query_rows["reject_message"];
                  $return_data["messageTime"] = $query_rows["message_time"];
                  $a++;
            }
            $return_data["allMessage"] = $arr;
            $query_row = mysqli_fetch_array(mysqli_query($conn1, "SELECT student.s_name, admin.proj_ending_date
                                                                  FROM student
                                                                  INNER JOIN admin ON a_type='root'
                                                                  WHERE student.s_id=".$_POST["sid"]));
            $return_data["sname"] = $query_row["s_name"];
            $return_data["proEndDate"] = $query_row["proj_ending_date"];
            $query1=mysqli_fetch_array(mysqli_query($conn1, "SELECT proj_name FROM project WHERE s_id=".$_POST['sid']." AND proj_select='Selected'"));
            $return_data["proName"] = $query1["proj_name"];
      }else if($_POST["func"] == "myproject"){
            $query= mysqli_query($conn1, "SELECT * FROM project WHERE s_id=".$_POST['sid']." AND (proj_status='Active' OR proj_status='Completed')order by proj_create_time");
            $total_rows = mysqli_num_rows($query);
            for($i=0;$i<$total_rows;$i++){
                        $query_rows = mysqli_fetch_array($query);
                  for($j=0;$j<4;$j++){
                        if($j==0){
                              $a=$query_rows["proj_select"];
                        }elseif($j==1){
                              $a=$query_rows["proj_name"];
                        }elseif($j==2){
                              $a=$query_rows["proj_description"];
                        }else{
                              $a=$query_rows["proj_type"];
                        }
                        $arr[$i][$j] = $a;
                  }
            }
            $return_data["allData"] = $arr;
      }else if($_POST["func"] == "selProj"){
            $projectname = $_POST['selectedProj'];
            if(mysqli_query($conn1, "UPDATE project SET proj_select=NULL WHERE s_id=".$_POST['sid'])){
                  if(mysqli_query($conn1, "UPDATE project SET proj_select='Selected' WHERE s_id=".$_POST['sid']." AND proj_name='$projectname'")){
                        $return_data["selProj"] = "yes";
                  }else{
                        $return_data["selProj"] = "no";
                  }
            }else{
                  $return_data["selProj"] = "no";
            }
            
      }else if($_POST["func"] == "changeSave"){
            $descriptionData = $_POST['descData'];
            $query_rows = mysqli_fetch_array(mysqli_query($conn1, "SELECT s_pass FROM student WHERE s_id=".$_POST['sid']));
            if($query_rows['s_pass'] !=  md5($_POST['passcode'])){
                  $return_data["password"] = "wrong";
            }else if(mysqli_query($conn1, "UPDATE project SET proj_description='$descriptionData' WHERE s_id=".$_POST['sid']." AND proj_select='Selected'")){
                  $return_data["saveChanges"] = "yes";
            }else{
                  $return_data["saveChanges"] = "no";
            }
      }else if($_POST["func"] == "delPro"){
            $projName = $_POST['projName'];
            $query_rows = mysqli_fetch_array(mysqli_query($conn1, "SELECT s_pass FROM student WHERE s_id=".$_POST['sid']));
            if(md5($_POST['passcode']) != $query_rows["s_pass"]){
                  $return_data["password"] = "wrong";
            }else if(mysqli_query($conn1, "DELETE FROM project WHERE s_id=".$_POST['sid']." AND proj_name='$projName'")){
                  $project_count = mysqli_num_rows(mysqli_query($conn1, "SELECT * FROM project WHERE s_id=".$_POST['sid']." AND proj_status='Active' OR proj_status='Completed'"));
                  if($project_count != 0){
                        if(mysqli_query($conn1, "UPDATE project SET proj_select='Selected' WHERE s_id=".$_POST['sid']." AND (proj_status='Active' OR proj_status='Completed') LIMIT 1")){
                              $return_data["deleteProj"] = "yes";
                        }else{
                              $return_data["reportadmin"] = "yes";
                        }
                  }else{
                        $return_data["noAnyData"] = "yes";
                  }
            }else{
                  $return_data["deleteProj"] = "no";
            }
      }else if($_POST["func"] == "checkProject"){
            $query_rows = mysqli_fetch_array(mysqli_query($conn1, "SELECT * FROM project WHERE s_id=".$_POST['sid']." AND (proj_status='Completed' OR proj_status='Active')"));
            if($query_rows == 0){
                  $return_data["projData"] = "no";
            }else{
                  $return_data["projData"] = "yes";
            }

      }else if($_POST["func"] == "rejectedReason"){
            $stage = $_POST["stage"];
            $row = mysqli_fetch_array(mysqli_query($conn1, "SELECT ".$stage."_reje_reason FROM project WHERE s_id=".$_POST['sid']." AND proj_select='Selected'"));
            $return_data["rejectReason"] = $row[$stage."_reje_reason"];
      }else if($_POST["func"] == "downloadStageFile"){
            $row = mysqli_fetch_array(mysqli_query($conn1, "SELECT stage".$_POST["stage"]."_file FROM project WHERE s_id=".$_POST["sid"]." AND proj_select='Selected'"));
            $return_data["dlfile"] = $row["stage".$_POST["stage"]."_file"];
      }
      echo json_encode($return_data);
      mysqli_close($conn1);
?>