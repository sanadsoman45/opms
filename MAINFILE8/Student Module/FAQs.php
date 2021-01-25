<?php
    require_once "conn.php";
    if(!empty(extract($_POST))){
        $conn = createconn1();
        mysqli_select_db($conn, "projectsubmission");
        $email = $_POST["semail"];
        $message = $_POST["message"];
        $query_rows_count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM queries_doubts WHERE user_id=".$_POST["sid"]." AND user_type='student' AND user_doubt='$message'"));
        if($query_rows_count == 0){
            if(mysqli_query($conn,"INSERT INTO queries_doubts(user_id, user_gi_pin, user_type, user_email, user_doubt) VALUES(".$_POST["sid"].", ".$_POST["sgr"].", 'student', '$email', '$message')")){
                $return_data["send"] = "yes";
            }else{
                $return_data["send"] = "no";
            }
        }else{
            $return_data["send"] = "sameMessage";
        }
        echo json_encode($return_data);
        closeconn();
        exit();
    }
?>
<html>
    <head>
        <title>FAQs</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="css/Header.css" rel="stylesheet">
        <link href="css/FAQs.css" rel="stylesheet">
        <link href="css/UserSetting.css" rel="stylesheet">
        <link href="css/Details.css" rel="stylesheet">
        <link href="css/SlidingMenu.css" rel="stylesheet">
        <link href="css/Footer.css" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Aladin' rel="stylesheet">
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/student_ajax.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
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
                if(localStorage.getItem("sname") == null)
                {
                    $.post("StudentLogin.php",function(){
                        location.href="StudentLogin.php";
                    });
                }
            }); 
        </script>
    </head>
    <body class="faqsBody">
        <!-- //////////////////////////////////////////////////////////////////////////////Header -->
        <header class="header">
            <div class="navigationBar" onclick="openNav()">
                <div class="nb1"></div>
                <div class="nb2"></div>
                <div class="nb3"></div>
            </div>

            <div class="proTitle">
                Project Management System
            </div>

            <div class="nbItems">
                <div class="nbItem" id="nbItem1" onclick="nbclick1()">
                    <span class="nbIName nbIName1">Home</span>
                    <div class="nbIOutline" id="nbIOutline1"></div>
                </div>
                <div class="nbItem" id="nbItem2" onclick="nbclick2()">
                    <span  class="nbIName nbIName2">My Project</span>
                    <div class="nbIOutline" id="nbIOutline2"></div>
                </div>
                <div class="nbItem" id="nbItem3" onclick="nbclick3()">
                    <span  class="nbIName nbIName3">About Us</span>
                    <div class="nbIOutline" id="nbIOutline3"></div>
                </div>
                <div class="nbItem" id="nbItem4">
                    <span  class="nbIName nbIName4" style="font-size:25px;">FAQs</span>
                    <div class="nbIOutline" id="nbIOutline4" style="display: block;"></div>
                </div>
            </div>

            <div class="userImage" id="user_Image">
                <img class="uImage" src="photo/male.png" alt="User Image">
            </div>
        </header>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// FAQs-->
        <br/>
        <div class="outer_faqsImg">
            <img class="faqsImg" src="photo/faq_imageCopy1.jpg">
            <p class="faqsHeader">FAQs</p>
            <p class="faqsTitle">How can we help you</p>
        </div>

        <div class="outer_faqs1">
            <div class="faqs1">
                <img src="photo/rightArrow.png" class="faqImg1">
                <img src="photo/downArrow.png" class="faqImg01">
                <p class="faqTextQ1">How to upload the file in the website ?</p>
            </div>
            <div class="outer_faqsTitleInfo1">
                <label class="faqsTitleInfo1">Upload files of each stages from the "My Project" Tab in the Navigation Bar. Create a Project and visit the page My Project and click on each stages which will re-direct to a page where you can upload your desired file related to the stage.</label>
            </div>
        </div>

        <div class="outer_faqs2">
            <div class="faqs2">
                <img src="photo/rightArrow.png" class="faqImg2">
                <img src="photo/downArrow.png" class="faqImg02">
                <p class="faqTextQ2">How to change the account details of my profile ?</p>
            </div>
            <div class="outer_faqsTitleInfo2">
                <label class="faqsTitleInfo2">You can get your account info following these few steps:<br/><br/>
                    Click the user account icon on the right-side of the Navigation Bar -> Manage and Update your Account and edit your details freely. (Caution!!! : Once you edit your account details and save it, you can't change / edit it again for a few days).</label>
            </div>
        </div>

        <div class="outer_faqs3">
            <div class="faqs3">
                <img src="photo/rightArrow.png" class="faqImg3">
                <img src="photo/downArrow.png" class="faqImg03">
                <p class="faqTextQ3">Is there any ways to download / retrieve the uploaded files from the website ?</p>
            </div>
            <div class="outer_faqsTitleInfo3">
                <label class="faqsTitleInfo3">Yes for Sure. If we are provided you with that facility.<br/> 
                    You can download your uploaded data via going through these steps:<br/> <br/>
                    1. Click on the <b>View Project</b> from the Home Page.<br/>
                    2. Now on the page, at the right hand side corner there is a <b>Download Icon</b>, click it.<br/>
                    3. A <b>Box appears</b>,  in which all the uploaded file's link for download is given along with the stage name.<br/>
                    4. <b>Download</b> your necessary Stage files from there.</label>
            </div>
        </div>
        
        <div class="outer_faqs4">
            <div class="faqs4">
                <img src="photo/rightArrow.png" class="faqImg4">
                <img src="photo/downArrow.png" class="faqImg04">
                <p class="faqTextQ4">Security and Privacy Policies.</p>
            </div>
            <div class="outer_faqsTitleInfo4">
                <label class="faqsTitleInfo4">Please don't provide others with your account details, who could change or manipulate your data.<br/>
                    Also we are providing you with our privacy policy data.<br/>
                    <label class="clickHereFaqs4">Click Here</label> To View.</label>
            </div>
        </div>
        
        <div class="outer_faqs5">
            <div class="faqs5">
                <img src="photo/rightArrow.png" class="faqImg5">
                <img src="photo/downArrow.png" class="faqImg05">
                <p class="faqTextQ5">When can I upload my Finalize project ?</p>
            </div>
            <div class="outer_faqsTitleInfo5">
                <label class="faqsTitleInfo5">The Finalise project can be uploaded only after you upload all of the stages and also only if all those stages have been checked and approved by the professor.<br/>
                    The motive is that the finalise code/project that upload should be the accurate and stable with minimum errors.<br/><br/>
                    We will send you the notification as a reminder about the finalize project once all your stages have been approved by the professor.<br/>
                    We have also systemized our website such that you will be notified at every stage of the process.</label>
            </div>
        </div>
        
        <div class="outer_faqs6">
            <div class="faqs6">
                <img src="photo/rightArrow.png" class="faqImg6">
                <img src="photo/downArrow.png" class="faqImg06">
                <p class="faqTextQ6">Am I going to receive the final report and my marks of my project after professor verifies the project ?</p>
            </div>
            <div class="outer_faqsTitleInfo6">
                <label class="faqsTitleInfo6">Yes. You will receive the remark and the marks given to your project by the professor once the deadline of the project is done after the correction and the presentation of your project.<br/><br/>
                    The report and the re-mark will be provide at the project page where you upload your stages. You will at to know the review of the professor and the marks gained for your project.<br/><br/>
                    <span class="faqsspan6">Thank You for the View & also wishing you the best for your project marks.... &#128522;&#128077;&#128077;</span></label>
            </div>
        </div>
        
        
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// User Setting-->
        <div class="set-outer-block" id="set_outer_block">
            <div class="userSetting">
                
                <div class="userImage1">
                    <img class="uImage1" src="photo/male.png" alt="User Image">
                    <!-- <div class="userOnline"></div> -->
                </div>

                <div class="userName" id="username">
                    Username
                </div>

                <div class="outer-details">
                    <div class="details">
                        <div class="d1 d11"></div>
                        <div class="d2"></div>
                        <div class="d1"></div>
                        <div class="d2"></div>
                        <div class="d1"></div>
                        <div class="d2"></div>
                    </div>
                    <div class="DetailsName">
                        Details
                    </div>
                </div>

                <div class="outer-UpdateAccName" onclick="accountSetting()">
                    <div>
                        <img class="settingIcon" src="photo/settings-icon.png" alt="settings icon">
                    </div>
                    <div class="UpdateAcc">
                        Manage & Update Your Account
                    </div>
                </div>

                <div class="logout">
                    <input type="button" name="logout" class="logoutBut" value="LOGOUT" id="log_out1" onclick='logout()' />
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Details-->
        <div class="outer-DetailsBox" id="outer_DetailsBox">
            <div class="main-DetailsBox">
                <header class="detailsHeader">Details</header>
                <img src="photo/DialogBoxClose.png" class="closeDetails">
                <div class="userNameDetail">
                    <div class="setUserName" id="setUserName">Akash Katkar</div>
                </div>

                <div class="userIdDetail">
                    <div class="setuserId" id="setuserId">101</div>
                </div>

                <div class="grNumDetail">
                    <div class="setGrNum" id="setGrNum">5005</div>
                </div>

                <div class="emailIdDetail">
                    <div class="setEmailId" id="setEmailId">skykatkar6666@gmail.com</div>
                </div>

                <div class="numberDetail">
                    <div class="setNumber" id="setNumber">9429731685</div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Sliding Menu-->
        <div class="outer-slidingMenu" id="outer_slidingMenu">
            <div class="slidingMenu">
                <div>
                    <div class="logo-outer-circle">
                        <img class="logo" src="photo/logoY.png" alt="User Image">
                    </div>

                    <div class="pmsName">
                        Project Management System
                    </div>
                </div>

                <!-- <div class="menuItem chats">
                    <div class="uPName">
                        Chats
                    </div>
                    <div class="arrow">
                        <div class="arrow1"></div>
                        <div class="arrow2"></div>
                    </div>
                </div> -->

                <div class="menuItem stagesInstru" onclick="instruction()">
                    <div class="uPName">
                        Stages Instructions
                    </div>
                    <div class="arrow">
                        <div class="arrow1"></div>
                        <div class="arrow2"></div>
                    </div>
                </div>

                <div class="menuItem visitCollegeSite">
                    <div class="uPName">
                        Visit College Site
                    </div>
                    <div class="arrow">
                        <div class="arrow1"></div>
                        <div class="arrow2"></div>
                    </div>
                </div>

                <div class="menuItem darkMode">
                    <div class="uPName">
                        Dark Mode
                    </div>
                    <label class="darkSlider">
                        <input type="checkbox" class="darkCheckbox"/>
                        <div class="darkToNormal"></div>
                    </label>
                </div>

                <div class="menuItem finalizeProject" onclick="finalizeProject()">
                    <div class="uPName">
                        Finalize Project
                    </div>
                    <div class="arrow">
                        <div class="arrow1"></div>
                        <div class="arrow2"></div>
                    </div>
                </div>

                <div class="bluePartIncrease"></div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Footer-->
        <footer class="footer">
            <div>
                <div class="logo-outer-circle0">
                    <img class="logo0" src="photo/logoY.png" alt="User Image">
                </div>

                <div class="pmsName0">
                    Database and Record Project Management System
                </div>
            </div>

            <div class="outer-main">
                <div class="main">Main</div>
                <div class="home0" id="home_0" onclick="nbclick1()">Home</div><br/>
                <div class="myProject0" id="myProject_0" onclick="nbclick2()">My Project</div><br/>
                <div class="aboutUs0" id="aboutUs_0" onclick="nbclick3()">About Us</div><br/>
                <div class="faqs0" id="faqs_0">FAQs</div>
            </div>
    
            <div class="outer-resources">
                <div class="resources">Resources</div>
                <div class="contactUs">Contact Us</div><br/>
                <div class="blog">Blog</div>
            </div>

            <div class="outer-legal">
                <div class="legal">Legal</div>
                <div class="termsOfUse">Terms Of Use</div><br/>
                <div class="privacyPolicy">Privacy Policy</div>
            </div>

            <div class="outer-social">
                <div class="social">Social</div>
                <div class="facebook">Facebook</div><br/>
                <div class="instagram">Instagram</div><br/>
                <div class="twitter">Twitter</div><br/>
                <div class="linkedIn">LinkedIn</div>
            </div>

            <div class="dotted-line"></div>
            
            <div class="dataBase">@DataBase.in.2000</div>
        </footer>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

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
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
        
        <script type="text/javascript">
            document.getElementById("username").innerHTML=localStorage.getItem("sname");
            document.getElementById("setuserId").innerHTML=localStorage.getItem("sid");
            document.getElementById("setUserName").innerHTML=localStorage.getItem("sname");
            document.getElementById("setGrNum").innerHTML=localStorage.getItem("sgr");
            document.getElementById("setEmailId").innerHTML=localStorage.getItem("semail");
            document.getElementById("setNumber").innerHTML=localStorage.getItem("spn");

            $(".outer_faqsClearBtn").click(function(){
                $("#Pro-Description").val("");
                $(".outer_faqsDaubts label").css("color", "rgb(196, 187, 187)");
            });
            
            function faqsSendBtn(){
                if(($(".faqsDaubts").val()).trim() == ""){
                    wrongVal("Error!", "Your Message Is Blank");
                }else{
                    $.ajax({
                        url:"FAQs.php",
                        type:"POST",
                        dataType:"json",
                        data:{"sid":localStorage.getItem("sid"),"message":($(".faqsDaubts").val()).trim(),"sgr":localStorage.getItem("sgr"),"semail":localStorage.getItem("semail")},
                        success: function(results){
                            console.log(results["send"]);
                            if(results["send"] == "yes"){
                                rightVal("Success!", "Send Your Querie/Doubt");
                                $("#Pro-Description").val("");
                                $(".outer_faqsDaubts label").css("color", "rgb(196, 187, 187)");
                                $(".faqTextQ7").click();
                            }else if(results["send"] == "sameMessage"){
                                wrongVal("Sorry!", "Don't Send Same Message");
                            }else{
                                wrongVal("Sorry!", "Don't Send Querie/Doubt");
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