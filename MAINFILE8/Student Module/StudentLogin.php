<?php
    require_once 'conn.php';
    error_reporting(E_ALL & ~E_NOTICE);
    if(isset($_POST["function"])){
        if($_POST['function']=="student_login"){
            student_login();
        }
    }
    function student_login(){
        $conn1=createconn1();
        $id=$_POST["userid"];
        $pass=$_POST["password"];
        if(!$conn1){
            $return_data["connerror"]="yes";
        }else{
            mysqli_select_db($conn1,"projectsubmission");
            $result1=mysqli_query($conn1,"Select * from student where s_id=$id");
            $row=mysqli_fetch_array($result1);
            if(mysqli_num_rows($result1)>0){
                if($row["s_pass"]!=""){
                    if($row["s_pass"]==md5($pass)){
                        $return_data["sid"]=$row["s_id"];
                        $return_data["sname"]=$row["s_name"];
                        $return_data["sgr"]=$row["s_gr"];
                        $return_data["semail"]=$row["s_email"];
                        $return_data["spn"]=$row["s_pn"];
                    }else{
                        $return_data["invalidpass"]="true";
                    }
                }else{
                    $return_data["passnotset"]="true";
                }
            }else{
                $return_data["invalidid"]="invalidid";
            }
        }
        echo json_encode($return_data);
        exit();
    }
