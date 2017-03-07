<div class="container">
    <div class="title_Element">
        <h2>Register SCMS</h2>
        <small>Enter the credentials</small>
    </div>
    <div class="login">
        <form method="post" action="/register_form.php">

            <div class="group">
                <label for="user">Username</label>
                <input type="text" name="user_login" id="users" required>

            </div>

            <div class="group">
                <label for="pass" >Password</label>
                <input type="password" name="user_pass_first" id="pass_first" required>

            </div>
            <div class="group">
                <label for="pass">Herhaal password</label>
                <input type="password" name="user_pass_second" id="pass_second" required>

            </div>

            <div class="group">
                <label for="user">Naam</label>
                <input type="text" name="user_name" id="users" required>

            </div>

            <div class="group">
                <label for="user">Email Adres</label>
                <input type="text" name="user_mail" id="users" required>

            </div>

            <div class="group">
                <input class="register_button" type="submit" value="Register" />
            </div>

        </form>
    </div>
</div>
