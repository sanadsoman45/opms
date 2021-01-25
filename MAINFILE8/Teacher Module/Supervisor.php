<html>
	<head>
		<title>Add Teacher</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/AddTeacher.css" rel="stylesheet">
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

        <script src="js/jquery.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
        <script src="js/admin_ajax.js"></script>
		<!-- <script>
        $(document).ready(function(){
            if(localStorage.getItem("name1") == null)
            {
                $.post("AdminLogin.php",function(){
                    location.href="AdminLogin.php";
                });
            }
        }); 
        </script> -->
	</head>
	<body>
		<header class="stheader">Individual Teacher</header>
        <p class="stsubheader">These are the remaining Teacher in the Database list. You can add each Teacher from this list to the Signin table.</p><br/>
        <div class="stremaininglist">
	        <?php
	        	require_once 'conn.php';
	            $conn1=createconn1();
	            mysqli_select_db($conn1,"projectsubmission");
	            if(mysqli_num_rows(mysqli_query($conn1,"SELECT * FROM teacher"))<1){
	            	mysqli_select_db($conn1,"college_database");
	            	$result=mysqli_query($conn1,"Select * from teac_table order by t_id");
		            $total_records=mysqli_num_rows($result);
		            $output="<p class='no_records'>No records to be displayed</p>";
		            if($total_records>1){
		                $output='<table border="1">
	                        <thead>
	                            <th>Sr_no.</th>
	                            <th>User ID</th>
	                            <th>User Name</th>
	                            <th>Mobile Number</th>
	                            <th>Email ID</th>
	                            <th>Actions</th>
	                        </thead>';
		                $i=1;
		                while($row=mysqli_fetch_array($result)){
		                    $output.='<tbody>
		                        <tr>
			                        <td>'.$i.'</td>
			                        <td>'.$row["t_id"].'</td>
			                        <td>'.$row["t_name"].'</td>
			                        <td>'.$row["t_mob"].'</td>
			                        <td>'.$row["t_email"].'</td>
			                        <td class="btn btn'.$i.'">
			                            <div class="outer_tsAddBtn"><input type="button" value="INSERT" class="tsAddBtn"></div>
			                        </td>
		                    	</tr>
	                    	</tbody>'
		                    ;
		                    $i++;
		                }
		                $output.='</table>';  
	            	}
	            	echo $output;
		            mysqli_close($conn1); 
	            }
	            else{
	            	mysqli_select_db($conn1,"college_database");
	            	$output="<p class='no_records'>No Records found to be added</p>";
	            	$result=mysqli_query($conn1,"SELECT * FROM teac_table WHERE t_id NOT IN (SELECT t_id FROM projectsubmission.teacher)");
	            	$total_records=mysqli_num_rows($result);
	            	if($total_records>0)
	            	{
	            	 	$output='<table border="1">
	                        <thead>
	                            <th>Sr_no.</th>
	                            <th>User ID</th>
	                            <th>User Name</th>
	                            <th>Mobile Number</th>
	                            <th>Email ID</th>
	                            <th>Actions</th>
	                        </thead>';
		                $i=1;
		                while($row=mysqli_fetch_array($result)){
		                    $output.='<tbody>
		                        <tr>
			                        <td>'.$i.'</td>
			                        <td>'.$row["t_id"].'</td>
			                        <td>'.$row["t_name"].'</td>
			                        <td>'.$row["t_mob"].'</td>
			                        <td id="temail'.$i.'">'.$row["t_email"].'</d>
			                        <td class="btn btn'.$i.'">
			                            <div class="outer_tsAddBtn"><input type="button" value="INSERT" class="tsAddBtn" onclick="tsAddBtn('.$i.')"></div>
			                        </td>
		                    	</tr>
	                    	</tbody>'
		                    ;
		                    $i++;
	                	}
		                $output.='</table>';
		            }
		            echo $output;
		            mysqli_close($conn1);
	            }
	        ?>
   		</div>
        <!-- //////////////////////////////// Add Delete Edit Data //////////////////////////////////////////////-->

        <!-- ////////////////////////////////////////////////////////////////////////////////////// Conformation Box-->
            <div class="outer_addalldata">
                <div class="addalldata">
                    <p class="alldeletemess">Are you sure to Insert all the data of Students.</p>
                    <div class="aadCancelBtn">CANCEL</div>
                    <!-- Student -->
                    <!-- <div class="same_iadaase outer_soneaddbtn">
                        <input type="button" value="PROCEED" class="iadaase soneaddbtn">
                    </div> -->

                    <!-- Teacher -->
                    <div class="same_iadaase outer_toneaddbtn">
                        <input type="button" value="PROCEED" class="iadaase toneaddbtn" onclick="toneaddbtn()">
                    </div>

                    <!-- Admin -->
                    <!-- <div class="same_iadaase outer_aoneaddbtn">
                        <input type="button" value="PROCEED" class="iadaase aoneaddbtn">
                    </div> -->
                </div>
            </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////-->

        <!-- ////////////////////////////////////////////////////////////////////////////////////// Right Wrong Popup-->
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