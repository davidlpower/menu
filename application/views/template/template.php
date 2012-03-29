<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
    <head profile="http://gmpg.org/xfn/11">
        <title><?php echo $site_title ?></title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <?php
        foreach ($styles as $file => $type)
            echo HTML::style($file, array('media' => $type)), "\n"
            ?>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        </script>
    </head>

    <body>
        <div id="container">

            <?php echo $head ?>
            <?php echo $content ?>
            <?php echo $foot ?>
        </div>
    </body>  
</html>