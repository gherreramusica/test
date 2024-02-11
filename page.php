<?php get_header(); ?>
        
        <div class="single-container">
                <div class="single-main">
                        <div class="left-side-bar">
                       <a class="category-single" href="<?php the_permalink() ?>"><p class="categoria"><?php the_category() ?></p></a>
                                <div class="social-media">
                                        <p>Síguenos</p><br>
                                        <a href=""><i class="fa-brands fa-facebook"></i></a><a href=""><i class="fa-brands fa-x-twitter"></i></a><a href=""><i class="fa-brands fa-instagram"></i></a><a href=""><i class="fa-brands fa-youtube"></i></a>
                                </div>
                
                
                
                        </div>
                        <div class="main-single">
                                <section class="single">
                
                                        <?php
                
                                        /* Start the Loop */
                                        while ( have_posts() ) : the_post();
                                        $post_views = get_post_views(get_the_ID());?>
                
                                        <p class="vistas"><i class="fa-solid fa-eye">&nbsp</i><?php echo sprintf( _n( '%s vista', '%s vistas', $post_views, 'your_textdomain' ), $post_views );?></p><br>
                
                                        <?php
                                        endwhile; ?>
                                        <div class="single-content">
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2><br>
                                        <div class="single-card"><a href="<?php the_permalink();?>"><img width="100%" src="<?php the_post_thumbnail_url('page-banner')?>" alt=""></a></div>
                                        <p class="date"><?php echo get_the_date() ?></p><br>
                
                                        <p class="the-content"><?php the_content() ?></p></div>
                                </section>
                
                
                        </div>
                        <div class="right-side-bar">
                
                                        <div class="most-popular-single">
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
                
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4><br><hr>
                
                            <?php
                
                        endwhile; ?>
                                        </div>
                
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
                        <h3 class="heading-title">Más de oromartv.com</h3>
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
                        <h3 class="heading-title">Lo más reciente</h3>
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