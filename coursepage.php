<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/init.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/pull.js"></script>
<script src="js/login.js"></script>
<title>无标题文档</title>
<style>
	#content{
		height:900px;
	}
	table{
		margin:20px;
		border:3px solid #006699;
		letter-spacing:1px;
		line-height:20px;
	}
	td{
		width:100px;
		height:50px;
		border:1px solid #006699;
	}
</style>
</head>

<body>
	<div id="container">
		<div id="header">
			<h1>软件工程课程教学网站</h1>
			<div id="login">
				<img src="img/login.png" alt="login" />
				<?php
				error_reporting(E_ALL^E_NOTICE^E_WARNING);
				echo iconv("GB2312","UTF-8",'中文'); 
				session_start();
				if(isset($_SESSION['student_name'])){
					echo "<span>你好，".$_SESSION['student_name']."！</span><br />";
					echo "<a style=\"font-size:15px\" href=\"destroy.php\">注销</a>";
				}
				else{
					echo "<a href=\"#\" onclick=\"showFloat()\">登录</a>";
				}
				?>
				
			</div>
			<!--弹出式登录--->
 			<!--加一个半透明层--> 
    		<div id="doing" style="filter:alpha(opacity=30);-moz-opacity:0.3;opacity:0.3;background-color:#000;width:100%;height:100%;z-index:1000;position: absolute;left:0;top:0;display:none;overflow: hidden;"> 
   		 	</div>  
			<!--加一个登录层--> 
  			<div id="divLogin" style="border:solid 10px #898989;background:#fff;padding:10px;width:400px;z-index:1001;height:200px; position: absolute; display:none;top:50%; left:50%;margin:-200px 0 0 -200px;">
            	<div style="padding:3px 15px 3px 15px;text-align:left;vertical-align:middle;" >
                	<div>
                    <form action="student_login.php" method="post">
					用户名： 
                    <input type="text" style="border:1px solid #898989;height:20px;" name="student_id" />
                    <br />
                     密   码： 
                    <input type="password" style="border:1px solid #898989;height:20px;margin-left:10px;" name="student_pw"  />
					<p><input type="radio" name="actor" value="学生" checked>学生&emsp;<input type="radio" name="actor" value="老师" checked>老师&emsp;<input type="radio" name="actor" value="助教" checked>助教&emsp;&emsp;</p>
					<a href="forget_password.html">忘记密码</a>&emsp;
					<a href="change_password.html">修改密码</a>
                	</div> 
               
                	<br/> 
               		<div style="text-align:center;"> &nbsp; &nbsp; 
                   		<input type="submit" id="submit" value="登录"/>
                  		&nbsp; 
                  		<input type="button" onclick="ShowNo()" id="cancel" value="取消"/>
				  	</div> 
					</form>
            </div>
      </div>
			<div class="clr"></div>
			<div id="voidheader"></div>
			<div id="nav">
				<ul>
					<li><a href="index.php">首页</a></li>	
				    <?php 
					include("myconfig.php");
					$sql="select * from course";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{
					echo "<li><a href=\"coursepage.php?course_id={$row[course_id]}\">{$row[name]}</a></li>";
					}
					?>
					<li><a href="forumpage.php">论坛</a></li>	
				</ul>
			</div>
	    </div>
		<div id="content">
			<div id="left">
				<div id="leftnav">
				<ul>
					<li><img src="img/course.png" alt="course" style="margin:35px 0 0 40px;"/>
					<a href="coursepage.html">课程信息</a></li>
                    <li><img src="img/course.png" alt="course" style="margin:35px 0 0 40px;"/>
					<a href="introductionpage.html">教师简介</a></li>
					<li><img src="img/teacher.png" alt="course" style="margin:35px 0 0 40px;"/>
					<a href="teacherpage.html">任课教师</a>
					<?php 
					include("myconfig.php");
					$course_id=$_GET['course_id'];
					$sql="select name from course,teacher where course_id={$course_id}";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{
					echo "<a href=\"teacherpage.php?teacher_id={$row[teacher_id]}\">{$row[name]}</a></li>";
					}
					?></li>
					<li><img src="img/calendar.png" alt="course" style="margin:35px 0 0 40px;"/>
					<a href="teachingplan.html">教学日历</a></li>
                    <li><img src="img/calendar.png" alt="course" style="margin:35px 0 0 40px;"/>
					<a href="sharepage.html">共享资料</a></li>
				</ul>
				</div>
			</div>
			<div id="right">
				<table>
				<tr>
					<td rowspan="4">课程介绍</td>
					<td rowspan="2">国际背景</td>
					<td style="width:400px" rowspan="2" align="left"><span>&nbsp;&nbsp;&nbsp;本课程旨在让学生深入了解软件工程的基本方法，深入研究复杂非数值型数据对象的定义、表达及有关算法。主要内容包括各种搜索树的变种、适合合并操作的优先队列数据结构</span></td>
				</tr>
				<tr></tr>
				<tr>
					<td rowspan="2">国内背景</td>
					<td rowspan="2" align="left"><span>&nbsp;&nbsp;&nbsp;本课程旨在让学生深入了解软件工程的基本方法，深入研究复杂非数值型数据对象的定义、表达及有关算法。主要内容包括各种搜索树的变种、适合合并操作的优先队列数据结构</span></td>
				</tr>
				<tr></tr>
				<tr>
					<td rowspan="5">教学大纲</td>
					<td>周学时</td>
					<td>2-3</td>
				</tr>
				<tr>
					<td>开课学期</td>
					<td>春夏</td>
				</tr>
				<tr>
					<td style="height:100px">推荐教材</td>
					<td >XXX</td>
				</tr>
				<tr>
					<td style="height:200px">预修要求</td>
					<td >XXX</td>
				</tr>
				<tr>
					<td style="height:200px">考核方式</td>
					<td >XXX</td>
				</tr>
			    </table>
			</div>
		</div>
		<div class="clr"></div>
		<div id="footer">
			<div id="nav">
			<ul>
				<li><a href="http://www.cc98.org/">cc98</a></li>
				<li><a href="http://jwbinfosys.zju.edu.cn/">浙大教务网</a></li>
				<li><a href="http://cspo.zju.edu.cn/redir.php?catalog_id=2">计算机学院办公网</a></li>
				<li><a href="www.uml.org.cn">uml软件工程组织</a></li>
				<li><a href="http://www.rjgc.org/">软件工程网</a></li>
			</ul>
			</div>
			<div class="clr"></div>
			<span>&copy;Copyright&nbsp;&nbsp;by G05</span>
		</div>
	</div>
	</div>
</body>
</html>

