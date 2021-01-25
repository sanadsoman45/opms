function login()
{
	var userid = jQuery("#user_id1").val();
	var password=jQuery("#pass_word1").val();
	if((userid).trim() != "" && (password).trim() != ""){
		if(userid.match(/^[0-9]+$/g)){
			jQuery.ajax({
				url:"TeacherLogin.php",
				type:"POST",
				dataType:"json",
				data:{"userid":userid,"password":password,"function":"teacher_login"},
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
						localStorage.setItem("tid", resp["tid"]);
						localStorage.setItem("tname", resp["tname"]);
						localStorage.setItem("tpin", resp["tpin"]);
						localStorage.setItem("temail", resp["temail"]);
						localStorage.setItem("tpn", resp["tpn"]);
						$.post("TeacherModule.php",function(){
	                        location.href="TeacherModule.php";
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
	localStorage.removeItem("tid");
	localStorage.removeItem("tname");
	localStorage.removeItem("tpin");
	localStorage.removeItem("temail");
	localStorage.removeItem("tpn");
	$.post("TeacherLogin.php",function(){
        location.href="TeacherLogin.php";
    });
}

var id,outer_position;
function approveProj(s_id,position){
	$(".alldeletemess").text("Are you sure to Approve Project.");
	$(".outer_aoneaddbtn").hide();
	$(".outer_soneaddbtn").show();
	$(".outer_addalldata").fadeIn();
	id=s_id;
	outer_position = position;
}


function rejectProj(s_id,position){
	$(".alldeletemess").text("Are you sure to Reject Project.");
	$(".outer_soneaddbtn").hide();
	$(".outer_aoneaddbtn").show();
	$(".outer_addalldata").fadeIn();
	id=s_id;
	outer_position = position;
}

function Reject_proj()
{
	var content=$("#textarea-1").val();
	if(content != ""){
		var projName=document.getElementById("pn"+outer_position).innerText;
		jQuery.ajax({
	        url: "proj_accept.php",
	        type: "POST",
	        dataType: "json",
	        data:{"project":"rejectproject","id":id,"content":content,"projName":projName},
	        success: function(results){
	            $(".outer_addalldata").fadeOut();
	            if(results["proj_status"]="Rejected"){
	            	$(".outer_ApprRejBox").hide();
	                $.post("ProjectList.php", function(){
	                    setTimeout(function(){location.href = "ProjectList.php";},2000);
	                });
	                rightVal("Success!", "Rejected Project");
	            }else{
	                wrongVal("Sorry!", "Error In Updating");
	            }
	        },
	        error:function(e){
	            console.log(e);
	        }
	    });
	}else{
		wrongVal("Sorry!" ,"Please Write Reason");
	}
}

function Approve_proj()
{
	var projName=document.getElementById("pn"+outer_position).innerText;
    jQuery.ajax({
        url: "proj_accept.php",
        type: "POST",
        dataType: "json",
        data:{"project":"acceptproject","id":id,"projName":projName},
        success: function(results){
            $(".outer_addalldata").fadeOut();
            if(results["proj_status"]="Accepted"){
                $.post("ProjectList.php", function(){
                    setTimeout(function(){location.href = "ProjectList.php";},2000);
                });
                rightVal("Success!", "Accepted Project");
            }else{
                wrongVal("Sorry!", "Error In Updating");
            }
        },
        error:function(e){
            console.log(e);
        }
    });
}

$(document).ready(function(){
	$(".aadCancelBtn").click(function(){
		$(".outer_addalldata").fadeOut();
	});

	$(".outer_aoneaddbtn").click(function(){
		$(".outer_ApprRejBox").show();
		$(".outer_addalldata").hide();
	});

	$(".outer_ARCancelBtn").click(function(){
		$(".outer_ApprRejBox").hide();
	})

	$("#flip1").click(function(){
        $(".stremaininglist1").slideToggle("slow");
    });

    $("#flip2").click(function(){
        $(".stremaininglist2").slideToggle("slow");
    });
});
$(document).ready(function() {
    if (typeof InstallTrigger !== 'undefined') {
        $(".pslash-eye").css("margin-left","7em").css("margin-bottom","2em");
    }
});