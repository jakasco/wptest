<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">

                <main id="main" class="site-main" role="main">
                </h1>Ota yhteyttä</h1>
  <div class="contactChildDiv">
                <form class="contactForm">





<div class="labels">
                            <label for="fname">Nimi:</label>
                            <br>
                            <div class="inputs">
    <input type="text" id="fname" name="fname"><br>
  </div>
    </div>

    <br>

    <div class="labels">

    <label for="lname">Sähköposti:</label>
    <br>
    <div class="inputs">
    <input type="text" id="lname" name="lname"><br>
      </div>
  </div>
    <br>
    <label for="lname">Viesti:</label>
    <br>
    <textarea id="yheysViesti">
    </textarea><br><br>
    <input id="lahetaNappi" type="submit" value="Lähetä">
</div>




                </form>
                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
