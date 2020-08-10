
 <footer class="tummansininen">

<?php
if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply', '/js/comment-reply.js', array(), false, true);
}
 ?>

   <?php if( get_theme_mod( 'customize_footer_add_fields', 'show' ) == 'show' ) : ?>
       <a id="copyRightText" href="" class='button'>  © <?php echo get_the_date('Y'); ?> <?php echo get_bloginfo() ?> </a>
       <?php
try {
  /* Jos oma domain niin koodi tässä etsii osoitteen
       $permalink = get_permalink();
$find = array( 'http://', 'https://' );
$replace = '';
$output = str_replace( $find, $replace, $permalink );
echo '<p>' . $output . '</p>';*/
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>
   <?php endif ?>
 </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
