<div class="container">
    <div class="post-head">Portfolio</div>
    <hr />
    <?php
        while($row = $stmt->fetch( PDO::FETCH_ASSOC )) {
            ob_start();
            ?>
                <div class='post'>

                    <p class="post-title main-link"><a href="/viewpost?id= <?php  echo $row['id'];   ?> ">  <?php echo $row['title']; ?>  </a></p>

                    <p class="post-date">
                        <?php date('j M Y H:i', strtotime($row['date_posted'])); ?>
                    </p>

                    <?php
                        if ($row['portfolio_image'] != "" ){
                     ?>
                         <img class='post-img' alt=" <?php echo $row['title']; ?> " src=/img/uploads/<?php echo $row['portfolio_image']; ?>  " align='left' />
                    <?php } ?>


                    <br />
                    <?php echo $row['post_Desc']; ?>
                    <br />
                    <br />
                    <p class="post-read main-link"><a href="/viewpost?id= <?php echo $row['id'];  ?>"> Read More</a> </p>
                </div>
                <?php
            echo ob_get_clean();
        }
    ?>
</div>
