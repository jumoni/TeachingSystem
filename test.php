<?php
@mysql_connect("127.0.0.1:3366","root",'')
or die("link error");
@mysql_select_db("teaching_system")
or die("database error");
$student_id = $_POST["student_id"];
$student_pw = $_POST["student_pw"];
if($student_id==""||$student_pw=="")   echo "<script> alert ('not complete');</script>"; 
$query = @mysql_query("select * from student where student_id='$student_id'")
or die("execute error");
if($row = mysql_fetch_array($query)) {        
	  header("Location: index.html");
	  }
else
	echo "<script> alert('failed');</script>";
?>