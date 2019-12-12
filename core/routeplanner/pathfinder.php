<?php 
session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/list/user.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/authentication/role/constant.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/session/get.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/routeplanner/utils/pathfinder.class.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/routeplanner/utils/getdata.php");

$currentRole = getRoleInfo($loginEmail, $databaseConnection);

if ($currentRole == $USER) {
    header("Location:" . getURL() . "/core/default/frontend/nopermission.php");
} 

if (isset($_POST['button-search-path'])) {
    $startCity = $_POST['inputStartCity'];
    $endCity = $_POST['inputEndCity'];
    $startDate = $_POST['datepickerStartDate'];
    $endDate = $_POST['datepickerEndDate'];
    $startTime = $_POST['timepickerStartTime'];
    $endTime = $_POST['timepickerEndTime'];

    if ($startCity === $endCity) {
        echo "0 hosszu ut nem tervezheto!";
    } else if ($startTime === $endTime) {
        echo "0 idokoltsegu ut nem tervezheto!";
    } else {        
        
    }
}
?>
