<?php
    require('inc/config.php');

    // Gebruikersnaam en wachtwoord instellen
    $sGebruikerControle = 'admin';
    $sWachtwoordControle = 'password';

    // Controle of het formulier verzonden is
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Controle of benodigde velden wel ingevuld zijn
        if(isset($_POST['user'], $_POST['pass'])) {
            $sWachtwoord = trim($_POST['pass']);

            $stmt = $db->prepare('SELECT id_user, name_user, user_pwd FROM users WHERE id_user = :id');
            $stmt->execute(array(':id' => "1"));
            $row = $stmt->fetch();

            $hash = $row['user_pwd'];
            $userName = $row['name_user'];

            if (password_verify($sWachtwoord, $hash)) {
                $_SESSION['logged_in'] = true;
                $_SESSION['gebruiker'] = $userName;
                //echo 'Password is valid!';
                header('Refresh: 0.1; url=/controlpanel');
            } else {
                header('Refresh: 3; url=/login_form');
                echo 'Deze combinatie van gebruikersnaam en wachtwoord is niet juist!';
            }
        } else{
            header('Refresh: 3; url=/login_form');
            echo 'Een vereist veld bestaat niet!';
        }
    } else {
        // Terug naar het formulier
        header('Location: /login_form');
        exit();
    }
?>
