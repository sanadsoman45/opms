<?php
	require_once 'conn.php';
	if(!empty(extract($_POST)))
	{
		$user_id=rand(100000,999999);
		$vkey=base64_encode($user_id);
		$user_name=strtolower($_POST["aname"]);
		$user_email=strtolower($_POST["aemail"]);
		$user_pn=$_POST["apn"];
		$source = base64_encode($_POST["source"]);
		$msg="<html><body><h1>Hi ".explode("@",$user_name)[0].",</h1> <div style='font-size:1.5em'><p>A new Account Has been created for You.</p><p>Click the url below to activate your account and select a password!</p><p>http://localhost/pro/MAINFILE8/Admin%20Module/setPassword.php?vkey=$vkey&source=$source</p><p>If the above URL does not work try copying and pasting it into your browser. If you continue to have problems, please feel free to contact us.</p><p>Regards Admin.</p><div></body></html>";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: PROJECT MANAGEMENT SYSTEM<cartoonlovers185@gmail.com>' . "\r\n";
		$conn1=createconn1();
		date_default_timezone_set("Asia/Kolkata"); 
		mysqli_select_db($conn1,"projectsubmission");
		$query_row=mysqli_fetch_array(mysqli_query($conn1,"Select * from admin where a_id=$user_id or a_email='$user_email' or a_pn='$user_pn'"));
		if($user_id==$query_row["a_id"])
		{
			$user_id=rand(100000,999999);
		}
		else if($user_email==$query_row["a_email"])
		{
			$return_data["emailexist"]="yes";
		}
		else if($user_pn==$query_row["a_pn"])
		{
			$return_data["phoneexist"]="yes";	
		}
		else
		{
			if(mail($user_email,"Account creation",$msg,$headers))
			{
				$sql=mysqli_query($conn1,"INSERT INTO admin (a_id, a_name, a_type, a_email, a_pn) VALUES ($user_id, '$user_name','sudo_user','$user_email','$user_pn')");	
				$return_data["emailsent"]="yes";
			}
			else
			{
				$return_data["emailsent"]="no";
			}
		}
		echo json_encode($return_data);
		mysqli_close($conn1);
		exit();
	}
?>
<html>
	<head>
		<title>Add Admin</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/AddAdmin.css">
		<link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />
        <link href="css/WSSwal.css" rel="stylesheet" />

		<script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
		<script>
		function addadmin()
		{

			var aid = $(".UserIDTextbox").val();
			var aname = $(".UserNameTextBox").val();
			var aemail = $(".EmailIDTextBox").val();
			var apn = $(".PinNumberTextbox").val();
			if(aname == "" || aname == null){
				wrongVal("Sorry!", "User Name Must Be Filled Out");
			}else if(!(aname.match(/^([a-zA-Z\s]+)$/g))){
				wrongVal("Sorry!", "Full Name Should Contain Only Letters For Ex. (A-Z a-z)");
			}else if(aemail == "" || aemail == null){
				wrongVal("Sorry!", "Email ID Must Be Filled Out");
			}else if(!(aemail.match(/^[a-zA-Z0-9]{1,20}\@[a-zA-Z]{2,5}\.[a-z]{2,4}$/g))){
				wrongVal("Sorry!", "Invalid Email-ID");
			}else if(apn == "" || apn == null){
				wrongVal("Sorry!", "Contact Number Must Be Filled Out");
			}else if(!(apn.match(/^([0-9]+)$/g))){
				wrongVal("Sorry!", "Contact Number Should Contain Only Digits From 0-9");
			}else if(apn.length != 10){
				wrongVal("Sorry!", "Contact Number Should Contain Only 10 Digits Number");
			}else{
				$(".AddAdminBtn").attr("onclick", "");
				$(".wsmodal").fadeIn();
				jQuery.ajax({
		            url: "AddAdmin.php",
		            type: "POST",
		            dataType: "json",
					data:{"aid":aid, "aname":aname, "aemail":aemail, "apn":apn,"source":"admin"},
					success: function(results){
						$(".wsmodal").hide();
						if(results["emailexist"]=="yes")
						{
							$(".AddAdminBtn").attr("onclick", "addadmin()");
							wrongVal("Sorry","Email Exists");	
						}
						else if(results["emailsent"]=="no")
						{
							$(".AddAdminBtn").attr("onclick", "addadmin()");
							wrongVal("Sorry","Failed to send email");
						}
						else if(results["emailsent"]=="yes")
						{
							rightVal("Success","Email Sent Successfully");
							setTimeout(function(){ location.href="AdminModule.php"; },4000);
						}
						else if(results["phoneexist"]=="yes")
						{
							$(".AddAdminBtn").attr("onclick", "addadmin()");
							wrongVal("Sorry","Phone Number Exsists");
						}
					}
				});
			}
		}
			
		</script>
	</head>
	<body>
		<div class="abc"></div>
		
		<form id="main-container" method="POST">
			<header>Please fill out the form to add admin</header>
			<div class="mainBox">
				

	            <div class="main_UserNameTextBox">
					<p class="UserName">User Name</p>
					<div class="outer_UserNameTextBox">
		                <input type="text" class="UserNameTextBox" name="UserName_TextBox" autocomplete="off"/>
		            </div>
	            </div>

	            <div class="main_EmailIDTextBox">
					<p class="EmailIDName">Email ID</p>
					<div class="outer_EmailIDTextBox">
		                <input type="text" class="EmailIDTextBox" name="EmailID_TextBox" autocomplete="off"/>
		            </div>
	            </div>

	            <div class="main_PinNumberTextbox">
					<p class="PinNumberName">Contact Number</p>
					<div class="outer_PinNumberTextbox">
		                <input type="text" class="PinNumberTextbox" name="PinNumber_Textbox" autocomplete="off"/>
		            </div>
	            </div>

	            <div class="outer_AddAdminBtn">
		            <input type="button" value="Add Admin" class="AddAdminBtn" onclick="addadmin()">
		        </div>
			</div>
		</form>

		<!-- ///////////////////////////////////////////////////////////////////////////////////// RIGHT WRONG POPUP-->
        <div id="wrongValidation" class="wmodal">

            <div class="wmodal-content">

                <div class="wcircle">
                    <span class="w11 w1"></span>
			        <span class="w22 w2"></span>
                </div>

                <p class="wtitle-text"></p>
                <p class="winfo-text"></p>

                <span class="wok-content-block" id="wspan">
                    <span class="wok-text">OK</span>
                </span></br></br>

            </div>

        </div>

        <div id="rightValidation" class="rmodal">
            <div class="rmodal-content">
                
                <div class="rcircle-loader">
                    <div class="rcheckmark rdraw"></div>
                </div>

                <p class="rtitle-text"></p>
                <p class="rinfo-text"></p>

                <span class="rok-content-block" id="rspan">
                    <span class="rok-text">OK</span>
                </span></br></br>

            </div>
        </div>

        <div id="wsaitingState" class="wsmodal">
            <div class="wsmodal-content">
                
                <img src="css/sand-clock.png" class="sandclock">
                <div class="wscircle-loader">
                </div>

                <p class="wstitle-text">Sorry!</p>
                <p class="wsinfo-text">Waiting For Email</p>

                <!-- <span class="wsok-content-block" id="wsspan">
                    <span class="wsok-text">OK</span>
                </span></br></br> -->

            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
	</body>
</html>