<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <?php wp_head();?>

</head>
<body class="dark">

         
            

      
      
       
        <div class="header-container">
            <header class="header" >
                <div class="wrapper">
                    <div class="menu">
                        <div class="toggle"><div class="bar"></div></div>
                            <div class="logo logo-homepage">
            
                                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/imagenes/OTV400.png" alt=""></a>
                            </div>
                            <nav>
                                <li><a style="color: white" href="<?php echo site_url('/noticias') ?>">Noticieros</a></li>
                                <li><a style="color: white" href="<?php echo site_url('/deportes') ?>">Deportes Oromar</a></li>
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
                                <div class="vivo-header vivo"><a href="<?php echo site_url('/livestream') ?>"><span></span><span></span><p>EN VIVO</p></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="nav-menu">
            <div class="nav-menu-wrapper">
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label>
                        <span class="screen-reader-text"><?php echo _x( 'Buscar en Oromartv', 'label' ); ?></span>
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Buscar en Oromartv', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    </label>
                    <button type="submit" class="search-submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class="offcanvas-header">
                    <h3>secciones</h3>
                    <hr>
                </div>
                
                <div class="section-menu">
                    <div class="sectionA">
                        <div><a href="<?php echo site_url('/noticias') ?>">NOTICIAS</a></div>
                        <div><a href="<?php echo site_url('/deportes') ?>">DEPORTES</a></div>
                        <!-- <div><a href="<?php echo site_url('/programas') ?>">PROGRAMAS</a></div> -->
                    </div>
                    <div class="sectionB">
                        <div><a href="<?php echo site_url('/livestream') ?>">EN VIVO</a></div>
                        <!-- <div><a href="<?php echo site_url('/deportes') ?>">COMUNIDAD</a></div>
                        <div><a href="<?php echo site_url('/programas') ?>">TRIVIAS</a></div> -->
                    </div>
                </div><br>
                <div class="offcanvas-header">
                    <h3>links útiles</h3>
                    <hr>
                </div>
                <div class="section-menu">
                    <div class="sectionA">
                        <div><a href="<?php echo site_url('/noticias') ?>">LÍNEA EDITORIAL</a></div>
                        <div><a href="<?php echo site_url('/deportes') ?>">RENDICIÓN DE CUENTAS</a></div>
                        <div><a href="<?php echo site_url('/noticias') ?>">POLÍTICA DE PRIVACIDAD</a></div>
                    </div>
                    <div class="sectionB">
                        <div><a href="<?php echo site_url('/noticias') ?>">POLÍTICA DE COOKIES</a></div>
                        <div><a href="<?php echo site_url('/deportes') ?>">AVISO LEGAL</a></div>
                        <div><a href="<?php echo site_url('/reporte') ?>">REPORTE DE SEÑAL</a></div>
                    </div>
                </div><br>
                    <div class="offcanvas-header">
                        <h3>otros</h3>
                        <hr>
                    </div>
                    <div class="section-menu">
                        <div class="sectionC">
                            <div><a href="<?php echo site_url('/noticias') ?>">PAUTA CON NOSOTROS</a></div>
                            <div><a href="<?php echo site_url('/deportes') ?>">VIDA SANA</a></div>
                            <div><a href="<?php echo site_url('/programas') ?>">TRABAJA CON NOSOTROS</a></div>
                        </div>
                        <div class="sectionD">
                            <div><a href="<?php echo site_url('/noticias') ?>">MI CUENTA</a></div>
                            <div><a href="<?php echo site_url('/deportes') ?>">APP</a></div>
                            <div><a href="<?php echo site_url('/programas') ?>">TRIVIAS</a></div>
                        </div>
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