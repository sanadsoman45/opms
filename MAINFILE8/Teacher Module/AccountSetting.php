<?php
    require_once 'conn.php';
    if(!empty(extract($_POST)))
    {
        $conn=createconn1();
        mysqli_select_db($conn,"projectsubmission");
        if($_POST["DelAcc"] == "DelAcc"){
            $userid = $_POST["delAccID"];
            $Pass = md5($_POST["pass"]);
            $query_data = mysqli_fetch_array(mysqli_query($conn,"select * from teacher where t_id=$userid"));
            if($Pass != $query_data["t_pass"]){
                $return_data["wrongPass"] = "yes";
            }else if(mysqli_query($conn, "UPDATE teacher SET t_pass=NULL WHERE t_id=$userid")){
                $return_data["delacc"] = "yes";
            }else{
                $return_data["delacc"] = "no";
            }
        }else if($_POST["DelAcc"] == "EditAcc"){
            $username = $_POST["uname"];
            $usernumber = $_POST["unumber"];
            $useremail = $_POST["uemail"];
            $userid = $_POST["uid"];
            if(mysqli_query($conn, "UPDATE teacher SET t_name='$username',t_email='$useremail',t_pn='$usernumber' WHERE t_id=$userid")){
                $return_data["savedetails"] = "yes";
            }else{
                $return_data["savedetails"] = "no";
            }
        }else if($_POST["DelAcc"] == "sendEmail"){
            $teacher_name = $_POST["uname"];
            $teacher_email = $_POST["uemail"];
            $otp=rand(1000,9999);
            $msg="<html><body><label style='font-size:1.5em'>Hello <label style='color:orange'>".$teacher_name."</label>, One Time Password(OTP) is <h3 style='display:inline-block'>".$otp."</h3></label></body></html>";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: PROJECT MANAGEMENT SYSTEM<cartoonlovers185@gmail.com>';
            if(mail($teacher_email,"User Verification",$msg,$headers)){
                $return_data["sendemail"] = "yes";
                $return_data["uotp"] = $otp;
            }else{
                $return_data["sendemail"] = "no";
            }
        }else if($_POST["DelAcc"] == "curpass"){
            $teacher_id = $_POST["aid"];
            $currPass = $_POST["currentPass"];
            $query_data = mysqli_fetch_array(mysqli_query($conn,"select * from teacher where t_id=$teacher_id"));
            if($query_data["t_pass"] == md5($currPass)){
                $return_data["verifyPass"] = "yes";
            }else{
                $return_data["verifyPass"] = "no";
            }
        }else if($_POST["DelAcc"] == "saveNewPass"){
            $teacher_pass = md5($_POST["upass"]);
            $teacher_id = $_POST["uid"];
            date_default_timezone_set('ASIA/KOLKATA');
            $current_date = (date("Y-m-d") ." ". date("H:i:s"));
            $query_data = mysqli_fetch_array(mysqli_query($conn,"select * from teacher where t_id=$teacher_id"));
            if($teacher_pass==$query_data['t_pass']){
                $return_data["exist"] = "yes";
            }else if(mysqli_query($conn, "UPDATE teacher SET t_pass='$teacher_pass', t_email_time='$current_date' WHERE t_id=$teacher_id")){
                $return_data["setPass"] = "yes";
            }else{
                $return_data["setPass"] = $_POST["uid"];
            }
        }else if($_POST["DelAcc"] == "checkExistence"){
            $usernumber = $_POST["unumber"];
            $useremail = $_POST["uemail"];
            $userid = $_POST["uid"];

            $result1=mysqli_query($conn,"SELECT * FROM teacher WHERE t_email='$useremail' AND t_id!=$userid");
            $query_row1 = mysqli_fetch_array($result1);
            $result2=mysqli_query($conn,"SELECT * FROM teacher WHERE t_pn='$usernumber' AND t_id!=$userid");
            $query_row2 = mysqli_fetch_array($result2);
            if((mysqli_num_rows($result1)>0 || mysqli_num_rows($result2)>0)){
                if($query_row2["t_pn"] == $usernumber && $query_row1["t_email"] == $useremail){
                    $return_data["savedetails"] = "existnumemail";
                }else if($query_row2["t_pn"] == $usernumber){
                    $return_data["savedetails"] = "existnum";
                }else if($query_row1["t_email"] == $useremail){
                    $return_data["savedetails"] = "existemail";
                }
            }else{
                $return_data["existence"] = "no";
            }
        }
        echo json_encode($return_data);
        closeconn();
        exit();
    }
