<?php
  require_once '../../include.php';
  // 返回数据初始化
  $data = array(
    'success' => false,
    'errorMsg' => ''
  );

  //把传递过来的信息入库,在入库之前对所有的信息进行校验。
	if( empty($_POST['title']) || empty($_POST['content']) ){
    $data['errorMsg'] = '所填内容不能为空。';
    echo json_encode($data);
    return false;
	}
  $id = $_POST['id'];
  $title = $_POST['title'];
  $content = $_POST['content'];
  $abstract = $_POST['abstract'];
  $timeline =  time()*1000;
  $type = $_POST['type'] | 'other';
  $updatesql = "update jd_article set title='$title',content='$content',abstract='$abstract',type='$type',timeline=$timeline where id=$id";
  if(mysql_query($updatesql)){
    $data['success'] = true;
    echo json_encode($data);
  }else{
    $data['errorMsg'] = '数据库更新失败。';
    echo json_encode($data);
  }
