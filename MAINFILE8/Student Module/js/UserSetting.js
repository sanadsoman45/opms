$(document).ready(function(){
    $(".ASBody").css("background-size", screen.width+"px " +screen.height+"px");
    $(".AccountSettingHeader").css("background-size", screen.width+"px 2.45em");
});

$(document).ready(function() {
    if (typeof InstallTrigger !== 'undefined') {
        $("#countDes").css("margin-top", "-10.7em");
        $(".outer_ContactUsBox").css("margin-top", "4.5em");
    }
});

function home(){
    $("#nbIOutline1").css("display","block");
    $("#nbIOutline2").css("display","none");
    $("#nbIOutline3").css("display","none");
    $("#nbIOutline4").css("display","none");
    $(".nbIName1").css("font-size","25px");
    $(".nbIName2").css("font-size","17px");
    $(".nbIName3").css("font-size","17px");
    $(".nbIName4").css("font-size","17px");
}

function myProject(){
    $("#nbIOutline1").css("display","none");
    $("#nbIOutline2").css("display","block");
    $("#nbIOutline3").css("display","none");
    $("#nbIOutline4").css("display","none");
    $(".nbIName1").css("font-size","17px");
    $(".nbIName2").css("font-size","25px");
    $(".nbIName3").css("font-size","17px");
    $(".nbIName4").css("font-size","17px");
}

function aboutUs(){
    $("#nbIOutline1").css("display","none");
    $("#nbIOutline2").css("display","none");
    $("#nbIOutline3").css("display","block");
    $("#nbIOutline4").css("display","none");
    $(".nbIName1").css("font-size","17px");
    $(".nbIName2").css("font-size","17px");
    $(".nbIName3").css("font-size","25px");
    $(".nbIName4").css("font-size","17px");
}

function faqs(){
    $("#nbIOutline1").css("display","none");
    $("#nbIOutline2").css("display","none");
    $("#nbIOutline3").css("display","none");
    $("#nbIOutline4").css("display","block");
    $(".nbIName1").css("font-size","17px");
    $(".nbIName2").css("font-size","17px");
    $(".nbIName3").css("font-size","17px");
    $(".nbIName4").css("font-size","25px");
}

$(document).ready(function(){
    $("#nbItem1").click(function(){
        home();
    });
    
    $("#home_0").click(function(){
        home();
    });

    // $("#nbItem2").click(function(){
    //     myProject();
    // });

    // $("#myProject_0").click(function(){
    //     myProject();
    // });

    $("#nbItem3").click(function(){
        aboutUs();
    });
    
    $("#aboutUs_0").click(function(){
        aboutUs();
    });

    $("#nbItem4").click(function(){
        faqs();
    });
    
    $("#faqs_0").click(function(){
        faqs();
    });

    $("#user_Image").click(function(){
        $("#set_outer_block").fadeIn(800);
    });

    $('.text_type_name').focusin(function() {
        $('.User_Name').css('border','1.5px solid #3939ce');
    });
    $('.text_type_Name').focusout(function() {
        $('.User_Name').css('border','1px solid #c4bbbb');
    });
        
    $('.text_type_ID').focusin(function() {
        $('.User_ID').css('border','1.5px solid #3939ce');
    });
    $('.text_type_ID').focusout(function() {
        $('.User_ID').css('border','1px solid #c4bbbb');
    });

    $('.text_type_Pro_Name').focusin(function() {
        $('.Pro_Name').css('border','1.5px solid #3939ce');
    });
    $('.text_type_Pro_Name').focusout(function() {
        $('.Pro_Name').css('border','1px solid #c4bbbb');
    });

    $('.text_type_Type_Pro').focusin(function() {
        $('.Type_Pro').css('border','1.5px solid #3939ce');
        $(".downArrow1").css("display", "none");
        $(".downArrow2").css("display", "block");
    });
    $('.text_type_Type_Pro').focusout(function() {
        $('.Type_Pro').css('border','1px solid #c4bbbb');
        $(".downArrow2").css("display", "none");
        $(".downArrow1").css("display", "block");
    });

    $('.text_type_Pro_Description').focusin(function() {
        $('.Pro_Description').css('border','1.5px solid #3939ce');
    });
    $('.text_type_Pro_Description').focusout(function() {
        $('.Pro_Description').css('border','1px solid #c4bbbb');
    });

    $("#Pro-Description").on('keyup keydown', function() {
        $("#countDes").html($("#Pro-Description").val().length +"/150");
    });

    $(".FArrow").click(function(){
        $(".text_type_Format").focus();
    });

    $('.text_type_Format').focusin(function() {
        $('.Format').css('border','1.5px solid #3939ce');
        $(".FArrow1").css("display", "none");
        $(".FArrow2").css("display", "block");
    });
    $('.text_type_Format').focusout(function() {
        $('.Format').css('border','1px solid #c4bbbb');
        $(".FArrow2").css("display", "none");
        $(".FArrow1").css("display", "block");
    });
});

function createbut()
{
    var projname=jQuery("#projname").val();
    var projtype=jQuery("#projtype").val();
    var Description=jQuery("#Pro-Description").val();
    var fn_numbers2 = /^([0-9]+)$/g;
    var s_id=jQuery("#user-ID").val();
    console.log(projtype+"value");
    if(projname=="")
    {
        wrongVal("ERROR","PROJECT NAME IS EMPTY")
    }
    else if(projtype=="")
    {
        wrongVal("ERROR","DEFINE THE PROJECT TYPE");
    }
    else if(Description=="")
    {
        wrongVal("ERROR","DESCRIPTION IS EMPTY");
    }
    else if(projname.match(fn_numbers2))
    {
        wrongVal("ERROR","NUMBERS NOT ALLOWED IN PROJECT NAME");
    }
    else{
        jQuery.ajax({
            url:"DataBase.php",
            type:"POST",
            dataType: "json",
            data:{"projname":projname,"projtype":projtype,"description":Description,"function":"createbut","s_id":s_id},
            success:function(resp){
                $(".text_type_Pro_Name").val("");
                $(".text_type_Type_Pro").val("");
                $(".text_type_Pro_Description").val("");
                if(resp["conn"]=="no")
                {
                    console.log("Database Connection Failed");
                }
                else if(resp["query"]=="samename")
                {
                    wrongVal("Error","Project Already Created");
                }
                else if(resp["query"]=="yes")
                {
                    rightVal("Sucess","PROJECT DETAILS INSERTED");
                    setTimeout(function(){location.href="StudentModule.php"},2000);
                }
                else if(resp["query"]=="no")
                {
                    wrongVal("Error","Please Complete The Project");
                }
            },
            error: function(error) {
                console.log(error);
                // location.reload();
            }
        })
    }
}

function createproject()
{
    $.post("CreateProject.php",function(){
        location.href="CreateProject.php";
    });
}

function viewproject(){
    var id=localStorage.getItem("sid");
    jQuery.ajax({
        url:"ViewProject.php",
        type:"POST",
        data:{"id":id},
        dataType: "json",
        success:function(resp){
            console.log("response is:"+resp);
            console.log(resp["project"]);
            if(resp["project"]=="no")
            {
                 wrongVal("Sorry","Please Create Project First, If You Created Then Wait For Accept Your Project");                
            }
            else
            {
                location.href="ViewProject.php";   
            }
        },
        error: function(error) {
            console.log(error);
            
        }
    })
}

// function uploadproject(stage_id){
//     $.post("UploadProject.php",function(){
//         location.href="UploadProject.php";
//         localStorage.setItem("Stage", stage_id);
//     });
// }

function cancel(){
    history.back();
}

$(document).ready(function(){
    if(localStorage.getItem("Stage") == "01"){
        $(".stage").text("Stage 01");
        $(".uPHeader").text("Introduction");
    }else if(localStorage.getItem("Stage") == "02"){
        $(".stage").text("Stage 02");
        $(".uPHeader").text("Requirement");
    }else if(localStorage.getItem("Stage") == "03"){
        $(".stage").text("Stage 03");
        $(".uPHeader").text("Design");
    }else if(localStorage.getItem("Stage") == "04"){
        $(".stage").text("Stage 04");
        $(".uPHeader").text("Implementation");
    }else if(localStorage.getItem("Stage") == "05"){
        $(".stage").text("Stage 05");
        $(".uPHeader").text("Results");
    }else if(localStorage.getItem("Stage") == "06"){
        $(".stage").text("Stage 06");
        $(".uPHeader").text("Conclusion & Future Scope");
    }else if(localStorage.getItem("Stage") == "07"){
        $(".stage").text("Stage 07");
        $(".uPHeader").text("References");
    }else if(localStorage.getItem("Stage") == "project"){
        $(document).ready(function() {
            $(".stage").text("");
            $(".uPHeader").text("Project File");
            $(".Format").remove();
            $(".chooseFiles").text("CHOOSE ZIP FILE");
            $(".fileUploadPro").attr("accept", ".zip");
            $(".fileUploadPro").removeAttr("disabled");
            $(".fileUploadPro").css("z-index","1").css("position", "unset");
            localStorage.setItem("id","final");
            $(".outer_downloadzipfile").css("display", "inline-block")
        });
    }
});

