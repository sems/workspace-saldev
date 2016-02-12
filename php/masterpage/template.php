<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <?php
            foreach($css as $styleSheet) {
                echo '<link rel="stylesheet" type="text/css" href="/css/'.$styleSheet.'" />';
            }
        
            foreach($js as $scriptFile) {
                echo '<script type="text/javascript" src="/js/'.$scriptFile.'"></script>';
            }
        ?>
    </head>
    <body>
        <div id="menu">
            item1 : item2 : item3
        </div>
        <div id="main-container">
            <?php
                include $view;
            ?>
        </div>
        <div id="footer">
            &copy; Koning.
        </div>
    </body>
</html>