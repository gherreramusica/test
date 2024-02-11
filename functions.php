<?php

function mortal_theme() {
    
    // Estilos Principal CSS
    wp_enqueue_style( 'style', get_theme_file_uri('/build/style-index.css'));

    // Estilos icons CSS
    wp_enqueue_style( 'icon-style', get_theme_file_uri('/build/index.css'));

    // Estilos Swiper CSS
    wp_enqueue_style( 'swiper-style', get_theme_file_uri('/css/swiper-bundle.min.css'));

    // Scripts Principal JavaScript
    wp_enqueue_script( 'indexJs', get_theme_file_uri('/build/index.js'), NULL, '1.1', true);
    wp_enqueue_script( 'swiper', get_theme_file_uri('/src/modules/swiper-bundle.min.js'), NULL, '1.0', true);
    wp_enqueue_script( 'sliders', get_theme_file_uri('/src/modules/sliders.js'), NULL, '1.0', true);
 
}

add_action( 'wp_enqueue_scripts', 'mortal_theme' );

     add_theme_support( 'post-thumbnails' );
     add_image_size( 'custom-size', 200, 132 , true ); // 220 pixels wide by 180 pixels tall, soft proportional crop mode
     add_image_size('single-size', 1200, 600, true);
     add_image_size( 'mini-size', 150, 100 , true );
     add_image_size('main-post', 600, 400, true);
     add_image_size('page-banner', 1000, 800, true);
     add_image_size('square', 700, 700, true);

function guia_de_programacion(){
    if(is_page('livestream')){
        wp_enqueue_script('guia_de_tv', get_template_directory_uri() . '/guia.js', NULL, '1.0', true);
        wp_enqueue_script('comentarios', get_template_directory_uri() . '/comentarios.js', NULL, '1.0', true);   
    }
}

add_action('wp_enqueue_scripts', 'guia_de_programacion' );     

     // Función para contar visualizaciones de un post.
function set_post_views() {
    if ( is_single() ) {
        $post_ID = get_the_ID();
        $count = get_post_meta( $post_ID, 'post_views', true );

        if ( $count == '' ) {
            delete_post_meta( $post_ID, 'post_views' );
            add_post_meta( $post_ID, 'post_views', 1 );
        } else {
            update_post_meta( $post_ID, 'post_views', ++$count );
        }
    }
}
add_action( 'wp', 'set_post_views' );

// Función para obtener el número de visualizaciones de un post
function get_post_views( $post_ID ){
    $count = get_post_meta($post_ID, 'post_views', true);

    if ( $count == '' ){
        delete_post_meta($post_ID, 'post_views');
        add_post_meta($post_ID, 'post_views', 0);
        return 0;
    }

    return $count;
};
  

// Redirects
add_action('admin_init', 'redirectSubsToFrontend');
    function redirectSubsToFrontend(){

    $ourCurrentUser = wp_get_current_user();

    if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber' ){
        wp_redirect(site_url());
        exit;
    }
}

add_action('wp_loaded', 'noSubsAdminBar');

    function noSubsAdminBar(){
    $ourCurrentUser = wp_get_current_user();

    if(count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber' ){
        show_admin_bar(false);
      
    }
}

add_filter('login_headerurl','ourHeaderurl');

function ourHeaderurl() {
    return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS(){
    wp_enqueue_style( 'style', get_theme_file_uri('/style.css'));
    wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' );
    wp_enqueue_style( 'style-css', get_theme_file_uri('/package/swiper-bundle.min.css'));
}

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/imagenes/OTV800.png);
		height:100%;
		width:100%;
		
		background-repeat: no-repeat;
        padding-bottom: 30px;
        

        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function cambiar_texto_read_more( $texto ) {
    return 'Leer más'; // Cambia 'Leer más' por el texto que desees utilizar
}
add_filter( 'excerpt_more', 'cambiar_texto_read_more' );


// Registrar el tipo de contenido personalizado
function registrar_custom_post_type_video() {
    $labels = array(
        
        'name'               => 'Video',
        'singular_name'      => 'Video',
        'menu_name'          => 'Video Post',
        'add_new'            => 'Agregar Nuevo',
        'add_new_item'       => 'Agregar Nuevo Video',
        'edit_item'          => 'Editar Video',
        'new_item'           => 'Nuevo Video',
        'view_item'          => 'Ver Video',
        'search_items'       => 'Buscar Videos',
        'not_found'          => 'No se encontraron videos',
        'not_found_in_trash' => 'No se encontraron videos en la papelera',
      
    );

    $args = array(
        'show_in_rest'        => true,
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'videos' ),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'taxonomies'         => array('category', 'post_tag'),
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'           => 'dashicons-video-alt3', // Puedes cambiar esto según tu preferencia.
    );

    register_post_type( 'video', $args );
}

