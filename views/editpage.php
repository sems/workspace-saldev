<div class="container">
    <div class="wrapper">
        <?php

        echo '<p class="post-head">'.$row['title'].'</p>';

        $fileRowLocation = $row['item_location'];

        $fileLocation = '/views/'.$fileRowLocation;

        $file = file_get_contents("$fileLocation", FILE_USE_INCLUDE_PATH);

        ?>
        <form method="post" action="editpage.php">
            <textarea name="new-content">
                <?php echo $file; ?>
            </textarea>
            <input type="submit" name="sub-edit-page" placeholder="Delete selected page(s)" />
        </form>

        <p class="post-footer"><a href="/manage-pages.php">Back to Overzicht</a></p>
    </div>
</div>
