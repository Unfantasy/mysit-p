<?php
require_once '../../include.php';
function deleteImg($sql, $id) {
  $path = fetchOne('select * from '.$sql.' where id = '.$id)['imgpath'];
  $rPath = str_replace('http://jiduo.org', '', $path);
  $pPath = ROOT.$rPath;
  if (delete($sql, 'id = '.$id) && unlink($pPath)) {
    echo "<script>alert('删除成功');window.location.href='../mr-long.php';</script>";
  } else {
    echo "<script>alert('删除失败');</script>";
  }
}
 ?>
