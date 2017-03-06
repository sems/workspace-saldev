<div class="container">
    <div class="title_Element">
        <h4>Login SCMS<small>Enter the credentials</small></h4>
    </div>
    <div class="login">
        <?php
        if(isSet($loginError)){
            echo $loginError;
        }?>
        <form method="post" action="/login_form.php">

            <div class="group">
                <input type="text" name="user" id="users" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="user">Username</label>
            </div>

            <div class="group">
                <input type="password" name="pass" id="pass" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="pass" >Password</label>
            </div>

            <div class="group">
                <input class="logon" type="submit" value="Inloggen" />
            </div>

        </form>
    </div>
</div>
