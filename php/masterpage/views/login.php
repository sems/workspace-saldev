<div class="form-control">
    <?php
        if(isSet($error)) {
            echo '<div class="error">'.htmlEntities($error).'</div>';
        }
    ?>
    <form method="post" action="/login.php">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" />
        <label for="password">Password: </label>
        <input type="password" id="password" name="password" />
        <input type="submit" name="login" value="Inloggen!" />
    </form>
</div>