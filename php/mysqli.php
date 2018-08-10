<?php
	header('Access-Control-Allow-Origin:*');
	header("Content-type: text/html; charset=utf-8");
	define("HOST",'localhost');
	define("USER",'root');
	define("PWD",'root');
	define("DBNAME",'onecms');
	$con=new mysqli(HOST,USER,PWD,DBNAME);
	if($con->connect_errno){
	    die('数据库链接出错'.$con->connect_error);
	}
?>