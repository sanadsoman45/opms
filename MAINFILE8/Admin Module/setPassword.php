<html>
	<head>
		<title>Add Admin</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" href="css/AddAdmin.css">
		<link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

		<script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
        <script>
        	$(document).ready(function() {
			    $("#outer-eye1").hide();
			    $("#outer-eye12").hide();

			    $("#eye1").on('click', function() {
			        if ($(this).attr("show") === "no") {
			            $(this).attr("show", "yes");
			            $(this).removeClass("pslash-eye");
			            $(this).addClass("peye");
			            $(".PasswordTextBox").attr("type", "text");
			            $(".PasswordTextBox").attr("autocomplete", "off");
			        } else {
			            $(this).attr("show", "no");
			            $(this).removeClass("peye");
			            $(this).addClass("pslash-eye");
			            $(".PasswordTextBox").attr("type", "password");
			        }
			    });
			    $("#eye12").on('click', function() {
			        if ($(this).attr("show") === "no") {
			            $(this).attr("show", "yes");
			            $(this).removeClass("pslash-eye");
			            $(this).addClass("peye");
			            $(".UserNameTextBox").attr("type", "text");
			            $(".UserNameTextBox").attr("autocomplete", "off");
			        } else {
			            $(this).attr("show", "no");
			            $(this).removeClass("peye");
			            $(this).addClass("pslash-eye");
			            $(".UserNameTextBox").attr("type", "password");
			        }
			    });

			    $(".PasswordTextBox").on('keyup keydown', function() {    
			        if($(".PasswordTextBox").val() == "" || $(".PasswordTextBox").val() == null)
			        {
			            $("#eye1").attr("show", "no");
			            $("#eye1").removeClass("peye");
			            $("#eye1").addClass("pslash-eye");
			            $(".PasswordTextBox").attr("type", "password");
			            $("#outer-eye1").hide();
			        }else{
			            $("#outer-eye1").show();
			        }
			    });
			    $(".UserNameTextBox").on('keyup keydown', function() { 
		            if($(".UserNameTextBox").val() == "" || $(".UserNameTextBox").val() == null)
		            {
		                $("#eye12").attr("show", "no");
		                $("#eye12").removeClass("peye");
		                $("#eye12").addClass("pslash-eye");
		                $(".UserNameTextBox").attr("type", "password");
		                $("#outer-eye12").hide();
		            }else{
		                $("#outer-eye12").show();
		            }
		        });
			});
        </script>
	</head>
	<body>
		<div class="mainPage">
		<div class="abc"></div>

		<form id="main-container" method="POST">
			<header>Please fill out the form to Register</header>
			<div class="mainBox">
				<div class="main_UserIDTextbox">
					<p class="UserIDName">User ID</p>
					<div class="outer_UserIDTextbox">
		                <input type="text" class="UserIDTextbox" id="UserIDTextbox" name="UserID_TB" disabled/>
		            </div>
	            </div>

	            <div class="main_PasswordTextBox">
					<p class="PasswordName">Password</p>
					<div class="outer_PasswordTextBox">
		                <input type="password" class="PasswordTextBox" name="Password_TB" />
		            </div>
	                <span id="outer-eye1">
                        <i id="eye1" show="no" class="fas pslash-eye"></i>
                    </span>
	            </div>

	            <div class="main_UserNameTextBox">
					<p class="UserName">Re-Password</p>
					<div class="outer_UserNameTextBox">
		                <input type="password" class="UserNameTextBox" name="RePassword_TB"/>
		            </div>
	                <span id="outer-eye12">
                        <i id="eye12" show="no" class="fas pslash-eye"></i>
                    </span>
	            </div>

	            <div class="outer_AddAdminBtn">
		            <input type="button" value="Register Account" id="Admin_submit" class="AddAdminBtns" onclick="setpassword_admin()">
		        </div>
			</div>
		</form>
		</div>
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
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->
	</body>
