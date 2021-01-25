<?php
require_once 'conn.php';
$conn1=createconn1();
mysqli_select_db($conn1,"projectsubmission");
if(!empty(extract($_POST)))
{
    $id=$_POST["id"];
    $return_data["project"]="yes";
    if(mysqli_num_rows(mysqli_query($conn1,"SELECT * FROM project WHERE s_id=$id AND proj_status!='Submitted'"))==0)
    {
        $return_data["project"]="no";
    }
    echo json_encode($return_data);
    exit();
}
?>
<html>
    <head>
        <title>View Project</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/ViewProject.css" rel="stylesheet">
        <link href="css/Details.css" rel="stylesheet">
         <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
        <script src="js/UserSetting.js"></script>
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
        <!-- //////////////////////////////////////////////////////////////////////////// View Project -->
        <div class="smallCircle">
            <div class="allCircles">
                <div class="cStage1">
                    <div class="smallRight sR1">
                        <img class="smallRightIcon" src="photo\correct.png">
                    </div>
                    <div class="smallWrong sW1">
                        <div class="rw1"></div>
                        <div class="rw2"></div>
                    </div>
                    <div class="smallWating sWt1">
                        <img class="smallWaitingIcon" src="photo\confirmationIcon.png">
                    </div>
                    <div class="smallOpenLock sOL1">
                        <p class="number">1</p>
                    </div>
                </div>

                <div class="lStage2"></div>
                <div class="cStage2">
                    <div class="smallRight sR2">
                        <img class="smallRightIcon" src="photo\correct.png">
                    </div>
                    <div class="smallWrong sW2">
                        <div class="rw1"></div>
                        <div class="rw2"></div>
                    </div>
                    <div class="smallWating sWt2">
                        <img class="smallWaitingIcon" src="photo\confirmationIcon.png">
                    </div>
                    <div class="smallOpenLock sOL2">
                        <p class="number">2</p>
                    </div>
                </div>

                <div class="lStage3"></div>
                <div class="cStage3">
                    <div class="smallRight sR3">
                        <img class="smallRightIcon" src="photo\correct.png">
                    </div>
                    <div class="smallWrong sW3">
                        <div class="rw1"></div>
                        <div class="rw2"></div>
                    </div>
                    <div class="smallWating sWt3">
                        <img class="smallWaitingIcon" src="photo\confirmationIcon.png">
                    </div>
                    <div class="smallOpenLock sOL3">
                        <p class="number">3</p>
                    </div>
                </div>

                <div class="lStage4"></div>
                <div class="cStage4">
                    <div class="smallRight sR4">
                        <img class="smallRightIcon" src="photo\correct.png">
                    </div>
                    <div class="smallWrong sW4">
                        <div class="rw1"></div>
                        <div class="rw2"></div>
                    </div>
                    <div class="smallWating sWt4">
                        <img class="smallWaitingIcon" src="photo\confirmationIcon.png">
                    </div>
                    <div class="smallOpenLock sOL4">
                        <p class="number">4</p>
                    </div>
                </div>

                <div class="lStage5"></div>
                <div class="cStage5">
                    <div class="smallRight sR5">
                        <img class="smallRightIcon" src="photo\correct.png">
                    </div>
                    <div class="smallWrong sW5">
                        <div class="rw1"></div>
                        <div class="rw2"></div>
                    </div>
                    <div class="smallWating sWt5">
                        <img class="smallWaitingIcon" src="photo\confirmationIcon.png">
                    </div>
                    <div class="smallOpenLock sOL5">
                        <p class="number">5</p>
                    </div>
                </div>

                <div class="lStage6"></div>
                <div class="cStage6">
                    <div class="smallRight sR6">
                        <img class="smallRightIcon" src="photo\correct.png">
                    </div>
                    <div class="smallWrong sW6">
                        <div class="rw1"></div>
                        <div class="rw2"></div>
                    </div>
                    <div class="smallWating sWt6">
                        <img class="smallWaitingIcon" src="photo\confirmationIcon.png">
                    </div>
                    <div class="smallOpenLock sOL6">
                        <p class="number">6</p>
                    </div>
                </div>
                
                <div class="lStage7"></div>
                <div class="cStage7">
                    <div class="smallRight sR7">
                        <img class="smallRightIcon" src="photo\correct.png">
                    </div>
                    <div class="smallWrong sW7">
                        <div class="rw1"></div>
                        <div class="rw2"></div>
                    </div>
                    <div class="smallWating sWt7">
                        <img class="smallWaitingIcon" src="photo\confirmationIcon.png">
                    </div>
                    <div class="smallOpenLock sOL7">
                        <p class="number">7</p>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <br/><br/><br/>
            <div class="intro">
                <p class="introName">Title & Introduction</p>
                <img class="introCircleImg projectstatloader" id="1" src="photo/Stage_1_normal.png" />
                <p class="succeCreated intrS succeCreated1">SUCCESSFULLY CREATED</p>
                <p class="rejectedMessg intrR rejected1">REJECTED</p>
                <div class="viewHereTrans introViewHere viewHerestage1" onclick="viewHere('stage1')">View Here</div>
                <p class="watingConfo intrW watingConfo1">WAITING FOR CONFORMATION</p>
            </div>
            <div class="requir">
                <p class="requirName">Survey Of Technologies</p>
                <img class="requirementCircleImg projectstatloader" id='2' src="photo/Stage_2_block.png" />
                <p class="succeCreated requS succeCreated2">SUCCESSFULLY CREATED</p>
                <p class="rejectedMessg requR rejected2">REJECTED</p>
                <div class="viewHereTrans requirViewHere viewHerestage2" onclick="viewHere('stage2')">View Here</div>
                <p class="watingConfo requW watingConfo2">WAITING FOR CONFORMATION</p>
            </div>
            <div class="design">
                <p class="designName">Requirements & Analysis</p>
                <img class="designCircleImg projectstatloader" id='3' src="photo/Stage_3_block.png" />
                <p class="succeCreated desiS succeCreated3">SUCCESSFULLY CREATED</p>
                <p class="rejectedMessg desiR rejected3">REJECTED</p>
                <div class="viewHereTrans designViewHere viewHerestage3" onclick="viewHere('stage3')">View Here</div>
                <p class="watingConfo desiW watingConfo3">WAITING FOR CONFORMATION</p>
            </div>
            <div class="impleme">
                <p class="implemeName">System Design</p>
                <img class="implementationCircleImg projectstatloader"  id='4' src="photo/Stage_4_block.png" />
                <p class="succeCreated implS succeCreated4">SUCCESSFULLY CREATED</p>
                <p class="rejectedMessg implR rejected4">REJECTED</p>
                <div class="viewHereTrans implemeViewHere viewHerestage4" onclick="viewHere('stage4')">View Here</div>
                <p class="watingConfo implW watingConfo4">WAITING FOR CONFORMATION</p>
            </div>
            <div class="result">
                <p class="resultName">Implementation & Testing</p>
                <img class="resultCircleImg projectstatloader" id='5' src="photo/Stage_5_block.png" />
                <p class="succeCreated resuS succeCreated5">SUCCESSFULLY CREATED</p>
                <p class="rejectedMessg resuR rejected5">REJECTED</p>
                <div class="viewHereTrans resultViewHere viewHerestage5" onclick="viewHere('stage5')">View Here</div>
                <p class="watingConfo resuW watingConfo5">WAITING FOR CONFORMATION</p>
            </div>
            <div class="conclu">
                <p class="concluName">Results & Discussion</p>
                <img class="conclusionCircleImg projectstatloader" id='6' src="photo/Stage_6_block.png" />
                <p class="succeCreated concS succeCreated6">SUCCESSFULLY CREATED</p>
                <p class="rejectedMessg concR rejected6">REJECTED</p>
                <div class="viewHereTrans concluViewHere viewHerestage6" onclick="viewHere('stage6')">View Here</div>
                <p class="watingConfo concW watingConfo6">WAITING FOR CONFORMATION</p>
            </div>
            <div class="refere">
                <p class="refereName">Conclusion</p>
                <img class="referenceCircleImg projectstatloader" id='7' src="photo/Stage_7_block.png" />
                <p class="succeCreated refeS succeCreated7">SUCCESSFULLY CREATED</p>
                <p class="rejectedMessg refeR rejected7">REJECTED</p>
                <div class="viewHereTrans refereViewHere viewHerestage7" onclick="viewHere('stage7')">View Here</div>
                <p class="watingConfo refeW watingConfo7">WAITING FOR CONFORMATION</p>
            </div>
        </div>

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

        <div class="outer_viewProjDownloadImg">
            <img src="photo/viewProjDownload.png" class="viewProjDownloadImg">
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Download Files-->
        <div class="outer_viewProDownload">
            <div class="viewProDownload">
                <div class="vPDLBluePart7"></div>
                <img src="photo/AccountSettingBack.png" class="vPDLBack">
                <p class="vPDLHeader">Download Your Uploaded Files</p>
                <div class="vPDLBox vPDLBox1">
                    <p class="vPDLBoxText">1. Title & Introduction</p>
                    <img src="photo/VPDLBoxBack.png" class="vPDLBoxImg vPDLBoxImg1" id="vPDLBoxImg1">
                </div>
                <div class="vPDLBox vPDLBox2">
                    <p class="vPDLBoxText">2. Survey Of Technologies</p>
                    <img src="photo/VPDLBoxBack.png" class="vPDLBoxImg vPDLBoxImg2" id="vPDLBoxImg2">
                </div>
                <div class="vPDLBox vPDLBox3">
                    <p class="vPDLBoxText">3. Requirements & Analysis</p>
                    <img src="photo/VPDLBoxBack.png" class=" vPDLBoxImg vPDLBoxImg3" id="vPDLBoxImg3">
                </div>
                <div class="vPDLBox vPDLBox4">
                    <p class="vPDLBoxText">4. System Design</p>
                    <img src="photo/VPDLBoxBack.png" class="vPDLBoxImg vPDLBoxImg4" id="vPDLBoxImg4">
                </div>
                <div class="vPDLBox vPDLBox5">
                    <p class="vPDLBoxText">5. Implementation & Testing</p>
                    <img src="photo/VPDLBoxBack.png" class="vPDLBoxImg vPDLBoxImg5" id="vPDLBoxImg5">
                </div>
                <div class="vPDLBox vPDLBox6">
                    <p class="vPDLBoxText">6. Results & Discussion</p>
                    <img src="photo/VPDLBoxBack.png" class="vPDLBoxImg vPDLBoxImg6" id="vPDLBoxImg6">
                </div>
                <div class="vPDLBox vPDLBox7">
                    <p class="vPDLBoxText">7. Conclusion</p>
                    <img src="photo/VPDLBoxBack.png" class="vPDLBoxImg vPDLBoxImg7" id="vPDLBoxImg7">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Rejected Message-->
        <div class="outer-fPRejMess">
            <div class="fPRejMess">
                <p class="TeacReport">Teacher's Reports</p>
                <p class="rejMessMessage"></p>
                <p class="messHere">Message here.......</p>
                <div class="cancelRejMess">CANCEL</div>
                <div class="reURejMess" onclick="reURejMess()">Re-Upload</div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

        <!-- ////////////////////////////////////////////////////////////////////////////// Details-->
        <div class="outer-DetailsBox" id="outer_DetailsBox">
            <div class="main-DetailsBox">
                <header class="detailsHeader">Details</header>
                <img src="photo/DialogBoxClose.png" class="closeDetails">
                <div class="userNameDetail">
                    <div class="setUserName">Akash Katkar</div>
                </div>

                <div class="userIdDetail">
                    <div class="setuserId">101</div>
                </div>

                <div class="grNumDetail">
                    <div class="setGrNum">5005</div>
                </div>

                <div class="emailIdDetail">
                    <div class="setEmailId">skykatkar6666@gmail.com</div>
                </div>

                <div class="numberDetail">
                    <div class="setNumber">9429731685</div>
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->
        <script>
            var s_id=localStorage.getItem("sid");
            
            $(document).ready(function(){
                $.ajax({
                    url:"projectcheck_page_load.php",
                    type:"POST",
                    dataType:"json",
                    data:{"sid":s_id},
                    success:function(resp)
                    {
                        var i;
                        for(i=1;i<=7;i++)
                        {
                            console.log(i);
                            if(resp["stage"+i+"_accepted"]=="yes")
                            {
                                $("#"+i).attr("src","photo/Stage_"+i+"_yes.png");
                                $(".succeCreated"+i).show();
                                $(".sR"+i).show();
                            }
                            else if(resp["stage"+i+"_rejected"]=="yes")
                            {
                                $("#"+i).attr("src","photo/Stage_"+i+"_no.png"); 
                                $(".viewHerestage"+i).show();
                                $(".rejected"+i).show();
                                $(".sW"+i).show();
                            }
                            else if(resp["stage"+i+"_submitted"]=="yes")
                            {
                                $("#"+i).attr("src","photo/Stage_"+i+"_con.png"); 
                                $(".watingConfo"+i).show();
                                $(".sWt"+i).show();
                            }
                            else if(resp["stage"+i+"_normal"]=="yes"){
                                $("#"+i).attr("src","photo/Stage_"+i+"_normal.png");
                                $(".sOL"+i).show();
                            }
                            else if(resp["stage"+i+"_blocked"]=="yes")
                            {
                                $("#"+i).attr("src","photo/Stage_"+i+"_block.png");
                                $(".sOL"+i).show();
                            }
                        }
                    }
                })
            })
            var id;
             $(document).on('click',".projectstatloader",function(){
                id=$(this).attr("id");
                jQuery.ajax({
                    url:"check_database.php",
                    type:"POST",
                    dataType:"json",
                    data:{"id":id,"s_id":s_id},
                    success:function(resp)
                    {
                        if(resp["dates"]=="Not Alloted"){
                            wrongVal("Error","Dates for submission have Not been Alloted");
                        }else if(resp["dates"]=="beforedate"){
                            wrongVal("Error","Cannot Upload Before "+resp["proj_starting_date"]);   
                        }else if(resp["dates"]=="expired"){
                            wrongVal("Error","Dates for submission has Expired on "+resp["proj_ending_date"]);   
                        }else if(resp["waiting"]=="wait"){
                            wrongVal("Error!","Please wait for response")
                        }else if(resp["fileaccepted"]=="yes"){
                            wrongVal("Error","File Is Accepted");
                        }else if(resp["prev_rejected"]=="yes"){
                            wrongVal("ERROR","Stage "+(resp["stagenum"])+" Was Rejected");
                        }else if(resp["prev_submitted"]=="yes"){
                            wrongVal("ERROR","Stage "+(resp["stagenum"])+" Not Yet Accepted");
                        }else if(resp["project"]=="Notyetsubmitted"){
                            wrongVal("Error","Project Not Yet Submitted For Stage "+(resp["stagenum"]));
                        }else if(resp["success"]=="success"){
                            localStorage.setItem("Stage","0"+id);
                            localStorage.setItem("id",id);
                            localStorage.setItem("s_id",s_id);
                            $.post("UploadProject.php",
                                function(){
                                location.href="UploadProject.php";
                            });
                        }
                    }
                })
            console.log(id);
            });

            var outer_stage;
            function viewHere(stage){
                outer_stage = stage;
                $.ajax({
                    url:"ajax_call_function.php",
                    type:"POST",
                    dataType:"json",
                    data:{"func":"rejectedReason", "sid":s_id, "stage":stage},
                    success:function(resp){
                        $(".messHere").text(resp["rejectReason"]);
                        $(".outer-fPRejMess").fadeIn();
                    }
                });
            }

            function reURejMess(){
                $.post("UploadProject.php",function(){
                    localStorage.setItem("Stage", "0"+outer_stage.replace(/[^0-9]/gi, ''));
                    location.href="UploadProject.php";
                    localStorage.setItem("id",outer_stage.replace(/[^0-9]/gi, ''));
                });

            }

            $(".vPDLBoxImg1, .vPDLBoxImg2, .vPDLBoxImg3, .vPDLBoxImg4, .vPDLBoxImg5, .vPDLBoxImg6, .vPDLBoxImg7").on("click", function(){
                $.ajax({
                    url:"ajax_call_function.php",
                    type:"POST",
                    dataType:"json",
                    data:{"func":"downloadStageFile", "sid":s_id, "stage":$(this).attr("id").replace(/[^0-9]/gi, '')},
                    success:function(resp){
                        if(resp["dlfile"] != null){
                            window.open("http://localhost/pro/MAINFILE8/Student Module/"+resp["dlfile"], "_blank");
                        }else{
                            $(".outer_viewProDownload").hide();
                            wrongVal("Error!","File Not Uploaded");
                        }
                    }
                });
            });
        </script>
    </body>
</html>
