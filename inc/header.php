<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/logo_icon.png">
    <script src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>

    <link rel="stylesheet" type="text/css" href="/scss/main.min.css" />
    <?php
        $admin = "/login/";
        $base = "/";
        $currentpage = $_SERVER['REQUEST_URI'];
        if($base == $currentpage) {
                echo '<link rel="stylesheet" type="text/css" href="/css/landingpage.css" />';
        } if($admin == $currentpage) {
            echo '<link rel="stylesheet" type="text/css" href="/css/forms.css" />';
        }
    ?>

    <script src='https://api.mapbox.com/mapbox-gl-js/v0.24.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.24.0/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="/highlight/styles/atom-one-dark.css">
    <script src="/highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script type="text/javascript" src="/js/todo.js"></script>
    <script type="text/javascript" src="/js/klassenlijst.js"></script>
    <meta name="theme-color" content="#b2bbbd">
</head>
