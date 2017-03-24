<?php
	require_once('tools/connect.php');
	$id = intval($_GET['id']);
	$sql = "select * from jd_question where id=$id";
	$query = mysql_query($sql);
	if($query&&mysql_num_rows($query)){
		$question = mysql_fetch_assoc($query);
	}else{
		echo "贝壳不存在";
		exit;
	}
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>更新贝壳</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="" />
  <link rel="shortcut icon" href="images/favicon.ico">
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <!-- summernote CSS -->
  <link href="css/summernote.css" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  <link href="css/style.css" rel='stylesheet' type='text/css' />
  <!-- Graph CSS -->
  <link href="css/lines.css" rel='stylesheet' type='text/css' />
  <link href="css/font-awesome.css" rel="stylesheet">
  <!-- Nav CSS -->
  <link href="css/custom.css" rel="stylesheet">
  <!-- Metis Menu Plugin JavaScript -->
  <!-- mycss style -->
  <link rel="stylesheet" href="css/my-manage.css">
  <!-- mycss style -->
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <?php require_once('nav.php'); ?>
    <div id="page-wrapper">
      <div class="col-md-12 graphs">
        <h3 class="text-center my-margin-vb2">修改贝壳</h3>
        <form action="" class="form-horizontal" onsubmit="return false">
          <div class="form-group">
            <label class="col-sm-2 control-label">类别：</label>
						<div class="col-sm-8">
              <div class="radio-inline"><label><input type="radio" name="type" value="css">CSS</label></div>
              <div class="radio-inline"><label><input type="radio" name="type" value="js">JS</label></div>
              <div class="radio-inline"><label><input type="radio" name="type" value="other">其他</label></div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">标题：</label>
            <div class="col-sm-8">
              <input type="text" class="form-control1 question" value="<?php echo $question['question'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">内容：</label>
            <div class="col-sm-8">
              <div id="summernote" class="summernote"><?php echo $question['answer']; ?></div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 text-right">
              <button class="submit btn btn-info">确认修改</button>
            </div>
          </div>
        </form>
      </div>
    </div>
		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
    <!-- /#page-wrapper -->
		<script src="js/metisMenu.min.js"></script>
		<script src="js/custom.js"></script>
		<!-- Graph JavaScript -->
		<script src="js/d3.v3.js"></script>
		<script src="js/rickshaw.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/summernote.min.js"></script>
		<script src="js/myfunction.js"></script>
    <script>
    $('#summernote').summernote({ height: 300 });
		$('[value="<?php echo $question['type'] ?>"]').prop('checked', 'checked');
    $('.submit').on('click', function(){
      var answer = $('#summernote').summernote('code');
      var question = $('.question').val();
      var type = $('input[name="type"]:checked').val();
			var id = theRequest['id'];
      var data = { 'answer': answer, 'question': question, 'type': type, 'id': id };
      $.ajax({
        url:'controller/questionUpdateController.php',
        type: 'post',
        dataType: 'json',
        data: data,
        success: function(data) {
          // console.log('success: ', data);
          // alert('success: ' + data);
          // debugger;
          if (data.success === true) {
            alert('修改成功！');
            window.location.reload();
          } else {
            alert('错误信息：' + data.errorMsg);
            console.log(JSON.stringify(data));
          }
        },
        error: function(e) {
          console.log('error', JSON.stringify(e));
          alert('error: ' + JSON.stringify(e));
          // window.location.reload();
        }
      });
    });

    </script>
</body>

</html>
