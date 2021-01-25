function wrongVal(wtitle, winfo){
    $(".wtitle-text").text(wtitle);
    $(".winfo-text").text(winfo);
    $("#wrongValidation").css("display", "block");
    // window.removeEventListener('load',func());
    setTimeout(function(){
        $(".w1").css("transform", "rotate(-45deg)");
        $(".w2").css("transform", "rotate(45deg)");
    }, 40);
}

function rightVal(rtitle, rinfo){
    $(".rtitle-text").text(rtitle);
    $(".rinfo-text").text(rinfo);
    $("#rightValidation").css("display", "block");
    $('.rcheckmark').show();
    // window.removeEventListener('load',func());
}

$(document).ready(function(){
    $("#wspan").click(function() {
        $("#wrongValidation").css("display", "none");
        $(".w1").css("transform", "rotate(0deg)");
        $(".w2").css("transform", "rotate(0deg)");
    });
});

$(document).ready(function(){
    $("#rspan").click(function() {
        $("#rightValidation").css("display", "none");
        if($( "#new-pass-flag" ).hasClass( "third_box" ) == true){
            var curpage = (window.location.href).substr((window.location.href).lastIndexOf("/") + 1);
            if(curpage == "StudentLogin.php"){
                window.location = "StudentLogin.php";
            }else if(curpage == "TeacLogSign.php"){
                window.location = "TeacLogSign.php";
            }
        }
    });
});

$(window).click(function(event) {
    if (event.target.matches("#wrongValidation")) {
        $("#wrongValidation").css("display", "none");
        $(".w1").css("transform", "rotate(0deg)");
        $(".w2").css("transform", "rotate(0deg)");
    }

    if (event.target.matches("#rightValidation")) {
        $("#rightValidation").css("display", "none");
        if($( "#new-pass-flag" ).hasClass( "third_box" ) == true){
            var curpage = (window.location.href).substr((window.location.href).lastIndexOf("/") + 1);
            if(curpage == "StudentLogin.php"){
                window.location = "StudentLogin.php";
            }else if(curpage == "TeacLogSign.php"){
                window.location = "TeacLogSign.php";
            }
        }
    }
});