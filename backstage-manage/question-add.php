<!DOCTYPE HTML>
<html>

<head>
  <title>添加贝壳</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
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
  <!-- jQuery -->
  <script src="js/jquery.min.js"></script>
  <!----webfonts--->
  <!-- <link href='http://fonts.useso.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'> -->
  <!---//webfonts--->
  <!-- Nav CSS -->
  <link href="css/custom.css" rel="stylesheet">
  <!-- Metis Menu Plugin JavaScript -->
  <!-- mycss style -->
  <link rel="stylesheet" href="css/my-manage.css">
  <!-- mycss style -->
  <script src="js/metisMenu.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- Graph JavaScript -->
  <script src="js/d3.v3.js"></script>
  <script src="js/rickshaw.js"></script>
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    <?php require_once('nav.php'); ?>
    <div id="page-wrapper">
      <div class="col-md-12 graphs">
        <h3 class="text-center my-margin-vb2">添加贝壳</h3>
        <form class="form-horizontal" onsubmit="return false">
          <div class="form-group">
            <label class="col-sm-2 control-label">类别：</label>
            <div class="col-sm-8">
              <div class="radio-inline"><label><input type="radio" name="type" value="css">CSS</label></div>
              <div class="radio-inline"><label><input type="radio" name="type" value="js">JS</label></div>
              <div class="radio-inline"><label><input type="radio" checked name="type" value="other">其他</label></div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">标题：</label>
            <div class="col-sm-8">
              <input type="text" name="question" class="question form-control1">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">内容：</label>
            <div class="col-sm-8">
              <div id="summernote" class="summernote"></div>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-10 text-right">
              <button class="submit btn btn-info">确认添加</button>
            </div>
          </div>
        </form>



      </div>
    </div>
    <!-- /#page-wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/summernote.min.js"></script>
    <script>
    $('#summernote').summernote({ height: 300 });
    $('.submit').on('click', function(){
      var answer = $('#summernote').summernote('code');
      var question = $('.question').val();
      var type = $('input[name="type"]:checked').val();
      if () {
        alert('问题或回答为空。');
        return;
      }
      var data = { 'answer': answer, 'question': question, 'type': type };
      // console.log(JSON.stringify(data));
      $.ajax({
        url:'controller/questionAddController.php',
        type: 'post',
        dataType: 'json',
        data: data,
        success: function(data) {
          // console.log('success: ', data);
          // alert('success: ' + data);
          // debugger;
          if (data.success === true) {
            alert('添加成功！');
            window.location.href = 'questions.php';
          } else {
            alert('错误信息：' + data.errorMsg);
            console.log(JSON.stringify(data));
          }
        },
        error: function(e) {
          console.log('error', e);
          if(e.readyState == 4) {
            $('body').prepend(e.responseText);
          } else {
            alert('服务器返回异常');
          }
          // window.location.reload();
        }
      });
    });
    </script>
</body>

</html>