?>
<html>
    <head>
        <title>AccountSetting</title>

        <link href="css/AccountSetting.css" rel="stylesheet" />
        <link href="css/RePass1.css" rel="stylesheet" />
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />
        <link href="css/WSSwal.css" rel="stylesheet" />
        <link href="css/ConfirmationBox.css" rel="stylesheet">
        
        <script src="js/jquery.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
        <script src="js/RePass1.js"></script>
        <script src="js/EyeIcon.js"></script>
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
                if(localStorage.getItem("tname") == null)
                {
                    $.post("TeacherLogin.php",function(){
                        location.href="TeacherLogin.php";
                    });
                }
            }); 
        </script>
    </head>
    <body class="ASBody">
        <!-- //////////////////////////////////////////////////////////////////////////////Account Setting Page -->
        <header class="AccountSettingHeader">Account Settings</header>

        <img src="photo/AccountSettingBack.png" class="AccSetBackImg">

        <div class="profileDetails">
            <img src="photo/ProfileDetails.png" class="profileDetailsImg" />
            <p class="profileDetailsName">Profile Details</p>

            <div class="outer_pDFirstName">
                <p class="pDFirstName">Full Name</p>
                <div class="outer_pDFirstNameField">
                    <input type="text" class="pDFirstNameField" value="Akash Katkar">
                </div>
            </div>

            <div class="outer_pDNumber">
                <p class="pDNumber">Contact Number</p>
                <div class="outer_pDNumberField outer_RPOtp0">
                    <input type="tel" class="pDNumberField" value="7215983499" maxlength="10">
                </div>
            </div>

            <!-- <div class="outer_pDGrNum">
                <p class="pDGrNum">GR No.</p>
                <div class="outer_pDGrNumField">
                    <input type="text" class="pDGrNumField" value="5225">
                </div>
            </div> -->

            <div class="outer_pDEmailId">
                <p class="pDEmailId">Email ID</p>
                <div class="outer_pDEmailIdField">
                    <input type="text" class="pDEmailIdField" value="skykatkar@gmail.com">
                </div>
            </div>
        </div>

        <div class="changePassword">
            <img src="photo/ChangePassword.png" class="changePasswordImg" />
            <p class="changePasswordName">Change Password</p>

            <div class="outer_cPPassword">
                <p class="cPPassword">Password</p>
                <div class="outer_cPPasswordField">
                    <input type="password" class="cPPasswordField" value="abcdefghoj" disabled>
                </div>
            </div>

            <div class="cPResetPassword">Reset Password</div>
        </div>

        <!-- <div class="deactivateAccount">
            <img src="photo/deleteAcc.png" class="deactivateAccountImg" />
            <p class="deactivateAccountName">De-activate Your Account</p>

            <div class="deactAccText">Delete Your Account From The Website</div>

            <div class="outer_deactAccButton">
                <input type="button" class="deactAccButton" value="Proceed">
            </div>
        </div> -->

        <div class="outer_aSSaveChangeBtn">
            <input type="button" value="Save Changes" class="aSSaveChangeBtn">
        </div>

        <div class="outer_aSCancelBtn">
            <input type="button" value="Cancel" class="aSCancelBtn">
        </div>
        <br/><br/>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- //////////////////////////////////////////////////////////////////////////////Reset Old Password Box -->
        <div class="outer-aSResetPassword">
            <div class="aSResetPassBox">
                <p class="aSChangePassTitle">Change Password</p>
                <img src="photo/DialogBoxClose.png" class="aSChangePassImg"/>
                <p class="aSVerifyPassText">To Change Password, First Verify That It's You</p>

                <div class="outer_cPChangePassField">
                    <input type="password" class="cPChangePassField" title="Type Your Password" required>
                    <p class="aSChangePass">Type Your Password</p>
                    <span class="outer_aSEye">
                        <i id="aSSlash_Eye" class="aSSlash-Eye"></i>
                    </span>
                </div>

                <p class="aSForgetPassword">Forget Password</p>
                <div class="aSNextBtn aSNextClickBtn">NEXT</div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- //////////////////////////////////////////////////////////////////////////////Reset Passwod OTP Box -->
        <div class="outer-aSResetPassOtp">
            <div class="aSResetPassOtpBox">
                <p class="aSPassOtpTitle">Enter The OTP</p>
                <p class="aSVerifyOtpText">Please Enter The OTP That We Have Send To Your Email ID</p>

                <div class="main_RPOtpTextField">
                    <div class="outer_RPOtpTextField1 outer_RPOtp0">
                        <input type="tel" class="RPOtpTextField1" maxlength="1" title="">
                        <p class="RPOtpLine1">_</p>
                    </div>

                    <div class="outer_RPOtpTextField2 outer_RPOtp0">
                        <input type="tel" class="RPOtpTextField2" maxlength="1" title="">
                        <p class="RPOtpLine2">_</p>
                    </div>

                    <div class="outer_RPOtpTextField3 outer_RPOtp0">
                        <input type="tel" class="RPOtpTextField3" maxlength="1" title="">
                        <p class="RPOtpLine3">_</p>
                    </div>

                    <div class="outer_RPOtpTextField4 outer_RPOtp0">
                        <input type="tel" class="RPOtpTextField4" maxlength="1" title="">
                        <p class="RPOtpLine4">_</p>
                    </div>
                </div>

                <p class="aSResendOtpText"></p>

                <div class="outer_aSResendOtpBtn">
                    <input type="button" class="aSResendOtpBtn" value="Re-send OTP" onclick="aSResendOtpBtn()">
                </div>
                <div class="outer_aSNextOtpBtn">
                    <input type="button" class="aSNextOtpBtn" value="NEXT">
                </div>
                <div class="outer_aSSubmitOtpBtn">
                    <input type="button" class="aSSubmitOtpBtn" value="SUBMIT">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- //////////////////////////////////////////////////////////////////////////////Reset New Password Box -->
        <div class="outer-aSResetNewPassword">
            <div class="aSResetNewPassBox">
                <p class="aSNewPassTitle">New Password</p>

                <div class="outer_cPNewPassField1">
                    <input type="password" class="cPNewPassField1" title="Enter Your New Password" required>
                    <p class="aSNewPass1">Enter Your New Password</p>
                    <span class="outer_aSNEye1">
                        <i id="aSSlash_NEye1" class="aSSlash-Eye"></i>
                    </span>
                </div>

                <div class="outer_cPNewPassField2">
                    <input type="password" class="cPNewPassField2" title="Re-Enter Your New Password" required>
                    <p class="aSNewPass2">Re-Enter Your New Password</p>
                    <span class="outer_aSNEye2">
                        <i id="aSSlash_NEye2" class="aSSlash-Eye"></i>
                    </span>
                </div>

                <div class="outer_aSNSaveBtn">
                    <img src="photo/SaveRightIcon.png" class="aSNPImg">
                    <input type="button" class="aSNSaveBtn" value="SAVE">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->
        
        <!-- ////////////////////////////////////////////////////////////////////////////////////// Proceed Button-->
        <div class="outer_deaAProceedBox">
            <div class="deaAProceedBox">
                <p class="dAAHeader">De-activate The Account</p>
                <p class="dAATitle">Deleting Your Account Causes Deletion of Following Subjects:</p>
                <p class="AYAccText1 AYAccText">1. Deletion of Your Account.</p>
                <p class="AYAccText2 AYAccText">2. Deletion of Your Data in Your Account.</p>
                <p class="AYAccText3 AYAccText">3. Deletion of Created Project (If There).</p>
                <p class="AYAccText4 AYAccText">4. You Cannot Retrieve Any of The Detail & Information After Deleting The Account.</p>
                <p class="AYAccText5 AYAccText">Please Confirm The Above Statement and Proceed Carefully. If all of These are Fine, Then Click DELETE, else CANCEL It .</p>

                <div class="outer_aAAPCancelBtn">
                    <input type="button" class="aAAPCancelBtn" value="CANCEL">
                </div>
                <div class="outer_aAAPDeleteBtn">
                    <input type="button" class="aAAPDeleteBtn" value="DELETE" onclick="deleteAcco()">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->

        <!-- //////////////////////////////////////////////////////////////////////////////Original Password Box -->
        <div class="outer-OriginalPasswordBox">
            <div class="originalPasswordBox">
                <p class="oriPassBoxTitle">Enter Password</p>
                <img src="photo/DialogBoxClose.png" class="oriPassBoxImg"/>

                <div class="outer_OriPassBoxField">
                    <input type="password" class="OriPassBoxField" title="Type Your Password" required>
                    <p class="OriPassBoxPH">Type Password</p>
                    <span class="outer_opbEye">
                        <i id="opbSlash_Eye" class="aSSlash-Eye"></i>
                    </span>
                </div>

                <div class="opbCancelBtn">CANCEL</div>
                <div class="outer_opbVerifyBtn">
                    <input type="button" class="opbVerifyBtn opbVerifyBtnp1" onclick="deleteacc(localStorage.getItem('tid'))" value="VERIFY">
                    <!-- <input type="button" class="opbVerifyBtn opbVerifyBtns2" id="otpverify1" onclick="savechangesacc()" value="VERIFY"> -->
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////////////// Forget PASSWORD-->
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

        <!-- ////////////////////////////////////////////////////////////////////////////////////// Save Changes-->
        <div class="outer_allsavechangesbox">
            <div class="allsavechangesbox">
                <p class="alleditdetails">Are you sure to Edit Details.</p>
                <div class="aedCancelBtn">CANCEL</div>

                <!-- Student -->
                <div class="outer_allsavechangesbtn">
                    <input type="button" value="PROCEED" class="allsavechangesbtn">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->

        <!-- ///////////////////////////////////////////////////////////////////////////////////// RIGHT WRONG POPUP-->
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
        <script type="text/javascript">
            $(".pDFirstNameField").val(localStorage.getItem("tname"));
            $(".pDNumberField").val(localStorage.getItem("tpn"));
            $(".pDEmailIdField").val(localStorage.getItem("temail"));

            function deleteAcco(){
                $(".outer_deaAProceedBox").css("display", "none");
                $(".opbVerifyBtnp1").css("display", "block");
                $(".outer-OriginalPasswordBox").fadeIn();
            }

            function deleteacc(userid){
                var Pass =  $(".OriPassBoxField").val();
                if(Pass == ""){
                    wrongVal("Sorry!", "Password Must Be Fill Out");
                }else{
                    jQuery.ajax({
                        url: "AccountSetting.php",
                        type: "POST",
                        dataType: "json",
                        data:{"DelAcc":"DelAcc", "delAccID":userid, "pass":Pass},
                        success: function(results){
                            if(results["wrongPass"] == "yes"){
                                wrongVal("Sorry!", "Wrong Password");
                            }else if(results["delacc"] == "yes"){
                                rightVal("Success!", "Your Account Is Successfully Deleted");
                                localStorage.removeItem("tname");
                                localStorage.removeItem("tid");
                                localStorage.removeItem("ttype");
                                localStorage.removeItem("temail");
                                localStorage.removeItem("tpn");
                                setTimeout(function(){
                                    location.href = "http://localhost/pro/MAINFILE8/Teacher%20Module/TeacherLogin.php";
                                },3500);
                            }else{
                                wrongVal("Sorry!", "Your Account Not Deleted, Try Again");
                            }
                        },
                        error:function(e){
                            console.log(e);
                        }
                    });
                }
            }
        </script>
    </body>
</html>