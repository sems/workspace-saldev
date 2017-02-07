<div class="container">
    <div class="site-pages">
        <?php
        if(isSet($done)){
            echo $done;
        }?><br/>
        <table class="site-table" method="get">
        <tr>
            <td >Page id</td>
            <td >title</td>
            <td >Location</td>
            <td >NavBar</td>
            <td >Delete</td>
        </tr>
        <form method="post" action="/manage-pages.php">

        <?php
            while($pageRow = $queryPages->fetch( PDO::FETCH_ASSOC )) {
                // Write the value of the column FirstName (which is now in the array $row
                echo '<tr>';
                    echo "<td>".$pageRow['id']."<br></td>";
                    echo "<td>".$pageRow['title']."<br></td>";
                    echo "<td>".$pageRow['item_location']."<br></td>";
                    echo "<td>".$pageRow['inNavBar']."<br></td>";
                    echo "<td>".'<input type="checkbox" name="id_to_be_deleted" value='.$pageRow['id'].'></td>';
                echo '</tr>';
            }
        ?>
        </table>
        <input id="delete-page" type="submit" name="delete_row" placeholder="Delete selected page(s)" />

        </form>
    </div>
    <hr />
    <a href="/controlpanel">
    Click here to go to the controlpanel</a> <br/><br/>
</div>
