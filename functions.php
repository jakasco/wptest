<?php

function exclude_category($query) {
if ( $query->is_home() ) {
$query->set( 'cat', '-2' );
}
return $query;
}
add_filter( 'pre_get_posts', 'exclude_category' );

add_filter ('wp_image_editors', 'wpse303391_change_graphic_editor');
function wpse303391_change_graphic_editor ($array) {
    return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
    }

function tn_custom_excerpt_length( $length ) {
return 35;
}

function custom_theme_setup() {

	add_theme_support('title-tag'); //laittaa title tagin
	add_theme_support('post-thumbnails');
	add_theme_support('custom-background'); //admin paneeliin lisää valikkoja, värin muutos
//	add_theme_support('custom-header'); //header text color tulee "colors":iin
	add_theme_support( 'custom-header', array('width' => 1000, 'heigth' => 400));
  add_theme_support('custom-footer');
	add_theme_support( 'customize-selective-refresh-widgets' );
	}

add_action( 'after_setup_theme', 'custom_theme_setup');

function rekisteroi_menu(){
	register_nav_menu('reuna', 'Päävalikko');
}

add_action('init', 'rekisteroi_menu'); //init = wordpress suorittaa komennot ennen kuin lähettää palvelimelle

//lisää kommentointi
function gb_comment_form_tweaks ($fields) {
    //add placeholders and remove labels
    $fields['author'] = '<input id="author" name="author" value="" placeholder="Nimi*" size="30" maxlength="245" required="required" type="text">';

    $fields['email'] = '<input id="email" name="email" type="email" value="" placeholder="Sähköposti*" size="30" maxlength="100" aria-describedby="email-notes" required="required">';

    //unset comment so we can recreate it at the bottom
    unset($fields['comment']);

    $fields['comment'] = '<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" placeholder="Kommentti*" required="required"></textarea>';

    //remove website
    unset($fields['url']);

    return $fields;
}

add_filter('comment_form_fields', 'gb_comment_form_tweaks');

comment_form(array('title_reply' => 'Join the discussion!', 'comment_notes_before' => ''));

//lisää jquery
function lisaa_kirjasto() {
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/app.js/', array( 'jquery' ) );
}

add_action( 'wp_enqueue_script', 'lisaa_kirjasto' );

//add_action( 'wp_enqueue_scripts', 'myplugin_load_script' ); //lisää javascript
function myplugin_load_script() {
    wp_enqueue_script( 'myplugin-testjs', "http://localhost/wordpress4/wp-content/themes/oma-teema/js/menuFunctions.js", array('jquery'), null, true );

}

function myplugin_load_script2() {
    wp_enqueue_script( 'myplugin-testjs', "http://localhost/wordpress4/wp-content/themes/oma-teema/js/homepageCarousel.js", array('jquery'), null, true );

}

function my_new_scripts() {
wp_enqueue_script( 'new-script', get_template_directory_uri() . '/js/app.js', array(), true );
wp_enqueue_script( 'new-script2', get_template_directory_uri() . '/js/homepageCarousel.js', array(), true );
}

add_action( 'wp_enqueue_scripts', 'my_new_scripts' );

//live preview
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

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Name of Widgetized Area',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

add_action( 'wp_head', 'cd_customizer_css');
function cd_customizer_css()
{
    ?>
         <style type="text/css">
             body { background: #<?php echo get_theme_mod('background_color', '#43C6E4'); ?>; }
         </style>
    <?php
}

/* CUSTOMIZER */
add_action( 'customize_register', 'cd_customizer_settings' );

function cd_customizer_settings( $wp_customize ) {


$wp_customize->add_section( 'cd_colors' , array(
		'title'      => 'Background Color',
		'priority'   => 30,
) );
$wp_customize->add_setting( 'background_color' , array(
		'default'     => '#43C6E4',
	//	'transport'   => 'refresh',  //refresh=sivu latautuu että muutos näkuu, postMessage=samantien näkuu muutos
	'transport'   => 'postMessage',
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
'label'        => 'Background Color',
'description' => 'Change the background color of page',
'section'    => 'cd_colors',
'settings'   => 'background_color',
) ) );

$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

//Nappiin customointi: näkyykö/eikö näy
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

//live näkymä mitä tapahtuu kun palkkia vedetään edestakaisin
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
		<?php
		}
	}
}

$wp_customize->add_setting( 'cd_photocount' , array(
    'default'     => 0,
    'transport'   => 'postMessage',
) );
/*
$wp_customize->add_control( new WP_Customize_Range( $wp_customize, 'cd_photocount', array(
	'label'	=>  'Number count',
    'min' => 10,
    'max' => 9999,
    'step' => 10,
	'section' => 'title_tagline',
) ) );*/
/////////////////////



//FOOTER
$wp_customize->add_section( 'customize_footer' , array(
		'title'      => 'Footer',
		'priority'   => 40,
) );

$wp_customize->add_setting( 'customize_footer_add_fields' , array(
		'default'     => "",
		'transport'   => 'refresh',
) );

$wp_customize->add_control( 'customize_footer_add_fields', array(
'label' => 'Add copyright notification',
'section' => 'customize_footer',
'settings' => 'customize_footer_add_fields',
'type' => 'radio',
'choices' => array(
	'show' => 'Add copyright',
	'hide' => 'Hide copyright',
),
) );


}  //CUSTOMIZE SETINGS LOPPUU

?>
