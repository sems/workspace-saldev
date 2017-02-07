<?php
    require('inc/config.php');

    // Controle of het formulier verzonden is
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Controle of benodigde velden wel ingevuld zijn
        if( isset(
            $_POST['user_login'],
            $_POST['user_pass_first'],
            $_POST['user_pass_second'],
            $_POST['user_name'],
            $_POST['user_mail']
            )) {

            $userLoginInput    =    $_POST['user_login'];
            $userPassInput     =    $_POST['user_pass_first'];
            $userPassConfInput =    $_POST['user_pass_second'];
            $userNameInput     =    $_POST['user_name'];
            $userMailInput     =    $_POST['user_mail'];

            $hashedPwd = password_hash($userPassConfInput, PASSWORD_DEFAULT);

                $query = "INSERT INTO `users`(`name_user`, `user_name`, `user_pwd`, `user_email`) VALUES (:loginUser, :userName, :loginPwd, :userMail )";
                //Bereid de SQL query voor voor het onderwerp en de titel
                $dbinsert = $db->prepare($query);

                $dbinsert->bindParam(':loginUser', $userLoginInput, PDO::PARAM_STR);
                $dbinsert->bindParam(':userName', $userNameInput, PDO::PARAM_STR);
                $dbinsert->bindParam(':loginPwd', $hashedPwd, PDO::PARAM_STR);
                $dbinsert->bindParam(':userMail', $userMailInput, PDO::PARAM_STR);

                $dbinsert-> execute();
                header('Refresh: 0.1; url=/login');

        } else{
            header('Refresh: 3; url=/register');
            echo 'Een vereist veld is niet ingevuld niet!';
        }
    } else {
        // Terug naar het formulier
        header('Location: /register');
        exit();
    }

?>
