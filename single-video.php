<?php 
/* 
Template Name: Video  
*/ 

?>

<?php get_header('noticias'); ?>
        
        <div class="single-container">
                <div class="single-main">
                        <div class="left-side-bar">
                       <a class="category-single" href="<?php the_permalink() ?>"><p class="categoria"><?php the_category() ?></p></a>
                        </div>
                        <div class="main-single">
                                <section class="single">
                                        
                                        <!-- <?php
                
                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();
                                        $post_views = get_post_views(get_the_ID());?>
                
                                        <p class="vistas"><i class="fa-solid fa-eye">&nbsp</i><?php echo sprintf( _n( '%s vista', '%s vistas', $post_views, 'your_textdomain' ), $post_views );?></p>
                
                                        <?php
                                        endwhile; ?> -->
                                        <div class="single-content">
                                               
                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                                                <div class="the-extract"><p><?php the_excerpt() ?></p></div>                              
                                                <div class="single-card"><?php
                                                        $video_url = get_post_meta(get_the_ID(), 'video_url', true);
                                                        echo '<iframe width="100%" height="350" style="border:none" src="' . esc_url($video_url) . '"></iframe>';
                                                        ?>
                                                </div>                                              
                                                <div class="avatar-div"><span class="avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span></div> 
                                                <div class="author"><p><?php echo get_the_author() ?></p></div>       
                                                <div class="the-date"><p class="date"><?php echo get_the_date() ?></p></div>
                                                <div class="social-media">
                                                        <div class="icon"><a href=""><i class="fa-brands fa-facebook"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-brands fa-x-twitter"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-brands fa-whatsapp"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-regular fa-envelope"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-solid fa-gift"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-solid fa-link"></i></a></div>
                                                </div>
                                                <div class="save-audio">
                                                        <div class="save"><a href=""><i class="fa-regular fa-bookmark"></i></a></div>
                                                        
                                                </div>
                                                <div class="the-content"><p><?php the_content() ?></p></div>
                                                <div class="google"><a href=""><img  src="http://cientist84.es/wp-content/uploads/2023/12/google-news-icon-logo-symbol-free-png.webp" alt=""></a><p>Síguenos también en Google News</p></div>
                                        </div>
                                </section>
                                
                
                        </div>
                                        
                        <div class="right-side-bar">
                
                                <div class="most-popular-single">
                                        <h2>LO MÁS VISTO</h2><br>
                                        <?php
                
                                        $args = array(
                                        'posts_per_page' => 4,
                                        'meta_key' => 'post_views',
                                        'orderby' => 'meta_value_num',
                                        'order' => 'DESC'
                                        );
                                
                                        $popular_posts = new WP_Query( $args );
                                        while ( $popular_posts->have_posts() ) : $popular_posts->the_post();?>
                                
                                        <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4><br><hr>
                                
                                        <?php
                                
                                        endwhile; ?>
                                
                
                                        <!-- <div class="boletin">
                                                <h4>Suscríbete a nuestra Newsletter</h4><br>
                                                <h5>Información de actualidad siempre verificada</h4>
                                                <div class="newsletter">
                                                        <input class="campo" type="email" placeholder="Ingresa tu correo" name="email" id="email">
                                                        <input class="button" type="button" value="Suscribir">
                                                </div>
                                                <div class="condiciones">
                                                        <input class="checkbox" type="checkbox" name="Aceptar terminos y condiciones" id="">
                                                        <span>Aceptar términos y condiciones</span>
                                                </div>
                                                <p>Al darle click acepto las políticas de privacidad y políticas de cookies</p>
                                        </div> -->
                                </div>
                        </div>
                </div>
                <div class="single-related">
                <div class="body-wrapper"><h2 class="noticias-heading-title">MÁS NOTICIAS</h2></div>
                        <div class="related-post">
                
                        <?php
                                                $homePagePosts = new WP_Query(array(
                                                        'posts_per_page' => 4,
                                                        'offset' => 1
                
                                                ));
                                                 while($homePagePosts->have_posts()) {
                                                        $homePagePosts->the_post(); ?>
                                <div>
                                        <a href="<?php the_permalink() ?>"><img width="100%" src="<?php the_post_thumbnail_url('custom-size')?>" alt=""></a>
                                        <a href="<?php the_permalink() ?>">
                                                <h2><?php the_title() ?></h2>
                                        </a>
                                </div>
                                <?php } ?>
                        </div>
                        <div class="body-wrapper"><h2 class="noticias-heading-title">LO MÁS RECIENTE</h2></div>
                        <div class="related-post">
                
                        <?php
                                                $homePagePosts = new WP_Query(array(
                                                        'posts_per_page' => 4,
                                                        'offset' => 1
                
                                                ));
                                                 while($homePagePosts->have_posts()) {
                                                        $homePagePosts->the_post(); ?>
                                <div>
                                        <a href="<?php the_permalink() ?>"><img width="100%" src="<?php the_post_thumbnail_url('custom-size')?>" alt=""></a>
                                        <a href="<?php the_permalink() ?>">
                                                <h2><?php the_title() ?></h2>
                                        </a>
                                </div>
                                <?php } ?>
                        </div>
                
                </div>

        </div>

        <?php get_footer(); ?>