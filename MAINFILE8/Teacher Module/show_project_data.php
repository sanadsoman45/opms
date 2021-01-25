<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

        <script src="js/jquery.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
    </head>

    <body>
        <?php
            error_reporting(0);
            require_once 'conn.php';
            $conn=createconn1();
            mysqli_select_db($conn,"projectsubmission");
            $stage_num = $_POST["stage_num"];
           
            if($stage_num == "projectComplete" && $_POST["searchbar"] == ""){
                $total_records_stage = mysqli_num_rows(mysqli_query($conn, "SELECT project.s_id, student.s_gr, student.s_name, project.proj_name, project.proj_type, project.proj_status
                                          FROM project
                                          INNER JOIN student ON student.s_id=project.s_id
                                          WHERE project.stage1_stat = 'Accepted' AND project.stage2_stat = 'Accepted' AND project.stage3_stat = 'Accepted' AND project.stage4_stat = 'Accepted' AND project.stage5_stat = 'Accepted' AND project.stage6_stat = 'Accepted' AND project.stage7_stat = 'Accepted' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].")"));
                
                $page = $_POST["page"];
                $total_pages=ceil($total_records_stage/5);
                if($page > $total_pages){
                    $page = $total_pages;
                }
                $start_from=($page-1)*5;

                $query = mysqli_query($conn, "SELECT project.s_id, student.s_gr, student.s_name, project.proj_name, project.proj_type , project.proj_status
                                          FROM project
                                          INNER JOIN student ON student.s_id=project.s_id
                                          WHERE project.stage1_stat = 'Accepted' AND project.stage2_stat = 'Accepted' AND project.stage3_stat = 'Accepted' AND project.stage4_stat = 'Accepted' AND project.stage5_stat = 'Accepted' AND project.stage6_stat = 'Accepted' AND project.stage7_stat = 'Accepted' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].")
                                          LIMIT $start_from,5");
            }else if($stage_num == "projectComplete" && $_POST["searchbar"] != ""){
                $search = $_POST["searchbar"];
                $total_records_stage = mysqli_num_rows(mysqli_query($conn, "SELECT project.s_id, student.s_gr, student.s_name, project.proj_name, project.proj_type, project.proj_status
                                          FROM project
                                          INNER JOIN student ON student.s_id=project.s_id
                                          WHERE project.stage1_stat = 'Accepted' AND project.stage2_stat = 'Accepted' AND project.stage3_stat = 'Accepted' AND project.stage4_stat = 'Accepted' AND project.stage5_stat = 'Accepted' AND project.stage6_stat = 'Accepted' AND project.stage7_stat = 'Accepted' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].") AND (project.s_id like concat('%','$search','%') or student.s_name like concat('%','$search','%') or project.proj_name like concat('%','$search','%') or project.proj_type like concat('%','$search','%'))"));
                
                $page = $_POST["page"];
                $total_pages=ceil($total_records_stage/5);
                if($page > $total_pages){
                    $page = $total_pages;
                }
                $start_from=($page-1)*5;

                $query = mysqli_query($conn, "SELECT project.s_id, student.s_gr, student.s_name, project.proj_name, project.proj_type , project.proj_status
                                          FROM project
                                          INNER JOIN student ON student.s_id=project.s_id
                                          WHERE project.stage1_stat = 'Accepted' AND project.stage2_stat = 'Accepted' AND project.stage3_stat = 'Accepted' AND project.stage4_stat = 'Accepted' AND project.stage5_stat = 'Accepted' AND project.stage6_stat = 'Accepted' AND project.stage7_stat = 'Accepted' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].") AND (project.s_id like concat('%','$search','%') or student.s_name like concat('%','$search','%') or project.proj_name like concat('%','$search','%') or project.proj_type like concat('%','$search','%'))
                                          LIMIT $start_from,5");
            }else if($_POST["searchbar"] == ""){
                $total_records_stage = mysqli_num_rows(mysqli_query($conn, "SELECT project.s_id, student.s_name, project.proj_name, project.".$stage_num."_stat, project.proj_type, project.proj_create_time 
                                          FROM project
                                          INNER JOIN student ON student.s_id=project.s_id
                                          WHERE project.".$stage_num."_file != '' AND project.".$stage_num."_stat != 'Rejected' AND proj_status='Active' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].") order by project.proj_create_time"));
                
                $page = $_POST["page"];
                $total_pages=ceil($total_records_stage/5);
                if($page > $total_pages){
                    $page = $total_pages;
                }
                $start_from=($page-1)*5;

                $query = mysqli_query($conn, "SELECT project.s_id, student.s_name, project.proj_name, project.".$stage_num."_stat, project.proj_type, project.proj_create_time 
                                              FROM project
                                              INNER JOIN student ON student.s_id=project.s_id
                                              WHERE project.".$stage_num."_file != '' AND project.".$stage_num."_stat != 'Rejected' AND proj_status='Active' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].") order by project.".$stage_num."_stat DESC, project.proj_create_time 
                                              LIMIT $start_from,5");
            }else{
                $search = $_POST["searchbar"];
                $total_records_stage = mysqli_num_rows(mysqli_query($conn, "SELECT project.s_id, student.s_name, project.proj_name, project.".$stage_num."_stat, project.proj_type, project.proj_create_time FROM project INNER JOIN student ON student.s_id=project.s_id WHERE project.".$stage_num."_file != '' AND project.".$stage_num."_stat != 'Rejected' AND proj_status='Active' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].") AND (project.s_id like concat('%','$search','%') or student.s_name like concat('%','$search','%') or project.proj_name like concat('%','$search','%') or project.proj_type like concat('%','$search','%') or project.".$stage_num."_stat like concat('%','$search','%')) order by project.proj_create_time"));

                $page = $_POST["page"];
                $total_pages=ceil($total_records_stage/5);
                if($page > $total_pages){
                    $page = $total_pages;
                }
                $start_from=($page-1)*5;

                $query = mysqli_query($conn, "SELECT project.s_id, student.s_name, project.proj_name, project.".$stage_num."_stat, project.proj_type, project.proj_create_time FROM project INNER JOIN student ON student.s_id=project.s_id WHERE project.".$stage_num."_file != '' AND project.".$stage_num."_stat != 'Rejected' AND proj_status='Active' AND group_id=(SELECT group_id FROM teacher WHERE t_id=".$_POST["tid"].") AND (project.s_id like concat('%','$search','%') or student.s_name like concat('%','$search','%') or project.proj_name like concat('%','$search','%') or project.proj_type like concat('%','$search','%') or project.".$stage_num."_stat like concat('%','$search','%')) order by project.proj_create_time LIMIT $start_from,5");
            }
            $output ="";
            $output .="<table class='TMtable'>
                <thead>
                    <tr style='user-select: none'>
                        <th>Sr_No.</th>
                        <th>Student ID</th>";
                        if($stage_num == "projectComplete"){
                            $output .="<th>Student GR_No.</th>";
                        }
                        $output .="<th>Student Name</th>
                        <th>Project Name</th>
                        <th>Project Type</th>
                        <th>Project Status</th>";
                        if($stage_num != "projectComplete"){
                            $output .="<th>Date Of Submission</th>
                            <th>Download/View</th>";
                        }
                        $output .="<th>Response</th>
                    </tr>
                </thead>";

                global $total_records_stage;
                if($total_records_stage >0){
                    for($j=1;$j<=$total_records_stage;$j++){
                        $arr[$j] = $j;
                    }
                    $i=0;
                    while($row=mysqli_fetch_array($query)){
                        $arr_slice=array_slice($arr,$start_from);
                        $output .="<tbody id='Tbody'>
                            <tr>
                                <td>".$arr_slice[$i]."</td>
                                <td id='s_id".$i."'>".$row["s_id"]."</td>";
                                if($stage_num == "projectComplete"){
                                    $output .="<td>".$row["s_gr"]."</td>";
                                }
                                $output .="<td>".$row["s_name"]."</td>
                                <td style='width: 10em' id='proj_name".$i."'>".$row["proj_name"]."</td>
                                <td>".$row["proj_type"]."</td>";
                                if($stage_num == "projectComplete"){
                                    $output .="<td id='proj_stat".$i."'>".$row["proj_status"]."</td>";
                                }
                                if($stage_num != "projectComplete"){
                                    $output .="<td>".$row[$stage_num."_stat"]."</td>
                                    <td>".$row["proj_create_time"]."</td>
                                    <td><div class='outer_TMDownloadBtn'><input type='button' value='Download/View' class='TMDownloadBtn' id='TMDownloadBtn".$i."' onclick='TMDownloadBtn(".$i.")'></div></td>
                                    <td>";
                                    if($row[$stage_num."_stat"] == "Submitted"){
                                        $output .="<img src='photo/Tcorrect.png' class='TMcorrect' onclick='Tcorrect(".$i.")'>";
                                    }
                                    $output .="<img src='photo/Tquit.png' class='TMquit' onclick='quiet(".$i.")'>
                                        
                                    </td>";
                                }else{
                                    $output .="<td><img src='photo/Tcorrect.png' class='projCompleted' onclick='projCompleted(".$i.")'></td>";
                                }
                            $output .="</tr>
                        </tbody>";
                        $i++;
                    }
                }else{
                    $output .="<tbody><tr><td colspan='9'>No Projects to show</td></tr></tbody>";
                }
            $output .="</table>";
            if($total_records_stage >0){
                global $total_pages;
                global $page;
                $prev_page=$page-1; 
                $output.="<div class='pagination_nums'><span class='pagination_nav_btn' style='border-left: .5px solid grey;' id='first' onclick='pageLoad(1)'>First</span>";
                $output.="<span class='pagination_nav_btn' id='prev' onclick='pageLoad($prev_page)'>Prev</span>";

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
                            $output.="<span class='pagination_link'onclick='pageLoad(".$i.")'  id='".$i."'>".$i."</span>";
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
                $output.="<span class='pagination_nav_btn' id='next' onclick='pageLoad($next_page)'>Next</span>";
                $output.="<span class='pagination_nav_btn' id='last' onclick='pageLoad($total_pages)'>Last</span></div>";
            }
            echo $output;
            mysqli_close($conn1);
        ?>
    </body>
</html>