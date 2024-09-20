
<footer class="site-footer">
    <ul class="footer-links">
      <li><a href="http://nathaliemota.local/mentions-legales/">MENTIONS LÉGALES</a></li>
      <li><a href="<?php echo get_permalink(get_option('wp_page_for_privacy_policy')); ?>">VIE PRIVÉE</a></li>
      <li><a>TOUS DROITS RÉSERVÉS</a></li>
    </ul>
    <?php get_template_part('templates_parts/modal-contact'); ?>
    <?php get_template_part('templates_parts/lightbox');?>
    <?php wp_footer(); ?>
</footer>
<script type="text/javascript">
    var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
</script>
