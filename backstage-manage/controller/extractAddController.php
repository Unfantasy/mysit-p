<?php
  require_once('../tools/connect.php');
  $data = array(
    'success' => false,
    'errorMsg' => ''
  );
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	if(empty($_POST['content'])){
    $data['errorMsg'] = '所填内容不能为空。';
    echo json_encode($data);
    return false;
	}
	$content = $_POST['content'];
	$dateline =  !empty($_POST['dateline']) ? $_POST['dateline'] : time()*1000;
	$insertsql = "insert into jd_extract(content, dateline) values('$content', $dateline)";
	if(mysql_query($insertsql)){
    $data['success'] = true;
		echo json_encode($data);
	}else{
    $data['errorMsg'] = '数据库插入失败。';
		echo json_encode($data);
	}
?>
