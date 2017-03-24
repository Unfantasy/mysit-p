<?php
  require_once('../tools/connect.php');
  $data = array(
    'success' => false,
    'errorMsg' => ''
  );
  $id = $_GET['id'];
  $deletesql = "delete from jd_extract where id=$id";
  if(mysql_query($deletesql)){
		echo "<script>alert('删除成功');window.location.href='../extracts.php';</script>";
	}else{
		echo "<script>alert('删除失败');window.location.href='../extracts.php';</script>";
	}
?>
