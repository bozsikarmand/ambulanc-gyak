<?

$token = $_SESSION['token'];

if ($_POST['button-password-set']) {
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

    $password = password_hash($_POST['inputPassword'], PASSWORD_DEFAULT);

    // Jelszo hash
    $updatePasswordHash = "UPDATE szemely 
                           JOIN jelszo
                           SET JelszoHash = :passwordhash
                           WHERE szemely.ID = jelszo ID
                           AND szemely.HitelesitoKod = :token";
    $run = $databaseConnection->prepare($updatePasswordHash);

    $run->bindValue(':passwordhash', $password);
    $run->bindValue(':token', $token);
    $resultSet = $run->execute();

    if ($resultSet) {
        header("Location: ../../../login.php");
    }
}