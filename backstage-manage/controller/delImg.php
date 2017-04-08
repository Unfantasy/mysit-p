<?php
require_once '../../include.php';
function deleteImg($sql, $id, $page) {
  $path = fetchOne('select * from '.$sql.' where id = '.$id)['imgpath'];
  $rPath = str_replace('http://jiduo.org', '', $path);
  $pPath = ROOT.$rPath;
  if (delete($sql, 'id = '.$id) && unlink($pPath)) {
    echo "<script>alert('删除成功');window.location.href='../$page';</script>";
  } else {
    echo "<script>alert('删除失败');window.location.href='../$page';</script>";
  }
}
 ?>
