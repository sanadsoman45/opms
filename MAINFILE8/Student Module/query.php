<?php
require_once 'conn.php';
$conn1=createconn1();
mysqli_select_db($conn1,"projectsubmission");
$id="<script>document.write(localStorage.getItem('sid'))</script>";
$query=mysqli_query($conn1,"SELECT proj_name from project where s_id=$id");
?>