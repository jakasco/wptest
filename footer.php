
 <footer class="tummansininen">

<?php
if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply', '/js/comment-reply.js', array(), false, true);
}
 ?>

   <?php if( get_theme_mod( 'customize_footer_add_fields', 'show' ) == 'show' ) : ?>
       <a href="" class='button'>COPYRIGHT

       </a>
       <?php
try {
       $permalink = get_permalink();
$find = array( 'http://', 'https://' );
$replace = '';
$output = str_replace( $find, $replace, $permalink );
echo '<p>' . $output . '</p>';
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>
   <?php endif ?>
   <input type="button" id="slide" value=" Slide Down ">
    <div id="slider">asd
    </div>

 </footer>
</div>



<?php wp_footer(); ?>
</body>
</html>
