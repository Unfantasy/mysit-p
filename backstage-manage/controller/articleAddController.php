<?php
  require_once '../../include.php';
  // 返回数据初始化
  $data = array(
    'success' => false,
    'errorMsg' => ''
  );

  $title = $_POST['title'];
  $content = $_POST['content'];
  $abstract = $_POST['abstract'];
  $timeline =  time()*1000;
  $type = $_POST['type'];
  $insertid = insert('jd_article', array(
    'title' => $title,
    'content' => $content,
    'abstract' => $abstract,
    'timeline' => $timeline,
    'type' => $type
  ));
  if ($insertid) {
    $data['success'] = true;
		echo json_encode($data);
  } else {
    $data['errorMsg'] = '数据库插入失败。';
		echo json_encode($data);
  }