function cPError1(){
    $.post("CreateProject.php",function(){
        location.href="CreateProject.php";
    });
}

function finalizeProject(){
    $.post("UploadProject.php",function(){
        location.href="UploadProject.php";
        localStorage.setItem("Stage", "project");
    });
}

$(document).ready(function() {
    //Finalize Project Error1
    $(".finalizeProject").click(function(){
        // $(".outer-fPError1").css("display", "block");
    });

    $(".okError1").click(function(){
        $(".outer-fPError1").css("display", "none");
    });

    //Finalize Project Error2
    $(".gotItError2").click(function(){
        $(".outer-fPError2").css("display", "none");
    });

    //Finalize Project Error3
    $(".gotItError3").click(function(){
        $(".outer-fPError3").css("display", "none");
    });

    //Finalize Project Note
    $(".gotItNote").click(function(){
        $(".outer-fPNote").css("display", "none");
    });

    //Alert
    $(".alertIn").click(function(){
        $(".orangeCircle").hide();
        localStorage.setItem("last_time",localStorage.getItem("outer_last_time"));
        $(".outer-fPAlert").fadeIn();
        if($(".outer_alertMessage").height() >= 320){
            $(".outer_alertMessage").css("box-shadow","0px -10px 10px -10px rgba(0, 0, 0, .4) inset");
        }
    });

    $(".gotItAlert").click(function(){
        $(".outer-fPAlert").fadeOut();
    });
});

$(document).ready(function() {
    //Teacher Report
    $(".cancelRejMess").click(function(){
        $(".outer-fPRejMess").fadeOut();
    });
});

// //Instruction
function instruction()
{
    $.post("Instruction.html",function(){
        location.href="Instruction.html";
    });
}

$(document).ready(function() {
    //College Website
  $(".visitCollegeSite").click(function(){
        window.location = "https://mccmulund.ac.in/new1/";
    });


    //Facebook
    $(".facebook").click(function(){
        window.location = "https://www.facebook.com/";
    });

    //Instagram
    $(".instagram").click(function(){
        window.location = "https://www.instagram.com/";
    });

    //Twitter
    $(".twitter").click(function(){
        window.location = "https://twitter.com/";
    });

    //LinkedIn
    $(".linkedIn").click(function(){
        window.location = "https://www.linkedin.com/";
    });
});

$(window).click(function(event) {
    if (event.target.matches("#set_outer_block")) {
        $("#set_outer_block").fadeOut();
    }

    if (event.target.matches("#outer_slidingMenu")) {
        $(".outer-slidingMenu").fadeOut(800);
        $(".slidingMenu").css("margin-left","-368px");
        $(".slidingMenu").css("transition","500ms");
    }

    if (event.target.matches("#outer_DetailsBox")) {
        $("#outer_DetailsBox").fadeOut(300);
    }
});

function openNav() {
    $(document).ready(function(){
        $(".outer-slidingMenu").fadeIn(200);
        $(".slidingMenu").css("margin-left","0");
    });
}

$(document).ready(function(){
    //Box 1
    $(".aboutUsDownArrow1").click(function(){
        $(".box1").css("height", "28.2em");
        $(".aboutUsText1").css("height", "8.7em");
        $(".aboutUsText1").css("overflow-y", "scroll");
        $(".aUDot1").fadeOut(100);
        $(".aboutUsDownArrow1").css("transform", "rotate(180deg)");
        setTimeout(function(){$(".aboutUsDownArrow1").css("display", "none");},500);
        setTimeout(function(){$(".aUDArrow1").css("display", "block");},500);
        $(".aUDArrow1").css("transform", "rotate(180deg)");
        $(".aboutUsText1").css("box-shadow", "0px -15px 15px -15px rgba(0,0,0,.5) inset");
    });

    $(".aUDArrow1").click(function(){
        $(".aboutUsText1").scrollTop("0px");
        $(".box1").css("height", "22em");
        $(".aboutUsText1").css("height", "3.5em");
        $(".aboutUsText1").css("overflow-y", "hidden");
        setTimeout(function(){$(".aUDot1").fadeIn(250);},400);
        $(".aUDArrow1").css("transform", "rotate(0deg)");
        setTimeout(function(){$(".aUDArrow1").css("display", "none");},500);
        setTimeout(function(){$(".aboutUsDownArrow1").css("display", "block");},500);
        $(".aboutUsDownArrow1").css("transform", "rotate(0deg)");
        $(".aboutUsText1").css("box-shadow", "");
    });

    //Box 2
    $(".visionDownArrow1").click(function(){
        $(".box2").css("height", "28.2em");
        $(".visionText1").css("height", "8.7em");
        $(".visionText1").css("overflow-y", "scroll");
        $(".vDot2").fadeOut(100);
        $(".visionDownArrow1").css("transform", "rotate(180deg)");
        setTimeout(function(){$(".visionDownArrow1").css("display", "none");},500);
        setTimeout(function(){$(".visionDArrow1").css("display", "block");},500);
        $(".visionDArrow1").css("transform", "rotate(180deg)");
        $(".visionText1").css("box-shadow", "0px -15px 15px -15px rgba(0,0,0,.5) inset");
    });

    $(".visionDArrow1").click(function(){
        $(".visionText1").scrollTop("0px");
        $(".box2").css("height", "22em");
        $(".visionText1").css("height", "3.5em");
        $(".visionText1").css("overflow-y", "hidden");
        setTimeout(function(){$(".vDot2").fadeIn(250);},400);
        $(".visionDArrow1").css("transform", "rotate(0deg)");
        setTimeout(function(){$(".visionDArrow1").css("display", "none");},500);
        setTimeout(function(){$(".visionDownArrow1").css("display", "block");},500);
        $(".visionDownArrow1").css("transform", "rotate(0deg)");
        $(".visionText1").css("box-shadow", "");
    });

    //Box 3
    $(".missionDownArrow1").click(function(){
        $(".box3").css("height", "28.2em");
        $(".missionText1").css("height", "8.7em");
        $(".missionText1").css("overflow-y", "scroll");
        $(".mDot3").fadeOut(100);
        $(".missionDownArrow1").css("transform", "rotate(180deg)");
        setTimeout(function(){$(".missionDownArrow1").css("display", "none");},500);
        setTimeout(function(){$(".missionDArrow1").css("display", "block");},500);
        $(".missionDArrow1").css("transform", "rotate(180deg)");
        $(".missionText1").css("box-shadow", "0px -15px 15px -15px rgba(0,0,0,.5) inset");
    });

    $(".missionDArrow1").click(function(){
        $(".missionText1").scrollTop("0px");
        $(".box3").css("height", "22em");
        $(".missionText1").css("height", "3.5em");
        $(".missionText1").css("overflow-y", "hidden");
        setTimeout(function(){$(".mDot3").fadeIn(250);},400);
        $(".missionDArrow1").css("transform", "rotate(0deg)");
        setTimeout(function(){$(".missionDArrow1").css("display", "none");},500);
        setTimeout(function(){$(".missionDownArrow1").css("display", "block");},500);
        $(".missionDownArrow1").css("transform", "rotate(0deg)");
        $(".missionText1").css("box-shadow", "");
    });
});

//Home
function nbclick1()
{
    $.post("StudentModule.php",function(){
        location.href="StudentModule.php";
    });
}

