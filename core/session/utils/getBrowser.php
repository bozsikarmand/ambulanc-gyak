<?php

require '../../../vendor/autoload.php';

function getBrowser() {
    $result = new WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
    $humanReadableResult = $result->toString();
    return $humanReadableResult;
}