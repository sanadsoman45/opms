<?php
    session_start(); 
    require_once 'conn.php';

    

    if(isset($_POST["function"]))
    {
        if($_POST['function']=="idverify")
        {
            idverify();
        }
        else if($_POST['function']=="otpverify")
        {
            otpverify();
        }
        else if($_POST['function']=="otpval")
        {
            otpval();
        }
        else if($_POST['function']=="createbut")
        {
            createbut();
        }
    }

    function createbut()
    {
        if(!empty(extract($_POST)))
        {
            $conn1=createconn1();
            mysqli_select_db($conn1,"projectsubmission");
            $sid=$_POST["s_id"];
            $projname=$_POST["projname"];
            $projdesc=$_POST["description"];
            $projtype=$_POST["projtype"];
            
            $query=mysqli_query($conn1,"SELECT * from project where s_id=".$_POST['s_id']." && (proj_status='Active' || proj_status='Submitted')");
            $row=mysqli_fetch_array($query);
            if($projname == $row["proj_name"]){
                $return_data["query"]="samename";
            }
            elseif(mysqli_num_rows($query)==0 || $row["proj_status"]=="Completed" || $row["proj_status"]=="Rejected")
            {
                if(mysqli_query($conn1,"INSERT INTO project(s_id,proj_name,proj_description,proj_type,proj_status) VALUES($sid,'$projname','$projdesc','$projtype','Submitted')"))
                {
                    $return_data["query"]="yes";
                }
            }
            else{
                $return_data["query"]="no";
            }    
        }
        echo json_encode($return_data);
        exit();
        
    }

    function idverify()
    {
        try{
            $conn1 = createconn1();
            mysqli_select_db($conn1,"projectsubmission");
            if(!$conn1){
                $return_data["conn"] = "cno";
            }else{
                $userid=$_POST["userid"];
                $result1 = mysqli_query($conn1, "SELECT s_email, s_email_time,s_pass FROM student WHERE s_id=$userid");
                $query_row=mysqli_fetch_array($result1);
                if(mysqli_num_rows($result1)<=0){
                    $return_data['status'] ="no";
                }else if($query_row["s_pass"] == null){
                    $return_data['passnotset'] ="no";
                }else{
                    date_default_timezone_set('ASIA/KOLKATA');
                    $last_date=strtotime($query_row["s_email_time"]);
                    $current_date = strtotime("now");
                    if(($last_date + 172800) <= $current_date){
                        $_SESSION["oldDate"]=$query_row["s_email_time"];
                        $otp=rand(100000,999999);
                        $to =$query_row["s_email"];
                        $subject = "PASSWORD RESET";
                        $txt = "<html><body><label style='font-size:1.5em'>OTP IS: </label><h2 style='display: inline-block;'>".$otp."</h2>";
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: PROJECT MANAGEMENT SYSTEM<cartoonlovers185@gmail.com>';
                        if(mail($to,$subject,$txt,$headers)){
                            $return_data['sendEmail'] ="yes";
                            $_SESSION["otp"]=$otp;
                            $_SESSION["userid"]=$userid;
                        }else{
                            $return_data['sendEmail'] ="no";
                        }
                    }else{
                        $return_data['stat'] ="no";
                        $diff=($last_date + 172800)-$current_date;
                        if($diff >= 86400){
                            $diff = $diff - 86400;
                            $return_data['days']="1";
                        }else{
                            $return_data['days']="0";
                        }
                        $return_data['hms']=gmdate("H:i:s", $diff);
                    }
                }
            }
            echo json_encode($return_data);
            exit();
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            closeconn();
        }
    }
   
       
    function otpverify()
    {
        try{
            $conn1 = createconn1();
            mysqli_select_db($conn1,"projectsubmission");
            if(!$conn1){
                $return_data["conn"] = "cno";
            }else{
                date_default_timezone_set('ASIA/KOLKATA');
                $current_date = (date("Y-m-d") ." ". date("H:i:s"));
                $userid = $_SESSION["userid"];
                $otp=$_POST["otp"];
                $otpmail=$_SESSION["otp"];

                if($otp==$otpmail){
                    $return_data['status'] = "yes";
                    mysqli_query($conn1,"UPDATE student SET s_email_time='$current_date' WHERE s_id=$userid");
                }else{
                    $return_data['status'] = "no";
                }
                echo json_encode($return_data);
                exit();
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            closeconn();
        }
    }

    function otpval()
    {
        try{
            $conn1 = createconn1();
            mysqli_select_db($conn1,"projectsubmission");
            if(!$conn1){
                $returns_data["conn"] = "cno";
            }else{
                $userid=$_SESSION["userid"];
                $pass=md5($_POST["renewpass"]);
                date_default_timezone_set('ASIA/KOLKATA');
                $result1 = mysqli_query($conn1, "SELECT s_pass FROM student WHERE s_id=$userid");
                if(mysqli_num_rows($result1)>0){
                    $row1 = mysqli_fetch_array($result1);
                    if($row1["s_pass"]==$pass){
                        $returns_data['status'] =$pass;
                    }else{
                        $returns_data['status'] ="yes";
                        mysqli_query($conn1,"UPDATE student SET s_pass='$pass' WHERE s_id= $userid");
                        unset($_SESSION['userid']);
                        unset($_SESSION['otpmail']);
                        unset($_SESSION['oldDate']);
                    }
                }else{
                    $returns_data['status'] ="sww";
                }
                echo json_encode($returns_data);
                exit();
            }
        }catch(Exception $e){
            echo $e->getMessage();
        }finally{
            closeconn();
        }
    }
    
?>
