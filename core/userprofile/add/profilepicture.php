<?php

session_start();

require_once ("../../database/config.php");
require_once ("../../../libraries/bulletproof/bulletproof.php");
require_once ("../../../libraries/bulletproof/utils/func.image-resize.php");

$username = $_SESSION["username"];
$sessionLoginEmail = $_SESSION['email'];
$stat = 4;
$newStat = 5;

echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
echo '<hr>';
echo '<hr>';
echo '<pre>' . print_r($_FILES, TRUE) . '</pre>';

$image = new Bulletproof\Image($_FILES);
$image->setName($username)
      ->setSize(51200, 1500000)
      ->setMime(array('jpg','png','gif','jpeg'))
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
		$leadingPart = '../../..'; 
		$avatarFullPath = $image->getFullPath();

		$avatarNormalizedPath = preg_replace('/^' . preg_quote($leadingPart, '/') . '/', '', $avatarFullPath);

		echo $avatarNormalizedPath;
		/*$addUserAvatar = "UPDATE szemely
						  JOIN email 
						  ON email.ID = szemely.ID
						  SET szemely.ProfilkepUtvonal = :avatarNormalizedPath,
						      szemely.Statusz = :newStat
					      WHERE szemely.ProfilkepUtvonal IS NULL
					      AND szemely.Statusz = :stat
						  AND email.BelepesiEmail = :sessionloginemail";
		
		$run = $databaseConnection -> prepare($addUserAvatar);
		$run->bindValue(':avatarNormalizedPath', $avatarNormalizedPath);
		$run->bindValue(':newStat', $newStat);
    	$run->bindValue(':stat', $stat);
		$run->bindValue(':sessionloginemail', $sessionLoginEmail);
		$exitcode = $run->execute();
            
    	if ($exitcode) {
        	header('Location: ../../default/frontend/adminapproval.php');
    	}*/
	}
	else {
		echo $image->getError();
	}
}