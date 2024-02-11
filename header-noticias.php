<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head();?>
   <!-- HEADER GPT Tag -->
<script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
<script>
  window.googletag = window.googletag || {cmd: []};
  googletag.cmd.push(function() {
    var mapping1 = googletag.sizeMapping()
                            .addSize([992, 0], [[980, 120], [ 980, 90], [ 970, 250], [ 970, 90], [ 930, 180], [ 728, 250], [ 728, 90]])
                            .addSize([728, 0], [[728, 90], [ 468, 90]])
                            .addSize([336, 0], [[320, 100], [ 320, 90], [ 320, 50], [ 300, 100], [ 300, 50]])
                            .build();

    googletag.defineSlot('/22840647716/HEADER', [[980,120],[980,90],[970,250],[970,90],[930,180],[728,250],[728,90],[468,90]], 'div-gpt-ad-8030901-1')
             .defineSizeMapping(mapping1)
             .addService(googletag.pubads());

    googletag.pubads().enableSingleRequest();
    googletag.pubads().collapseEmptyDivs();
    googletag.pubads().setCentering(true);
    googletag.enableServices();
  });
</script>
<!-- End GPT Tag -->



<!-- Start GPT Tag -->
<script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
<script>
  window.googletag = window.googletag || {cmd: []};
  googletag.cmd.push(function() {
    var mapping1 = googletag.sizeMapping()
                            .addSize([992, 0], [[980, 120], [ 980, 90], [ 970, 250], [ 970, 90], [ 930, 180], [ 728, 250], [ 728, 90]])
                            .addSize([728, 0], [[728, 90], [ 480, 320], [ 468, 90], [ 336, 280], [  250, 360]])
                            .addSize([332, 0], [[320, 100], [ 320, 50], [ 300, 250], [ 300, 100], [ 300, 50], [ 250, 360], [ 250, 250], [ 200, 200]])
                            .build();

    googletag.defineSlot('/22840647716/ANUNCIO_SUPERIOR', [[980,120],[980,90],[970,250],[970,90],[930,180],[728,250],[728,90],[480,320],[468,90],[336,280],[250,360],[320,100],[320,50],[300,250],[300,100],[300,50],[250,360],[250,250],[200,200]], 'div-gpt-ad-9278160-1')
             .defineSizeMapping(mapping1)
             .addService(googletag.pubads());

    googletag.pubads().enableSingleRequest();
    googletag.pubads().collapseEmptyDivs();
    googletag.pubads().setCentering(true);
    googletag.enableServices();
  });
</script>
<!-- End GPT Tag -->



</head>
<body class="body-noticias">
        <div class="top-banner-container">
            <div class="top-banner">
                <div class="ad-top"><!-- /22840647716/HEADER -->
                        <!-- GPT AdSlot 1 for Ad unit 'HEADER' ### Size: [[980,120],[980,90],[970,250],[970,90],[930,180],[728,250],[728,90],[468,90]] -->
                    <div id='div-gpt-ad-8030901-1'>
                        <script>
                            googletag.cmd.push(function() { googletag.display('div-gpt-ad-8030901-1'); });
                        </script>
                    </div>
                    <!-- End AdSlot 1 -->
                </div>
            </div>
        </div>
        <div class="header-container">
            <header class="header-noticias" >
                <div class="header-noticias-wrapper">
                    <div class="menu">
                        <div class="toggle"><div class="bar"></div></div>
                            <div class="logo-noticias">
            
                                <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/imagenes/OTV400.png" alt=""></a>
                            </div>
                            <nav>
                                <li><a style="color: white" href="<?php echo site_url('/') ?>">Inicio</a></li>
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
                                <div class="vivo-header vivo-header-noticias vivo"><a href="<?php echo site_url('/livestream') ?>"><span></span><span></span><p>Al AIRE</p></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="nav-menu">
            <div class="nav-menu-wrapper">

                <div class="close"><i class="fa-solid fa-x"></i></div>
                <div class="header-nav"><div class="logo"><img src="<?php bloginfo('template_url')?>/imagenes/OTV400.png" alt=""></div></div>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <label>
                        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ); ?></span>
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Buscar...', 'placeholder' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    </label>
                    <button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button' ); ?></button>
                </form>
                <div class="offcanvas-header">
                    <h3>secciones</h3>
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
                        <div><a href="<?php echo site_url('/programas') ?>">REPORTE DE SEÑAL</a></div>
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
            <script>
                let close = document.querySelector('.close');
let nav = document.querySelector('.nav-menu');

close.addEventListener('click', () => {
  nav.classList.remove('show');
})
            </script>         
        </div>