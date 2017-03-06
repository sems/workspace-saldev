<div class="container">
    <div class="site-pages">
        <?php
        if(isSet($done)){
            echo $done;
        }?><br/>
        <table class="site-table" method="get">
            <tr>
                <th>User id</th>
                <th>Username</th>
                <th>Login name</th>
                <th>User rank</th>
                <th>User email</th>
                <th>Change</th>
                <th>Change Rank</th>
                <th>Delete</th>
            </tr>
            <form method="post" action="/manage-users.php">
            <?php
                while($pageRow = $queryPages->fetch( PDO::FETCH_ASSOC )) {
                    // Write the value of the column FirstName (which is now in the array $row
                    if ($pageRow['user_rank'] == 1) {
                        $userRank = "Admin";
                    } if ($pageRow['user_rank'] == 0) {
                        $userRank = "User";
                    }
                    echo '<tr>';
                        echo "<td>".$pageRow['id_user']."<br></td>";
                        echo "<td>".$pageRow['user_name']."<br></td>";
                        echo "<td>".$pageRow['name_user']."<br></td>";
                        echo "<td>".$userRank."<br></td>";
                        echo "<td><a href='mailto:".$pageRow['user_email']."'>".$pageRow['user_email']."</a><br></td>";
                        echo "<td><a href='/editpage?id=".$pageRow['id_user']."'> Edit</a></td>";
                        echo "<td>".'<input type="checkbox" name="make-admin" value='.$pageRow['id_user'].'></td>';
                        echo "<td>".'<input type="checkbox" name="id_to_be_deleted" value='.$pageRow['id_user'].'></td>';
                    echo '</tr>';
                }
            ?>
        </table>
        <input type="submit" name="delete_row" placeholder="Delete selected page(s)" />

        </form>
    </div>
    <hr />
    <a href="/controlpanel">
    Click here to go to the controlpanel</a> <br/><br/>
</div>
