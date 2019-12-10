<?php

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/action/list/userprofile.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");

$listuserprofile = listUserProfile($databaseConnection, $sessionKey);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Profilod</title>
    <link rel="stylesheet" href="../../../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../../assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../../../../assets/css/floating-labels.css">
    <style>

    </style>
</head>
    <body>
        <form class="form-signin" action="#" method="post">
            <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Profilod</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                    <div class="form-group row">
                                        <label for="inputLandlineTel" class="col-4 col-form-label">Vezetékes telefon*</label> 
                                        <div class="col-8">
                                            <input id="inputLandlineTel" name="inputLandlineTel" placeholder="Vezetékes telefon" class="form-control" type="tel">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputMobileTel" class="col-4 col-form-label">Mobil telefon*</label> 
                                        <div class="col-8">
                                            <input id="inputMobileTel" name="inputMobileTel" placeholder="Mobil telefon" class="form-control" type="tel">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputZIPCode" class="col-4 col-form-label">Iranyitoszam*</label> 
                                        <div class="col-8">
                                            <input id="inputZIPCode" name="inputZIPCode" placeholder="Iranyitoszam" class="form-control" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="select" class="col-4 col-form-label">Display Name public as</label> 
                                        <div class="col-8">
                                        <select id="select" name="select" class="custom-select">

                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-4 col-form-label">Email*</label> 
                                        <div class="col-8">
                                        <input id="email" name="email" placeholder="Email" class="form-control here" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="website" class="col-4 col-form-label">Website</label> 
                                        <div class="col-8">
                                        <input id="website" name="website" placeholder="website" class="form-control here" type="text">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="publicinfo" class="col-4 col-form-label">Public Info</label> 
                                        <div class="col-8">
                                        <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                        <div class="col-8">
                                        <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="text">
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </form>
</body>
