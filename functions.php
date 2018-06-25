<?php
/**
* 数字分页函数
* 因为wordpress默认仅仅提供简单分页
* 所以要实现数字分页，需要自定义函数
* @Param int $range            数字分页的宽度
* @Return string|empty        输出分页的HTML代码        
*/
function lingfeng_pagenavi( $range = 4 ) {
    global $paged,$wp_query;
    if ( !$max_page ) {
        $max_page = $wp_query->max_num_pages;
    }
        echo "<div class='mdui-btn-group' style='margin:10px 0px;'>"; 
        if( !$paged ){
            $paged = 1;
        }
        echo "<a href='".get_pagenum_link(1) ."' class='mdui-btn mdui-color-pink-500' style='margin:2px;' title='跳转到首页'>首页</a>";
        previous_posts_link("<font class='mdui-btn mdui-color-pink-500' style='margin:2px;'>上一页</font>");
        if ( $max_page >$range ) {
                for( $i = 1; $i <= ($range +1); $i++ ) {
                    echo "<a style='margin:2px;' class='mdui-btn' href='".get_pagenum_link($i) ."'";
                    echo " class='mdui-btn mdui-color-pink-500'";echo ">$i</a>";
                }
                for($i = $max_page -$range;$i <= $max_page;$i++){
                    echo "<a style='margin:2px;' href='".get_pagenum_link($i) ."'";
                    echo " class='mdui-btn mdui-color-pink-500'";echo ">$i</a>";
                    }
                    for($i = ($paged -ceil($range/2));$i <= ($paged +ceil(($range/2)));$i++){
                        echo "<a style='margin:2px;' href='".get_pagenum_link($i) ."'";
						echo " class='mdui-btn mdui-color-pink-500'";echo ">$i</a>";
                    }
                }
                for($i = 1;$i <= $max_page;$i++){
                    echo "<a style='margin:2px;' href='".get_pagenum_link($i) ."'";
                    echo " class='mdui-btn mdui-color-pink-500'";echo ">$i</a>";
                }
        next_posts_link("<font style='margin:2px;' class='mdui-btn mdui-color-pink-500'>下一页</font>");
        echo "<a style='margin:2px;' href='".get_pagenum_link($max_page) ."' class='mdui-btn mdui-color-pink-500' title='跳转到最后一页'>尾页</a>";
        echo "</div>\n";  
}
add_filter( 'widget_tag_cloud_args', 'theme_tag_cloud_args' );
function aurelius_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   <ul class="mdui-list">
   <li class="mdui-list-item mdui-ripple comment" id="li-comment-<?php comment_ID(); ?>">
		<div class="mdui-list-item-avatar"><?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?></div>
		<div class="mdui-list-item-content" id="comment-<?php comment_ID(); ?>">	
			<div class="mdui-list-item-title">
					<?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
			</div>
			<div class="mdui-list-item-text">
			<?php if ($comment->comment_approved == '0') : ?>
			  <em>你的评论正在审核，稍后会显示出来！</em><br />
     	 	<?php endif; ?>
      		<?php comment_text(); ?>
			</div>
		</div>
	</li>
	<li class="mdui-subheader-inset">
		<div class="mdui-text-color-pink-400">
			<span><?php echo get_comment_time('Y-m-d H:i'); ?></span>
			<span><?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?></span>
			<span><?php edit_comment_link('修改'); ?></span>
		</div>
	</li>
	</ul>
<?php }?>
<?php
add_action('admin_init', 'wpjam_blogroll_settings_api_init');
function wpjam_blogroll_settings_api_init() {
    add_settings_field('wpjam_blogroll_setting', '友情链接', 'wpjam_blogroll_setting_callback_function', 'reading');
    register_setting('reading','wpjam_blogroll_setting');
}
 
function wpjam_blogroll_setting_callback_function() {
    echo '<textarea name="wpjam_blogroll_setting" rows="10" cols="50" id="wpjam_blogroll_setting" class="large-text code">' . get_option('wpjam_blogroll_setting') . '</textarea>';
}
 
function wpjam_blogroll(){
    $wpjam_blogroll_setting =  get_option('wpjam_blogroll_setting');
    if($wpjam_blogroll_setting){
        $wpjam_blogrolls = explode("\n", $wpjam_blogroll_setting);
        foreach ($wpjam_blogrolls as $wpjam_blogroll) {
            $wpjam_blogroll = explode("|", $wpjam_blogroll );
            echo '<a href="'.trim($wpjam_blogroll[0]).'" title="'.esc_attr(trim($wpjam_blogroll[1])).'"><li class="mdui-list-item"><i class="mdui-list-item-icon mdui-icon material-icons">wb_cloudy</i><div class="mdui-list-item-content">'.trim($wpjam_blogroll[1]).'</div><i class="mdui-list-item-icon mdui-icon material-icons">chevron_right</i></li></a>';
        }
    }
}
register_nav_menu( 'header-menu', '主导航菜单' );
class description_walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth, $args)
	{
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
		$class_names = $value = '';
 
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="'. esc_attr( $class_names ) . '"';
 
		$output .= $indent . '<li class="mdui-list-item" id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
 
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
 
		if($depth != 0)
		{
			$description = $append = $prepend = "";
		}
 
		$item_output = $args->before;
		$item_output .= '<a class="mdui-center"'. $attributes .'>';
		$item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
		$item_output .= '<i class="mdui-list-item-icon mdui-icon material-icons">chevron_right</i></a>';
		$item_output .= $args->after;
 
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

?>