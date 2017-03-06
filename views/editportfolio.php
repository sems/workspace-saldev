<div class="container">
    <div class="wrapper">
        <?php
            echo '<p class="post-head">'.$row['title'].'</p>';
            $fileContent = $row['post'];
            $fileDesc = $row['post_Desc'];

            if(isSet($done)){
                echo $done;
            }
        ?>
        <br/>
        <form method="post" action="" >
            <textarea name="new-post-desc">
                <?php echo $fileDesc; ?>
            </textarea>
            <textarea name="new-content">
                <?php echo $fileContent; ?>
            </textarea>
            <input type="submit" name="sub-edit-page" placeholder="Delete selected page(s)" />
        </form>

        <p class="post-footer"><a href="/manage-portfolio.php">Back to Overzicht</a></p>
    </div>
</div>
