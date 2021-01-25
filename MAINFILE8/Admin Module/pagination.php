<html>
<head>
	 <title>Admin Module</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- CSS Files -->
        <link href="../Admin Module/assets/css/bootstrap.min.css" rel="stylesheet" />
        <link href="../Admin Module/assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />

        <link href="css/Header.css" rel="stylesheet">
        <link href="css/UserSetting.css" rel="stylesheet">
        <link href="css/Details.css" rel="stylesheet">
        <link href="css/AdminModule.css" rel="stylesheet">

        <script src="js/admin_ajax.js"></script>
        <script src="js/jquery.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/UserSetting.js"></script>
        <style type="text/css">
        	.pagination_nav_btn{
        		padding-left:10px;
        		padding-right:10px;
        		padding-top:10px;
        		padding-bottom:10px;
        		background-color: #ffffff;
        		color: #337ab7;
        		cursor:pointer;
        		border: .5px solid grey;
        		border-left: 0px solid grey;
        	}
        	.pagination_link{
        		padding-left:15px;
        		padding-right:15px;
        		padding-top:10px;
        		padding-bottom:10px;
        		background-color: #ffffff;
        		color: #337ab7;
        		cursor:pointer;
        		border: .5px solid grey;
        		border-left: 0px solid grey;
        	}
        	.admin_email{
        		color: blue;
        		cursor: pointer;
        	}
        </style>
