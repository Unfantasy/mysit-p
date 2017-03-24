<?php
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
// session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT.'/model'.PATH_SEPARATOR.ROOT.get_include_path());
require_once 'mysql.func.php';
require_once 'upload.func.php';
require_once 'mysql.config.php';
require_once 'user.config.php';
connect();
