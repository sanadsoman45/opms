<html>
    <head>
        <title>Project List</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/ProjectList.css" rel="stylesheet">
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/ApprRejBox.css">

        <script src="js/jquery.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
        <script src="js/teacher_ajax.js"></script>
        <script>
            $(document).ready(function(){
                function ajax_call()
                {
                    var s_id=localStorage.getItem("sid");
                    var t_id=localStorage.getItem("tid");
                    var s_name=localStorage.getItem("sname");
                    var t_name=localStorage.getItem("tname");
                    $.ajax({
                        url:"Addstudent.php",
                        method:"post",
                        data:{"s_name":s_name,"t_name":t_name,"s_id":s_id,"t_id":t_id},
                        dataType:"json",
                        success:function(resp){
                            console.log("hello1")
                            console.log(resp);
                            console.log(resp["name"]);
                            if(resp["name"]=="sname")
                            {
                               console.log("sname");
                                localStorage.removeItem("sname")
                            }
                            else
                            {
                                console.log("tname")
                                localStorage.removeItem("tname")   
                            }
                          
                        }
                    });  
                }
                if(localStorage.getItem("tname") == null)
                {
                    $.post("TeacherLogin.php",function(){
                        location.href="TeacherLogin.php";
                    });
                }
            });
        </script>
    </head>
    <body>
        <header class="stheader">Student Project List</header>
        <p id="flip1">Click Here For Submitted Project</p>
        <div class="stremaininglist stremaininglist1">
            <?php
                require_once 'conn.php';
                $conn1=createconn1();
                mysqli_select_db($conn1,"projectsubmission");
                $output="<p class='no_records'>No Records Found</p>";
                $result=mysqli_query($conn1,"SELECT project.s_id, student.s_name, student.s_pn, project.proj_name, project.proj_description, project.proj_type, project.proj_create_time 
                    FROM project 
                    INNER JOIN student ON student.s_id=project.s_id 
                    WHERE project.s_id AND proj_status='Submitted' 
                    order by proj_create_time");
                $total_records=mysqli_num_rows($result);
                if($total_records>0)
                {
                    $output='<table border="1">
                        <thead>
                            <th>Sr_no.</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>User Phone Number</th>
                            <th>Project Name</th>
                            <th>Project Description</th>
                            <th>Project Type</th>
                            <th>Project Create Time</th>
                            <th>Actions</th>
                        </thead>';
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                        $output.='<tbody>
                            <tr>
                                <td>'.$i.'</td>
                                <td>'.$row["s_id"].'</td>
                                <td>'.$row["s_name"].'</td>
                                <td>'.$row["s_pn"].'</td>
                                <td id=pn'.$i.'>'.$row["proj_name"].'</td>
                                <td>'.$row["proj_description"].'</td>
                                <td>'.$row["proj_type"].'</td>
                                <td>'.$row["proj_create_time"].'</td>
                                <td class="btn btn'.$i.'">
                                    <img src="photo/Tcorrect.png" class="TMcorrect" onclick="approveProj('.$row['s_id'].','.$i.')">
                                    <img src="photo/Tquit.png" class="TMquit" onclick="rejectProj('.$row['s_id'].','.$i.')">
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
            ?>
        </div>
        <p id="flip2">Click Here For Active Project</p>
        <div class="stremaininglist stremaininglist2">
            <?php
                require_once 'conn.php';
                $conn1=createconn1();
                mysqli_select_db($conn1,"projectsubmission");
                $output="<p class='no_records'>No Records Found</p>";
                $result=mysqli_query($conn1,"SELECT project.s_id, student.s_name, student.s_pn, project.proj_name, project.proj_description, project.proj_type, project.proj_create_time 
                    FROM project 
                    INNER JOIN student ON student.s_id=project.s_id 
                    WHERE project.s_id AND proj_status='Active' 
                    order by proj_create_time");
                $total_records=mysqli_num_rows($result);
                if($total_records>0)
                {
                    $output='<table border="1">
                        <thead>
                            <th>Sr_no.</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>User Phone Number</th>
                            <th>Project Name</th>
                            <th>Project Description</th>
                            <th>Project Type</th>
                            <th>Project Create Time</th>
                            <th>Actions</th>
                        </thead>';
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                        $output.='<tbody>
                            <tr>
                                <td>'.$i.'</td>
                                <td>'.$row["s_id"].'</td>
                                <td>'.$row["s_name"].'</td>
                                <td>'.$row["s_pn"].'</td>
                                <td id=pn'.$i.'>'.$row["proj_name"].'</td>
                                <td>'.$row["proj_description"].'</td>
                                <td>'.$row["proj_type"].'</td>
                                <td>'.$row["proj_create_time"].'</td>
                                <td class="btn btn'.$i.'">
                                    <img src="photo/Tquit.png" class="TMquit" onclick="rejectProj('.$row['s_id'].','.$i.')">
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
            ?>
        </div>
        <!-- //////////////////////////////// Add Delete Edit Data //////////////////////////////////////////////-->

        <!-- ////////////////////////////////////////////////////////////////////////////////////// Conformation Box-->
            <div class="outer_addalldata">
                <div class="addalldata" style="height: 10em;">
                    <p class="alldeletemess">Are you sure to Add as a Supervisor.</p>
                    <div class="aadCancelBtn">CANCEL</div>
                    <!-- Approve -->
                    <div class="same_iadaase outer_soneaddbtn">
                        <input type="button" value="PROCEED" onclick="Approve_proj()" class="iadaase soneaddbtn">
                    </div>

                    <!-- Reject -->
                    <div class="same_iadaase outer_aoneaddbtn">
                        <input type="button" value="PROCEED"  class="iadaase aoneaddbtn">
                    </div>
                </div>
            </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////-->

        <!-- ////////////////////////////////////////////////////////////////////////////// Rejected Box -->
        <div class="outer_ApprRejBox">
            <div class="ApprRejBox">
                <p class="ARHeader"></p>
                <p class="ARQue">Are you sure to proceed?</p>
                <p class="ARResponse">If you are <label class="ARResAccep"></label>, Please write your response.</p>
                <div class="outer_ARTextarea">
                    <textarea class="ARTextarea" id="textarea-1" placeholder="Reason..."></textarea>
                </div>
                <div class="outer_ARCancelBtn">
                    <input type="button" class="ARCancelBtn" value="Cancel">
                </div>
                <div class="outer_ARProceedBtn">
                    <input type="button" class="ARProceedBtn" onclick="Reject_proj()" value="Proceed">
                </div>
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

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