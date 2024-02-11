

<?php get_header(); ?>
        
<!-- Swiper -->

    <div class="swiper mySwiper hero-slider">

    
        <div class="swiper-wrapper hero-slider-wrapper">
        
       
        <div class="swiper-slide hero-slides">
            
        <?php
                date_default_timezone_set('America/Guayaquil');
                include 'tvguide.php';

                $numero_dia_semana = date('N');

                // Obtener la hora actual
                $hora_actual = time();

                // Verificar si hay programación para el día de la semana actual

                $programa_actual = null;

                    date_default_timezone_set('America/Guayaquil');
                    $dia_actual = strtolower(date('l')); // Obtener el nombre del día en minúsculas (lunes, martes, etc.)
                    $hora_actual = strtotime(date('H:i')); // Obtener la hora actual en formato de tiempo UNIX

                    $programa_actual = null;
                    $programa_siguiente = null;
                    $programa_posterior = null;
                    $programa_otro = null;
                                    

                    foreach ($programas[$dia_actual] as $programa) {
                        $hora_inicio_programa = strtotime($programa['hora_inicio']);
                        $hora_fin_programa = $hora_inicio_programa + ($programa['duracion'] * 60);
                        $tiempo_faltante = $hora_fin_programa - $hora_actual;
                        $tiempo_faltante_minutos = round($tiempo_faltante / 60);
                        // Calcular la duración total del programa en segundos
                        $duracion_total_programa = ($programa['duracion'] * 60);

                        // Calcular el tiempo transcurrido del programa actual en segundos
                        $tiempo_transcurrido_segundos = $hora_actual - $hora_inicio_programa;

                        // Calcular el porcentaje de tiempo transcurrido
                        $porcentaje_transcurrido = ($tiempo_transcurrido_segundos / $duracion_total_programa) * 100;
                                            

                        if ($hora_actual >= $hora_inicio_programa && $hora_actual < $hora_fin_programa) {
                            $programa_actual = $programa;

                            $index_siguiente = array_search($programa, $programas[$dia_actual]) + 1;
                            if (isset($programas[$dia_actual][$index_siguiente])) {
                                $programa_siguiente = $programas[$dia_actual][$index_siguiente];
                            }

                            $index_posterior = array_search($programa, $programas[$dia_actual]) + 2;
                            if (isset($programas[$dia_actual][$index_posterior])) {
                                $programa_posterior = $programas[$dia_actual][$index_posterior];
                            }

                            $index_otro = array_search($programa, $programas[$dia_actual]) + 3;
                            if (isset($programas[$dia_actual][$index_otro])) {
                                $programa_otro = $programas[$dia_actual][$index_otro];
                            }

                            break; // Termina el bucle una vez que se ha encontrado el programa actual
                        }
                    }

                ?>
                <div class="caption-container">
                    <div class="caption"><p>Estamos dando</p><h4 style="text-transform: uppercase;"><?php echo $programa_actual['nombre']; ?></h4><button><a style="color: white;" href="<?php echo site_url('/livestream') ?>"> VER EN VIVO</a></button></div>
                    
                </div>
                <div class="overlay-lqam"></div>
                <div><img src="<?php echo $programa_actual['imagen']; ?>" alt=""></div>
          </div>
            <div class="swiper-slide hero-slides">
                <div class="caption-container">
                    <div class="caption"><p>Luenes a Viernes</p><h4>GRAN CHAPARRAL</h4><button><a style="color: white;" href="">VER MÁS</a></button></div>
                </div>
                <div class="overlay-lqam"></div>
                <div><img src="http://cientist84.es/wp-content/uploads/2024/02/EL-GRAN-CHAPARRAL.jpg" alt=""></div>
            </div>
          <div class="swiper-slide hero-slides">
                <div class="caption-container">
                    <div class="caption"><p>Lunes a Viernes 21h00</p><h4>LA QUIERO A MORIR</h4><button><a style="color: white;" href="">VER MÁS</a></button></div>
                </div>
                <div class="overlay-lqam"></div>
                <div><img src="http://cientist84.es/wp-content/uploads/2024/02/LA-QUIERO-A-MORIR.jpg" alt=""></div>
          </div>
           
          <div class="swiper-slide hero-slides">
                <div class="caption-container">
                    <div class="caption"><p>Sábados y Domingos 18h00</p><h4>BUTACA PREMIER</h4><button><a style="color: white;" href="">VER MÁS</a></button></div>
                </div>
                <div class="overlay-lqam"></div>
                <div><img src="http://cientist84.es/wp-content/uploads/2024/02/BUTACA-PREMIERE.jpg" alt=""></div>
          </div>
        
        </div>
        <div class="swiper-pagination"></div>
        

    </div>
    
    
    
    <div class="homepage-container">  
    <!-- Swiper Carousel -->
            <div class="homepage-container-wrapper">
             
            
              
                        <div class="video-container">
                    
                            <div class="video-container-wrapper">
                    
                                <div class="body-wrapper"><div class="big-title"><h2>ÚLTIMOS EPISODIOS</h2><div class="big-title-meta"><P>Revive aquí toda la programación de Oromartv </P><p class="button">VER MÁS</p></div></div></div>
                                <div class="swiper swiper-videos ultimos-videos-wrapper-slides">
                                    <div class="swiper-wrapper swiper-wrapper-videos">

                                        <?php 
                                        
                                        $homePageVideos = new WP_Query(array(
                                            'posts_per_page' => 8,
                                            'category_name' => 'red-oromar',
                                           
                                        ));

                                        while($homePageVideos->have_posts()) {
                                            $homePageVideos->the_post(); ?>
                                        
                                            <div class="swiper-slide video-slide">
                                                <div class="play">
                                                    <span><div class="play-video-icon"><i class="bi bi-play-fill"></i></div></span>
                                                    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('custom-size')?>" alt=""></a>
                                                </div>
                                                <a href="<?php the_permalink() ?>"><p><?php echo wp_trim_words( get_the_title(), 10, ' <span class="leer-mas">Leer más</span>'); ?></p></a></div>
                                        <?php } ?>
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                    
                            </div>
                            <div class="overlay"></div>
                        </div>
                        <div class="ad-banner-top"><div class="article-ad">
                                    <div class="rotate"><p>Publicidad</p></div>
                                    <!-- GPT AdSlot 1 for Ad unit 'ANUNCIO_SUPERIOR' ### Size: [[980,120],[980,90],[970,250],[970,90],[930,180],[728,250],[728,90],[480,320],[468,90],[336,280],[250,360],[320,100],[320,50],[300,250],[300,100],[300,50],[250,360],[250,250],[200,200]] -->
