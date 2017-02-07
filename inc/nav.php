<nav>
    <ul>
        <li class="brand brand-Desktop"><h1>Sem!</h1></a></li>
        <li class="nav-items <?php if($sectionActive == "home") { echo "active";} ?> "><a href="/"><h1>Home</h1></a></li>
        <li class="nav-items <?php if($sectionActive == "about") { echo "active";} ?> "><a href="/about">About</a></li>
        <li class="nav-items <?php if($sectionActive == "portfolio") { echo "active";} ?> "><a href="/portfolio">Portfolio</a></li>
        <?php
            require_once "navitems.php";
            while($rowNav = $queryNav->fetch( PDO::FETCH_ASSOC )) {
                    echo "<li class='nav-items";
                    if($sectionActive == $rowNav['title']) {
                        echo ' active';
                    }
                    echo " '><a href=/".$rowNav['title'].">".$rowNav['title']."</a></li>";
            }
        ?>
        <li class="nav-items <?php if($sectionActive == "contact") { echo "active";}?> "><a href="/contact">Contact</a></li>
        <?php
            if(!isset($_SESSION['logged_in']) || ($_SESSION['logged_in'] == false)) {

            } else {

                echo "<li class='nav-items";
                if($sectionActive == 'controlpanel') {
                    echo ' active';
                }
                echo "'><a href='/controlpanel'>CP</a></li>";

                echo "<li class='nav-items'><a href='/logout'>Logout</a></li>";
            };


        ?>
    </ul>
</nav>
