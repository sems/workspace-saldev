<?php
    // Controle of het formulier verzonden is
    if( isset($_POST['pwdSubmit'] ) ) {

        // Controle of benodigde velden wel ingevuld zijn
        if( isset( $_POST['ch_old_pwd'], $_POST['ch_new_pwd'], $_POST['ch_conf_new_pwd'] )) {

            $userOldPwd     =   $_POST['ch_old_pwd'];
            $userNewPwd     =   $_POST['ch_new_pwd'];
            $userConfNewPwd =   $_POST['ch_conf_new_pwd'];
            $userNameLogged =   $_SESSION['logged_in_user'];

            $pwdQuery = $db->prepare('SELECT name_user, user_pwd FROM users WHERE name_user = :logInName');
            $pwdQuery->bindParam(':logInName', $userNameLogged, PDO::PARAM_STR);
            $pwdQuery->execute();

            $row = $pwdQuery->fetch();

            $savedOldPwd = $row['user_pwd'];

            if (password_verify($userOldPwd, $savedOldPwd)) {
                // Old password does match

                if ($userNewPwd === $userConfNewPwd) {
                    // De nieuwe wachtwoorden komen overeen!
                    $hashedNewPwd = password_hash($userNewPwd, PASSWORD_DEFAULT);

                    $setPwdQuery = $db->prepare("UPDATE users SET user_pwd = :newLoginPwd WHERE name_user = :logInName");

                    $setPwdQuery->bindParam(':newLoginPwd', $hashedNewPwd, PDO::PARAM_STR);
                    $setPwdQuery->bindParam(':logInName', $userNameLogged, PDO::PARAM_STR);
                    $setPwdQuery->execute();

                    $passWarn = "Het wachtwoord is succesvol gewijzigd";
                } else {
                    // De nieuwe wachtwoorden komen niet overeen
                    $passWarn = "De nieuwe wachtwoorden komen niet overeen";
                }
            } else {
                // Old password doesnt match
                $passWarn = "Het huidige wachtwoord is incorrect.";
            }
        } else {
            // Niet alle verplichte velden zijn ingevuld
            $passWarn = "Vul alle velden in aub.";
        }
    }

?>