</html>
<?php
	require_once 'conn.php';
	$conn1=createconn1();
	$v=mysqli_select_db($conn1,"projectsubmission");
	date_default_timezone_set("Asia/Kolkata"); 

	if(!empty($_GET['vkey']) && !empty($_GET['source']))
	{
		$vkey = (int) base64_decode($_GET['vkey']);
		$source= base64_decode($_GET['source']);
		$source_path="http://localhost/pro/MAINFILE8/Student%20Module/StudentLogin.php";
		$query=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from student where s_id=$vkey"));
		$total_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT * from student where s_id=$vkey"));
		$sent_date=strtotime($query["s_email_time"]);
		$password = $query["s_pass"];

		if($source == "admin"){
			$source_path="AdminModule.php";
			$query=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from admin where a_id=$vkey"));
			$total_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT * from admin where a_id=$vkey"));
			$sent_date=strtotime($query["a_email_time"]);
			$password = $query["a_pass"];
		}else if($source == "teacher"){			
			$source_path="http://localhost/pro/MAINFILE8/Teacher%20Module/TeacherModule.php";
			$query=mysqli_fetch_array(mysqli_query($conn1,"SELECT * from teacher where t_id=$vkey"));
			$total_rows=mysqli_num_rows(mysqli_query($conn1,"SELECT * from teacher where t_id=$vkey"));
			$sent_date=strtotime($query["t_email_time"]);
			$password = $query["t_pass"];
		}
		$expiry_date=strtotime("+2 days",$sent_date);
		$currentdate=time();
		
		if($total_rows>0)
		{
			if($currentdate>$expiry_date)
			{
				?>
		        <script src="js/jquery.js"></script>
		        <script src="js/jquery-3.5.1.min.js"></script>
				<script type="text/javascript">
					$(".mainPage").hide();
					document.write("<html><body><span style='position: absolute;font-size:6em;color: orange;top:50%;left:50%;transform:translate(-50%,-50%);'>LINK EXPIRED</span></body></html>");
				</script>
			<?php
			}

			else if($password!="")
			{

			?>
				<script>
					location.href="<?php echo $source_path;?>";
				</script>
			<?php
			}
			
		} else {
			?>
		        <script src="js/jquery.js"></script>
		        <script src="js/jquery-3.5.1.min.js"></script>
				<script type="text/javascript">
					$(".mainPage").hide();
					document.write("<html><body><span style='position: absolute;;font-size:6em;color: orange;top:50%;left:50%;transform:translate(-50%,-50%);'>INVALID ID</span></body></html>");
				</script>
			<?php
		}
	} else {
		?>
			<script type="text/javascript">
				$(".mainPage").hide();
				document.write("<html><body><span style='width:100%;position: absolute;font-size:5em;color: orange;top:50%;left:50%;transform:translate(-50%,-50%);text-align: center;'>Something Went Wrong</span></body></html>");
			</script>
		<?php
	}
	mysqli_close($conn1);
?>

<script>
	var id='<?php echo $vkey?>';
	document.getElementById("UserIDTextbox").value=id;
	var source='<?php echo $source?>';

	function setpassword_admin()
	{
		var apassword = $(".PasswordTextBox").val();
		var arepassword = $(".UserNameTextBox").val();
		var auserid = $(".UserIDTextbox").val();
		console.log(arepassword);
		console.log(auserid);
		if (apassword == null || apassword == "") {
        	wrongVal("Error", "PASSWORD FIELD IS EMPTY");
        }else if (!(apassword.match(/[a-z]/g))) {
            wrongVal("Sorry!", "Lowercase Should Be Included");
        }else if (!(apassword.match(/[A-Z]/g))) {
            wrongVal("Sorry!", "Uppercase Should Be Included");
        }else if (!(apassword.match(/[0-9]/g))) {
            wrongVal("Sorry!", "Digits Should Be Included");
        }else if (!(apassword.match(/[\@\$\&\#\!\%]/g))) {
            wrongVal("Sorry!", "SpecialCase Should Be Included");
        }else if (apassword.length < 8) {
            wrongVal("Sorry!", "At Least 8 Or More Characters Should Be Included");
        }else if (arepassword == "" || arepassword == null) {
			wrongVal("Sorry!", "RePassword Must Be Filled Out");
	    }else if (apassword != arepassword) {
	        wrongVal("Sorry!", "Password Not Match");
	    }else{
	    	$(".AddAdminBtns").attr("onclick", "");
	    	jQuery.ajax({
	            url: "passwordupdate.php",
	            type: "POST",
	            dataType: "json",
				data:{"apw":arepassword,"vkey":auserid,"source":source},
				success: function(results){
					if(results["updated"]=="true"){
						rightVal("SUCCESS","ACcount created successfully");
						setTimeout(function(){
							$.post("AdminLogin.php",function(){
								if(results["source"]=="admin")
								{
									location.href="AdminLogin.php";	
								}
								else if(results["source"]=="student")
								{
									console.log(results["source"]);
									location.href="http://localhost/pro/MAINFILE8/Student%20Module/StudentLogin.php";
								}
				            	else
				            	{
				            		location.href="http://localhost/pro/MAINFILE8/Teacher%20Module/TeacherLogin.php";	
				            	}
				        	}); 
				        },4000);
					}
				},
				error:function(e){
					console.log(e);
				}
			});
	 	}
	}
</script>