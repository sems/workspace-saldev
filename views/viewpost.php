<div class="wrapper">

    <?php echo '<p class="post-head">'.$row['title'].'</p>' ?>
    <hr />

    <?php
        echo '<div>';
            if ($row['portfolio_image'] != "" ){
                echo "<img class='post-img' alt=".$row['title']." src=/img/uploads/".$row['portfolio_image']." align='left' />";
            }
            echo '<p>Posted on '.date('j M Y H:i', strtotime($row['date_posted'])).'</p>';
            echo '<p>'.$row['post'].'</p>';
        echo '</div>';
    ?>
    <hr >
        <p class="post-footer"><a href="/portfolio.php">Back to portfolio</a></p>
</div>
