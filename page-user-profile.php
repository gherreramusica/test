<?php /* Template Name: Pagina de Perfil */ ?>

<?php
// page-user-profile.php
get_header('live');

// Asegúrate de que solo los usuarios registrados puedan ver esta página
if ( ! is_user_logged_in() ) {
    wp_redirect( home_url() );
    exit;
}

// Obtén los datos del usuario actual
$current_user = wp_get_current_user();

?>
<div class="user-profile-container">
<div class="user-profile">
    <h1>Perfil de Usuario</h1>
    <p>Nombre: <?php echo esc_html( $current_user->display_name ); ?></p>
    <p>Email: <?php echo esc_html( $current_user->user_email ); ?></p>
    <!-- Añade aquí más campos según sea necesario -->
    <?php
// Asegúrate de que este archivo es parte de WordPress
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Salir si se accede directamente
}

// Comprueba si el usuario está logueado
if ( is_user_logged_in() ) {
    $current_user = wp_get_current_user();

    // Comprueba si el formulario ha sido enviado
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_FILES ) ) {
        require_once( ABSPATH . 'wp-admin/includes/admin.php' );
        $file_return = wp_handle_upload( $_FILES['user_image'], array('test_form' => false ) );

        if ( isset( $file_return['error'] ) || isset( $file_return['upload_error_handler'] ) ) {
            // Manejar errores
            return false;
        } else {
            // El archivo se ha subido correctamente
            $filename = $file_return['file'];

            // Realiza acciones adicionales aquí (como actualizar la imagen del perfil de usuario)
        }
    }
    ?>

    <form id="feature_upload" method="post" action="" enctype="multipart/form-data">
        <input type="file" name="user_image" id="user_image">
        <input type="submit" value="Subir Imagen">
        <?php wp_nonce_field( 'user_image', 'user_image_nonce' ); ?>
    </form>

    <?php
} else {
    echo "Debes estar logueado para editar tu perfil.";
}


// Asume que esto está dentro de la verificación de nonce y el manejo de la subida de archivos.
if (isset($file_return['url'])) {
    // Suponiendo que $file_return['url'] contiene la URL de la imagen subida
    $image_url = $file_return['url']; // La URL de la imagen subida
    $user_id = get_current_user_id(); // Obtiene el ID del usuario actual

    // Guarda la URL de la imagen en los metadatos del usuario
    update_user_meta($user_id, 'profile_picture', $image_url);
}

?>
</div>
</div>

<?php
get_footer();
?>
