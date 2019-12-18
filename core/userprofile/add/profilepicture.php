<?php

session_start();
//ob_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
//require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/get/emailaddress.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/libraries/bulletproof/bulletproof.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/libraries/bulletproof/utils/func.image-resize.php");
//require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");
//require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/mail/sender.php");

$username = $_SESSION["username"];
$sessionLoginEmail = $_SESSION['email'];
$stat = 4;
$newStat = 5;

if (isset($_POST['button-user-request-admin-approval'])) {
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
	
			$addUserAvatar = "UPDATE szemely
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
				/*$subject = 'Új felhasználó regisztrált az Ambulánc oldalra!';
				$body = '<!DOCTYPE html>
						<html lang="hu">

						<head>
							<meta charset="UTF-8">
							<title>Új felhasználó regisztrált az Ambulánc oldalra!</title>
							<style>
							.wrapper {
								padding: 10px;
								color: #000;
								font-size: 1.4em;
							}
							a {
								background: #dd3333;
								text-decoration: none;
								padding: 8px 10px;
								color: #fff;
							}
							</style>
						</head>

						<body>
							<div class="wrapper">
							<p>Új felhasználó regisztrált az Ambulánc oldalra!</p>
							<a href="' . getURL() . '/login.php">Bejelntkezés!</a>
							</div>
						</body>
						</html>';

			    $adminEmail = getAdminEmailAddress($databaseConnection);
				$sentMail = sendEmailAfterDataProvided($adminEmail, $subject, $body);

				if ($sentMail) {
					header('Location: /core/default/frontend/adminapproval.php');
				} else {
					echo "Hiba!";
				}*/
				header('Location: /core/default/frontend/adminapproval.php');
			}
		}
		else {
			echo $image->getError();
		}
	}
}
//ob_end_clean();