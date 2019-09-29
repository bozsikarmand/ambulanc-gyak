<?php

session_start();
require_once ('../database/config.php');

$connectiom = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

