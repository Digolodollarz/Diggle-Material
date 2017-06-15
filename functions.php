<?php
/*-----------------------------------------------------------------------------------*/
/* This file will be referenced every time a template/page loads on your Wordpress site
/* This is the place to define custom fxns and specialty code
/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define('NAKED_VERSION', 1.0);

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if (!isset($content_width)) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support('automatic-feed-links');

add_theme_support('post-thumbnails');

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
    array(
        'primary' => __('Primary Menu', 'naked'), // Register the Primary menu
        // Copy and paste the line above right here if you want to make another menu,
        // just change the 'primary' to another name
    )
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars()
{
    register_sidebar(array(                // Start a series of sidebars to register
        'id' => 'sidebar',                    // Make an ID
        'name' => 'Sidebar',                // Name it
        'description' => 'Take it on the side...', // Dumb description for the admin side
        'before_widget' => '<aside class="mdl-card dgl-card mdl-shadow--2dp">',    // What to display before each widget
        'after_widget' => '</aside>',    // What to display following each widget
        'before_title' => '<h4 class="side-title">',    // What to display before each widget's title
        'after_title' => '</h4>',        // What to display following each widget's title
        'empty_title' => '',                    // What to display in the case of no title defined for a widget
        // Copy and paste the lines above right here if you want to make another sidebar,
        // just change the values of id and name to another word/name
    ));
    register_sidebar(array(                // Start a series of sidebars to register
        'id' => 'diggle-right-sidebar',                    // Make an ID
        'name' => 'Right Sidebar',                // Name it
        'description' => 'Right Sidebar widgets', // Dumb description for the admin side
        'before_widget' => '<div>',    // What to display before each widget
        'after_widget' => '</div>',    // What to display following each widget
        'before_title' => '<h3 class="side-title">',    // What to display before each widget's title
        'after_title' => '</h3>',        // What to display following each widget's title
        'empty_title' => '',                    // What to display in the case of no title defined for a widget
        // Copy and paste the lines above right here if you want to make another sidebar,
        // just change the values of id and name to another word/name
    ));
}

// adding sidebars to Wordpress (these are created in functions.php)
add_action('widgets_init', 'naked_register_sidebars');

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()
{

    // Enqueue material design lite css from cdnjs
    wp_enqueue_style('mdl.css', 'https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.red-indigo.min.css');

    // get the theme directory style.css and link to it in the header
    wp_enqueue_style('style.min.css', get_stylesheet_directory_uri() . '/style.min.css');

    //font sinhi
//    wp_enqueue_style('noto.css', 'https://fonts.googleapis.com/css?family=Lora|Noto+Serif');

//    icon sinhi
//    wp_enqueue_style('icons.css', 'https://fonts.googleapis.com/icon?family=Material+Icons');

    // add fitvid
//	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );

    // add material design lite js from cdnjs
    wp_enqueue_script('mdljs', 'https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.3.0/material.min.js', array(), null, true);

    // add theme scripts
//    wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );

    // add theme scripts
//    wp_enqueue_script( 'diggle-material', get_template_directory_uri() . '/js/theme.js', array(), NAKED_VERSION, true );

    wp_dequeue_script('jquery');
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url('/js/jquery/jquery.js'), false, NULL, true);
    wp_enqueue_script('jquery');
    wp_dequeue_script('jquery-migrate');
    wp_deregister_script('jquery-migrate');
    wp_register_script('jquery-migrate', includes_url('/js/jquery/jquery-migrate.min.js'), false, NULL, true);
    wp_enqueue_script('jquery-migrate');
}

add_action('wp_enqueue_scripts', 'naked_scripts'); // Register this fxn and allow Wordpress to call it automatically in the header

add_filter(
    'the_excerpt', 'filter_except');
function filter_except($excerpt)
{
    return substr($excerpt, 0, strpos($excerpt, '.', strpos($excerpt, '.') + 1) + 1);
}


add_filter('the_category', 'add_class_to_category', 10, 3);
function add_class_to_category($thelist, $separator, $parents)
{
    $class_to_add = 'dgl-category mdl-color-text--primary';
    return str_replace('<a href="', '<a class="' . $class_to_add . '" href="', $thelist);
}


function get_pagination_links()
{
    $links = paginate_links(array(
        'prev_next' => false,
        'type' => 'array'
    ));

    if ($links) :

        echo '<div class="mdl-card dgl-card pagination-links" style="min-height: 0;">';

        // get_previous_posts_link will return a string or void if no link is set.
        if ($prev_posts_link = get_previous_posts_link(__('Previous'))) :
            echo '<span class="pagination-link pagination-link--first">';
            echo $prev_posts_link;
            echo '</span>';
        endif;

        echo '<span class="pagination-link">';
        echo join('</span><span class="pagination-link">', $links);
        echo '</span>';

        // get_next_posts_link will return a string or void if no link is set.
        if ($next_posts_link = get_next_posts_link(__('Next'))) :
            echo '<span class="pagination-link pagination-link--last">';
            echo $next_posts_link;
            echo '</span>';
        endif;
        echo '</div>';
    endif;
}

//Insert ads after second paragraph of single post content.

add_filter('the_content', 'prefix_insert_post_ads');
add_filter('the_content', 'prefix_insert_post_ads_2');

function prefix_insert_post_ads($content)
{

    $ad_code = '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Diggle Tech -  In Post -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2093893395803299"
     data-ad-slot="9714862564"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';

    if (is_single() && !is_admin()) {
        return prefix_insert_after_paragraph($ad_code, 1, $content);
    }

    return $content;
}

function prefix_insert_post_ads_2($content)
{

    $ad_code = '<!--<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"> --></script>
<!-- Diggle Tech -  In Post -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2093893395803299"
     data-ad-slot="9714862564"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>';

    if (is_single() && !is_admin()) {
        return prefix_insert_after_paragraph($ad_code, 6, $content);
    }

    return $content;
}

// Parent Function that makes the magic happen

function prefix_insert_after_paragraph($insertion, $paragraph_id, $content)
{
    $closing_p = '</p>';
    $paragraphs = explode($closing_p, $content);
    foreach ($paragraphs as $index => $paragraph) {

        if (trim($paragraph)) {
            $paragraphs[$index] .= $closing_p;
        }

        if ($paragraph_id == $index + 1) {
            $paragraphs[$index] .= $insertion;
        }
    }

    return implode('', $paragraphs);
}

