<html>
    <head>
        <title>Create Project</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/CreateProject.css" rel="stylesheet">
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

        <!-- ////////////////////////////////////////////////////////////////////////////// Create Project-->
        <br>
        <div class="createProject">
            <header class="createProjectHeader">CREATE PROJECT</header>

            <div class="user_Name">
                <input type="text" class="text_type_name" id="user-Name" disabled>
                <label>Username</label>
            </div>

            <div class="user_ID">
                <input type="text" class="text_type_ID" id="user-ID" disabled>
                <label>UID</label>
            </div>

            <div class="Pro_Name">
                <input type="text" class="text_type_Pro_Name" id="projname" required>
                <label>Name Of The Project</label>
            </div>

            <div class="Type_Pro">
                <select class="text_type_Type_Pro" id="projtype" required>
                    <option selected style="display:none;"></option>
                    <option value="Android Development">Android Development</option>
                    <option value=".Net Programming">.Net Programming</option>
                    <option value="Java Development">Java Development</option>
                    <option value="Python">Python</option>
                    <option value="WEB DEVELOPMENT">WEB DEVELOPMENT</option>
                    <option value="WEB DEVELOPMENT">IOT</option>
                </select>
                <label>Type Of Project</label>
                <div class="dLArrow">
                    <img src="photo/down-arrow1.png" class="downArrow1">
                    <img src="photo/down-arrow2.png" class="downArrow2">
                </div>
            </div>

            <div class="Pro_Description">
                <textarea class="text_type_Pro_Description" id= "Pro-Description" maxlength="150" required></textarea>
                <label>Description Of The Project</label>
                <span id="countDes">0/150</span>
            </div>

            <div class="create_Btn">
                <input type="button" class="text_type_Create_Btn" value="CREATE" onclick="createbut()">
            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////// -->

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
    <script>
        document.getElementById("user-Name").value=localStorage.getItem("sname");
        document.getElementById("user-ID").value=localStorage.getItem("sid");
    </script>
    </body>
</html>