<div id='div-gpt-ad-9278160-1'>
 
</div>
<!-- End AdSlot 1 -->


                                 </div></div>  
                      
                                <div class="tendencias-container">
                                    <section class="tendencias">
                                        
                                    <div class="body-wrapper"><h2>PORTADA</h2><p class="today-is" id="fecha-actual"><?php date_default_timezone_set('America/Guayaquil'); $fecha_actual=date('dM'); echo $fecha_actual;  ?></p></div>
                                        <div class="four-square">
                                            <?php
                                            $internacionalesPosts = new WP_Query(array(
                                                    'posts_per_page' => 1,
                                                    'category_name' => 'politica',                                                  
                                            ));?>
                                            <?php if ($internacionalesPosts->have_posts() ) : while ($internacionalesPosts->have_posts() ) :$internacionalesPosts->the_post(); ?>
                                       
                                            <div class="square-items">
                                                <div class="imagen-square">
                                                    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('main-post') ?>" alt=""></a>
                                                </div>
                                                <div class="title-square">
                                                    <a style="" href="<?php the_permalink() ?>"><h3><?php echo wp_trim_words( get_the_title(), 20); ?></h3></a>
                                                </div>
                                            </div>
                                                        <?php endwhile; wp_reset_postdata(); else: ?>
                                                        <article>
                                                            <p>No hay contenido a mostrar</p>
                                                        </article>
                                                        <?php endif; ?>                     
                                        </div>
                                       
                                        
                                        <div class="tendencias-wrapper">
                                            <p class="category-lmt" style="margin-top: 0px !important; margin-bottom:0px !important;">4 Noticias de hoy</p>
                                            <ol>
                                                                <?php
                                                                $PortadaPagePosts = new WP_Query(array(
                                                                    'posts_per_page' => 4,
                                                                    'category__not_in' => array(14266, 942),
                                                                ));

                                                                $count = 0; // Contador para controlar el número de publicaciones mostradas



                                                                if ($PortadaPagePosts->have_posts()) : while ($PortadaPagePosts->have_posts() && $count < 4) : $PortadaPagePosts->the_post();
                                                                        // Obtener todas las categorías de la publicación
                                                                        $categories = get_the_category();

                                                                        // Verificar si hay al menos una categoría
                                                                        if ($categories) {
                                                                            // Seleccionar la primera categoría (puedes ajustar esto según tus necesidades)
                                                                            $first_category = $categories[0];
                                                                            ?>
                                            <li class="clase-marker">
                                            <article>
        
                                                <div class="tendencias-card"><a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a><span><?php
                                                        $categories = get_the_category();

                                                        // Verifica si hay categorías asociadas a la entrada
                                                        if ($categories) {
                                                            $first_category = $categories[0]; // Obtiene la primera categoría

                                                            // Imprime el enlace a la categoría
                                                            echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                                        }
                                                        ?></span><div class="icons-post"><div class="date"><p><?php
                                                            // Obtener la marca de tiempo de la entrada
                                                            $post_timestamp = get_the_time('U');

                                                            // Obtener la fecha relativa "hace tantos días"
                                                            $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';

                                                            // Mostrar la fecha relativa
                                                            echo $post_date_diff;
                                                            ?></p></div><div class="icon-post-comment" ><a href="<?php the_permalink() ?>?showComments=1"><i class="bi bi-chat-left-fill"></i><p><?php
                                                            $comments_count = get_comments_number(); // Obtiene el número de comentarios
                            
                                                            if ($comments_count != 0) {
                                                                echo '<p style="line-height: 12px;">(' . $comments_count . ')</p>';
                                                            } else {
                                                                echo '';
                                                            }
                                                            ?></p></a></div></div></div>
                                                <div class="tendencias-imagen"><a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('custom-size')?>" alt=""></a></div>
                                            </article>
                                            </li>
                                                <?php } endwhile; wp_reset_postdata(); else: ?>
                                            <article>
                                                <p>No hay contenido a mostrar</p>
                                            </article>
                                            <?php endif; ?>
                                            </ol>
                                        </div>
                                    </section>
                            
                                </div>


                                 <div class="ad-banner-top">
                                    <div class="article-ad">
                                        <div class="rotate"><p>Publicidad</p></div>
                                        <!-- GPT AdSlot 1 for Ad unit 'ANUNCIO_MEDIO' ### Size: [[980,120],[980,90],[970,250],[970,90],[930,180],[728,250],[728,90],[480,320],[468,90],[336,280],[250,360],[320,100],[320,50],[300,250],[300,100],[300,50],[250,360],[250,250],[200,200]] -->
                                        <div id='div-gpt-ad-9959793-1'>
                                        
                                        </div>
                                        <!-- End AdSlot 1 -->


                                    </div>
                                </div>                       

                    
                                <section class="noticias-oromar">
                    
                        <div class="noticias-wrapper">
                        <div class="horarios">
                
                
                <?php
                date_default_timezone_set('America/Guayaquil');
                include 'tvguide.php';

                $numero_dia_semana = date('N');

                // Obtener la hora actual
                $hora_actual = time();

                // Verificar si hay programación para el día de la semana actual

                $programa_actual = null;

                    date_default_timezone_set('America/Guayaquil');
                    $dia_actual = strtolower(date('l')); // Obtener el nombre del día en minúsculas (lunes, martes, etc.)
                    $hora_actual = strtotime(date('H:i')); // Obtener la hora actual en formato de tiempo UNIX

                    $programa_actual = null;
                    $programa_siguiente = null;
                    $programa_posterior = null;
                    $programa_otro = null;
                                    

                    foreach ($programas[$dia_actual] as $programa) {
                        $hora_inicio_programa = strtotime($programa['hora_inicio']);
                        $hora_fin_programa = $hora_inicio_programa + ($programa['duracion'] * 60);
                        $tiempo_faltante = $hora_fin_programa - $hora_actual;
                        $tiempo_faltante_minutos = round($tiempo_faltante / 60);
                        // Calcular la duración total del programa en segundos
                        $duracion_total_programa = ($programa['duracion'] * 60);

                        // Calcular el tiempo transcurrido del programa actual en segundos
                        $tiempo_transcurrido_segundos = $hora_actual - $hora_inicio_programa;

                        // Calcular el porcentaje de tiempo transcurrido
                        $porcentaje_transcurrido = ($tiempo_transcurrido_segundos / $duracion_total_programa) * 100;
                                            

                        if ($hora_actual >= $hora_inicio_programa && $hora_actual < $hora_fin_programa) {
                            $programa_actual = $programa;

                            $index_siguiente = array_search($programa, $programas[$dia_actual]) + 1;
                            if (isset($programas[$dia_actual][$index_siguiente])) {
                                $programa_siguiente = $programas[$dia_actual][$index_siguiente];
                            }

                            $index_posterior = array_search($programa, $programas[$dia_actual]) + 2;
                            if (isset($programas[$dia_actual][$index_posterior])) {
                                $programa_posterior = $programas[$dia_actual][$index_posterior];
                            }

                            $index_otro = array_search($programa, $programas[$dia_actual]) + 3;
                            if (isset($programas[$dia_actual][$index_otro])) {
                                $programa_otro = $programas[$dia_actual][$index_otro];
                            }

                            break; // Termina el bucle una vez que se ha encontrado el programa actual
                        }
                    }

                ?>
                <div class="horarios-wrapper">
                    <div class="row-header">
                    <div class="active-program active-program-fp">
                        <div class="program-info">
                            <p id="hora"></p>
                            <p id="hora"></p>

    <script>
        function mostrarHoraConSegundos() {
    var elementoHora = document.getElementById('hora');
    var fecha = new Date(); // Obtiene la fecha y hora actual
    var hora = fecha.getHours();
    var minutos = fecha.getMinutes();
    var segundos = fecha.getSeconds();

    // Agrega un cero delante si los minutos o segundos son menores que 10
    minutos = minutos.toString().padStart(2, '0');
    segundos = segundos.toString().padStart(2, '0');

    var horaConSegundos = hora + ":" + minutos + ":" + segundos;

    // Muestra la hora actualizada con minutos y segundos de dos dígitos
    elementoHora.textContent = horaConSegundos;
}

