<head>
    <title>Home</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/logo_icon.png">
    <script src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5e9bt6a1sbsf29dohk1ta17ifinmwcaycts1p7i8tvj7ysd6"></script>

    <script>tinymce.init({ selector:'textarea' });</script>

    <link rel="stylesheet" type="text/css" href="/scss/main.min.css" />
    <?php
        $admin = "/login/";
        $base = "/";
        $currentpage = $_SERVER['REQUEST_URI'];
        if($base == $currentpage) {
                echo '<link rel="stylesheet" type="text/css" href="/css/landingpage.min.css" />';
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
