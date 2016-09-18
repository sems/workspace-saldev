<div class="blog_create">
    <?php
    if(isSet($done)){
        echo $done;
    }?><br/><?php
    if(isSet($doneImg)){
        echo $doneImg;
    }?>
    <form method="post" action="/additem.php" enctype="multipart/form-data">
        <div class="group">
            <input type="text" name="title" class="title" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="user">Onderwerp</label>
        </div>

        <p>Image </p>
        <input type="file" name="imagefile" class="image"><br /><br />
        
        <div class="group">
            <input type="text" name="portfolio_content" id="portfolio_content" required>
            <span class="highlight"></span>
            <span class="bar"></span>
            <label for="user">Post</label>
        </div>
        <input type='submit' name="submit" value='Submit' />
    </form>



</div>
<br />
<hr />
<a href="/controlpanel">
Click here to go to the controlpanel</a> <br/><br/>
