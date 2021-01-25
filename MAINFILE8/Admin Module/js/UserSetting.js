$(document).ready(function(){
    $(".outer_navlinkusc").click(function(){
        $("#set_outer_block").fadeIn();
    });

    $(".outer-details").click(function(){
        $("#outer_DetailsBox").fadeIn();
        $("#set_outer_block").fadeOut();
    });

    $(".closeDetails").click(function(){
        $("#outer_DetailsBox").fadeOut();
    });

    $(window).click(function(event){
        if(event.target.matches("#set_outer_block")){
            $("#set_outer_block").fadeOut();
        }

        if(event.target.matches("#outer_DetailsBox")){
            $("#outer_DetailsBox").fadeOut();
        }
    });


    $(".arSupervisor").click(function(){
        $.post("AddSupervisor.php", function(){
            location.href="AddSupervisor.php";
        });
    });
});

$(document).ready(function(){
    $(".ASBody").css("background-size", screen.width+"px " +screen.height+"px");
    $(".AccountSettingHeader").css("background-size", screen.width+"px 2.45em");
});

$(document).ready(function(){
    //Reset Password 1
    $(".cPResetPassword").click(function(){
        $(".cPChangePassField").val("");
        $(".RPOtpTextField1").val("");
        $(".RPOtpTextField2").val("");
        $(".RPOtpTextField3").val("");
        $(".RPOtpTextField4").val("");
        $(".cPNewPassField1").val("");
        $(".cPNewPassField2").val("");
        $("#aSSlash_Eye").attr("class", "aSSlash-Eye");
        $(".cPChangePassField").attr("type", "password");
        $("#aSSlash_NEye1").attr("class", "aSSlash-Eye");
        $(".cPNewPassField1").attr("type", "password");
        $("#aSSlash_NEye2").attr("class", "aSSlash-Eye");
        $(".cPNewPassField2").attr("type", "password");
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
    //     $(".outer_aSNextOtpBtn").show();
    //     $(".outer_aSSubmitOtpBtn").hide();
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

    $(".aSForgetPassword").click(function(){
        $(".outer-aSResetPassword").hide();
        $(".outer-block").css("display", "flex");
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
        var outer_user_email= localStorage.getItem("aemail");
        var outer_user_name =  localStorage.getItem("aname");
        var outer_user_number = localStorage.getItem("apn");
        var user_name =  $(".pDFirstNameField").val();
        var user_number = $(".pDNumberField").val();
        var user_email = $(".pDEmailIdField").val();
        console.log();
        user_id = localStorage.getItem("aid");
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
        var user_name =  $(".pDFirstNameField").val();
        var user_number = $(".pDNumberField").val();
        var user_email = $(".pDEmailIdField").val();
        if(localStorage.getItem("aemail") != user_email){
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
        var user_name =  $(".pDFirstNameField").val();
        var user_number = $(".pDNumberField").val();
        var user_email = $(".pDEmailIdField").val();
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
                data: {"DelAcc":"curpass","aid":(localStorage.getItem("aid")), "currentPass":($(".cPChangePassField").val())},
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
                                    $(".cPChangePassField").val("");
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
                data:{"DelAcc":"saveNewPass", "upass":($(".cPNewPassField2").val()),"uid":(localStorage.getItem("aid"))},
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
            data:{"DelAcc":"sendEmail", "uname":($(".pDFirstNameField").val()),"uemail":($(".pDEmailIdField").val())},
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
    user_id = localStorage.getItem("aid");
    jQuery.ajax({
        url: "AccountSetting.php",
        type: "POST",
        dataType: "json",
        data:{"DelAcc":"EditAcc","uname":user_name,"unumber":user_number,"uemail":user_email,"uid":user_id},
        success: function(results){
            if(results["savedetails"] == "yes"){
                rightVal("Success!", "Save Changes");
                localStorage.setItem("aname", user_name);
                localStorage.setItem("apn", user_number);
                localStorage.setItem("aemail", user_email);
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

function passivefun(){
    $(".passive1").removeClass("active");
    $(".passive2").removeClass("active");
    $(".passive3").removeClass("active");
    $(".passive4").removeClass("active");
    $(".passive5").removeClass("active");
    $(".passive6").removeClass("active");
}

function passive1(){
    if(localStorage.getItem("atype") == "root"){
        passivefun();
        $(".passive1").addClass("active");
        $(".alladd").fadeOut();
        $(".arSupervisor").css("display", "none");
        $(".addIndiData").css("display", "block");
        $(".tablename").text("Admin Details Table");
        $(".card2").css("display","none");
        $(".card3").css("display","none");
        $(".card1").css("display","block");
        $(".searchbar").css("display","block");
        $(".dropdownbar").css("display","block");
        $(".dropdownbar2").css("display","flex");
        $(".allContent").css("margin-top", "");
        localStorage.setItem("setstheader", "admin");
        $("#actiStat").attr("activeState", "admin");
        cancelEdit();
        load_data(1,document.getElementById("page_num_drop").value,"admin");
    }
}

function passive2(){
    passivefun();
    $(".passive2").addClass("active");
    $(".alladd").css("display", "block");
    $(".addIndiData").css("display", "block");
    $(".arSupervisor").css("display", "block");
    $(".tablename").text("Teacher Details Table");
    $(".card2").css("display","none");
    $(".card3").css("display","none");
    $(".card1").css("display","block");
    $(".searchbar").css("display","block");
    $(".dropdownbar").css("display","block");
    $(".dropdownbar2").css("display","flex");
    $(".allContent").css("margin-top", "");
    localStorage.setItem("setstheader", "teacher");
    $("#actiStat").attr("activeState", "teacher");
    cancelEdit();
    load_data(1,document.getElementById("page_num_drop").value,"teacher");
}

function passive3(){
    passivefun();
    $(".passive3").addClass("active");
    $(".alladd").css("display", "block");
    $(".addIndiData").css("display", "none");
    $(".arSupervisor").css("display", "none");
    $(".tablename").text("Student Details Table");
    $(".card2").css("display","none");
    $(".card3").css("display","none");
    $(".card1").css("display","block");
    $(".searchbar").css("display","block");
    $(".dropdownbar").css("display","block");
    $(".dropdownbar2").css("display","flex");
    $(".allContent").css("margin-top", "");
    localStorage.setItem("setstheader", "student");
    $("#actiStat").attr("activeState", "student");
    cancelEdit();
    load_data(1,document.getElementById("page_num_drop").value,"student");
}

var outer_starttime;
var outer_endtime;
function passive6(){
    passivefun();
    $(".passive6").addClass("active");
    $(".card1").css("display","none");
    $(".card2").css("display","none");
    $(".card3").css("display","block");
    $(".searchbar").css("display","none");
    $(".dropdownbar").css("display","none");
    $(".dropdownbar2").css("display","none");
    $(".allContent").css("margin-top", "-10em");
    cancelEdit();
    jQuery.ajax({
        url: "ajax_call_function.php",
        type: "POST",
        dataType: "json",
        data:{"func":"setLoadDate"},
        success: function(results){
            if(results["startingDate"]!=null || results["endingDate"]!=null){
                $("#startDate").val((results["startingDate"]).split(" ")[0]);
                $("#endDate").val((results["endingDate"]).split(" ")[0]);
            }
            outer_starttime=$("#startDate").val();
            outer_endtime=$("#endDate").val();
        },
        error:function(e){
            console.log(e);
        }
    })
}

function passive4(){
    passivefun();
    $(".passive4").addClass("active");
    $(".card1").css("display","none");
    $(".card3").css("display","none");
    $(".card2").css("display","block");
    $(".searchbar").css("display","none");
    $(".dropdownbar").css("display","none");
    $(".dropdownbar2").css("display","none");
    $(".allContent").css("margin-top", "-14em");
    cancelEdit();
    $.ajax({
        url:"ajax_call_function.php",
        type: "POST",
        dataType: "json",
        data:{"func":"querieDoubts"},
        success: function(results){
            $(".allRCMessge").empty();
            $(".allRCMessge").append("<label></label><div style='margin-top: 1.5em;'></div>");
            var allMessage = results["allDoubts"];
            var user_type;
            if(allMessage.length != 0){
                for(var i=0;i<results["allDoubts"].length;i++){
                    if(allMessage[i][1] == "teacher"){
                        user_type = "teacher";
                    }else{
                        user_type = "student";
                    }
                    $(".allRCMessge label").after("<div class='rCMessage rCMessage"+i+"'></div>");
                    $(".rCMessage"+i).append("<p class='fromEmailId'>From: "+allMessage[i][2]+"</p><p class='qcon'>Querie Solve or Not: </p><input type='checkbox' onclick='checkMess("+i+")' class='checkMess' id='checkMess"+i+"' "+allMessage[i][5]+"><br/><p class='GINum'>GI. No.: <abc class='GINum"+i+"'>"+allMessage[i][0]+"</abc> ("+user_type+")</p><p class='studTeacReport studTeacReport"+i+"'>"+allMessage[i][3]+"</p><p class='reportTime'>"+allMessage[i][4]+"</p>");
                }
            }else{
                $(".allRCMessge label").text("No Any Queries/Doubts").css("font-size", "3em").css("color", "orange").css("width", "100%").css("text-align", "center");
                $(".allRCMessge").css("height", "6em");
            }
        }
    });
}

function checkMess(position){
    var QDData = $(".studTeacReport"+position).text();
    var QDGrno = $(".GINum"+position).text();
    var checkBox = document.getElementById("checkMess"+position);
    var QDStatus;
    if(checkBox.checked == true){
        QDStatus="checked";
    }else{
        QDStatus="unchecked";
    }
    $.ajax({
        url:"ajax_call_function.php",
        type: "POST",
        dataType: "json",
        data:{"func":"checkBox", "data":QDData, "grno":QDGrno, "status":QDStatus},
        success: function(results){
            if(results["check"]=="no"){
                wrongVal("Sorry", "Something Went Wrong");
            }
        }
    });
}

$(document).ready(function(){
    $(".passive5").click(function(){
        passivefun();
        $(".passive5").addClass("active");
    });
});

function cancelEdit(){
    $(".myEdit").css("display", "inline-block");
    $(".myDelete").css("display", "inline-block");
    $(".editDelete").css("display", "none");
}

$(document).ready(function(){
    $(".outer_opbEye").click(function(){
        if($("#opbSlash_Eye").attr("class") == "aSSlash-Eye"){
            $("#opbSlash_Eye").attr("class", "aSEye");
            $(".OriPassBoxField").attr("type", "text");
        }else{
            $("#opbSlash_Eye").attr("class", "aSSlash-Eye");
            $(".OriPassBoxField").attr("type", "password");
        }
    });

    $(".oriPassBoxImg").click(function(){
        $(".outer-OriginalPasswordBox").fadeOut();
    });

    //Add
    $(".addIndiData").click(function(){
        if($("#actiStat").attr("activeState") == "admin"){
            $.post("AddAdmin.php",function(){
                location.href="AddAdmin.php";
            });
        }else{
            $.post("AddTeacher.php",function(){
                location.href="AddTeacher.php";
            });
        }
    });

    // if(localStorage.getItem("setstheader") == "admin"){
    //     $(".stheader").text("Individual Admin");
    //     $(".stsubheader").text("These are the remaining Admin in the Database list. You can add each Admin from this list to the Signin table.");
    //     $(".same_iadaase").css("display", "none");
    //     $(".outer_aoneaddbtn").css("display", "block");
    //     $(".alldeletemess").text("Are you sure to Insert data of a Admin.");
    // }

    // if(localStorage.getItem("setstheader") == "teacher"){
    //     $(".stheader").text("Individual Teacher");
    //     $(".stsubheader").text("These are the remaining Teachers in the Database list. You can add each Teacher from this list to the Signin table.");
    //     $(".same_iadaase").css("display", "none");
    //     $(".outer_toneaddbtn").css("display", "block");
    //     $(".alldeletemess").text("Are you sure to Insert data of a Teacher.");
    // }

    // if(localStorage.getItem("setstheader") == "student"){
    //     $(".stheader").text("Individual Student");
    //     $(".stsubheader").text("These are the remaining Students in the Database list. You can add each Student from this list to the Signin table.");
    //     $(".same_iadaase").css("display", "none");
    //     $(".outer_soneaddbtn").css("display", "block");
    //     $(".alldeletemess").text("Are you sure to Insert data of a Student.");
    // }

    //Delete
    $(".deleteData").click(function(){
        $(".same_iadaase").css("display", "none");
        if(localStorage.getItem("setstheader") == "admin"){
            $(".outer_adeletealldatabtn").css("display", "block");
            $(".alldeletemess").text("Are you sure to Delete all the data of Admin.");
        }else if(localStorage.getItem("setstheader") == "student"){
            $(".alldeletemess").text("Are you sure to Delete all the data of Students.");
            $(".outer_sdeletealldatabtn").css("display", "block");
        }else if(localStorage.getItem("setstheader") == "teacher"){
            $(".outer_tdeletealldatabtn").css("display", "block");
            $(".alldeletemess").text("Are you sure to Delete all the data of Teacher.");
        }
        $(".addalldata").css("height", "13.5em");
        $(".outer_addalldata").fadeIn();
    });

    //All Add
    $(".alladd").click(function(){
        $(".same_iadaase").css("display", "none");
        if(localStorage.getItem("setstheader") == "student"){
            $(".alldeletemess").text("Are you sure to Insert all the data of Students.");
            $(".outer_saddalldatabtn").css("display", "block");
        }else if(localStorage.getItem("setstheader") == "teacher"){
            $(".outer_taddalldatabtn").css("display", "block");
            $(".alldeletemess").text("Are you sure to Insert all the data of Teacher.");
        }
        $(".addalldata").css("height", "13.5em");
        $(".outer_addalldata").fadeIn();
    });

    /////////////
    // $(".myEdit").click(function(){
    //     $(".myEdit").css("display", "none");
    //     $(".myDelete").css("display", "none");
    //     $(".editDelete").css("display", "inline-block");
    // });

    // $(".EditcancelD1").click(function(){
    //     cancelEdit();
    // });

    //Individual Delete
    // $(".myDelete").click(function(){
    //     $(".same_iadaase").css("display", "none");
    //     if(localStorage.getItem("setstheader") == "admin"){
    //         $(".outer_aonedeletebtn").css("display", "block");
    //         $(".alldeletemess").text("Are you sure to Delete data of a Admin.");
    //     }else if(localStorage.getItem("setstheader") == "student"){
    //         $(".alldeletemess").text("Are you sure to Delete data of a Students.");
    //         $(".outer_sonedeletebtn").css("display", "block");
    //     }else if(localStorage.getItem("setstheader") == "teacher"){
    //         $(".outer_tonedeletebtn").css("display", "block");
    //         $(".alldeletemess").text("Are you sure to Delete data of a Teacher.");
    //     }
    //     $(".addalldata").css("height", "11.6em");
    //     $(".outer_addalldata").fadeIn();
    // });

    //Edit Conformation
    $(".EditsaveD1").click(function(){
        $(".same_iadaase").css("display", "none");
        if(localStorage.getItem("setstheader") == "admin"){
            $(".alldeletemess").text("Are you sure to Edit data of a Admin.");
            $(".outer_aeditconformbtn").css("display", "block");
        }else if(localStorage.getItem("setstheader") == "student"){
            $(".alldeletemess").text("Are you sure to Edit data of a Students.");
            $(".outer_seditconformbtn").css("display", "block");
        }else if(localStorage.getItem("setstheader") == "teacher"){
            $(".outer_teditconformbtn").css("display", "block");
            $(".alldeletemess").text("Are you sure to Edit data of a Teacher.");
        }
        $(".addalldata").css("height", "11.6em");
        $(".outer_addalldata").fadeIn();
    });

    $(".aadCancelBtn").click(function(){
        $(".outer_addalldata").fadeOut();
    });
});

function signout(){
    localStorage.removeItem("aname");
    localStorage.removeItem("aid");
    localStorage.removeItem("aname");
    localStorage.removeItem("atype");
    localStorage.removeItem("aemail");
    localStorage.removeItem("apn");
    $.post("AdminLogin.php",function(){
        location.href="AdminLogin.php";
    });
}

function taddalldatabtn(){
    $(".wsmodal").css("display","block");
    jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"addAllData","source":$("#actiStat").attr("activeState")},
        success: function(results){
            $(".wsmodal").css("display","none");
            $(".outer_addalldata").fadeOut();
            if(results["T_Insert"] == "yes"){
                rightVal("Success!", "Added All Data");
                load_data(1,document.getElementById("page_num_drop").value,$("#actiStat").attr("activeState"));
            }else if(results["T_Insert"] == "emailerror"){
                wrongVal("Sorry!", "Email Not Send");
            }else if(results["T_Insert"] == "NotInsert"){
                wrongVal("Sorry!", "Don't Have Any data to Add");
            }else{
                wrongVal("Sorry!", "Not Added All Data");
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

function tdeletealldatabtn(){
    jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"deleteAllData","source":$("#actiStat").attr("activeState")},
        success: function(results){
            $(".outer_addalldata").fadeOut();
            if(results["T_Delete"] == "yes"){
                rightVal("Success!", "Delete All Data");
                load_data(1,document.getElementById("page_num_drop").value,$("#actiStat").attr("activeState"));
            }else if(results["T_Delete"] == "nope"){
                wrongVal("Sorry!", "Don't Have Any Data");
            }else{
                wrongVal("Sorry!", "Not Delete Any Data");
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

var id,name;

var tEmailId;
function tsAddBtn(data_pos){
    $(".outer_addalldata").fadeIn();
    tEmailId = document.getElementById("temail"+data_pos).innerText;
}

function toneaddbtn(){
    jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"addTeacher","tEmail":tEmailId},
        success: function(results){
            $(".outer_addalldata").fadeOut();
            if(results["T_Add"] == "yes"){
                $.post("AddTeacher.php", function(){
                    setTimeout(function(){location.href = "AddTeacher.php";},2000);
                });
                rightVal("Success!", "Add One Teacher");
            }else{
                wrongVal("Sorry!", "Not Added Any Data");
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

function addSupervisor(i,t_id){
    $(".outer_addalldata").fadeIn();
    id=t_id;
    name=document.getElementById("tname"+i).innerText;
}

function addsupervisorfunc()
{  
    jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"addSupervisor","id":id},
        success: function(results){
            $(".outer_addalldata").fadeOut();
            if(results["T_add"] == "yes"){
                $.post("AddSupervisor.php", function(){
                    setTimeout(function(){location.href = "AddSupervisor.php";},2000);
                });

                rightVal("Success!", "Added "+name+" as Supervisor");
            }else{
                wrongVal("Sorry!", "Not Added Any Data");
            }
        },
        error:function(e){
            console.log(e);
        }
    });   
}

function removeSupervisor(i,t_id)
{
    $(".outer_addalldata").fadeIn();
    id=t_id;
    name=document.getElementById("tname"+i).innerText;
}

function removeSupervisorfunc()
{
    jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"removeSupervisor","id":id},
        success: function(results){
            $(".outer_addalldata").fadeOut();
            if(results["T_remove"] == "yes"){
                $.post("AddSupervisor.php", function(){
                    setTimeout(function(){location.href = "AddSupervisor.php";},2000);
                });
                rightVal("Success!", "Removed "+name+" as Supervisor");
            }else{
                wrongVal("Sorry!", "Not Added Any Data");
            }
        },
        error:function(e){
            console.log(e);
        }
    })
}

function setDate(){
    var starttime=$("#startDate").val();
    var endtime=$("#endDate").val();
    console.log(outer_starttime+" "+starttime+" "+outer_endtime+" "+endtime)
    if(outer_starttime == starttime && outer_endtime == endtime){
        wrongVal("Sorry!", "Don't Any Update Because You Date Not Change.");
    }else if(starttime < endtime){
        jQuery.ajax({
            url: "editData.php",
            type: "POST",
            dataType: "json",
            data:{"editdelete":"setProjDate","startDate":starttime, "endDate":endtime},
            success: function(results){
                if(results["setProDate"] == "yes"){
                    rightVal("Success!", "Date Set");
                    outer_starttime=$("#startDate").val();
                    outer_endtime=$("#endDate").val();
                }else{
                    wrongVal("Sorry!", "Date Not Set");
                }
            },
            error:function(e){
                console.log(e);
            }
        })
    }else{
        wrongVal("Sorry!", "Choose Right Starting Date");
    }
}