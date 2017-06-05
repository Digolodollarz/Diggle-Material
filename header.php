<?php
/*-----------------------------------------------------------------------------------*/
/* This template will be called by all other template files to begin
/* rendering the page and display the header/nav
/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width"/>
    <title>
        <?php bloginfo('name'); // show the blog name, from settings ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
    </title>

    <link rel="profile" href="http://gmpg.org/xfn/11"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php // We are loading our theme directory style.css by queuing scripts in our functions.php file,
    // so if you want to load other stylesheets,
    // I would load them with an @import call in your style.css
    ?>
    <?php if (is_singular()): //Insert a bunch of meta tags here ?>

    <?php endif; ?>

    <?php if (! is_404()): //Insert a bunch of meta tags here ?>
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-2093893395803299",
                enable_page_level_ads: true
            });
        </script>
    <?php endif; ?>

    <?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
    <!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

<!--    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">-->
<!--    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-indigo.min.css">-->
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Inknut+Antiqua" rel="stylesheet">

    <?php wp_head();
    // This fxn allows plugins, and Wordpress itself, to insert themselves/scripts/css/files
    // (right here) into the head of your website.
    // Removing this fxn call will disable all kinds of plugins and Wordpress default insertions.
    // Move it if you like, but I would keep it around.
    ?>

</head>

<body
    <?php body_class();
    // This will display a class specific to whatever is being loaded by Wordpress
    // i.e. on a home page, it will return [class="home"]
    // on a single post, it will return [class="single postid-{ID}"]
    // and the list goes on. Look it up if you want more.
    ?>
>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header id="masthead" class="site-header mdl-layout__header mdl-color-text--white">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <a class="mdl-navigation__link site-title"
               href="<?php echo esc_url(home_url('/')); // Link to the home page ?>"
               title="<?php echo esc_attr(get_bloginfo('name', 'display')); // Title it with the blog name ?>"
               rel="home"
               style="width:auto; height: 100%;">
<!--                <img src="--><?php //echo get_template_directory_uri(); ?><!--/img/dt-black.png" alt="diggle-tech-logo"-->
<!--                     style="width:auto; height: 100%;">-->
                <?php bloginfo('name'); // show the blog name, from settings ?>
            </a>

            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <?php wp_nav_menu(array('menu_class' => 'menu menu-inline')); ?>
            </nav>
        </div>
    </header><!-- #masthead .site-header -->
    <div class="mdl-layout__drawer">
        <!-- Title -->
        <span class="mdl-layout-title"><a class="mdl-navigation__link mdl-button mdl-js-button"
                                          href="<?php echo esc_url(home_url('/')); // Link to the home page ?>"
                                          title="<?php echo esc_attr(get_bloginfo('name', 'display')); // Title it with the blog name ?>"
                                          rel="home"><?php bloginfo('name'); // Display the blog name ?></a></span>

        <nav class="mdl-navigation">
            <?php wp_nav_menu(); ?>
        </nav>
    </div>
    <main class="main-fluid content-grid mdl-grid""><!-- start the page containter -->
