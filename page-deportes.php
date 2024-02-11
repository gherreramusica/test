<?php /* Template Name: Deportes */ ?>

        <?php get_header('deportes'); ?>
        
         <div class="homepage-noticias">
                
                        <div class="main-out">
                         <!-- <div class="imagen"><img width="100%" src="<?php the_post_thumbnail_url('page-banner') ?>" alt=""></div>  -->
                                <main class="main-top">
                        
                                        <?php
                                        $homePagePosts = new WP_Query(array(
                                                'posts_per_page' => 1,
                                                'category_name' => 'deportes-nti'
                        
                                        ));
                                         while($homePagePosts->have_posts()) {
                                                $homePagePosts->the_post(); ?>
                                                <section class="main-post">
                                                        <div class="">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('main-post') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                 </section>
                                                <?php }
                        
                                         ?>
                                        <?php
                                        $homePagePosts = new WP_Query(array(
                                                'posts_per_page' => 4,
                                                'offset' => 1
                        
                                        ));
                                         while($homePagePosts->have_posts()) {
                                                $homePagePosts->the_post(); ?>
                                                <section class="list-post">
                                                        <div class="list-cards">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                        <?php }?>
                                                </section>
                        
                                </main>
                                
                                <main class="main-middle">
                                <div class="body-wrapper"><h3 class="noticias-heading-title">Copa América</h3></div><br>

                                        <?php
                                        $internacionalesPosts = new WP_Query(array(
                                                'posts_per_page' => 1,
                                                'category_name' => 'deportes-nti'
                        
                                        ));
                                         while($internacionalesPosts->have_posts()) {
                                                $internacionalesPosts->the_post(); ?>
                                                <section class="main-post">
                                                        <div class="">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('main-post') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                 </section>
                                                <?php }
                        
                                         ?>
                                        <?php
                                        $internacionalesPosts = new WP_Query(array(
                                                'posts_per_page' => 4,
                                                'category_name' => 'deportes-nti',
                                                'offset' => 1
                        
                                        ));
                                         while($internacionalesPosts->have_posts()) {
                                                $internacionalesPosts->the_post(); ?>
                                                <section class="list-post">
                                                        <div class="list-cards">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                        <?php }?>
                                                </section>
                        
                                </main>
                                
                                <main class="main-middle">
                                <div class="body-wrapper" ><h3 class="noticias-heading-title">Ciclismo</h3></div><br>
                                        <?php
                                        $saludPosts = new WP_Query(array(
                                                'posts_per_page' => 1,
                                                'category_name' => 'deportes-nti',
                        
                        
                                        ));
                                         while($saludPosts->have_posts()) {
                                                $saludPosts->the_post(); ?>
                                                <section class="main-post">
                                                        <div class="">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('main-post') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                 </section>
                                                <?php }
                        
                                         ?>
                                        <?php
                                        $saludPosts = new WP_Query(array(
                                                'posts_per_page' => 4,
                                                'category_name' => 'deportes-nti',
                                                'offset' => 1
                        
                                        ));
                                         while($saludPosts->have_posts()) {
                                                $saludPosts->the_post(); ?>
                                                <section class="list-post">
                                                        <div class="list-cards">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                        <?php }?>
                                                </section>
                        
                                </main>
                                <main class="main-middle">
                                <div class="body-wrapper" ><h3 class="noticias-heading-title">Surf</h3></div><br>
                                        <?php
                                        $saludPosts = new WP_Query(array(
                                                'posts_per_page' => 1,
                                                'category_name' => 'deportes-nti',
                        
                        
                                        ));
                                         while($saludPosts->have_posts()) {
                                                $saludPosts->the_post(); ?>
                                                <section class="main-post">
                                                        <div class="">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('main-post') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                 </section>
                                                <?php }
                        
                                         ?>
                                        <?php
                                        $saludPosts = new WP_Query(array(
                                                'posts_per_page' => 4,
                                                'category_name' => 'deportes-nti',
                                                'offset' => 1
                        
                                        ));
                                         while($saludPosts->have_posts()) {
                                                $saludPosts->the_post(); ?>
                                                <section class="list-post">
                                                        <div class="list-cards">
                                                                <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                                                <div class="content"><p><?php
$categories = get_the_category();

// Verifica si hay categorías asociadas a la entrada
if ($categories) {
    $first_category = $categories[0]; // Obtiene la primera categoría

    // Imprime el enlace a la categoría
    echo '<a style="color: black;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
}
?></p>
                                                                <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        
                                                                <p class="date"><?php echo get_the_date() ?></p></div>
                                                        </div>
                                                        <?php }?>
                                                </section>
                        
                                </main>
                        </div>
                        <div class="sidebar">
                                <div class="latest-container"><div class="lastest-deportes"><h2>LO ÚLTIMO</h2><br>
                                <?php
                                                $homePagePosts = new WP_Query(array(
                                                'posts_per_page' => 6,
                                                'category_name' => 'deportes-nti'
                                                ));?>
                                                <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>    
                                <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4><br>
                                <?php endwhile; wp_reset_postdata(); else: ?>
                                                    <article>
                                                        <p>No hay contenido a mostrar</p>
                                                    </article>
                                                    <?php endif; ?>
                                                    </div></div>
                                <div class="most-popular-container"><div class="most-popular">
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
                        
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4><br>
                            <?php 
                        
                        endwhile; ?>
                                </div></div>
                                
                                <div class="mail-container"><div class="mail-chimp">
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