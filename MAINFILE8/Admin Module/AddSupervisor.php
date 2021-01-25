<html>
    <head>
        <title>Add Supervisor</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/AddTeacher.css" rel="stylesheet">
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

        <script src="js/jquery.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/RightWrongPopup1.js"></script>
        <script>
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
        $(document).ready(function(){
            ajax_call();
            if(localStorage.getItem("aname") == null)
            {
                $.post("AdminLogin.php",function(){
                    location.href="AdminLogin.php";
                });
            }
        }); 
        </script>
    </head>
    <body>
        <header class="stheader">Add & Remove Supervisor</header>
        <p class="stsubheader">Please select a Supervisor who checks the Project Details of all the Students.</p><br/>
        <div class="stremaininglist">
            <?php
                require_once 'conn.php';
                $conn1=createconn1();
                mysqli_select_db($conn1,"projectsubmission");
                $output="<p class='no_records'>No Records found to be select Supervisor</p>";
                $result=mysqli_query($conn1,"Select * from teacher where t_type='Supervisor' order by t_id ");
                $total_records=mysqli_num_rows($result);                
                if($total_records>0)
                {
                   $output=create_table($result);
                   ?>
                   <script type="text/javascript">
                        console.log($(".outer_addSupervisor").attr("style"));
                        $(document).ready(function(){
                           $(".outer_addSupervisor").hide();
                           $(".alldeletemess").text("Are you sure to Remove Supervisor.");
                           $(".outer_removeSupervisor").show();
                           $(".soneaddbtn").attr("onclick","removeSupervisorfunc()");
                        });
                   </script>
                   <?php    
                }
                else
                {
                    $result=mysqli_query($conn1,"Select * from teacher where t_type='Teacher' order by t_id ");
                    if(mysqli_num_rows($result))
                    {
                        $output=create_table($result);
                    }
                }
                function create_table($result)
                {
                    $output='<table  border="1">
                        <thead>
                            <th>Sr_no.</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email ID</th>
                            <th>Action</th>
                        </thead>';
                    $i=1;
                    while($row=mysqli_fetch_array($result)){
                        $output.='<tbody>
                            <tr>
                                <td>'.$i.'</td>
                                <td>'.$row["t_id"].'</td>
                                <td id="tname'.$i.'">'.$row["t_name"].'</td>
                                <td>'.$row["t_email"].'</d>
                                <td>
                                    <div class="outer_addSupervisor"><input type="button" value="ADD" class="addSupervisor" onclick="addSupervisor('.$i.','.$row["t_id"].')"></div>
                                    <div class="outer_removeSupervisor"><input type="button" value="REMOVE" class="removeSupervisor" onclick="removeSupervisor('.$i.','.$row["t_id"].')"></div>
                                </td>
                            </tr>
                        </tbody>'
                        ;
                        $i++;
                    }
                    $output.='</table>';
                    return $output;
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
                    
                    <div class="same_iadaase outer_soneaddbtn">
                        <input type="button" value="PROCEED" onclick="addsupervisorfunc()" class="iadaase soneaddbtn">
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