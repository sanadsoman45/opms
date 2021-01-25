function login()
{
	var userid = jQuery("#user_id1").val();
	var password=jQuery("#pass_word1").val();
	if((userid).trim() != "" && (password).trim() != ""){
		if(userid.match(/^[0-9]+$/g)){
			jQuery.ajax({
				url:"StudentLogin.php",
				type:"POST",
				dataType:"json",
				data:{"userid":userid,"password":password,"function":"student_login"},
				success:function(resp){
					if(resp["connerror"]=="yes"){
						wrongVal("Sorry!","Error in connecting to database");
					}else if(resp["invalidid"]=="invalidid"){
						wrongVal("Sorry!","Invalid Id");
					}else if(resp["passnotset"]=="true"){
						wrongVal("Sorry!","Password Not Set");
					}else if(resp["invalidpass"]=="true"){
						wrongVal("Sorry!","Invalid Password");
					}else{
						localStorage.setItem("sid", resp["sid"]);
						localStorage.setItem("sname", resp["sname"]);
						localStorage.setItem("sgr", resp["sgr"]);
						localStorage.setItem("semail", resp["semail"]);
						localStorage.setItem("spn", resp["spn"]);
						$.post("StudentModule.php",function(){
	                        location.href="StudentModule.php";
	                    });
		            }
				}
			})
		}else{
			wrongVal("Sorry!","User ID Should Contain Only Digits From 0-9");
		}
	}
}

function logout(){
	localStorage.removeItem("sid");
	localStorage.removeItem("sname");
	localStorage.removeItem("sgr");
	localStorage.removeItem("semail");
	localStorage.removeItem("spn");
	$.post("StudentLogin.php",function(){
        location.href="StudentLogin.php";
    });
}
$(document).ready(function() {
    if (typeof InstallTrigger !== 'undefined') {
        $(".pslash-eye").css("margin-left","7em").css("margin-bottom","2em");
    }
});