<?php get_header('category'); ?>
        
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
                                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('main-post') ?>" alt=""></a></div>
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
                        
                        <div class="newsletter">
                                <div class="mail-chimp">
                                        <div id="mc_embed_shell">
        
                                                <div id="mc_embed_signup">
                                                                <h2>Suscríbete a nuestra Newsletter</h2>
                                                        <form action="https://oromartv.us10.list-manage.com/subscribe/post?u=87992478698b2160f5217831e&amp;id=4abab499a5&amp;f_id=00dbc8e5f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self" novalidate="">
                                                                <div id="mc_embed_signup_scroll">
                                                                
                                                                        <div class="mc-field-group">
                                                                                <input type="email" placeholder="e-mail" name="EMAIL" class="required email" id="mce-EMAIL" required="" value="">
                                                                        </div>
                                                                        <div id="mce-responses" class="clear foot">
                                                                                <div class="response" id="mce-error-response" style="display: none;"></div>
                                                                                <div class="response" id="mce-success-response" style="display: none;"></div>
                                                                        </div>
                                                                        <div aria-hidden="true" style="position: absolute; left: -5000px;">
                                                                                /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
                                                                                <input type="text" name="b_87992478698b2160f5217831e_4abab499a5" tabindex="-1" value="">
                                                                        </div>
                                                                        <div class="optionalParent">
                                                                                <div class="clear foot">
                                                                                        <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Enviar">
                                                                                        
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </form>
                                                </div>
                                         </div>
        
                                </div>
                                </div>
                </div>
        </div>

        <?php get_footer(); ?>