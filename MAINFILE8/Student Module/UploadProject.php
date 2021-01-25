<html>
    <head>
        <title>Upload Project</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/UploadProject.css" rel="stylesheet">
        <link href="css/RSwal.css" rel="stylesheet" />
        <link href="css/WSwal.css" rel="stylesheet" />

        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery.js"></script>
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
                if(localStorage.getItem("sname") == null)
                {
                    $.post("StudentLogin.php",function(){
                        location.href="StudentLogin.php";
                    });
                }
            }); 
        </script>
    </head>
    <body>
        <!-- ////////////////////////////////////////////////////////////////////////////// Upload Project-->
        <?php
            require_once 'conn.php';
            $conn1=createconn1();

            mysqli_select_db($conn1,"projectsubmission");

            if(isset($_POST['btn'])){
                //storing all necessary data into the respective variables.
                $file = $_FILES['file'];
                $target_dir = "Uploads/";
                $target_file = $target_dir . basename($file["name"]);
                $stage=$_POST["stage"];
                $sid=$_POST["userid"];

                if (move_uploaded_file($file["tmp_name"], $target_file)) {
                    print_r("UPDATE project set stage".$stage."_file='$target_file',stage".$stage."_stat='Submitted' where s_id=$sid and proj_name=(SELECT proj_name  from (SELECT proj_name from project where s_id=$sid and proj_select='Selected')l)");
                    if(mysqli_query($conn1,"UPDATE project set stage".$stage."_file='$target_file',stage".$stage."_stat='Submitted' where s_id=$sid and proj_name=(SELECT proj_name  from (SELECT proj_name from project where s_id=$sid and proj_select='Selected')l)"))
                    { ?>

                        <script type="text/javascript">
                            $.post("StudentModule.php",function(){
                                location.href='StudentModule.php';
                            })
                        </script>
                    <?php }
                    else
                    { ?>
                        <script type="text/javascript">
                            wrongVal("Error","Failed To Upload File");
                        </script>
                    <?php }
                }
                else
                {
                    ?>
                        <script type="text/javascript">
                            wrongVal("Error","Move Failed");
                        </script>
                    <?php
                }
                
                
            }
        ?>
        <script>
            function setvalue()
            {
                if($(".fileUploadPro").val() == "" && localStorage.getItem("Stage") != "project"){
                    wrongVal("Sorry!","Choose File First");
                }else{
                    $(".uploadBtn").removeAttr("type");
                    var stage=localStorage.getItem("id");
                    var stud_id=localStorage.getItem("s_id");
                    $("#userid").val(stud_id);
                    $("#stage").val(stage);
                }
            }
        </script>
        <form action="UploadProject.php" method="POST" enctype="multipart/form-data" novalidate="">

            <div class="MainUploadProject">
                <input id="userid" type="hidden" name="userid"/>
                <input id="stage" type="hidden" name="stage"/>
                <header class="stage"></header>
                <div class="uPHeader"></div>

                <div class="Format">
                    <select class="text_type_Format" required>
                        <option selected style="display:none;"></option>
                        <option value="pdf">PDF File</option>
                    </select>
                    <label>Format (Upload as *)</label>
                    <div class="FArrow">
                        <img src="photo/down-arrow1.png" class="FArrow1">
                        <img src="photo/down-arrow2.png" class="FArrow2">
                    </div>
                </div>

                <div class="uploadPro">
                    <div class="clickForUpload">
                        <input type="file" class="fileUploadPro" name ="file" id="file" accept=".pdf" title="" disabled>
                        <div class="foldPage"></div>
                        <div class="chooseFiles">CHOOSE FILES</div>
                        <div class="uploadLine"></div>
                        <img src="photo/down-arrow1.png" class="uploadArrow">
                    </div>
                    <div class="dropFile">Drop Your File Here</div>
                    <p class="dFileName"></p>
                </div>

                <div class="outer_downloadzipfile">
                    <img src="photo/viewProjDownload.png" class="downloadzipfile">
                </div>

                <div class="cancel">
                    <input type="button" class="btnCancel" onclick="cancel()" value="CANCEL">
                </div>

                <div class="uploadButton">
                    <button name="btn" type="button" class="uploadBtn" onclick="setvalue()">UPLOAD</button>
                </div>
            </div>
        </form>
        <!-- /////////////////////////////////////////////////////////////////////////////////// RIGHT WRONG POPUP-->
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
        <!-- /////////////////////////////////////////////////////////////////////////////////// -->  
        <script type="text/javascript">
            $(".outer_downloadzipfile").click(function(){
                $.ajax({
                    url:"ajax_call_function.php",
                    type:"POST",
                    dataType:"json",
                    data:{"func":"downloadStageFile", "sid":localStorage.getItem("sid"), "stage":"final"},
                    success:function(resp){
                        if(resp["dlfile"] != null){
                            location.href = resp["dlfile"];
                        }else{
                            $(".outer_viewProDownload").hide();
                            wrongVal("Error!","File Not Uploaded");
                        }
                    }
                });
            });
        </script>
    </body>
</html>