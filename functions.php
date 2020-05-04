<?php


//include('customizer.php');
// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length( $length ) {
return 35;
}
//add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

function custom_theme_setup() {

	add_theme_support('title-tag'); //laittaa title tagin
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background'); //admin paneeliin lisää valikkoja
	add_theme_support('custom-header');
	add_theme_support( 'custom-header', array('width' => 1000, 'heigth' => 400));
	//add_theme_support( 'custom-header', $args );

	}

add_action( 'after_setup_theme', 'custom_theme_setup');

function rekisteroi_menu(){
	register_nav_menu('reuna', 'Päävalikko');
}

add_action('init', 'rekisteroi_menu'); //init = wordpress suorittaa komennot ennen kuin lähettää palvelimelle

//lisää jquery

function lisaa_kirjasto() {
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/app.js/', array( 'jquery' ) );
}

add_action( 'wp_enqueue_script', 'lisaa_kirjasto' );
/*
echo get_stylesheet_directory_uri()  . '/js/app.js/';
echo 'functions.php rivi 48'; //OTA POIS KOMMENTTI */

function my_new_scripts() {
wp_enqueue_script( 'new-script', get_template_directory_uri() . '/js/app.js', array(), true );
}


add_action( 'wp_enqueue_scripts', 'my_new_scripts' );

//llive preview
add_action( 'customize_preview_init', 'cd_customizer' );
function cd_customizer() {
	wp_enqueue_script(
		  'cd_customizer',
		  get_template_directory_uri() . '/customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}
/* CUSTOMIZER */
add_action( 'customize_register', 'cd_customizer_settings' );

function cd_customizer_settings( $wp_customize ) {


	$wp_customize->add_section( 'cd_colors' , array(
	    'title'      => 'Header Color',
	    'priority'   => 30,
	) );


	$wp_customize->add_setting( 'header_color' , array(
    'default'     => '#43C6E4',
    'transport'   => 'refresh',
) );



$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_color', array(
	'label'        => 'Header Color',
	'section'    => 'cd_colors',
	'settings'   => 'header_color',
) ) );

$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

///////////////



  $wp_customize->add_section( 'cd_button' , array(
      'title'      => 'The Button',
      'priority'   => 20,
  ) );

  $wp_customize->add_setting( 'cd_button_display' , array(
      'default'     => true,
      'transport'   => 'refresh',
  ) );

  $wp_customize->add_control( 'cd_button_display', array(
  'label' => 'Button Display',
  'section' => 'cd_button',
  'settings' => 'cd_button_display',
  'type' => 'radio',
  'choices' => array(
    'show' => 'Show Button',
    'hide' => 'Hide Button',
  ),
) );

////////////////////////////////////


if( class_exists( 'WP_Customize_Control' ) ) {
	class WP_Customize_Range extends WP_Customize_Control {
		public $type = 'range';

        public function __construct( $manager, $id, $args = array() ) {
            parent::__construct( $manager, $id, $args );
            $defaults = array(
                'min' => 0,
                'max' => 10,
                'step' => 1
            );
            $args = wp_parse_args( $args, $defaults );

            $this->min = $args['min'];
            $this->max = $args['max'];
            $this->step = $args['step'];
        }

		public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<input class='range-slider' min="<?php echo $this->min ?>" max="<?php echo $this->max ?>"
			 step="<?php echo $this->step ?>" type='range' <?php $this->link(); ?>
			 value="<?php echo esc_attr( $this->value() ); ?>" oninput="jQuery(this).next('input').val( jQuery(this).val() )">
            <input onKeyUp="jQuery(this).prev('input').val( jQuery(this).val() )" type='text'
						value='<?php echo esc_attr( $this->value() ); ?>'>

		</label>
		<script>
/*
		let photocountlabel = document.getElementById("photocountlabel");

		wp.customize( 'cd_photocount', function( value ) {

			value.bind( function( newval ) {
		//		console.log("newval: ",newval);
		//		jQuery( '#photocount span' ).html( newval );
	//	jQuery( '#photocountlabel' ).html( newval );
			photocountlabel.innerHTML = "asdsadsa";
			} );
		} );
		*/
		</script>
		<?php
		}
	}
}

$wp_customize->add_setting( 'cd_photocount' , array(
    'default'     => 0,
    'transport'   => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'cd_photocount', array(
	'label'	=>  'Photo Count',
    'min' => 10,
    'max' => 9999,
    'step' => 10,
	'section' => 'title_tagline',
) ) );


}  //CUSTOMIZE SETINGS LOPPUU

/*
add_action( 'wp_head', 'cd_customizer_css');
function cd_customizer_css()
{
    ?>
         <style type="text/css">
             body { background: #<?php echo get_theme_mod('background_color', '#43C6E4'); ?>; }
         </style>
    <?php
}*/


/*
function mytheme_customize_register( $wp_customize ) {
	$wp_customize->add_setting( 'header_textcolor' , array(
	    'default'   => '#000000',
	    'transport' => 'refresh',
	) );
	$wp_customize->add_section( 'mytheme_new_section_name' , array(
    'title'      => __( 'Visible Section Name', 'mytheme' ),
    'priority'   => 30,
) );

   //All our sections, settings, and controls will be added here
	 $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_color', array(
	'label'      => __( 'Header Color', 'mytheme' ),
	'section'    => 'your_section_id',
	'settings'   => 'your_setting_id',
) ) );

}
add_action( 'customize_register', 'mytheme_customize_register' );

function mytheme_customize_css()
{
    ?>
         <style type="text/css">
             h1 { color: <?php echo get_theme_mod('header_color', '#000000'); ?>; }
         </style>
    <?php
}
add_action( 'wp_head', 'mytheme_customize_css');
/*
add_action('customize_register','my_customize_register');
function my_customize_register( $wp_customize ) {
  $wp_customize->add_panel();
  $wp_customize->get_panel();
  $wp_customize->remove_panel();

  $wp_customize->add_section();
  $wp_customize->get_section();
  $wp_customize->remove_section();

  $wp_customize->add_setting();
  $wp_customize->get_setting();
  $wp_customize->remove_setting();

  $wp_customize->add_control();
  $wp_customize->get_control();
  $wp_customize->remove_control();
}*/
?>
