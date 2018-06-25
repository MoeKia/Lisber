<?php get_header();?>
	<style>
		.single-head a{
 			text-decoration:none;
 			color:#7E7E7E;
		 }
	</style>
	<div class="single-head mdui-text-color-grey-600 mdui-card mdui-shadow-5" style="margin-bottom:15px;padding:10px 15px;background:#FEFEFE;"><a href="<?php bloginfo('siteurl');?>" class="mdui-text-color-grey-600" style="text-decoration:none;"><i class="mdui-icon material-icons" style="font-size:17px;">home</i>首页</a> > <?php the_category(" > "); ?> > 文章</div>
	<div class="mdui-card mdui-shadow-5" style="padding:5px 2px;background:#FEFEFE;">
		<div class="mdui-card-media">
		    <img src="http://void.vsirs.com/img?w=600&h=450" height="240" />
		    <div class="mdui-card-media-covered">
  		    <div class="mdui-card-primary">
   		     <div class="mdui-card-primary-title"><?php the_title();?></div>
		      </div>
 		   </div>
  	  </div>
		<div class="lisber-single-passage">
			<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
			<?php the_content();?>
			<?php endif ?>
			<h2>文章链接</h2>
			<blockquote>如无特别说明均为原创，未经作者允许，严禁转载！</blockquote>
			<pre><?php echo home_url(add_query_arg(array()));?></pre>
		</div>
	</div>
	<div class="mdui-shadow-5 mdui-text-color-grey-800" style="margin:10px 0px;padding:10px;background:#FEFEFE;">
		<div class="mdui-text-color-grey-600 mdui-text-center" style="padding:10px;border-radius:5px;font-size:18px;"><h3>发表评论</h3><hr /></div>
		<?php comments_template();?>
		</div>
	</div>
<?php get_sidebar();?>
<?php get_footer();?>