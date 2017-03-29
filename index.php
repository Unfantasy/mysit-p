<?php
  if (is_numeric(strpos($_SERVER['HTTP_HOST'], 'jiduo'))) {
    header("Location: /home.html");
  } else if (is_numeric(strpos($_SERVER['HTTP_HOST'], 'jiangkuanping'))) {
    header("Location: /home.php");
  }
?>
