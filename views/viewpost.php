<div class="post-container">

    <?php
    // Als er een afbeelding bestaat.
    if ($row['portfolio_image'] != "" ){

        echo "<div class='img-cont'>";
        echo "<div class='img-cropper'>";
        echo "<img class='post-img' src=/img/uploads/".$row['portfolio_image']." />";
        echo "</div>";
        echo "</div>";
    }
    ?>

    <div class="super">
        <header>
            <div class="header-container">
                <?php
                    echo '<h1 class="post-head">'.$row['title'].'</h1>'; ?>
                    <p class='second-line'>
                    By <em class="post-author"><?php echo $row['post_author'];?></em> <span class="timestamp">on <?php echo date('F j, Y H:i', strtotime($row['date_posted'])) ?></span>
                    </p>
            </div>
        </header>
        <div class="share-buttons">
            <div class="share-inner-wrapper">

                <div class="share-button social facebook">
                    <?php $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>
                    <a href="http://www.facebook.com/share.php?u=<?php echo $actual_link ?>">Share on FACEBOOK</a>
                </div>

            </div>
        </div>
        <div class="wrapper">

            <div class="post-body">
                <?php echo $row['post'];?>
                <p class="post-footer"><a href="/portfolio.php">Back to portfolio</a></p>
            </div>

        </div>
    </div>

</div>
