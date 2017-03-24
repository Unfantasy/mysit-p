<?php
  require_once '../../include.php';
  $path = 'http://jiduo.org/images/jcl18.jpg';
  $rPath = str_replace('http://jiduo.org', '', $path);
  $pPath = ROOT.$rPath;
  if () {
    echo "<script>alert('删除成功');window.location.href='../mr-long.php';</script>";
  } else {
    echo "<script>alert('删除失败');</script>";
  }
 ?>
