<?php
  require_once '../../include.php';
  // 返回数据初始化
  $data = array(
    'success' => false,
    'errorMsg' => ''
  );
  $decription = $_POST['decription'];

  $path=ROOT."/images";
  $sitepath = SITEROOT."/images";
  // $path = str_replace('\\', '/', $path);
  $allowExt=array("gif","jpeg","png","jpg");
  // $maxSize=2097152;
  $imgFlag=true;
  if(!file_exists($path)){
		mkdir($path,0777,true);
	}
	$i=0;
	$files=getPictureInfo();
	if(!($files&&is_array($files))){
		return ;
	}
  foreach($files as $file){
    if($file['error']===UPLOAD_ERR_OK){
      $forend = explode(".",$file['name']);
			$ext=strtolower(end($forend)); // 获取文件的扩展名
			//检测文件的扩展名
			if(!in_array($ext,$allowExt)){
				$data['errorMsg'] = "非法文件类型";
        echo json_encode($data);
        return false;
			}
			//校验是否是一个真正的图片类型
			if($imgFlag){
				if(!getimagesize($file['tmp_name'])){
					$data['errorMsg'] = "不是真正的图片类型";
          echo json_encode($data);
          return false;
				}
			}
			//上传文件的大小
			// if($file['size']>$maxSize){
			// 	$data['errorMsg'] = "上传文件过大";
      //   echo json_encode($data);
      //   return false;
			// }
			if(!is_uploaded_file($file['tmp_name'])){
				$data['errorMsg'] = "不是通过HTTP POST方式上传上来的";
        echo json_encode($data);
        return false;
			}
			$destination=$path."/".$file['name'];
			if(move_uploaded_file($file['tmp_name'], $destination)){
        // 成功 往数据库添加数据
        // 先判断数据库中是否有这条数据有的话就不添加了
        $sitedestination = $sitepath.'/'.$file['name'];
        $record = fetchOne('select * from mr_long where imgpath = '."'$sitedestination'");
        if(!$record) {
          $insertid = insert('mr_long', array(
            'imgpath' => $sitedestination,
            'decription' => $decription
          ));
          $data['insertid'] = $insertid;
        }
        $data['success'] = true;
        $data['message'] = '文件上传成功';
				unset($file['tmp_name'],$file['size'],$file['type']);
				$i++;
			}
		}else{
			switch($file['error']){
					case 1:
						$data['errorMsg']="超过了配置文件上传文件的大小";//UPLOAD_ERR_INI_SIZE
						break;
					case 2:
						$data['errorMsg']="超过了表单设置上传文件的大小";			//UPLOAD_ERR_FORM_SIZE
						break;
					case 3:
						$data['errorMsg']="文件部分被上传";//UPLOAD_ERR_PARTIAL
						break;
					case 4:
						$data['errorMsg']="没有文件被上传1111";//UPLOAD_ERR_NO_FILE
						break;
					case 6:
						$data['errorMsg']="没有找到临时目录";//UPLOAD_ERR_NO_TMP_DIR
						break;
					case 7:
						$data['errorMsg']="文件不可写";//UPLOAD_ERR_CANT_WRITE;
						break;
					case 8:
						$data['errorMsg']="由于PHP的扩展程序中断了文件上传";//UPLOAD_ERR_EXTENSION
						break;
				}
			}
	}
  $data['path'] = $path;
  echo json_encode($data);


  // 获取上传的图片的信息
  function getPictureInfo(){
  	if(!$_FILES){
  		return ;
  	}
  	$i=0;
  	foreach($_FILES as $v){
  		//单文件
  		if(is_string($v['name'])){
  			$files[$i]=$v;
  			$i++;
  		}else{
  			//多文件
  			foreach($v['name'] as $key=>$val){
  				$files[$i]['name']=$val;
  				$files[$i]['size']=$v['size'][$key];
  				$files[$i]['tmp_name']=$v['tmp_name'][$key];
  				$files[$i]['error']=$v['error'][$key];
  				$files[$i]['type']=$v['type'][$key];
  				$i++;
  			}
  		}
  	}
  	return $files;
  }

?>