// Actualiza la hora cada segundo
setInterval(mostrarHoraConSegundos, 1000);

// Muestra la hora actual en el momento de cargar la página
mostrarHoraConSegundos();
    </script>
                            <h4>Al Aire Ahora</h4>
                            <p><?php echo $programa_actual['nombre']; ?></p>
                            <p style="color: white; text-transform:none; font-size: 18px; font-family: 'Archivo', sans-serif; font-weight: 400; line-height: 25px; "><?php echo $programa_actual['descripcion'] ?></p>
                    
                        </div>
                        <div class="viendo-ahora">
                         <div><p>Faltan <?php echo $tiempo_faltante_minutos ?> minutos </p></div>
                             
                            <!-- <div class="envivo-timeline"><p>EN VIVO</p></div> -->
                        </div>
                    </div>
                        
                            <div class="featured-program  featured-program-fp">
                                <a href="<?php echo site_url('/livestream') ?>"><img  src="<?php echo $programa_actual['imagen']?>" alt="">
                                <progress value="<?php echo $porcentaje_transcurrido?>" max="100"></progress>
                                <div class="overlay"></div></a>
                            </div>
                        
                    </div>
                    <div class="timeline timeline-frontpage">
                    
                        <div class="item-middle item-middle-fp">
                            <div>
                                <h4>A continuación</h4>
                                <p><?php echo $programa_siguiente['nombre']; ?></p>
                            </div>
                            <div>
                                <p><?php echo $programa_siguiente['hora_inicio'];?></p>
                            </div>
                        </div>
                        <div class="item-final item-final-fp">
                            <div><h4>Más adelante</h4>
                                <p><?php echo $programa_posterior['nombre']; ?></p>
                            </div>
                            <div>
                                <p><?php echo $programa_posterior['hora_inicio']; ?></p>
                            </div>
                        </div>
                        <div class="item-final item-final-fp">
                            <div><h4>Más adelante</h4>
                                <p><?php echo $programa_otro['nombre']; ?></p>
                            </div>
                            <div>
                                <p><?php echo $programa_otro['hora_inicio']; ?></p>
                            </div>
                        </div>
                        </div>
                </div>
                <p class="titulo-vertical-horarios">TV EN VIVO<p>
                </div>    
                <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 1,
                                        'category_name' => 'politica',
                                        'offset' => '1'
                                                          
                                        ));?>
                                        <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) : $homePagePosts->the_post(); ?>                   
                    
                        <?php endwhile; wp_reset_postdata(); else: ?>
                            <article>
                                <p>No hay contenido a mostrar</p>
                            </article>
                            <?php endif; ?>
                           
                            <div class="noticias-list noticias-list-lms">
                                
                             
                                <div>  
                                    <div class="category-lmt"><a href="http://localhost:10008/category/politica/"><p style="color:white">En Política</p></a></div>
                                        
                                    <div class="noticias-list-flex noticias-list-flex-tendencias">
                                    <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 3,
                                        'category_name' => 'politica',
                                        'offset' => 2                                  
                                        
                                        ));?>
                                        <?php if ($homePagePosts->have_posts()) : while ($homePagePosts->have_posts()) : $homePagePosts->the_post();?>    
                                        <div class="noticias-card-fila noticias-card-fila-tendencias">
                                        <div class="author-avatar">
                                                                                            <?php
                                                    // Obtener el ID del autor de la publicación actual
                                                    $author_id = get_the_author_meta('ID');

                                                    // Mostrar el avatar del autor
                                                    echo get_avatar($author_id, 90); // El segundo parámetro es el tamaño del avatar en píxeles
                                                    ?>
                                        </div>    
                                        <div class="news-card">
                                            <div class="meta-post"><p><?php the_author() ?></p><p class="date">
                                                    <?php
                                                    // Obtener la marca de tiempo de la entrada
                                                    $post_timestamp = get_the_time('U');
                                                    // Obtener la fecha relativa "hace tantos días"
                                                    $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';
                                                    // Mostrar la fecha relativa
                                                    echo $post_date_diff;
                                                    ?></p><span><a href="<?php the_permalink()?>?showComments=1"><i class="fa-solid fa-message"></i></a></span>
                                                </div>
                                                <li class="li-card">
                                                    <a href="<?php the_permalink()?>">
                                                        <h2><?php the_excerpt()?></h2>
                                                    </a>
                                                </li>
                                                <div class="share-like-tag">
                                                    <div class="share-like">
                                                    <div class="compartir" data-social-icons="socialMedia">
                                                    <i class="bi bi-share-fill"></i>
                                                            <div class="social-icons" id="socialMedia">
                                                                
                                                                <a href="whatsapp://send?text=Ver%20enlace%20aquí%20https://<?php the_permalink() ?>"><i class="bi bi-whatsapp"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?url=https://<?php the_permalink() ?>&text=Tu%20mensaje%20aquí"><i class="bi bi-twitter-x"></i></a>
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Foromartv.com%2F<?php the_permalink() ?>"><i class="bi bi-facebook"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const compartirBtns = document.querySelectorAll('.compartir');

                                                                compartirBtns.forEach(function(btn) {
                                                                    const socialIconsContainer = btn.querySelector('.social-icons');
                                                                    const newsCard = btn.querySelector('.li-card'); // Buscar el ancestro .news-card más cercano

                                                                    btn.addEventListener('mouseover', function() {
                                                                        // Agregar la clase 'show-social' cuando el mouse pasa sobre el botón
                                                                        socialIconsContainer.classList.add('show-social');
                                                                        newsCard.classList.add('soften');
                                                                    });

                                                                    btn.addEventListener('mouseout', function(e) {
                                                                        // Verificar si el mouse está fuera del área del botón
                                                                        if (!e.relatedTarget || !btn.contains(e.relatedTarget)) {
                                                                            // Quitar la clase 'show-social' cuando el mouse deja el botón
                                                                            socialIconsContainer.classList.remove('show-social');
                                                                            newsCard.classList.remove('soften');
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                    </script>
                                                  
                                                  <div class="tag"><p><?php
                                                                            $posttags = get_the_tags();
                                                                            if ($posttags) {
                                                                            $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                            echo $first_tag->name;
                                                                            }
                                                                            ?></p>
                                                    </div>
                                                </div>
                                                <a href="<?php the_permalink() ?>"><div class="pic"><img src="<?php the_post_thumbnail_url('square')?> " alt=""></div></a>
                                        </div>
                                                                                               
                                        </div>
                                                <?php endwhile; wp_reset_postdata(); else: ?>
                                                <article>
                                                    <p>No hay contenido a mostrar</p>
                                                </article>
                                                <?php endif; ?>
                            </div>
                            <div class="noticias-list noticias-list-lms">
                                
                            
                                <div>  
                                    <div class="category-lmt"><a href="http://localhost:10008/category/seguridad/"><p style="color:white">Seguridad</p></a></div>
                                        
                                    <div class="noticias-list-flex noticias-list-flex-tendencias">
                                            <?php
                                                $homePagePosts = new WP_Query(array(
                                                'posts_per_page' => 2,
                                                'category_name' => 'seguridad'
                                            
                                                ));?>
                                                <?php if ($homePagePosts->have_posts()) : while ($homePagePosts->have_posts()) : $homePagePosts->the_post();?>    
                                    <div class="noticias-card-fila noticias-card-fila-tendencias">
                                    <div class="author-avatar">
                                                                                            <?php
                                                    // Obtener el ID del autor de la publicación actual
                                                    $author_id = get_the_author_meta('ID');

                                                    // Mostrar el avatar del autor
                                                    echo get_avatar($author_id, 90); // El segundo parámetro es el tamaño del avatar en píxeles
                                                    ?>
                                        </div>     
                                    <div class="news-card">
                                        <div class="meta-post"><p><?php the_author() ?></p><p class="date">
                                                    <?php
                                                    // Obtener la marca de tiempo de la entrada
                                                    $post_timestamp = get_the_time('U');
                                                    // Obtener la fecha relativa "hace tantos días"
                                                    $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';
                                                    // Mostrar la fecha relativa
                                                    echo $post_date_diff;
                                                    ?></p><span><i class="fa-solid fa-message"></i></span>
                                                </div>
                                                <li><a href="<?php the_permalink()?>"><h2><?php the_excerpt()?></h2></a></li>
                                                <div class="share-like-tag">
                                                    <div class="share-like">
                                                    <div class="compartir" data-social-icons="socialMedia">
                                                    <i class="bi bi-share-fill"></i>
                                                            <div class="social-icons" id="socialMedia">
                                                                
                                                                <a href="whatsapp://send?text=Ver%20enlace%20aquí%20https://<?php the_permalink() ?>"><i class="bi bi-whatsapp"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?url=https://<?php the_permalink() ?>&text=Tu%20mensaje%20aquí"><i class="bi bi-twitter-x"></i></a>
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Foromartv.com%2F<?php the_permalink() ?>"><i class="bi bi-facebook"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const compartirBtns = document.querySelectorAll('.compartir');

                                                                compartirBtns.forEach(function(btn) {
                                                                    const socialIconsContainer = btn.querySelector('.social-icons');
                                                                    const newsCard = btn.querySelector('.li-card'); // Buscar el ancestro .news-card más cercano

                                                                    btn.addEventListener('mouseover', function() {
                                                                        // Agregar la clase 'show-social' cuando el mouse pasa sobre el botón
                                                                        socialIconsContainer.classList.add('show-social');
                                                                        newsCard.classList.add('soften');
                                                                    });

                                                                    btn.addEventListener('mouseout', function(e) {
                                                                        // Verificar si el mouse está fuera del área del botón
                                                                        if (!e.relatedTarget || !btn.contains(e.relatedTarget)) {
                                                                            // Quitar la clase 'show-social' cuando el mouse deja el botón
                                                                            socialIconsContainer.classList.remove('show-social');
                                                                            newsCard.classList.remove('soften');
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                    </script>
                                                  
                                                  <div class="tag"><p><?php
                                                                            $posttags = get_the_tags();
                                                                            if ($posttags) {
                                                                            $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                            echo $first_tag->name;
                                                                            }
                                                                            ?></p>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                                <?php endwhile; wp_reset_postdata(); else: ?>
                                                <article>
                                                    <p>No hay contenido a mostrar</p>
                                                </article>
                                                <?php endif; ?>
                            </div>

                            <div class="article-ad">
                                <div class="article-ad-container">
                                    <div class="rotate"><p>Anuncio</p></div>
                                                                    <!-- /22840647716/INTELIGENTE -->
                                                                    <!-- /22840647716/CUADRADOS -->
                                            <div id='div-gpt-ad-1705317863712-0' style='min-width: 200px; min-height: 200px;'>
                                              
                                            </div>
                                </div>
                            </div>                                

                            <div class="noticias-list noticias-list-lms">
                                
                            
                                <div>  
                                    <div class="category-lmt"><a href="http://localhost:10008/category/entretenimiento/"><p style="color:white">Entretenimiento</p></a></div>
                                        
                                    <div class="noticias-list-flex noticias-list-flex-tendencias noticias-list-flex-entretenimiento">
                                    <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 2,
                                        'category_name' => 'entretenimiento',
                                        ));?>
                                        <?php if ($homePagePosts->have_posts()) : while ($homePagePosts->have_posts()) : $homePagePosts->the_post();?>    
                                        <div class="noticias-card-fila noticias-card-fila-tendencias">
                                            <div class="author-avatar">
                                                                                                <?php
                                                        // Obtener el ID del autor de la publicación actual
                                                        $author_id = get_the_author_meta('ID');

                                                        // Mostrar el avatar del autor
                                                        echo get_avatar($author_id, 90); // El segundo parámetro es el tamaño del avatar en píxeles
                                                        ?>
                                            </div> 
                                            <div class="news-card">
                                                    <div class="meta-post"><p><?php the_author() ?></p><p class="date">
                                                        <?php
                                                        // Obtener la marca de tiempo de la entrada
                                                        $post_timestamp = get_the_time('U');
                                                        // Obtener la fecha relativa "hace tantos días"
                                                        $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';
                                                        // Mostrar la fecha relativa
                                                        echo $post_date_diff;
                                                        ?></p><span><i class="fa-solid fa-message"></i></span>
                                                    </div>
                                                    <li><a href="<?php the_permalink()?>"><h2><?php the_excerpt()?></h2></a></li>
                                                    <div class="share-like-tag">
                                                    <div class="share-like">
                                                    <div class="compartir" data-social-icons="socialMedia">
                                                    <i class="bi bi-share-fill"></i>
                                                            <div class="social-icons" id="socialMedia">
                                                                
                                                                <a href="whatsapp://send?text=Ver%20enlace%20aquí%20https://<?php the_permalink() ?>"><i class="bi bi-whatsapp"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?url=https://<?php the_permalink() ?>&text=Tu%20mensaje%20aquí"><i class="bi bi-twitter-x"></i></a>
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Foromartv.com%2F<?php the_permalink() ?>"><i class="bi bi-facebook"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const compartirBtns = document.querySelectorAll('.compartir');

                                                                compartirBtns.forEach(function(btn) {
                                                                    const socialIconsContainer = btn.querySelector('.social-icons');
                                                                    const newsCard = btn.querySelector('.li-card'); // Buscar el ancestro .news-card más cercano

                                                                    btn.addEventListener('mouseover', function() {
                                                                        // Agregar la clase 'show-social' cuando el mouse pasa sobre el botón
                                                                        socialIconsContainer.classList.add('show-social');
                                                                        newsCard.classList.add('soften');
                                                                    });

                                                                    btn.addEventListener('mouseout', function(e) {
                                                                        // Verificar si el mouse está fuera del área del botón
                                                                        if (!e.relatedTarget || !btn.contains(e.relatedTarget)) {
                                                                            // Quitar la clase 'show-social' cuando el mouse deja el botón
                                                                            socialIconsContainer.classList.remove('show-social');
                                                                            newsCard.classList.remove('soften');
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                    </script>
                                                  
                                                  <div class="tag"><p><?php
                                                                            $posttags = get_the_tags();
                                                                            if ($posttags) {
                                                                            $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                            echo $first_tag->name;
                                                                            }
                                                                            ?></p>
                                                    </div>
                                                </div>
                                                <a href="<?php the_permalink() ?>"><div class="pic"><img src="<?php the_post_thumbnail_url('square')?> " alt=""></div></a>
                                            </div>
                                        </div>
                                                <?php endwhile; wp_reset_postdata(); else: ?>
                                                <article>
                                                    <p>No hay contenido a mostrar</p>
                                                </article>
                                                <?php endif; ?>
                            </div>
                            <div class="noticias-list noticias-list-lms">
                                
                                <div>  
                                    <div class="category-lmt"><a href="http://localhost:10008/category/deportes/"><p style="color:white">Deportes</p></a></div>
                                        
                                    <div class="noticias-list-flex noticias-list-flex-deportes">
                                            <?php
                                                $homePagePosts = new WP_Query(array(
                                                'posts_per_page' => 2,
                                                'category_name' => 'deportes-nti'
                                                ));?>
                                                <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>    
                                        <div class="noticias-card-fila noticias-card-fila-deportes noticias-card-fila-deportes-dd">
                                        <div class="author-avatar">
                                                                                            <?php
                                                    // Obtener el ID del autor de la publicación actual
                                                    $author_id = get_the_author_meta('ID');

                                                    // Mostrar el avatar del autor
                                                    echo get_avatar($author_id, 90); // El segundo parámetro es el tamaño del avatar en píxeles
                                                    ?>
                                        </div>     
                                        <div class="news-card">
                                            <div class="meta-post"><p><?php the_author() ?></p><p class="date">
                                                    <?php
                                                    // Obtener la marca de tiempo de la entrada
                                                    $post_timestamp = get_the_time('U');
                                                    // Obtener la fecha relativa "hace tantos días"
                                                    $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';
                                                    // Mostrar la fecha relativa
                                                    echo $post_date_diff;
                                                    ?></p><span><i class="fa-solid fa-message"></i></span>
                                                </div>
                                                <li><a href="<?php the_permalink()?>"><h2><?php the_excerpt()?></h2></a></li>
                                                <div class="share-like-tag">
                                                    <div class="share-like">
                                                    <div class="compartir" data-social-icons="socialMedia">
                                                    <i class="bi bi-share-fill"></i>
                                                            <div class="social-icons" id="socialMedia">
                                                                
                                                                <a href="whatsapp://send?text=Ver%20enlace%20aquí%20https://<?php the_permalink() ?>"><i class="bi bi-whatsapp"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?url=https://<?php the_permalink() ?>&text=Tu%20mensaje%20aquí"><i class="bi bi-twitter-x"></i></a>
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Foromartv.com%2F<?php the_permalink() ?>"><i class="bi bi-facebook"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const compartirBtns = document.querySelectorAll('.compartir');

                                                                compartirBtns.forEach(function(btn) {
                                                                    const socialIconsContainer = btn.querySelector('.social-icons');
                                                                    const newsCard = btn.querySelector('.li-card'); // Buscar el ancestro .news-card más cercano

                                                                    btn.addEventListener('mouseover', function() {
                                                                        // Agregar la clase 'show-social' cuando el mouse pasa sobre el botón
                                                                        socialIconsContainer.classList.add('show-social');
                                                                        newsCard.classList.add('soften');
                                                                    });

                                                                    btn.addEventListener('mouseout', function(e) {
                                                                        // Verificar si el mouse está fuera del área del botón
                                                                        if (!e.relatedTarget || !btn.contains(e.relatedTarget)) {
                                                                            // Quitar la clase 'show-social' cuando el mouse deja el botón
                                                                            socialIconsContainer.classList.remove('show-social');
                                                                            newsCard.classList.remove('soften');
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                    </script>
                                                  
                                                  <div class="tag"><p><?php
                                                                            $posttags = get_the_tags();
                                                                            if ($posttags) {
                                                                            $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                            echo $first_tag->name;
                                                                            }
                                                                            ?></p>
                                                    </div>
                                                </div>
                                                <a href="<?php the_permalink() ?>"><div class="pic"><img src="<?php the_post_thumbnail_url('square')?> " alt=""></div></a>
                                            
                                            </div>
                                        </div>
                                        <?php endwhile; wp_reset_postdata(); else: ?>
                                                    <article>
                                                        <p>No hay contenido a mostrar</p>
                                                    </article>
                                                    <?php endif; ?>
                                    </div>
                                                
                                                         
                                </div>  
                              
                            </div>
                                                
                                                         
                        </div>  
                               
                        </div>                    
                        </section>
                        <section class="noticias-oromar deportes-oromar">
                    
                        <div class="noticias-wrapper deportes-wrapper">
                        
                        
                        <div class="ad-lmt">
                            <div class="article-ad-container">
                                <div class="rotate"><p>Publicidad</p></div>
                                <!-- /22840647716/INTELIGENTE -->
                                <div id='div-gpt-ad-1704333725174-0' style='min-width: 200px; min-height: 200px;'>
                            
                                </div>
                            </div>
                        </div>    
                        <?php
                                                    $homePagePosts = new WP_Query(array(
                                                            'posts_per_page' => 1,
                                                            'category_name' => 'economia',
                                                            'offset' => 1
                                                          
                                                    ));?>
                                                    <?php if ($homePagePosts->have_posts()) : while ($homePagePosts->have_posts()) :$homePagePosts->the_post(); ?>             
                        <div class="noticias-main-post deportes-main-post">
                                                    
                                    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('square') ?>" alt=""></a>
                                 
                                    <div><h2><?php the_title() ?></h2></div>
                                    
                            </div>
                            <?php endwhile; wp_reset_postdata(); else: ?>
                            <article>
                                <p>No hay contenido a mostrar</p>
                            </article>
                            <?php endif; ?>
                            <!-- <div class="noticias-list">
                            <?php
                                                    $homePagePosts = new WP_Query(array(
                                                            'posts_per_page' => 4,
                                                            'category__not_in' => array(14266),
                                                            'offset' => 1
                                                    ));?>
                                                    <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>
                                
                                <?php endwhile; wp_reset_postdata(); else: ?>
                            <article>
                                <p>No hay contenido a mostrar</p>
                            </article>
                            <?php endif; ?>
                            </div>  -->
                            <div class="noticias-list deportes-list">
                              
                                <div>  
                                    <div class="category-lmt category-deportes"><p>Entrevistas Destacadas</p></div>
                                           
                                    <div class="noticias-list-flex ">
                                             
                                        <div class="noticias-card-top">
                                        <?php
                                                $interviewPagePosts = new WP_Query(array(
                                                'posts_per_page' => 1,
                                                'category_name' => 'entrevistas',
                                                
                                                ));?>
                                                <?php if ($interviewPagePosts->have_posts() ) : while ($interviewPagePosts->have_posts() ) :$interviewPagePosts->the_post(); ?>
                                            <div class="last-interview">
                                                <div class="title"><?php the_title();?></div>
                                                <div class="thumbnail"><a href=""><img src="<?php the_post_thumbnail_url('custom-size');?>" alt=""></a></div>
                                            </div>
                                            <?php endwhile; wp_reset_postdata(); else: ?>
                                                            <article>
                                                                <p>No hay contenido a mostrar</p>
                                                            </article>
                                                            <?php endif; ?>
                                        </div>
                                                
                                                <?php
                                                    $interviewPagePosts = new WP_Query(array(
                                                    'posts_per_page' => 2,
                                                    'category_name' => 'entrevistas',
                                                    
                                                    'offset' => 1
                                                    ));?>
                                                    <?php if ($interviewPagePosts->have_posts() ) : while ($interviewPagePosts->have_posts() ) :$interviewPagePosts->the_post(); ?> 
                                        <div class="noticias-card-fila noticias-card-fila-hover noticias-card-fila-column deportes-card-fila noticias-card-fila-deportes">
                                            <a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
                                            <div class="date date-deportes"><p class="">
                                                        <?php
                                                            // Obtener la marca de tiempo de la entrada
                                                            $post_timestamp = get_the_time('U');

                                                            // Obtener la fecha relativa "hace tantos días"
                                                            $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';

                                                            // Mostrar la fecha relativa
                                                            echo $post_date_diff;
                                                            ?></p>
                                            </div>
                                                    
                                        </div>
                                        <?php endwhile; else: ?>
                                                    <article>
                                                        <p>No hay contenido a mostrar</p>
                                                    </article>
                                                    <?php endif; ?>
                                    </div>
                                                
                                                         
                                </div>  
                                <div class="titulo-vertical titulo-vertical-deportes ">
                                    <h2>ENTREVISTAS</h2>
                                </div> 
                            </div>
                            <div class="noticias-list noticias-list-lms">
                                
                                <div>  
                                    <div class="category-lmt"><p>Manabí</p></div>
                                        
                                    <div class="noticias-list-flex noticias-list-flex-deportes">
                                    <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 2,
                                        'category_name' => 'manabi'
                                        ));?>
                                        <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>    
                                        <div class="noticias-card-fila noticias-card-fila-deportes">
                                        <div class="author-avatar">
                                                                                                <?php
                                                        // Obtener el ID del autor de la publicación actual
                                                        $author_id = get_the_author_meta('ID');

                                                        // Mostrar el avatar del autor
                                                        echo get_avatar($author_id, 90); // El segundo parámetro es el tamaño del avatar en píxeles
                                                        ?>
                                            </div> 
                                            <div class="news-card">
                                                    <div class="meta-post"><p><?php the_author() ?></p><p class="date">
                                                        <?php
                                                        // Obtener la marca de tiempo de la entrada
                                                        $post_timestamp = get_the_time('U');
                                                        // Obtener la fecha relativa "hace tantos días"
                                                        $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';
                                                        // Mostrar la fecha relativa
                                                        echo $post_date_diff;
                                                        ?></p><span><i class="fa-solid fa-message"></i></span>
                                                    </div>
                                                    <li><a href="<?php the_permalink()?>"><h2><?php the_excerpt()?></h2></a></li>
                                                    <div class="share-like-tag">
                                                    <div class="share-like">
                                                    <div class="compartir" data-social-icons="socialMedia">
                                                    <i class="bi bi-share-fill"></i>
                                                            <div class="social-icons" id="socialMedia">
                                                                
                                                                <a href="whatsapp://send?text=Ver%20enlace%20aquí%20https://<?php the_permalink() ?>"><i class="bi bi-whatsapp"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?url=https://<?php the_permalink() ?>&text=Tu%20mensaje%20aquí"><i class="bi bi-twitter-x"></i></a>
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Foromartv.com%2F<?php the_permalink() ?>"><i class="bi bi-facebook"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const compartirBtns = document.querySelectorAll('.compartir');

                                                                compartirBtns.forEach(function(btn) {
                                                                    const socialIconsContainer = btn.querySelector('.social-icons');
                                                                    const newsCard = btn.querySelector('.li-card'); // Buscar el ancestro .news-card más cercano

                                                                    btn.addEventListener('mouseover', function() {
                                                                        // Agregar la clase 'show-social' cuando el mouse pasa sobre el botón
                                                                        socialIconsContainer.classList.add('show-social');
                                                                        newsCard.classList.add('soften');
                                                                    });

                                                                    btn.addEventListener('mouseout', function(e) {
                                                                        // Verificar si el mouse está fuera del área del botón
                                                                        if (!e.relatedTarget || !btn.contains(e.relatedTarget)) {
                                                                            // Quitar la clase 'show-social' cuando el mouse deja el botón
                                                                            socialIconsContainer.classList.remove('show-social');
                                                                            newsCard.classList.remove('soften');
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                    </script>
                                                  
                                                  <div class="tag"><p><?php
                                                                            $posttags = get_the_tags();
                                                                            if ($posttags) {
                                                                            $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                            echo $first_tag->name;
                                                                            }
                                                                            ?></p>
                                                    </div>
                                                </div>
                                                <div class="pic"><img src="<?php the_post_thumbnail_url('square')?> " alt=""></div>
                                            </div>
                                                    
                                        </div>
                                        <?php endwhile; else: ?>
                                                    <article>
                                                        <p>No hay contenido a mostrar</p>
                                                    </article>
                                                    <?php endif; ?>
                                    </div>
                                    <div class="category-lmt"><a href="http://localhost:10008/category/internacionales/"><p style="color:white">Internacionales</p></a></div>
                                        
                                    <div class="noticias-list-flex noticias-list-flex-deportes">
                                    <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 2,
                                        'category_name' => 'internacionales',
                                    
                                        ));?>
                                        <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>    
                                        <div class="noticias-card-fila noticias-card-fila-flex noticias-card-fila-deportes">
                                        <div class="author-avatar">
                                                                                                <?php
                                                        // Obtener el ID del autor de la publicación actual
                                                        $author_id = get_the_author_meta('ID');

                                                        // Mostrar el avatar del autor
                                                        echo get_avatar($author_id, 90); // El segundo parámetro es el tamaño del avatar en píxeles
                                                        ?>
                                            </div> 
                                            <div class="news-card">
                                                    <div class="meta-post"><p><?php the_author() ?></p><p class="date">
                                                        <?php
                                                        // Obtener la marca de tiempo de la entrada
                                                        $post_timestamp = get_the_time('U');
                                                        // Obtener la fecha relativa "hace tantos días"
                                                        $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';
                                                        // Mostrar la fecha relativa
                                                        echo $post_date_diff;
                                                        ?></p><span><i class="fa-solid fa-message"></i></span>
                                                    </div>
                                                    <li><a href="<?php the_permalink()?>"><h2><?php the_excerpt()?></h2></a></li>
                                                    <div class="share-like-tag">
                                                        <div class="share-like">
                                                        <div class="compartir" data-social-icons="socialMedia">
                                                    <i class="bi bi-share-fill"></i>
                                                            <div class="social-icons" id="socialMedia">
                                                                
                                                                <a href="whatsapp://send?text=Ver%20enlace%20aquí%20https://<?php the_permalink() ?>"><i class="bi bi-whatsapp"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?url=https://<?php the_permalink() ?>&text=Tu%20mensaje%20aquí"><i class="bi bi-twitter-x"></i></a>
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Foromartv.com%2F<?php the_permalink() ?>"><i class="bi bi-facebook"></i></a>
                                                            </div>
                                                        </div>
                                                            </div>
                                                        <div class="tag"><p><?php
                                                                                $posttags = get_the_tags();
                                                                                if ($posttags) {
                                                                                $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                                echo $first_tag->name;
                                                                                }
                                                                                ?></p>
                                                        </div>
                                                    </div>
                                                    <a href="<?php the_permalink() ?>"><div class="pic"><img src="<?php the_post_thumbnail_url('square')?> " alt=""></div></a>
                                            </div>  
                                        </div>
                                        <?php endwhile; else: ?>
                                                    <article>
                                                        <p>No hay contenido a mostrar</p>
                                                    </article>
                                                    <?php endif; ?>
                                    </div> 
                                    <div class="article-ad-b">
                                        <div class="rotate"><p>Publicidad</p></div>
                                        <!-- /22840647716/CUADRADOS -->
<div id='div-gpt-ad-1705318144011-0' style='min-width: 200px; min-height: 200px;'>
 
</div>
                                    </div>  
                                             
                                    <div class="category-lmt"><a href="http://localhost:10008/category/Manta/"><p style="color:white">Manta</p></a></div>
                                        
                                        <div class="noticias-list-flex noticias-list-flex-deportes">
                                            <?php
                                                $homePagePosts = new WP_Query(array(
                                                'posts_per_page' => 2,
                                                'category_name' => 'Manta',
                                            
                                                ));?>
                                                <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>    
                                            <div class="noticias-card-fila noticias-card-fila-deportes">
                                            <div class="author-avatar">
                                                                                                <?php
                                                        // Obtener el ID del autor de la publicación actual
                                                        $author_id = get_the_author_meta('ID');

                                                        // Mostrar el avatar del autor
                                                        echo get_avatar($author_id, 90); // El segundo parámetro es el tamaño del avatar en píxeles
                                                        ?>
                                            </div> 
                                            <div class="news-card">
                                                    <div class="meta-post"><p><?php the_author()  ?></p><p class="date">
                                                        <?php
                                                        // Obtener la marca de tiempo de la entrada
                                                        $post_timestamp = get_the_time('U');
                                                        // Obtener la fecha relativa "hace tantos días"
                                                        $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';
                                                        // Mostrar la fecha relativa
                                                        echo $post_date_diff;
                                                        ?></p><span><i class="fa-solid fa-message"></i></span>
                                                    </div>
                                                    <li><a href="<?php the_permalink()?>"><h2><?php the_excerpt()?></h2></a></li>
                                                    <div class="share-like-tag">
                                                    <div class="share-like">
                                                    <div class="compartir" data-social-icons="socialMedia">
                                                    <i class="bi bi-share-fill"></i>
                                                            <div class="social-icons" id="socialMedia">
                                                                
                                                                <a href="whatsapp://send?text=Ver%20enlace%20aquí%20https://<?php the_permalink() ?>"><i class="bi bi-whatsapp"></i></a>
                                                                <a href="https://twitter.com/intent/tweet?url=https://<?php the_permalink() ?>&text=Tu%20mensaje%20aquí"><i class="bi bi-twitter-x"></i></a>
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Foromartv.com%2F<?php the_permalink() ?>"><i class="bi bi-facebook"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const compartirBtns = document.querySelectorAll('.compartir');

                                                                compartirBtns.forEach(function(btn) {
                                                                    const socialIconsContainer = btn.querySelector('.social-icons');
                                                                    const newsCard = btn.querySelector('.li-card'); // Buscar el ancestro .news-card más cercano

                                                                    btn.addEventListener('mouseover', function() {
                                                                        // Agregar la clase 'show-social' cuando el mouse pasa sobre el botón
                                                                        socialIconsContainer.classList.add('show-social');
                                                                        newsCard.classList.add('soften');
                                                                    });

                                                                    btn.addEventListener('mouseout', function(e) {
                                                                        // Verificar si el mouse está fuera del área del botón
                                                                        if (!e.relatedTarget || !btn.contains(e.relatedTarget)) {
                                                                            // Quitar la clase 'show-social' cuando el mouse deja el botón
                                                                            socialIconsContainer.classList.remove('show-social');
                                                                            newsCard.classList.remove('soften');
                                                                        }
                                                                    });
                                                                });
                                                            });
                                                    </script>
                                                  
                                                  <div class="tag"><p><?php
                                                                            $posttags = get_the_tags();
                                                                            if ($posttags) {
                                                                            $first_tag = reset($posttags); // Obtiene la primera etiqueta
                                                                            echo $first_tag->name;
                                                                            }
                                                                            ?></p>
                                                    </div>
                                                </div>
                                                <a href="<?php the_permalink() ?>"><div class="pic"><img src="<?php the_post_thumbnail_url('square')?> " alt=""></div></a>
                                            </div>
                                            </div>
                                            <?php endwhile; else: ?>
                                                        <article>
                                                            <p>No hay contenido a mostrar</p>
                                                        </article>
                                                        <?php endif; ?>
                                        </div>                        
                                </div>  
                            </div>
                            
                            
                        </div>
                    
                    </section>
                    
                    <section class="guardianes-oromar">                   
                        <div class="noticias-wrapper">                      
                            <div class="guardianes-wrapper">
                                <div class="big-title"><h2>GUARDIANES DEL PACÍFICO</h2><P>Un espacio comprometido con el cuidado de nuestras playas y océanos.</P><p class="button">VER MÁS</p></div>
                            </div>   
                            <!-- Swiper -->
                            
                            <div class="swiper mySwiper swiper-guardianes">
                                <div class="swiper-wrapper">
                                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                <div class="swiper-slide guardianes-slide"><img src="<?php the_post_thumbnail_url('main-post') ?>" alt=""><div class="overlay"></div><div><h3><?php echo wp_trim_words( get_the_title(), 11)?></h3></div></div>
                                <?php endwhile; else: ?>
                                    <article>
                                    <p>No hay contenido a mostrar </p>
                                    </article>
                                        <?php endif; ?>
                                </div>
                            </div>   
                            <div class="overlay"></div>          
                        </div>
                        
                    </section>
                    <section class="noticias-oromar">
                    
                        <div class="vida-sana-wrapper">
                       
                        <?php
                                                    $homePagePosts = new WP_Query(array(
                                                            'posts_per_page' => 1,
                                                            'category_name' => 'salud',
                                                  
                    
                                                    ));?>
                                                    <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>
                    
                        <div class="noticias-main-post">
                            
                                    <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url('square') ?>" alt=""></a>
                                  
                                    <div><h2><?php the_title() ?></h2></div>
                                    
                            </div>
                            <?php endwhile; else: ?>
                            <article>
                                <p>No hay contenido a mostrar</p>
                            </article>
                            <?php endif; ?>
                            
                            <div class="noticias-list">
                           
                            <div>  
                                    <div class="category-lmt"><p>Vida Sana</p></div>
                                            
                                    <div class="noticias-list-flex">
                                    <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 5,
                                        'category_name' => 'salud',
                                        'offset' => 1
                                        ));?>
                                        <?php if ($homePagePosts->have_posts() ) : while ($homePagePosts->have_posts() ) :$homePagePosts->the_post(); ?>
                                        <div class="noticias-card-fila noticias-card-fila-vs">
                                            <a href="<?php the_permalink() ?>"><h2><?php the_title() ?></h2></a>
                                            <div class="date date-vs"><p class="">
                                                        <?php
                                                            // Obtener la marca de tiempo de la entrada
                                                            $post_timestamp = get_the_time('U');

                                                            // Obtener la fecha relativa "hace tantos días"
                                                            $post_date_diff = human_time_diff($post_timestamp, current_time('timestamp')) . ' atrás';

                                                            // Mostrar la fecha relativa
                                                            echo $post_date_diff;
                                                            ?></p>
                                            </div>
                                                    
                                        </div>
                                        <?php endwhile; else: ?>
                                                    <article>
                                                        <p>No hay contenido a mostrar</p>
                                                    </article>
                                                    <?php endif; ?>
                                    </div>
                                               
                                                         
                                </div>  
                                <div class="titulo-vertical">
                                    <h2>VIDA SANA</h2>
                                </div> 
                            </div>
                            </div>
                        </div>
                    
                                </section>
                         
                    
    
                
                      
            </div>
            

          
    </div>

<?php get_footer(); ?>