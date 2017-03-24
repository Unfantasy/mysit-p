<?php
  require_once('backstage-manage/tools/connect.php');
  $sql = "select * from jd_question";
  $query = mysql_query($sql);
  while($row = mysql_fetch_assoc($query)){
    switch ($row['type']) {
      case 'css':
        $datacss[] = $row;
        break;
      case 'js':
        $datajs[] = $row;
        break;
      default:
        $dataother[] = $row;
    }
	}
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link rel="shotcut icon" href="images/favicon.ico" />
  <title>贝壳</title>
  <link rel="stylesheet" href="css/j-standard.css" />
  <link rel="stylesheet" href="css/index.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/j-function.js"></script>
</head>

<body>
  <canvas id="cas"></canvas>
  <!-- background -->
  <!--<audio src="music/陈奕迅%20-%20浮夸.mp3" autoplay loop preload="metadata"></audio>-->
  <!-- <nav>
    <div class="container-fluid content">
        <div class="navbar-header">
            <div class="navbar-brand">
                <img src="" alt=""/>
            </div>
            <div class="pull-right">
                <button class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
            </div>
        </div>
        <div class="navbar-collapse collapse pull-right" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="jd.html">自嘲</a></li>
                <li><a href="#">往事</a></li>
                <li class="active">
                    <a href="#">贝壳</a>
                </li>
                <li>
                    <a href="jd_extract.html">摘录</a>
                </li>
            </ul>
        </div>
    </div>
</nav> -->
  <article>
    <div class="content_box content">
      <h2>CSS</h2>
      <?php
        if(empty($datacss)){
          echo "当前没有贝壳，请添加贝壳";
        }else{
          foreach($datacss as $value){
      ?>
      <div class="qw_content">
        <div class="question">
          <h4><?php echo $value['question'] ?></h4>
        </div>
        <div class="answer">
          <?php echo $value['answer'] ?>
          <p class="text-right lt margin-1">创建时间：
            <script type="text/javascript">
              document.write(new Date(<?php echo $value['dateline'] ?>).format('yyyy/MM/dd h:m'));
            </script>
          </p>
        </div>
      </div>
      <?php
          }
        }
      ?>
      <h2>JS</h2>
      <?php
        if(empty($datajs)){
          echo "当前没有贝壳，请添加贝壳";
        }else{
          foreach($datajs as $value){
      ?>
      <div class="qw_content">
        <div class="question">
          <h4><?php echo $value['question'] ?></h4>
        </div>
        <div class="answer">
          <?php echo $value['answer'] ?>
          <p class="text-right lt margin-1">创建时间：
            <script type="text/javascript">
              document.write(new Date(<?php echo $value['dateline'] ?>).format('yyyy/MM/dd h:m'));
            </script>
          </p>
        </div>
      </div>
      <?php
          }
        }
      ?>
      <h2>其他</h2>
      <?php
        if(empty($dataother)){
          echo "当前没有贝壳，请添加贝壳";
        }else{
          foreach($dataother as $value){
      ?>
      <div class="qw_content">
        <div class="question">
          <h4><?php echo $value['question'] ?></h4>
        </div>
        <div class="answer">
          <?php echo $value['answer'] ?>
          <p class="text-right lt margin-1">创建时间：
            <script type="text/javascript">
              document.write(new Date(<?php echo $value['dateline'] ?>).format('yyyy/MM/dd h:m'));
            </script>
          </p>
        </div>
      </div>
      <?php
          }
        }
      ?>
  </article>
  <?php require_once('footer.php') ?>
  <script src="js/index.js"></script>
</body>

</html>
