<?php
      require_once 'conn.php';
      $conn1=createconn1();
      mysqli_select_db($conn1,"projectsubmission");
      $function = $_POST["func"];
      if($function == "setLoadDate"){
            $query_rows = mysqli_fetch_array(mysqli_query($conn1, "SELECT * FROM admin WHERE a_type='root'"));
            $return_data["startingDate"]=$query_rows["proj_starting_date"];
            $return_data["endingDate"]=$query_rows["proj_ending_date"];
      }elseif ($function == "querieDoubts") {
            $arr=[];
            $query= mysqli_query($conn1, "SELECT user_gi_pin, user_type, user_email, user_doubt, message_time, message_status FROM queries_doubts order by message_time");
            $total_rows = mysqli_num_rows($query);
            for($i=0;$i<$total_rows;$i++){
                  $query_rows = mysqli_fetch_array($query);
                  for($j=0;$j<6;$j++){
                        if($j==0){
                              $a=$query_rows["user_gi_pin"];
                        }elseif($j==1){
                              $a=$query_rows["user_type"];
                        }elseif($j==2){
                              $a=$query_rows["user_email"];
                        }elseif($j==3){
                              $a=$query_rows["user_doubt"];
                        }elseif($j==4){
                              $a=$query_rows["message_time"];
                        }else{
                              $a=$query_rows["message_status"];
                        }
                        $arr[$i][$j] = $a;
                  }
            }
            $return_data["allDoubts"] = $arr;
      }elseif($function == "checkBox"){
            $data = $_POST["data"];
            $status = $_POST["status"];
            if(!(mysqli_query($conn1, "UPDATE `queries_doubts` SET `message_status`='$status' WHERE user_gi_pin=".$_POST["grno"]." AND user_doubt='$data'"))){
                  $return_data["check"] = "UPDATE `queries_doubts` SET `message_status`='$status' WHERE user_gi_pin=".$_POST["grno"]." AND user_doubt='$data'";
            }
      }
      echo json_encode($return_data);
      mysqli_close($conn1);
?>