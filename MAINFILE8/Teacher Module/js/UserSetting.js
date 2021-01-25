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

$(document).ready(function(){
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

    $("#nbItem1").click(function(){
        home();
    });
    
    $("#home_0").click(function(){
        home();
    });

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

    $("#nbItem3").click(function(){
        aboutUs();
    });
    
    $("#aboutUs_0").click(function(){
        aboutUs();
    });

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

    $("#nbItem4").click(function(){
        faqs();
    });
    
    $("#faqs_0").click(function(){
        faqs();
    });

    $("#user_Image").click(function(){
        $("#set_outer_block").fadeIn(800);
    });
});

$(document).ready(function() {
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

    $(".gotItAlert").click(function(){
        $(".outer-fPAlert").fadeOut();
    });
});

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
        $("#set_outer_block").css("display", "none");
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
    $.post("TeacherModule.php",function(){
        location.href="TeacherModule.php";
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
    $(".outer-details").click(function(){
        $("#set_outer_block").fadeOut(100);
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

    //Account Setting Cancel Button
    $(".aSCancelBtn").click(function(){
        history.back();
    });

    $(".projectList").click(function(){
        $.post("ProjectList.php",function(){
            location.href = "ProjectList.php";
        });
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
    $(".aSPassOtpImg").click(function(){
        $(".outer-aSResetPassOtp").fadeOut();
    });

    $(".outer_aSEyeOpt").click(function(){
        if($("#aSSlash_EyeOtp").attr("class") == "aSSlash-Eye"){
            $("#aSSlash_EyeOtp").attr("class", "aSEye");
            $(".cPOtpField").attr("type", "text");
        }else{
            $("#aSSlash_EyeOtp").attr("class", "aSSlash-Eye");
            $(".cPOtpField").attr("type", "password");
        }
    });
    
    // Start
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
    //End

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
        $(".outer-block").css("display", "flex");
    });

    //Original Password Box
    $(".outer_aAAPDeleteBtn").click(function(){
        $(".opbVerifyDSaveChaBtn").fadeOut();
        $(".opbVerifyBtns2").fadeOut();
        $(".opbVerifyBtnp1").css("display", "block");
        $(".outer_deaAProceedBox").fadeOut();
        $(".outer-OriginalPasswordBox").fadeIn();
    });

    // $(".outer_aSSaveChangeBtn").click(function(){
    //     $(".opbVerifyDSaveChaBtn").fadeOut();
    //     $(".opbVerifyBtnp1").fadeOut();
    //     $(".opbVerifyBtns2").css("display", "block");
    //     $(".outer-OriginalPasswordBox").fadeIn();
    // });

    $(".outer_mYSCBSaveBtn").click(function(){
        $(".opbVerifyBtnp1").css("display", "none");
        $(".opbVerifyBtns2").css("display", "none");
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
    $(".outer_deactAccButton").click(function(){
        $(".outer_deaAProceedBox").fadeIn();
    });
    $(".outer_aAAPCancelBtn").click(function(){
        $(".outer_deaAProceedBox").fadeOut();
    });
    $(".outer_aSCancelBtn").click(function(){
        history.back();
    });

    $(".outer_aSSaveChangeBtn").click(function(){
        var outer_user_email= localStorage.getItem("temail");
        var outer_user_name =  localStorage.getItem("tname");
        var outer_user_number = localStorage.getItem("tpn");
        var user_name =  $(".pDFirstNameField").val().trim();
        var user_number = $(".pDNumberField").val().trim();
        var user_email = $(".pDEmailIdField").val().trim();
        console.log();
        user_id = localStorage.getItem("tid");
        if(outer_user_email != user_email || outer_user_name != user_name || outer_user_number != user_number){
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
        if(localStorage.getItem("temail") != user_email){
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
                data: {"DelAcc":"curpass","aid":(localStorage.getItem("tid")), "currentPass":($(".cPChangePassField").val())},
                success: function(results){
                    if(results["verifyPass"] == "yes"){
                        $(".wsmodal").css("display","block");
                        jQuery.ajax({
                            url: "AccountSetting.php",
                            type: "POST",
                            dataType: "json",
                            data:{"DelAcc":"sendEmail", "uname":($(".pDFirstNameField").val().trim()),"uemail":($(".pDEmailIdField").val().trim())},
                            success: function(results){
                                $(".wsmodal").css("display","none");
                                if(results["sendemail"] == "yes"){
                                    $(".cPChangePassField").val("");
                                    random_otp = results["uotp"];
                                    rightVal("Success!", "Send Mail On New Email-ID");
                                    $(".cPChangePassField").val();
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
                data:{"DelAcc":"saveNewPass", "upass":($(".cPNewPassField2").val()),"uid":(localStorage.getItem("tid"))},
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
    user_id = localStorage.getItem("tid");
    jQuery.ajax({
        url: "AccountSetting.php",
        type: "POST",
        dataType: "json",
        data:{"DelAcc":"EditAcc","uname":user_name,"unumber":user_number,"uemail":user_email,"uid":user_id},
        success: function(results){
            if(results["savedetails"] == "yes"){
                rightVal("Success!", "Save Changes");
                localStorage.setItem("tname", user_name);
                localStorage.setItem("tpn", user_number);
                localStorage.setItem("temail", user_email);
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
    if(localStorage.getItem("TDarkMode") == "TON"){
        darkModeOn();
        $(".darkCheckbox").prop("checked", true);
    }else if(localStorage.getItem("TDarkMode") == "TOFF"){
        darkModeOff();
        $(".darkCheckbox").prop("checked", false);
    }

    $(".darkCheckbox").click(function(){
        if($(".darkCheckbox").prop("checked") == true){
            localStorage.setItem("TDarkMode", "TON");
            darkModeOn();
        }else if($(".darkCheckbox").prop("checked")==false){
            localStorage.setItem("TDarkMode", "TOFF");
            darkModeOff();
        }
    });
});
////////////////////////////////////////////////////////////////////////////////Teaher Module////////////////////////////////////////////////////////////////////////////////
$(document).ready(function(){
    $(".outer_TMSelectStages").hover(function(){
        $(".outer_TMAllStages").css("display", "block");
    },function(){
        $(".outer_TMAllStages").css("display", "none");
    });
    
    if($(".TMSelectStagesText").text() == "Stage 1"){
        $(".TMAllStage1").css("background-color", "#e3dede");
    }else if($(".TMSelectStagesText").text() == "Stage 2"){
        $(".TMAllStage2").css("background-color", "#e3dede");
    }else if($(".TMSelectStagesText").text() == "Stage 3"){
        $(".TMAllStage3").css("background-color", "#e3dede");
    }else if($(".TMSelectStagesText").text() == "Stage 4"){
        $(".TMAllStage4").css("background-color", "#e3dede");
    }else if($(".TMSelectStagesText").text() == "Stage 5"){
        $(".TMAllStage5").css("background-color", "#e3dede");
    }else if($(".TMSelectStagesText").text() == "Stage 6"){
        $(".TMAllStage6").css("background-color", "#e3dede");
    }else if($(".TMSelectStagesText").text() == "Stage 7"){
        $(".TMAllStage7").css("background-color", "#e3dede");
    }else if($(".TMSelectStagesText").text() == "Completed Project"){
        $(".TMAllStageFP").css("background-color", "#e3dede");
    }

    $(".TMAllStage1").hover(function(){
        if($(".TMAllStage1").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage1").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStage1").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage1").css("background-color", "#ffffff");
        }
    });
    $(".TMAllStage2").hover(function(){
        if($(".TMAllStage2").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage2").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStage2").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage2").css("background-color", "#ffffff");
        }
    });
    $(".TMAllStage3").hover(function(){
        if($(".TMAllStage3").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage3").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStage3").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage3").css("background-color", "#ffffff");
        }
    });
    $(".TMAllStage4").hover(function(){
        if($(".TMAllStage4").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage4").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStage4").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage4").css("background-color", "#ffffff");
        }
    });
    $(".TMAllStage5").hover(function(){
        if($(".TMAllStage5").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage5").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStage5").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage5").css("background-color", "#ffffff");
        }
    });
    $(".TMAllStage6").hover(function(){
        if($(".TMAllStage6").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage6").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStage6").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage6").css("background-color", "#ffffff");
        }
    });
    $(".TMAllStage7").hover(function(){
        if($(".TMAllStage7").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage7").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStage7").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStage7").css("background-color", "#ffffff");
        }
    });
    $(".TMAllStageFP").hover(function(){
        if($(".TMAllStageFP").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStageFP").css("background-color", "#f3f1f1");
        }
    },function(){
        if($(".TMAllStageFP").css("background-color") != "rgb(227, 222, 222)"){
            $(".TMAllStageFP").css("background-color", "#ffffff");
        }
    });

    function changeColor(){
        $(".TMAllStage1").css("background-color", "#ffffff");
        $(".TMAllStage2").css("background-color", "#ffffff");
        $(".TMAllStage3").css("background-color", "#ffffff");
        $(".TMAllStage4").css("background-color", "#ffffff");
        $(".TMAllStage5").css("background-color", "#ffffff");
        $(".TMAllStage6").css("background-color", "#ffffff");
        $(".TMAllStage7").css("background-color", "#ffffff");
        $(".TMAllStageFP").css("background-color", "#ffffff");
    }

    $(".TMAllStage1").click(function(){
        $(".TMSelectStagesText").text("Stage 1");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Stage 1");
        $(".TMAllStage1").css("background-color", "#e3dede");
    });
    $(".TMAllStage2").click(function(){
        $(".TMSelectStagesText").text("Stage 2");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Stage 2");
        $(".TMAllStage2").css("background-color", "#e3dede");
    });
    $(".TMAllStage3").click(function(){
        $(".TMSelectStagesText").text("Stage 3");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Stage 3");
        $(".TMAllStage3").css("background-color", "#e3dede");
    });
    $(".TMAllStage4").click(function(){
        $(".TMSelectStagesText").text("Stage 4");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Stage 4");
        $(".TMAllStage4").css("background-color", "#e3dede");
    });
    $(".TMAllStage5").click(function(){
        $(".TMSelectStagesText").text("Stage 5");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Stage 5");
        $(".TMAllStage5").css("background-color", "#e3dede");
    });
    $(".TMAllStage6").click(function(){
        $(".TMSelectStagesText").text("Stage 6");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Stage 6");
        $(".TMAllStage6").css("background-color", "#e3dede");
    });
    $(".TMAllStage7").click(function(){
        $(".TMSelectStagesText").text("Stage 7");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Stage 7");
        $(".TMAllStage7").css("background-color", "#e3dede");
    });
    $(".TMAllStageFP").click(function(){
        $(".TMSelectStagesText").text("Completed Project");
        changeColor();
        $(".outer_TMAllStages").attr("myVal", "Completed Project");
        $(".TMAllStageFP").css("background-color", "#e3dede");
    });
});

$(document).ready(function(){
    $(".TMSearchTextField").focusin(function(){
        $(".outer_TMSearchTextField").css("border-bottom", "2px solid #26a69a");
    });
    $(".TMSearchTextField").focusout(function(){
        $(".outer_TMSearchTextField").css("border-bottom", "1px solid #000000");
    });

    var desText = $(".thDescriptionText").text();
    $(".thDescriptionText").text(desText.substring(0, 45) + "....");

    $(".thDescription").click(function(){
        if($(".TdownArrow").css("transform") == "matrix(1, 0, 0, 1, 0, 0)"){
            $(".thDescriptionText").text(desText);
            $(".TdownArrow").css("transform", "rotate(180deg)");
            $(".thDescription").css("user-selected", "none");
        }else{
            $(".thDescriptionText").text(desText.substring(0, 45) + "....");
            $(".TdownArrow").css("display", "inline");
            $(".TdownArrow").css("transform", "rotate(0deg)");
            $(".thDescription").css("user-selected", "text");
        }
    });

    $(".TMtable").hover(function(){
        $(".TMtable").css("box-shadow", "0px 2px 14px 0px rgba(0,0,0,.5)");
    },function(){
        $(".TMtable").css("box-shadow", "");
    });
});

$(document).ready(function(){
    $(".TMcorrect").click(function(){
    //     $(".ARHeader").text("Approved");
    //     $(".ARResAccep").text("Accepting");
    //     $(".outer_ApprRejBox").fadeIn();
        $(".outer_addalldata").fadeIn();
    });

    $(".TMquit").click(function(){
        $(".ARHeader").text("Rejected");
        $(".ARResAccep").text("Rejecting");
        $(".outer_ApprRejBox").fadeIn();
    });

    $(".outer_ARCancelBtn").click(function(){
        $(".outer_ApprRejBox").fadeOut();
        $(".ARTextarea").val("");
    });
});