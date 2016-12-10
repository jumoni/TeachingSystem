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
	height:auto;
	background-color:#FFFFFF;
}
#right{
	width:410px;
}
#search td{
	padding:0;
	border-top: 2px solid #006699;
	border-bottom: 2px solid #006699;
}
span{
	color:#FFFF66;
}
table{
	margin:10px;
	padding:30px;
}
td{
	border:none;
	width:400px;
	height:35px;
}
.mes{
 border:solid 1px;overflow:hidden;
}
.mes h5{
 border:solid 1px;border-width:0 0 1px;
 padding:0;margin:0;height:28px;
 line-height:30px;cursor:pointer;
 background:#eee;
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
					echo "<li><a href=\"coursepage.php\">{$row[name]}</a></li>";
					}
					?>
					<li><a href="forumpage.php">论坛</a></li>	
				</ul>
			</div>
	    </div>
		<div id="content">
			<div id="news">
				<h3>公告</h3>
				<table>
					<tr>
						<th>标题</th>
						<th>日期</th>
					</tr>
					<?php 
					include("myconfig.php");
					$sql="select * from news";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{
					echo "<tr>
						<td><a href=\"\">{$row[title]}</a></td>
						<td>{$row[date]}</td>
						<td><a href='updateNews.php?news_id={$row[news_id]}'><input type=\"button\" value=\"修改\"/></a></td>
						<td><a href='delete_news.php?news_id={$row[news_id]}'><input type=\"button\" value=\"删除\"/></a></td>
					</tr>";
					}
					?>
				</table>
				<a href='addNews.html' style="float:right"><input type="button" value="添加"/></a>
			</div>
			<div id="right">
			<div id="search">
				<form action="search.php" method="post">
				<table width="400px" height="25px">
				<tr>
					<td style="border-left:2px solid #006699" bgcolor="white"><img src="img/search.png" alt="search" style="margin:0 3px"/></td>
					<td><input type="text" class="text" placeholder="" name="keyword"></td>
					<td bgcolor="#006699"><input type="submit" class="submit" src="" value="search" onClick="submit()"></td>	
				</tr>
				</table>
				</form>
			</div>
			<div id="board">
				<h3>留言板</h3>
				<table>
				<?php 
					include("myconfig.php");
					$sql="select * from message";
					$result=mysql_query($sql);
					while($row=mysql_fetch_assoc($result))
					{
					echo "<tr>
							<td id='bar' onclick=\"menuclick(submenu,bar );\">
    						<strong>留言{$row[message_id]}</strong></td>
							<td><a href='delete_message.php?message_id={$row[message_id]}'><input type=\"button\" value=\"删除\"/></a></td>
							</td>
					      </tr>
  						  <tr id=\"submenu\" style=\"display:none;\">
    						<td>
   			 				<p style=\"float:left\">{$row[content]}</p>
							<p style=\"float:right\">{$row[date]}</p>
    						</td>
  						  </tr>";
					}
				?>
			</table>
			<a href='addMessage.html' style="float:right"><input type="button" value="我要留言"/></a>
			</div>
			</div>
		</div>
		<div class="clr"></div>
		<div id="footer">
			<div id="nav">
			<ul>
				<li><a href="http://www.cc98.org/">cc98</a></li>
				<li><a href="http://jwbinfosys.zju.edu.cn/">浙大教务网</a></li>
				<li><a href="http://cspo.zju.edu.cn/redir.php?catalog_id=2">计算机学院办公网</a></li>
				<li><a href="http://www.uml.org.cn">uml软件工程组织</a></li>
				<li><a href="http://www.rjgc.org/">软件工程网</a></li>
			</ul>
			</div>
			<div class="clr"></div>
			<span>&copy;Copyright&nbsp;&nbsp;by G05</span>
		</div>
	</div>
</body>
</html>
