<?php get_header(); ?>
        <div class="main-single">
                <section class="single">
                        <div class="single-card"><a href="<?php the_permalink();?>"><img width="100%" src="<?php the_post_thumbnail_url('single-size') ?>" alt=""></a></div>
                        <?php

/* Start the Loop */
while ( have_posts() ) : the_post();
    $post_views = get_post_views(get_the_ID());?>

    <p>visto <?php echo sprintf( _n( '%s vez', '%s veces', $post_views, 'your_textdomain' ), $post_views );?></p>

    <?php
endwhile; ?>

                        <div class="single-content"><p><?php the_category() ?></p>
                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                        <p class="date"><?php echo get_the_date() ?></p><br>
                        <p><?php the_content() ?></p></div>
                </section> 
                
                
        </div>
        

        <?php get_footer(); ?>


   