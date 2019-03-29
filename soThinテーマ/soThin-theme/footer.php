<?php
/**
 * フッター表示用
 *
 * @package WordPress
 * @subpackage soThin-theme
 * @since 1.0
 * @version 1.0
 */
?>
<footer role="contentinfo" id="footer" class="footer_wrapper grid grid-3">
<ul><?php dynamic_sidebar('フッター１'); ?></ul>
<ul><?php dynamic_sidebar('フッター２'); ?></ul>
<ul><?php dynamic_sidebar('フッター３'); ?></ul>
</footer>
<?php wp_footer(); ?>
</body>
</html>