<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/init.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include("myconfig.php");
$news_id=$_GET["news_id"];
$sql="select * from news where news_id='$news_id'";
$r=mysql_query($sql);
$att=mysql_fetch_array($r);
?>
<h3>修改数据</h3>
<div id="edit">
<form action="update_news.php" method="post">
		<label>公告标题</label>
        <input type="text" name="newstitle" value="<?php echo $att['title'] ?>" />
        <label>内容</label>
        <textarea rows="10" class="newscontent"><?php echo $att['content'] ?></textarea>
		<div class="clr"></div>   
        <input type="submit" class="submit" src="" value="提交">   
</form>
</div>
</body>
</html>

