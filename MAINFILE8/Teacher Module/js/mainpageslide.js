var func = function() {
    window.addEventListener('load', function() {
        $("#mcc-info").hide();
        $("#mcc-info").delay(500).fadeIn(500, function() {
            $("#mcc-info").delay(1000).fadeOut(500, function() {
                $(".mcc-login").css("display", "block");
            });
        });
    });
}
window.addEventListener('load', func());

function rem() {
    window.removeEventListener('load', func());
}