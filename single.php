<?php get_header('single'); ?>
        
        <div class="single-container">
                <div class="single-main">
                        <div class="left-side-bar">
                       <a class="category-single" href="<?php the_permalink() ?>"><p class="categoria"><?php
$categories = get_the_category();

// Verifica si hay al menos una categoría
if ($categories) {
    $first_category = $categories[0]; // Obtén la primera categoría

    // Muestra la primera categoría en un enlace
    echo '<a class="category-single" href="' . get_category_link($first_category->term_id) . '">';
    echo '<p class="categoria">' . $first_category->name . '</p>';
    echo '</a>';
}
?></p></a>
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
                                                <div class="single-card"><a href="<?php the_permalink();?>"><img width="100%" src="<?php the_post_thumbnail_url('square')?>" alt=""></a></div>                                              
                                                <div class="avatar-div"><span class="avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span></div> 
                                                <div class="author"><p><?php echo get_the_author() ?></p></div>       
                                                <div class="the-date"><p class="date"><?php echo get_the_date() ?></p></div>
                                                <div class="social-media">
                                                        <div class="icon"><a href=""><i class="bi bi-facebook"></i></a></div>
                                                        <div class="icon"><a href=""><i class="bi bi-twitter-x"></i></a></div>
                                                        <div class="icon"><a href=""><i class="bi bi-whatsapp"></i></a></div>
                                                        <div class="icon"><a href=""><i class="bi bi-envelope"></i></a></div>
                                                
                                                        <div class="icon icon-comment" id="iconComment"><a href="<?php the_permalink() ?>?showComments=1"><i class="bi bi-chat-left-fill"></i></a></div>
                                                        <div class="commentCount"><?php
                                                            $comments_count = get_comments_number(); // Obtiene el número de comentarios
                            
                                                            if ($comments_count != 0) {
                                                                echo '<p>(' . $comments_count . ')</p>';
                                                            } else {
                                                                echo '';
                                                            }
                                                            ?></div>
                                                </div>
                                               
                                                <div class="the-content"><p><?php  the_content() ?></p></div>
                                                <div class="google"><a href=""><img  src="http://cientist84.es/wp-content/uploads/2024/02/gn.webp" alt=""></a><p>Síguenos también en Google News</p></div>
                                        </div>
                                </section>
                                
                
                        </div>
                                                        <?php $show_comments = isset($_GET['showComments']) && $_GET['showComments'] == 1;

                                                        // Mostrar la sección de comentarios solo si $show_comments es verdadero
                                                        if ($show_comments) {
                                                        comments_template('/single-comments.php');
                                                        }
                                                        ?>
                                                        
                                                        <script>
        // Función para agregar la clase si la URL contiene "?showContent=1"
        function agregarClaseSiEsNecesario() {
            var url = window.location.href;
            var singlePage = document.querySelector('.main-single');

            if (url.includes('?showComments=1')) {
                document.body.classList.add('overflow');
                singlePage.classList.add('opacity-effect')
            }
        }

        // Llamar a la función cuando la página se carga
        window.onload = function() {
            agregarClaseSiEsNecesario();
        };
    </script>
                                                
                             
                                        
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