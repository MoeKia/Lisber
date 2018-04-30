<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="//cdn.bootcss.com/mdui/0.4.0/css/mdui.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
<title>
<?php if ( is_home() ) {
		bloginfo('name'); echo " - "; bloginfo('description');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} else {
		wp_title('',true);
	} ?>
</title>
<script src="//cdn.bootcss.com/mdui/0.4.0/js/mdui.min.js"></script>
</head>
<body class="mdui-color-grey-200  mdui-drawer-body-right">
<script>$(function(){
    $('pre code').each(function(){
        var lines = $(this).text().split('\n').length - 1;
        var $numbering = $('<ul/>').addClass('pre-numbering');
        $(this)
            .addClass('has-numbering')
            .parent()
            .append($numbering);
        for(i=1;i<=lines;i++){
            $numbering.append($('<li/>').text(i));
        }
    });
});
</script>
<div class="mdui-toolbar mdui-shadow-5 mdui-color-grey-100 mdui-text-color-pink-700 lisber-toolbar" >
	  <a class="mdui-typo-title" href="<?php bloginfo('url');?>"><?php echo bloginfo('name');?></a>
	  <div class="mdui-toolbar-spacer"></div>
	  <a href="wp-admin" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">person</i></a>
	  <a href="javascript:;" class="mdui-btn mdui-btn-icon" mdui-drawer="{target: '#menu'}"><i class="mdui-icon material-icons">menu</i></a>
</div>
<div class="mdui-drawer" id="menu" style="width:60%;">
    <?php get_sidebar("menu"); ?>
</div>
<div class="lisber-body mdui-container-fluid">
	<div class="mdui-row">
		<div class="mdui-col-sm-7">