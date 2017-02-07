<?php
    require('inc/config.php');

    // Controle of het formulier verzonden is
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Controle of benodigde velden wel ingevuld zijn
        if(isset($_POST['user'], $_POST['pass'])) {
            $sWachtwoord = trim($_POST['pass']);
            $sUserName = $_POST['user'];

            $stmt = $db->prepare('SELECT id_user, name_user, user_pwd, user_rank, user_name FROM users WHERE name_user = :name');
            $stmt->bindParam(':name', $sUserName, PDO::PARAM_STR);
            $stmt->execute();

            $row = $stmt->fetch();

            $hash = $row['user_pwd'];
            $userName = $row['user_name'];
            $logInUserName = $row['name_user'];
            $userRank = $row['user_rank'];

            if (password_verify($sWachtwoord, $hash)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['gebruiker'] = $userName;
                $_SESSION['gebruiker_rank'] = $userRank;
                $_SESSION['logged_in_user'] = $logInUserName;

                header('Refresh: 0.1; url=/');
            } else {
                header('Refresh: 3; url=/login');
                $loginError = 'Deze combinatie van gebruikersnaam en wachtwoord is niet juist!';
            }
        } else{
            header('Refresh: 3; url=/login');
            $loginError = 'Een vereist veld bestaat niet!';
        }
    } else {
        // Terug naar het formulier
        header('Location: /login');
        exit();
    }
?>
