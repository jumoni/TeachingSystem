<?php
include("myconfig.php");
$student_id = $_POST["student_id"];
$student_pw = $_POST["student_pw"];
if($student_id==""||$student_pw=="")   echo "<script> alert ('not complete');</script>"; 
$query = @mysql_query("select * from student where student_id='$student_id'")
or die("execute error");
if($row = mysql_fetch_array($query)) {        
	  $result=mysql_query("SELECT name FROM student where student_id='$student_id'");
      if($row=mysql_fetch_array($result)){
	  	$_SESSION['student_name']=$row['name'];
	   }    
      echo "<script> alert('successful');</script>";
	 
}
else
	echo "<script> alert('failed');</script>"; 
echo "<script>window.location.href=\"index.php\"</script>";  
?>
