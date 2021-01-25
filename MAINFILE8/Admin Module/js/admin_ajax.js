var eaemail,eapn;
function login()
{
	var userid = jQuery("#user_id1").val();
	var password=jQuery("#pass_word1").val();
	if((userid).trim() != "" && (password).trim() != ""){
		if(userid.match(/^[0-9]+$/g)){
			jQuery.ajax({
				url:"AdminLogin.php",
				type:"POST",
				dataType:"json",
				data:{"userid":userid,"password":password,"function":"admin_login"},
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
						localStorage.setItem("aid", resp["aid"]);
						localStorage.setItem("aname", resp["aname"]);
						localStorage.setItem("atype", resp["atype"]);
						localStorage.setItem("aemail", resp["aemail"]);
						localStorage.setItem("apn", resp["apn"]);
			            $.post("AdminModule.php",function(){
	                        location.href="AdminModule.php";
	                    });
					}
				}
			})
		}else{
			wrongVal("Sorry!","User ID Should Contain Only Digits From 0-9");
		}
	}
}
function load_data(page,num_records,source)
{
	$.ajax({
		url:"pagination.php",
		method:"post",
		data:{"page":page,"num_records":num_records,"source":source},
		success:function(data){
			$("#admin_table_onload").html(data);
		}
	});
}
function send_page_no(num_records,source)
{
	$.ajax({
		url:"pagination.php",
		method:"post",
		data:{"num_records":num_records,"source":source},
		success:function(data)
		{
			$("#admin_table_onload").html(data);
		}
	})
}

function editContent(data_id,data_pos,total_record,aouter_page_num,aouter_records_per_page){
	var aemail=document.getElementById("admin_email"+data_pos).innerText;
	var apn=document.getElementById("admin_mob_no"+data_pos).innerText;
	
    jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"aedit", "aid": data_id,"eid":aemail, "pnum":apn, "first_email":eaemail, "first_pnum":eapn},
        success: function(results){
        	$(".outer_addalldata").fadeOut();
        	if(results["update"] == "no"){
        		wrongVal("Sorry", "Kuchbhi Update Nahi Kiya");
        	}else if(results["update"] == "emailexist"){
        		wrongVal("Sorry", "Email Already Exist");
        		document.getElementById("admin_email"+data_pos).innerText = eaemail;
				document.getElementById("admin_mob_no"+data_pos).innerText = eapn;
        	}else if(results["update"] == "phoneexist"){
        		wrongVal("Sorry", "Phone Number Already Exist");
        		document.getElementById("admin_email"+data_pos).innerText = eaemail;
				document.getElementById("admin_mob_no"+data_pos).innerText = eapn;
        	}else if(results["update"] == "phoneemailexist"){
        		wrongVal("Sorry", "Email ID & Phone Number Both Are Exist");
        		document.getElementById("admin_email"+data_pos).innerText = eaemail;
				document.getElementById("admin_mob_no"+data_pos).innerText = eapn;
        	}else if(results["update"] == "yes"){
        		rightVal("Success", "Record Edit Successfully");
        	}

			for(var i=1; i<=total_record; i++){
				$(".abc1"+i).addClass("myedit"+i);
				$(".abc2"+i).addClass("myDelete"+i);
				$(".editDelete0"+i).addClass("editDelete"+i);
				$(".myDelete"+i).attr("onclick", "myDel("+data_id+","+aouter_page_num+","+aouter_records_per_page+")");
			}
			$(".myEdit"+data_pos).css("display", "inline-block");
		    $(".myDelete"+data_pos).css("display", "inline-block");
		    $(".editDelete"+data_pos).css("display", "none");
			$("#admin_email"+data_pos).attr("contenteditable", "false");
			$("#admin_mob_no"+data_pos).attr("contenteditable", "false");
			$("#admin_email"+data_pos).css("cursor", "pointer").css("color", "blue");
			$("#admin_email"+data_pos).attr("onclick", "admin_email("+data_pos+")");
        }
    });
}
var outer_data_id, outer_data_pos, outer_total_records, aouter_page_num, aouter_records_per_page;
/edit admin records/
function admin_edit(data_id,data_pos,total_records,page_num,records_per_page)
{
	outer_data_id = data_id;
	outer_data_pos = data_pos;
	outer_total_records = total_records;
	aouter_page_num = page_num;
	aouter_records_per_page = records_per_page;

	var email_id="admin_email"+data_pos;
	var mob_id="admin_mob_no"+data_pos;
	var edit_id="myedit"+data_pos;
	var delete_id="myDelete"+data_pos;
	document.getElementById(email_id).contentEditable=true;
	document.getElementById(mob_id).contentEditable=true;

    $(".myEdit"+data_pos).css("display", "none");
    $(".myDelete"+data_pos).css("display", "none");
    $(".editDelete"+data_pos).css("display", "inline-block");

	for(var i=1; i<=total_records; i++){
		$(".myDelete"+i).attr("onclick", "");
		$(".abc1"+i).removeClass("myedit"+i);
		$(".abc2"+i).removeClass("myDelete"+i);
		$(".editDelete0"+i).removeClass("editDelete"+i);
	}
	$(".canBox").attr("onclick", "");

	$(".tr"+data_pos).attr("id","tr"+data_pos);

	eaemail=document.getElementById("admin_email"+data_pos).innerText;
	eapn=document.getElementById("admin_mob_no"+data_pos).innerText;

	$("#admin_email"+data_pos).css("cursor", "auto").css("color", "black");
	$("#admin_email"+data_pos).attr("onclick", "");
}

