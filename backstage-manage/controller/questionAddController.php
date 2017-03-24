<?php
  require_once('../tools/connect.php');
  $data = array(
    'success' => false,
    'errorMsg' => ''
  );
  // echo $_POST['answer'];
	//把传递过来的信息入库,在入库之前对所有的信息进行校验。
	if( empty($_POST['answer']) || empty($_POST['question']) ){
    $data['errorMsg'] = '所填内容不能为空。';
    echo json_encode($data);
    return false;
	}
	$answer = $_POST['answer'];
  $answer = str_replace("'", "\'", $answer);
  $question = $_POST['question'];
  $question = str_replace("'", "\'", $question);
	$type = empty($_POST['type']) ? 'other' : $_POST['type'];
	$dateline =  time()*1000;
	$insertsql = "insert into jd_question(answer, question, type, dateline) values('$answer', '$question', '$type', $dateline)";
  // $data['insertsql'] = $insertsql;
  // echo json_encode($data);
  // return false;
	if(mysql_query($insertsql)){
    $data['success'] = true;
		echo json_encode($data);
	}else{
    $data['errorMsg'] = '数据库插入失败。';
		echo json_encode($data);
	}
?>
