<div class="mdui-text-center">
<div class="mdui-color-pink-600" style="margin:3px;padding:10px;font-size:19px;">
<?php
bloginfo("admin_name");
?>
</div>
<div class="mdui-img-rounded" style="">
<?php
echo "<br/>".get_avatar(1,150);?>
</div>
</div>
<?php
wp_nav_menu( 
	array( 
		'theme_location' => 'header-menu', 
		'menu_class' => 'mdui-list mdui-text-color-grey-700', 
		'walker' => new description_walker() //注意前面要有 new
		) 
	);
?>