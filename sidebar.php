<div class="mdui-col-sm-5">
<div class="mdui-card mdui-shadow-5 mdui-text-center lide" style="margin-bottom:10px 0px;">
	<div class="mdui-card-actions" style="">
		<div class="mdui-color-pink-600 mdui-shadow-3" style="padding:10px;border-radius:20px;font-size:18px;">博客信息</div>
		<div class="mdui-shadow-6 mdui-color-green-600" style="padding:10px;border-radius:8px;margin-top:10px;">
			名称 · <?php bloginfo("name");?>
		</div>
		<div class="mdui-shadow-6 mdui-color-blue-grey-600" style="padding:10px;border-radius:8px;margin-top:10px;">
			介绍 · <?php bloginfo("description");?>
		</div>
		<div class="mdui-shadow-6 mdui-color-teal-600" style="padding:10px;border-radius:8px;margin-top:10px;">
			邮箱 · <?php bloginfo("admin_email");?>
		</div>
	</div>
</div>
<div class="mdui-card mdui-shadow-5" style="margin:10px 0px;">
	<div class="mdui-card-actions" style="">
		<div class="mdui-color-pink-600 mdui-text-center mdui-shadow-3" style="padding:10px;border-radius:20px;font-size:18px;">友情链接</div>
		<div class="lisber-links " style="mdui-container">
			<ul class="mdui-list">
				<?php if (function_exists(wpjam_blogroll)) wpjam_blogroll();?>
			</ul>
		</div>
	</div>
</div>
</div>