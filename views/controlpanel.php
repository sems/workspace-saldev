<div class="cp-container">
    <div class="post-head">ControlPanel</div>
    <br />
    <?php
    if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false) || ($_SESSION['gebruiker_rank'] == NULL) || ($_SESSION['gebruiker_rank'] == 0)) {

    } else {
        echo '

        <a href="/manage-portfolio">
        Click here to manage-portfolio</a><br/><br/>

        <a href="/manage-pages">
        Click here to manage-pages</a><br/><br/>
        ';
    }
     ?>

    <div class="cp-tab-container">
	    <div class="cp-tab">
            <div class="tab-head-bar-con">
                <div class="tab-head-bar">
                    <div class="tab-head-step cp-data-active" cp-data-page="1">
                        <p class="tab-head-step-text">Profiel</p>
                    </div>
                    <div class="tab-head-step" cp-data-page="2">
                        <p class="tab-head-step-text">Manages Pages</p>
                    </div>
                    <div class="tab-head-step" cp-data-page="3">
                        <p class="tab-head-step-text">Add new page</p>
                    </div>
                    <div class="tab-head-step" cp-data-page="4">
                        <p class="tab-head-step-text">Manage Portfolio</p>
                    </div>
                    <div class="tab-head-step" cp-data-page="5">
                        <p class="tab-head-step-text">Add Portfolio</p>
                    </div>
                </div>
            </div>
            <div class="cp-tab-content-con">

                <div class="cpData-slide cp-data-active" cp-data-page="1">
                    <br>
                    <?php
                    if(isSet($loggedInMess)){
                        echo $loggedInMess;
                    }?>
                    <div class="email-change-container">
                        <h1>Change Email</h1>
                        <?php
                            if( isSet($mailWarn) ){
                                echo $mailWarn."<br />";
                            }
                        ?>
                        <br/>
                        <form name="mailChangeForm" method="post" action="/controlpanel.php">
                            <table>
                                <tr>
                                    <td>Enter your current email:</td>
                                    <td><input type="email" size="20" name="ch_current_email" required></td>
                                </tr>
                                <tr>
                                    <td>Enter your new email:</td>
                                    <td><input type="email" size="20" name="ch_new_email" required></td>
                                </tr>
                                <tr>
                                    <td>Enter your password:</td>
                                    <td><input type="password" size="20" name="ch_new_mailPwd" required></td>
                                </tr>
                            </table>
                            <p><input type="submit" name="mailSubmit" value="Update Email" required></p>
                        </form>
                    </div>

                    <br>
                    <hr>
                    <br>

                    <div class="password-change-container">
                        <h1>Change Password</h1>
                        <?php
                            if( isSet($passWarn) ){
                                echo $passWarn."<br />";
                            }
                        ?>
                        <br/>
                        <form name="pwdChangeForm" method="post" action="/controlpanel.php">
                            <table>
                                <tr>
                                    <td>Enter your existing password:</td>
                                    <td><input type="password" size="20" name="ch_old_pwd"></td>
                                </tr>
                                <tr>
                                    <td>Enter your new password:</td>
                                    <td><input type="password" size="20" name="ch_new_pwd"></td>
                                </tr>
                                <tr>
                                    <td>Re-enter your new password:</td>
                                    <td><input type="password" size="20" name="ch_conf_new_pwd"></td>
                                </tr>
                            </table>
                            <p><input type="submit" name="pwdSubmit" value="Update Password"></p>
                        </form>
                    </div>

                </div> <?php //end of slide ?>

                <div class="cpData-slide" cp-data-page="2">
                    22eee Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div> <?php //end of slide ?>

                <div class="cpData-slide" cp-data-page="3">

                    <div class="nav_create">
                        <?php
                        if(isSet($done)){
                            echo "<strong>".$done."</strong>";
                        }?>
                        <br/>
                        <br/>

                        <form method="post" action="/controlpanel.php" enctype="multipart/form-data">
                            <div class="group">
                                <input type="text" name="navItem_title" class="navItem_Title" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="user">Title</label>
                            </div>
                            Wilt u deze pagina toevoegen aan het menu <input type="checkbox" name="add_Navbar" value="value1"> <br/> <br/>
                            <textarea placeholder="Vul hier de content in" class="text_field" name='page_content' required></textarea><br />
                            <input type='submit' name="nav_submit" value='Submit' />

                        </form>
                    </div>

                </div> <?php //end of slide ?>

                <div class="cpData-slide" cp-data-page="4">
                    4eee Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div> <?php //end of slide ?>

                <div class="cpData-slide" cp-data-page="5">

                    <div class="blog_create">
                        <?php
                        if(isSet($done)){
                            echo $done;
                        }?><br/><?php
                        if(isSet($doneImg)){
                            echo $doneImg;
                        }?>
                        <form method="post" action="/controlpanel.php" enctype="multipart/form-data">
                            <div class="group">
                                <input type="text" name="title" class="title" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label for="user">Onderwerp</label>
                            </div>

                            <p>Image </p>
                            <input type="file" name="imagefile" class="image"><br /><br />
                            <textarea placeholder="Vul hier de content in" class="text_field" name='portfolio_content' required></textarea><br />
                            <input type='submit' name="submitAddItem" value='Submit' />
                        </form>



                    </div>

                </div> <?php //end of slide ?>
            </div>
        </div>
    </div>

    <hr/>
    <a href="/logout">
    Click here to logout.</a><br/><br/>
</div>
