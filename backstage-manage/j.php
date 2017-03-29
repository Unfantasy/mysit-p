<?php
  require_once '../include.php';
  $sql = "select * from jkp";
  $data = fetchAll($sql);
  // var_dump($data);
?>
<!DOCTYPE HTML>
<html>

<head>
  <title>我的后台管理</title>
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
        <h3 class="text-center my-margin-vb2">她</h3>
        <div class="bs-example4" data-example-id="contextual-table">
          <a href="j-add.php" class="btn btn-info pull-right my-margin-v1">添加照片</a>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>照片</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
                if(empty($data)){
                  echo "当前没有照片，请添加照片";
                }else{
                  foreach($data as $value){
              ?>
              <tr>
                <th><?php echo $value['id']?></th>
                <th> <img src="<?php echo $value['imgpath']?>" width="200px"> </th>
                <td class="table-operation">
                  <a href="javascript:;" onclick="deleteRow('controller/jlongDeleteController.php?id=<?php echo $value['id']?>')">删除</a>
                </td>
              </tr>
              <?php
                  }
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /#page-wrapper -->
    <script src="js/myfunction.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
