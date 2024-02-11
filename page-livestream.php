<?php /* Template Name: Livestream */ ?>

<?php get_header('live'); ?>
        

<div class="container-livestream">
<div class="sticky-video">
            <div class="livestream">
                <div class="livestream-wrapper"><iframe width="100%" height="800px" src="https://www.youtube.com/embed/LY2XEQ_SSXA?si=iAN7wNACr0ZAUZuE?&autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            
            
        </div>
    <div class="container-livestream-wrapper">
    <container class="topbar-container topbar-container-display">
            <!-- <div class="volver-a-ver"><p>VUÉLVELO A VER</p></div> -->
            <div class="topbar">
                                <li><p class="guia-programas" data-target="#guia-de-tv" style="color: white" href="">Guía de TV</p></li>
                                <li><p class="comentario-menu" data-target="#comentarios" style="color: white" href="">Comentarios</p><p><?php
                                $comments_count = get_comments_number(); // Obtiene el número de comentarios

                                if ($comments_count != 0) {
                                    echo '<p>(' . $comments_count . ')</p>';
                                } else {
                                    echo '<p>No hay comentarios aún.</p>';
                                }
                                ?></p></li>
                                <li><p class="NA" data-target="#nAnteriores" style="color: white" href="">Noticieros Anteriores</p></li>
                                <li><p class="AR" data-target="#aRebelde" style="color: white" href="<?php echo site_url('/deportes') ?>">Angel Rebelde</p></li>
                                <li><p class="AC" data-target="#Acorralada" style="color: white" href="<?php echo site_url('/programas') ?>">Acorralada</p></li>
                            
                                
                                <li><p class="AC" data-target="#tTorbellino" style="color: white" href="<?php echo site_url('/programas') ?>">Torrente un Torbellino</p></li>
                                <li><p class="AC" data-target="#Jocelito" style="color: white" href="<?php echo site_url('/deportes') ?>">Jocelito la nueva era</p></li>
                                
                                <?php if(is_user_logged_in()){?>
                                    <li class="" ><a style="color: white" href="<?php echo wp_logout_url('/') ?>">Salir</a></li>
                                <?php } else { ?>
                                    <li class="" ><a style="color: white" href="<?php echo esc_url(site_url('/wp-signup.php')) ?>"><i class="fa-solid fa-user"></i> Ingresar</a></li>
                                <?php } ?>
                                
            </div>
            <div class="overlay-topbar"></div>
            </container>
        <div class="timetable">
             <div class="timetable-wrapper" id="timetable"> 
                            <?php
                        
                           include 'tvguide.php';


                        // Obtener el día actual y la hora actual
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
                        }?>
                

                
                <div class="row-header">
                    <div>
                        <div class="featured-program">
                            <img width="75px" height="75px" src="<?php echo $programa_actual['imagen']?>" alt="">
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>        
                <div class="timeline">
                <div class="active-program">
                    <div>
                        <h4>Estas Viendo</h4>
                        <p><?php echo $programa_actual['nombre']; ?></p>
                        
                    </div>
                    <div class="viendo-ahora">
                        <div><p>Faltan <?php echo $tiempo_faltante_minutos ?> minutos </p></div>
                        <progress value="<?php echo $porcentaje_transcurrido?>" max="100"></progress>
                        <div class="envivo-timeline"><p>EN VIVO</p></div>
                    </div>
                </div>
                    <div class="item-middle">
                        <div>
                            <h4>A continuación</h4>
                            <p><?php echo $programa_siguiente['nombre']; ?></p>
                        </div>
                        <div>
                            <p><?php echo $programa_siguiente['hora_inicio'];?></p>
                        </div>
                    </div>
                    <div class="item-final">
                        <div><h4>Más adelante</h4>
                            <p><?php echo $programa_posterior['nombre']; ?></p>
                        </div>
                        <div>
                            <p><?php echo $programa_posterior['hora_inicio']; ?></p>
                        </div>
                    </div>
                    <div class="item-final">
                        <div><h4>Más adelante</h4>
                            <p><?php echo $programa_otro['nombre']; ?></p>
                        </div>
                        <div>
                            <p><?php echo $programa_otro['hora_inicio']; ?></p>
                        </div>
                    </div>    
                    </div>


              
              </div>
           
            </div>
        <div class="livestream-homepage-container">
            
            <div data-content id="comentarios" class="comentarios">
                <?php comments_template('/oromartv-comments.php'); ?>
            </div>
            
            <div class="sidebar-livestream">
            
                        <container class="topbar-container">
            <!-- <div class="volver-a-ver"><p>VUÉLVELO A VER</p></div> -->
            <div class="topbar">
                                <li><p class="guia-programas" data-target="#guia-de-tv" style="color: white" href="">Guía de TV</p></li>
                                <li class="comentario-menu"><p class="comentario-menu" data-target="#comentarios" style="color: white" href="">Comentarios</p><p><?php
                                $comments_count = get_comments_number(); // Obtiene el número de comentarios

                                if ($comments_count != 0) {
                                    echo '<p>(' . $comments_count . ')</p>';
                                } else {
                                    echo '<p>No hay comentarios aún.</p>';
                                }
                                ?></p></li>
                                <li><p class="NA" data-target="#nAnteriores" style="color: white" href="">Noticieros Anteriores</p></li>
                                <li><p class="AR" data-target="#aRebelde" style="color: white" href="<?php echo site_url('/deportes') ?>">Angel Rebelde</p></li>
                                <li><p class="AC" data-target="#Acorralada" style="color: white" href="<?php echo site_url('/programas') ?>">Acorralada</p></li>
                            
                                
                                <li><p class="AC" data-target="#tTorbellino" style="color: white" href="<?php echo site_url('/programas') ?>">Torrente un Torbellino</p></li>
                                <li><p class="AC" data-target="#Jocelito" style="color: white" href="<?php echo site_url('/deportes') ?>">Jocelito la nueva era</p></li>
                                
                                <?php if(is_user_logged_in()){?>
                                    <li class="" ><a style="color: white" href="<?php echo wp_logout_url('/') ?>">Salir</a></li>
                                <?php } else { ?>
                                    <li class="" ><a style="color: white" href="<?php echo esc_url(site_url('/wp-signup.php')) ?>"><i class="fa-solid fa-user"></i> Ingresar</a></li>
                                <?php } ?>
                                
            </div>
            <div class="overlay-topbar"></div>
            </container>
            <div data-content id="guia-de-tv" class="guia-hoy">
                                <?php
                                    // Información de ejemplo de programas y sus horarios
                                     include 'tvguide.php';
                                                                    // Configurar la zona horaria y la configuración local
                                            date_default_timezone_set('America/Guayaquil');
                                            setlocale(LC_TIME, 'es_ES');

                                            // Obtener la fecha y hora actual en español
                                            $fecha_hora_actual = new DateTime('now', new DateTimeZone('America/Guayaquil'));
                                            $fecha_actual = $fecha_hora_actual->format('l, j \d\e F');

                                            // Convertir a minúsculas para asegurar una comparación sin distinción de mayúsculas y minúsculas
                                            $dia_actual_lower = strtolower($fecha_hora_actual->format('l'));

                                            foreach ($programas as $dia => $programas_del_dia) {
                                                $dia_lower = strtolower($dia);

                                                if ($dia_actual_lower === $dia_lower) {
                                                    echo "<h2>$fecha_actual</h2>";
                                                    foreach ($programas_del_dia as $programa) {
                                                        echo "<div class='flex-guide'>";
                                                        echo "<img src='" . $programa['imagen'] . "' alt='" . $programa['nombre'] . "'>";
                                                        echo "<div>";
                                                        echo "<strong>Nombre:</strong> " . $programa['nombre'] . "<br>";
                                                        echo "<strong>Hora de inicio:</strong> " . $programa['hora_inicio'] . "<br>";
                                                        echo "<strong>Descripción:</strong> " . $programa['descripcion'] . "<br>";
                                                        echo "</div></div>";
                                                    }
                                                }
                                            }



                                            ?>
            </div>
                        <section class="list-post" data-content id="nAnteriores" >
                                        <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 10,
                                        'category_name' => 'noticieros-anteriores',
                                                                
                                        
                                        ));
                                        while($homePagePosts->have_posts()) {
                                        $homePagePosts->the_post(); ?>
                                <div class="list-cards">
                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                        <div class="content"><p><?php
                                            $categories = get_the_category();

                                            // Verifica si hay categorías asociadas a la entrada
                                            if ($categories) {
                                                $first_category = $categories[0]; // Obtiene la primera categoría

                                                // Imprime el enlace a la categoría
                                                echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                            }
                                            ?></p>
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                </div>
                                <?php }?>
                                
                        </section>
                        <section class="list-post" data-content id="aRebelde" >
                                        <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 10,
                                        'category_name' => 'angel-rebelde',
                                                                
                                        
                                        ));
                                        while($homePagePosts->have_posts()) {
                                        $homePagePosts->the_post(); ?>
                                <div class="list-cards">
                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                        <div class="content"><p><?php
                                            $categories = get_the_category();

                                            // Verifica si hay categorías asociadas a la entrada
                                            if ($categories) {
                                                $first_category = $categories[0]; // Obtiene la primera categoría

                                                // Imprime el enlace a la categoría
                                                echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                            }
                                            ?></p>
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                </div>
                                <?php }?>
                                
                        </section>
                        <section class="list-post" data-content id="Acorralada" >
                                        <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 10,
                                        'category_name' => 'acorralada',
                                                                
                                        
                                        ));
                                        while($homePagePosts->have_posts()) {
                                        $homePagePosts->the_post(); ?>
                                <div class="list-cards">
                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                        <div class="content"><p><?php
                                            $categories = get_the_category();

                                            // Verifica si hay categorías asociadas a la entrada
                                            if ($categories) {
                                                $first_category = $categories[0]; // Obtiene la primera categoría

                                                // Imprime el enlace a la categoría
                                                echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                            }
                                            ?></p>
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                </div>
                                <?php }?>
                                
                        </section>
                        <section class="list-post" data-content id="tTorbellino" >
                                        <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 10,
                                        'category_name' => 'torrente',
                                                                
                                        
                                        ));
                                        while($homePagePosts->have_posts()) {
                                        $homePagePosts->the_post(); ?>
                                <div class="list-cards">
                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                        <div class="content"><p><?php
                                            $categories = get_the_category();

                                            // Verifica si hay categorías asociadas a la entrada
                                            if ($categories) {
                                                $first_category = $categories[0]; // Obtiene la primera categoría

                                                // Imprime el enlace a la categoría
                                                echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                            }
                                            ?></p>
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                </div>
                                <?php }?>
                                
                        </section>
                        <section class="list-post" data-content id="Jocelito" >
                                        <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 10,
                                        'category_name' => 'jocelito',
                                                                
                                        
                                        ));
                                        while($homePagePosts->have_posts()) {
                                        $homePagePosts->the_post(); ?>
                                <div class="list-cards">
                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                        <div class="content"><p><?php
                                            $categories = get_the_category();

                                            // Verifica si hay categorías asociadas a la entrada
                                            if ($categories) {
                                                $first_category = $categories[0]; // Obtiene la primera categoría

                                                // Imprime el enlace a la categoría
                                                echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                            }
                                            ?></p>
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                </div>
                                <?php }?>
                                
                        </section>
                        <section class="recent-videos">
                            <h2 style="color: white;" >VIDEOS RECIENTES</h2><br>
                        <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 10,
                                        
                                                                
                                        
                                        ));
                                        while($homePagePosts->have_posts()) {
                                        $homePagePosts->the_post(); ?>
                                <div class="list-cards">
                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                        <div class="content"><p><?php
                                            $categories = get_the_category();

                                            // Verifica si hay categorías asociadas a la entrada
                                            if ($categories) {
                                                $first_category = $categories[0]; // Obtiene la primera categoría

                                                // Imprime el enlace a la categoría
                                                echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                            }
                                            ?></p>
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                </div>
                                <?php }?>
                        </section>
                        
            </div>
            <!-- <section class="recent-videos-maxwidth">
            <div class="topbar-sidebar">
                            <li><a style="color: white" href="<?php echo site_url('/noticias') ?>">Guía de TV</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/noticias') ?>">Comentarios</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/noticias') ?>">Noticieros Anteriores</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/deportes') ?>">Pedro Escamoso</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/programas') ?>">Acorralada</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/deportes') ?>">Señal en vivo</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/programas') ?>">Programas</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/programas') ?>">Torrente un Torbellino</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/deportes') ?>">Jocelito la nueva era</a></li>
                        
                            <?php if(is_user_logged_in()){?>
                                <li class="" ><a style="color: white" href="<?php echo wp_logout_url('/') ?>">Salir</a></li>
                            <?php } else { ?>
                                <li class="" ><a style="color: white" href="<?php echo esc_url(site_url('/wp-signup.php')) ?>">Ingresar</a></li>
                            <?php } ?>
                                            
                        </div>
                        <?php
                                        $homePagePosts = new WP_Query(array(
                                        'posts_per_page' => 10,
                                        
                                                                
                                        
                                        ));
                                        while($homePagePosts->have_posts()) {
                                        $homePagePosts->the_post(); ?>
                                <div class="list-cards">
                                        <div class="card"><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url('custom-size') ?>" alt=""></a></div>
                                        <div class="content"><p><?php
                                            $categories = get_the_category();

                                            // Verifica si hay categorías asociadas a la entrada
                                            if ($categories) {
                                                $first_category = $categories[0]; // Obtiene la primera categoría

                                                // Imprime el enlace a la categoría
                                                echo '<a style="color: white;" href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
                                            }
                                            ?></p>
                                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>

                                        <p class="date"><?php echo get_the_date() ?></p></div>
                                </div>
                                <?php }?>
                        </section> -->
            
           
        </div>
    </div>
</div>

<?php get_footer(); ?>