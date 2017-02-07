<?php
    // Controle of het formulier verzonden is
    if( isset($_POST['mailSubmit'] ) ) {

        // Controle of benodigde velden wel ingevuld zijn
        if( isset( $_POST['ch_new_email'], $_POST['ch_new_mailPwd'], $_POST['ch_current_email'] )) {

            $usercurrentMail =   $_POST['ch_current_email'];
            $userNewMail     =   $_POST['ch_new_email'];
            $userMailPwd     =   $_POST['ch_new_mailPwd'];
            $userNameLogged  =   $_SESSION['logged_in_user'];

            $mailQuery = $db->prepare('SELECT name_user, user_pwd, user_email FROM users WHERE name_user = :logInName');

            $mailQuery->bindParam(':logInName', $userNameLogged, PDO::PARAM_STR);
            $mailQuery->execute();

            $row = $mailQuery->fetch();

            $savedCurrentPwd = $row['user_pwd'];
            $currentEmail = $row['user_email'];

                // Old password does match
                if ($usercurrentMail === $currentEmail) {
                    // The entered email is the correct current one.
                        if (password_verify($userMailPwd, $savedCurrentPwd)) {
                            // The entered password is correct.
                            $setMailQuery = $db->prepare("UPDATE users SET user_email = :newLoginPwd WHERE name_user = :logInName");

                            $setMailQuery->bindParam(':newLoginPwd', $userNewMail, PDO::PARAM_STR);
                            $setMailQuery->bindParam(':logInName', $userNameLogged, PDO::PARAM_STR);
                            $setMailQuery->execute();

                            $mailWarn = "Het Email is succesvol gewijzigd";
                        } else {
                            $mailWarn = "Het wachtwoord is verkeerd";
                        }
                } else {
                    // Niet alle verplichte velden zijn ingevuld
                    $mailWarn = "Het huidige email komt niet overeen";
                }
        } else {
            // Niet alle verplichte velden zijn ingevuld
            $mailWarn = "Vul alle velden in aub.";
        }
    }

?>