?>
<html>
    <head>
        <title>Student Login</title>

        <link href="css/StudentStyle.css" rel="stylesheet" />
        <link href="css/RePass1.css" rel="stylesheet" />
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />
        <link href="css/WSSwal.css" rel="stylesheet" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/mainpageslide.js"></script> 
        <script src="js/EyeIcon.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
        <script src="js/RePass1.js"></script>
        <script src="js/student_ajax.js"></script>
        <script>
            $(window).bind("pageshow", function() {
                $('form').get(0).reset();
            });
        </script>
        <script>
            function ajax_call()
            {
                var s_id=localStorage.getItem("sid");
                var t_id=localStorage.getItem("tid");
                var s_name=localStorage.getItem("sname");
                var t_name=localStorage.getItem("tname");
                $.ajax({
                    url:"Addstudent.php",
                    method:"post",
                    data:{"s_name":s_name,"t_name":t_name,"s_id":s_id,"t_id":t_id},
                    dataType:"json",
                    success:function(resp){
                        console.log("hello1")
                        console.log(resp);
                        console.log(resp["name"]);
                        if(resp["name"]=="sname")
                        {
                           console.log("sname");
                            localStorage.removeItem("sname")
                        }
                        else
                        {
                            console.log("tname")
                            localStorage.removeItem("tname")   
                        }
                      
                    }
                });  
            }
            $(document).ready(function(){
                ajax_call();
                if(localStorage.getItem("sname") !=null)
                {
                    $.post("StudentModule.php",function(){
                        location.href="StudentModule.php";
                    });
                }
            });
        </script>
    </head>
    <body>
        <!-- /////////////////////////////////////////////////////////////////////////// Starting Logo-->
        <div id="mcc-info">
            <div class="logo-outer-circle0 logo_outer_c">
                <img class="logo0" src="photo/logoY.png" alt="LOGO">
            </div>
            <div id="mcctxtcont">
                <div id="mcctag">
                    MULUND COLLEGE OF COMMERCE
                </div>
                <p class="pms1">
                    PROJECT MANAGEMENT SYSTEM
                </p>
            </div>
        </div>

        <!-- /////////////////////////////////////////////////////////////////////////// LOGIN-->
        <div class="mcc-login">
            <div class="logo-outer-circle0">
                <img class="logo0" src="photo/logoY.png" alt="LOGO">
            </div>
            <p class="pms2">
                PROJECT MANAGEMENT SYSTEM
            </p>
            <br><br><br>
            <div id="flip-card">
                <header class="header1">Login</header>
                <form name="form1" method="POST" id="form-1" onsubmit="return false"> <!-- novalidate: Use For required Field Restriction -->
                    <div class="input-field0" id="user-id1">
                        <input type="text" id="user_id1" name="userid1" class="textbox0" required/>
                        <label>UserID</label>
                    </div>
                    
                    <div class="input-field0"  id="pass-word1">
                        <input type="password" id="pass_word1" name="password1" class="textbox0" required/>
                        <label>Password</label>
                        <span id="outer-eye1">
                            <i id="eye1" show="no" class="fas pslash-eye"></i>
                        </span>
                    </div>

                    <div class="btn1" id="btn-1">
                        <div class="inner1"></div>
                        <input type="submit" name="login1" class="login-btn1" value="LOGIN" id="log_in1" onclick="login()"/>
                    </div>

                    <span class="forgot_password1" id= "forgot-password1">Forgot Password?</span>
                </form>
            </div>
        </div>
        <!-- /////////////////////////////////////////////////////////////////////////// -->

        <!-- /////////////////////////////////////////////////////////////////////////// RESET PASSWORD-->
        <div class="outer-block" id="outer_block">
            <div class="inner-block" id="inner_block">

                <img src="photo/ForgotPassClose.png" class="close-block">

                <header class="pass-header1">Reset Password</header>

                <form name="passform" method="POST" id="pass-form" onsubmit="return false" novalidate>
                    <!-- First Box -->
                    <div class="pass-input-field0 first_box" id="reset-pass">
                        <input type="text" id="reset_pass" name="resetpass" class="pass-textbox0" maxlength="6" required/>
                        <label>UserID</label>
                    </div>

                    <div class="pass-btn1 first_box" onclick="check_id()" id="p-btn1">
                        <div class="pass-inner1"></div>
                        <button name="resetbtn" class="pass-login-btn1" value="SUBMIT" id="reset_btn">SUBMIT</button>
                    </div>

                    <!-- Second Box -->
                    <div class="pass-input-field0 second_box" id="reset-pass-otp">
                        <input type="text" id="reset_pass_otp" name="resetpassotp" class="pass-textbox0" maxlength="6" required/>
                        <label>OTP</label>
                    </div>

                    <div class="second_box">
                        <p id="timep" class="time_p">REQUEST FOR NEW OTP IN <span id="time">01:00</span> MINUTES!</p>
                    </div>

                    <div class="pass-btn1 second_box" onclick="submit_otp1()" id="p-btn2">
                        <div class="pass-inner1"></div>
                        <button name="otpbtn" class="pass-login-btn1" id="otp_btn">SUBMIT</button>
                    </div>

                    <!-- Third Box -->
                    <div class="pass-input-field0 third_box" id="new-pass">
                        <input type="password" id="new_pass" name="newpass" class="pass-textbox0" required/>
                        <label>Password</label>
                        <span id="passouter-eye">
                            <i id="pass_eye" show="no" class="pfas pslash-eye"></i>
                        </span>
                    </div>
                    
                    <div class="pass-input-field0 third_box" id="renew-pass">
                        <input type="password" id="renew_pass" name="renewpass" class="pass-textbox0" required/>
                        <label>Re-Password</label>
                        <span id="repassouter-eye">
                            <i id="repass_eye" show="no" class="pfas pslash-eye"></i>
                        </span>
                    </div>

                    <div class="pass-btn1 third_box" onclick="resetpassword()" id="p-btn3">
                        <div class="pass-inner1"></div>
                        <button name="newpassbtn" class="pass-login-btn1" value="SUBMIT" id="newpass_btn">SUBMIT</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////////////// Right Wrong Popup-->
        <div id="wrongValidation" class="wmodal">

            <div class="wmodal-content">

                <div class="wcircle">
                    <span class="w11 w1"></span>
                    <span class="w22 w2"></span>
                </div>

                <p class="wtitle-text"></p>
                <p class="winfo-text"></p>

                <span class="wok-content-block" id="wspan">
                    <span class="wok-text">OK</span>
                </span></br></br>

            </div>

        </div>

        <div id="rightValidation" class="rmodal">
            <div class="rmodal-content">
                
                <div class="rcircle-loader">
                    <div class="rcheckmark rdraw"></div>
                </div>

                <p class="rtitle-text"></p>
                <p class="rinfo-text"></p>

                <span class="rok-content-block" id="rspan">
                    <span class="rok-text">OK</span>
                </span></br></br>

            </div>
        </div>

        <div id="wsaitingState" class="wsmodal">
            <div class="wsmodal-content">
                
                <img src="css/sand-clock.png" class="sandclock">
                <div class="wscircle-loader">
                </div>

                <p class="wstitle-text">Sorry!</p>
                <p class="wsinfo-text">Waiting For Email</p>

                <!-- <span class="wsok-content-block" id="wsspan">
                    <span class="wsok-text">OK</span>
                </span></br></br> -->

            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
    </body>
</html>