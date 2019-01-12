bab 1:
* masuk dalam folder wordpress -> wp-content -> theme
* buat folder theme sendiri
* buat fail style.css, index.php, header.php, footer.php
#---------------------------------------------------------------------------------------------------
# dalam fail style.css
/*
	Theme Name: Biarlah Rahsia Theme
	Theme URL: https://amin007.github.com/biarlahrahsia
	Author: Amin Ledang
	Authore URL: https://amin007.github.com/
	Description: Ini adalah rahsia katanya
	Version: 0.0.0 alpha
	License: Lesen Terbuka Daa
	License URL: https://amin007.github.com/lesenterbuka
	Tags: black, white, responsive, one-column, two-column,featured-images, custom-menu, custom-header, post-formats
*/
#---------------------------------------------------------------------------------------------------
# dalam fail index.php
<?php get_header(); ?>
<h1>Ini adalah index</h1>
<?php get_footer(); ?>
#---------------------------------------------------------------------------------------------------
# dalam fail header.php
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tajuk Theme ...</title>
</head>
<body>

#---------------------------------------------------------------------------------------------------
# dalam fail footer.php
	<footer>
		<p>&copy; Sumber Terbuka 2019. Theme ...</p>
	</footer>
</body>
</html>
#---------------------------------------------------------------------------------------------------

bab 2:
* masuk dalam folder wordpress -> wp-content -> theme
* buat folder css dan js
* buat fail functions.php
* ubah fail header.php dan footer.php
#---------------------------------------------------------------------------------------------------
# folder css - fail biarlah.css
html, body
{
	margin: 0;
	color: #333;
	background: #eee;
	font: sans-serif;
}
body
{
	padding: 20px;
}
#---------------------------------------------------------------------------------------------------
# folder js - fail biarlah.js
// javascript functions
#---------------------------------------------------------------------------------------------------
# dalam fail functions.php
<?php
function biarlah_script_enqueue()
{
	wp_enqueue_style('customstyle', get_template_directory_url() . '/css/biarlah.css', array(), '1.0.0', 'all');
	wp_enqueue_script('customjs', get_template_directory_url() . '/css/biarlah.js',, array(), '1.0.0', true);# true -> letak js di bawah
}

add_action('wp_enqueue_scripts','biarlah_script_enqueue');
?>
#---------------------------------------------------------------------------------------------------
# dalam fail header.php
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tajuk Theme ...</title>
	<?php wp_head(); ?>
</head>
<body>

#---------------------------------------------------------------------------------------------------
# dalam fail footer.php
	<footer>
		<p>&copy; Sumber Terbuka 2019. Theme ...</p>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
#---------------------------------------------------------------------------------------------------

bab 3: menu setup
* Github -> https://github.com/Alecaddd/Wordpress101
* masuk dalam folder wordpress -> wp-content -> theme
* ubah fail functions.php
* ubah fail header.php dan footer.php
#---------------------------------------------------------------------------------------------------
# dalam fail functions.php
<?php
function biarlah_script_enqueue()
{
	wp_enqueue_style('customstyle', get_template_directory_url() . '/css/biarlah.css', array(), '1.0.0', 'all');
	wp_enqueue_script('customjs', get_template_directory_url() . '/css/biarlah.js',, array(), '1.0.0', true);# true -> letak js di bawah
}

add_action('wp_enqueue_scripts','biarlah_script_enqueue');

function biarlah_theme_setup()
{
	add_theme_suport('menus');
	
	register_nav_menu('primary','Primary Header Navigarion');
	register_nav_menu('secondary','Footer Navigation');
}

add_action('init','biarlah_theme_setup');
?>
#---------------------------------------------------------------------------------------------------
# dalam fail header.php
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tajuk Theme ...</title>
	<?php wp_head(); ?>
</head>
<body>
	<?php wp_nav_menu(array('theme_location'=>'primary')); ?>
#---------------------------------------------------------------------------------------------------
# dalam fail footer.php
	<footer>
		<p>&copy; Sumber Terbuka 2019. Theme ...</p>
		<?php wp_nav_menu(array('theme_location'=>'secondary')); ?>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
#---------------------------------------------------------------------------------------------------