</head>
<body>
	<?php
		error_reporting(0);
		require_once 'conn.php';
		$records_per_page=5;
		$page=1;
		if(!empty($_POST["num_records"]))
		{
			$records_per_page=$_POST["num_records"];	
		}
		if(!empty($_POST["page"]))
		{
			$page=$_POST["page"];
		}
		$start_from=($page-1)*$records_per_page;
		if(!empty($_POST["source"]))
		{
			$source=$_POST["source"];
			
			if(!empty(trim($_POST["query"])))
			{
				$search=$_POST["query"];
				$limit_query="SELECT * from admin where a_type='sudo_user' and (a_pn like concat('%','$search','%') or a_name like concat('%','$search','%') or a_email like concat('%','$search','%')) order by a_id LIMIT $start_from,$records_per_page";
				$total_rows="SELECT * from admin where a_type='sudo_user' and (a_pn like concat('%','$search','%') or a_name like concat('%','$search','%') or a_email like concat('%','$search','%')) order by a_id";
				$table_column_names_arr=["SrNo"=>"Sr_No.","a_name"=>"Admin Name","a_type"=>"Admin Type","a_email"=>"Email Id","a_pn"=>"Mobile No","a_stat"=>"Account Status","a_action"=>"Actions"];
				$column_names_arr=["a_id"=>"a_id","a_name"=>"a_name","a_type"=>"a_type","a_pass"=>"a_pass","a_email"=>"a_email","a_pn"=>"a_pn"];				
				if($source=="student"){
					$limit_query="SELECT * from student where  (s_pn like concat('%','$search','%') or s_name like concat('%','$search','%') or s_email like concat('%','$search','%')) order by s_id LIMIT $start_from,$records_per_page";
					$total_rows="SELECT * from student where (s_pn like concat('%','$search','%') or s_name like concat('%','$search','%') or s_email like concat('%','$search','%')) order by s_id";
					$table_column_names_arr=["SrNo"=>"Sr_No.","a_name"=>"Student Name","a_email"=>"Email Id","a_pn"=>"Mobile No","a_stat"=>"Account Status","a_action"=>"Actions"];
					$column_names_arr=["a_id"=>"s_id","a_name"=>"s_name","a_pass"=>"s_pass","a_email"=>"s_email","a_pn"=>"s_pn"];
				}else if($source=="teacher"){
					$limit_query="SELECT * from teacher where  (t_pn like concat('%','$search','%') or t_name like concat('%','$search','%') or t_email like concat('%','$search','%')) order by t_id LIMIT $start_from,$records_per_page";
					$total_rows="SELECT * from teacher where  (t_pn like concat('%','$search','%') or t_name like concat('%','$search','%') or t_email like concat('%','$search','%')) order by t_id";
					$table_column_names_arr=["SrNo"=>"Sr_No.","a_name"=>"Teacher Name","a_email"=>"Email Id","a_pn"=>"Mobile No","a_stat"=>"Account Status","a_action"=>"Actions"];
					$column_names_arr=["a_id"=>"t_id","a_name"=>"t_name","a_email"=>"t_email","a_pn"=>"t_pn","a_pass"=>"t_pass"];
				}	
			}else{
				$limit_query="SELECT * FROM admin where a_type='sudo_user' order by a_id LIMIT $start_from,$records_per_page";
				$total_rows="SELECT * FROM admin where a_type='sudo_user' order by a_id";
				$table_column_names_arr=["SrNo"=>"Sr_No.","a_name"=>"Admin Name","a_type"=>"Admin Type","a_email"=>"Email Id","a_pn"=>"Mobile No","a_stat"=>"Account Status","a_action"=>"Actions"];
				$column_names_arr=["a_id"=>"a_id","a_name"=>"a_name","a_type"=>"a_type","a_pass"=>"a_pass","a_email"=>"a_email","a_pn"=>"a_pn"];
				if($source=="student"){
					$limit_query="SELECT * FROM student WHERE s_id IN (SELECT s_id FROM college_database.stud_table) order by s_id LIMIT $start_from,$records_per_page";
					$total_rows="SELECT * FROM student WHERE s_id IN (SELECT s_id FROM college_database.stud_table)";
					$table_column_names_arr=["SrNo"=>"Sr_No.","a_name"=>"Student Name","a_email"=>"Email Id","a_pn"=>"Mobile No","a_stat"=>"Account Status","a_action"=>"Actions"];
					$column_names_arr=["a_id"=>"s_id","a_name"=>"s_name","a_pass"=>"s_pass","a_email"=>"s_email","a_pn"=>"s_pn"];
				}else if($source=="teacher"){
					$limit_query="SELECT * FROM teacher WHERE t_id IN (SELECT t_id FROM college_database.teac_table) order by t_id LIMIT $start_from,$records_per_page";
					$total_rows="SELECT * FROM teacher WHERE t_id IN (SELECT t_id FROM college_database.teac_table)";
					$table_column_names_arr=["SrNo"=>"Sr_No.","a_name"=>"Teacher Name","a_email"=>"Email Id","a_pn"=>"Mobile No","a_stat"=>"Account Status","a_action"=>"Actions"];
					$column_names_arr=["a_id"=>"t_id","a_name"=>"t_name","a_email"=>"t_email","a_pn"=>"t_pn","a_pass"=>"t_pass"];
				}
			}
			pagination($limit_query,$total_rows,$source,$table_column_names_arr,$column_names_arr,$start_from,$records_per_page);
		}
		function pagination($limit_query,$total_rows,$source,$table_column_names_arr,$column_names_arr,$start_from,$records_per_page)
		{
			global $page;
			$conn1=createconn1();
			mysqli_select_db($conn1,"projectsubmission");
			$total_records_page=mysqli_num_rows(mysqli_query($conn1,$total_rows));
			$output="No records Found";
			if($total_records_page>0)
			{
				$output='<table class="table">
				<thead class="text-primary">
	                <th id="txt-title-table" class="text-center">'.$table_column_names_arr["SrNo"].'</th>
	                <th id="txt-title-table" class="text-center">'.$table_column_names_arr["a_name"].'</th>';
	                if($source=="admin"){
	                	$output.='<th id="txt-title-table" class="text-center">'.$table_column_names_arr["a_type"].'</th>';
	                }
	                $output.='<th id="txt-title-table" class="text-center">'.$table_column_names_arr["a_email"].'</th>
	                <th id="txt-title-table" class="text-center">'.$table_column_names_arr["a_pn"].'</th>';
	                if($source!="admin"){
	                	$output.='<th id="txt-title-table" class="text-center">Group Id</th>';
	            	}
	                $output.='<th id="txt-title-table" class="text-center">'.$table_column_names_arr["a_stat"].'</th>';
	                if($source!="student"){
	                	$output.='<th id="txt-title-table" class="text-center">'.$table_column_names_arr["a_action"].'</th>';
	                }
	            $output.='</thead>';
				$arr=[];
				for($i=0;$i<$total_records_page;$i++)
				{
					$arr[$i]=$i+1;
				}

				$i=0;
				$query=mysqli_query($conn1,$limit_query);
				while($row=mysqli_fetch_array($query))
				{
					$stat = (!empty($row[$column_names_arr["a_pass"]])) ? "Active" : "InActive";
					$arr_slice=array_slice($arr,$start_from,$start_from+$records_per_page);
					
					$output.='<tbody id="tbody">
					<tr class="text-center tr'.$arr_slice[$i].'" id="txt-data-table">
						<td>'.$arr_slice[$i].'</td>
						<td>'.$row[$column_names_arr["a_name"]].'</td>';
						if($source=="admin")
						{
							$output.='<td>'.$row[$column_names_arr["a_type"]].'</td>';	
						}
						$output.='<td id="admin_email'.$arr_slice[$i].'" class="admin_email" onclick="admin_email('.$arr_slice[$i].')">'.$row[$column_names_arr["a_email"]].'</td>
						<td id=admin_mob_no'.$arr_slice[$i].'>'.$row[$column_names_arr["a_pn"]].'</td>';
						if($source!="admin")
						{
							$output.='<td>'.$row["group_id"].'</td>';
						}
						$output.='<td id="status'.$arr_slice[$i].'">'.$stat.'</td>';
						if($source!="student"){
							$output.='<td class="text-center">';
								if($source=="admin"){
									$output.='<i  id="myedit" style="cursor:pointer" onclick="admin_edit('.$row[$column_names_arr["a_id"]].','.$arr_slice[$i].','.$total_records_page.', '.$page.', '.$records_per_page.')" class="fas fa-pen myedit'.$arr_slice[$i].' abc1'.$arr_slice[$i].' edit0'.$arr_slice[$i].'"></i>&nbsp;&nbsp;';
								}
								$output.='<i class="fas fa-trash-alt myDelete'.$arr_slice[$i].' abc2'.$arr_slice[$i].'" style="cursor:pointer" id="mydelete" onclick="myDel('.$row[$column_names_arr["a_id"]].', '.$page.', '.$records_per_page.')"></i>';
								if($source=="admin"){
									$output.='<img src="photo/close.png" onclick="admin_close('.$arr_slice[$i].','.$total_records_page.','.$row[$column_names_arr["a_id"]].', '.$page.','.$records_per_page.')" class="editDelete editDelete0'.$arr_slice[$i].' editDelete'.$arr_slice[$i].' EditcancelD1">
						  			<img src="photo/correct.png" class="editDelete editDelete0'.$arr_slice[$i].' editDelete'.$arr_slice[$i].' EditsaveD1">';
						  		}
						  	$output.='</td>';
						 }
					$output.='</tr>
				</tbody>';
				$i++;
				}$output.='</table><br><div align="center">';
				$total_pages=ceil($total_records_page/$records_per_page);
				$prev_page=$page-1;
				$output.="<span class='pagination_nav_btn' style='border-left: .5px solid grey;' id='first' onclick='keyup_event($records_per_page, 1)'>First</span>";
				$output.="<span class='pagination_nav_btn' id='prev' onclick='keyup_event($records_per_page, $prev_page)'>Prev</span>";

				if($page==1){?>
					<script>
						$("#prev").hide();
						$("#first").hide();
					</script>
				<?php }
				$page1 = $page2 = $page;
				for($i=$page1-1;$i<=$page1+1;$i++)
				{
					if($page2 == $total_pages){
						$i = $page - 2;
						$page2 = -1;
						if($total_pages <= 1){
							$i = $page-1;
						}
					}
					if($i<=$total_pages)
					{
						if($i!="0"){
							$output.="<span class='pagination_link' id='".$i."'>".$i."</span>";
							echo "<script>$('#'+".$page.").css('background-color','#337ab7').css('color', '#ffffff').css('font-weight','bold');</script>";
						}else{
							$page1 = 2;
						}
					}
				}
				if($page==$total_pages){?>
					<script>
						$("#next").hide();
						$("#last").hide();
					</script>
				<?php }
				$next_page=$page+1;
				$output.="<span class='pagination_nav_btn' id='next' onclick='keyup_event($records_per_page, $next_page)'>Next</span>";
				$output.="<span class='pagination_nav_btn' id='last' onclick='keyup_event($records_per_page,$total_pages)'>Last</span>";
				mysqli_close($conn1);
			}
			echo $output;
		}
		
	?>
</body>
</html>