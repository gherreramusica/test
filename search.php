<?php get_header('single'); ?>
        
        <div class="homepage">
                <div class="main-out">
                
                
                        <h3><?php if(is_category()){
                                single_cat_title();
                        } if(is_author()){
                                echo 'Publicaciones de'; the_autor();
                        } ?></h3><br>
                        
                        <div class="archive-post">
                                
                              
                       
                                        <section class="list-post-archive">
                                        <?php
                            while(have_posts()){
                                the_post(); ?>
                                                        <div class="list-cards">
                                                        
                                                        <div class="content"><p class="category-archive"><?php
                                                                            $posttags = get_the_tags();
                                                                            if ($posttags) {
                                                                            $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                            echo $first_tag->name;
                                                                            }
                                                                            ?></p>
                                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                                </div> 
                            <?php } ?>
                                                    
                                                                                       
                                        </section>
                                        
                                                        
                                 </div>
                        </div>
                <div class="sidebar">
                        <div class="most-recent">
                            <h2>Lo último</h2><br>
                            <?php
                            $homePagePosts = new WP_Query(array(
                                    'posts_per_page' => 5
                            ));
                             while($homePagePosts->have_posts()) {
                                    $homePagePosts->the_post(); ?>
                            <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4><br>
                            <?php }?>
                        </div>
                        <div class="most-popular">
                                <h2>Lo más visto</h2><br>
                                <?php
$args = array(
    'posts_per_page' => 4,
    'meta_key' => 'post_views',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
);

$popular_posts = new WP_Query( $args );
while ( $popular_posts->have_posts() ) : $popular_posts->the_post();?>

    <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4><br>
    <?php 

endwhile; ?>
                        </div>
                        
                        
                </div>
        </div>

        <?php get_footer(); ?>