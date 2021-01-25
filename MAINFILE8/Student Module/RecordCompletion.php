<!DOCTYPE html>
<html>
	<head>
		<link href="css/StudentModule.css" rel="stylesheet">
		<script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/UserSetting.js"></script>
	</head>
	<body>
		<?php
			require_once 'conn.php';
			if(!empty(extract($_POST)))
			{
				$conn=createconn1();
				mysqli_select_db($conn,"projectsubmission");
				$query = mysqli_query($conn, "SELECT * FROM project WHERE s_id=".$_POST['sid']." AND proj_status!='Submitted'");
			    $output="";
			    $output .="<div class='rcName'>Record Completion</div>";
				if(mysqli_num_rows($query) != 0){
					$a=1;
				    while($rows= mysqli_fetch_array($query)){
				    	if($a==3){
				    		$output .="<div class='slideUpDown'>";
				    	}
				        $output .="<div class='rc".$a."'>
				            <div class='outer-innovation'>
				                <img class='innovation' src='photo/innovation.png'>
				            </div>
				            <div class='project'>".$rows["proj_name"]."</div>
				            <img class='next' src='photo/nextBlack.png'>
				            <img class='next1' src='photo/nextWhite.png'>
				            <div class='completed'>".$rows["proj_status"]."</div>
				        </div>";
				        if(mysqli_num_rows($query) == $a){
				        	$output .="</div>";
				        }
				        ?>
				        	<script type="text/javascript">
				        		var a = "<?php echo $a ?>";
				        		if(a==1){
				        			$(".recordComplition").css("height", "14.5em");
				        		}else if(a==2){
				        			$(".recordComplition").css("height", "23.5em");
				        		}else{
				        			$(".recordComplition").css("height", "28.5em");
				        		}
				        		if(a>2){
				        			$(".slideUpDown").css("display", "none");
				        			setTimeout(function(){$(".recordComplition").css("transition", "all 0.5s linear");},500);
				        		}
				        		localStorage.setItem("StudentTotalRecords", a);
				        	</script>
				        <?php
				        $a++;
				    }
				    if(mysqli_num_rows($query) > 2){
				    $output .="</div>
				            <input class='viewMore viewMore1' type='button' value='View More' onclick='viewMore()'/>
				            <input class='viewMore viewMore2' type='button' value='View Less' onclick='lessMore()'/>
				        <div>";
				    }
				}else{
					$output .="<p style='font-size: 2em;text-align: center;margin-top:3em;font-weight: bold;color: orange;'>No Active or completed Projects Found</p>";
				}
			    echo $output;
				exit();
			}
		?>
	</body>
</html>