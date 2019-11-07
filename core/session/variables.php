<?php

session_start();

require_once ("../database/config.php");

$queryUserData = "SELECT email.BelepesiEmail, szemely.Felhasznalonev, szemely.Vezeteknev, szemely.Keresztnev, szemely.Utonev, szemely.VezetekesTel, 
                         szemely.MobilTel, szemely.IRSZ, szemely.Varos, szemely.KozteruletNeve, szemely.KozteruletJellege, 
                         szemely.Hazszam, szemely.Epulet, szemely.UtolsoBelepesIdopontja
                  FROM email, szemely
                  WHERE szemely.ID = email.ID 
                  AND BelepesiEmail=:loginemail";