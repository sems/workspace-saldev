<div class="container">
    <div class="title_Element">
        <h4>Login SCMS</h4>
        <small>Enter the credentials</small>
    </div>
    <div class="login">
        <?php
        if(isSet($loginError)){
            echo $loginError;
        }?>
        <form method="post" action="/login_form.php">

            <div class="group">
                <label for="user">Username</label>
                <input type="text" name="user" id="users" required>

            </div>

            <div class="group">
                <label for="pass" >Password</label>
                <input type="password" name="pass" id="pass" required>

            </div>

            <div class="group">
                <input class="logon" type="submit" value="Inloggen" />
            </div>

        </form>
    </div>
</div>