add_action( 'init', 'registrar_custom_post_type_video' );


function mostrar_duracion_video_youtube($video_id) {
    $api_key = 'AIzaSyBax_l3_c9JIIwTGNk3WoCgmB-7RxLNJoY'; // Reemplaza 'TU_CLAVE_DE_API' con tu clave de API de YouTube
    $api_url = 'https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=' . $video_id . '&key=' . $api_key;

    $response = wp_remote_get($api_url);

    if (is_wp_error($response)) {
        return 'Error al obtener la duración del video.';
    }

    $data = json_decode(wp_remote_retrieve_body($response));

    if ($data && isset($data->items[0]->contentDetails->duration)) {
        $duration = $data->items[0]->contentDetails->duration;
        $parsed = new DateInterval($duration);
        $formatted = $parsed->format('%H:%I:%S'); // Formato HH:MM:SS
        return $formatted;
    } else {
        return 'Duración no disponible';
    }
}

function mostrar_ultimo_video_publicado($atts) {
    $atts = shortcode_atts(
        array(
            'max_results' => 1, // Solo necesitas el último video
            'order' => 'date',  // Ordenar por fecha
        ),
        $atts,
        'ultimo_video_publicado'
    );

    $playlist_id = 'PL3ZULHBXc2LnT9CdBTHNR4qcmFLZyPOvx'; // Reemplaza con tu ID de lista de reproducción
    $api_key = 'AIzaSyB4cbbHZq7UrHacswezIx4KpO4jH7uk0D4'; // Reemplaza con tu clave de API

    // URL de la API de YouTube
    $api_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet,contentDetails&playlistId=$playlist_id&key=$api_key&maxResults={$atts['max_results']}";
    $response = wp_remote_get($api_url);

    if (!is_wp_error($response)) {
        $videos = json_decode(wp_remote_retrieve_body($response));

        if (!empty($videos->items)) {
            $video = $videos->items[0]; // Toma el primer video
            $video_id = $video->contentDetails->videoId;

            // Genera el iframe
            $output = '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $video_id . '?autoplay=1&mute=1&enablejsapi=1&origin=' . esc_url(home_url()) . '" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';

            return $output;
        }
    }

    return 'No se encontró un video disponible en la lista de reproducción.';
}

add_shortcode('ultimo_video_publicado', 'mostrar_ultimo_video_publicado');

/**
 * Función para limitar el texto por un número de líneas específico.
 * 
 * @param string $text El texto que se va a truncar.
 * @param int $num_lines Número de líneas permitidas.
 * @return string Texto truncado según el número de líneas especificado.
 */
function limitar_por_lineas($text, $num_lines) {
    // Convertir el texto en un array de líneas divididas por saltos de línea
    $lines = explode("\n", $text);

    // Tomar solo las primeras $num_lines líneas del texto
    $truncated = implode("\n", array_slice($lines, 0, $num_lines));

    return $truncated;
}


$show_comments = isset($_GET['showComments']) && $_GET['showComments'] == 1;

// Mostrar la sección de comentarios solo si $show_comments es verdadero
if ($show_comments) {
    comments_template();
}


add_filter('get_avatar', 'custom_avatar', 1, 5);

function custom_avatar($avatar, $id_or_email, $size, $default, $alt) {
    $user = false;

    if (is_numeric($id_or_email)) {
        $id = (int) $id_or_email;
        $user = get_user_by('id', $id);
    } elseif (is_object($id_or_email)) {
        if (!empty($id_or_email->user_id)) {
            $id = (int) $id_or_email->user_id;
            $user = get_user_by('id', $id);
        }
    } else {
        $user = get_user_by('email', $id_or_email);
    }

    if ($user && is_object($user)) {
        $profile_picture = get_user_meta($user->ID, 'profile_picture', true);
        if ($profile_picture) {
            $avatar = "<img src='{$profile_picture}' alt='{$alt}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
        }
    }

    return $avatar;
}


add_filter('ai1wm_exclude_content_from_export', 'ignoreCertainFiles');

function ignoreCertainFiles($exclude_filters){
    $exclude_filters[] = 'themes/oromartv/node-modules';
    return $exclude_filters;
}

?>