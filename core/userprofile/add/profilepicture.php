<?php

session_start();

require_once ("../../../libraries/bulletproof/bulletproof.php");
require_once ("../../../libraries/bulletproof/utils/func.image-resize.php");

$username = $_SESSION["username"];

echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
echo '<hr>';
echo '<hr>';
echo '<pre>' . print_r($_FILES, TRUE) . '</pre>';

$image = new Bulletproof\Image($_FILES);
$image->setName($username)
      ->setSize(1500000)
      ->setMime(array('jpg','png','gif'))
      ->setDimension(1000, 1000)
      ->setLocation("../../../uploads/avatars", 0777);

if($image["avatar"]){
	$upload = $image->upload();
	
	if($upload){
		bulletproof\utils\resize(
			$image->getFullPath(), 
			$image->getMime(),
			$image->getWidth(),
			$image->getHeight(),
			20,
            20
        );
        header('Location: ../../default/frontend/adminapproval.php');
	}
	else {
		echo $image->getError();
	}
}