<?php
require_once 'conn.php';
      $conn1=createconn1();
      mysqli_select_db($conn1,"projectsubmission");
      $editdelete = $_POST["editdelete"];
      if($editdelete == "aedit"){
            $aid = $_POST["aid"];
            $eid = $_POST["eid"];
            $pnum = $_POST["pnum"];
            $first_email = $_POST["first_email"];
            $first_pnum = $_POST["first_pnum"];

            $query_row1=mysqli_fetch_array(mysqli_query($conn1,"Select * from admin where a_email='$eid' AND a_type!='deactivate sudo_user' AND a_id!='$aid'"));
            $query_row2=mysqli_fetch_array(mysqli_query($conn1,"Select * from admin where a_pn='$pnum' AND a_type!='deactivate sudo_user' AND a_id!='$aid'"));
            if($first_email==$eid && $first_pnum == $pnum){
                  $return_data["update"] = "no";
            }else{
                  if($query_row1["a_email"] && $query_row2["a_pn"]){
                        $return_data["update"]="phoneemailexist";
                  }else if($eid==$query_row1["a_email"] && $first_email!=$eid){
                        $return_data["update"]="emailexist";
                  }else if($pnum==$query_row2["a_pn"] && $first_pnum != $pnum){
                        $return_data["update"]="phoneexist";
                  }else{
                        mysqli_query($conn1, "UPDATE admin SET a_email='$eid',a_pn='$pnum' WHERE a_id=$aid");
                        $return_data["update"] = "yes";
                  }
            }
      }else if($editdelete == "adelete"){
            $aid = $_POST["aid"];
            $source = $_POST["source"];
            $query_rows = mysqli_fetch_array(mysqli_query($conn1, "SELECT * FROM teacher WHERE t_id=$aid"));
            if($source=="admin"){
                  if(mysqli_query($conn1, "UPDATE admin SET a_type='deactivate sudo_user' WHERE a_id=$aid")){
                        $return_data["update"] = "yes";
                  }else{
                        $return_data["update"] = "no";
                  }
            }else if($source=="teacher" && $query_rows["t_type"]!="Supervisor"){

                  if(mysqli_query($conn1, "DELETE FROM teacher WHERE t_id=$aid")){
                        $return_data["update"] = "yes";
                  }else{
                        $return_data["update"] = "no";
                  }
            }else{
                  $return_data["SVTeac"] = "yes";
            }
      }else if($editdelete == "adeleteall") {
            $query = "UPDATE admin SET a_type='deactivate sudo_user' WHERE a_type='sudo_user'";
            if(mysqli_query($conn1, $query)){
                  $return_data["update"] = "yes";
            }else{
                  $return_data["update"] = "no";
            }
      }else if($editdelete == "sendemail"){
            $email_id = $_POST["eid"];
            date_default_timezone_set("Asia/Kolkata");
            $current_time = date('Y-m-d') .' '.date('H:i:s');
            $source = base64_encode($_POST["source"]);
            if($_POST["source"]=="admin"){
                  $query = mysqli_fetch_array(mysqli_query($conn1,("SELECT * fROM admin WHERE a_email='$email_id'")));
                  $query1 = "UPDATE admin SET a_email_time='$current_time' WHERE a_email='$email_id'";
                  $vkey = base64_encode($query['a_id']);
            }else if($_POST["source"]=="teacher"){
                  $query = mysqli_fetch_array(mysqli_query($conn1,("SELECT * fROM teacher WHERE t_email='$email_id'")));
                  $query1 = "UPDATE teacher SET t_email_time='$current_time' WHERE t_email='$email_id'";
                  $vkey = base64_encode($query['t_id']);
            }else{
                  $query = mysqli_fetch_array(mysqli_query($conn1,("SELECT * fROM student WHERE s_email='$email_id'")));
                  $query1 = "UPDATE student SET s_email_time='$current_time' WHERE s_email='$email_id'";
                  $vkey = base64_encode($query['s_id']);
            }
            $msg="<html><body><h1>Hi ".explode("@",$email_id)[0].",</h1> <div style='font-size:1.5em'><p>A new Account Has been created for You.</p><p>Click the url below to activate your account and select a password!</p><p>http://localhost/pro/MAINFILE8/Admin%20Module/setPassword.php?vkey=$vkey&source=$source</p><p>If the above URL does not work try copying and pasting it into your browser. If you continue to have problems, please feel free to contact us.</p><p>Regards Admin.</p><div></body></html>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: PROJECT MANAGEMENT SYSTEM<cartoonlovers185@gmail.com>' . "\r\n";
            if(mail($email_id,"Account Creation",$msg,$headers))
            {
                  mysqli_query($conn1,$query1);
                  $return_data["update"]="yes";
                  $return_data["update1"]=$vkey;
            }else{
                  $return_data["update"]="no";
            }
      }else if($editdelete == "addAllData"){
            if($_POST["source"]=="teacher"){
                  $rows=(mysqli_fetch_array(mysqli_query($conn1,"select (SELECT count() from teacher)=(SELECT count() from college_database.teac_table)")));
                  if(($rows[0])==0){
                        mysqli_select_db($conn1,"college_database");
                        $row1=mysqli_num_rows(mysqli_query($conn1,"SELECT t_id from college_database.teac_table  where t_id NOT IN (SELECT t_id from projectsubmission.teacher) "));
                        $num=65;
                        for($i=0;$i<$row1;$i++)
                        {
                              $row=mysqli_fetch_array(mysqli_query($conn1,"SELECT t_id,t_name,t_email from teac_table  LIMIT $i,1"));
                              $vkey = base64_encode($row['t_id']);
                              $source = base64_encode("teacher");
                              $msg="<html><body><h1>Hi ".$row['t_name'].",</h1> <div style='font-size:1.5em'><p>A new Account Has been created for You.</p><p>Click the url below to activate your account and select a password!</p><p>http://localhost/pro/MAINFILE8/Admin%20Module/setPassword.php?vkey=$vkey&source=$source</p><p>If the above URL does not work try copying and pasting it into your browser. If you continue to have problems, please feel free to contact us.</p><p>Regards Admin.</p><div></body></html>";
                              $msg=nl2br($msg);
                              $headers = "MIME-Version: 1.0" . "\r\n";
                              $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                              $headers .= 'From: PROJECT MANAGEMENT SYSTEM<cartoonlovers185@gmail.com>' . "\r\n";
                              $chr = chr($num);
                              $group_id_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT group_id FROM projectsubmission.teacher WHERE group_id='$chr'"));
                              if($group_id_rows != 0){
                                    $row2=mysqli_fetch_array(mysqli_query($conn1,"SELECT ASCII(group_id) from projectsubmission.teacher order BY group_id desc limit 1"));
                                    $chr=chr($row2[0]+1);
                              }
                              if(mysqli_query($conn1,"INSERT into projectsubmission.teacher (t_id,t_pin,t_name,t_email,t_pn,group_id) SELECT t_id,t_pin,t_name,t_email,t_mob,'$chr' from teac_table where t_id NOT IN (SELECT t_id from projectsubmission.teacher)limit 1")){
                                    if(mail($row['t_email'],"Account Creation",$msg,$headers)){
                                          $return_data["T_Insert"] = "yes";
                                    }else{
                                          $return_data["T_Insert"] = "emailerror";
                                    }
                              }else{
                                    $return_data["T_Insert"] = "no";
                              }
                              $num++;
                        }   
                  }else{
                        $return_data["T_Insert"]="NotInsert";
                  }
            }
            else{
                  mysqli_select_db($conn1,"projectsubmission");
                  $rows=(mysqli_fetch_array(mysqli_query($conn1,"SELECT (SELECT count() FROM student)=(SELECT count() FROM college_database.stud_table)")));
                  if($rows[0]==0){
                        $teac_total_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT group_id from teacher"));
                        if($teac_total_rows!=0){
                              $stud_total_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT s_id from college_database.stud_table"));
                              $remaining_stud_total_rows=0;
                              $remaining_teac_total_rows=$teac_total_rows;
                              $stud_total_rows1 = $stud_total_rows;
                              $z=0;
                              for($i=0;$i<$teac_total_rows;$i++){
                                    $remaining_stud_total_rows = ceil($stud_total_rows / $remaining_teac_total_rows);
                                    for($j=0;$j<$remaining_stud_total_rows;$j++){
                                          $row=mysqli_fetch_array(mysqli_query($conn1,"SELECT s_id,s_name,s_email from college_database.stud_table order by s_id LIMIT $z,1"));
                                          if(mysqli_query($conn1, "INSERT INTO student(s_id,s_name,s_gr,s_pn,s_email,group_id) SELECT s_id,s_name,s_gr,s_pn,s_email,(SELECT group_id from teacher order by group_id LIMIT $i,1) FROM college_database.stud_table order by s_id LIMIT $z,1")){
                                                $vkey = base64_encode($row["s_id"]);
                                                $source = base64_encode("student");
                                                $msg="<html><body><h1>Hi ".$row["s_name"]."</h1> <p>A new Account Has been created for You.</p><p>Click the url below to activate your account and select a password!</p><p>http://localhost/pro/MAINFILE8/Admin%20Module/setPassword.php?vkey=$vkey&source=$source</p><p>If the above URL does not work try copying and pasting it into your browser. If you continue to have problems, please feel free to contact us.</p><p>Regards Admin.</p></body></html>";
                                                      $headers = "MIME-Version: 1.0" . "\r\n";
                                                      $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                                      $headers .= 'From: PROJECT MANAGEMENT SYSTEM<cartoonlovers185@gmail.com>' . "\r\n";
                                                mail($row["s_email"],"Account Creation",$msg,$headers);
                                          }
                                          $z++;
                                    }
                                    $remaining_teac_total_rows--;
                                    $stud_total_rows = $stud_total_rows - $remaining_stud_total_rows;
                              }
                              if($z == $stud_total_rows1){
                                    $return_data["T_Insert"] = "yes";
                              }else{
                                    $return_data["T_Insert"] = "no";
                              }
                        }else{
                              mysqli_query($conn1, "INSERT INTO student(s_id,s_name,s_gr,s_pn,s_email,group_id) SELECT s_id,s_name,s_gr,s_pn,s_email,'NOT YET ASSIGNED' FROM college_database.stud_table order by s_id");
                              $return_data["T_Insert"] = "yes";
                        }
                  }else{
                        $return_data["T_Insert"] = "SNotInsert";
                  }
            }
            
      }else if($editdelete == "deleteAllData"){
            $source = $_POST["source"];
            if(mysqli_num_rows(mysqli_query($conn1,("SELECT * fROM $source"))) > 0){
                  if(mysqli_query($conn1,"TRUNCATE $source")){
                        $return_data["T_Delete"] = "yes";
                  }else{
                        $return_data["T_Delete"] = "no";
                  }
            }else{
                  $return_data["T_Delete"] = "nope";
            }
      }else if($editdelete == "addTeacher"){
            $tEmailId = $_POST["tEmail"];
            $teac_row=mysqli_query($conn1,"SELECT group_id from teacher order by group_id");
            $a=65;
            $return_data["a_Add"]="";
            $return_data["b_Add"]="";
            while($rows= mysqli_fetch_array($teac_row)){
                  $return_data["a_Add"] = $return_data["a_Add"] . $rows['group_id'];
                  $return_data["b_Add"] = $return_data["b_Add"] . chr($a);
                  if(chr($a)!=$rows['group_id']){
                        break;
                  }
                  $a++;
            }
            if(mysqli_query($conn1,"INSERT INTO teacher(t_id,t_name,t_pin,t_pn,t_email,group_id) SELECT t_id,t_name,t_pin,t_mob,t_email,'".chr($a)."' FROM college_database.teac_table WHERE t_email='$tEmailId'")){
                  $return_data["T_Add"] = "yes";
            }else{
                  $return_data["T_Add"] = "no";
            }
      }
      else if ($editdelete == "addSupervisor") {
            $id=$_POST['id'];
            if(mysqli_query($conn1,"UPDATE teacher set t_type='Supervisor' where t_id=$id"))
            {
                  $return_data["T_add"]="yes";
            }
            else
            {
                  $return_data["T_Add"]="no";
            }
      }
      else if ($editdelete == "removeSupervisor") {
            $id=$_POST['id'];
            if(mysqli_query($conn1,"UPDATE teacher set t_type='Teacher' where t_id=$id"))
            {
                  $return_data["T_remove"]="yes";
            }
            else
            {
                  $return_data["T_remove"]="no";
            }
      }else if($editdelete == "setProjDate"){
            $startDate=$_POST['startDate'];
            $endDate=$_POST['endDate'];
            if(mysqli_query($conn1,"UPDATE admin set proj_starting_date='$startDate',proj_ending_date='$endDate' where a_type='root'")){
                  $return_data["setProDate"]="yes";
            }else{
                  $return_data["setProDate"]="no";
            }
      }
      echo json_encode($return_data);
      mysqli_close($conn1);
?>