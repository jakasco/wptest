<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">

                <main id="main" class="site-main" role="main">
                </h1>Ota yhteyttä</h1>
  <div class="contactChildDiv">
                <form class="contactForm">



                            <label for="fname">Nimi:</label>
    <input type="text" id="fname" name="fname"><br><br>
    <label for="lname">Sähköposti:</label>
    <input type="text" id="lname" name="lname"><br><br>
    <label for="lname">Viesti:</label>
    <textarea>
    </textarea><br><br>
    <input type="submit" value="Lähetä">
</div>




                </form>
                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
