<?php
  require_once('../tools/connect.php');
  $data = array(
    'success' => false,
    'errorMsg' => ''
  );
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	if( empty($_POST['answer']) || empty($_POST['question']) ){
    $data['errorMsg'] = '所填内容不能为空。';
    echo json_encode($data);
    return false;
	}
  $id = $_POST['id'];
	$answer = $_POST['answer'];
  $question = $_POST['question'];
	$type = empty($_POST['type']) ? 'other' : $_POST['type'];
	$dateline =  time() * 1000;
	$updatesql = "update jd_question set answer='$answer',question='$question',type='$type',dateline=$dateline where id=$id";
  // $data['updatesql'] = $updatesql;
  // echo json_encode($data);
  // return false;
	if(mysql_query($updatesql)){
    $data['success'] = true;
		echo json_encode($data);
	}else{
    $data['errorMsg'] = '数据库更新失败。';
		echo json_encode($data);
	}
?>
