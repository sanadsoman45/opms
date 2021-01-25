<?php
    require_once 'conn.php';
?>

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
        <link href="css/RSwal2.css" rel="stylesheet" />
        <link href="css/WSwal2.css" rel="stylesheet" />
        <link href="css/WSSwal2.css" rel="stylesheet" />

        <script src="js/jquery.js"></script>
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/UserSetting.js"></script>
        <script src="js/RightWrongPopup1.js"></script>

        <script>
            

            $(document).ready(function(){
                if(localStorage.getItem("aname") == null)
                {
                    $.post("AdminLogin.php",function(){
                        location.href="AdminLogin.php";
                    });
                }
                localStorage.setItem("setstheader", "admin");
                if(localStorage.getItem("atype") != "root"){
                    $("ul .passive1").remove();
                    $(".passive2").addClass("active");
                    $("#actiStat").attr("activeState","teacher");
                    $(".tablename").text("Teacher Details Table");
                }
            });
        </script>
    </head>

    <body>
    <div class="wrapper" style="z-index: 1;">
        <div class="sidebar" data-color="persianblue"> <!--Tip : You can change the color of the sidebar using: data-color="red | green | orange | red | yellow"-->
            <div class="logo">
                <a href="#" class="simple-text logo-normal">Operations</a>
            </div>

            <div class="sidebar-wrapper" id="sidebar-wrapper">
                <ul class="nav" id="actiStat" activeState="admin">
                    <li class="passive1 active" onclick="passive1()">
                        <a>
                            <i class="fa fa-user"></i>
                            <div>Admin Details</div>
                        </a>
                    </li>
                    <li class="passive2" onclick="passive2()">
                        <a>
                            <i class="now-ui-icons users_single-02"></i>
                            <div>Teacher Details</div>
                        </a>
                    </li>
                    <li class="passive3" onclick="passive3()">
                        <a>
                            <i class="fa fa-users"></i>
                            <div>Student Details</div>
                        </a>
                    </li>
                   
                    <li class="passive6" onclick="passive6()">
                        <a>
                            <i class="fa fa-calendar"></i>
                            <p>Project Date</p>
                        </a>
                    </li>
                    <li class="passive5" onclick="signout()">
                        <a href="#">
                            <i class="fas fa-sign-out-alt"></i>
                            <p>Sign Out</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">Project Management System</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link o_navlinkusc" href="#pablo">
                                    <i class="fas fa-user-circle fa-3x navlinkusc outer_navlinkusc"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="panel-header panel-header-lg">
                <form id="search-opt">
                    <div id="search-opt-flex">
                        <div class="input-group no-border searchbar">
                            <input type="text" value="" class="form-control" id="search-control" placeholder="Search...">
                        </div> &nbsp;&nbsp;&nbsp;&nbsp;
                        <ul class="navbar-nav dropdownbar" id="operation-drop">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-plus-square fa-2x"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" id="options-fac">
                                    <a class="dropdown-item addIndiData" href="#">Add</a>
                                    <a class="dropdown-item deleteData" href="#">All Delete</a>
                                    <a class="dropdown-item alladd" id="AllAdd" href="#">All Add</a>
                                    <a class="dropdown-item arSupervisor" href="#">Add & Remove Supervisor</a>
                                </div>      
                            </li>
                        </ul>
                    </div>
                    <div id="search-opt-column" class="dropdownbar2">
                        <p>Showing</p>
                        <select id="page_num_drop" class="dropdown-list">
                            <option value="5" selected>5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>                           
                        </select>​
                        <p>Entries</p>
                    </div>
                </form>
            </div>

                <div class="content allContent">
                    <div class="row">
                        <div class="col-md-6" id="table-dash" class="text-center">
                            <div class="card card1">
                                <div class="card-header">
                                    <h5 class="card-category">All Persons List</h5>
                                    <h4 class="card-title tablename">Admin Details Table</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive" id="admin_table_onload"></div>
                                </div>
                            </div>
                            
                            <div class="outer_date card card3">
                                <p class="reportsComplaints" style="margin-left: 10px;margin-right: 10px;">Select Project Starting & Ending Date</p>
                                <div>
                                    <p class="startDateName">Select Starting Date</p>
                                    <input type="date" id="startDate" class="date" value="<?php date_default_timezone_set('ASIA/KOLKATA'); echo date("Y-m-d");?>">
                                </div>
                                <div>
                                    <p class="endDateName">Select Ending Date</p>
                                    <input type="date" id="endDate" class="date" value="<?php date_default_timezone_set('ASIA/KOLKATA'); echo date("Y-m-d");?>">
                                </div>
                                <div class="outer_setDate">
                                    <input type="button" value="CONFORM" class="setDate" onclick="setDate()">
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
          </div>
      </div>

        <!--   Core JS Files   -->
        <script src="../Admin Module/assets/js/core/jquery.min.js"></script>
        <script src="../Admin Module/assets/js/core/popper.min.js"></script>
        <script src="../Admin Module/assets/js/core/bootstrap.min.js"></script>
        <script src="../Admin Module/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="../Admin Module/assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  

    <!-- //////////////////////////////// Add Delete Edit Data //////////////////////////////////////////////-->

        <div class="outer_addalldata">
            <div class="addalldata">
                <p class="alldeletemess">Are you sure to Insert all the data of Students.</p>
                <div class="aadCancelBtn">CANCEL</div>

                <!-- Student -->
                    <div class="same_iadaase outer_saddalldatabtn">
                        <input type="button" value="PROCEED" class="iadaase saddalldatabtn" onclick="taddalldatabtn()">
                    </div>
                    <div class="same_iadaase outer_sdeletealldatabtn">
                        <input type="button" value="PROCEED" class="iadaase sdeletealldatabtn" onclick="tdeletealldatabtn()">
                    </div>
                    <div class="same_iadaase outer_sonedeletebtn">
                        <input type="button" value="PROCEED" class="iadaase sonedeletebtn" onclick="aonedeletebtn()">
                    </div>
                    <div class="same_iadaase outer_seditconformbtn">
                        <input type="button" value="PROCEED" class="iadaase seditconformbtn" onclick="aeditconformbtn()">
                    </div>
                    <div class="same_iadaase outer_ssendemailbtn">
                        <input type="button" value="PROCEED" class="iadaase ssendemailbtn">
                    </div>

                    <!-- Teacher -->
                    <div class="same_iadaase outer_taddalldatabtn">
                        <input type="button" value="PROCEED" class="iadaase taddalldatabtn" onclick="taddalldatabtn()">
                    </div>
                    <div class="same_iadaase outer_tdeletealldatabtn">
                        <input type="button" value="PROCEED" class="iadaase tdeletealldatabtn" onclick="tdeletealldatabtn()">
                    </div>
                    <div class="same_iadaase outer_tonedeletebtn">
                        <input type="button" value="PROCEED" class="iadaase tonedeletebtn" onclick="aonedeletebtn()">
                    </div>
                    <div class="same_iadaase outer_teditconformbtn">
                        <input type="button" value="PROCEED" class="iadaase teditconformbtn" onclick="aeditconformbtn()">
                    </div>
                    <div class="same_iadaase outer_tsendemailbtn">
                        <input type="button" value="PROCEED" class="iadaase tsendemailbtn">
                    </div>

                    <!-- Admin -->
                    <div class="same_iadaase outer_adeletealldatabtn">
                        <input type="button" value="PROCEED" class="iadaase adeletealldatabtn" onclick="adeletealldatabtn()">
                    </div>
                    <div class="same_iadaase outer_aonedeletebtn">
                        <input type="button" value="PROCEED" class="iadaase aonedeletebtn" onclick="aonedeletebtn()">
                    </div>
                    <div class="same_iadaase outer_aeditconformbtn">
                        <input type="button" value="PROCEED" class="iadaase aeditconformbtn" onclick="aeditconformbtn()">
                    </div>
                    <div class="same_iadaase outer_asendemailbtn">
                        <input type="button" value="PROCEED" class="iadaase asendemailbtn" onclick="atssendemail()">
                    </div>
            </div>
        </div>

        <!-- ///////////////////////////////////// Supervisor Message /////////////////////////////////////////-->
        <div class="outer-fPNote">
            <div class="fPNote">
                <p class="noteMessage">Hey Admin, Assign a Supervisor before Deleting the current Supervisor.</p>
                <div class="gotItNote">OK, I Got it</div>
            </div>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////-->
        
        <!-- ///////////////////////////////////// User Setting /////////////////////////////////////////-->

        <div class="set-outer-block" id="set_outer_block">
            <div class="userSetting">
                
                <div class="userImage1">
                    <img class="uImage1" src="photo/male.png" alt="User Image">
                </div>

                <div class="userName" id="username">
                    Username
                </div>

                <div class="outer-details">
                    <div class="details">
                        <div class="d1 d11"></div>
                        <div class="d2"></div>
                        <div class="d1"></div>
                        <div class="d2"></div>
                        <div class="d1"></div>
                        <div class="d2"></div>
                    </div>
                    <div class="DetailsName">
                        Details
                    </div>
                </div>

                <div class="outer-UpdateAccName" onclick="accountSetting()">
                    <div>
                        <img class="settingIcon" src="photo/settings-icon.png" alt="settings icon">
                    </div>
                    <div class="UpdateAcc">
                        Manage & Update Your Account
                    </div>
                </div>

               <!--  <div class="logout">
                    <input type="button" name="logout" class="logoutBut" value="LOGOUT" id="log_out1" onclick='logout("stud")' />
                </div> -->
            </div>
        </div>

        <!-- ////////////////////////////////////// Details ////////////////////////////////////////-->

        <div class="outer-DetailsBox" id="outer_DetailsBox">
            <div class="main-DetailsBox">
                <header class="detailsHeader">Details</header>
                <img src="photo/DialogBoxClose.png" class="closeDetails">
                <div class="userNameDetail">
                    <div class="setUserName" id="setUserName"></div>
                </div>

                <div class="userIdDetail">
                    <div class="setuserId" id="setuserId"></div>
                </div>

                <div class="grNumDetail">
                    <div class="setGrNum" id="setGrNum"></div>
                </div>

                <div class="emailIdDetail">
                    <div class="setEmailId" id="setEmailId"></div>
                </div>

                <div class="numberDetail">
                    <div class="setNumber" id="setNumber"></div>
                </div>
            </div>
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

        <div id="wsaitingState" class="wsmodal">
            <div class="wsmodal-content">
                
                <img src="css/sand-clock.png" class="sandclock">
                <div class="wscircle-loader">
                </div>

                <p class="wstitle-text">Sorry!</p>
                <p class="wsinfo-text">Waiting For Email</p>

            </div>
        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////////////// -->

        <script src="js/admin_ajax.js"></script>
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
                      setInterval(ajax_call,120000); 
                    }
                });  
            }
            $(document).ready(function(){
                ajax_call();
            })
            $("#actiStat").on("click",function(){
                if($("#actiStat").attr("activeState")=="student")
                {
                    console.log("hello2");
                    $("#AllAdd").hide();
                }    
            })
            
            /*getting initially selected value of dropdown*/
            /////////////////////////////////////////////////////////////////
            $(document).ready(function(){
                console.log("value is"+document.getElementById("page_num_drop").value)
                load_data(1,document.getElementById("page_num_drop").value,$("#actiStat").attr("activeState"));
            });
            /*getting value of dropdown onchange event*/
            document.getElementById("page_num_drop").addEventListener("change",function(){
                var drop_value=document.getElementById("page_num_drop").value;
                console.log(drop_value);
                if($("#search-control").val!=""){
                    keyup_event(drop_value,1,$("#actiStat").attr("activeState"));
                }else{
                    send_page_no(drop_value,$("#actiStat").attr("activeState"));
                }
            });
            //////////////////////////////////////////
            $(document).on('click',".pagination_link",function(){
                var page=$(this).attr("id");
                var drop_value=document.getElementById("page_num_drop").value;
                console.log(drop_value);
                console.log(page)
                if($("#search-control").val!="")
                {
                    keyup_event(drop_value,page,$("#actiStat").attr("activeState"));
                }
                else
                {
                    load_data(page,drop_value,$("#actiStat").attr("activeState"));
                }
            });
            ////////////////////////////////////prev and next///////////////////////////
            console.log("before click")
            $("#next").on("click",function(){
                var page=$(".pagination_link").attr("id");
                var drop_value=document.getElementById("page_num_drop").value;
                console.log(drop_value);
                console.log(page);
            });
            ////////////////////////////////////////////////////////////////////////////
            function keyup_event(dropdown_val,page_no)
            {
                var query=$("#search-control").val();
                $.ajax({
                    url:"pagination.php",
                    method:"post",
                    data:{"query":query,"num_records":dropdown_val,"page":page_no,"source":$("#actiStat").attr("activeState")},
                    success:function(resp){
                      $("#admin_table_onload").html(resp);
                    }
                });  
            }
            /*script for live search*/
            $(document).ready(function(){
                console.log($("#page_num_drop").val())
                $("#search-control").keyup(function(){
                    keyup_event($("#page_num_drop").val(),1,$("#actiStat").attr("activeState"));
                });
            });
            /////////////////
            document.getElementById("username").innerHTML=localStorage.getItem("aname");
            document.getElementById("setuserId").innerHTML=localStorage.getItem("aid");
            document.getElementById("setUserName").innerHTML=localStorage.getItem("aname");
            document.getElementById("setGrNum").innerHTML=localStorage.getItem("atype");
            document.getElementById("setEmailId").innerHTML=localStorage.getItem("aemail");
            document.getElementById("setNumber").innerHTML=localStorage.getItem("apn");
        </script>
    </body>
</html>