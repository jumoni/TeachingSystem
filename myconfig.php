﻿<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-Type:text/html;charset=utf-8");
@mysql_connect("127.0.0.1:3366","root",'')
or die("link error");
@mysql_select_db("teaching_system")
or die("database error");
mysql_query("SET NAMES UTF8");
?>