function aeditconformbtn(){
	editContent(outer_data_id,outer_data_pos,outer_total_records,aouter_page_num,aouter_records_per_page);
}

function admin_close(data_posi, total_record, admin_id, page_num,records_per_page){
	document.getElementById("admin_email"+data_posi).innerText = eaemail;
	document.getElementById("admin_mob_no"+data_posi).innerText = eapn;

	for(var i=1; i<=total_record; i++){
		$(".abc1"+i).addClass("myedit"+i);
		$(".abc2"+i).addClass("myDelete"+i);
		$(".editDelete0"+i).addClass("editDelete"+i);
		$(".myDelete"+i).attr("onclick", "myDel("+admin_id+","+page_num+","+records_per_page+")");
	}
	$(".myEdit"+data_posi).css("display", "inline-block");
    $(".myDelete"+data_posi).css("display", "inline-block");
    $(".editDelete"+data_posi).css("display", "none");
    $("#admin_email"+data_posi).attr("contenteditable", "false");
	$("#admin_mob_no"+data_posi).attr("contenteditable", "false");

	$(".tr"+data_posi).attr("id","txt-data-table");

	$("#admin_email"+data_posi).css("cursor", "pointer").css("color", "blue");
	$("#admin_email"+data_posi).attr("onclick", "admin_email("+data_posi+")");
}

var adminid,outer_page,outer_records_per_page;
function myDel(admin_id, page, records_per_page){
	adminid = admin_id;
	outer_page = page;
	outer_records_per_page = records_per_page;
    $(".same_iadaase").css("display", "none");
    if(localStorage.getItem("setstheader") == "admin"){
        $(".outer_aonedeletebtn").css("display", "block");
        $(".alldeletemess").text("Are you sure to Delete data of a Admin.");
    }else if(localStorage.getItem("setstheader") == "student"){
        $(".alldeletemess").text("Are you sure to Delete data of a Students.");
        $(".outer_sonedeletebtn").css("display", "block");
    }else if(localStorage.getItem("setstheader") == "teacher"){
        $(".outer_tonedeletebtn").css("display", "block");
        $(".alldeletemess").text("Are you sure to Delete data of a Teacher.");
    }
    $(".addalldata").css("height", "11.6em");
    $(".outer_addalldata").fadeIn();
}

function aonedeletebtn(){
	jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"adelete", "aid": adminid, "source":$("#actiStat").attr("activeState")},
        success: function(results){
            $(".outer_addalldata").fadeOut();
            if(results["update"] == "yes"){
            	rightVal("Success!", "Record Delete Successfully");
    			load_data(outer_page, outer_records_per_page,$("#actiStat").attr("activeState"));
            }else if(results["SVTeac"] == "yes"){
            	$(".outer-fPNote").fadeIn();
            }else{
            	wrongVal("Sorry!", "Something Went Wrong");
            }
        }
    });
}

$(document).ready(function(){
	$(".gotItNote").click(function(){
		$(".outer-fPNote").fadeOut();
	});
});

function adeletealldatabtn(){
	jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"adeleteall"},
        success: function(results){
            $(".outer_addalldata").fadeOut();
            if(results["update"] == "yes"){
            	rightVal("Success!", "All Records Delete Successfully");
            	load_data(outer_page, outer_records_per_page,$("#actiStat").attr("activeState"));
            }else{
            	wrongVal("Sorry!", "Something Went Wrong");
            }
        }
    });
}

var admin_email1;
function admin_email(data_pos){
    var checkStatus = document.getElementById("status"+data_pos).innerText;
    if(checkStatus == "Active"){
    	wrongVal("Sorry!", "Account Already Active");
    }else{
		$(".alldeletemess").text("Are you sure to Send Email.");
	    $(".same_iadaase").hide();
	    $(".outer_asendemailbtn").show();
	    $(".outer_addalldata").fadeIn();
	    $(".addalldata").css("height", "11.6em");
	    $(".outer_addalldata").fadeIn();

	    admin_email1 = document.getElementById("admin_email"+data_pos).innerText;
	}
}

function atssendemail(){
	$(".outer_addalldata").fadeOut();
	$(".wsmodal").css("display","block");
    jQuery.ajax({
        url: "editData.php",
        type: "POST",
        dataType: "json",
        data:{"editdelete":"sendemail", "eid":admin_email1,"source":$("#actiStat").attr("activeState")},
        success: function(results){
        	$(".wsmodal").css("display","none");
            if(results["update"] == "yes"){
            	rightVal("Success", "Email Send Successfully");
            }else{
            	wrongVal("Sorry", "Email Not Send");
            }
        }
    });
}

$(document).ready(function() {
    if (typeof InstallTrigger !== 'undefined') {
        $(".pslash-eye").css("margin-left","7em").css("margin-bottom","2em");
    }
});