//My Project
function nbclick2()
{
    jQuery.ajax({
        url: "ajax_call_function.php",
        type: "POST",
        dataType: "json",
        data:{"func":"checkProject", "sid":localStorage.getItem("sid")},
        success: function(results){
            if(results["projData"] == "yes"){
                myProject();
                $.post("MyProject.php",function(){
                    location.href="MyProject.php";
                });
            }else{
                wrongVal("Sorry!", "Create Project First & if Active State on of Project then go to MyProect");
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

//About Us
function nbclick3()
{
    $.post("AboutUs.html",function(){
        location.href="AboutUs.html";
    });
}

//About Us
function nbclick4()
{
    $.post("FAQs.php",function(){
        location.href="FAQs.php";
    });
}

$(document).ready(function(){
    if(($(".chooseFiles").text() == "CHOOSE ZIP FILE")){
        $(".fileUploadPro").css("z-index", "1");
        $(".fileUploadPro").css("position", "unset");
        $(".fileUploadPro").removeAttr("disabled");
        $(".fileUploadPro").attr("accept", ".zip");
    }

    $(".text_type_Format").change(function(){
        $(".fileUploadPro").css("z-index", "1");
        $(".fileUploadPro").css("position", "unset");
        $(".fileUploadPro").removeAttr("disabled");
        $(".fileUploadPro").attr("accept", ("."+$(".text_type_Format").val()))
    });

    $(".clickForUpload").click(function() {
        if($(".uPHeader").text() != "Project File"){
            $(".fileUploadPro").val("");
            $(".dFileName").text("");
            if(($(".chooseFiles").text() == "CHOOSE FILES")){
                if((($(".text_type_Format").val()) == "") || (($(".text_type_Format").val()) == null)){
                    wrongVal("Sorry!", "Choose First File Format");
                }
            }
        }
    });

    $(".fileUploadPro").on('change', function() {
        var fileExtension = ($(".fileUploadPro").val()).substr(($(".fileUploadPro").val()).lastIndexOf(".") + 1);
        if(localStorage.getItem("Stage") == "project"){
            if(fileExtension == "zip" || fileExtension == "" || fileExtension == null){
                var curfile = ($(".fileUploadPro").val()).substr(($(".fileUploadPro").val()).lastIndexOf("\\") + 1);
                if(curfile == "" || curfile == null){
                    $(".dFileName").text("");
                }else if(curfile.length >= 35){
                    $(".dFileName").text("File Name Is " + curfile.slice(0, 15)+ "..." + curfile.slice(-7));
                }else{
                    $(".dFileName").text("File Name Is " + curfile);
                }
            }else{
                wrongVal("Sorry!", "Only Accept Zip File Format");
            }
        }else{
            if(fileExtension == ($(".text_type_Format").val()) || fileExtension == "" || fileExtension == null){
                var curfile = ($(".fileUploadPro").val()).substr(($(".fileUploadPro").val()).lastIndexOf("\\") + 1);
                if(curfile == "" || curfile == null){
                    $(".fileUploadPro").val("");
                    $(".dFileName").text("");
                }else if(curfile.length >= 35){
                    $(".dFileName").text("File Name Is " + curfile.slice(0, 15)+ "..." + curfile.slice(-7));
                }else{
                    $(".dFileName").text("File Name Is " + curfile);
                }
            }else{
                wrongVal("Sorry!", "File Format Is Wrong");
                $(".fileUploadPro").val("");
                $(".dFileName").text("");
            }
        }     
    });
});

$(document).ready(function(){
    $(".outer-details").click(function(){
        $("#set_outer_block").fadeOut(200);
        $("#outer_DetailsBox").fadeIn(500);
    });

    $(".closeDetails").click(function(){
        $("#outer_DetailsBox").fadeOut(300);
    });
});

$(document).ready(function(){
    //Account Setting FirstName
    $(".pDFirstNameField").focusin(function(){
        $(".outer_pDFirstNameField").css("border", "1px solid blue");
        $(".outer_pDFirstNameField").css("box-shadow", "0px 0px 3px blue");
    });
    $(".pDFirstNameField").focusout(function(){
        $(".outer_pDFirstNameField").css("border", "1px solid rgba(122, 122, 122, .6)");
        $(".outer_pDFirstNameField").css("box-shadow", "");
    });

    //Account Setting Contact Number
    $(".pDNumberField").focusin(function(){
        $(".outer_pDNumberField").css("border", "1px solid blue");
        $(".outer_pDNumberField").css("box-shadow", "0px 0px 3px blue");
    });
    $(".pDNumberField").focusout(function(){
        $(".outer_pDNumberField").css("border", "1px solid rgba(122, 122, 122, .5)");
        $(".outer_pDNumberField").css("box-shadow", "");
    });

    // //Account Setting GR Number
    // $(".pDGrNumField").focusin(function(){
    //     $(".outer_pDGrNumField").css("border", "1px solid blue");
    //     $(".outer_pDGrNumField").css("box-shadow", "0px 0px 3px blue");
    // });
    // $(".pDGrNumField").focusout(function(){
    //     $(".outer_pDGrNumField").css("border", "1px solid rgba(122, 122, 122, .5)");
    //     $(".outer_pDGrNumField").css("box-shadow", "");
    // });

    //Account Setting Email ID
    $(".pDEmailIdField").focusin(function(){
        $(".outer_pDEmailIdField").css("border", "1px solid blue");
        $(".outer_pDEmailIdField").css("box-shadow", "0px 0px 3px blue");
    });
    $(".pDEmailIdField").focusout(function(){
        $(".outer_pDEmailIdField").css("border", "1px solid rgba(122, 122, 122, .6)");
        $(".outer_pDEmailIdField").css("box-shadow", "");
    });
});

$(document).ready(function(){
    //Reset Password 1
    $(".cPResetPassword").click(function(){
        $(".outer-aSResetPassword").fadeIn();
    });

    $(".aSChangePassImg").click(function(){
        $(".outer-aSResetPassword").fadeOut();
    });

    $(".outer_aSEye").click(function(){
        if($("#aSSlash_Eye").attr("class") == "aSSlash-Eye"){
            $("#aSSlash_Eye").attr("class", "aSEye");
            $(".cPChangePassField").attr("type", "text");
        }else{
            $("#aSSlash_Eye").attr("class", "aSSlash-Eye");
            $(".cPChangePassField").attr("type", "password");
        }
    });

    // $(".aSNextBtn").click(function(){
    //     $(".outer-aSResetPassword").fadeOut(800);
    //     $(".outer-aSResetPassOtp").fadeIn();
    // });

    //Reset Password 2
    // $(".aSPassOtpImg").click(function(){
    //     $(".outer-aSResetPassOtp").fadeOut();
    // });

    // $(".outer_aSEyeOpt").click(function(){
    //     if($("#aSSlash_EyeOtp").attr("class") == "aSSlash-Eye"){
    //         $("#aSSlash_EyeOtp").attr("class", "aSEye");
    //         $(".cPOtpField").attr("type", "text");
    //     }else{
    //         $("#aSSlash_EyeOtp").attr("class", "aSSlash-Eye");
    //         $(".cPOtpField").attr("type", "password");
    //     }
    // });
    
    $(document).ready(function(){
        $(".outer_RPOtp0").bind({
            keydown: function(e) {
                if (e.shiftKey === true ) {
                    if (e.which == 9) {
                        return true;
                    }
                    return false;
                }
                if((e.which>47) && (e.which<58)){
                    if($(".RPOtpTextField1").is(':focus')){
                        setTimeout(function(){$(".RPOtpTextField2").focus();},100);
                    }
                    if($(".RPOtpTextField2").is(':focus')){
                        setTimeout(function(){$(".RPOtpTextField3").focus();},100);
                    }
                    if($(".RPOtpTextField3").is(':focus')){
                        setTimeout(function(){$(".RPOtpTextField4").focus();},100);
                    }
                    return true;
                }
                if(((e.which>95) && (e.which<106))){
                    if($(".RPOtpTextField1").is(':focus')){
                        setTimeout(function(){$(".RPOtpTextField2").focus();},100);
                    }
                    if($(".RPOtpTextField2").is(':focus')){
                        setTimeout(function(){$(".RPOtpTextField3").focus();},100);
                    }
                    if($(".RPOtpTextField3").is(':focus')){
                        setTimeout(function(){$(".RPOtpTextField4").focus();},100);
                    }
                    return true;
                }
                if (e.which > 57) {
                    return false;
                }
                if (e.which==32) {
                    return false;
                }
                return true;
            }
        });
    });

    // $(".outer_aSNextOtpBtn").click(function(){
    //     $(".outer-aSResetPassOtp").fadeOut(1000);
    //     $(".outer-aSResetNewPassword").fadeIn();
    // });

    //Reset Password 3
    $(".outer_aSNEye1").click(function(){
        if($("#aSSlash_NEye1").attr("class") == "aSSlash-Eye"){
            $("#aSSlash_NEye1").attr("class", "aSEye");
            $(".cPNewPassField1").attr("type", "text");
        }else{
            $("#aSSlash_NEye1").attr("class", "aSSlash-Eye");
            $(".cPNewPassField1").attr("type", "password");
        }
    });

    $(".outer_aSNEye2").click(function(){
        if($("#aSSlash_NEye2").attr("class") == "aSSlash-Eye"){
            $("#aSSlash_NEye2").attr("class", "aSEye");
            $(".cPNewPassField2").attr("type", "text");
        }else{
            $("#aSSlash_NEye2").attr("class", "aSSlash-Eye");
            $(".cPNewPassField2").attr("type", "password");
        }
    });

    // $(".aSNSaveBtn").click(function(){
    //     $(".outer-aSResetNewPassword").fadeOut();
    // });

    $(".aSForgetPassword").click(function(){
        $(".outer-aSResetPassword").hide();
        $(".outer-block").css("display", "flex");
    });

    //Original Password Box
    $(".outer_aAAPDeleteBtn").click(function(){
        $(".opbVerifyDSaveChaBtn").fadeOut();
        $(".opbVerifyDelBtn").fadeOut();
        $(".opbVerifyBtns2").fadeOut();
        $(".opbVerifyBtnp1").css("display", "block");
        $(".outer_deaAProceedBox").fadeOut();
        $(".outer-OriginalPasswordBox").fadeIn();
    });

    // $(".outer_mYDBDeleteBtn").click(function(){
    //     $(".outer_MYDeleteBox").fadeOut();
    //     $(".outer_DPRTextarea").fadeIn();
    // });

    // $(".DPRTANextBtn").click(function(){
    //     $(".opbVerifyBtnp1").fadeOut();
    //     $(".opbVerifyBtns2").fadeOut();
    //     $(".opbVerifyDSaveChaBtn").fadeOut();
    //     $(".opbVerifyDelBtn").fadeIn();
    //     $(".outer_DPRTextarea").fadeOut();
    //     $(".outer-OriginalPasswordBox").fadeIn();
    // });

    $(".outer_mYDBDeleteBtn").click(function(){
        $(".opbVerifyDSaveChaBtn").hide();
        $(".opbVerifyDelBtn").css("display", "inline-block");
        $(".outer_MYDeleteBox").fadeOut();
        $(".outer-OriginalPasswordBox").fadeIn();
    });

    $(".outer_mYSCBSaveBtn").click(function(){
        $(".opbVerifyBtnp1").css("display", "none");
        $(".opbVerifyBtns2").css("display", "none");
        $(".opbVerifyDelBtn").css("display", "none");
        $(".opbVerifyDSaveChaBtn").fadeIn();
        $(".outer_MYSaveChangesBox").fadeOut();
        $(".outer-OriginalPasswordBox").fadeIn();
    });

    $(".oriPassBoxImg").click(function(){
        $(".OriPassBoxField").attr("type", "password");
        $("#opbSlash_Eye").attr("class", "aSSlash-Eye");
        $(".outer-OriginalPasswordBox").fadeOut();
        $(".OriPassBoxField").val("");
    });

    $(".opbCancelBtn").click(function(){
        $(".OriPassBoxField").attr("type", "password");
        $("#opbSlash_Eye").attr("class", "aSSlash-Eye");
        $(".outer-OriginalPasswordBox").fadeOut();
        $(".OriPassBoxField").val("");
    });

    $(".outer_opbEye").click(function(){
        if($("#opbSlash_Eye").attr("class") == "aSSlash-Eye"){
            $("#opbSlash_Eye").attr("class", "aSEye");
            $(".OriPassBoxField").attr("type", "text");
        }else{
            $("#opbSlash_Eye").attr("class", "aSSlash-Eye");
            $(".OriPassBoxField").attr("type", "password");
        }
    });
});

var checkButton;
var random_otp;
var si;
function startNewTimer(duration, display) {
    $(".aSResendOtpBtn").attr("onclick", "");
    var timer = duration, minutes, seconds;
    si = setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = "Resend OTP In "+minutes + ":" + seconds;
        if (--timer < 0) {
            clearInterval(si);
            $(".aSResendOtpBtn").attr("onclick", "aSResendOtpBtn()");
            display.textContent = "";
        }
    }, 1000);
}
$(document).ready(function(){
    $(".AccSetBackImg").click(function(){
        history.back();
    });
    $(".InstructionBackImg").click(function(){
        history.back();
    });
    $(".outer_deactAccButton").click(function(){
        $(".outer_deaAProceedBox").fadeIn();
    });
    $(".outer_aAAPCancelBtn").click(function(){
        $(".outer_deaAProceedBox").fadeOut();
    });

    $(".outer_viewProjDownloadImg").click(function(){
        $(".outer_viewProDownload").fadeIn();
    });
    $(".vPDLBack").click(function(){
        $(".outer_viewProDownload").fadeOut();
    });
    $(".outer_aSCancelBtn").click(function(){
        history.back();
    });

    $(".outer_aSSaveChangeBtn").click(function(){
        var outer_user_email= localStorage.getItem("semail");
        var outer_user_name =  localStorage.getItem("sname");
        var outer_user_number = localStorage.getItem("spn");
        var user_name =  $(".pDFirstNameField").val().trim();
        var user_number = $(".pDNumberField").val().trim();
        var user_email = $(".pDEmailIdField").val().trim();
        user_id = localStorage.getItem("sid");
        if(outer_user_email != user_email || outer_user_name != user_name || outer_user_number != user_number){
            // console.log(outer_user_email + " " +outer_user_name + " "+outer_user_number + " " +user_name + " "+user_number + " "+user_email + " ");
            if(user_name == "" || user_name == null){
                wrongVal("Sorry!", "User Name Must Be Filled Out");
            }else if(!(user_name.match(/^([a-zA-Z\s]+)$/g))){
                wrongVal("Sorry!", "Full Name Should Contain Only Letters For Ex. (A-Z a-z)");
            }else if(user_number == "" || user_number == null){
                wrongVal("Sorry!", "Contact Number Must Be Filled Out");
            }else if(!(user_number.match(/^([0-9]+)$/g))){
                wrongVal("Sorry!", "Contact Number Should Contain Only Digits From 0-9");
            }else if(!(user_number.length == 10)){
                wrongVal("Sorry!", "Contact Number Should Contain Only 10 Digits");
            }else if(user_email == "" || user_email == null){
                wrongVal("Sorry!", "Email ID Must Be Filled Out");
            }else if(!(user_email.match(/^[a-zA-Z0-9]{1,20}\@[a-zA-Z]{2,5}\.[a-z]{2,4}$/g))){
                wrongVal("Sorry!", "Invalid Email-ID");
            }else{
                jQuery.ajax({
                    url: "AccountSetting.php",
                    type: "POST",
                    dataType: "json",
                    data:{"DelAcc":"checkExistence","unumber":user_number,"uemail":user_email,"uid":user_id},
                    success: function(results){
                        if(results["existence"] == "no"){
                            $(".outer_allsavechangesbox").fadeIn();
                        }else if(results["savedetails"] == "existnumemail"){
                            wrongVal("Sorry!", "Email & Number Already Exist");
                        }else if(results["savedetails"] == "existnum"){
                            wrongVal("Sorry!", "Number Already Exist");
                        }else if(results["savedetails"] == "existemail"){
                            wrongVal("Sorry!", "Email Already Exist");
                        }
                    },error:function(e){
                        console.log(e);
                    }
                });
            }
        }else{
            $(".outer_allsavechangesbox").hide();
            wrongVal("Sorry!", "No Any Changes");
        }
    });
    $(".aedCancelBtn").click(function(){
        $(".outer_allsavechangesbox").fadeOut();
    });

    $(".outer_allsavechangesbtn").click(function(){
        checkButton = "outer_allsavechangesbtn";
        var user_name =  $(".pDFirstNameField").val().trim();
        var user_number = $(".pDNumberField").val().trim();
        var user_email = $(".pDEmailIdField").val().trim();
        if(localStorage.getItem("semail") != user_email){
            $(".outer_allsavechangesbox").fadeOut();
            $(".outer_aSNextOtpBtn").hide();
            $(".outer_aSSubmitOtpBtn").show();
            $(".wsmodal").css("display","block");
            jQuery.ajax({
                url: "AccountSetting.php",
                type: "POST",
                dataType: "json",
                data:{"DelAcc":"sendEmail", "uname":user_name,"uemail":user_email},
                success: function(results){
                    $(".wsmodal").css("display","none");
                    if(results["sendemail"] == "yes"){
                        random_otp = results["uotp"];
                        rightVal("Success!", "Send Mail On New Email-ID");
                        $(".outer-aSResetPassOtp").fadeIn();
                        startNewTimer(60 * 1, document.querySelector('.aSResendOtpText'));
                    }else{
                        wrongVal("Sorry!", "Not Send Email");
                    }
                },
                error:function(e){
                    console.log(e);
                }
            });
        }else{
            editDetails(user_name, user_number, user_email);
        }
    });

    $(".outer_aSSubmitOtpBtn").click(function(){
        var user_name =  $(".pDFirstNameField").val().trim();
        var user_number = $(".pDNumberField").val().trim();
        var user_email = $(".pDEmailIdField").val().trim();
        var otp = $(".RPOtpTextField1").val()+""+$(".RPOtpTextField2").val()+""+$(".RPOtpTextField3").val()+""+$(".RPOtpTextField4").val();
        if(random_otp == otp)
        {
            clearInterval(si);
            editDetails(user_name, user_number, user_email);
        }else{
            wrongVal("Sorry!", "OTP Is Invalid");
        }
    });

    $(".aSNextClickBtn").click(function(){
        checkButton = "aSNextBtn";
        if(($(".cPChangePassField").val()) == "" || ($(".cPChangePassField").val()) == null){
            wrongVal("Sorry!", "Password Must Be Filled Out");
        }else{
            jQuery.ajax({
                url: "AccountSetting.php",
                type: "POST",
                dataType: "json",
                data: {"DelAcc":"curpass","aid":(localStorage.getItem("sid")), "currentPass":($(".cPChangePassField").val())},
                success: function(results){
                    if(results["verifyPass"] == "yes"){
                        $(".wsmodal").css("display","block");
                        jQuery.ajax({
                            url: "AccountSetting.php",
                            type: "POST",
                            dataType: "json",
                            data:{"DelAcc":"sendEmail", "uname":($(".pDFirstNameField").val()),"uemail":($(".pDEmailIdField").val())},
                            success: function(results){
                                $(".wsmodal").css("display","none");
                                if(results["sendemail"] == "yes"){
                                    random_otp = results["uotp"];
                                    rightVal("Success!", "Send Mail On New Email-ID");
                                    $(".cPChangePassField").val('');
                                    $(".outer-aSResetPassword").fadeOut();
                                    $(".outer-aSResetPassOtp").fadeIn();
                                    $(".outer_aSSubmitOtpBtn").hide();
                                    $(".outer_aSNextOtpBtn").show();
                                    startNewTimer(60 * 1, document.querySelector('.aSResendOtpText'));
                                }else{
                                    wrongVal("Sorry!", "Not Send Email");
                                }
                            },
                            error:function(e){
                                console.log(e);
                            }
                        });
                    }else{
                        wrongVal("Sorry!", "Wrong Password");
                    }
                },error:function(e){
                    console.log(e);
                }
            });
        }
    });

    $(".outer_aSNextOtpBtn").click(function(){
        var otp = $(".RPOtpTextField1").val()+""+$(".RPOtpTextField2").val()+""+$(".RPOtpTextField3").val()+""+$(".RPOtpTextField4").val();
        if(random_otp == otp){
            clearInterval(si);
            $(".outer-aSResetPassOtp").fadeOut();
            $(".outer-aSResetNewPassword").fadeIn();
            $(".RPOtpTextField1").val("");
            $(".RPOtpTextField2").val("");
            $(".RPOtpTextField3").val("");
            $(".RPOtpTextField4").val("");
        }else{
            wrongVal("Sorry!", "OTP Is Invalid");
        }
    });

    $(".outer_aSNSaveBtn").click(function(){
        var apassword = $(".cPNewPassField1").val();
        var arepassword = $(".cPNewPassField2").val();
        if (apassword == null || apassword == "") {
            wrongVal("Error", "PASSWORD FIELD IS EMPTY");
        } else if (!(apassword.match(/[a-z]/g))) {
            wrongVal("Sorry!", "Lowercase Should Be Included");
        } else if (!(apassword.match(/[A-Z]/g))) {
            wrongVal("Sorry!", "Uppercase Should Be Included");
        } else if (!(apassword.match(/[0-9]/g))) {
            wrongVal("Sorry!", "Digits Should Be Included");
        } else if (!(apassword.match(/[\@\$\&\#\!\%]/g))) {
            wrongVal("Sorry!", "SpecialCase Should Be Included");
        } else if (apassword.length < 8) {
            wrongVal("Sorry!", "At Least 8 Or More Characters Should Be Included");
        } else if (arepassword == "" || arepassword == null) {
            wrongVal("Sorry!", "RePassword Must Be Filled Out");
        } else if (apassword != arepassword) {
            wrongVal("Sorry!", "Password Not Match");
        } else{
            jQuery.ajax({
                url: "AccountSetting.php",
                type: "POST",
                dataType: "json",
                data:{"DelAcc":"saveNewPass", "upass":($(".cPNewPassField2").val()),"uid":(localStorage.getItem("sid"))},
                success: function(results){
                    if(results["exist"] == "yes"){
                        wrongVal("Sorry!", "Password Is Allready Exist");
                    }else if(results["setPass"] == "yes"){
                        $(".outer-aSResetNewPassword").fadeOut();
                        rightVal("Success!", "Set New Password Successfully");
                        $(".cPNewPassField1").val("");
                        $(".cPNewPassField2").val("");
                    }else{
                        $(".outer-aSResetNewPassword").fadeOut();
                        wrongVal("Sorry!", "Not Set Password");
                    }
                },
                error:function(e){
                    console.log(e);
                }
            });
        }
    });
});

function aSResendOtpBtn(){
    if(checkButton == "outer_allsavechangesbtn"){
        $(".outer_allsavechangesbtn").click();
    }else if(checkButton == "aSNextBtn"){
        $(".wsmodal").css("display","block");
        jQuery.ajax({
            url: "AccountSetting.php",
            type: "POST",
            dataType: "json",
            data:{"DelAcc":"sendEmail", "uname":($(".pDFirstNameField").val().trim()),"uemail":($(".pDEmailIdField").val().trim())},
            success: function(results){
                $(".wsmodal").css("display","none");
                if(results["sendemail"] == "yes"){
                    random_otp = results["uotp"];
                    rightVal("Success!", "Send Mail On New Email-ID");
                    startNewTimer(60 * 1, document.querySelector('.aSResendOtpText'));
                }else{
                    wrongVal("Sorry!", "Not Send Email");
                }
            },
            error:function(e){
                console.log(e);
            }
        });
    }
}
    
function editDetails(user_name, user_number, user_email){
    $(".outer_allsavechangesbox").fadeOut();
    $(".outer-aSResetPassOtp").fadeOut();
    user_id = localStorage.getItem("sid");
    jQuery.ajax({
        url: "AccountSetting.php",
        type: "POST",
        dataType: "json",
        data:{"DelAcc":"EditAcc","uname":user_name,"unumber":user_number,"uemail":user_email,"uid":user_id},
        success: function(results){
            if(results["savedetails"] == "yes"){
                rightVal("Success!", "Save Changes");
                localStorage.setItem("sname", user_name);
                localStorage.setItem("spn", user_number);
                localStorage.setItem("semail", user_email);
            }else{
                wrongVal("Sorry!", "Not Save Changes");
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

function accountSetting(){
    $.post("AccountSetting.php",function(){
        location.href="AccountSetting.php";
    });
}

$(document).ready(function(){
    if(((window.location.href).substr((window.location.href).lastIndexOf("/") + 1)) == "MyProject.php"){
        $("#pD_CountChar").text(($(".pDDescriProTextarea").val().length) + "/150");
    }

    $(".pDDescriProTextarea").on("keydown keyup" ,function(){
        $("#pD_CountChar").text(($(".pDDescriProTextarea").val().length) + "/150");
    });

    $(".outer_pDViewProjBtn").click(function(){
        $.post("ViewProject.php", function(){
            location.href = "ViewProject.php";
        });
    });

    $(".outer_dYADeleteProjBtn").click(function(){
        $(".outer_MYDeleteBox").fadeIn();
    });

    $(".outer_mYDBCancelBtn").click(function(){
        $(".outer_MYDeleteBox").fadeOut();
    });

    // $(".outer_pDSaveChangesBtn").click(function(){
    //     $(".outer_MYSaveChangesBox").fadeIn();
    // })
    
    $(".outer_mYSCBCancelBtn").click(function(){
        $(".outer_MYSaveChangesBox").fadeOut();
    })
});

$(document).ready(function(){
    $(".faqs1").click(function(){
        if($(".faqs1").css("height") == "88.1px"){
            setTimeout(function(){$(".faqImg01").css("display", "none");},400);
            setTimeout(function(){$(".faqImg1").css("display", "block");},400);
            $(".faqImg01").css("transform", "rotate(-90deg)");
            $(".faqImg1").css("transform", "rotate(0deg)");
            $(".faqs1").css("height", "5.5em");
            $(".outer_faqsTitleInfo1").css("height", "0");
            $(".outer_faqsTitleInfo1").css("padding-top", "0");
            $(".faqsTitleInfo1").fadeOut();
        }else if($(".faqs1").css("height") == "88px"){
            setTimeout(function(){$(".faqImg1").css("display", "none");},400);
            setTimeout(function(){$(".faqImg01").css("display", "block");},400);
            $(".faqImg1").css("transform", "rotate(90deg)");
            $(".faqImg01").css("transform", "rotate(0deg)");
            $(".faqs1").css("height", "88.1px");
            $(".outer_faqsTitleInfo1").css("height", "5em");
            $(".outer_faqsTitleInfo1").css("padding-top", "1em");
            $(".faqsTitleInfo1").fadeIn();
        }
    });

    $(".faqs2").click(function(){
        if($(".faqs2").css("height") == "88.1px"){
            setTimeout(function(){$(".faqImg02").css("display", "none");},400);
            setTimeout(function(){$(".faqImg2").css("display", "block");},400);
            $(".faqImg02").css("transform", "rotate(-90deg)");
            $(".faqImg2").css("transform", "rotate(0deg)");
            $(".faqs2").css("height", "5.5em");
            $(".outer_faqsTitleInfo2").css("height", "0");
            $(".outer_faqsTitleInfo2").css("padding-top", "0");
            $(".faqsTitleInfo2").fadeOut();
        }else if($(".faqs2").css("height") == "88px"){
            setTimeout(function(){$(".faqImg2").css("display", "none");},400);
            setTimeout(function(){$(".faqImg02").css("display", "block");},400);
            $(".faqImg2").css("transform", "rotate(90deg)");
            $(".faqImg02").css("transform", "rotate(0deg)");
            $(".faqs2").css("height", "88.1px");
            $(".outer_faqsTitleInfo2").css("height", "6.4em");
            $(".outer_faqsTitleInfo2").css("padding-top", "1em");
            $(".faqsTitleInfo2").fadeIn();
        }
    });

    $(".faqs3").click(function(){
        if($(".faqs3").css("height") == "88.1px"){
            setTimeout(function(){$(".faqImg03").css("display", "none");},400);
            setTimeout(function(){$(".faqImg3").css("display", "block");},400);
            $(".faqImg03").css("transform", "rotate(-90deg)");
            $(".faqImg3").css("transform", "rotate(0deg)");
            $(".faqs3").css("height", "5.5em");
            $(".outer_faqsTitleInfo3").css("height", "0");
            $(".outer_faqsTitleInfo3").css("padding-top", "0");
            $(".faqsTitleInfo3").fadeOut();
        }else if($(".faqs3").css("height") == "88px"){
            setTimeout(function(){$(".faqImg3").css("display", "none");},400);
            setTimeout(function(){$(".faqImg03").css("display", "block");},400);
            $(".faqImg3").css("transform", "rotate(90deg)");
            $(".faqImg03").css("transform", "rotate(0deg)");
            $(".faqs3").css("height", "88.1px");
            $(".outer_faqsTitleInfo3").css("height", "10.5em");
            $(".outer_faqsTitleInfo3").css("padding-top", "1em");
            $(".faqsTitleInfo3").fadeIn();
        }
    });

    $(".faqs4").click(function(){
        if($(".faqs4").css("height") == "88.1px"){
            setTimeout(function(){$(".faqImg04").css("display", "none");},400);
            setTimeout(function(){$(".faqImg4").css("display", "block");},400);
            $(".faqImg04").css("transform", "rotate(-90deg)");
            $(".faqImg4").css("transform", "rotate(0deg)");
            $(".faqs4").css("height", "5.5em");
            $(".outer_faqsTitleInfo4").css("height", "0");
            $(".outer_faqsTitleInfo4").css("padding-top", "0");
            $(".faqsTitleInfo4").fadeOut();
        }else if($(".faqs4").css("height") == "88px"){
            setTimeout(function(){$(".faqImg4").css("display", "none");},400);
            setTimeout(function(){$(".faqImg04").css("display", "block");},400);
            $(".faqImg4").css("transform", "rotate(90deg)");
            $(".faqImg04").css("transform", "rotate(0deg)");
            $(".faqs4").css("height", "88.1px");
            $(".outer_faqsTitleInfo4").css("height", "5.2em");
            $(".outer_faqsTitleInfo4").css("padding-top", "1em");
            $(".faqsTitleInfo4").fadeIn();
        }
    });
    
    $(".faqs5").click(function(){
        if($(".faqs5").css("height") == "88.1px"){
            setTimeout(function(){$(".faqImg05").css("display", "none");},400);
            setTimeout(function(){$(".faqImg5").css("display", "block");},400);
            $(".faqImg05").css("transform", "rotate(-90deg)");
            $(".faqImg5").css("transform", "rotate(0deg)");
            $(".faqs5").css("height", "5.5em");
            $(".outer_faqsTitleInfo5").css("height", "0");
            $(".outer_faqsTitleInfo5").css("padding-top", "0");
            $(".faqsTitleInfo5").fadeOut();
        }else if($(".faqs5").css("height") == "88px"){
            setTimeout(function(){$(".faqImg5").css("display", "none");},400);
            setTimeout(function(){$(".faqImg05").css("display", "block");},400);
            $(".faqImg5").css("transform", "rotate(90deg)");
            $(".faqImg05").css("transform", "rotate(0deg)");
            $(".faqs5").css("height", "88.1px");
            $(".outer_faqsTitleInfo5").css("height", "10.5em");
            $(".outer_faqsTitleInfo5").css("padding-top", "1em");
            $(".faqsTitleInfo5").fadeIn();
        }
    });
    
    $(".faqs6").click(function(){
        if($(".faqs6").css("height") == "88.1px"){
            setTimeout(function(){$(".faqImg06").css("display", "none");},400);
            setTimeout(function(){$(".faqImg6").css("display", "block");},400);
            $(".faqImg06").css("transform", "rotate(-90deg)");
            $(".faqImg6").css("transform", "rotate(0deg)");
            $(".faqs6").css("height", "5.5em");
            $(".outer_faqsTitleInfo6").css("height", "0");
            $(".outer_faqsTitleInfo6").css("padding-top", "0");
            $(".faqsTitleInfo6").fadeOut(400);
            setTimeout(function(){$(".faqsspan6").css("display", "none");},50);
        }else if($(".faqs6").css("height") == "88px"){
            setTimeout(function(){$(".faqImg6").css("display", "none");},400);
            setTimeout(function(){$(".faqImg06").css("display", "block");},400);
            $(".faqImg6").css("transform", "rotate(90deg)");
            $(".faqImg06").css("transform", "rotate(0deg)");
            $(".faqs6").css("height", "88.1px");
            $(".outer_faqsTitleInfo6").css("height", "10.5em");
            $(".outer_faqsTitleInfo6").css("padding-top", "1em");
            $(".faqsTitleInfo6").fadeIn(400);
            setTimeout(function(){$(".faqsspan6").css("display", "block");},300);
        }
    });
    
    
    $(".faqs7").click(function(){
        if($(".faqs7").css("height") == "88.1px"){
            setTimeout(function(){$(".faqImg07").css("display", "none");},400);
            setTimeout(function(){$(".faqImg7").css("display", "block");},400);
            $(".faqImg07").css("transform", "rotate(-90deg)");
            $(".faqImg7").css("transform", "rotate(0deg)");
            $(".faqs7").css("height", "88px");
            $(".faqTextQ7").css("margin-top", "0.6em");
            $(".outer_faqsTitleInfo7").css("height", "0");
            $(".outer_faqsTitleInfo7").css("padding-top", "0");
            $(".outer_faqsClearBtn").fadeOut(100);
            $(".outer_faqsSendBtn").fadeOut(100);
            $(".outer_faqsDaubts").fadeOut(300);
            $(".outer_faqsDaubts").css("height", "0");
        }else if($(".faqs7").css("height") == "88px"){
            setTimeout(function(){$(".faqImg7").css("display", "none");},400);
            setTimeout(function(){$(".faqImg07").css("display", "block");},400);
            $(".faqImg7").css("transform", "rotate(90deg)");
            $(".faqImg07").css("transform", "rotate(0deg)");
            $(".faqs7").css("height", "88.1px");
            $(".outer_faqsTitleInfo7").css("height", "16.2em");
            $(".outer_faqsTitleInfo7").css("padding-top", "1em");
            setTimeout(function(){$(".outer_faqsClearBtn").fadeIn(100);},300);
            setTimeout(function(){$(".outer_faqsSendBtn").fadeIn(100);},300);
            $(".outer_faqsDaubts").fadeIn();
            $(".faqTextQ7").css("margin-top", "1.1em");
            $(".outer_faqsDaubts").css("height", "10em");
        }
    });
    
    $(".privacyPolicy, .clickHereFaqs4").click(function(){
        window.location = "https://www.privacypolicies.com/live/4dcdd9e2-b84c-40e9-8412-d2bc9185949f";
    });
});

$(document).ready(function(){
    $(".mainContactUsPage").css("background-size", screen.width + "px " + screen.height + "px");
    
    $(".contactUs").click(function(){
        $.post("ContactUs.html", function(){
            location.href = "ContactUs.html";
        });
    });
});

function darkModeOn(){
    //Home
    $(".studModBody").css("background-color", "#171616");
    $(".viweMyProject").css("background-color", "#171616");
    $(".createNewProject").css("background-color", "#171616");
    $(".approved").css("background-color", "#171616");
    $(".rejected").css("background-color", "#171616");
    $(".rejected").css("background-color", "#171616");
    $(".recordComplition").css("background-color", "#171616");
    $(".vmpTitle").css("color", "#ffffff");
    $(".viewYourProHere").css("color", "#d3d3d3");
    $(".cnpTitle").css("color", "#ffffff");
    $(".createYourNewHere").css("color", "#d3d3d3");
    $(".approvedName").css("color", "#ffffff");
    $(".approvedInfo").css("color", "#d3d3d3");
    $(".rejectedName").css("color", "#ffffff");
    $(".rejectedInfo").css("color", "#d3d3d3");
    $(".rcName").css("color", "#ffffff");
    $(".vpButton").css("background-color", "#3c1dff");
    $(".cpButton").css("background-color", "#3c1dff");
    $(".project").css("color", "#d3d3d3");
    $(".completed").css("color", "#ab8dff");
    $(".viewHere").css("border", "5px solid #000000");
    $(".viewHereName").css("color", "#d3d3d3");
    $(".bluePart").css("background-color", "#3c1dff");
    $(".footer").css("background-color", "#1f1e20");
    $(".next1").css("display", "block");
    $(".next").css("display", "none");

    //FAQs
    $(".faqsBody").css("background-color", "#363636");

    $(".faqs1").css("background-color", "#212121");
    $(".faqTextQ1").css("color", "#ffffff");
    $(".outer_faqsTitleInfo1").css("background-color", "#212121");
    $(".faqsTitleInfo1").css("color", "#ffffff");
    if($(".faqs1").css("height") == "88.1px"){
        $(".faqs1").css("background-color", "#ff4d4d");
    }
    $(".faqs1").click(function(){
        if($(".faqs1").css("height") == "88.1px"){
            $(".faqs1").css("background-color", "#212121");
            $(".faqTextQ1").css("color", "#ffffff");
        }else if($(".faqs1").css("height") == "88px"){
            $(".faqs1").css("background-color", "#ff4d4d");
        }
    });

    $(".faqs2").css("background-color", "#212121");
    $(".faqTextQ2").css("color", "#ffffff");
    $(".outer_faqsTitleInfo2").css("background-color", "#212121");
    $(".faqsTitleInfo2").css("color", "#ffffff");
    if($(".faqs2").css("height") == "88.1px"){
        $(".faqs2").css("background-color", "#ff4d4d");
    }
    $(".faqs2").click(function(){
        if($(".faqs2").css("height") == "88.1px"){
            $(".faqs2").css("background-color", "#212121");
            $(".faqTextQ2").css("color", "#ffffff");
        }else if($(".faqs2").css("height") == "88px"){
            $(".faqs2").css("background-color", "#ff4d4d");
        }
    });

    $(".faqs3").css("background-color", "#212121");
    $(".faqTextQ3").css("color", "#ffffff");
    $(".outer_faqsTitleInfo3").css("background-color", "#212121");
    $(".faqsTitleInfo3").css("color", "#ffffff");
    if($(".faqs3").css("height") == "88.1px"){
        $(".faqs3").css("background-color", "#ff4d4d");
    }
    $(".faqs3").click(function(){
        if($(".faqs3").css("height") == "88.1px"){
            $(".faqs3").css("background-color", "#212121");
            $(".faqTextQ3").css("color", "#ffffff");
        }else if($(".faqs3").css("height") == "88px"){
            $(".faqs3").css("background-color", "#ff4d4d");
        }
    });

    $(".faqs4").css("background-color", "#212121");
    $(".faqTextQ4").css("color", "#ffffff");
    $(".outer_faqsTitleInfo4").css("background-color", "#212121");
    $(".faqsTitleInfo4").css("color", "#ffffff");
    $(".clickHereFaqs4").css("color", "#6764ff");
    if($(".faqs4").css("height") == "88.1px"){
        $(".faqs4").css("background-color", "#ff4d4d");
    }
    $(".faqs4").click(function(){
        if($(".faqs4").css("height") == "88.1px"){
            $(".faqs4").css("background-color", "#212121");
            $(".faqTextQ4").css("color", "#ffffff");
        }else if($(".faqs4").css("height") == "88px"){
            $(".faqs4").css("background-color", "#ff4d4d");
        }
    });

    $(".faqs5").css("background-color", "#212121");
    $(".faqTextQ5").css("color", "#ffffff");
    $(".outer_faqsTitleInfo5").css("background-color", "#212121");
    $(".faqsTitleInfo5").css("color", "#ffffff");
    if($(".faqs5").css("height") == "88.1px"){
        $(".faqs5").css("background-color", "#ff4d4d");
    }
    $(".faqs5").click(function(){
        if($(".faqs5").css("height") == "88.1px"){
            $(".faqs5").css("background-color", "#212121");
            $(".faqTextQ5").css("color", "#ffffff");
        }else if($(".faqs5").css("height") == "88px"){
            $(".faqs5").css("background-color", "#ff4d4d");
        }
    });

    $(".faqs6").css("background-color", "#212121");
    $(".faqTextQ6").css("color", "#ffffff");
    $(".outer_faqsTitleInfo6").css("background-color", "#212121");
    $(".faqsTitleInfo6").css("color", "#ffffff");
    if($(".faqs6").css("height") == "88.1px"){
        $(".faqs6").css("background-color", "#ff4d4d");
    }
    $(".faqs6").click(function(){
        if($(".faqs6").css("height") == "88.1px"){
            $(".faqs6").css("background-color", "#212121");
            $(".faqTextQ6").css("color", "#ffffff");
            setTimeout(function(){$(".faqsspan6").css("display", "none");},50);
        }else if($(".faqs6").css("height") == "88px"){
            $(".faqs6").css("background-color", "#ff4d4d");
        }
    });

    $(".faqs7").css("background-color", "#212121");
    $(".faqTextQ7").css("color", "#ffffff");
    $(".outer_faqsTitleInfo7").css("background-color", "#212121");
    $(".faqsTitleInfo7").css("color", "#ffffff");
    $(".outer_faqsDaubts").css("background-color", "#d9d9d9");
    $(".outer_faqsDaubts label").css("color", "#363636");
    
    $(".faqTextQ7 label").css("color", "#6764ff");
    if($(".faqs7").css("height") == "88.1px"){
        $(".faqs7").css("background-color", "#ff4d4d");
        $(".faqTextQ7 label").fadeOut();
    }
    $(".faqs7").click(function(){
        if($(".faqs7").css("height") == "88.1px"){
            $(".faqs7").css("background-color", "#212121");
            $(".faqTextQ7").css("color", "#ffffff");
            $(".faqTextQ7 label").fadeIn();
        }else if($(".faqs7").css("height") == "88px"){
            $(".faqs7").css("background-color", "#ff4d4d");
            $(".faqTextQ7 label").fadeOut();
        }
    });

    //About Us
    $(".aboutUsBluePart").css("background-color", "#060613");
    $(".aboutUsBody").css("background-color", "#363636");
    $(".box1").css("background-color", "#212121");
    $(".box2").css("background-color", "#212121");
    $(".box3").css("background-color", "#212121");
    $(".aboutUsImage").css("border", "1px solid #ffffff");
    $(".visionImage").css("border", "1px solid #ffffff");
    $(".missionImage").css("border", "1px solid #ffffff");
    $(".whoWeAre").css("color", "#ffffff");
    $(".whatWeWant").css("color", "#ffffff");
    $(".whatWeWillAchieve").css("color", "#ffffff");
    $(".aboutUsText1").css("color", "#d4c9c9").css("background-color", "#212121");
    $(".visionText1").css("color", "#d4c9c9").css("background-color", "#212121");
    $(".missionText1").css("color", "#d4c9c9").css("background-color", "#212121");
    $(".aUDot1").css("background-color", "#212121").css("color", "#d4c9c9");
    $(".vDot2").css("background-color", "#212121").css("color", "#d4c9c9");
    $(".mDot3").css("background-color", "#212121").css("color", "#d4c9c9");
}

function darkModeOff(){
    //Home
    $(".studModBody").css("background-color", "#ffffff");
    $(".viweMyProject").css("background-color", "#ffffff");
    $(".createNewProject").css("background-color", "#ffffff");
    $(".approved").css("background-color", "#ffffff");
    $(".rejected").css("background-color", "#ffffff");
    $(".recordComplition").css("background-color", "#ffffff");
    $(".vmpTitle").css("color", "#2e2929");
    $(".viewYourProHere").css("color", "#000000");
    $(".cnpTitle").css("color", "#2e2929");
    $(".createYourNewHere").css("color", "#000000");
    $(".approvedName").css("color", "#2e2929");
    $(".approvedInfo").css("color", "#000000");
    $(".rejectedName").css("color", "#2e2929");
    $(".rejectedInfo").css("color", "#000000");
    $(".rcName").css("color", "#2e2929");
    $(".vpButton").css("background-color", "rgb(49, 49, 206)");
    $(".cpButton").css("background-color", "rgb(49, 49, 206)");
    $(".project").css("color", "#000000");
    $(".completed").css("color", "rgb(33, 33, 207)");
    $(".viewHere").css("border", "5px solid rgb(33, 33, 207)");
    $(".viewHereName").css("color", "#000000");
    $(".bluePart").css("background-color", "#593EFF");
    $(".footer").css("background-color", "#593EFF");
    $(".next1").css("display", "none");
    $(".next").css("display", "block");

    //FAQs
    $(".faqsBody").css("background-color", "#dcdbe7");

    $(".faqs1").css("background-color", "#ffffff");
    $(".faqTextQ1").css("color", "#3e374f");
    $(".outer_faqsTitleInfo1").css("background-color", "#ffffff");
    $(".faqsTitleInfo1").css("color", "#3e374f");
    if($(".faqs1").css("height") == "88.1px"){
        $(".faqImg1").css("display", "block");
        $(".faqs1").css("background-color", "#1100ff");
        $(".faqTextQ1").css("color", "#ffffff");
    }
    $(".faqs1").click(function(){
        if($(".faqs1").css("height") == "88.1px"){
            $(".faqs1").css("background-color", "#ffffff");
            $(".faqTextQ1").css("color", "#3e374f");
        }else if($(".faqs1").css("height") == "88px"){
            $(".faqs1").css("background-color", "#1100ff");
            $(".faqTextQ1").css("color", "#ffffff");
        }
    });

    $(".faqs2").css("background-color", "#ffffff");
    $(".faqTextQ2").css("color", "#3e374f");
    $(".outer_faqsTitleInfo2").css("background-color", "#ffffff");
    $(".faqsTitleInfo2").css("color", "#3e374f");
    if($(".faqs2").css("height") == "88.1px"){
        $(".faqImg2").css("display", "block");
        $(".faqs2").css("background-color", "#1100ff");
        $(".faqTextQ2").css("color", "#ffffff");
    }
    $(".faqs2").click(function(){
        if($(".faqs2").css("height") == "88.1px"){
            $(".faqs2").css("background-color", "#ffffff");
            $(".faqTextQ2").css("color", "#3e374f");
            $(".faqsTitleInfo2").fadeOut();
        }else if($(".faqs2").css("height") == "88px"){
            $(".faqs2").css("background-color", "#1100ff");
            $(".faqTextQ2").css("color", "#ffffff");
        }
    });

    $(".faqs3").css("background-color", "#ffffff");
    $(".faqTextQ3").css("color", "#3e374f");
    $(".outer_faqsTitleInfo3").css("background-color", "#ffffff");
    $(".faqsTitleInfo3").css("color", "#3e374f");
    if($(".faqs3").css("height") == "88.1px"){
        $(".faqImg3").css("display", "block");
        $(".faqs3").css("background-color", "#1100ff");
        $(".faqTextQ3").css("color", "#ffffff");
    }
    $(".faqs3").click(function(){
        if($(".faqs3").css("height") == "88.1px"){
            $(".faqs3").css("background-color", "#ffffff");
            $(".faqTextQ3").css("color", "#3e374f");
        }else if($(".faqs3").css("height") == "88px"){
            $(".faqs3").css("background-color", "#1100ff");
            $(".faqTextQ3").css("color", "#ffffff");
        }
    });

    $(".faqs4").css("background-color", "#ffffff");
    $(".faqTextQ4").css("color", "#3e374f");
    $(".outer_faqsTitleInfo4").css("background-color", "#ffffff");
    $(".faqsTitleInfo4").css("color", "#3e374f");
    $(".clickHereFaqs4").css("color", "blue");
    if($(".faqs4").css("height") == "88.1px"){
        $(".faqImg4").css("display", "block");
        $(".faqs4").css("background-color", "#1100ff");
        $(".faqTextQ4").css("color", "#ffffff");
    }
    $(".faqs4").click(function(){
        if($(".faqs4").css("height") == "88.1px"){
            $(".faqs4").css("background-color", "#ffffff");
            $(".faqTextQ4").css("color", "#3e374f");
        }else if($(".faqs4").css("height") == "88px"){
            $(".faqs4").css("background-color", "#1100ff");
            $(".faqTextQ4").css("color", "#ffffff");
        }
    });

    $(".faqs5").css("background-color", "#ffffff");
    $(".faqTextQ5").css("color", "#3e374f");
    $(".outer_faqsTitleInfo5").css("background-color", "#ffffff");
    $(".faqsTitleInfo5").css("color", "#3e374f");
    if($(".faqs5").css("height") == "88.1px"){
        $(".faqImg5").css("display", "block");
        $(".faqs5").css("background-color", "#1100ff");
        $(".faqTextQ5").css("color", "#ffffff");
    }
    $(".faqs5").click(function(){
        if($(".faqs5").css("height") == "88.1px"){
            $(".faqs5").css("background-color", "#ffffff");
            $(".faqTextQ5").css("color", "#3e374f");
        }else if($(".faqs5").css("height") == "88px"){
            $(".faqs5").css("background-color", "#1100ff");
            $(".faqTextQ5").css("color", "#ffffff");
        }
    });

    $(".faqs6").css("background-color", "#ffffff");
    $(".faqTextQ6").css("color", "#3e374f");
    $(".outer_faqsTitleInfo6").css("background-color", "#ffffff");
    $(".faqsTitleInfo6").css("color", "#3e374f");
    if($(".faqs6").css("height") == "88.1px"){
        $(".faqImg6").css("display", "block");
        $(".faqs6").css("background-color", "#1100ff");
        $(".faqTextQ6").css("color", "#ffffff");
    }
    $(".faqs6").click(function(){
        if($(".faqs6").css("height") == "88.1px"){
            $(".faqs6").css("background-color", "#ffffff");
            $(".faqTextQ6").css("color", "#3e374f");
            setTimeout(function(){$(".faqsspan6").css("display", "none");},50);
        }else if($(".faqs6").css("height") == "88px"){
            $(".faqs6").css("background-color", "#1100ff");
            $(".faqTextQ6").css("color", "#ffffff");
        }
    });

    $(".faqs7").css("background-color", "#ffffff");
    $(".faqTextQ7").css("color", "#3e374f");
    $(".outer_faqsTitleInfo7").css("background-color", "#ffffff");
    $(".faqsTitleInfo7").css("color", "#3e374f");
    $(".outer_faqsDaubts").css("background-color", "#ffffff");
    $(".outer_faqsDaubts label").css("color", "#c4bbbb");
    $(".faqsDaubts").focusin(function(){
        $(".outer_faqsDaubts label").css("color", "blue");
    });
    $(".faqsDaubts").focusout(function(){
        if($(".faqsDaubts").val() == "" || $(".faqsDaubts").val() == null){
            $(".outer_faqsDaubts label").css("color", "#c4bbbb");
        }
    });

    $(".faqTextQ7 label").css("display", "block");
    $(".faqTextQ7 label").css("color", "blue");
    if($(".faqs7").css("height") == "88.1px"){
        $(".faqImg7").css("display", "block");
        $(".faqs7").css("background-color", "#1100ff");
        $(".faqTextQ7").css("color", "#ffffff");
    }
    $(".faqs7").click(function(){
        if($(".faqs7").css("height") == "88.1px"){
            $(".faqs7").css("background-color", "#ffffff");
            $(".faqTextQ7").css("color", "#3e375f");
        }else if($(".faqs7").css("height") == "88px"){
            $(".faqs7").css("background-color", "#1100ff");
            $(".faqTextQ7").css("color", "#ffffff");
        }
    });

    //About Us
    $(".aboutUsBluePart").css("background-color", "#593EFF");
    $(".aboutUsBody").css("background-color", "#ffffff");
    $(".box1").css("background-color", "#ffffff");
    $(".box2").css("background-color", "#ffffff");
    $(".box3").css("background-color", "#ffffff");
    $(".aboutUsImage").css("border", "1px solid #000000");
    $(".visionImage").css("border", "1px solid #000000");
    $(".missionImage").css("border", "1px solid #000000");
    $(".whoWeAre").css("color", "#302d2d");
    $(".whatWeWant").css("color", "#302d2d");
    $(".whatWeWillAchieve").css("color", "#302d2d");
    $(".aboutUsText1").css("color", "#575151").css("background-color", "#ffffff");
    $(".visionText1").css("color", "#575151").css("background-color", "#ffffff");
    $(".missionText1").css("color", "#575151").css("background-color", "#ffffff");
    $(".aUDot1").css("background-color", "#ffffff").css("color", "#575151");
    $(".vDot2").css("background-color", "#ffffff").css("color", "#575151");
    $(".mDot3").css("background-color", "#ffffff").css("color", "#575151");
}

$(document).ready(function(){
    if(localStorage.getItem("DarkMode") == "ON"){
        darkModeOn();
        $(".darkCheckbox").prop("checked", true);
    }else if(localStorage.getItem("DarkMode") == "OFF"){
        darkModeOff();
        $(".darkCheckbox").prop("checked", false);
    }

    $(".darkCheckbox").click(function(){
        if($(".darkCheckbox").prop("checked") == true){
            localStorage.setItem("DarkMode", "ON");
            darkModeOn();
        }else if($(".darkCheckbox").prop("checked")==false){
            localStorage.setItem("DarkMode", "OFF");
            darkModeOff();
        }
    });
});