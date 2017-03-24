<?php
require_once('backstage-manage/tools/connect.php');
$sql = "select * from jd_extract";
$query = mysql_query($sql);
while($row = mysql_fetch_assoc($query)){
  $data[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width initial-scale=1 user-scalable=no" />
  <link rel="shotcut icon" href="images/favicon.ico" />
  <title>摘录</title>
  <link rel="stylesheet" href="css/j-standard.css" />
  <link rel="stylesheet" href="css/index.css" />
  <script src="js/jquery.min.js"></script>
  <script src="js/j-function.js"></script>
</head>
<section class="ex">
  <div class="ex_banner1"></div>
  <div class="content">
    <h2>随笔</h2>
    <ol>
      <?php
        if(empty($data)){
          echo "当前没有内容，请添加内容";
        }else{
          foreach($data as $value){
      ?>
      <li><?php echo $value['content'] ?>
        <span class="wtime">
          <script type="text/javascript">
            document.write(new Date(<?php echo $value['dateline'] ?>).format('yyyy-MM-dd'));
          </script>
        </span>
      </li>
      <?php
          }
        }
      ?>
    </ol>
  </div>
  <div class="ex_banner2"></div>
  <div class="content poem">
    <h3>热爱生命</h3>

    <p>我不去想是否能够成功</p>

    <p>既然选择了远方</p>

    <p>便只顾风雨兼程</p>

    <p>我不去想能否赢得爱情 </p>

    <p>既然钟情于玫瑰</p>

    <p>就勇敢地吐露真诚 </p>

    <p>我不去想身后会不会袭来寒风冷雨 </p>

    <p>既然目标是地平线 </p>

    <p>留给世界的只能是背影 </p>

    <p>我不去想未来是平坦还是泥泞 </p>

    <p>只要热爱生命 </p>

    <p>一切</p>

    <p>都在意料之中</p>
  </div>

</section>
<?php require_once('footer.php') ?>
<script src="js/index.js"></script>
</body>

</html>
