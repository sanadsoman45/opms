<html>
    <head>
        <title>MyProject</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/Header.css" rel="stylesheet">
        <link href="css/MyProject.css" rel="stylesheet"/>
        <link href="css/UserSetting.css" rel="stylesheet">
        <link href="css/Details.css" rel="stylesheet">
        <link href="css/SlidingMenu.css" rel="stylesheet">
        <link href="css/ConfirmationBox.css" rel="stylesheet">
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
    <body>
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
                <div class="nbItem" id="nbItem2">
                    <span  class="nbIName nbIName2" style="font-size:25px;">My Project</span>
                    <div class="nbIOutline" id="nbIOutline2" style="display: block;"></div>
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
        
        <!-- ////////////////////////////////////////////////////////////////////////////// My Project-->
        <br/>
        <div class="projectDetails">
            <img src="photo/ProjectDetailsIcon.png" class="projectDetailsImg" />
            <p class="projectDetailsName">Project Details</p>

            <div class="outer_pDProjectName">
                <p class="pDProjectName">Project Name</p>
                <div class="outer_pDProjectNameField">
                    <input type="text" class="pDProjectNameField" value="Project Management System" disabled>
                </div>
            </div>
            
            <div class="outer_pDSelectProject">
                <p class="pDSelectProject">Select Project</p>
                <div class="outer_SelProDropdown">
                    <select class="SelProDropdown" id="selectProjectName" required>
                        <option value="" disabled selected hidden class="selProject">Project Name</option>
                        <!-- <option value="Online Project Submission & Management System">Online Project Submission & Management System</option> -->
                    </select>
                    <div class="dLArrow">
                        <img src="photo/down-arrow2.png" class="downArrow2">
                    </div>
                </div>
            </div>

            <div class="outer_pDDescriPro">
                <p class="pDDescriProName">Description Of Your Project</p>
                <div class="outer_pDDescriProTextarea">
                    <textarea class="pDDescriProTextarea" maxlength="150" placeholder="Text Here...."></textarea>
                </div>
                <span class="pDCountChar" id="pD_CountChar">0/150</span>
            </div>

            <div class="outer_pDProjectType">
                <p class="pDProjectType">Select Type</p>
                <div class="outer_pDProjectTypeField">
                    <input type="text" class="pDProjectTypeField" value="Project Management System" disabled>
                </div>
            </div>

            <!-- <div class="outer_pDProjectType">
                <p class="pDProjectType">Select Type</p>
                <div class="outer_pDProjectTypeField">
                    <select class="pDProjectTypeField" required>
                        <option value="" disabled selected hidden>Project Type</option>
                        <option value="Android Development">Android Development</option>
                        <option value=".Net Programming">.Net Programming</option>
                        <option value="Java Development">Java Development</option>
                        <option value="Python">Python</option>
                        <option value="WEB DEVELOPMENT">WEB DEVELOPMENT</option>
                        <option value="IOT">IOT</option>
                    </select>
                    <div class="dLArrow">
                        <img src="photo/down-arrow2.png" class="downArrow2">
                    </div>
                </div>
            </div> -->

            <div class="outer_pDViewProj">
                <p class="pDViewProj_Text">Open Up Your Project</p>
                <div class="outer_pDViewProjBtn">
                    <input type="button" class="pDViewProjBtn" value="View Project">
                </div>
            </div>
        </div>

        <!-- <div class="deleteYourAccout">
            <img src="photo/deleteAcc.png" class="delYourAccImg" />
            <p class="delYourAccName">Delete Your Project</p>
            
            <div class="outer_dYADeleteProj">
                <p class="dYADeleteProjText">Delete Your Created Project Here</p>
                <div class="outer_dYADeleteProjBtn">
                    <input type="button" class="dYADeleteProjBtn" value="Delete">
                </div>
            </div>
        </div> -->

        <div class="outer_pDSaveChangesBtn">
            <input type="button" value="Save Changes" class="pDSaveChangesBtn">
        </div>
        <br/>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Delete Box -->
        <div class="outer_MYDeleteBox">
            <div class="mYDeleteBox">
                <p class="mYDeleteBoxHeader">Delete The Project</p>
                <p class="mYDeleteBoxTitle">Deleting Your Project Will Permanently Delete of Your :</p>
                <p class="mYDeleteBoxTitle1">1. Data in Your Project.</p>
                <p class="mYDeleteBoxTitle2">2. You Cannot Retrieve Any of Those Data & Informations After Deleting the Project.</p>
                <p class="mYDeleteBoxFooter">Please Read the Following & Respond Continuously. Continue DELETE if ok else CANCEL the Process.</p>

                <div class="outer_mYDBCancelBtn">
                    <input type="button" value="CANCEL" class="mYDBCancelBtn">
                </div>
                <div class="outer_mYDBDeleteBtn">
                    <input type="button" value="DELETE" class="mYDBDeleteBtn">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Save Changes Box-->
        <div class="outer_MYSaveChangesBox">
            <div class="mYSaveChangesBox">
                <p class="mYSaveChangesBoxHeader">Are You Sure To Save ?</p>
                <p class="mYSaveChangesBoxText">This Changes Can't be Reversed & You Won't be Able to Change The Data Again For a Day After Saving it.</p>

                <div class="outer_mYSCBSaveBtn">
                    <input type="button" value="SAVE" class="mYSCBSaveBtn">
                </div>
                <div class="outer_mYSCBCancelBtn">
                    <input type="button" value="CANCEL" class="mYSCBCancelBtn">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

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
                    <input type="button" class="opbVerifyBtn opbVerifyDelBtn" value="VERIFY" onclick="opbVerifyDelBtn()">
                    <input type="button" class="opbVerifyBtn opbVerifyDSaveChaBtn" value="VERIFY" onclick="opbVerifyDSaveChaBtn()">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Delete Project Reason Textarea-->
        <!-- <div class="outer_DPRTextarea">
            <div class="DPRTextarea">
                <p class="DPRTextareaTitle">Cause of Rejection</p>
                <div class="outer_DPRTA">
                    <textarea class="DPRTA" maxlength="500" required></textarea>
                    <label>Reason For Deleting Project</label>
                </div>
                <div class="DPRTANextBtn">NEXT</div>
            </div>
        </div> -->
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

                <div class=" menuItem finalizeProject" onclick="finalizeProject()">
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

            
            var description_data;
            //Page Reload
            function pageReaload(source){
                jQuery.ajax({
                    url: "ajax_call_function.php",
                    type: "POST",
                    dataType: "json",
                    data:{"func":"myproject", "sid":localStorage.getItem("sid")},
                    success: function(results){
                        for(var i=0;i<results["allData"].length;i++){
                            for(var j=0;j<results["allData"][0].length;j++){
                                if(j==1  && source == "pagereaload"){
                                    $(".selProject").after("<option>"+ results["allData"][i][j] +"</option>");
                                }
                                if(results["allData"][i][0]=="Selected"){
                                    if(j==1){
                                        $(".pDProjectNameField").val(results["allData"][i][j]);
                                        $(".SelProDropdown").val(results["allData"][i][j]);
                                    }if(j==2){
                                        $(".pDDescriProTextarea").val(results["allData"][i][j]);
                                        $("#pD_CountChar").text((results["allData"][i][j]).length+"/150");
                                        description_data = $(".pDDescriProTextarea").val();
                                    }if(j==3){
                                        $(".pDProjectTypeField").val(results["allData"][i][j]);
                                    }
                                }
                            }
                        }
                    },
                    error:function(e){
                        console.log(e);
                    }
                });
            }

            pageReaload("pagereaload");

            //Project Name Selected
            $('.SelProDropdown').change(function(){
                var myselectedproj = $(this).find("option:selected").text();
                console.log(myselectedproj);
                jQuery.ajax({
                    url: "ajax_call_function.php",
                    type: "POST",
                    dataType: "json",
                    data:{"func":"selProj", "sid":localStorage.getItem("sid"), "selectedProj":myselectedproj},
                    success: function(results){
                        if(results["selProj"]=="yes"){
                            pageReaload("selpro");
                        }else{
                            wrongVal("Sorry!", "Something Went Wrong");
                        }
                    },
                    error:function(e){
                        console.log(e);
                    }
                });
            });

            $(".outer_pDSaveChangesBtn").click(function(){
                if($(".pDDescriProTextarea").val() == description_data){
                    wrongVal("Sorry!", "Not Any Changes");
                }else{
                    $(".outer_MYSaveChangesBox").fadeIn();
                }
            });

            function opbVerifyDSaveChaBtn(){
                if($(".OriPassBoxField").val()!=""){
                    jQuery.ajax({
                        url: "ajax_call_function.php",
                        type: "POST",
                        dataType: "json",
                        data:{"func":"changeSave","sid":localStorage.getItem("sid"),"descData": $(".pDDescriProTextarea").val(),"passcode":$(".OriPassBoxField").val()},
                        success: function(results){
                            if(results["password"]=="wrong"){
                                wrongVal("Error!", "Wrong Password");
                            }else if(results["saveChanges"]=="yes"){
                                $(".OriPassBoxField").val("");
                                $(".outer-OriginalPasswordBox").fadeOut();
                                rightVal("Sorry!", "Successfully Change Data");
                            }else{
                                wrongVal("Sorry!", "Description Not Change");
                            }
                        },
                        error:function(e){
                            console.log(e);
                        }
                    });
                }else{
                    wrongVal("Sorry!", "Please Write Password");
                }
            }

            function opbVerifyDelBtn(){
                if($(".OriPassBoxField").val()!=""){
                    jQuery.ajax({
                        url: "ajax_call_function.php",
                        type: "POST",
                        dataType: "json",
                        data:{"func":"delPro","sid":localStorage.getItem("sid"),"projName":$(".pDProjectNameField").val(),"passcode":$(".OriPassBoxField").val()},
                        success: function(results){
                            if(results["deleteProj"]=="yes"){
                                var x = document.getElementById("selectProjectName");
                                x.remove(x.selectedIndex);
                                $(".outer-OriginalPasswordBox").hide();
                                pageReaload("delPro");
                                rightVal("Error!", "Successfully Deleted Project");
                            }else if(results["password"]=="wrong"){
                                wrongVal("Error!", "Wrong Password");
                            }else if(results["noAnyData"]=="yes"){
                                wrongVal("Error!", "No Any Project");
                                setTimeout(function(){$.post("StudentModule.php", function(){
                                        location.href = "StudentModule.php";
                                    });
                                },2000);
                            }else if(results["reportadmin"]=="yes"){
                                wrongVal("Error!", "Please Report To Admin");
                            }else{
                                wrongVal("Sorry!", "Not Delete Project");
                            }
                        },
                        error:function(e){
                            console.log(e);
                        }
                    });
                }else{
                    wrongVal("Sorry!", "Please Write Password");
                }
            }
        </script>
    </body>
</html>