<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
		die ('Please do not load this page directly. Thanks!');
	}
wp_list_comments("type=comment&callback=aurelius_comment");
?>
<div class="mdui-shadow-5 mdui-text-color-grey-800" style="border-radius:20px;margin:10px;padding:20px;background:#FEFEFE;">
<?php 
if ( !comments_open() ) :
// If registration required and not logged in.
elseif ( get_option('comment_registration') && !is_user_logged_in() ) : 
?>
<p>你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
<?php else  : ?>
<!-- Comment Form -->
<form id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
    <div class="hr dotted clearfix"> </div>
    <ul class="mdui-list">
        <?php if ( !is_user_logged_in() ) : ?>
        <li class="clearfix mdui-textfield">
            <input class="mdui-textfield-input" type="text" placeholder="您的昵称" name="author" id="author" value="<?php echo $comment_author; ?>" size="23" tabindex="1" />
        </li>
        <li class="clearfix mdui-textfield">
            <input class="mdui-textfield-input" placeholder="电子邮件" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="23" tabindex="2" />
        </li>
        <li class="clearfix mdui-textfield">
            <input class="mdui-textfield-input" placeholder="网址（选填）" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="23" tabindex="3" />
        </li>
        <?php else : ?>
        <li class="clearfix">您已登录:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出 »</a></li>
        <?php endif; ?>
        <li class="clearfix mdui-textfield">
            <textarea class="mdui-textfield-input" placeholder="评论内容" id="message comment" name="comment" rows="3"></textarea>
        </li>
        <li class="clearfix">
            <!-- Add Comment Button -->
            <center><a style="border-radius:20px" class="mdui-btn mdui-color-pink-600" href="javascript:void(0);" onClick="Javascript:document.forms['commentform'].submit()" class="button medium black right">发表评论</a></center></li>
    </ul>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>
<?php endif; ?>
</div>