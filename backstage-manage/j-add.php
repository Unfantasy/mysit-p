<!DOCTYPE HTML>
<html>

<head>
  <title>添加照片</title>
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
        <h3 class="text-center my-margin-vb2">添加照片</h3>
        <form class="form-horizontal" onsubmit="return false">
          <div class="form-group">
            <label class="col-sm-2 control-label">选择照片：</label>
            <div class="col-sm-8">
              <input type="file" name="pictures[]" multiple="true">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">描述：</label>
            <div class="col-sm-8">
              <input type="text" name="decription" class="form-control1">
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
    <script>
    $(':file').change(function() {
      var form = $('form')[0];
      for (var i = 0; i < this.files.length; i++) {
        var file = this.files[i];
        if (file.type.indexOf('image') === -1) {
          alert('你上传的文件中有非图片的文件，请重新上传！');
          //清空
          form.reset();
          return false;
        }
      }
      // var file = this.files[0];
      // name = file.name;
      // size = file.size;
      // type = file.type;
      //your validation
    });
    $('.submit').on('click', function(){
      var formData = new FormData($('form')[0]);
      $.ajax({
        url:'controller/jAddController.php',
        type: 'post',
        dataType: 'json',
        data: formData,
        //Options to tell JQuery not to process data or worry about content-type
        cache: false,
        contentType: false,
        processData: false,
        xhr: function() { // custom xhr
          myXhr = $.ajaxSettings.xhr();
          if (myXhr.upload) { // check if upload property exists
            myXhr.upload.addEventListener('progress', progressHandlingFunction, false); // for handling the progress of the upload
          }
          return myXhr;
        },
        success: function(data) {
          // console.log('success: ', data);
          // alert('success: ' + data);
          // debugger;
          if (data.success === true) {
            alert('添加成功！');
            window.location.href = 'j.php';
          } else {
            alert('错误信息：' + data.errorMsg);
            console.log(JSON.stringify(data));
          }
        },
        error: function(e) {
          console.log('error：', JSON.stringify(e));
          if(e.readyState == 4) {
            $('body').prepend(e.responseText);
          } else {
            alert('服务器返回异常');
          }
        }
      });
    });

    function progressHandlingFunction(e) {
      if (e.lengthComputable) {
        $('progress').attr({
          value: e.loaded,
          max: e.total
        });
      }
    }
    </script>
</body>

</html>
