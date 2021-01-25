
$(document).ready(function() {
    $("#outer-eye1").hide();
    $("#outer-eye12").hide();
    $("#outer-eye22").hide();

    $("#eye1").on('click', function() {
        if ($(this).attr("show") === "no") {
            $(this).attr("show", "yes");
            $(this).removeClass("pslash-eye");
            $(this).addClass("peye");
            $("#pass_word1").attr("type", "text");
            $("#pass_word1").attr("autocomplete", "off");
        } else {
            $(this).attr("show", "no");
            $(this).removeClass("peye");
            $(this).addClass("pslash-eye");
            $("#pass_word1").attr("type", "password");
        }
    });

    $("#eye12").on('click', function() {
        if ($(this).attr("show") === "no") {
            $(this).attr("show", "yes");
            $(this).removeClass("pslash-eye");
            $(this).addClass("peye");
            $("#pass_word2").attr("type", "text");
            $("#pass_word2").attr("autocomplete", "off");
        } else {
            $(this).attr("show", "no");
            $(this).removeClass("peye");
            $(this).addClass("pslash-eye");
            $("#pass_word2").attr("type", "password");
        }
    });

    $("#eye22").on('click', function() {
        if ($(this).attr("show") === "no") {
            $(this).attr("show", "yes");
            $(this).removeClass("pslash-eye");
            $(this).addClass("peye");
            $("#re_password2").attr("type", "text");
            $("#re_password2").attr("autocomplete", "off");
        } else {
            $(this).attr("show", "no");
            $(this).removeClass("peye");
            $(this).addClass("pslash-eye");
            $("#re_password2").attr("type", "password");
        }
    });

    var pw1 = document.getElementById("pass_word1");
    var pw2 = document.getElementById("pass_word2");
    var rpw2 = document.getElementById("re_password2");
    
    $("#pass_word1").on('keyup keydown', function() {
            
        if(pw1.value == "" || pw1.value == null)
        {
            $("#eye1").attr("show", "no");
            $("#eye1").removeClass("peye");
            $("#eye1").addClass("pslash-eye");
            $("#pass_word1").attr("type", "password");
            $("#outer-eye1").hide();
        }else{
            $("#outer-eye1").show();
        }
    });
    
    $("#pass_word2").on('keyup keydown', function() {
            
            if(pw2.value == "" || pw2.value == null)
            {
                $("#eye12").attr("show", "no");
                $("#eye12").removeClass("peye");
                $("#eye12").addClass("pslash-eye");
                $("#pass_word2").attr("type", "password");
                $("#outer-eye12").hide();
            }else{
                $("#outer-eye12").show();
            }
        });

    $("#re_password2").on('keyup keydown', function() {
        
        if(rpw2.value == "" || rpw2.value == null)
        {
            $("#eye22").attr("show", "no");
            $("#eye22").removeClass("peye");
            $("#eye22").addClass("pslash-eye");
            $("#re_password2").attr("type", "password");
            $("#outer-eye22").hide();
        }else{
            $("#outer-eye22").show();
        }
    });
});