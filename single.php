<?php
/**
 * The template for displaying any single post.
 *
 */

get_header(); // This fxn gets the header.php file and renders it ?>
<div id="primary"
     class="mdl-cell mdl-cell--8-col">
    <div id="content" role="main">
        <?php if (have_posts()) :
            // Do we have any posts in the databse that match our query?
            ?>

            <?php while (have_posts()) : the_post();
            // If we have a post to show, start a loop that will display it
            ?>

            <article class="dgl-card mdl-card mdl-shadow--4dp">
                <div class="mdl-card__title"
                     style="background: url('<?php the_post_thumbnail_url(); ?>') center / cover;">
                    <h2 class="mdl-card__title-text dgl-overlay-card-title">
                        <a href="<?php the_permalink(); ?>"
                           title="<?php the_title(); ?>">
                            <?php the_title(); // Show the title of the posts as a link ?>
                        </a>
                    </h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php the_content();
                    // This call the main content of the post, the stuff in the main text box while composing.
                    // This will wrap everything in p tags
                    ?>
                    <span class="date"><?php the_time('m/d'); // Display the time published ?></span>
                </div>
                <div class="mdl-card__actions mdl-card--border if-room">
                    <?php if (has_tag()) { ?>
                        <?php
                        $tags = get_the_tags();
                        $html = '';
                        foreach ($tags as $tag) {
                            $tag_link = get_tag_link($tag->term_id);
                            $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='
                               dgl-category mdl-button mdl-js-button mdl-button--colored'>";
                            $html .= "{$tag->name}</a>";
                        }
                        echo $html;
                        ?>
                    <?php } ?>

                </div>
            </article>

            <div class="mdl-card mdl-shadow--2dp" style="min-height: initial;">
                <?php wp_link_pages(); // This will display pagination links, if applicable to the post ?>
                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%"
                     data-numposts="5"></div>
            </div>


            <div class="related-posts mdl-grid mdl-grid--no-spacing">
                <?php
                //for use in the loop, list 5 post titles related to first tag on current post
                $tags = wp_get_post_tags($post->ID);
                if ($tags) {
                    $first_tag = $tags[0]->term_id;
                    $theseTags = array();
                    foreach ($tags as $key => $value)
                        $theseTags[$key] = $value->term_id;
                    $args = array(
                        'tag__in' => $theseTags,// array($first_tag),
                        'post__not_in' => array($post->ID),
                        'posts_per_page' => 4,
                        'ignore_sticky_posts' => 1
                    );
                    $my_query = new WP_Query($args);
                    if ($my_query->have_posts()) {
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                            <!--                            <div class="mdl-cell mdl-cell--4-col mdl-cell--3-col-tablet mdl-cell--4-col-phone">-->
                            <!--                                <div class="mdl-card mdl-card--2dp related-posts">-->
                            <!--                                    <a href="--><?php //the_permalink() ?><!--" rel="bookmark"-->
                            <!--                                       title="Permanent Link to --><?php //the_title_attribute(); ?><!--">-->
                            <!--                                        <div class="mdl-card__title">-->
                            <!--                                            <h4>--><?php //the_title(); ?><!--</h4>-->
                            <!--                                        </div>-->
                            <!--                                    </a>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="mdl-cell mdl-cell--6-col mdl-cell--4-col-tablet mdl-cell--4-col-phone">
                                <div class="mdl-card dgl-related-card">
                                    <a class="dgl-link--no-style" href="<?php the_permalink() ?>">
                                        <div class="dgl-related-card--image">
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </div>
                                        <div class="dgl-related-card--text">
                                            <div class="dgl-related-card--title">
                                                <span><?php the_title(); ?></span>
                                            </div>
                                            <div class="dgl-related-card--meta if-room">
                                                <?php echo the_category(' '); // Display the categories this post belongs to, as links ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    }
                    wp_reset_query();
                }
                ?>
            </div>

        <?php endwhile; // OK, let's stop the post loop once we've displayed it
            ?>

            <!--            --><?php
//            // If comments are open or we have at least one comment, load up the default comment template provided by Wordpress
//            if (comments_open() || '0' != get_comments_number())
//                comments_template('', true);
//
            ?>


        <?php else : // Well, if there are no posts to display and loop through, let's apologize to the reader (also your 404 error) ?>

            <article class="post error">
                <h1 class="404">Nothing has been posted like that yet</h1>
            </article>

        <?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) ?>

    </div><!-- #content .site-content -->
    <!--    -->
    <!--    <div id="sidebar" class="mdl-cell mdl-cell--4-col-desktop mdl-cell--8-col-tablet-->
    <!--     mdl-cell--order-2 mdl-cell--order-1-desktop">-->
    <!---->
    <!--    </div>-->
    <!--    --><?php //get_sidebar(); ?>
</div><!-- #primary .content-area -->
<div id="sidebar"
     class="mdl-cell mdl-cell--4-col">
    <?php get_sidebar(); ?>
</div>
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9&appId=1907094099521165";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
