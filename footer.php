
 <footer class="tummansininen">

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
