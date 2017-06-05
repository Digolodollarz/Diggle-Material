<?php
/**
 * The template for displaying the home/index page.
 * This template will also be called in any case where the Wordpress engine
 * doesn't know which template to use (e.g. 404 error)
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<div id="primary"
     class="mdl-cell mdl-cell--8-col">
    <div id="content" role="main">
        <?php if (have_posts()) :
            // Do we have any posts in the databse that match our query?
            // In the case of the home page, this will call for the most recent posts
            ?>

            <?php while (have_posts()) : the_post();
            // If we have some posts to show, start a loop that will display each one the same way
            ?>

            <article class="dgl-card mdl-card mdl-shadow--4dp">
                <!--                <div class="dgl-card mdl-card mdl-shadow--2dp">-->
                <div class="mdl-card__title"
                     style="background: url('<?php the_post_thumbnail_url(); ?>') center / cover;">
                    <h2 class="mdl-card__title-text dgl-overlay-card-title">
                        <a href="<?php the_permalink(); // Get the link to this post ?>"
                           title="<?php the_title(); ?>">
                            <?php the_title(); // Show the title of the posts as a link ?>
                        </a>
                    </h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php
                    the_excerpt(); //Get the post except
                    ?>
                    <!--                        <span class="date">-->
                    <?php //the_time('m/d'); // Display the time published ?><!--</span>-->
                </div>
                <div class="mdl-card__actions mdl-card--border if-room">

                    <div class="dgl-fill-width"></div>
                    <?php echo the_category(' '); // Display the categories this post belongs to, as links ?>
                    <!--                        --><?php //echo get_the_tag_list('| &nbsp;', '&nbsp;'); // Display the tags this post has, as links separated by spaces and pipes ?>

                    <a class="dgl-button--read-more mdl-button mdl-js-button mdl-button--colored mdl-button--raised mdl-js-ripple-effect"
                       href="<?php the_permalink(); // Get the link to this post ?>">
                        Read...
                    </a>
                </div>
                <div class="mdl-card__menu">
                </div>
                <!--                </div>-->
            </article>

        <?php endwhile; // OK, let's stop the posts loop once we've exhausted our query/number of posts
            ?>
            <?php get_pagination_links(); ?>
        <?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

            <article class="post error dgl-card mdl-card mdl-shadow--2dp">
                <h1 class="404">Nothing has been posted like that yet</h1>
            </article>

        <?php endif; // OK, I think that takes care of both scenarios (having posts or not having any posts) ?>

    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->
<div id="sidebar"
       class="mdl-cell mdl-cell--4-col">
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>


