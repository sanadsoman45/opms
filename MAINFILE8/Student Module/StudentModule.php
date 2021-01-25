<html>
    <head>
        <title>Student Module</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="css/Header.css" rel="stylesheet">
        <link href="css/StudentModule.css" rel="stylesheet">
        <link href="css/UserSetting.css" rel="stylesheet">
        <link href="css/Details.css" rel="stylesheet">
        <link href="css/SlidingMenu.css" rel="stylesheet">
        <link href="css/FinalizeProjectError.css" rel="stylesheet">
        <link href="css/Footer.css" rel="stylesheet">
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/RePass1.js"></script>
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
            if(localStorage.getItem("DarkMode") == null){
                localStorage.setItem("DarkMode", "OFF");
            }
        }); 
        </script>

    </head>
    <body class="studModBody">
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
                <div class="nbItem" id="nbItem1">
                    <span class="nbIName nbIName1" style="font-size:25px;">Home</span>
                    <div class="nbIOutline" id="nbIOutline1" style="display: block;"></div>
                </div>
                <div class="nbItem" id="nbItem2" onclick="nbclick2()">
                    <span  class="nbIName nbIName2">My Project</span>
                    <div class="nbIOutline" id="nbIOutline2"></div>
                </div>
                <div class="nbItem" id="nbItem3" onclick="nbclick3()">
                    <span  class="nbIName nbIName3">About Us</span>
                    <div class="nbIOutline" id="nbIOutline3"></div>
                </div>
                <div class="nbItem" id="nbItem4" onclick="nbclick4()">
                    <span  class="nbIName nbIName4">FAQs</span>
                    <div class="nbIOutline" id="nbIOutline4"></div>
                </div>
            </div>

            <div class="userImage" id="user_Image">
                <img class="uImage" src="photo/male.png" alt="User Image">
            </div>
        </header>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Blue Part-->
        <div class="bluePart">
            <div class="proName">
                Your Project Name
            </div>

            <div class="alertIn">
                <div class="aiName">Alert in...</div>
                <div class="verticalLine"></div>
                <img class="cloud" src="photo/cloud1.png">
                <div class="ec">
                    <div class="l"></div>
                    <div class="d"></div>
                </div>
                <div class="orangeCircle"></div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// White Part-->
        <div>
            <div class="viweMyProject">
                <div class="vmpTitle">View My Project</div>
                <div class="viewYourProHere">View Your Project Here...</div>
                <div class="vpButton" onclick="viewproject()">VIEW PROJECT</div>
            </div>

            <div class="createNewProject">
                <div class="cnpTitle">Create New Project</div>
                <div class="createYourNewHere">Create Your New Project Here...</div>
                <div class="cpButton" onclick="createproject()">CREATE PROJECT</div>
            </div>

            <div class='recordComplition' id='record-Complition'></div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// User Setting-->
        <div class="set-outer-block" id="set_outer_block">
            <div class="userSetting">
                
                <div class="userImage1">
                    <img class="uImage1" src="photo/male.png" alt="User Image">
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
                    <input type="button" name="logout" class="logoutBut" value="LOGOUT" id="log_out1" onclick='logout()' required="" />
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
                        Project File
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

        <!-- ////////////////////////////////////////////////////////////////////////////// Alert-->
        <div class="outer-fPAlert">
            <div class="fPAlert">
                <p class="fPAlertTitle">NOTE</p>
                <div class="outer_alertMessage">
                    <label></label>
                </div>
                <div class="gotItAlert">OK, I Got it</div>
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
                <div class="home0" id="home_0">Home</div><br/>
                <div class="myProject0" id="myProject_0" onclick="nbclick2()">My Project</div><br/>
                <div class="aboutUs0" id="aboutUs_0" onclick="nbclick3()">About Us</div><br/>
                <div class="faqs0" id="faqs_0" onclick="nbclick4()">FAQs</div>
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

            jQuery.ajax({
                url: "ajax_call_function.php",
                type: "POST",
                dataType: "json",
                data:{"func":"checkMessages", "sid":localStorage.getItem("sid")},
                success: function(results){
                    var allMessage = results["allMessage"];
                    if(results["proEndDate"] != null){
                        $(".outer_alertMessage label").after($("<p class='alertMessage'></p>").text("Hello "+results["sname"]+", Your time is running out!!! Please upload all of your stage files in your website otherwise you will end up loosing your marks. Please upload it before ").append("<br />"+results["proEndDate"].split(" ")[0]+" and also ASAP!!!"));
                    }
                    for(var i=0; i < allMessage.length; i++){
                        $(".outer_alertMessage label").after($("<p class='alertMessage'></p>").text(allMessage[i]));
                    }

                    if(results["messageTime"]==null){
                        $(".orangeCircle").hide();
                    }else if(results["messageTime"] == localStorage.getItem("last_time")){
                        $(".orangeCircle").hide();
                    }else{
                        $(".orangeCircle").show();
                        localStorage.setItem("outer_last_time", results["messageTime"]);
                    }
                    if(results["proName"] != null){
                        $(".proName").text(results["proName"]);
                    }
                },
                error:function(e){
                    console.log(e);
                }
            });

            $.ajax({
                url: "RecordCompletion.php",
                type: "POST",
                data: {"sid":localStorage.getItem("sid")},
                success: function(result){
                    $("#record-Complition").html(result);
                }
            });

            function viewMore(){
                $(".recordComplition").css("height", localStorage.getItem("StudentTotalRecords")*9+10.5+"em");
                $(".slideUpDown").slideDown(550);
                $(".viewMore1").css("display", "none");
                $(".viewMore2").css("display", "block");
                $(".recordComplition").css("transition", "all 0.6s linear");
            }

            function lessMore(){
                $(".recordComplition").css("height", "28.5em");
                $(".slideUpDown").slideUp(500);
                $(".viewMore2").css("display", "none");
                $(".viewMore1").css("display", "block");
                $(".recordComplition").css("transition", "all 0.5s linear");
            }
        </script>
    </body>
</html>