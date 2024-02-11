<footer>
    <div class="logo-footer">
        <a href="<?php bloginfo('url'); ?>"><img width="" src="<?php bloginfo('template_url'); ?>/imagenes/OTV400.png" alt=""></a>
    </div>
    <div class="footer-bar">
        <ul>
                            <li><a style="color: white" href="<?php echo site_url('/noticias') ?>">Noticieros Anteriores</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/deportes') ?>">Pedro Escamoso</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/programas') ?>">Acorralada</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/deportes') ?>">Señal en vivo</a></li>
                            <li><a style="color: white" href="<?php echo site_url('/programas') ?>">Programas</a></li>
                            <?php if(is_user_logged_in()){?>
                                <li class="" ><a style="color: white" href="<?php echo wp_logout_url('/') ?>">Salir</a></li>
                            <?php } else { ?>
                                <li class="" ><a style="color: white" href="<?php echo esc_url(site_url('/wp-signup.php')) ?>">Ingresar</a></li>                    
                            <?php } ?>
        </ul>
    </div>
    <div class="social-media-footer">
                            <a href=""><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-x-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                            <a href=""><i class="fa-brands fa-youtube"></i></a>
                            <a href=""><i class="fa-brands fa-tiktok"></i></a>
                        </div>
</footer>
    </div>
   
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>     -->
</body>
<?php wp_footer(); ?>
</html>