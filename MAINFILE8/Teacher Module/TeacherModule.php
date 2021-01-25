<html>
    <head>
        <title>Teacher Module</title>

        <link href="css/Header.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/TeacherModule.css">
        <link rel="stylesheet" type="text/css" href="css/ApprRejBox.css">
        <link href="css/UserSetting.css" rel="stylesheet">
        <link href="css/Details.css" rel="stylesheet">
        <link href="css/SlidingMenu.css" rel="stylesheet">
        <link href="css/Footer.css" rel="stylesheet">

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/teacher_ajax.js"></script>
        <script type="text/javascript">
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
                if(localStorage.getItem("DarkMode") == null){
                    localStorage.setItem("DarkMode", "TOFF");
                }
            });
            if(localStorage.getItem("TDarkMode") == null){
                    localStorage.setItem("TDarkMode", "TOFF");
            }
        </script>
    </head>
    <body>
        <!-- //////////////////////////////////////////////////////////////////////////////Header -->
        <div id="div1234"></div>
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
        <br/>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Teacher Module-->
        <div class="outer_TMSelectStages">
            <p class="TMSelectStagesText">Stage 1</p>
            <img class="TM_down_arrow" src="photo/t_down_arrow.png">
            <div class="TMSelectStagesLine"></div>
            <div class="outer_TMAllStages" myVal="Stage 1">
                <div class="TMAllStages TMAllStage1" value="stage1">Stage 1</div>
                <div class="TMAllStages TMAllStage2" value="stage2">Stage 2</div>
                <div class="TMAllStages TMAllStage3" value="stage3">Stage 3</div>
                <div class="TMAllStages TMAllStage4" value="stage4">Stage 4</div>
                <div class="TMAllStages TMAllStage5" value="stage5">Stage 5</div>
                <div class="TMAllStages TMAllStage6" value="stage6">Stage 6</div>
                <div class="TMAllStages TMAllStage7" value="stage7">Stage 7</div>
                <div class="TMAllStages TMAllStageFP" value="projectComplete">Completed Project</div>
            </div>
        </div>
        <div class="outer_TMSearchBox">
            <div class="outer_TMSearchTextField">
                <input type="text" class="TMSearchTextField" placeholder="Search Students...">
            </div>
        </div>
        <div class="outer_pagination"></div>
        <br/>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Approved/Rejected Box -->
        <div class="outer_ApprRejBox">
            <div class="ApprRejBox">
                <p class="ARHeader"></p>
                <p class="ARQue">Are you sure to proceed?</p>
                <p class="ARResponse">If you are <label class="ARResAccep"></label>, Please write your response.</p>
                <div class="outer_ARTextarea">
                    <textarea class="ARTextarea" placeholder="Reason..."></textarea>
                </div>
                <div class="outer_ARCancelBtn">
                    <input type="button" class="ARCancelBtn" value="Cancel">
                </div>
                <div class="outer_ARProceedBtn">
                    <input type="button" class="ARProceedBtn" value="Proceed" onclick="ARProceedBtn()">
                </div>
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
                    <input type="button" name="logout" class="logoutBut" value="LOGOUT" id="log_out1" onclick='logout()'/>
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

                <div class="menuItem projectList">
                    <div class="uPName">
                        Project Details List
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
            <div class="outer-circle-name">
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
        <div class="outer_addalldata">
            <div class="addalldata">
                <p class="alldeletemess">Are you sure to Approved.</p>
                <div class="aadCancelBtn">CANCEL</div>
                <div class="same_iadaase">
                    <input type="button" value="PROCEED" class="iadaase" onclick="tapprovedPro()">
                </div>
            </div>
        </div>

        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
        <div class="outer_compProje">
            <div class="compProje">
                <p class="allstagesrigh">Are you to all Stages are right, If yes then click on <label style="font-weight: bold">PROCEED</label> neither <label style="font-weight: bold">CANCEL</label></p>
                <div class="asrCancelBtn">CANCEL</div>
                <div class="same_asrcb">
                    <input type="button" value="PROCEED" class="asrcb" onclick="compProje()">
                </div>
            </div>
        </div>
    </body>
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
        <script type="text/javascript">
            document.getElementById("username").innerHTML=localStorage.getItem("tname");
            document.getElementById("setuserId").innerHTML=localStorage.getItem("tid");
            document.getElementById("setUserName").innerHTML=localStorage.getItem("tname");
            document.getElementById("setGrNum").innerHTML=localStorage.getItem("tpin");
            document.getElementById("setEmailId").innerHTML=localStorage.getItem("temail");
            document.getElementById("setNumber").innerHTML=localStorage.getItem("tpn");

            jQuery.ajax({
                url: "proj_accept.php",
                type: "POST",
                dataType: "json",
                data:{"project":"checkSupervisor", "tid":localStorage.getItem("tid")},
                success: function(results){
                    if(results["teac_type"] != "Supervisor"){
                        $(".projectList").remove();
                        $(".bluePartIncrease").css("margin-top","28.1em");
                    }
                },
                error:function(e){
                    console.log(e);
                }
            });

            // ////////////////////////////////////////////////////////////////
            var whichStage="stage1";
            jQuery.ajax({
                url: "show_project_data.php",
                type: "POST",
                data:{"stage_num":whichStage, "page":1, "tid":localStorage.getItem("tid")},
                success: function(results){
                    $(".outer_pagination").html(results);
                },
                error:function(e){
                    console.log(e);
                }
            });

            var outer_page=1;
            $(document).on('click',".TMAllStages",function(){
                whichStage = $(this).attr("value");
                jQuery.ajax({
                    url: "show_project_data.php",
                    type: "POST",
                    data:{"stage_num":whichStage, "page":1, "tid":localStorage.getItem("tid")},
                    success: function(results){
                        $(".outer_pagination").html(results);
                    },
                    error:function(e){
                        console.log(e);
                    }
                });
            })

            function pageLoad(page)
            {
                outer_page=page;
                $.ajax({
                    url:"show_project_data.php",
                    method:"POST",
                    data:{"stage_num":whichStage, "page":page, "searchbar":$(".TMSearchTextField").val(), "tid":localStorage.getItem("tid")},
                    success:function(results){
                        $(".outer_pagination").html(results);
                    }
                });
            }

            $(document).ready(function(){
                $(".TMSearchTextField").keyup(function(){
                    $.ajax({
                        url:"show_project_data.php",
                        method:"POST",
                        data:{"stage_num":whichStage, "page":1, "searchbar":$(".TMSearchTextField").val(), "tid":localStorage.getItem("tid")},
                        success:function(results){
                            $(".outer_pagination").html(results);
                        }
                    });
                });
            });

            var position_appr;
            function Tcorrect(pos){
                position_appr = pos;
            }
            function tapprovedPro(){
                var s_id = document.getElementById('s_id'+position_appr).innerHTML;
                var proj_name = document.getElementById('proj_name'+position_appr).innerHTML;
                $.ajax({
                    url:"proj_accept.php",
                    method:"POST",
                    dataType:"json",
                    data:{"project":"accepted", "s_id":s_id, "proj_name":proj_name, "stage":whichStage},
                    success:function(results){
                        $(".outer_addalldata").hide();
                        if(results["accp"]=="yes"){
                            rightVal("Success!", whichStage+" Successfully Accepted");
                            pageLoad(outer_page);
                        }else{
                            wrongVal("Sorry!", "Something Went Wrong");
                        }
                    }
                });
            }

            var position_reje;
            function quiet(pos){
                position_reje = pos;
            }

            function ARProceedBtn(){
                var s_id = document.getElementById('s_id'+position_reje).innerHTML;
                var proj_name = document.getElementById('proj_name'+position_reje).innerHTML;
                if( ($(".ARTextarea").val()).trim() == ""){
                    wrongVal("Sorry!" ,"Please Write Reason First");
                }else{
                    $.ajax({
                        url:"proj_accept.php",
                        method:"POST",
                        dataType:"json",
                        data:{"project":"rejected", "s_id":s_id, "proj_name":proj_name, "stage":whichStage, "reason":$(".ARTextarea").val()},
                        success:function(results){
                            $(".outer_addalldata").hide();
                            if(results["accp"]=="yes"){
                                $(".outer_ApprRejBox").hide();
                                $(".ARTextarea").val("");
                                rightVal("Success!", whichStage+" Successfully Rejected");
                                pageLoad(outer_page);
                            }else{
                                wrongVal("Sorry!", "Something Went Wrong");
                            }
                        }
                    });
                }
            }

            function TMDownloadBtn(position){
                var s_id = document.getElementById('s_id'+position).innerHTML;
                var proj_name = document.getElementById('proj_name'+position).innerHTML;
                $.ajax({
                    url:"proj_accept.php",
                    type:"POST",
                    dataType:"json",
                    data:{"project":"DLViewStageFile", "sid":s_id, "stage":whichStage, "projName":proj_name},
                    success:function(resp){
                        if(resp["dlfile"] != null){
                            window.open("http://localhost/pro/MAINFILE8/Student Module/"+resp["dlfile"], "_blank");
                        }else{
                            wrongVal("Sorry!", "Something Went Wrong");
                        }
                    }
                });
            }

            var pCPosi;
            function projCompleted(position){
                pCPosi = position;
                if(document.getElementById('proj_stat'+pCPosi).innerHTML == "Active"){
                    $(".outer_compProje").fadeIn();
                }else{
                    wrongVal("Sorry!", "Project Already Set to Completed");
                }
            }

            function compProje(){
                var s_id = document.getElementById('s_id'+pCPosi).innerHTML;
                var proj_name = document.getElementById('proj_name'+pCPosi).innerHTML;
                $.ajax({
                    url:"proj_accept.php",
                    type:"POST",
                    dataType:"json",
                    data:{"project":"CompletedPro", "sid":s_id, "projName":proj_name},
                    success:function(resp){
                        $(".outer_compProje").fadeOut();
                        if(resp["accep"] == "yes"){
                            rightVal("Success!", "Project Is Completed");
                            pageLoad(outer_page);
                        }else{
                            wrongVal("Sorry!", "Something Went Wrong");
                        }
                    }
                });
            }

            $(".asrCancelBtn").click(function(){
                $(".outer_compProje").fadeOut();
            });
            ////////////////////////////////////////////////////////////////////////
        </script>
        
    </body>
</html>