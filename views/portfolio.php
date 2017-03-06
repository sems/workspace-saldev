<div class="port-container">
    <div class="post-head"></div>
    <div class="post-main">
        <div class="post-sizer"></div>
        <?php
            while($row = $stmt->fetch( PDO::FETCH_ASSOC )) {
                ob_start();
                ?>
                    <div class='post'>

                        <p class="post-title main-link"><a href="/viewpost?id= <?php echo $row['id'];?> ">  <?php echo $row['title']; ?>  </a></p>

                        <?php if ($row['portfolio_image'] != "" ){  ?>
                            <img class='post-img' alt=" <?php echo $row['title']; ?> " src="/img/uploads/<?php echo $row['portfolio_image']; ?>" />
                        <?php } ?>
                        <div class="post-description">
                            <?php echo $row['post_Desc']; ?>
                        </div>
                        <p class="post-read main-link"><a href="/viewpost?id= <?php echo $row['id'];  ?>"> Read More</a> </p>
                    </div>
                    <?php
                echo ob_get_clean();
            }
        ?>
    </div>
</div>
