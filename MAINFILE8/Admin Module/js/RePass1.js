var ui_gr_digits0 = /^([0-9]+)$/g;
var pw_digits0 = /[0-9]/g;
var pw_uppercaseletters0 = /[A-Z]/g;
var pw_special0 = /[\@\$\&\#\!\%]/g;
var pw_lowcaseletters0 = /[a-z]/g;
var pw_nospecial0 = /^([a-zA-Z0-9\s\@\$\&\#\!\%]+)$/g;
var fn_letters2 = /^([a-zA-Z\s]+)$/g;
var email_addr2 = /^[a-zA-Z0-9]{1,20}\@[a-zA-Z]{2,5}\.[a-z]{2,4}$/g;

$(document).ready(function() {
    $("#forgot-password1").click(function() {
        $(".outer-block").css("display", "flex");
        $("#user_id1").val("");
        $("#pass_word1").val("");
        $("#outer-eye1").hide();
    });
});

$(document).ready(function() {
    $(".close-block").click(function() {
        $(".outer-block").css("display", "none");
        $("#reset_pass").val("");
        $("#reset_pass_otp").val("");
        $("#new_pass").val("");
        $("#renew_pass").val("");
        $("#repassouter-eye").hide();
        $("#passouter-eye").hide();
    });
});

var si;
function startTimer(duration, display) {
    var timer = duration,
        minutes, seconds;
    si = setInterval(function() {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        display.textContent = minutes + ":" + seconds;
        if (--timer < 0) {
            clearInterval(si);
            $("#timep").hide();
            $(".inner-block").css("height", "290px");
            $("#otp_btn").html('RESEND OTP');
            $("#p-btn2").attr("onclick", "send_otp1()");
        }
    }, 1000);
}

$(document).ready(function() {
    $("#passouter-eye").hide();
    $("#repassouter-eye").hide();

    $("#pass_eye").on('click', function() {
        if ($(this).attr("show") === "no") {
            $(this).attr("show", "yes");
            $(this).removeClass("pslash-eye");
            $(this).addClass("peye");
            $("#new_pass").attr("type", "text");
            $("#new_pass").attr("autocomplete", "off");
        } else {
            $(this).attr("show", "no");
            $(this).removeClass("peye");
            $(this).addClass("pslash-eye");
            $("#new_pass").attr("type", "password");
        }
    });

    $("#repass_eye").on('click', function() {
        if ($(this).attr("show") === "no") {
            $(this).attr("show", "yes");
            $(this).removeClass("pslash-eye");
            $(this).addClass("peye");
            $("#renew_pass").attr("type", "text");
            $("#renew_pass").attr("autocomplete", "off");
        } else {
            $(this).attr("show", "no");
            $(this).removeClass("peye");
            $(this).addClass("pslash-eye");
            $("#renew_pass").attr("type", "password");
        }
    });

    var newpw = document.getElementById("new_pass");
    var newrpw = document.getElementById("renew_pass");

    $("#new_pass").on('keyup keydown', function() {
        if (newpw.value == "" || newpw.value == null) {
            $("#pass_eye").attr("show", "no");
            $("#pass_eye").removeClass("peye");
            $("#pass_eye").addClass("pslash-eye");
            $("#new_pass").attr("type", "password");
            $("#passouter-eye").hide();
        } else {
            $("#passouter-eye").show();
        }
    });

    $("#renew_pass").on('keyup keydown', function() {

        if (newrpw.value == "" || newrpw.value == null) {
            $("#repass_eye").attr("show", "no");
            $("#repass_eye").removeClass("peye")
            $("#repass_eye").addClass("pslash-eye")
            $("#renew_pass").attr("type", "password")
            $("#repassouter-eye").hide();
        } else {
            $("#repassouter-eye").show();
        }
    });
});

var outer_userid;
function check_id(){
    var userid = outer_userid = jQuery("#reset_pass").val();
    if (userid == null || userid == "") {
        wrongVal("Error", "ID FIELD IS EMPTY");
    }else if (!(userid.match(ui_gr_digits0))) {
        wrongVal("Sorry!", "User-Id Should Contain Only Digits From 0-9");
    }else{
        send_otp1();
        $(".wsmodal").fadeIn();
    }
}
function send_otp1() {
    $("#p-btn1").attr("onclick", "");
    $("#p-btn2").attr("onclick", "");
    jQuery.ajax({
        url: "DataBase.php",
        type: "POST",
        dataType: "json",
        data: { "userid": outer_userid, "function": "idverify" },
        success: function(result0) {
            $(".wsmodal").hide();
            if (result0["conn"] == "cno") {
                console.log('Connection Can\'t Be Established...');
                $("#p-btn1").attr("onclick", "check_id()");
            }else if(result0['status'] == "no"){
                wrongVal("Sorry","ID Is Invalid");
                $("#p-btn1").attr("onclick", "check_id()");
            }else if(result0['passnotset'] == "no"){
                wrongVal("Sorry","Password Not Set");
                $("#p-btn1").attr("onclick", "check_id()");
            }else if (result0['stat'] == "no") {
                wrongVal('SORRY!', 'You Can Change Password After ' + result0['days'] + ' Day & ' + result0['hms'] + "(H:M:S)");
                $("#p-btn1").attr("onclick", "check_id()");
            }else if(result0['sendEmail'] == "no"){
                wrongVal("Sorry","Not Send Email");
                $("#p-btn1").attr("onclick", "check_id()");
            }else if(result0['sendEmail'] == "yes"){
                rightVal("Sorry","Send Email");
                jQuery('.second_box').show();
                jQuery('.close-block').hide();
                jQuery('.first_box').hide();
                jQuery('.third_box').hide();
                rightVal('YUP!', 'Check Your Registered Email');
                display = document.querySelector('#time');
                startTimer(60 * 1, display);
                $("#timep").show();
                $(".inner-block").css("height", "310px");
                $("#p-btn2").attr("onclick", "submit_otp1()");
                $("#otp_btn").html('SUBMIT');
            }
        }
    });
}

function submit_otp1() {
    var otp = jQuery("#reset_pass_otp").val();
    if (otp == "" || otp == null) {
        wrongVal("Sorry!", "OTP Must Be Filled Out");
    }else if (!(otp.match(/^([0-9]+)$/g))) {
        wrongVal("Sorry!", "OTP Should Contain Only Digits From 0-9");
    }else {
        $("#p-btn2").attr("onclick", "");
        jQuery.ajax({
            url: "DataBase.php",
            type: "POST",
            dataType: "json",
            data: { "otp": otp, "function": "otpverify"},
            success: function(result1) {
                if (result1["conn"] == "cno") {
                    console.log('Connection Can\'t Be Established...');
                    $("#p-btn2").attr("onclick", "submit_otp1()");
                } else if (result1['status'] === "yes") {
                    jQuery('.second_box').hide();
                    jQuery('.first_box').hide();
                    jQuery('.third_box').show();
                    $(".inner-block").css("height", "390px");
                    $(".inner-block").css("animation", "MoveUpDown 0.8s linear");
                    clearInterval(si);
                } else {
                    wrongVal('SORRY!', 'INVALID OTP');
                    $(".pass-textbox0").val("");
                    $("#p-btn2").attr("onclick", "submit_otp1()");
                }
            }
        });
    }
}

function resetpassword() {
    if (($("#new_pass").val()) == "" || ($("#new_pass").val()) == null) {
        wrongVal("Sorry!", "Password Must Be Filled Out");
    } else if (!(($("#new_pass").val()).match(/[a-z]/g))) {
        wrongVal("Sorry!", "Lowercase Should Be Included");
    } else if (!(($("#new_pass").val()).match(/[A-Z]/g))) {
        wrongVal("Sorry!", "Uppercase Should Be Included");
    } else if (!(($("#new_pass").val()).match(/[0-9]/g))) {
        wrongVal("Sorry!", "Digits Should Be Included");
    } else if (($("#new_pass").val()) != ($("#new_pass").val()).match(/^([a-zA-Z0-9\s\@\$\&\#\!\%]+)$/g)) {
        wrongVal("Sorry!", "SpecialCase Should Be Included Only (@ $ & # ! %)");
    } else if (!(($("#new_pass").val()).match(/[\@\$\&\#\!\%]/g))) {
        wrongVal("Sorry!", "SpecialCase Should Be Included");
    } else if (($("#new_pass").val()).length < 8) {
        wrongVal("Sorry!", "At Least 8 Or More Characters Should Be Included");
    } else if (($("#renew_pass").val()) == "" || ($("#renew_pass").val()) == null) {
        wrongVal("Sorry!", "RePassword Must Be Filled Out");
    } else if (($("#renew_pass").val()) != ($("#new_pass").val())) {
        wrongVal("Sorry!", "Password Not Match");
    } else {
        $("#p-btn3").attr("onclick", "");
        jQuery.ajax({
            url: "DataBase.php",
            type: "POST",
            dataType: "json",
            data: { "renewpass": (jQuery("#renew_pass").val()), "function": "otpval"},
            success: function(result2) {
                if (result2["conn"] == "cno") {
                    console.log('Connection Can\'t Be Established...');
                    $("#p-btn3").attr("onclick", "resetpassword()");
                }else if (result2['status'] === "sww") {
                    wrongVal('SORRY!', 'Something Went Wrong');
                    $("#p-btn3").attr("onclick", "resetpassword()");
                }else if (result2['status'] === "yes") {
                    rightVal('SUCESS!', 'Password Changed Sucessfully');
                    setTimeout(function() {
                        localStorage.removeItem("aname");
                        localStorage.removeItem("aid");
                        localStorage.removeItem("aname");
                        localStorage.removeItem("atype");
                        localStorage.removeItem("aemail");
                        localStorage.removeItem("apn");
                        location.href = "http://localhost/pro/MAINFILE8/Admin%20Module/AdminLogin.php";
                    }, 5000);
                    jQuery('.close-block').show();
                }else{
                    wrongVal('SORRY!', 'Old Password Can\'t be Used Again');
                    $("#p-btn3").attr("onclick", "resetpassword()");
                }
            }
        });
    }
}