<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php
            define("WEBSITE_TITEL", "<title> Dit is een titel </title>");
            echo WEBSITE_TITEL;
            session_start();
            if(isset($_POST['Submit'])){
                // This is the array where the login files are located.
                $logins = array(
                    'Alex' => '123456',
                    'Sem' => 'password1',
                    'test' => 'test',
                    'Lars' => 'csgo4life');
                // This is the control for the usernames and passwords
                $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
                $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
                // If the username from the array "logins" match with the password from the array "Logins"
                if (isset($logins[$Username]) && $logins[$Username] == $Password){
                    //If the enrty of the password is correct then go too...
                    $_SESSION['UserData']['Username']=$logins[$Username];
                    // It's going to direct you to the index.php
                    header("location:index.php");
                    //Exits the php
                    exit;
                } else {
                    //If the password is uncorrect then show the message that the pasword is uncorrect.
                    $msg="<span style='color:#FF0000'>De Login gegevens komen niet overeen</span>";
                }
            }
        ?>
    </head>
    <body>
        <form action="" method="post" name="Login_Form">
            <?php
            //If the msg is set, it's going to say the message that the password is uncorrect.
            if(isset($msg)){
                echo $msg;
            }
            ?>
            <h3>Login</h3>
            Username
            <input name="Username" type="text" class="Input">
            Password
            <input name="Password" type="password" class="Input">
            <input name="Submit" type="submit" value="Login" class="Button3">
        </form>
    </body>
</html>
