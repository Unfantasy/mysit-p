<?php
require_once '../../include.php';
// 返回数据初始化
$data = array(
  'success' => false,
  'errorMsg' => ''
);

$id = $_GET['id'];
if (delete('jd_article', "id=$id")) {
  echo "<script>alert('删除成功');window.location.href='../articles.php';</script>";
} else {
  echo "<script>alert('删除失败');</script>";
}
