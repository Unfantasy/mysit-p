<?php // php连接数据库
	require_once('mysql.config.php');

	if(!($con = mysql_connect(HOST, USERNAME, PASSWORD))){
		echo mysql_error();
	}

	if(!mysql_select_db(MYDATABASE)){
		echo mysql_error();
	}

	if(!mysql_query('set names utf8')){
		echo mysql_error();
	}
?>
