<br />
<div class="nav_create">

    <?php
    if(isSet($done)){
        echo "<strong>".$done."</strong>";
    }?>
    <br/>
    <br/>
    <p>Maak hier een nieuwe item voor in de navbar.</p>
    <form method="post" action="/addnav.php" enctype="multipart/form-data">
        <p> Naam</p>
        <input placeholder="Nav-Item Title" type="text" name="navItem_title" id="navItem_Title" required/><br /><br />
        Wilt u deze pagina toevoegen aan het menu <input type="checkbox" name="add_Navbar" value="value1"> <br/> <br/>
        <textarea placeholder="Vul hier de content in" class="page_content" name='page_content' required></textarea><br />
        <input type='submit' name="nav_submit" value='Submit' />
    </form>
</div>
<hr />
<a href="/controlpanel">
Click here to go to the controlpanel</a> <br/><br/>
