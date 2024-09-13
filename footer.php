
<footer class="site-footer">
    <ul class="footer-links">
      <li><a href="#accueil">MENTIONS LÉGALES</a></li>
      <li><a href="#a-propos">VIE PRIVÉE</a></li>
      <li><a>TOUS DROITS RÉSERVÉS</a></li>
    </ul>
    <?php get_template_part('templates_parts/modal-contact'); ?>
    <?php get_template_part('templates_parts/lightbox');?>
    <?php wp_footer(); ?>
</footer>
<script type="text/javascript">
    var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
