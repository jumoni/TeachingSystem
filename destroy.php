<?php
unset($_SESSION['student_name']);
echo "<script> alert('log out!');</script>";
header("Location: index.php");
?>