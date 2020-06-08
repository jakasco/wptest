<?php /* Template Name: Contact Page */ ?>

<?php get_header(); ?>

<div id="primary" class="content-area">

                <main id="main" class="site-main" role="main">

              <div id="otaYhteyttaOtsikko" style="">
                <div style="display: table-cell; vertical-align: middle;">
                  <div>
                      Ota yhteyttä meihin sähköpostilla!
                  </div>
                </div>
              </div>

                <br>
  <div class="contactChildDiv" style="backgroundColor: #d8d8d7;">
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
  <div class="textAreaDiv">
  <label for="lname">Viesti:</label>
  <br>
  <textarea id="yheysViesti">
  </textarea><br>
</div>
</div>

    <br>

    <br>
    <input id="lahetaNappi" type="submit" value="Lähetä">
</div>
</div>




                </form>


                <br>
            <div>
                <button id="takaisinEtusivulle">Takaisin etusivulle</button>
            </div>


                </main><!-- .site-main -->
                <?php get_sidebar( 'content-bottom' ); ?>
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
