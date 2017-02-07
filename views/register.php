<div class="container">
    <div class="title_Element">
        <h2>Register SCMS<small>Enter the credentials</small></h2>
    </div>
    <div class="login">
        <form method="post" action="/register_form.php">

            <div class="group">
                <input type="text" name="user_login" id="users" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="user">Username</label>
            </div>

            <div class="group">
                <input type="password" name="user_pass_first" id="pass_first" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="pass" >Password</label>
            </div>
            <div class="group">
                <input type="password" name="user_pass_second" id="pass_second" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="pass">Herhaal password</label>
            </div>

            <div class="group">
                <input type="text" name="user_name" id="users" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="user">Naam</label>
            </div>

            <div class="group">
                <input type="text" name="user_mail" id="users" required>
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="user">Email Adres</label>
            </div>

            <div class="group">
                <input class="register_button" type="submit" value="Register" />
            </div>

        </form>
    </div>
</div>
