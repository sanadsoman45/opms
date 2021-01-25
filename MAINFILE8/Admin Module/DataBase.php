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
                $result1 = mysqli_query($conn1, "SELECT a_email,a_pass,a_email_time, a_type FROM admin WHERE a_id=$userid");
                $query_row=mysqli_fetch_array($result1);
                if(mysqli_num_rows($result1)<=0 || $query_row["a_type"] == "deactivate sudo_user"){
                    $return_data['status'] ="no";
                }else if($query_row["a_pass"] == null){
                    $return_data['passnotset'] ="no";
                }else{
                    date_default_timezone_set('ASIA/KOLKATA');
                    $last_date=strtotime($query_row["a_email_time"]);
                    $current_date = strtotime("now");
                    if(($last_date + 172800) <= $current_date){
                        $_SESSION["oldDate"]=$query_row["a_email_time"];
                        $otp=rand(100000,999999);
                        $to =$query_row["a_email"];
                        $subject = "PASSWORD RESET";
                        $txt = "<html><body><label style='font-size:1.5em'>OTP IS: </label><h2 style='display: inline-block;'>".$otp."</h2>";
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        $headers .= 'From: PROJECT MANAGEMENT SYSTEM<cartoonlovers185@gmail.com>' . "\r\n";
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
                    mysqli_query($conn1,"UPDATE admin SET a_email_time='$current_date' WHERE a_id=$userid");
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
                $current_date = (date("Y-m-d") ." ". date("H:i:s"));
                $result1 = mysqli_query($conn1, "SELECT a_pass, a_type FROM admin WHERE a_id=$userid");
                if(mysqli_num_rows($result1)>0){
                    $row1 = mysqli_fetch_array($result1);
                    if($row1["a_pass"]==$pass){
                        $returns_data['status'] =$pass;
                    }else{
                        $returns_data['status'] ="yes";
                        mysqli_query($conn1,"UPDATE admin SET a_pass='$pass', a_email_time='$current_date' WHERE a_id= $userid");
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
