<?

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/database/config.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/core/default/getURL.php");

if (isset($_POST['button-password-set'])) {
    if (empty($_POST['inputPassword'])) {
        $error['inputPassword'] = 'Jelszó megadása kötelező';
    }
    if (empty($_POST['inputPasswordConfirmation'])) {
        $error['inputPasswordConfirmation'] = 'A jelszó újbóli megadása kötelező';
    }
    if (isset($_POST['inputPassword']) &&
        $_POST['inputPassword'] !== $_POST['inputPasswordConfirmation']) {
        $error['passwordsDoNotMatch'] = 'A megadott két jelszó nem egyezik!';
    }
    if (isset($_GET['token'])) {
        $token = $_GET['token'];

        echo $token;
    }
}
        /*$queryGetToken = "SELECT HitelesitoKod as token 
                          FROM szemely
                          WHERE HitelesitoKod=:token
                          LIMIT 1";
        
        $run = $databaseConnection->prepare($queryGetToken);
        $run->bindValue(':token', $token, PDO::PARAM_STR);
        $run->execute();
        $resultSet = $run -> fetch(PDO::FETCH_ASSOC);
    
        if (!empty($resultSet['token'])) {
            $password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);
    
            // Jelszo hash
            $updatePasswordHash = "UPDATE szemely per
                                   JOIN jelszo pass
                                   SET pass.JelszoHash = :passwordhash
                                   WHERE per.ID = pass.ID
                                   AND per.HitelesitoKod = :token";
            $run = $databaseConnection->prepare($updatePasswordHash);
    
            $run->bindValue(':passwordhash', $password);
            $run->bindValue(':token', $token);
            $resultSet = $run->execute();
    
            if ($resultSet) {
                header("Location:" . getURL() . "/login.php");
            }
        }
    }
}*/