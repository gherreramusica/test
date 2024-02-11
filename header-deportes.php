<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head();?>
</head>
<body class="body-deportes">
    <div class="container-header-deportes">
        <header class="header-deportes">
            <div class="header-deportes-wrapper">
                <div class="menu">
                <div class="toggle"><div class="bar"></div></div>
                    <div class="logo-deportes">
                        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/imagenes/OTV800.png" alt=""></a>
                    </div>
                    <nav class="nav-deportes">
                    <li><a style="color: white" href="<?php echo site_url('/') ?>">Inicio</a></li> 
                        <li><a style="color: white" href="<?php echo site_url('/noticias') ?>">Noticias</a></li>
                        <li><a style="color: white" href="<?php echo site_url('/livestream') ?>">Señal en vivo</a></li>
                                  
                    </nav>
                    
                </div>
                
                <div class="right-header">
                        
                <?php if(is_user_logged_in()){?>
                                <li class="profile-avatar" ><span><?php echo get_avatar(get_current_user_id(), 40); ?></span><span><a style="color: white" href="<?php echo wp_logout_url('/') ?>">Salir</a></span></li>
                            <?php } else { ?>
                                <div class="user"><div class=""><a href="<?php echo esc_url(site_url('/wp-login.php')) ?>">Ingresar</a></div></div>                    
                            <?php } ?>  
                            <div class="social-media-header">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-youtube"></i></a>
                                <a href=""><i class="bi bi-tiktok"></i></a>
                            </div>
                        <div class="al-aire">
                            <div class="vivo-header-deportes vivo"><a href="<?php echo site_url('/livestream') ?>"><span></span><span></span><p>Al AIRE</p></a></div>
                        </div>
                    </div>
            </div>
        </header>
        <div class="nav-menu">
            <div class="nav-menu-wrapper">
                <div class="offcanvas-header">
                    <h3>Secciones</h3>
                    <hr>
                </div>
                
                <div class="section-menu">
                    <div class="sectionA">
                        <div><a href="<?php echo site_url('/noticias') ?>">NOTICIAS</a></div>
                        <div><a href="<?php echo site_url('/deportes') ?>">DEPORTES</a></div>
                        <div><a href="<?php echo site_url('/programas') ?>">PROGRAMAS</a></div>
                    </div>
                    <div class="sectionB">
                        <div><a href="<?php echo site_url('/noticias') ?>">EN VIVO</a></div>
                        <div><a href="<?php echo site_url('/deportes') ?>">COMUNIDAD</a></div>
                        <div><a href="<?php echo site_url('/programas') ?>">TRIVIAS</a></div>
                    </div>
                </div><br>
                <div class="offcanvas-header">
                    <h3>Links Utiles</h3>
                    <hr>
                </div>
                <div class="section-menu">
                    <div class="sectionA">
                    <div><a href="<?php echo site_url('/noticias') ?>">LINEA EDITORIAL</a></div>
                        <div><a href="<?php echo site_url('/deportes') ?>">RENDICION DE CUENTAS</a></div>
                        <div><a href="<?php echo site_url('/noticias') ?>">POLITICA DE PRIVACIDAD</a></div>
                    </div>
                    <div class="sectionB">
                        <div><a href="<?php echo site_url('/noticias') ?>">EN VIVO</a></div>
                        <div><a href="<?php echo site_url('/deportes') ?>">COMUNIDAD</a></div>
                        <div><a href="<?php echo site_url('/programas') ?>">TRIVIAS</a></div>
                    </div>
                </div>
                <div class="social-media">
                                                        <div class="icon"><a href=""><i class="fa-brands fa-facebook"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-brands fa-x-twitter"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-brands fa-whatsapp"></i></a></div>
                                                        <div class="icon"><a href=""><i class="fa-regular fa-envelope"></i></a></div>
                                                        
                                                </div>
            </div>
            
        </div>